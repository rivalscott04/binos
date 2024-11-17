<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAkunKomponen extends Model
{
    protected $table            = 'akun_komponen';
    protected $primaryKey       = 'id_komponen';
    protected $returnType       = 'object';
    protected $allowedFields    = ['no_komponen', 'kode_komponen', 'nama_komponen', 'no_suboutput', 'no_output', 'no_kegiatan', 'no_program'];
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
        $builder = $this->db->table('akun_komponen');
        $builder->join('akun_program', 'akun_program.no_program = akun_komponen.no_program');
        $builder->join('akun_kegiatan', 'akun_kegiatan.no_kegiatan = akun_komponen.no_kegiatan');
        $builder->join('akun_output', 'akun_output.no_output = akun_komponen.no_output');
        $builder->join('akun_suboutput', 'akun_suboutput.no_suboutput = akun_komponen.no_suboutput');
        $query = $builder->get();

        return $query->getResult();
    }
}
