<?php

namespace App\Controllers;

use App\Models\ModelPencairanPembinaan;
use CodeIgniter\RESTful\ResourceController;

class PencairanPembinaan extends ResourceController
{
    protected $db;
    private $pencairanPembinaanModel;

    public function __construct()
    {
        $this->pencairanPembinaanModel = new ModelPencairanPembinaan();
        $this->db = \Config\Database::connect(); // Inisialisasi koneksi database
    }

    public function index(): string
    {
        $data['dtpencairan_pembinaan'] = $this->pencairanPembinaanModel->findAll();
        return view('pencairan/pembinaan/index', $data);
    }

    public function new(): string
    {
        $data['dtpencairan_pembinaan'] = $this->pencairanPembinaanModel->findAll();
        return view('pencairan/pembinaan/new', $data);
    }

    public function create()
    {
        $data = $this->request->getVar('data'); // Ambil data dari form (array JSON)

        try {
            $this->pencairanPembinaanModel->insertBatchWithCalculation($data);
            return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id = null)
    {
        if ($id && $this->pencairanPembinaanModel->delete($id)) {
            return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }

    public function akun()
    {
        $akun = model(ModelAkunPembinaan::class);
        return $this->response->setJSON($akun->findAll());
    }

    public function item()
    {
        $akun = model(ModelAkunPembinaan::class);
        return $this->response->setJSON($akun->findAll());
    }
}
