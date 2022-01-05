<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nama_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_buku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_pinjam' => [
                'type' => 'DATE',
            ],
            'tanggal_kembali' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => "'dipinjam','dikembalikan'",
            ],
            'denda' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('nama_mahasiswa');
        $this->forge->createTable('peminjaman');
    }

    public function down()
    {
        $this->forge->dropTable('peminjaman');
    }
}
