<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederPembinaan1 extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_pembinaan1' => '1',
                'kode' => '6582.BCE.051',
                'uraian_kegiatan' => 'Perkara Pidana Umum Dalam Tahap Pra Penuntutan Pada Kejaksaan Tinggi/Kejaksaan Negeri/Cabang',
                'pagu_dalam_dipa' => 'Rp. 54.000.000',
                'spp_sd_bulan_lalu' => 'Rp. 34.323.845',
                'spp_bulan_ini' => 'Rp. 5.516.700',
                'jumlah_spp_sd_bulan_ini' => 'Rp. 39.840.545',
                'sisa_pagu' => 'Rp. 14.159.455'
            ],
            [
                'id_pembinaan1' => '2',
                'kode' => '051',
                'uraian_kegiatan' => 'Pra Penuntutan Perkara Tindak Pidana Umum',
                'pagu_dalam_dipa' => 'Rp. 54.000.000',
                'spp_sd_bulan_lalu' => 'Rp. 34.323.845',
                'spp_bulan_ini' => 'Rp. 5.516.700',
                'jumlah_spp_sd_bulan_ini' => 'Rp. 39.840.545',
                'sisa_pagu' => 'Rp. 14.159.455'
            ],
        ];

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        // $this->db->table('pembinaan1')->insert($data);
        $this->db->table('pembinaan1')->InsertBatch($data);
    }
}
