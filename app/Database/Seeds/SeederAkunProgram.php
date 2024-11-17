<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkunProgram extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_program' => '1',
                'kode_program' => 'BF',
                'nama_program' => 'Program Penegakan dan Pelayanan Hukum'
            ],
            [
                'no_program' => '2',
                'kode_program' => 'WA',
                'nama_program' => 'Program Dukungan Manajemen'
            ],
        ];

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        // $this->db->table('pembinaan1')->insert($data);
        $this->db->table('akun_program')->InsertBatch($data);
    }
}
