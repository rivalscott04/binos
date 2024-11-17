<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunItem extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_item' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_item' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
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
            'no_akun' => [
                'type'       => 'INT',
                'constraint' => 100,
                'unsigned'   => true,
            ],
            'no_subkomponen' => [
                'type'       => 'INT',
                'constraint' => 100,
                'unsigned'   => true,
            ],
            'no_komponen' => [
                'type'       => 'INT',
                'constraint' => 100,
                'unsigned'   => true,
            ],
            'no_suboutput' => [
                'type'       => 'INT',
                'constraint' => 100,
                'unsigned'   => true,
            ],
            'no_output' => [
                'type'       => 'INT',
                'constraint' => 100,
                'unsigned'   => true,
            ],
            'no_kegiatan' => [
                'type'       => 'INT',
                'constraint' => 100,
                'unsigned'   => true,
            ],
            'no_program' => [
                'type'       => 'INT',
                'constraint' => 100,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addKey('id_item', true);
        $this->forge->addForeignKey('no_program', 'akun_program', 'id_program');
        $this->forge->createTable('akun_item');
    }

    public function down()
    {
        $this->forge->dropForeignKey('akun_item', 'akun_item_no_program_foreign');
        $this->forge->dropTable('akun_item');
    }
}
