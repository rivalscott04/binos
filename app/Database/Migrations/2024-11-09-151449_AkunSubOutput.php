<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunSubOutput extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_suboutput' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_suboutput' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
            ],
            'kode_suboutput' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'nama_suboutput' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
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
        $this->forge->addKey('id_suboutput', true);
        $this->forge->addForeignKey('no_program', 'akun_program', 'id_program');
        $this->forge->createTable('akun_suboutput');
    }

    public function down()
    {
        $this->forge->dropForeignKey('akun_suboutput', 'akun_suboutput_no_program_foreign');
        $this->forge->dropTable('akun_suboutput');
    }
}
