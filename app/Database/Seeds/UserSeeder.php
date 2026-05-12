<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = new UserModel();

        $data = [
            [
                'nama'     => 'Administrator Default',
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_BCRYPT),
                'role'     => 'admin'
            ],
            [
                'nama'     => 'Bapak Kepala Desa',
                'username' => 'kepaladesa',
                'password' => password_hash('desa123', PASSWORD_BCRYPT),
                'role'     => 'kepala_desa'
            ],
            [
                'nama'     => 'Masyarakat Biasa',
                'username' => 'masyarakat',
                'password' => password_hash('masyarakat123', PASSWORD_BCRYPT),
                'role'     => 'masyarakat'
            ],
        ];

        // Ensure table is empty to avoid duplicates
        $this->db->table('users')->truncate();
        
        foreach ($data as $user) {
            $model->insert($user);
        }
    }
}
