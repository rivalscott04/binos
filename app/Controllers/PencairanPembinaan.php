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
            log_message('error', 'Gagal mengambil data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function new(): string
    {
        try {
            $data['kegiatan_akun'] = $this->pencairanPembinaanModel->getKegiatanDanAkun();
            $data['kode_item'] = $this->pencairanPembinaanModel->getKodeItem();

            // Tambahkan log untuk debugging
            log_message('debug', 'Data kegiatan dan uraian: ' . print_r($data['kegiatan_akun'], true));

            return view('pencairan/pembinaan/new', $data);
        } catch (\Exception $e) {
            log_message('error', 'Gagal mengambil data: ' . $e->getMessage());
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
            log_message('debug', 'Kode yang diterima: ' . $kode);

            // Ambil data berdasarkan kode (no_kwitansi)
            $data['data'] = $this->pencairanPembinaanModel->get_detail($kode);

            // Debugging: Log data yang ditemukan
            log_message('debug', 'Data yang ditemukan: ' . json_encode($data['data']));

            // Pastikan data tersedia
            if (empty($data['data'])) {
                throw new \Exception('Data tidak ditemukan');
            }

            return view('pencairan/pembinaan/detail', $data);
        } catch (\Exception $e) {
            log_message('error', 'Gagal mengambil detail data: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        $data = $this->request->getPost();

        // Log data yang diterima
        log_message('info', 'Data POST diterima: ' . print_r($data, true));

        if (empty($data)) {
            log_message('error', 'Data POST kosong atau tidak valid.');
            return redirect()->back()->with('error', 'Data tidak ditemukan atau format tidak sesuai.');
        }

        try {
            $this->pencairanPembinaanModel->insertBatchWithCalculation($data);
            log_message('info', 'Data berhasil disimpan ke database.');
            return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Disimpan');
        } catch (DatabaseException $e) {
            log_message('error', 'Database error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            log_message('error', 'Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function delete($id = null)
    {
        if (!$id) {
            log_message('error', 'ID tidak valid untuk penghapusan.');
            return redirect()->back()->with('error', 'ID tidak valid');
        }

        try {
            // Pastikan data ada sebelum dihapus
            if (!$this->pencairanPembinaanModel->find($id)) {
                log_message('error', 'Data dengan ID ' . $id . ' tidak ditemukan.');
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }

            // Gunakan method baru untuk delete dan update pagu
            if ($this->pencairanPembinaanModel->deletePencairanAndUpdatePagu($id)) {
                log_message('info', 'Data dengan ID ' . $id . ' berhasil dihapus dan pagu diperbarui.');
                return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Dihapus');
            } else {
                throw new \Exception('Gagal menghapus data.');
            }
        } catch (\InvalidArgumentException $e) {
            // Tangkap error spesifik dari model
            log_message('error', 'Validasi error: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            // Tangkap error umum
            log_message('error', 'Error saat menghapus data: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function prints($id = null)
    {
        try {
            $sekarang = $this->formatTanggalIndonesia(date('d-m-Y'));
            $data = $this->request->getGet();

            // Log parameter yang diterima
            log_message('info', 'Parameter GET diterima: ' . json_encode($data));

            // Validasi parameter
            if (empty($data['nota']) || empty($data['nomor']) || empty($data['tanggal']) || empty($data['jenis'])) {
                log_message('error', 'Parameter tidak lengkap: ' . json_encode($data));
                throw new \Exception('Parameter tidak lengkap. Pastikan semua input tersedia.');
            }

            // Validasi data Nota Dinas
            $notaDinas = $this->db->table('pencairan_pembinaan')
                ->where('no_kwitansi', $data['nota'])
                ->get()
                ->getRow();

            log_message('debug', 'Nota Dinas ditemukan: ' . json_encode($notaDinas));

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

            log_message('debug', 'Data Akun ditemukan: ' . json_encode($akun));

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
            log_message('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update($id = null)
    {

        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'perihal' => $this->request->getPost('perihal'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'rincian' => $this->request->getPost('rincian'),
            'volume' => $this->request->getPost('volume'),
            'harga_satuan' => $this->request->getPost('harga_satuan')
        ];

        try {
            if ($this->pencairanPembinaanModel->updateData($id, $data)) {
                return $this->response->setJSON([
                    'status' => 200,
                    'message' => 'Data berhasil diupdate'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 500,
                'message' => 'Gagal mengupdate data'
            ]);
        }
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
