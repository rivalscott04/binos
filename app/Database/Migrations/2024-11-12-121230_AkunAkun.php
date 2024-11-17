<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunAkun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akun' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_akun' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
            ],
            'kode_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'nama_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
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
        $this->forge->addKey('id_akun', true);
        $this->forge->addForeignKey('no_program', 'akun_program', 'id_program');
        $this->forge->createTable('akun_akun');
    }

    public function down()
    {
        $this->forge->dropForeignKey('akun_akun', 'akun_akun_no_program_foreign');
        $this->forge->dropTable('akun_akun');
    }
}
