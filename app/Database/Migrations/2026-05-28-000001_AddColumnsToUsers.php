<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnsToUsers extends Migration
{
    public function up()
    {
        // Add new columns to users table
        $this->forge->addColumn('users', [
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
                'null'       => true,
                'after'      => 'password',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'after'      => 'nik',
            ],
            'no_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
                'after'      => 'email',
            ],
            'alamat' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'no_telepon',
            ],
        ]);
    }

    public function down()
    {
        // Drop the columns if migration is rolled back
        $this->forge->dropColumn('users', ['nik', 'email', 'no_telepon', 'alamat']);
    }
}
