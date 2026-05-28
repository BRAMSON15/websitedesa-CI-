<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AllowNullPendudukFields extends Migration
{
    public function up()
    {
        // Modify columns to allow NULL values so registration can insert
        // penduduk records without requiring all fields
        $this->forge->modifyColumn('penduduk', [
            'ttl' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'default'    => null,
            ],
            'agama' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'default'    => null,
            ],
            'pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'default'    => null,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'default'    => null,
            ],
        ]);
    }

    public function down()
    {
        // Revert columns to NOT NULL
        $this->forge->modifyColumn('penduduk', [
            'ttl' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'agama' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
        ]);
    }
}
