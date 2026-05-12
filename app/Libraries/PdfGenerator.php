<?php

namespace App\Libraries;

use TCPDF;
use App\Config\SuratTemplates;

class PdfGenerator
{
    private $pdf;
    private $templateConfig;
    
    public function __construct()
    {
        // Create new PDF document
        $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Load template configuration
        $this->templateConfig = new SuratTemplates();
        
        // Set document information
        $this->pdf->SetCreator('SIDESA');
        $this->pdf->SetAuthor('Sistem Informasi Desa');
        $this->pdf->SetTitle('Surat Keterangan');
        
        // Remove default header/footer
        $this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(false);
        
        // Set margins
        $this->pdf->SetMargins(20, 20, 20);
        $this->pdf->SetAutoPageBreak(TRUE, 20);
        
        // Set font
        $this->pdf->SetFont('times', '', 12);
    }
    
    public function generateSuratKeterangan($data, $letterType = null)
    {
        // Add a page
        $this->pdf->AddPage();
        
        // Header with logo and title
        $this->addHeader();
        
        // Add content based on template
        $this->addContent($data, $letterType);
        
        // Add signature section
        $this->addSignature($data);
        
        return $this->pdf;
    }
    
    private function addHeader()
    {
        // Logo (if exists)
        $logoPath = FCPATH . 'logo/image.png';
        if (file_exists($logoPath)) {
            $this->pdf->Image($logoPath, 25, 25, 25, 25, 'PNG');
        }
        
        // Header text
        $this->pdf->SetFont('times', 'B', 14);
        $this->pdf->Cell(0, 8, 'PEMERINTAH KABUPATEN BURU', 0, 1, 'C');
        $this->pdf->Cell(0, 8, 'KECAMATAN LOLONG GUBA', 0, 1, 'C');
        $this->pdf->Cell(0, 8, 'DESA TIFU', 0, 1, 'C');
        
        $this->pdf->SetFont('times', '', 10);
        $this->pdf->Cell(0, 6, 'Alamat: Jalan Inaboti No 01 Telep ___Code Pos: 97574', 0, 1, 'C');
        
        // Line separator
        $this->pdf->Ln(5);
        $this->pdf->Line(20, $this->pdf->GetY(), 190, $this->pdf->GetY());
        $this->pdf->Line(20, $this->pdf->GetY() + 1, 190, $this->pdf->GetY() + 1);
        $this->pdf->Ln(10);
    }
    
    private function addContent($data, $letterType = null)
    {
        // Get template configuration
        $template = null;
        if ($letterType) {
            $template = $this->templateConfig->getTemplate($letterType);
        }
        
        // Title
        $this->pdf->SetFont('times', 'BU', 14);
        $title = $template ? $template['title'] : 'SURAT KETERANGAN';
        $this->pdf->Cell(0, 10, $title, 0, 1, 'C');
        
        // Nomor surat
        $this->pdf->SetFont('times', '', 12);
        $nomor = 'Nomor: ' . ($data['nomor_surat'] ?? '140 /18 / DT / II / 2026');
        $this->pdf->Cell(0, 8, $nomor, 0, 1, 'C');
        $this->pdf->Ln(5);
        
        // Content
        $this->pdf->SetFont('times', '', 12);
        $this->pdf->Cell(0, 8, 'Yang bertanda tangan dibawah ini;', 0, 1, 'L');
        $this->pdf->Ln(3);
        
        // Kepala Desa info
        $this->pdf->Cell(30, 6, 'Nama', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, 'NIKLAS SALASIWA', 0, 1, 'L');
        
        $this->pdf->Cell(30, 6, 'Jabatan', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, 'Kepala Desa', 0, 1, 'L');
        
        $this->pdf->Cell(30, 6, 'Alamat', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, 'Desa Tifu Kecamatan Lolong Guba Kab. Buru', 0, 1, 'L');
        $this->pdf->Ln(5);
        
        // Main content
        $this->pdf->Cell(0, 8, 'Dengan ini menerangkan dengan sesungguhnya bahwa:', 0, 1, 'L');
        $this->pdf->Ln(3);
        
        // Pemohon data
        $this->pdf->Cell(40, 6, 'Nama Lengkap / Alias', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, $data['nama'] ?? '', 0, 1, 'L');
        
        $this->pdf->Cell(40, 6, 'NIK', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, $data['nik'] ?? '', 0, 1, 'L');
        
        $this->pdf->Cell(40, 6, 'Jenis Kelamin', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, $data['jenis_kelamin'] ?? '', 0, 1, 'L');
        
        $this->pdf->Cell(40, 6, 'Agama', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, $data['agama'] ?? '', 0, 1, 'L');
        
        $this->pdf->Cell(40, 6, 'Pekerjaan', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, $data['pekerjaan'] ?? '', 0, 1, 'L');
        
        $this->pdf->Cell(40, 6, 'Status perkawinan', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, $data['status_perkawinan'] ?? '', 0, 1, 'L');
        
        $this->pdf->Cell(40, 6, 'Tempat Tinggal', 0, 0, 'L');
        $this->pdf->Cell(5, 6, ':', 0, 0, 'L');
        $this->pdf->Cell(0, 6, $data['alamat'] ?? '', 0, 1, 'L');
        $this->pdf->Ln(5);
        
        // Template-specific content
        if ($template && isset($template['content'])) {
            $content = $this->replaceTemplatePlaceholders($template['content'], $data);
        } else {
            // Fallback content
            $content = $data['keperluan'] ?? 'Surat keterangan ini dibuat untuk keperluan yang bersangkutan.';
        }
        
        $this->pdf->MultiCell(0, 6, $content, 0, 'J');
        $this->pdf->Ln(5);
        
        $this->pdf->Cell(0, 8, 'Demikian Surat keterangan ini di buat dan di pergunakan sebagaimana perlunya dan dapat di pertanggungjawabkan.', 0, 1, 'L');
    }
    
    private function replaceTemplatePlaceholders($content, $data)
    {
        // Replace all placeholders with actual data
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
    
    private function addSignature($data)
    {
        $this->pdf->Ln(10);
        
        // Date and place
        $tanggal = date('d F Y');
        if (isset($data['tanggal_surat'])) {
            $tanggal = date('d F Y', strtotime($data['tanggal_surat']));
        }
        
        $this->pdf->Cell(0, 8, 'Tifu, ' . $tanggal, 0, 1, 'R');
        $this->pdf->Cell(0, 8, 'Plt Kepala Desa Tifu,', 0, 1, 'R');
        $this->pdf->Ln(20);
        
        // Signature name and NIP
        $this->pdf->SetFont('times', 'BU', 12);
        $this->pdf->Cell(0, 8, 'NIKLAS SALASIWA', 0, 1, 'R');
        $this->pdf->SetFont('times', '', 12);
        $this->pdf->Cell(0, 8, 'NIP 197005122014121004', 0, 1, 'R');
    }
    
    public function output($filename = 'surat_keterangan.pdf', $dest = 'I')
    {
        return $this->pdf->Output($filename, $dest);
    }
    
    public function save($filepath)
    {
        return $this->pdf->Output($filepath, 'F');
    }
}