<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateForeignKeyInPaguanggaran extends Migration
{
    public function up()
    {

        // Menambahkan foreign key baru yang mengacu ke kode_suboutput pada tabel suboutput
        $this->forge->addForeignKey('kode_suboutput', 'suboutput', 'kode_suboutput');
    }

    public function down()
    {


        // Menambahkan kembali foreign key yang lama yang mengacu ke id_suboutput pada tabel suboutput
        $this->forge->addForeignKey('kode_suboutput', 'suboutput', 'id_suboutput', 'CASCADE', 'CASCADE');
    }
}
