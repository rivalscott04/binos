<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunOutput extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_output' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_output' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
            ],
            'kode_output' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'nama_output' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
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
        $this->forge->addKey('id_output', true);
        $this->forge->addForeignKey('no_program', 'akun_program', 'id_program');
        $this->forge->createTable('akun_output');
    }

    public function down()
    {
        $this->forge->dropForeignKey('akun_output', 'akun_output_no_program_foreign');
        $this->forge->dropTable('akun_output');
    }
}
