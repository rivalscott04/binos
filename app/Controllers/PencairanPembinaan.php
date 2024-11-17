<?php

namespace App\Controllers;

use App\Models\ModelPencairanPembinaan;
use CodeIgniter\RESTful\ResourceController;

class PencairanPembinaan extends ResourceController
{
    protected $db;
    private $objPencairanPembinaan;

    public function __construct()
    {
        $this->objPencairanPembinaan = new ModelPencairanPembinaan();
        $this->db = \Config\Database::connect(); // Mengenalkan koneksi ke database
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtpencairan_pembinaan'] = $this->objPencairanPembinaan->findAll();
        return view('pencairan/pembinaan/index', $data);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $data['dtpencairan_pembinaan'] = $this->objPencairanPembinaan->findAll();
        return view('pencairan/pembinaan/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = $this->request->getVar('data'); // Ambil data dari form (array JSON)

        try {
            // Gunakan fungsi model untuk insert batch dengan perhitungan otomatis
            $this->objPencairanPembinaan->insertBatchWithCalculation($data);
            return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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
        $this->db->table('pencairan_pembinaan')->where(['id_pencairan_pembinaan' => $id])->delete();
        return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Dihapus');
    }

    public function akun()
    {
        $akun = model(ModelAkunPembinaan::class);
        $result = $akun->findAll();
        return $this->response->setJSON($result);
    }

    public function item()
    {
        $akun = model(ModelAkunPembinaan::class);
        $result = $akun->findAll();
        return $this->response->setJSON($result);
    }
}
