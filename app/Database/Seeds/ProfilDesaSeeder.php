<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfilDesaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_desa' => 'Desa Tifu',
                'visi' => 'Mewujudkan Desa Tifu yang maju, sejahtera, dan berkelanjutan dengan masyarakat yang berdaya dan berkarakter.',
                'misi' => '1. Meningkatkan kualitas hidup masyarakat melalui pembangunan infrastruktur dan layanan publik yang baik.
2. Memberdayakan ekonomi lokal dan mengembangkan potensi sumber daya alam secara berkelanjutan.
3. Meningkatkan kualitas pendidikan dan kesehatan masyarakat.
4. Memperkuat nilai-nilai budaya lokal dan gotong royong dalam kehidupan bermasyarakat.
5. Menciptakan tata kelola pemerintahan yang transparan, akuntabel, dan responsif terhadap kebutuhan masyarakat.',
                'sejarah' => 'Desa Tifu adalah sebuah desa yang terletak di Pulau Buru, Provinsi Maluku, Indonesia. Desa ini memiliki sejarah panjang yang kaya dengan warisan budaya dan tradisi lokal yang masih dilestarikan hingga saat ini. Masyarakat Desa Tifu dikenal dengan keramahan, gotong royong, dan semangat kerjasama yang tinggi dalam membangun desa mereka. Dengan potensi alam yang melimpah, Desa Tifu terus berkembang dan berusaha meningkatkan kesejahteraan masyarakatnya.',
                'gambar_sejarah' => 'sejarah_1782278306_1782278306_e0c96230b8c02ce3b0b4.jpeg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('profil_desa')->insertBatch($data);
    }
}
