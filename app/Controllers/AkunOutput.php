<?php

namespace App\Controllers;

use App\Models\ModelKegiatan;
use App\Models\ModelAkunOutput;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class AkunOutput extends ResourceController
{

    protected $db;
    private $objOutput;
    private $objKegiatan;

    function __construct()
    {
        $this->objKegiatan = new ModelKegiatan();
        $this->objOutput = new ModelAkunOutput();
        $this->db = \Config\Database::connect(); //mengenalkan koneksi ke database
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtakun_output'] = $this->objOutput->AmbilRelasi();
        return view('master/output/index', $data);
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
        $data['dtakun_kegiatan'] = $this->objKegiatan->findAll();
        $data['dtakun_program'] = $query->getResult();
        return view('master/output/new', $data);
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
            'no_output' => $this->request->getVar('no_output'),
            'kode_output' => $this->request->getVar('kode_output'),
            'nama_output' => $this->request->getVar('nama_output'),
            'no_kegiatan' => $this->request->getVar('no_kegiatan'),
            'no_program' => $this->request->getVar('no_program'),
        ];
        $this->db->table('akun_output')->insert($data);
        return redirect()->to(site_url('/master/output/index'))->with('success', 'Data Berhasil Disimpan');
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

        $akunkegiatan = $this->objKegiatan->findAll($id);
        $akunoutput = $this->objOutput->find($id);

        if (is_object($akunoutput)) {
            $data['dtakun_output'] = $akunoutput;
            $data['dtakun_kegiatan'] = $akunkegiatan;
            $data['dtakun_program'] = $query->getResult();
            return view('master/output/edit', $data);
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
            'no_output' => $this->request->getVar('no_output'),
            'kode_output' => $this->request->getVar('kode_output'),
            'nama_output' => $this->request->getVar('nama_output'),
            'no_kegiatan' => $this->request->getVar('no_kegiatan'),
            'no_program' => $this->request->getVar('no_program'),
        ];
        $this->db->table('akun_output')->where(['id_output' => $id])->update($data);
        return redirect()->to(site_url('/master/output/index'))->with('success', 'Data Berhasil Disimpan');
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
        $this->db->table('akun_output')->where(['id_output' => $id])->delete();
        return redirect()->to(site_url('master/output/index'))->with('success', 'Data Berhasil Dihapus');
    }
}
