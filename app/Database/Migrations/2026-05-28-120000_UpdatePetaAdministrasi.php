<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePetaAdministrasi extends Migration
{
    public function up()
    {
        // Add new columns to peta_administrasi table
        $this->forge->addColumn('peta_administrasi', [
            'deskripsi' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'data_spasial',
            ],
            'luas_wilayah' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'after'      => 'deskripsi',
            ],
            'koordinat_lat' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,8',
                'null'       => true,
                'after'      => 'luas_wilayah',
            ],
            'koordinat_lng' => [
                'type'       => 'DECIMAL',
                'constraint' => '11,8',
                'null'       => true,
                'after'      => 'koordinat_lat',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
                'after'      => 'koordinat_lng',
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
                'after'      => 'created_at',
            ],
        ]);

        // Modify data_spasial to allow NULL
        $this->forge->modifyColumn('peta_administrasi', [
            'data_spasial' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
        // Drop the added columns
        $this->forge->dropColumn('peta_administrasi', [
            'deskripsi',
            'luas_wilayah',
            'koordinat_lat',
            'koordinat_lng',
            'created_at',
            'updated_at'
        ]);

        // Revert data_spasial to NOT NULL
        $this->forge->modifyColumn('peta_administrasi', [
            'data_spasial' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
        ]);
    }
}
