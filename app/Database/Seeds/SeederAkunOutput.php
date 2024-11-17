<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkunOutput extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_output' => '1',
                'kode_output' => 'BKA',
                'nama_output' => 'Pemantauan Masyarakat dan Kelompok Masyarakat',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'no_output' => '2',
                'kode_output' => 'BKB',
                'nama_output' => 'Pemantauan Produk',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'no_output' => '3',
                'kode_output' => 'BAB',
                'nama_output' => 'Pelayanan Publik Kepada Lembaga',
                'no_program' => '1',
                'no_kegiatan' => '2'
            ],
        ];

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        // $this->db->table('pembinaan1')->insert($data);
        $this->db->table('akun_output')->InsertBatch($data);
    }
}
