<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkunAkun extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_akun' => '521211',
                'no_akun' => '1',
                'nama_akun' => 'Belanja Bahan',
                'no_subkomponen' => '1',
                'no_komponen' => '1',
                'no_suboutput' => '1',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'kode_akun' => '524111',
                'no_akun' => '2',
                'nama_akun' => 'Belanja Perjalanan Dinas',
                'no_subkomponen' => '1',
                'no_komponen' => '1',
                'no_suboutput' => '1',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'kode_akun' => '524113',
                'no_akun' => '3',
                'nama_akun' => 'Belanja Perjalanan Dinas Dalam Kota',
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
        $this->db->table('akun_akun')->InsertBatch($data);
    }
}
