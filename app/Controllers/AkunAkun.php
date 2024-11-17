<?php

namespace App\Controllers;

use App\Models\ModelAkunAkun;
use App\Models\ModelKegiatan;
use App\Models\ModelAkunOutput;
use App\Models\ModelAkunKomponen;
use App\Models\ModelAkunSubOutput;
use App\Models\ModelAkunSubKomponen;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class AkunAkun extends ResourceController
{
    protected $db;
    private $objAkun;
    private $objSubKomponen;
    private $objKomponen;
    private $objSubOutput;
    private $objOutput;
    private $objKegiatan;

    function __construct()
    {
        $this->objKegiatan = new ModelKegiatan();
        $this->objOutput = new ModelAkunOutput();
        $this->objSubOutput = new ModelAkunSubOutput();
        $this->objKomponen = new ModelAkunKomponen();
        $this->objSubKomponen = new ModelAkunSubKomponen();
        $this->objAkun = new ModelAkunAkun();
        $this->db = \Config\Database::connect(); //mengenalkan koneksi ke database
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtakun_akun'] = $this->objAkun->AmbilRelasi();
        return view('master/akun/index', $data);
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
        $data['dtakun_subkomponen'] = $this->objSubKomponen->findAll();
        $data['dtakun_komponen'] = $this->objKomponen->findAll();
        $data['dtakun_suboutput'] = $this->objSubOutput->findAll();
        $data['dtakun_output'] = $this->objOutput->findAll();
        $data['dtakun_kegiatan'] = $this->objKegiatan->findAll();
        $data['dtakun_program'] = $query->getResult();
        return view('master/akun/new', $data);
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
            'no_akun' => $this->request->getVar('no_akun'),
            'kode_akun' => $this->request->getVar('kode_akun'),
            'nama_akun' => $this->request->getVar('nama_akun'),
            'no_subkomponen' => $this->request->getVar('no_subkomponen'),
            'no_komponen' => $this->request->getVar('no_komponen'),
            'no_suboutput' => $this->request->getVar('no_suboutput'),
            'no_output' => $this->request->getVar('no_output'),
            'no_kegiatan' => $this->request->getVar('no_kegiatan'),
            'no_program' => $this->request->getVar('no_program'),
        ];
        $this->db->table('akun_akun')->insert($data);
        return redirect()->to(site_url('/master/akun/index'))->with('success', 'Data Berhasil Disimpan');
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
        $akunsuboutput = $this->objSubOutput->findAll($id);
        $akunkomponen = $this->objKomponen->findAll($id);
        $akunsubkomponen = $this->objSubKomponen->findAll($id);
        $akunakun = $this->objAkun->find($id);

        if (is_object($akunakun)) {
            $data['dtakun_akun'] = $akunakun;
            $data['dtakun_subkomponen'] = $akunsubkomponen;
            $data['dtakun_komponen'] = $akunkomponen;
            $data['dtakun_suboutput'] = $akunsuboutput;
            $data['dtakun_output'] = $akunoutput;
            $data['dtakun_kegiatan'] = $akunkegiatan;
            $data['dtakun_program'] = $query->getResult();
            return view('master/akun/edit', $data);
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
            'no_akun' => $this->request->getVar('no_akun'),
            'kode_akun' => $this->request->getVar('kode_akun'),
            'nama_akun' => $this->request->getVar('nama_akun'),
            'no_subkomponen' => $this->request->getVar('no_subkomponen'),
            'no_komponen' => $this->request->getVar('no_komponen'),
            'no_suboutput' => $this->request->getVar('no_suboutput'),
            'no_output' => $this->request->getVar('no_output'),
            'no_kegiatan' => $this->request->getVar('no_kegiatan'),
            'no_program' => $this->request->getVar('no_program'),
        ];
        $this->db->table('akun_akun')->where(['id_akun' => $id])->update($data);
        return redirect()->to(site_url('/master/akun/index'))->with('success', 'Data Berhasil Disimpan');
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
        $this->db->table('akun_akun')->where(['id_akun' => $id])->delete();
        return redirect()->to(site_url('master/akun/index'))->with('success', 'Data Berhasil Dihapus');
    }
}
