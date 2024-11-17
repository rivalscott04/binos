<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiPembinaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
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
        $this->forge->addKey('id_transaksi', true);
        $this->forge->createTable('tbl_transaksi_pembinaan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_transaksi_pembinaan');
    }
}
