<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAkunAkun extends Model
{
    protected $table            = 'akun_akun';
    protected $primaryKey       = 'id_akun';
    protected $returnType       = 'object';
    protected $allowedFields    = ['no_akun', 'kode_akun', 'nama_akun', 'no_subkomponen', 'no_komponen', 'no_suboutput', 'no_output', 'no_kegiatan', 'no_program'];
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
        $builder = $this->db->table('akun_akun');
        $builder->join('akun_program', 'akun_program.no_program = akun_akun.no_program');
        $builder->join('akun_kegiatan', 'akun_kegiatan.no_kegiatan = akun_akun.no_kegiatan');
        $builder->join('akun_output', 'akun_output.no_output = akun_akun.no_output');
        $builder->join('akun_suboutput', 'akun_suboutput.no_suboutput = akun_akun.no_suboutput');
        $builder->join('akun_komponen', 'akun_komponen.no_komponen = akun_akun.no_komponen');
        $builder->join('akun_subkomponen', 'akun_subkomponen.no_subkomponen = akun_akun.no_subkomponen');
        $query = $builder->get();

        return $query->getResult();
    }
}
