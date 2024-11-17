<?php

namespace App\Controllers;

class AkunProgram extends BaseController
{

    protected $db;

    public function index()
    {
        $builder = $this->db->table('akun_program');
        $query = $builder->get();

        // $query = $this->db->query("SELECT * from pembinaan1");
        $data['dtakun_program'] = $query->getResult();
        return view('master/program/index', $data);

        // dd($query->getResult());
        // dd($query);
    }

    public function new()
    {
        return view('master/program/new');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $data = [
            'no_program' => $this->request->getVar('no_program'),
            'kode_program' => $this->request->getVar('kode_program'),
            'nama_program' => $this->request->getVar('nama_program'),
        ];
        $this->db->table('akun_program')->insert($data);
        return redirect()->to(site_url('/master/program/index'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null) //FORM AMBIL DATA
    {
        if ($id != null) {
            $query = $this->db->table('akun_program')->getWhere(['id_program' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['dtakun_program'] = $query->getRow();
                return view('/master/program/edit', $data);
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
            'no_program' => $this->request->getVar('no_program'),
            'kode_program' => $this->request->getVar('kode_program'),
            'nama_program' => $this->request->getVar('nama_program'),
        ];
        $this->db->table('akun_program')->where(['id_program' => $id])->update($data);
        return redirect()->to(site_url('/master/program/index'))->with('success', 'Data Berhasil Di Update');
    }

    public function destroy($id)
    {
        $this->db->table('akun_program')->where(['id_program' => $id])->delete();
        return redirect()->to(site_url('master/program/index'))->with('success', 'Data Berhasil Dihapus');
    }
}
