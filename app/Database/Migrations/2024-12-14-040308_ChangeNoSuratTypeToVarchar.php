<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeNoSuratTypeToVarchar extends Migration
{
    public function up()
    {
        // Mengubah tipe data kolom no_surat menjadi VARCHAR
        $this->forge->modifyColumn('pencairan_pembinaan', [
            'tgl_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
    }

    public function down()
    {
        // Mengembalikan tipe data kolom no_surat jika migrasi dibatalkan
        $this->forge->modifyColumn('pencairan_pembinaan', [
            'tgl_surat' => [
                'type' => 'DATE',
            ],
        ]);
    }
}
