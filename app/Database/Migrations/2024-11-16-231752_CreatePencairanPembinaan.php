<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePencairanPembinaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pencairan_pembinaan' => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_kwitansi' => [
                'type'           => 'VARCHAR',
                'constraint'     => 5,
            ],
            'tanggal' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'perihal' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
            ],
            'akun' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'kode_item' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'rincian' => [
                'type'          => 'TEXT',
            ],
            'volume' => [
                'type'          => 'INT',
                'constraint'    => 15,
            ],
            'harga_satuan' => [
                'type'          => 'INT',
                'constraint'    => 15,
            ],
            'jumlah' => [
                'type'          => 'FLOAT',
                'constraint'    => 15,
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
        $this->forge->addKey('id_pencairan_pembinaan', true);
        $this->forge->createTable('pencairan_pembinaan');
    }

    public function down()
    {
        $this->forge->dropTable('pencairan_pembinaan');
    }
}
