<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkunKomponen extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_komponen' => '005',
                'no_komponen' => '1',
                'nama_komponen' => 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit',
                'no_suboutput' => '1',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'kode_komponen' => '051',
                'no_komponen' => '2',
                'nama_komponen' => 'Pelaksanaan',
                'no_suboutput' => '2',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'kode_komponen' => '005',
                'no_komponen' => '3',
                'nama_komponen' => 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit',
                'no_suboutput' => '3',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
        ];

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        // $this->db->table('pembinaan1')->insert($data);
        $this->db->table('akun_komponen')->InsertBatch($data);
    }
}
