<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TemplateSurat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_template' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_jenis' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nama_template' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'konten_template' => [
                'type' => 'LONGTEXT',
            ],
            'fields_required' => [
                'type' => 'TEXT',
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
        $this->forge->addKey('id_template', true);
        $this->forge->addForeignKey('id_jenis', 'jenis_surat', 'id_jenis', 'CASCADE', 'CASCADE');
        $this->forge->createTable('template_surat', true);
    }

    public function down()
    {
        $this->forge->dropTable('template_surat', true);
    }
}