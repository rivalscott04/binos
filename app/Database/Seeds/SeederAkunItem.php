<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkunItem extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_item' => '000001',
                'no_item' => '1',
                'nama_item' => 'Pengadaan ATK',
                'no_akun' => '1',
                'no_subkomponen' => '1',
                'no_komponen' => '1',
                'no_suboutput' => '1',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'kode_item' => '000273',
                'no_item' => '2',
                'nama_item' => 'Uang Harian Kegiatan Lid/Pam/Gal',
                'no_akun' => '2',
                'no_subkomponen' => '1',
                'no_komponen' => '1',
                'no_suboutput' => '1',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
        ];

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        // $this->db->table('pembinaan1')->insert($data);
        $this->db->table('akun_item')->InsertBatch($data);
    }
}
