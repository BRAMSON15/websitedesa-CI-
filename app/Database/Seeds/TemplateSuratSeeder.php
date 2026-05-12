<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TemplateSuratSeeder extends Seeder
{
    public function run()
    {
        // Get jenis surat IDs
        $jenisSurat = $this->db->table('jenis_surat')->get()->getResultArray();
        
        $templates = [];
        
        foreach ($jenisSurat as $jenis) {
            $template = [
                'id_jenis' => $jenis['id_jenis'],
                'nama_template' => 'Template ' . $jenis['nama_surat'],
                'konten_template' => $this->getTemplateContent($jenis['nama_surat']),
                'fields_required' => $this->getRequiredFields($jenis['nama_surat'])
            ];
            $templates[] = $template;
        }
        
        // Insert templates
        $this->db->table('template_surat')->insertBatch($templates);
        
        echo "Berhasil menambahkan " . count($templates) . " template surat.\n";
    }
    
    private function getTemplateContent($namaSurat)
    {
        // Base template structure
        $baseTemplate = '
        <div class="header">
            <div class="logo">
                <img src="{{LOGO_PATH}}" alt="Logo" width="80">
            </div>
            <div class="header-text">
                <h2>PEMERINTAH KABUPATEN BURU</h2>
                <h2>KECAMATAN LOLONG GUBA</h2>
                <h2>DESA TIFU</h2>
                <p>Alamat: Jalan Inaboti No 01 Telep ___Code Pos: 97574</p>
            </div>
        </div>
        
        <div class="content">
            <h3>SURAT KETERANGAN</h3>
            <p>Nomor: {{NOMOR_SURAT}}</p>
            
            <p>Yang bertanda tangan dibawah ini;</p>
            
            <table>
                <tr><td>Nama</td><td>:</td><td>NIKLAS SALASIWA</td></tr>
                <tr><td>Jabatan</td><td>:</td><td>Kepala Desa</td></tr>
                <tr><td>Alamat</td><td>:</td><td>Desa Tifu Kecamatan Lolong Guba Kab. Buru</td></tr>
            </table>
            
            <p>Dengan ini menerangkan dengan sesungguhnya bahwa:</p>
            
            <table>
                <tr><td>Nama Lengkap / Alias</td><td>:</td><td>{{NAMA}}</td></tr>
                <tr><td>NIK</td><td>:</td><td>{{NIK}}</td></tr>
                <tr><td>Jenis Kelamin</td><td>:</td><td>{{JENIS_KELAMIN}}</td></tr>
                <tr><td>Agama</td><td>:</td><td>{{AGAMA}}</td></tr>
                <tr><td>Pekerjaan</td><td>:</td><td>{{PEKERJAAN}}</td></tr>
                <tr><td>Status perkawinan</td><td>:</td><td>{{STATUS_PERKAWINAN}}</td></tr>
                <tr><td>Tempat Tinggal</td><td>:</td><td>{{ALAMAT}}</td></tr>
            </table>
            
            {{CONTENT_SPECIFIC}}
            
            <p>Demikian Surat keterangan ini di buat dan di pergunakan sebagaimana perlunya dan dapat di pertanggungjawabkan.</p>
        </div>
        
        <div class="signature">
            <p>Tifu, {{TANGGAL_SURAT}}</p>
            <p>Plt Kepala Desa Tifu,</p>
            <br><br><br>
            <p><u>NIKLAS SALASIWA</u></p>
            <p>NIP 197005122014121004</p>
        </div>';
        
        // Customize content based on jenis surat
        $specificContent = $this->getSpecificContent($namaSurat);
        
        return str_replace('{{CONTENT_SPECIFIC}}', $specificContent, $baseTemplate);
    }
    
    private function getSpecificContent($namaSurat)
    {
        // Template content based on Word documents in foldertemplate directory
        switch ($namaSurat) {
            case 'Surat Keterangan Domisili':
                return $this->getDomisiliTemplate();
                
            case 'Surat Keterangan Nikah':
                return $this->getNikahTemplate();
                
            case 'Surat Keterangan Belum Nikah':
                return $this->getBelumNikahTemplate();
                
            case 'Surat Keterangan Tidak Mampu':
                return $this->getTidakMampuTemplate();
                
            case 'Surat Keterangan Kepemilikan Tanah':
                return $this->getKepemilikanTanahTemplate();
                
            case 'Surat Izin Keramaian':
                return $this->getIzinKeramaianTemplate();
                
            case 'Surat Keterangan Usaha':
                return $this->getUsahaTemplate();
                
            case 'Surat Keterangan Jual Tanah':
                return $this->getJualTanahTemplate();
                
            default:
                return '<p>{{KEPERLUAN}}</p>';
        }
    }

    // Template methods for each letter type - to be customized based on Word documents
    private function getDomisiliTemplate()
    {
        return '<p>Adalah benar-benar penduduk dan berdomisili di {{ALAMAT}} sejak {{TANGGAL_DOMISILI}}. Yang bersangkutan adalah warga yang baik dan tidak pernah terlibat dalam kegiatan yang dapat mengganggu keamanan dan ketertiban masyarakat.</p>
                <p>Surat keterangan domisili ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.</p>';
    }

    private function getNikahTemplate()
    {
        return '<p>Adalah benar-benar penduduk desa kami yang berkelakuan baik dan tidak pernah terlibat dalam kegiatan yang dapat mengganggu keamanan dan ketertiban masyarakat.</p>
                <p>Yang bersangkutan akan melangsungkan pernikahan dengan {{NAMA_PASANGAN}} pada {{TANGGAL_NIKAH}}. Surat keterangan ini dibuat untuk keperluan pendaftaran nikah di Kantor Urusan Agama (KUA) setempat.</p>';
    }

    private function getBelumNikahTemplate()
    {
        return '<p>Adalah benar-benar penduduk desa kami yang berkelakuan baik dan tidak pernah terlibat dalam kegiatan yang dapat mengganggu keamanan dan ketertiban masyarakat.</p>
                <p>Sampai dengan dikeluarkannya surat keterangan ini, yang bersangkutan belum pernah menikah dan masih berstatus lajang/belum kawin.</p>
                <p>Surat keterangan ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.</p>';
    }

    private function getTidakMampuTemplate()
    {
        return '<p>Adalah benar-benar penduduk desa kami yang tergolong keluarga tidak mampu/kurang mampu secara ekonomi dengan penghasilan rata-rata {{PENGHASILAN}} per bulan.</p>
                <p>Keadaan ekonomi keluarga yang bersangkutan memang memerlukan bantuan dan perhatian dari pihak terkait.</p>
                <p>Surat keterangan tidak mampu ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.</p>';
    }

    private function getKepemilikanTanahTemplate()
    {
        return '<p>Adalah benar-benar pemilik sah tanah yang terletak di {{LOKASI_TANAH}} dengan luas tanah {{LUAS_TANAH}} m² berdasarkan {{BUKTI_KEPEMILIKAN}}.</p>
                <p>Tanah tersebut diperoleh secara sah dan tidak dalam keadaan sengketa dengan pihak manapun. Yang bersangkutan adalah pemilik yang sah dan berhak penuh atas tanah tersebut.</p>
                <p>Surat keterangan kepemilikan tanah ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.</p>';
    }

    private function getIzinKeramaianTemplate()
    {
        return '<p>Dengan ini memberikan izin kepada yang bersangkutan untuk mengadakan acara {{JENIS_ACARA}} pada {{TANGGAL_ACARA}} di {{LOKASI_ACARA}} dengan perkiraan jumlah undangan {{JUMLAH_UNDANGAN}} orang.</p>
                <p>Acara tersebut diharapkan dapat berjalan dengan tertib dan tidak mengganggu keamanan serta ketertiban masyarakat sekitar.</p>
                <p>Demikian izin keramaian ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>';
    }

    private function getUsahaTemplate()
    {
        return '<p>Adalah benar-benar penduduk desa kami yang memiliki dan menjalankan usaha {{JENIS_USAHA}} yang berlokasi di {{ALAMAT_USAHA}} sejak {{TANGGAL_MULAI_USAHA}}.</p>
                <p>Usaha yang dijalankan oleh yang bersangkutan adalah usaha yang sah dan tidak bertentangan dengan peraturan yang berlaku.</p>
                <p>Surat keterangan usaha ini dibuat untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.</p>';
    }

    private function getJualTanahTemplate()
    {
        return '<p>Adalah benar-benar pemilik sah tanah yang terletak di {{LOKASI_TANAH}} dengan luas {{LUAS_TANAH}} m² dan bermaksud menjual tanah tersebut kepada {{NAMA_PEMBELI}}.</p>
                <p>Tanah tersebut adalah milik sah yang bersangkutan, tidak dalam keadaan sengketa, tidak dalam jaminan/agunan, dan bebas dari segala ikatan hukum.</p>
                <p>Surat keterangan jual tanah ini dibuat untuk keperluan proses jual beli tanah dan dapat dipergunakan sebagaimana mestinya.</p>';
    }
    
    private function getRequiredFields($namaSurat)
    {
        $baseFields = ['nama', 'nik', 'jenis_kelamin', 'agama', 'pekerjaan', 'status_perkawinan', 'alamat', 'keperluan'];
        
        $specificFields = [];
        
        switch ($namaSurat) {
            case 'Surat Keterangan Domisili':
                $specificFields = ['tanggal_domisili'];
                break;
                
            case 'Surat Keterangan Nikah':
                $specificFields = ['nama_pasangan', 'tanggal_nikah'];
                break;
                
            case 'Surat Keterangan Tidak Mampu':
                $specificFields = ['penghasilan'];
                break;
                
            case 'Surat Keterangan Kepemilikan Tanah':
                $specificFields = ['lokasi_tanah', 'luas_tanah', 'bukti_kepemilikan'];
                break;
                
            case 'Surat Izin Keramaian':
                $specificFields = ['jenis_acara', 'tanggal_acara', 'lokasi_acara', 'jumlah_undangan'];
                break;
                
            case 'Surat Keterangan Usaha':
                $specificFields = ['jenis_usaha', 'alamat_usaha', 'tanggal_mulai_usaha'];
                break;
                
            case 'Surat Keterangan Jual Tanah':
                $specificFields = ['lokasi_tanah', 'luas_tanah', 'nama_pembeli'];
                break;
        }
        
        return json_encode(array_merge($baseFields, $specificFields));
    }
}