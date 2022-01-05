<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'irwan',
                'password' => password_hash('irwan', PASSWORD_BCRYPT),
                'name' => 'Gt. Irwan',
                'created_at' => Time::now()
            ]
        ];
        $this->db->table('userslogin')->insertBatch($data);
    }
}
