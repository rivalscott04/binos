<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaguanggaranTable extends Migration
{
    public function up()
    {
        // Membuat tabel paguanggaran
        $this->forge->addField([
            'id_paguanggaran' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_sub_output' => [
                'type' => 'INT',
                'constraint' => '100',
                'unsigned' => true,
            ],
            'kode_item' => [
                'type' => 'INT',
                'constraint' => '100',
                'unsigned' => true,
            ],
            'jumlah' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0,
            ],
            'tahun' => [
                'type' => 'YEAR',
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        // Menambahkan primary key
        $this->forge->addKey('id_paguanggaran', true);

        $this->forge->addForeignKey('kode_suboutput', 'akun_suboutput', 'id_suboutput');
        $this->forge->addForeignKey('kode_item', 'item', 'id_item');


        // Membuat tabel
        $this->forge->createTable('paguanggaran');
    }

    public function down()
    {
        // Menghapus tabel paguanggaran
        $this->forge->dropTable('paguanggaran');
    }
}
