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