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
    ]; // Tambahkan kolom 'volume', 'harga_satuan', 'jumlah' jika digunakan

    protected $useTimestamps    = true;

    // Fungsi untuk menghasilkan nomor kwitansi secara otomatis
    public function no_kwitansi()
    {
        $number = $this->db->table('pencairan_pembinaan')->select('RIGHT(no_kwitansi,4) as no_kwitansi', FALSE)
            ->orderBy('no_kwitansi', 'DESC')->limit(1)->get()->getRowArray();

        if ($number == null) {
            $no = 1;
        } else {
            $no = intval($number['no_kwitansi']) + 1;
        }
        return str_pad($no, 4, "0", STR_PAD_LEFT); // Format nomor menjadi 4 digit, misalnya '0001'
    }

    // Fungsi untuk menyimpan data batch dengan perhitungan otomatis
    public function insertBatchWithCalculation(array $data)
    {
        foreach ($data as $key => $row) {
            if (!isset($row['volume'], $row['harga_satuan'])) {
                throw new \InvalidArgumentException("Kolom 'volume' dan 'harga_satuan' harus disertakan");
            }

            // Hitung jumlah berdasarkan volume dan harga_satuan
            $data[$key]['jumlah'] = $row['volume'] * $row['harga_satuan'];

            // Tambahkan nomor kwitansi otomatis jika belum ada
            $data[$key]['no_kwitansi'] = $this->no_kwitansi();
        }

        // Gunakan insertBatch untuk menyimpan data ke database
        return $this->db->table($this->table)->insertBatch($data);
    }
}
