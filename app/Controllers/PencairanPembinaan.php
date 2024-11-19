<?php

namespace App\Controllers;

use App\Models\ModelPencairanPembinaan;
use App\Models\ModelAkunPembinaan;
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
        var_dump($data);
        return view('pencairan/pembinaan/new', $data);
    }

    public function create()
    {
        $data = $this->request->getPost(); // Ambil data dari form
        var_dump($data['perihal']);
        // foreach ($data as $row) {
        //     echo $row;
        //     if (!isset($row['volume'], $row['harga_satuan'])) {
        //         throw new \InvalidArgumentException("Kolom 'volume' dan 'harga_satuan' harus disertakan");
        //     }
        // }

        // Debugging untuk memastikan data diterima
        if (!$data) {
            log_message('error', 'Data tidak ditemukan: ' . json_encode($this->request->getPost()));
            // return redirect()->back()->with('error', 'Data tidak ditemukan atau format tidak sesuai.');
        }

        try {
            $this->pencairanPembinaanModel->insertBatchWithCalculation($data);
            return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            // var_dump($data);
            // return redirect()->back()->with('error', $e->getMessage());
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
        // $akunt = model(ModelAkunPembinaan::class);
        $akun = new ModelAkunPembinaan();
        // var_dump($akun->getAllAkun());
        return $this->response->setJSON($akun->getAllAkun());
    }

    public function item()
    {
        $akun = model(ModelAkunPembinaan::class);
        return $this->response->setJSON($akun->findAll());
    }
}
