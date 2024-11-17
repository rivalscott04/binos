<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAkunPembinaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akunpembinaan' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'program' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'output' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'suboutput' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'komponen' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'subkomponen' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'akun' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'kode_item' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'nama_item' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
            ],
            'saldo' => [
                'type'          => 'FLOAT',
                'constraint'    => 15,
            ],
        ]);
        $this->forge->addKey('id_akunpembinaan', true);
        $this->forge->createTable('akun_pembinaan');
    }

    public function down()
    {
        $this->forge->dropTable('akun_pembinaan');
    }
}
