<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeyToKodeItemOnPencairanPembinaan extends Migration
{
    public function up()
    {
        // Pastikan tipe data kolom kode_item sesuai dengan id_item pada tabel item
        $this->forge->modifyColumn('pencairan_pembinaan', [
            'kode_item' => [
                'type' => 'INT',
                'unsigned' => true, // Tambahkan jika id_item juga unsigned
            ],
        ]);

        // Menambahkan foreign key constraint pada kolom kode_item
        $this->db->query('
            ALTER TABLE pencairan_pembinaan
            ADD CONSTRAINT fk_pencairan_pembinaan_kode_item FOREIGN KEY (kode_item) REFERENCES item(id_item) ON DELETE CASCADE ON UPDATE CASCADE
        ');
    }

    public function down()
    {
        // Menghapus foreign key constraint
        $this->db->query('ALTER TABLE pencairan_pembinaan DROP FOREIGN KEY fk_pencairan_pembinaan_kode_item');
    }
}
