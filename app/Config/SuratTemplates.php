<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class SuratTemplates extends BaseConfig
{
    /**
     * Template configurations for each letter type
     * Based on Word documents in foldertemplate directory
     */
    public $templates = [
        'Surat Keterangan Domisili' => [
            'title' => 'SURAT KETERANGAN DOMISILI',
            'content' => 'Adalah benar-benar penduduk dan berdomisili di {{ALAMAT}} sejak {{TANGGAL_DOMISILI}}. Yang bersangkutan adalah warga yang baik dan tidak pernah terlibat dalam kegiatan yang dapat mengganggu keamanan dan ketertiban masyarakat.

Surat keterangan domisili ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.',
            'required_fields' => ['tanggal_domisili'],
            'template_file' => 'SURAT KET DOMISILI.docx'
        ],

        'Surat Keterangan Nikah' => [
            'title' => 'SURAT KETERANGAN NIKAH',
            'content' => 'Adalah benar-benar penduduk desa kami yang berkelakuan baik dan tidak pernah terlibat dalam kegiatan yang dapat mengganggu keamanan dan ketertiban masyarakat.

Yang bersangkutan akan melangsungkan pernikahan dengan {{NAMA_PASANGAN}} pada {{TANGGAL_NIKAH}}. Surat keterangan ini dibuat untuk keperluan pendaftaran nikah di Kantor Urusan Agama (KUA) setempat.',
            'required_fields' => ['nama_pasangan', 'tanggal_nikah'],
            'template_file' => 'SURAT KETERANGAN NIKAH.docx'
        ],

        'Surat Keterangan Belum Nikah' => [
            'title' => 'SURAT KETERANGAN BELUM NIKAH',
            'content' => 'Adalah benar-benar penduduk desa kami yang berkelakuan baik dan tidak pernah terlibat dalam kegiatan yang dapat mengganggu keamanan dan ketertiban masyarakat.

Sampai dengan dikeluarkannya surat keterangan ini, yang bersangkutan belum pernah menikah dan masih berstatus lajang/belum kawin.

Surat keterangan ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.',
            'required_fields' => [],
            'template_file' => 'suratketerangan blm menikah.odt'
        ],

        'Surat Keterangan Tidak Mampu' => [
            'title' => 'SURAT KETERANGAN TIDAK MAMPU',
            'content' => 'Adalah benar-benar penduduk desa kami yang tergolong keluarga tidak mampu/kurang mampu secara ekonomi dengan penghasilan rata-rata {{PENGHASILAN}} per bulan.

Keadaan ekonomi keluarga yang bersangkutan memang memerlukan bantuan dan perhatian dari pihak terkait.

Surat keterangan tidak mampu ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.',
            'required_fields' => ['penghasilan'],
            'template_file' => 'surat ket3rangan tidak mampu.docx'
        ],

        'Surat Keterangan Kepemilikan Tanah' => [
            'title' => 'SURAT KETERANGAN KEPEMILIKAN TANAH',
            'content' => 'Adalah benar-benar pemilik sah tanah yang terletak di {{LOKASI_TANAH}} dengan luas tanah {{LUAS_TANAH}} m² berdasarkan {{BUKTI_KEPEMILIKAN}}.

Tanah tersebut diperoleh secara sah dan tidak dalam keadaan sengketa dengan pihak manapun. Yang bersangkutan adalah pemilik yang sah dan berhak penuh atas tanah tersebut.

Surat keterangan kepemilikan tanah ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.',
            'required_fields' => ['lokasi_tanah', 'luas_tanah', 'bukti_kepemilikan'],
            'template_file' => 'SURAT KETERANGAN KEPEMILIKAN TANAH.docx'
        ],

        'Surat Izin Keramaian' => [
            'title' => 'SURAT IZIN KERAMAIAN',
            'content' => 'Dengan ini memberikan izin kepada yang bersangkutan untuk mengadakan acara {{JENIS_ACARA}} pada {{TANGGAL_ACARA}} di {{LOKASI_ACARA}} dengan perkiraan jumlah undangan {{JUMLAH_UNDANGAN}} orang.

Acara tersebut diharapkan dapat berjalan dengan tertib dan tidak mengganggu keamanan serta ketertiban masyarakat sekitar.

Demikian izin keramaian ini dibuat untuk dapat dipergunakan sebagaimana mestinya.',
            'required_fields' => ['jenis_acara', 'tanggal_acara', 'lokasi_acara', 'jumlah_undangan'],
            'template_file' => 'SURAT IZIN KERAMAIAN.docx'
        ],

        'Surat Keterangan Usaha' => [
            'title' => 'SURAT KETERANGAN USAHA',
            'content' => 'Adalah benar-benar penduduk desa kami yang memiliki dan menjalankan usaha {{JENIS_USAHA}} yang berlokasi di {{ALAMAT_USAHA}} sejak {{TANGGAL_MULAI_USAHA}}.

Usaha yang dijalankan oleh yang bersangkutan adalah usaha yang sah dan tidak bertentangan dengan peraturan yang berlaku.

Surat keterangan usaha ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.',
            'required_fields' => ['jenis_usaha', 'alamat_usaha', 'tanggal_mulai_usaha'],
            'template_file' => 'surat keterangan Usaha 2025.docx'
        ],

        'Surat Keterangan Jual Tanah' => [
            'title' => 'SURAT KETERANGAN JUAL TANAH',
            'content' => 'Adalah benar-benar pemilik sah tanah yang terletak di {{LOKASI_TANAH}} dengan luas {{LUAS_TANAH}} m² dan bermaksud menjual tanah tersebut kepada {{NAMA_PEMBELI}}.

Tanah tersebut adalah milik sah yang bersangkutan, tidak dalam keadaan sengketa, tidak dalam jaminan/agunan, dan bebas dari segala ikatan hukum.

Surat keterangan jual tanah ini dibuat untuk keperluan proses jual beli tanah dan dapat dipergunakan sebagaimana mestinya.',
            'required_fields' => ['lokasi_tanah', 'luas_tanah', 'nama_pembeli'],
            'template_file' => 'SurSurat keterangan - Copy.docx'
        ],

        'Surat Keterangan Penghasilan' => [
            'title' => 'SURAT KETERANGAN PENGHASILAN',
            'content' => 'Adalah benar-benar penduduk desa kami yang memiliki penghasilan rata-rata sebesar {{JUMLAH_PENGHASILAN}} per bulan yang bersumber dari pekerjaan sebagai {{SUMBER_PENGHASILAN}}.

Surat keterangan ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.',
            'required_fields' => ['jumlah_penghasilan', 'sumber_penghasilan'],
            'template_file' => 'SURAT_KETERANGAN_PENGHASILAN.docx'
        ],

        'Surat Keterangan Cerai' => [
            'title' => 'SURAT KETERANGAN CERAI',
            'content' => 'Adalah benar-benar penduduk desa kami yang berstatus janda/duda cerai hidup dari pernikahan sebelumnya dengan {{NAMA_MANTAN_PASANGAN}} berdasarkan putusan Pengadilan Agama Nomor {{NOMOR_PUTUSAN}} tanggal {{TANGGAL_PUTUSAN}}.

Surat keterangan ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.',
            'required_fields' => ['nama_mantan_pasangan', 'nomor_putusan', 'tanggal_putusan'],
            'template_file' => 'SURAT_KETERANGAN_CERAI.docx'
        ],

        'Surat Keterangan Kematian' => [
            'title' => 'SURAT KETERANGAN KEMATIAN',
            'content' => 'Menerangkan bahwa penduduk atas nama {{NAMA_ALMARHUM}} yang beralamat di {{ALAMAT_ALMARHUM}} telah meninggal dunia pada hari {{HARI_MENINGGAL}} tanggal {{TANGGAL_MENINGGAL}} di {{TEMPAT_MENINGGAL}} disebabkan karena {{PENYEBAB_MENINGGAL}}.

Surat keterangan ini dibuat berdasarkan pelaporan dari keluarga dan dipergunakan untuk keperluan administrasi pengurusan akta kematian atau hal terkait lainnya.',
            'required_fields' => ['nama_almarhum', 'alamat_almarhum', 'hari_meninggal', 'tanggal_meninggal', 'tempat_meninggal', 'penyebab_meninggal'],
            'template_file' => 'SURAT_KETERANGAN_KEMATIAN.docx'
        ],

        'Surat Keterangan Kelahiran' => [
            'title' => 'SURAT KETERANGAN KELAHIRAN',
            'content' => 'Menerangkan bahwa telah lahir seorang anak berjenis kelamin {{JENIS_KELAMIN_ANAK}} bernama {{NAMA_ANAK}} pada hari {{HARI_LAHIR}} tanggal {{TANGGAL_LAHIR}} di {{TEMPAT_LAHIR}}.

Anak tersebut merupakan anak ke-{{ANAK_KE}} dari pasangan suami istri {{NAMA_AYAH}} dan {{NAMA_IBU}}.

Surat keterangan ini dibuat untuk keperluan administrasi pengurusan akta kelahiran atau hal terkait lainnya.',
            'required_fields' => ['nama_anak', 'jenis_kelamin_anak', 'hari_lahir', 'tanggal_lahir', 'tempat_lahir', 'anak_ke', 'nama_ayah', 'nama_ibu'],
            'template_file' => 'SURAT_KETERANGAN_KELAHIRAN.docx'
        ],

        'Surat Keterangan Domisili Sementara' => [
            'title' => 'SURAT KETERANGAN DOMISILI SEMENTARA',
            'content' => 'Adalah benar saat ini sedang berdomisili sementara/tinggal tidak tetap di {{ALAMAT_SEMENTARA}} dengan tujuan {{TUJUAN_TINGGAL}}.

Surat keterangan domisili sementara ini berlaku selama {{MASA_BERLAKU}} terhitung sejak surat ini dikeluarkan, dan dibuat untuk keperluan {{KEPERLUAN}}.',
            'required_fields' => ['alamat_sementara', 'tujuan_tinggal', 'masa_berlaku'],
            'template_file' => 'SURAT_KETERANGAN_DOMISILI_SEMENTARA.docx'
        ],

        'Surat Keterangan Pindah Domisili' => [
            'title' => 'SURAT KETERANGAN PINDAH DOMISILI',
            'content' => 'Adalah benar-benar penduduk desa kami yang bermaksud pindah domisili/tempat tinggal dengan alasan {{ALASAN_PINDAH}}.

Adapun alamat domisili yang baru berlokasi di {{ALAMAT_TUJUAN_PINDAH}}.

Surat pengantar ini dibuat sebagai kelengkapan administrasi pengurusan pindah penduduk antar desa/kecamatan/kabupaten/provinsi.',
            'required_fields' => ['alasan_pindah', 'alamat_tujuan_pindah'],
            'template_file' => 'SURAT_KETERANGAN_PINDAH_DOMISILI.docx'
        ],

        'Surat Keterangan Ahli Waris' => [
            'title' => 'SURAT KETERANGAN AHLI WARIS',
            'content' => 'Berdasarkan pernyataan dan saksi-saksi, menerangkan bahwa pihak-pihak yang namanya tercantum dalam pernyataan pengajuan surat ini adalah benar ahli waris yang sah dari Almarhum/Almarhumah {{NAMA_PEWARIS}} yang telah meninggal dunia pada tanggal {{TANGGAL_MENINGGAL_PEWARIS}}.

Surat keterangan ini dibuat untuk keperluan pengurusan harta warisan dan administrasi terkait yang diperlukan.',
            'required_fields' => ['nama_pewaris', 'tanggal_meninggal_pewaris'],
            'template_file' => 'SURAT_KETERANGAN_AHLI_WARIS.docx'
        ]
    ];

    /**
     * Get template configuration for a specific letter type
     */
    public function getTemplate($letterType)
    {
        return $this->templates[$letterType] ?? null;
    }

    /**
     * Get all available templates
     */
    public function getAllTemplates()
    {
        return $this->templates;
    }

    /**
     * Update template content (for easy customization)
     */
    public function updateTemplate($letterType, $content)
    {
        if (isset($this->templates[$letterType])) {
            $this->templates[$letterType]['content'] = $content;
            return true;
        }
        return false;
    }
}