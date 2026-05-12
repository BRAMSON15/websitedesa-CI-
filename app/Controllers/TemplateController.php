<?php

namespace App\Controllers;

use App\Config\SuratTemplates;

class TemplateController extends BaseController
{
    protected $templateConfig;

    public function __construct()
    {
        $this->templateConfig = new SuratTemplates();
    }

    private function checkAuth()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        // Hanya admin yang bisa akses
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }
        
        return null;
    }

    // Halaman kelola template
    public function index()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $templates = $this->templateConfig->getAllTemplates();

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'templates' => $templates
        ];

        return view('admin/template/index', $data);
    }

    // Halaman edit template
    public function edit($letterType)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $template = $this->templateConfig->getTemplate(urldecode($letterType));

        if(!$template) {
            return redirect()->to('/template')->with('error', 'Template tidak ditemukan');
        }

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'letter_type' => urldecode($letterType),
            'template' => $template
        ];

        return view('admin/template/edit', $data);
    }

    // Preview template
    public function preview($letterType)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $template = $this->templateConfig->getTemplate(urldecode($letterType));

        if(!$template) {
            return redirect()->to('/template')->with('error', 'Template tidak ditemukan');
        }

        // Sample data for preview
        $sampleData = [
            'nama' => 'CONTOH NAMA PEMOHON',
            'nik' => '1234567890123456',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'pekerjaan' => 'Wiraswasta',
            'status_perkawinan' => 'Kawin',
            'alamat' => 'Jl. Contoh No. 123, RT 01/RW 02, Desa Tifu',
            'keperluan' => 'Contoh keperluan pembuatan surat',
            
            // Sample specific data
            'tanggal_domisili' => '2020-01-01',
            'nama_pasangan' => 'CONTOH NAMA PASANGAN',
            'tanggal_nikah' => '2026-06-01',
            'penghasilan' => 'Rp 1.000.000',
            'lokasi_tanah' => 'Jl. Contoh Tanah No. 456, Desa Tifu',
            'luas_tanah' => '500',
            'bukti_kepemilikan' => 'Sertifikat Hak Milik',
            'jenis_acara' => 'Pernikahan',
            'tanggal_acara' => '2026-07-01',
            'lokasi_acara' => 'Balai Desa Tifu',
            'jumlah_undangan' => '200',
            'jenis_usaha' => 'Warung Makan',
            'alamat_usaha' => 'Jl. Contoh Usaha No. 789, Desa Tifu',
            'tanggal_mulai_usaha' => '2020-01-01',
            'nama_pembeli' => 'CONTOH NAMA PEMBELI'
        ];

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'letter_type' => urldecode($letterType),
            'template' => $template,
            'sample_data' => $sampleData,
            'preview_content' => $this->replaceTemplatePlaceholders($template['content'], $sampleData)
        ];

        return view('admin/template/preview', $data);
    }

    private function replaceTemplatePlaceholders($content, $data)
    {
        $placeholders = [
            '{{NAMA}}' => $data['nama'] ?? '',
            '{{NIK}}' => $data['nik'] ?? '',
            '{{JENIS_KELAMIN}}' => $data['jenis_kelamin'] ?? '',
            '{{AGAMA}}' => $data['agama'] ?? '',
            '{{PEKERJAAN}}' => $data['pekerjaan'] ?? '',
            '{{STATUS_PERKAWINAN}}' => $data['status_perkawinan'] ?? '',
            '{{ALAMAT}}' => $data['alamat'] ?? '',
            '{{KEPERLUAN}}' => $data['keperluan'] ?? '',
            
            // Letter-specific placeholders
            '{{TANGGAL_DOMISILI}}' => isset($data['tanggal_domisili']) ? date('d F Y', strtotime($data['tanggal_domisili'])) : '',
            '{{NAMA_PASANGAN}}' => $data['nama_pasangan'] ?? '',
            '{{TANGGAL_NIKAH}}' => isset($data['tanggal_nikah']) ? date('d F Y', strtotime($data['tanggal_nikah'])) : '',
            '{{PENGHASILAN}}' => $data['penghasilan'] ?? '',
            '{{LOKASI_TANAH}}' => $data['lokasi_tanah'] ?? '',
            '{{LUAS_TANAH}}' => $data['luas_tanah'] ?? '',
            '{{BUKTI_KEPEMILIKAN}}' => $data['bukti_kepemilikan'] ?? '',
            '{{JENIS_ACARA}}' => $data['jenis_acara'] ?? '',
            '{{TANGGAL_ACARA}}' => isset($data['tanggal_acara']) ? date('d F Y', strtotime($data['tanggal_acara'])) : '',
            '{{LOKASI_ACARA}}' => $data['lokasi_acara'] ?? '',
            '{{JUMLAH_UNDANGAN}}' => $data['jumlah_undangan'] ?? '',
            '{{JENIS_USAHA}}' => $data['jenis_usaha'] ?? '',
            '{{ALAMAT_USAHA}}' => $data['alamat_usaha'] ?? '',
            '{{TANGGAL_MULAI_USAHA}}' => isset($data['tanggal_mulai_usaha']) ? date('d F Y', strtotime($data['tanggal_mulai_usaha'])) : '',
            '{{NAMA_PEMBELI}}' => $data['nama_pembeli'] ?? '',
        ];
        
        return str_replace(array_keys($placeholders), array_values($placeholders), $content);
    }
}