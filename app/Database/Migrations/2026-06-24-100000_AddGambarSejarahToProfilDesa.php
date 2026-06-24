<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGambarSejarahToProfilDesa extends Migration
{
    public function up()
    {
        $this->forge->addColumn('profil_desa', [
            'gambar_sejarah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'sejarah',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('profil_desa', 'gambar_sejarah');
    }
}
