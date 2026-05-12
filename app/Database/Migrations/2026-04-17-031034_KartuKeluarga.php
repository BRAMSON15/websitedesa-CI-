<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KartuKeluarga extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nomor_kk' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'kepala_keluarga' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'desa' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'rt' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'rw' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
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
        $this->forge->addKey('nomor_kk', true);
        $this->forge->createTable('kartu_keluarga', true);
    }

    public function down()
    {
        $this->forge->dropTable('kartu_keluarga', true);
    }
}
