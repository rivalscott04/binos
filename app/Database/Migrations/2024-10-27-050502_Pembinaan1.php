<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembinaan1 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembinaan1' => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
                'null'       => false,
            ],
            'uraian_kegiatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pagu_dalam_dipa' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'spp_sd_bulan_lalu' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'spp_bulan_ini' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'jumlah_spp_sd_bulan_ini' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'sisa_pagu' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id_pembinaan1', true);
        $this->forge->createTable('pembinaan1');
    }

    public function down()
    {
        $this->forge->dropTable('pembinaan1');
    }
}
