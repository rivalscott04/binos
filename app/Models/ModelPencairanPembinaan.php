<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPencairanPembinaan extends Model
{
    protected $table            = 'pencairan_pembinaan';
    protected $primaryKey       = 'id_pencairan_pembinaan';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'no_kwitansi', 'tanggal', 'kegiatan', 'rincian', 'volume', 'harga_satuan', 'jumlah'
    ];
    protected $useTimestamps    = true;

    /**
     * Menghasilkan nomor kwitansi otomatis.
     * 
     * @return string
     */
    public function no_kwitansi(): string
    {
        $this->db->transStart();

        $number = $this->db->table($this->table)
            ->select('RIGHT(no_kwitansi,4) as no_kwitansi', false)
            ->orderBy('no_kwitansi', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();

        $this->db->transComplete();

        $no = ($number == null) ? 1 : intval($number['no_kwitansi']) + 1;
        return str_pad($no, 4, "0", STR_PAD_LEFT);
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

        foreach ($data as $row) {
            if (!isset($row['volume'], $row['harga_satuan'])) {
                throw new \InvalidArgumentException("Kolom 'volume' dan 'harga_satuan' harus disertakan");
            }

            $processedData[] = [
                'no_kwitansi' => $this->no_kwitansi(),
                'volume' => $row['volume'],
                'harga_satuan' => $row['harga_satuan'],
                'jumlah' => $row['volume'] * $row['harga_satuan'],
            ] + $row;
        }

        return $this->insertBatch($processedData);
    }
}
