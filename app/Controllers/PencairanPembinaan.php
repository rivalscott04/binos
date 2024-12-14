<?php

namespace App\Controllers;

use App\Models\ModelPencairanPembinaan;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Database\Exceptions\DatabaseException;

class PencairanPembinaan extends ResourceController
{
    protected $pencairanPembinaanModel;
    protected $db;

    // Dependency Injection untuk ModelPencairanPembinaan
    public function __construct()
    {
        $this->pencairanPembinaanModel = new ModelPencairanPembinaan();
        $this->db = \Config\Database::connect(); // Inisialisasi koneksi database
    }

    public function index(): string
    {
        try {
            $data['dtpencairan_pembinaan'] = $this->pencairanPembinaanModel->findAll();
            return view('pencairan/pembinaan/index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function new(): string
    {
        try {
            $data['dtpencairan_pembinaan'] = $this->pencairanPembinaanModel->findAll();
            return view('pencairan/pembinaan/new', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function detail($kode = null)
    {
        try {
            // Pastikan kode yang diterima valid
            if ($kode === null) {
                throw new \Exception('Kode tidak ditemukan');
            }

            // Debugging: Log kode yang diterima
            if (ENVIRONMENT === 'development') {
                log_message('debug', 'Kode yang diterima: ' . $kode);
            }

            // Ambil data berdasarkan kode (no_kwitansi)
            $data['data'] = $this->pencairanPembinaanModel->get_detail($kode);

            // Debugging: Log data yang ditemukan
            if (ENVIRONMENT === 'development') {
                log_message('debug', 'Data yang ditemukan: ' . json_encode($data['data']));
            }

            // Pastikan data tersedia
            if (empty($data['data'])) {
                throw new \Exception('Data tidak ditemukan');
            }

            return view('pencairan/pembinaan/detail', $data);
        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi masalah
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        $data = $this->request->getPost();

        // Pastikan data diterima dengan benar
        if (empty($data)) {
            return redirect()->back()->with('error', 'Data tidak ditemukan atau format tidak sesuai.');
        }

        try {
            // Pastikan insert berhasil
            $this->pencairanPembinaanModel->insertBatchWithCalculation($data);
            return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Disimpan');
        } catch (DatabaseException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function delete($id = null)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak valid');
        }

        try {
            // Pastikan data ada sebelum dihapus
            if (!$this->pencairanPembinaanModel->find($id)) {
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }

            if ($this->pencairanPembinaanModel->delete($id)) {
                return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Dihapus');
            } else {
                throw new \Exception('Gagal menghapus data.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id = null)
    {
        try {
            $data['dtpencairan_pembinaan'] = $this->pencairanPembinaanModel->findAll();
            return $this->response->setJSON($data);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Gagal mengambil data: ' . $e->getMessage()]);
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();

        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak valid');
        }

        try {
            // Pastikan data valid sebelum diupdate
            if (!$this->pencairanPembinaanModel->find($id)) {
                return redirect()->back()->with('error', 'ID tidak ditemukan.');
            }

            if ($this->pencairanPembinaanModel->updateData($id, $data)) {
                return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Diubah');
            } else {
                throw new \Exception('Gagal mengubah data.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function prints($id = null)
    {
        try {
            $sekarang = $this->formatTanggalIndonesia(date('d-m-Y'));
            $data = $this->request->getGet();

            // Validasi parameter
            if (empty($data['nota']) || empty($data['nomor']) || empty($data['tanggal']) || empty($data['jenis'])) {
                throw new \Exception('Parameter tidak lengkap. Pastikan semua input tersedia.');
            }

            // Validasi data Nota Dinas
            $notaDinas = $this->db->table('pencairan_pembinaan')
                ->where('no_kwitansi', $data['nota'])
                ->get()
                ->getRow();

            if (!$notaDinas) {
                throw new \Exception('Data Nota Dinas tidak ditemukan');
            }

            // Update nomor dan tanggal Nota Dinas
            $this->pencairanPembinaanModel
                ->where('no_kwitansi', $data['nota'])
                ->set(['no_surat' => $data['nomor'], 'tgl_surat' => $data['tanggal']])
                ->update();

            // Ambil data Akun
            $akun = $this->db->table('pencairan_pembinaan')
                ->select('pencairan_pembinaan.no_kwitansi, SUM(pencairan_pembinaan.jumlah) as total_jumlah, akun.kode_akun, akun.nama_akun')
                ->join('akun', 'pencairan_pembinaan.akun = akun.kode_akun', 'left')
                ->where('pencairan_pembinaan.no_kwitansi', $data['nota'])
                ->groupBy(['pencairan_pembinaan.no_kwitansi', 'akun.kode_akun', 'akun.nama_akun'])
                ->get()
                ->getResult();

            if (empty($akun)) {
                throw new \Exception('Data Akun tidak ditemukan');
            }

            // Jenis cetakan
            switch ($data['jenis']) {
                case 'nodis':
                    $isi = $this->pencairanPembinaanModel->get_detail($data['nota']);
                    return view('pencairan/pembinaan/nodis', compact('data', 'isi', 'sekarang', 'akun'));
                case 'sptjm':
                    return view('pencairan/pembinaan/sptjm', compact('data', 'sekarang', 'akun'));
                case 'spp':
                    $isi = $this->pencairanPembinaanModel->get_detail($data['nota']);
                    $dtrealisasi_anggaran = $this->db->table('paguanggaran')
                        ->select('paguanggaran.*, suboutput.nama_suboutput, item.nama_item')
                        ->join('suboutput', 'paguanggaran.kode_suboutput = suboutput.id_suboutput', 'left')
                        ->join('item', 'paguanggaran.kode_item = item.kode_item', 'left')
                        ->get()
                        ->getResult();

                    return view('pencairan/pembinaan/spp', compact('data', 'sekarang', 'akun', 'isi', 'dtrealisasi_anggaran', 'notaDinas'));
                default:
                    throw new \Exception('Jenis cetakan tidak valid');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        log_message('debug', 'Data diterima: ' . json_encode($data));
        log_message('debug', 'Nota Dinas: ' . $data['nota']);
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
            12 => 'Desember'
        ];

        $tanggalObj = \DateTime::createFromFormat('d-m-Y', $tanggal);
        if (!$tanggalObj) {
            throw new \Exception("Format tanggal tidak valid. Harap gunakan format d-m-Y.");
        }

        return $tanggalObj->format('j') . ' ' . $bulan[(int) $tanggalObj->format('n')] . ' ' . $tanggalObj->format('Y');
    }
}
