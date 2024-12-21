<?php

namespace App\Models;

use CodeIgniter\Model;

class PaguAnggaran extends Model
{
    protected $table            = 'paguanggaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_item', 'jumlah_pagu', 'jumlah_terpakai'];

    /**
     * Perbarui jumlah terpakai dan kurangi jumlah pagu berdasarkan kode item.
     *
     * @param string $kodeItem Kode item yang akan diperbarui.
     * @param float  $jumlah   Jumlah yang akan ditambahkan ke jumlah terpakai.
     * @return bool
     * @throws \InvalidArgumentException
     */
    // Di model PaguAnggaran
    public function updateTerpakaiDanKurangiPagu($kodeItem, $jumlah, $isUpdate = false)
    {
        // Validasi data pagu
        $pagu = $this->where('kode_item', $kodeItem)->first();

        if (!$pagu) {
            throw new \InvalidArgumentException("Pagu dengan kode item $kodeItem tidak ditemukan.");
        }

        // Hitung nilai baru
        $jumlahTerpakaiBaru = $pagu['jumlah_terpakai'] + $jumlah;

        // Untuk operasi update, kita hanya ubah jumlah_terpakai
        if ($isUpdate) {
            if ($jumlahTerpakaiBaru < 0) {
                throw new \InvalidArgumentException("Operasi akan menyebabkan jumlah terpakai menjadi negatif.");
            }

            return $this->where('kode_item', $kodeItem)
                ->set([
                    'jumlah_terpakai' => $jumlahTerpakaiBaru
                ])
                ->update();
        }

        // Untuk operasi insert/delete, update kedua kolom
        $jumlahPaguBaru = $pagu['jumlah_pagu'] - $jumlah;

        if ($jumlahTerpakaiBaru < 0) {
            throw new \InvalidArgumentException("Operasi akan menyebabkan jumlah terpakai menjadi negatif.");
        }

        return $this->where('kode_item', $kodeItem)
            ->set([
                'jumlah_terpakai' => $jumlahTerpakaiBaru,
                'jumlah_pagu' => $jumlahPaguBaru,
            ])
            ->update();
    }
}
