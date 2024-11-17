<?php

namespace App\Controllers;

use App\Models\ModelKegiatan;
use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;
use CodeIgniter\RESTful\ResourceController;

class AkunKegiatan extends ResourceController
{
    protected $db;
    private $objProgram;
    private $objKegiatan;

    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objProgram = new ModelKegiatan();
        $this->objKegiatan = new ModelKegiatan();
        $this->db = \Config\Database::connect(); //mengenalkan koneksi ke database
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        // $data['dtakun_kegiatan'] = $this->objProgram->findAll();
        $data['dtakun_kegiatan'] = $this->objProgram->AmbilRelasi();
        return view('master/kegiatan/index', $data);
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
        $builder = $this->db->table('akun_program');
        $query = $builder->get();
        $data['dtakun_program'] = $query->getResult();
        return view('master/kegiatan/new', $data);
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
            'no_kegiatan' => $this->request->getVar('no_kegiatan'),
            'kode_kegiatan' => $this->request->getVar('kode_kegiatan'),
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'no_program' => $this->request->getVar('no_program'),
        ];
        $this->db->table('akun_kegiatan')->insert($data);
        return redirect()->to(site_url('/master/kegiatan/index'))->with('success', 'Data Berhasil Disimpan');
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
        $builder = $this->db->table('akun_program');
        $query = $builder->get();

        $akunkegiatan = $this->objKegiatan->find($id);
        if (is_object($akunkegiatan)) {
            $data['dtakun_kegiatan'] = $akunkegiatan;
            $data['dtakun_program'] = $query->getResult();
            return view('master/kegiatan/edit', $data);
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
            'no_kegiatan' => $this->request->getVar('no_kegiatan'),
            'kode_kegiatan' => $this->request->getVar('kode_kegiatan'),
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'no_program' => $this->request->getVar('no_program'),
        ];
        $this->db->table('akun_kegiatan')->where(['id_kegiatan' => $id])->update($data);
        return redirect()->to(site_url('/master/kegiatan/index'))->with('success', 'Data Berhasil Disimpan');
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
        $this->db->table('akun_kegiatan')->where(['id_kegiatan' => $id])->delete();
        return redirect()->to(site_url('master/kegiatan/index'))->with('success', 'Data Berhasil Dihapus');
    }
}
