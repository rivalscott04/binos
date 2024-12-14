<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeyToPaguanggaran extends Migration
{
    public function up()
    {
        // Menambahkan foreign key pada kolom kode_suboutput di tabel paguanggaran
        $this->forge->addForeignKey('kode_suboutput', 'suboutput', 'id_suboutput');
    }

    public function down()
    {
        // Menghapus foreign key jika migrasi dibatalkan
        $this->forge->dropForeignKey('paguanggaran', 'kode_suboutput');
    }
}
