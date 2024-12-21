<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUniqueKeyToKodeAkun extends Migration
{
    public function up()
    {
        // Menambahkan unique key ke kolom kode_akun
        $this->forge->addKey('kode_akun', true); // true untuk unique
        $this->forge->modifyColumn('akun', [
            'kode_akun' => [
                'type' => 'VARCHAR',
                'constraint' => 100, // sesuaikan dengan ukuran kolom Anda
            ]
        ]);
    }

    public function down()
    {
        // Menghapus unique key dari kolom kode_akun
        $this->forge->dropKey('akun', 'kode_akun');
    }
}
