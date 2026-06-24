<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateProfilDesaGambar extends Migration
{
    public function up()
    {
        $this->db->table('profil_desa')->update([
            'gambar_sejarah' => 'sejarah_1782278306_1782278306_e0c96230b8c02ce3b0b4.jpeg'
        ], ['nama_desa' => 'Desa Tifu']);
    }

    public function down()
    {
        $this->db->table('profil_desa')->update([
            'gambar_sejarah' => null
        ], ['nama_desa' => 'Desa Tifu']);
    }
}
