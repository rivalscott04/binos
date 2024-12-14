<?php

namespace App\Models;

use CodeIgniter\Model;
use PHPUnit\Framework\Constraint\Count;

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
        foreach ($data['volume'] as $index => $val) {
            // Validasi data volume dan harga_satuan
            if (!isset($val) || !isset($data['harga_satuan'][$index])) {
                throw new \InvalidArgumentException("Kolom 'volume' dan 'harga_satuan' harus disertakan");
            }

            // Hanya lakukan cek pagu sekali
            if ($cek == 0) {
                // Query untuk mendapatkan data paguanggaran
                $pagu = $model
                    ->where('kode_item', $data['kode_item'][$index]) // Kolom yang diperiksa
                    ->get()
                    ->getResultArray();

                if (count($pagu) > 0) {
                    $lokasi = $pagu[0]['kode_item']; // Pastikan kolom ini sesuai dengan tabel
                    $cek = 1;
                }
            }

            // Menyiapkan data yang akan diolah
            $processedData[] = [
                'tanggal' => $data['tanggal'],
                'perihal' => $data['perihal'],
                'akun' => $data['akun'][$index],
                'kode_item' => $data['kode_item'][$index],
                'rincian' => $data['rincian'][$index],
                'no_kwitansi' => $this->no_kwitansi(),
                'volume' => $data['volume'][$index],
                'harga_satuan' => $data['harga_satuan'][$index],
                'jumlah' => $data['volume'][$index] * $data['harga_satuan'][$index],
            ];

            // Menghitung total jumlah
            $jumlah += $data['volume'][$index] * $data['harga_satuan'][$index];
        }

        // Cek apakah data pagu ditemukan
        if ($cek == 1) {
            $pagu = $model->where('kode_item', $lokasi)->get()->getResultArray();

            if (!empty($pagu) && ($pagu[0]['jumlah_terpakai'] + $jumlah) <= $pagu[0]['jumlah_pagu']) {
                // Jika saldo mencukupi, update jumlah_realisasi
                $model->where('kode_item', $lokasi)
                    ->set('jumlah_terpakai', "jumlah_terpakai + $jumlah", false) // false untuk raw query
                    ->update();

                // Simpan data batch
                return $this->db->table('pencairan_pembinaan')->insertBatch($processedData);
            } else {
                throw new \InvalidArgumentException('Sisa Pagu tidak cukup');
            }
        } else {
            throw new \InvalidArgumentException('Pagu tidak ditemukan untuk kode barang yang diberikan');
        }
    }

    public function updateData(int $id, array $data): bool
    {
        $processedData = [
            'tanggal' => $data['tanggal'],
            'perihal' => $data['perihal'],
            // 'akun' => $data['akun'],
            // 'kode_item' => $data['kode_item'],
            'rincian' => $data['rincian'],
            'no_kwitansi' => $this->no_kwitansi(),
            'volume' => $data['volume'],
            'harga_satuan' => $data['harga_satuan'],
            'jumlah' => $data['volume'] * $data['harga_satuan'],
        ];
        return $this->update($id, $processedData);
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
}
