<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeyToPencairanPembinaan extends Migration
{
    public function up()
    {
        // Pastikan tipe data kolom akun sesuai dengan kode_akun pada tabel akun
        $this->forge->modifyColumn('pencairan_pembinaan', [
            'akun' => [
                'type' => 'VARCHAR',
                'constraint' => 100, // Sesuaikan dengan panjang kode_akun pada tabel akun
            ],
        ]);

        // Menambahkan foreign key constraint pada kolom akun
        $this->db->query('
            ALTER TABLE pencairan_pembinaan
            ADD CONSTRAINT fk_akun FOREIGN KEY (akun) REFERENCES akun(kode_akun) ON DELETE CASCADE ON UPDATE CASCADE
        ');
    }

    public function down()
    {
        // Menghapus foreign key constraint
        $this->db->query('ALTER TABLE pencairan_pembinaan DROP FOREIGN KEY fk_pencairan_pembinaan_akun');
    }
}
