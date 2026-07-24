<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    public function run()
    {
        // Hapus data lama jika ada
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $this->db->table('jenis_surat')->truncate();
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
        
        $data = [
            [
                'nama_surat' => 'Surat Keterangan Domisili',
                'template' => 'Surat keterangan yang menyatakan bahwa seseorang bertempat tinggal di wilayah tertentu. Diperlukan untuk berbagai keperluan administrasi seperti pembuatan KTP, pendaftaran sekolah, atau keperluan lainnya. Persyaratan: KTP, KK, dan surat pengantar RT/RW.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Nikah',
                'template' => 'Surat pengantar dari desa untuk keperluan pendaftaran pernikahan di KUA atau Catatan Sipil. Merupakan salah satu syarat administrasi untuk melangsungkan pernikahan. Persyaratan: KTP calon pengantin, KK, akta kelahiran, dan surat keterangan belum menikah.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Belum Nikah',
                'template' => 'Surat yang menerangkan bahwa seseorang belum pernah menikah atau berstatus lajang. Biasanya diperlukan untuk keperluan melamar pekerjaan, pendaftaran pernikahan, atau administrasi lainnya. Persyaratan: KTP, KK, dan surat pernyataan dari yang bersangkutan.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Tidak Mampu',
                'template' => 'Surat yang menerangkan bahwa seseorang atau keluarga dalam kondisi ekonomi tidak mampu. Biasanya digunakan untuk mendapatkan keringanan biaya pendidikan, kesehatan, bantuan sosial, atau keperluan hukum. Persyaratan: KTP, KK, dan surat pernyataan penghasilan.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Kepemilikan Tanah',
                'template' => 'Surat yang menerangkan kepemilikan tanah seseorang berdasarkan data yang ada di desa. Digunakan untuk keperluan sertifikasi tanah, jual beli, atau administrasi pertanahan lainnya. Persyaratan: KTP, KK, bukti kepemilikan tanah (girik/petok), dan surat keterangan dari RT/RW.'
            ],
            [
                'nama_surat' => 'Surat Izin Keramaian',
                'template' => 'Surat izin untuk mengadakan acara atau kegiatan yang mengundang keramaian di wilayah desa. Diperlukan untuk acara pernikahan, khitanan, syukuran, atau kegiatan sosial lainnya. Persyaratan: KTP penyelenggara, proposal kegiatan, dan rekomendasi RT/RW.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Usaha',
                'template' => 'Surat yang menerangkan bahwa seseorang memiliki dan menjalankan usaha di wilayah tertentu. Diperlukan untuk pengajuan kredit usaha, perizinan, bantuan modal, atau keperluan administrasi usaha lainnya. Persyaratan: KTP, KK, foto usaha, dan surat keterangan dari RT/RW.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Jual Tanah',
                'template' => 'Surat keterangan untuk keperluan jual beli tanah yang menyatakan bahwa tanah tersebut tidak dalam sengketa dan layak untuk diperjualbelikan. Diperlukan untuk proses balik nama dan administrasi pertanahan. Persyaratan: KTP penjual dan pembeli, bukti kepemilikan tanah, dan surat persetujuan ahli waris.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Penghasilan',
                'template' => 'Surat yang menerangkan rincian rata-rata penghasilan warga. Diperlukan untuk pengajuan kredit, beasiswa anak, atau bantuan sosial. Persyaratan: KTP, KK, dan slip gaji / surat pernyataan penghasilan.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Cerai',
                'template' => 'Surat yang menerangkan status perkawinan janda/duda dari warga yang bersangkutan berdasarkan putusan pengadilan. Persyaratan: KTP, KK, dan Akta Cerai dari Pengadilan Agama.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Kematian',
                'template' => 'Surat pengantar untuk menerangkan bahwa seorang warga telah meninggal dunia. Digunakan untuk syarat pembuatan Akta Kematian di Disdukcapil. Persyaratan: KTP almarhum/ah, KK, surat keterangan dokter/RS.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Kelahiran',
                'template' => 'Surat pengantar kelahiran anak dari desa. Digunakan sebagai syarat pembuatan Akta Kelahiran. Persyaratan: Surat keterangan lahir dari bidan/RS, buku nikah orang tua, KTP, dan KK.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Domisili Sementara',
                'template' => 'Surat keterangan domisili untuk warga pendatang/kos/kontrak yang tidak pindah KTP secara permanen. Persyaratan: KTP asal, surat pengantar RT/RW, dan fotokopi KTP pemilik kos/kontrakan.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Pindah Domisili',
                'template' => 'Surat pengantar bagi warga yang akan pindah domisili/KTP keluar dari wilayah desa ini. Persyaratan: KTP asli, KK asli, dan pas foto.'
            ],
            [
                'nama_surat' => 'Surat Keterangan Ahli Waris',
                'template' => 'Surat yang menerangkan silsilah keturunan ahli waris yang sah dari seseorang yang telah meninggal dunia. Persyaratan: KTP ahli waris, KK, surat kematian, dan surat keterangan silsilah keturunan.'
            ]
        ];

        // Insert data
        $this->db->table('jenis_surat')->insertBatch($data);
        
        echo "Berhasil menambahkan " . count($data) . " jenis surat baru.\n";
    }
}
