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

    /**
     * Mengambil data kegiatan dari tabel suboutput untuk dropdown.
     *
     * @return array
     */
    public function getKegiatan(): array
    {
        $db = \Config\Database::connect();
        return $db->table('suboutput')
            ->select('nama_suboutput as kegiatan')
            ->distinct()
            ->orderBy('nama_suboutput', 'ASC')
            ->get()
            ->getResultArray();
    }

    /**
     * Mengambil data akun dari tabel akun untuk dropdown.
     *
     * @return array
     */
    public function getAkun(): array
    {
        $db = \Config\Database::connect();
        return $db->table('akun_pembinaan')
            ->select('akun')
            ->distinct()
            ->get()
            ->getResultArray();
    }

    /**
     * Mengambil data kode item dari tabel item untuk dropdown.
     *
     * @return array
     */
    public function getKodeItem(): array
    {
        $db = \Config\Database::connect();
        return $db->table('akun_pembinaan')
            ->select('kode_item')
            ->distinct()
            ->get()
            ->getResultArray();
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
        $akunModel = new ModelAkunPembinaan();
        $cek = 0;
        $lokasi = '';
        $jumlah = 0;

        // Tambahkan log untuk debug
        log_message('debug', 'Received data: ' . print_r($data, true));

        foreach ($data['data'] as $index => $item) {
            if (!isset($item['volume']) || !isset($item['harga_satuan'])) {
                log_message('error', "Kolom 'volume' atau 'harga_satuan' tidak disertakan pada index {$index}");
                throw new \InvalidArgumentException("Kolom 'volume' dan 'harga_satuan' harus disertakan");
            }

            if ($cek == 0) {
                $akunData = $akunModel
                    ->where('kode_item', $item['kode_item'])
                    ->first();

                if ($akunData) {
                    $lokasi = $item['kode_item'];
                    $cek = 1;
                }
            }

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

        // Log data yang akan diinsert
        log_message('debug', 'Processed data for insert: ' . print_r($processedData, true));

        if ($cek == 1) {
            $akunData = $akunModel->where('kode_item', $lokasi)->first();

            if ($akunData && $jumlah <= $akunData->saldo) {
                try {
                    $this->db->transBegin();

                    $insertResult = $this->db->table('pencairan_pembinaan')->insertBatch($processedData);

                    if ($insertResult) {
                        $updateResult = $akunModel->updateSaldo($lokasi, $jumlah);

                        if ($updateResult) {
                            $this->db->transCommit();
                            return true;
                        }
                    }

                    $this->db->transRollback();
                    return false;
                } catch (\Exception $e) {
                    $this->db->transRollback();
                    log_message('error', 'Error during transaction: ' . $e->getMessage());
                    throw $e;
                }
            } else {
                log_message('error', "Saldo tidak mencukupi untuk kode item {$lokasi}. Diperlukan {$jumlah}.");
                throw new \InvalidArgumentException('Saldo tidak mencukupi');
            }
        } else {
            log_message('error', "Akun tidak ditemukan untuk kode item {$lokasi}");
            throw new \InvalidArgumentException('Akun tidak ditemukan untuk kode item yang diberikan');
        }
    }

    public function updateData(int $id, array $data): bool
    {
        $akunModel = new ModelAkunPembinaan();

        // Ambil data lama sebelum diupdate
        $oldData = $this->find($id);
        if (!$oldData) {
            throw new \InvalidArgumentException("Data pencairan tidak ditemukan.");
        }

        // Konversi ke array jika object
        $oldData = (array)$oldData;

        // Hitung jumlah baru
        $newJumlah = floatval($data['volume']) * floatval($data['harga_satuan']);
        $selisihJumlah = $newJumlah - floatval($oldData['jumlah']);

        // Siapkan data yang akan diupdate
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
                // Update saldo akun dengan selisih jumlah
                $updateAkunResult = $akunModel->updateSaldo(
                    $oldData['kode_item'],
                    $selisihJumlah
                );

                if ($updateAkunResult) {
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
        $akunModel = new ModelAkunPembinaan();

        $pencairan = $this->db->table('pencairan_pembinaan')
            ->where('id_pencairan_pembinaan', $id)
            ->get()
            ->getRowArray();

        if (!$pencairan) {
            throw new \InvalidArgumentException("Data pencairan tidak ditemukan.");
        }

        try {
            $this->db->transBegin();

            // Kembalikan saldo yang sudah terpakai (jumlah negatif untuk menambah saldo)
            $updateResult = $akunModel->updateSaldo(
                $pencairan['kode_item'],
                -$pencairan['jumlah']
            );

            if ($updateResult) {
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
