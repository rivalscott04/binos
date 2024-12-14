<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNoSuratToPencairanPembinaan extends Migration
{
    public function up()
    {
        // Menambah kolom no_surat dan tgl_surat pada tabel pencairan_pembinaan
        $this->forge->addColumn('pencairan_pembinaan', [
            'no_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tgl_surat' => [
                'type' => 'DATE',
            ],
        ]);
    }

    public function down()
    {
        // Hapus kolom no_surat dan tgl_surat jika migrasi dibatalkan
        $this->forge->dropColumn('pencairan_pembinaan', ['no_surat', 'tgl_surat']);
    }
}
