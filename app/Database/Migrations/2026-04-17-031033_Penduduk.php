<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penduduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nik' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'ttl' => [
                'type'       => 'VARCHAR',
                'constraint' => '100', // e.g., 'Jakarta, 01-01-2000'
            ],
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nomor_kk' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('nik', true);
        $this->forge->createTable('penduduk', true);
    }

    public function down()
    {
        $this->forge->dropTable('penduduk', true);
    }
}
