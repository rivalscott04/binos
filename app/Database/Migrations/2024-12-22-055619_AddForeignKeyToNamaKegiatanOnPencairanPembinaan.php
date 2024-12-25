<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeyToNamaKegiatanOnPencairanPembinaan extends Migration
{
    public function up()
    {
        // Pastikan kolom kegiatan memiliki tipe data yang sama dengan nama_suboutput
        $this->forge->modifyColumn('pencairan_pembinaan', [
            'kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 500, // Harus sama dengan nama_suboutput
            ],
        ]);

        // Tambahkan foreign key constraint
        $this->db->query('
            ALTER TABLE pencairan_pembinaan
            ADD CONSTRAINT fk_kegiatan FOREIGN KEY (kegiatan) REFERENCES suboutput(nama_suboutput) 
            ON DELETE CASCADE ON UPDATE CASCADE
        ');
    }

    public function down()
    {
        // Hapus foreign key constraint
        $this->db->query('ALTER TABLE pencairan_pembinaan DROP FOREIGN KEY fk_kegiatan');
    }
}
