<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BukuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_buku' => '1',
                'nama_buku' => 'Jujutsu Kaisen',
                'penulis' => 'Gege Akutami',
                'penerbit' => 'Elex MediaKomputindo',
                'created_at' => Time::now()
            ],
            [
                'no_buku' => '2',
                'nama_buku' => 'BTOOOM',
                'penulis' => 'Junya Inoue',
                'penerbit' => 'Level Comics',
                'created_at' => Time::now()
            ],
            [
                'no_buku' => '3',
                'nama_buku' => 'Black Bullet',
                'penulis' => 'Shinden Kanzaki',
                'penerbit' => 'M&C',
                'created_at' => Time::now()
            ],
        ];
        $this->db->table('buku')->insertBatch($data);
    }
}
