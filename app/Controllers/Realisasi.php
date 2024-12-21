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
        $builder = $this->db->table('paguanggaran');
        $builder->select('paguanggaran.*, suboutput.nama_suboutput, item.nama_item'); // Memilih kolom dari tabel paguanggaran, suboutput, dan item
        $builder->join('suboutput', 'paguanggaran.kode_suboutput = suboutput.kode_suboutput', 'left'); // Melakukan join LEFT dengan suboutput
        $builder->join('item', 'paguanggaran.kode_item = item.kode_item', 'left'); // Melakukan join LEFT dengan item
        $query = $builder->get(); // Menjalankan query
        $data['dtrealisasi_anggaran'] = $query->getResult(); // Mendapatkan hasil query dalam bentuk objek

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
