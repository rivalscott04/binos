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
        return view('pencairan/pembinaan/new', $data);
    }
    public function detail($id = null)
    {
        $data['data'] = $this->pencairanPembinaanModel->get_detail($id);
        // var_dump($data['data'][0]->no_surat);
        // var_dump($data['data'][0]['tanggal']);
        // var_dump($data['data']);
        return view('pencairan/pembinaan/detail', $data);
    }

    public function create()
    {
        $data = $this->request->getPost(); // Ambil data dari form
        // Debugging untuk memastikan data diterima
        if (!$data) {
            log_message('error', 'Data tidak ditemukan: ' . json_encode($this->request->getPost()));
            return redirect()->back()->with('error', 'Data tidak ditemukan atau format tidak sesuai.');
        }

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

    public function edit($id = null)
    {
        $data['dtpencairan_pembinaan'] = $this->pencairanPembinaanModel->findAll();
        return $this->response->setJSON($data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        if ($id && $this->pencairanPembinaanModel->updateData($id, $data)) {
            return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Gagal mengubah data.');
    }

    public function prints($id = null)
    {
        $sekarang = $this->formatTanggalIndonesia(date('d-m-Y'));
        $data = $this->request->getGet();
        // var_dump($data);
        $cek = $this->pencairanPembinaanModel
            ->where('no_kwitansi', $data['nota'])
            ->set(['no_surat' => $data['nomor'], 'tgl_surat' => $data['tanggal']])
            ->update(); //updateNomor($data['nota'], $data['no']);

        if ($data['jenis'] == 'nodis') {
            $isi = $this->pencairanPembinaanModel->get_detail($data['nota']);
            return view('pencairan/pembinaan/nodis', compact('data', 'isi', 'sekarang'));
        } elseif ($data['jenis'] == 'sptjm') {
            return view('pencairan/pembinaan/sptjm', compact('data', 'sekarang'));
        } elseif ($data['jenis'] == 'spp') {
            $builder = $this->db->table('paguanggaran');
            $builder->select('paguanggaran.*, suboutput.nama_sub_output, item.nama_item'); // Memilih kolom dari tabel paguanggaran, suboutput, dan item
            $builder->join('suboutput', 'paguanggaran.kode_sub_output = suboutput.kode_sub_output', 'left'); // Melakukan join LEFT dengan suboutput
            $builder->join('item', 'paguanggaran.kode_item = item.kode_item', 'left'); // Melakukan join LEFT dengan item
            $query = $builder->get(); // Menjalankan query
            $dtrealisasi_anggaran = $query->getResult();
            return view('pencairan/pembinaan/spp', compact('data', 'sekarang', 'dtrealisasi_anggaran'));
        }
        // var_dump($cek);
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
        // $akun = model(ModelAkunPembinaan::class);
        $builder = $this->db->table('item');
        $query = $builder->get();
        $data = $query->getResultArray();
        return $this->response->setJSON($data);
    }

    public function formatTanggalIndonesia($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $tanggalObj = new \DateTime($tanggal); // Pastikan format inputnya valid
        $hari = $tanggalObj->format('j'); // Hari (tanpa leading zero)
        $bulanIndo = $bulan[(int) $tanggalObj->format('n')]; // Bulan dalam Bahasa Indonesia
        $tahun = $tanggalObj->format('Y'); // Tahun

        return "$hari $bulanIndo $tahun";
    }
}
