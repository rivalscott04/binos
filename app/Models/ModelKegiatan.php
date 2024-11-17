<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKegiatan extends Model
{
    protected $table            = 'akun_kegiatan';
    protected $primaryKey       = 'id_kegiatan';
    protected $returnType       = 'object';
    protected $allowedFields    = ['no_kegiatan', 'kode_kegiatan', 'nama_kegiatan', 'no_program'];
    // protected $useAutoIncrement = true;
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;

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

    function AmbilRelasi()
    {
        $builder = $this->db->table('akun_kegiatan');
        $builder->join('akun_program', 'akun_program.no_program = akun_kegiatan.no_program');
        $query = $builder->get();

        return $query->getResult();
    }
}
