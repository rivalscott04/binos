<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Realisasi extends BaseController
{
    protected $db;


    function __construct()
    {
        $this->db = \Config\Database::connect(); //mengenalkan koneksi ke database
    }

    public function index()
    {
        $builder = $this->db->table('akun_pembinaan');
        $builder->select('
            akun_pembinaan.kegiatan,
            akun_pembinaan.saldo_awal as jumlah_pagu,
            akun_pembinaan.saldo,
            pencairan_pembinaan.rincian as nama_item,
            COALESCE(SUM(pencairan_pembinaan.jumlah), 0) as jumlah_terpakai
        ');
        $builder->join('pencairan_pembinaan', 'akun_pembinaan.kode_item = pencairan_pembinaan.kode_item', 'left');
        $builder->groupBy('akun_pembinaan.kode_item');
        $query = $builder->get();
        $data['dtrealisasi_anggaran'] = $query->getResult();

        return view('transaksi/Realisasi/index', $data);
    }

    public function new()
    {
        $query = $this->db->query(
            "SELECT * FROM paguanggaran WHERE paguanggaran.kode_item = ?",
            ['000126']
        );
        $result = $query->getResultArray();
        // echo $result[0];
    }
}
