<?php

namespace App\Controllers;

use App\Models\ModelAkunAkun;
use App\Models\ModelAkunItem;
use App\Models\ModelNilaiPembinaan;
use App\Models\ModelTransaksiPembinaan;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class TransaksiPembinaan extends ResourceController
{
    protected $db;
    private $objTransaksiPembinaan;
    private $objNilai;

    function __construct()
    {
        $this->objTransaksiPembinaan = new ModelTransaksiPembinaan();
        $this->objNilai = new ModelNilaiPembinaan();
        $this->db = \Config\Database::connect(); //mengenalkan koneksi ke database
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dttransaksi_pembinaan'] = $this->objTransaksiPembinaan->findAll();
        return view('transaksi/pembinaan/index', $data);
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
        $data['dttransaksi_pembinaan'] = $this->objTransaksiPembinaan->findAll();
        return view('transaksi/pembinaan/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        // $data = $this->request->getPost();
        $data1 = [
            // 'no_kwitansi' => $this->request->getVar('no_kwitansi'),
            'no_kwitansi' => $this->objTransaksiPembinaan->no_kwitansi(),
            'tanggal' => $this->request->getVar('tanggal'),
            'perihal' => $this->request->getVar('perihal'),
        ];
        //simpan data ke tbl transaksi pembinaan
        $this->db->table('tbl_transaksi_pembinaan')->insert($data1);

        //ambil id dari tbl transaksi 
        $id_transaksi_pembinaan = $this->objTransaksiPembinaan->InsertID();
        $kode_akun = $this->request->getVar('kode_akun');
        $kode_item = $this->request->getVar('kode_item');
        $rincian =   $this->request->getVar('rincian');
        $volume = $this->request->getVar('volume');
        $harga_satuan = $this->request->getVar('harga_satuan');
        $jumlah = $this->request->getVar('jumlah');

        for ($i = 0; $i < count($kode_akun); $i++) {
            $data2[] = [
                'id_transaksi_pembinaan' => $id_transaksi_pembinaan,
                'kode_akun' => $kode_akun[$i],
                'kode_item' => $kode_item[$i],
                'rincian' => $rincian[$i],
                'volume' => $volume[$i],
                'harga_satuan' => $harga_satuan[$i],
                'jumlah' => $jumlah[$i],
            ];
        }
        $this->objNilai->insertBatch($data2);
        return redirect()->to(site_url('/transaksi/pembinaan/index'))->with('success', 'Data Berhasil Disimpan');
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
        //
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
        //
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
        //
    }

    public function akun()
    {
        $akun = model(ModelAkunAkun::class);
        $result = $akun->findAll();
        return $this->response->setJSON($result);
    }

    public function item()
    {
        $akun = model(ModelAkunItem::class);
        $result = $akun->findAll();
        return $this->response->setJSON($result);
    }
}
