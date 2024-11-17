<?php

namespace App\Controllers;

class Pembinaan1 extends BaseController
{
    public function pembinaan1()
    {


        $builder = $this->db->table('pembinaan1');
        $query = $builder->get();

        // $query = $this->db->query("SELECT * from pembinaan1");
        $data['dtpembinaan1'] = $query->getResult();
        return view('SPP/pembinaan/pembinaan1', $data);

        // dd($query->getResult());
        // dd($query);
    }

    public function new()
    {
        return view('SPP/pembinaan/new');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $data = [
            'kode' => $this->request->getVar('kode'),
            'uraian_kegiatan' => $this->request->getVar('uraian_kegiatan'),
            'pagu_dalam_dipa' => $this->request->getVar('pagu_dalam_dipa'),
            'spp_sd_bulan_lalu' => $this->request->getVar('spp_sd_bulan_lalu'),
            'spp_bulan_ini' => $this->request->getVar('spp_bulan_ini'),
            'jumlah_spp_sd_bulan_ini' => $this->request->getVar('jumlah_spp_sd_bulan_ini'),
            'sisa_pagu' => $this->request->getVar('sisa_pagu'),
        ];
        $this->db->table('pembinaan1')->insert($data);
        return redirect()->to(site_url('/SPP/pembinaan1'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null) //FORM AMBIL DATA
    {
        if ($id != null) {
            $query = $this->db->table('pembinaan1')->getWhere(['id_pembinaan1' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['dtpembinaan1'] = $query->getRow();
                return view('/SPP/pembinaan/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $data = [
            'kode' => $this->request->getVar('kode'),
            'uraian_kegiatan' => $this->request->getVar('uraian_kegiatan'),
            'pagu_dalam_dipa' => $this->request->getVar('pagu_dalam_dipa'),
            'spp_sd_bulan_lalu' => $this->request->getVar('spp_sd_bulan_lalu'),
            'spp_bulan_ini' => $this->request->getVar('spp_bulan_ini'),
            'jumlah_spp_sd_bulan_ini' => $this->request->getVar('jumlah_spp_sd_bulan_ini'),
            'sisa_pagu' => $this->request->getVar('sisa_pagu'),
        ];
        $this->db->table('pembinaan1')->where(['id_pembinaan1' => $id])->update($data);
        return redirect()->to(site_url('/SPP/pembinaan/pembinaan1'))->with('success', 'Data Berhasil Di Update');
    }

    public function destroy($id)
    {
        $this->db->table('pembinaan1')->where(['id_pembinaan1' => $id])->delete();
        return redirect()->to(site_url('SPP/pembinaan/pembinaan1'))->with('success', 'Data Berhasil Dihapus');
    }
}
