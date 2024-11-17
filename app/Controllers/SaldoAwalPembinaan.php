<?php

namespace App\Controllers;

use App\Models\ModelAkunPembinaan;
use App\Models\ModelSaldoAwalPembinaan;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class SaldoAwalPembinaan extends ResourceController
{
    protected $db;
    private $objAkun;
    private $objSaldoAwalPembinaan;

    function __construct()
    {
        $this->objAkun = new ModelAkunPembinaan();
        $this->objSaldoAwalPembinaan = new ModelSaldoAwalPembinaan();
        $this->db = \Config\Database::connect(); //mengenalkan koneksi ke database
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtsaldoawal_pembinaan'] = $this->objSaldoAwalPembinaan->getAllAkun();
        return view('saldo/pembinaan/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $builder = $this->db->table('akun_pembinaan');
        $query = $builder->get();
        $data['dtakun_pembinaan'] = $query->getResult();
        return view('saldo/pembinaan/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {

        // Ambil nilai kode_item dari formulir
        $kode_item = $this->request->getVar('kode_item');

        // Query untuk mendapatkan id_akunpembinaan berdasarkan kode_item
        $akunPembinaan = $this->db->table('akun_pembinaan')
            ->where('kode_item', $kode_item)
            ->get()
            ->getRow();
        // Periksa jika akun_pembinaan ditemukan
        if ($akunPembinaan) {
            // Jika ditemukan, ambil id_akunpembinaan
            $id_akunpembinaan = $akunPembinaan->id_akunpembinaan;

            $data = [
                'id_akunpembinaan' => $id_akunpembinaan,
                'kode_item' => $kode_item,
                'saldo' => $this->request->getVar('saldo'),
            ];
            $this->db->table('saldoawal_pembinaan')->insert($data);
            return redirect()->to(site_url('/saldo/pembinaan/index'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
