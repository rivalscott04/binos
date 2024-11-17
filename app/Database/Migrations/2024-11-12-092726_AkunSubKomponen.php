<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunSubKomponen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_subkomponen' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_subkomponen' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
            ],
            'kode_subkomponen' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'nama_subkomponen' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
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
        $this->forge->addKey('id_subkomponen', true);
        $this->forge->addForeignKey('no_program', 'akun_program', 'id_program');
        $this->forge->createTable('akun_subkomponen');
    }

    public function down()
    {
        $this->forge->dropForeignKey('akun_subkomponen', 'akun_subkomponen_no_program_foreign');
        $this->forge->dropTable('akun_subkomponen');
    }
}
