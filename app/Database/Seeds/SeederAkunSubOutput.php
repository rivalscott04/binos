<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkunSubOutput extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_suboutput' => '1',
                'kode_suboutput' => 'BKA.052',
                'nama_suboutput' => 'Kegiatan / Operasi Intelijen Penyidikan, Pengamanan, dan Penggalangan di Kejaksaan Tinggi/ Kejaksaan Negeri/ Cabang Kejaksaan Negeri',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'id_suboutput' => '2',
                'kode_suboutput' => 'BKA.056',
                'nama_suboutput' => 'Pemantauan PEMILU (Legislatif, Pemilihan Presiden, Pemilihan Kepala Daerah)',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
            [
                'id_suboutput' => '3',
                'kode_suboutput' => 'BKA.054',
                'nama_suboutput' => 'Kegiatan Pengawasan Aliran Kepercayaan Masyarakat Di Kejaksaan Tinggi/Kejaksaan Negeri/Cabang Kejaksaan Negeri',
                'no_output' => '1',
                'no_program' => '1',
                'no_kegiatan' => '1'
            ],
        ];

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        // $this->db->table('pembinaan1')->insert($data);
        $this->db->table('akun_suboutput')->InsertBatch($data);
    }
}
