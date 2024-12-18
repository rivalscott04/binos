<?php

namespace App\Controllers;

use App\Models\ModelKegiatan;
use App\Models\ModelAkunOutput;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use PHPUnit\Framework\Constraint\Count;

class PaguAnggaran extends BaseController
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
        $builder = $this->db->table('paguanggaran');
        $builder->select('paguanggaran.*, suboutput.nama_sub_output, item.nama_item'); // Memilih kolom dari tabel paguanggaran, suboutput, dan item
        $builder->join('suboutput', 'paguanggaran.kode_sub_output = suboutput.kode_sub_output', 'left'); // Melakukan join LEFT dengan suboutput
        $builder->join('item', 'paguanggaran.kode_item = item.kode_item', 'left'); // Melakukan join LEFT dengan item
        $query = $builder->get(); // Menjalankan query
        $data['dtakun_pagu'] = $query->getResult(); // Mendapatkan hasil query dalam bentuk objek
        
        // $data['dtakun_output'] = $this->objOutput->AmbilRelasi();
        return view('master/pagu/index', $data);
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
        $builder = $this->db->table('item');
        $query = $builder->get();

        $builder2 = $this->db->table('suboutput');
        $query2 = $builder2->get();
        $data['dtakun_kegiatan'] = $query2->getResult();//$this->objKegiatan->findAll();
        $data['dtakun_program'] = $query->getResult();
        return view('master/pagu/new', $data);
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
            'kode_sub_output' => $this->request->getVar('kode_sub_output'),
            'kode_item' => $this->request->getVar('kode_item'),
            'jumlah_pagu' => $this->request->getVar('jumlah_pagu'),
            'jumlah_terpakai' => $this->request->getVar('jumlah_terpakai'),
        ];
        $this->db->table('paguanggaran')->insert($data);
        return redirect()->to(site_url('/master/pagu/index'))->with('success', 'Data Berhasil Disimpan');
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
        $builder = $this->db->table('paguanggaran');
        $query = $builder->where('id',$id)->get();
        $pagu = $query->getResult();
        $builder2 = $this->db->table('suboutput');
        $query2 = $builder2->get();
        $suboutput = $query2->getResult();
        var_dump($pagu);
        // $akunoutput = $this->objOutput->find($id);

        if (Count($pagu)>0) {
            $builder = $this->db->table('item');
            $query = $builder->get();
            $data['dtakun_kegiatan'] = $suboutput;
            $data['dtakun_program'] = $query->getResult();
            $data['pagu'] = $pagu ;
            return view('master/pagu/edit', $data);
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
            'kode_sub_output' => $this->request->getVar('kode_sub_output'),
            'kode_item' => $this->request->getVar('kode_item'),
            'jumlah_pagu' => $this->request->getVar('jumlah_pagu'),
            'jumlah_terpakai' => $this->request->getVar('jumlah_terpakai'),
        ];
        $this->db
            ->table('paguanggaran')
            ->where(['id' => $id])
            ->update($data);
        return redirect()->to(site_url('/master/pagu/index'))->with('success', 'Data Berhasil Disimpan');
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
        $this->db
            ->table('paguanggaran')
            ->where(['id' => $id])
            ->delete();
        return redirect()->to(site_url('master/pagu/index'))->with('success', 'Data Berhasil Dihapus');
    }
}
