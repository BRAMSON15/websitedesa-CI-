<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StrukturDesa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_struktur' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_struktur', true);
        $this->forge->createTable('struktur_desa', true);
    }

    public function down()
    {
        $this->forge->dropTable('struktur_desa', true);
    }
}
