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
    
        // Update nomor dan tanggal Nota Dinas
        $this->pencairanPembinaanModel
            ->where('no_kwitansi', $data['nota'])
            ->set(['no_surat' => $data['nomor'], 'tgl_surat' => $data['tanggal']])
            ->update();
    
        // Ambil data Nota Dinas
        $isi = $this->pencairanPembinaanModel->get_detail($data['nota']);
    
        if ($data['jenis'] == 'spp') {
            // Ambil data dari paguanggaran
            $builder = $this->db->table('paguanggaran');
            $builder->select('paguanggaran.*, suboutput.nama_sub_output, item.nama_item');
            $builder->join('suboutput', 'paguanggaran.kode_sub_output = suboutput.kode_sub_output', 'left');
            $builder->join('item', 'paguanggaran.kode_item = item.kode_item', 'left');
            $query = $builder->get();
            $dtrealisasi_anggaran = $query->getResult();
    
            // Gabungkan nama_item dan rincian untuk Nota Dinas
            $kegiatan = implode(', ', array_map(function ($item) {
                return $item->nama_item . ' - ' . $item->rincian;
            }, $isi));
    
            // Kirim data ke view
            return view('pencairan/pembinaan/spp', compact('data', 'sekarang', 'isi', 'dtrealisasi_anggaran', 'kegiatan'));
        }
    
        // Handle jenis lainnya seperti nodis dan sptjm
        return parent::prints($id);
    }
    

    public function akun()
    {
        // $akunt = model(ModelAkunPembinaan::class);
        // $akun = new ModelAkunPembinaan();
        // var_dump($akun->getAllAkun());

        $builder = $this->db->table('akun');
        $query = $builder->get();
        $data = $query->getResultArray();
        return $this->response->setJSON($data);
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


function terbilang($angka)
{
    $angka = abs($angka);
    $terbilang = [
        "", "satu", "dua", "tiga", "empat", "lima",
        "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
    ];
    $hasil = "";
    if ($angka < 12) {
        $hasil = " " . $terbilang[$angka];
    } elseif ($angka < 20) {
        $hasil = terbilang($angka - 10) . " belas";
    } elseif ($angka < 100) {
        $hasil = terbilang(floor($angka / 10)) . " puluh" . terbilang($angka % 10);
    } elseif ($angka < 200) {
        $hasil = " seratus" . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        $hasil = terbilang(floor($angka / 100)) . " ratus" . terbilang($angka % 100);
    } elseif ($angka < 2000) {
        $hasil = " seribu" . terbilang($angka - 1000);
    } elseif ($angka < 1000000) {
        $hasil = terbilang(floor($angka / 1000)) . " ribu" . terbilang($angka % 1000);
    } elseif ($angka < 1000000000) {
        $hasil = terbilang(floor($angka / 1000000)) . " juta" . terbilang($angka % 1000000);
    } elseif ($angka < 1000000000000) {
        $hasil = terbilang(floor($angka / 1000000000)) . " miliar" . terbilang(fmod($angka, 1000000000));
    } else {
        $hasil = "Angka terlalu besar";
    }
    return trim($hasil);
}

