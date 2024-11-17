<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkunKegiatan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_kegiatan' => '1',
                'kode_kegiatan' => 'BF.1102',
                'nama_kegiatan' => 'Penanganan Penyelidikan/Pengamanan/Penggalangan di Kejaksaan Tinggi, Kejaksaan Negeri dan Cabang Kejaksaan Negeri',
                'no_program' => '1'
            ],
            [
                'no_kegiatan' => '2',
                'kode_kegiatan' => 'BF.1103',
                'nama_kegiatan' => 'Penerangan dan Penyuluhan Hukum di Pusat dan Daerah',
                'no_program' => '1'
            ],
            [
                'no_kegiatan' => '3',
                'kode_kegiatan' => 'BF.6582',
                'nama_kegiatan' => 'Penanganan dan Penyelesaian Perkara Tindak Pidana Umum, Tindak Pidana Khusus, Perdata dan Tata Usaha Negara, Perkara Koneksitas Di Kejaksaan Tinggi, Kejaksaan Negeri dan Cabang Kejaksaan Negeri',
                'no_program' => '1'
            ],
            [
                'no_kegiatan' => '4',
                'kode_kegiatan' => 'WA.1090',
                'nama_kegiatan' => 'Dukungan Manajemen Jaksa Agung Muda, Kejaksaan Tinggi, Kejaksaan Negeri dan Cabang Kejaksaan Negeri',
                'no_program' => '2'
            ],
        ];

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        // $this->db->table('pembinaan1')->insert($data);
        $this->db->table('akun_kegiatan')->InsertBatch($data);
    }
}
