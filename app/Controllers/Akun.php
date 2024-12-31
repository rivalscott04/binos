<?php

namespace App\Controllers;

use App\Models\ModelAkunPembinaan;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Akun extends ResourceController
{
    protected $db;
    private $objAkun;

    function __construct()
    {

        $this->objAkun = new ModelAkunPembinaan();
        $this->db = \Config\Database::connect(); //mengenalkan koneksi ke database
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtakun_pembinaan'] = $this->objAkun->getAllAkun();
        return view('akun/pembinaan/index', $data);
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
        return view('akun/pembinaan/new');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = $this->request->getPost();
        $data = [
            'program' => $this->request->getVar('program'),
            'kegiatan' => $this->request->getVar('kegiatan'),
            'output' => $this->request->getVar('output'),
            'suboutput' => $this->request->getVar('suboutput'),
            'komponen' => $this->request->getVar('komponen'),
            'subkomponen' => $this->request->getVar('subkomponen'),
            'akun' => $this->request->getVar('akun'),
            'kode_item' => $this->request->getVar('kode_item'),
            'nama_item' => $this->request->getVar('nama_item'),
            'saldo_awal' => $this->request->getVar('saldo'),
            'saldo' => $this->request->getVar('saldo'),
        ];
        $this->db->table('akun_pembinaan')->insert($data);
        return redirect()->to(site_url('/akun/pembinaan/index'))->with('success', 'Data Berhasil Disimpan');
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
        if ($id != null) {
            $query = $this->db->table('akun_pembinaan')->getWhere(['id_akunpembinaan' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['dtakun_pembinaan'] = $query->getRow();
                return view('/akun/pembinaan/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
        $data = [
            'program' => $this->request->getVar('program'),
            'kegiatan' => $this->request->getVar('kegiatan'),
            'output' => $this->request->getVar('output'),
            'suboutput' => $this->request->getVar('suboutput'),
            'komponen' => $this->request->getVar('komponen'),
            'subkomponen' => $this->request->getVar('subkomponen'),
            'akun' => $this->request->getVar('akun'),
            'kode_item' => $this->request->getVar('kode_item'),
            'nama_item' => $this->request->getVar('nama_item'),
            'saldo' => $this->request->getVar('saldo'),
        ];
        $this->db->table('akun_pembinaan')->where(['id_akunpembinaan' => $id])->update($data);
        return redirect()->to(site_url('/akun/pembinaan/index'))->with('success', 'Data Berhasil Di Update');
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
        $this->db->table('akun_pembinaan')->where(['id_akunpembinaan' => $id])->delete();
        return redirect()->to(site_url('akun/pembinaan/index'))->with('success', 'Data Berhasil Dihapus');
    }
}
