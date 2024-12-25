<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUniqueKeyToNamaSuboutput extends Migration
{
    public function up()
    {
        // Menambahkan unique key ke kolom nama_suboutput
        $this->forge->addKey('nama_suboutput', true); // true untuk unique
        $this->forge->modifyColumn('suboutput', [
            'nama_suboutput' => [
                'type' => 'VARCHAR',
                'constraint' => 500, // sesuaikan dengan ukuran kolom Anda
            ]
        ]);
    }

    public function down()
    {
        // Menghapus unique key dari kolom nama_suboutput
        $this->forge->dropKey('suboutput', 'nama_suboutput');
    }
}
