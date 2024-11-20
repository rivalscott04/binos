<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPencairanPembinaan extends Model
{
    protected $table = 'pencairan_pembinaan';
    protected $primaryKey = 'id_pencairan_pembinaan';
    protected $returnType = 'object';
    protected $allowedFields = ['akun', 'perihal', 'kode_item', 'no_surat', 'no_kwitansi', 'tanggal', 'kegiatan', 'rincian', 'volume', 'harga_satuan', 'jumlah'];
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

        foreach ($data['volume'] as $index => $val) {
            if (!isset($val)) {
                throw new \InvalidArgumentException("Kolom 'volume' dan 'harga_satuan' harus disertakan");
            }

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
        }
        // return true;
        return $this->insertBatch($processedData);
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
        return $this->select('pencairan_pembinaan.*, akun_pembinaan.nama_item, akun_pembinaan.akun')->join('akun_pembinaan', 'akun_pembinaan.kode_item = pencairan_pembinaan.kode_item')->where('pencairan_pembinaan.no_kwitansi', $kode)->findAll();
    }
}
