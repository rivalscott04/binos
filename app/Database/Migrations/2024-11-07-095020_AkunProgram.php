<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunProgram extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_program' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_program' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
            ],
            'kode_program' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'nama_program' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id_program', true);
        $this->forge->createTable('akun_program');
    }

    public function down()
    {
        $this->forge->dropTable('akun_program');
    }
}
