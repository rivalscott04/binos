<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPencairanPembinaan extends Model
{
    protected $table = 'pencairan_pembinaan';
    protected $primaryKey = 'id_pencairan_pembinaan';
    protected $returnType = 'object';
    protected $allowedFields = ['akun', 'perihal', 'kode_item', 'no_surat', 'tgl_surat', 'no_kwitansi', 'tanggal', 'kegiatan', 'rincian', 'volume', 'harga_satuan', 'jumlah'];
    protected $useTimestamps = true;

    /**
     * Menghasilkan nomor kwitansi otomatis.
     *
     * @return string
     */
    public function no_kwitansi(): string
    {
        $this->db->transStart();

        $number = $this->db
            ->table($this->table)
            ->select('RIGHT(no_kwitansi,4) as no_kwitansi', false)
            ->orderBy('no_kwitansi', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();

        $this->db->transComplete();

        $no = $number == null ? 1 : intval($number['no_kwitansi']) + 1;
        return str_pad($no, 4, '0', STR_PAD_LEFT);
    }

    public function getKegiatanDanAkun()
    {
        return $this->select('kegiatan, akun')->distinct()->findAll(0, true); // true untuk array
    }

    public function getKodeItem()
    {
        return $this->select('kode_item')->distinct()->findAll(0, true); // true untuk array
    }

    /**
     * Menyimpan data batch dengan perhitungan otomatis untuk kolom 'jumlah'.
     *
     * @param array $data
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function insertBatchWithCalculation(array $data): bool
    {
        $processedData = [];
        $model = new PaguAnggaran();
        $cek = 0;
        $lokasi = '';
        $jumlah = 0;

        // Loop through data array instead of volume
        foreach ($data['data'] as $index => $item) {
            if (!isset($item['volume']) || !isset($item['harga_satuan'])) {
                log_message('error', "Kolom 'volume' atau 'harga_satuan' tidak disertakan pada index {$index}");
                throw new \InvalidArgumentException("Kolom 'volume' dan 'harga_satuan' harus disertakan");
            }

            if ($cek == 0) {
                $pagu = $model
                    ->where('kode_item', $item['kode_item'])
                    ->get()
                    ->getResultArray();

                if (count($pagu) > 0) {
                    $lokasi = $pagu[0]['kode_item'];
                    $cek = 1;
                }
            }

            // Calculate jumlah dari volume dan harga_satuan yang ada di item
            $itemJumlah = $item['volume'] * $item['harga_satuan'];

            $processedData[] = [
                'tanggal' => $data['tanggal'],
                'perihal' => $data['perihal'],
                'akun' => $item['akun'],
                'kode_item' => $item['kode_item'],
                'kegiatan' => $item['kegiatan'],
                'rincian' => $item['rincian'],
                'no_kwitansi' => $this->no_kwitansi(),
                'volume' => $item['volume'],
                'harga_satuan' => $item['harga_satuan'],
                'jumlah' => $itemJumlah,
            ];

            $jumlah += $itemJumlah;
        }

        if ($cek == 1) {
            $pagu = $model->where('kode_item', $lokasi)->get()->getResultArray();

            if (!empty($pagu) && ($pagu[0]['jumlah_terpakai'] + $jumlah) <= $pagu[0]['jumlah_pagu']) {
                try {
                    $this->db->transBegin();

                    // Insert ke tabel pencairan_pembinaan
                    $insertResult = $this->db->table('pencairan_pembinaan')->insertBatch($processedData);

                    if ($insertResult) {
                        // Update pagu menggunakan method yang sudah ada
                        $updateResult = $model->updateTerpakaiDanKurangiPagu($lokasi, $jumlah);

                        if ($updateResult) {
                            $this->db->transCommit();
                            return true;
                        }
                    }

                    $this->db->transRollback();
                    return false;
                } catch (\Exception $e) {
                    $this->db->transRollback();
                    log_message('error', $e->getMessage());
                    throw new \InvalidArgumentException($e->getMessage());
                }
            } else {
                log_message('error', "Sisa Pagu tidak cukup untuk kode item {$lokasi}. Diperlukan {$jumlah} lebih.");
                throw new \InvalidArgumentException('Sisa Pagu tidak cukup');
            }
        } else {
            log_message('error', "Pagu tidak ditemukan untuk kode item {$lokasi}");
            throw new \InvalidArgumentException('Pagu tidak ditemukan untuk kode barang yang diberikan');
        }
    }

    public function updateData(int $id, array $data): bool
    {
        $model = new PaguAnggaran();

        // Ambil data lama sebelum diupdate dan konversi ke array jika object
        $oldData = $this->find($id);
        if (!$oldData) {
            throw new \InvalidArgumentException("Data pencairan tidak ditemukan.");
        }

        // Konversi ke array jika object
        $oldData = (array)$oldData;

        // Hitung jumlah baru
        $newJumlah = floatval($data['volume']) * floatval($data['harga_satuan']);
        $selisihJumlah = $newJumlah - floatval($oldData['jumlah']);

        // Siapkan hanya data yang akan diupdate
        $processedData = [
            'tanggal' => $data['tanggal'],
            'perihal' => $data['perihal'],
            'volume' => $data['volume'],
            'harga_satuan' => $data['harga_satuan'],
            'jumlah' => $newJumlah,
        ];

        // Tambahkan field opsional jika ada
        if (isset($data['kegiatan'])) {
            $processedData['kegiatan'] = $data['kegiatan'];
        }
        if (isset($data['rincian'])) {
            $processedData['rincian'] = $data['rincian'];
        }

        try {
            $this->db->transBegin();

            // Update data pencairan
            $updateResult = $this->update($id, $processedData);

            if ($updateResult) {
                // Update pagu anggaran dengan selisih jumlah
                $updatePaguResult = $model->updateTerpakaiDanKurangiPagu(
                    $oldData['kode_item'],
                    $selisihJumlah
                );

                if ($updatePaguResult) {
                    $this->db->transCommit();
                    return true;
                }
            }

            $this->db->transRollback();
            return false;
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'Error saat update: ' . $e->getMessage());
            throw new \InvalidArgumentException($e->getMessage());
        }
    }

    public function updateNomor(string $id, string $no): bool
    {
        $data = [
            'kegiatan' => $no,
        ];
        return $this->where('no_kwitansi', $id)->update($data);
    }

    public function get_detail($kode)
    {
        $sql = "
        SELECT pencairan_pembinaan.*, item.nama_item
        FROM pencairan_pembinaan
        LEFT JOIN item ON item.kode_item = pencairan_pembinaan.kode_item
        WHERE pencairan_pembinaan.no_kwitansi = ?
        ";

        $result = $this->db->query($sql, [$kode])->getResult();
        return $result;
    }

    public function deletePencairanAndUpdatePagu($id)
    {
        $model = new PaguAnggaran();

        // Sesuaikan dengan primary key yang benar
        $pencairan = $this->db->table('pencairan_pembinaan')
            ->where('id_pencairan_pembinaan', $id)
            ->get()
            ->getRowArray();

        if (!$pencairan) {
            throw new \InvalidArgumentException("Data pencairan tidak ditemukan.");
        }

        try {
            $this->db->transBegin();

            // Kurangi jumlah_terpakai di pagu anggaran
            $updateResult = $model->updateTerpakaiDanKurangiPagu(
                $pencairan['kode_item'],
                -$pencairan['jumlah']
            );

            if ($updateResult) {
                // Update where clause dengan primary key yang benar
                $deleteResult = $this->db->table('pencairan_pembinaan')
                    ->where('id_pencairan_pembinaan', $id)
                    ->delete();

                if ($deleteResult) {
                    $this->db->transCommit();
                    return true;
                }
            }

            $this->db->transRollback();
            return false;
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', $e->getMessage());
            throw new \InvalidArgumentException($e->getMessage());
        }
    }
}
