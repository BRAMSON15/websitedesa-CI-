<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pesan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_pengirim' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'user_id_penerima' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => true, // NULL jika untuk semua user
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'isi_pesan' => [
                'type' => 'TEXT',
            ],
            'tipe_pesan' => [
                'type'       => 'ENUM',
                'constraint' => ['info', 'warning', 'success', 'error'],
                'default'    => 'info',
            ],
            'status_baca' => [
                'type'       => 'ENUM',
                'constraint' => ['belum_dibaca', 'sudah_dibaca'],
                'default'    => 'belum_dibaca',
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
        $this->forge->addKey('id_pesan', true);
        $this->forge->createTable('pesan', true);
    }

    public function down()
    {
        $this->forge->dropTable('pesan', true);
    }
}
