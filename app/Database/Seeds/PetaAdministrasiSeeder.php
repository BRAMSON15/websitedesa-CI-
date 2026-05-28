<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PetaAdministrasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul_peta' => 'Peta Administrasi Desa Tifu',
                'deskripsi' => 'Peta wilayah administrasi Desa Tifu, Pulau Buru, Maluku. Menampilkan lokasi geografis dan batas-batas wilayah desa.',
                'luas_wilayah' => '25.5 km²',
                'koordinat_lat' => -3.4,
                'koordinat_lng' => 127.1,
                'data_spasial' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('peta_administrasi')->insertBatch($data);
    }
}
