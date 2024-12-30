<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAkunPembinaan extends Model
{
    protected $table            = 'akun_pembinaan';
    protected $primaryKey       = 'id_akunpembinaan';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['program',  'kegiatan', 'output',  'suboutput',  'komponen', 'subkomponen', 'no_item', 'akun', 'kode_item', 'nama_item', 'saldo'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function updateSaldo($kodeItem, $jumlah)
    {
        // Validasi data akun berdasarkan kode_item
        $akun = $this->where('kode_item', $kodeItem)->first();

        if (!$akun) {
            throw new \InvalidArgumentException("Akun dengan kode item $kodeItem tidak ditemukan.");
        }

        // Konversi objek stdClass ke array atau akses langsung properti objek
        $saldoBaru = $akun->saldo - $jumlah;

        if ($saldoBaru < 0) {
            throw new \InvalidArgumentException("Saldo tidak mencukupi. Sisa saldo: {$akun->saldo}, Dibutuhkan: {$jumlah}");
        }

        return $this->where('kode_item', $kodeItem)
            ->set(['saldo' => $saldoBaru])
            ->update();
    }
    public function getAllAkun()
    {
        return $this->findAll();
    }
}
