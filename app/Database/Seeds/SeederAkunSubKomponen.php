<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkunSubKomponen extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_subkomponen' => '005.0A',
                'no_subkomponen' => '1',
                'nama_subkomponen' => 'TANPA SUB KOMPONEN',
                'no_komponen' => '1',
                'no_suboutput' => '1',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'kode_subkomponen' => '051.0A',
                'no_subkomponen' => '2',
                'nama_subkomponen' => 'Pemantauan Pemilihan Umum Tahun 2024',
                'no_komponen' => '2',
                'no_suboutput' => '2',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'kode_subkomponen' => '005.0A',
                'no_subkomponen' => '3',
                'nama_subkomponen' => 'TANPA SUB KOMPONEN',
                'no_komponen' => '3',
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
        $this->db->table('akun_subkomponen')->InsertBatch($data);
    }
}
