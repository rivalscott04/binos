<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnsToPaguanggaran extends Migration
{
    public function up()
    {
        // Add columns to 'paguanggaran' table
        $this->forge->addColumn('paguanggaran', [
            'jumlah_pagu' => [
                'type' => 'INT',
                'null' => true, // Set to false if it is required
            ],
            'jumlah_terpakai' => [
                'type' => 'INT',
                'null' => true, // Set to false if it is required
            ],
        ]);
    }

    public function down()
    {
        // Remove columns if rolling back
        $this->forge->dropColumn('paguanggaran', 'jumlah_pagu');
        $this->forge->dropColumn('paguanggaran', 'jumlah_terpakai');
    }
}
