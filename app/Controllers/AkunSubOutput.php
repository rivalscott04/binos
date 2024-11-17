<?php

namespace App\Controllers;

use App\Models\ModelKegiatan;
use App\Models\ModelAkunOutput;
use App\Models\ModelAkunSubOutput;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class AkunSubOutput extends ResourceController
{
    protected $db;
    private $objSubOutput;
    private $objOutput;
    private $objKegiatan;

    function __construct()
    {
        $this->objKegiatan = new ModelKegiatan();
        $this->objOutput = new ModelAkunOutput();
        $this->objSubOutput = new ModelAkunSubOutput();
        $this->db = \Config\Database::connect(); //mengenalkan koneksi ke database
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtakun_suboutput'] = $this->objSubOutput->AmbilRelasi();
        return view('master/suboutput/index', $data);
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
        $data['dtakun_output'] = $this->objOutput->findAll();
        $data['dtakun_kegiatan'] = $this->objKegiatan->findAll();
        $data['dtakun_program'] = $query->getResult();
        return view('master/suboutput/new', $data);
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
            'no_suboutput' => $this->request->getVar('no_suboutput'),
            'kode_suboutput' => $this->request->getVar('kode_suboutput'),
            'nama_suboutput' => $this->request->getVar('nama_suboutput'),
            'no_output' => $this->request->getVar('no_output'),
            'no_kegiatan' => $this->request->getVar('no_kegiatan'),
            'no_program' => $this->request->getVar('no_program'),
        ];
        $this->db->table('akun_suboutput')->insert($data);
        return redirect()->to(site_url('/master/suboutput/index'))->with('success', 'Data Berhasil Disimpan');
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
        $akunoutput = $this->objOutput->findAll($id);
        $akunsuboutput = $this->objSubOutput->find($id);

        if (is_object($akunsuboutput)) {
            $data['dtakun_suboutput'] = $akunsuboutput;
            $data['dtakun_output'] = $akunoutput;
            $data['dtakun_kegiatan'] = $akunkegiatan;
            $data['dtakun_program'] = $query->getResult();
            return view('master/suboutput/edit', $data);
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
            'no_suboutput' => $this->request->getVar('no_suboutput'),
            'kode_suboutput' => $this->request->getVar('kode_suboutput'),
            'nama_suboutput' => $this->request->getVar('nama_suboutput'),
            'no_output' => $this->request->getVar('no_output'),
            'no_kegiatan' => $this->request->getVar('no_kegiatan'),
            'no_program' => $this->request->getVar('no_program'),
        ];
        $this->db->table('akun_suboutput')->where(['id_suboutput' => $id])->update($data);
        return redirect()->to(site_url('/master/suboutput/index'))->with('success', 'Data Berhasil Disimpan');
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
        $this->db->table('akun_suboutput')->where(['id_suboutput' => $id])->delete();
        return redirect()->to(site_url('master/suboutput/index'))->with('success', 'Data Berhasil Dihapus');
    }
}
