<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNilai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_nilai' => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'kode_akun' => [
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
        $this->forge->addKey('id_nilai', true);
        $this->forge->addForeignKey('id_transaksi', 'tbl_transaksi_pembinaan', 'id_transaksi');
        $this->forge->createTable('tbl_nilai_pembinaan');
    }

    public function down()
    {
        $this->forge->dropForeignKey('tbl_nilai_pembinaan', 'tbl_nilai_pembinaan_id_transaksi_foreign');
        $this->forge->dropTable('tbl_nilai_pembinaan');
    }
}
