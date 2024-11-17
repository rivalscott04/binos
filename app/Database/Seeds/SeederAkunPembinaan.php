<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkunPembinaan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'program' => 'WA | Program Dukungan Manajemen',
                'kegiatan' => 'WA.1090 | Dukungan Manajemen Jaksa Agung Muda, Kejaksaan Tinggi, Kejaksaan Negeri dan Cabang Kejaksaan Negeri',
                'output' => 'CCL | OM Sarana Bidang Teknologi Informasi dan Komunikasi',
                'suboutput' => 'CCL.051 | Penambahan Layanan Internet, Instalasi Jaringan dan Langganan Vsat',
                'komponen' => '051 | Pelaksanaan',
                'subkomponen' => '051.0A | Langganan Jaringan Internet',
                'akun' => '522191 | Belanja Jasa Lainnya',
                'kode_item' => '000116',
                'nama_item' => 'Layanan Internet',
                'saldo' => 50000,
            ],
        ];
        $this->db->table('akun_pembinaan')->InsertBatch($data);
    }
}
