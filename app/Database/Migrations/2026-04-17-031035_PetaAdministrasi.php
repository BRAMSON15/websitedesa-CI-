<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PetaAdministrasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peta' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul_peta' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'data_spasial' => [
                'type' => 'TEXT', // GeoJSON or Map Embed URL
            ],
        ]);
        $this->forge->addKey('id_peta', true);
        $this->forge->createTable('peta_administrasi', true);
    }

    public function down()
    {
        $this->forge->dropTable('peta_administrasi', true);
    }
}
