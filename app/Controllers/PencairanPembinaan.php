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
            $data['kegiatan'] = $this->pencairanPembinaanModel->getKegiatan();
            $data['akun'] = $this->pencairanPembinaanModel->getAkun();
            $data['kode_item'] = $this->pencairanPembinaanModel->getKodeItem();

            // Tambahkan log untuk debugging
            log_message('debug', 'Data kegiatan: ' . print_r($data['kegiatan'], true));
            log_message('debug', 'Data akun: ' . print_r($data['akun'], true));
            log_message('debug', 'Data kode_item: ' . print_r($data['kode_item'], true));

            return view('pencairan/pembinaan/new', $data);
        } catch (\Exception $e) {
            log_message('error', 'Gagal mengambil data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function create()
    {
        $data = $this->request->getPost();

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


    public function detail($kode = null)
    {
        try {
            if ($kode === null) {
                throw new \Exception('Kode tidak ditemukan');
            }

            log_message('debug', 'Kode yang diterima: ' . $kode);

            $data['data'] = $this->pencairanPembinaanModel->get_detail($kode);

            log_message('debug', 'Data yang ditemukan: ' . json_encode($data['data']));

            if (empty($data['data'])) {
                throw new \Exception('Data tidak ditemukan');
            }

            return view('pencairan/pembinaan/detail', $data);
        } catch (\Exception $e) {
            log_message('error', 'Gagal mengambil detail data: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function delete($id = null)
    {
        if (!$id) {
            log_message('error', 'ID tidak valid untuk penghapusan.');
            return redirect()->back()->with('error', 'ID tidak valid');
        }

        try {
            if (!$this->pencairanPembinaanModel->find($id)) {
                log_message('error', 'Data dengan ID ' . $id . ' tidak ditemukan.');
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }

            if ($this->pencairanPembinaanModel->deletePencairanAndUpdatePagu($id)) {
                log_message('info', 'Data dengan ID ' . $id . ' berhasil dihapus dan pagu diperbarui.');
                return redirect()->to(site_url('/pencairan/pembinaan/index'))->with('success', 'Data Berhasil Dihapus');
            } else {
                throw new \Exception('Gagal menghapus data.');
            }
        } catch (\InvalidArgumentException $e) {
            log_message('error', 'Validasi error: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            log_message('error', 'Error saat menghapus data: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function prints($id = null)
    {
        try {
            $sekarang = $this->formatTanggalIndonesia(date('d-m-Y'));
            $data = $this->request->getGet();

            log_message('info', 'Parameter GET diterima: ' . json_encode($data));

            if (empty($data['nota']) || empty($data['nomor']) || empty($data['tanggal']) || empty($data['jenis'])) {
                log_message('error', 'Parameter tidak lengkap: ' . json_encode($data));
                throw new \Exception('Parameter tidak lengkap. Pastikan semua input tersedia.');
            }

            $kode_item = $this->db->table('pencairan_pembinaan')
                ->select('kode_item')
                ->where('no_kwitansi', $data['nota'])
                ->get()
                ->getResult();

            if (empty($kode_item)) {
                throw new \Exception('Kode item tidak ditemukan untuk Nota Dinas ini');
            }

            $kode_item_list = array_map(function ($item) {
                return $item->kode_item;
            }, $kode_item);

            $notaDinas = $this->db->table('pencairan_pembinaan')
                ->where('no_kwitansi', $data['nota'])
                ->get()
                ->getRow();

            log_message('debug', 'Nota Dinas ditemukan: ' . json_encode($notaDinas));

            if (!$notaDinas) {
                throw new \Exception('Data Nota Dinas tidak ditemukan');
            }

            $this->pencairanPembinaanModel
                ->where('no_kwitansi', $data['nota'])
                ->set(['no_surat' => $data['nomor'], 'tgl_surat' => $data['tanggal']])
                ->update();

            $akun = $this->db->table('pencairan_pembinaan')
                ->select('pencairan_pembinaan.no_kwitansi, 
                     pencairan_pembinaan.kegiatan, 
                     akun_pembinaan.akun, 
                     SUM(pencairan_pembinaan.jumlah) as total_jumlah')
                ->join('akun_pembinaan', 'pencairan_pembinaan.akun = akun_pembinaan.akun', 'left')
                ->where('pencairan_pembinaan.no_kwitansi', $data['nota'])
                ->groupBy(['pencairan_pembinaan.no_kwitansi', 'akun_pembinaan.akun', 'pencairan_pembinaan.kegiatan'])
                ->get()
                ->getResult();

            log_message('debug', 'Data Akun ditemukan: ' . json_encode($akun));

            if (empty($akun)) {
                throw new \Exception('Data Akun tidak ditemukan');
            }

            // Modified to only use saldo_awal
            $paguAwal = [];
            foreach ($kode_item_list as $kodeItem) {
                $paguData = $this->db->table('akun_pembinaan')
                    ->select('saldo_awal')
                    ->where('kode_item', $kodeItem)
                    ->get()
                    ->getRow();

                log_message('debug', 'Data Saldo Awal dari akun_pembinaan: ' . json_encode($paguData));
                $paguAwal[$kodeItem] = $paguData ? $paguData->saldo_awal : 0;
            }

            $check_data = $this->db->table('pencairan_pembinaan')
                ->select('kegiatan, kode_item')
                ->where('no_kwitansi', $data['nota'])
                ->get()
                ->getResult();
            log_message('debug', 'Raw pencairan_pembinaan data: ' . json_encode($check_data));

            $dtrealisasi_anggaran = $this->db->table('pencairan_pembinaan')
                ->select('
                    pencairan_pembinaan.kode_item,
                    pencairan_pembinaan.kegiatan,
                    pencairan_pembinaan.rincian,
                    pencairan_pembinaan.tanggal,
                    item.nama_item,
                    pencairan_pembinaan.jumlah as jumlah_spp, 
                    akun_pembinaan.saldo_awal
                ')
                ->join('item', 'pencairan_pembinaan.kode_item = item.kode_item', 'left')
                ->join('akun_pembinaan', 'pencairan_pembinaan.kode_item = akun_pembinaan.kode_item', 'left')
                ->whereIn('pencairan_pembinaan.kode_item', $kode_item_list)
                ->orderBy('pencairan_pembinaan.tanggal', 'ASC')
                ->orderBy('pencairan_pembinaan.id_pencairan_pembinaan', 'ASC')
                ->get()
                ->getResult();

            // Inisialisasi array untuk tracking sisa pagu per kode item menggunakan saldo_awal
            $runningSisaPagu = [];
            foreach ($kode_item_list as $kodeItem) {
                $runningSisaPagu[$kodeItem] = $paguAwal[$kodeItem];
            }

            // Hitung sisa pagu secara berurutan
            foreach ($dtrealisasi_anggaran as $index => $row) {
                $row->pagu_dalam_dipa = $paguAwal[$row->kode_item];
                if ($index === 0 || $dtrealisasi_anggaran[$index - 1]->kode_item !== $row->kode_item) {
                    $runningSisaPagu[$row->kode_item] = $paguAwal[$row->kode_item];
                }
                $row->sisa_pagu = $runningSisaPagu[$row->kode_item] - $row->jumlah_spp;
                $runningSisaPagu[$row->kode_item] = $row->sisa_pagu;
            }

            log_message('debug', 'Data Realisasi Anggaran ditemukan: ' . json_encode($dtrealisasi_anggaran));

            if (empty($dtrealisasi_anggaran)) {
                throw new \Exception('Data Realisasi Anggaran tidak ditemukan');
            }

            $total_pembayaran = array_reduce($dtrealisasi_anggaran, function ($carry, $item) {
                return $carry + ($item->jumlah_spp ?? 0);
            }, 0);

            switch ($data['jenis']) {
                case 'nodis':
                    $isi = $this->pencairanPembinaanModel->get_detail($data['nota']);
                    return view('pencairan/pembinaan/nodis', compact('data', 'isi', 'sekarang', 'akun'));
                case 'sptjm':
                    return view('pencairan/pembinaan/sptjm', compact('data', 'sekarang', 'akun'));
                case 'spp':
                    $isi = $this->pencairanPembinaanModel->get_detail($data['nota']);
                    return view('pencairan/pembinaan/spp', compact('data', 'sekarang', 'akun', 'isi', 'dtrealisasi_anggaran', 'notaDinas', 'total_pembayaran'));
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
                // Set flashdata success
                session()->setFlashdata('success', 'Data berhasil diupdate');
                return redirect()->to('/pencairan/pembinaan/index'); // Redirect ke halaman utama
            } else {
                // Set flashdata error
                session()->setFlashdata('error', 'Gagal mengupdate data');
                return redirect()->to('/pencairan/pembinaan/index'); // Redirect tetap ke halaman utama
            }
        } catch (\Exception $e) {
            // Set flashdata untuk error yang tidak terduga
            session()->setFlashdata('error', 'Terjadi kesalahan saat mengupdate data');
            return redirect()->to('/pencairan/pembinaan/index');
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
