<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUniqueConstraintToKodeSuboutput extends Migration
{
    public function up()
    {
        // Menambahkan constraint UNIQUE pada kolom kode_suboutput di tabel suboutput
        $this->forge->addUniqueKey('kode_suboutput');
    }

    public function down()
    {
        // Menghapus constraint UNIQUE dengan menggunakan modifyColumn
        $this->forge->modifyColumn('suboutput', [
            'kode_suboutput' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ]
        ]);
    }
}
