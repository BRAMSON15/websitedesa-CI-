<?php

namespace App\Controllers;

use App\Models\SuratModel;
use App\Models\JenisSuratModel;
use App\Models\TemplateSuratModel;
use App\Libraries\PdfGenerator;

class SuratController extends BaseController
{
    protected $suratModel;
    protected $jenisSuratModel;
    protected $templateSuratModel;

    public function __construct()
    {
        $this->suratModel = new SuratModel();
        $this->jenisSuratModel = new JenisSuratModel();
        $this->templateSuratModel = new TemplateSuratModel();
    }

    private function checkAuth()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        return null;
    }

    private function renderView($title)
    {
        $session = session();
        if(!$session->get('logged_in')) return redirect()->to('/login');
        return view('dashboard/placeholder', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'page_title' => $title
        ]);
    }

    // Admin: Kelola surat (verifikasi pengajuan)
    public function kelola() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Hanya admin yang bisa akses
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        // Ambil semua pengajuan surat dengan join
        $suratList = $this->suratModel
            ->select('surat.*, jenis_surat.nama_surat, users.nama as nama_pemohon, users.username')
            ->join('jenis_surat', 'jenis_surat.id_jenis = surat.id_jenis')
            ->join('users', 'users.user_id = surat.user_id')
            ->orderBy('surat.created_at', 'DESC')
            ->findAll();

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'surat_list' => $suratList,
            'total_surat' => count($suratList),
            'menunggu' => count(array_filter($suratList, fn($s) => $s['status_surat'] == 'Menunggu')),
            'disetujui' => count(array_filter($suratList, fn($s) => $s['status_surat'] == 'Disetujui')),
            'ditolak' => count(array_filter($suratList, fn($s) => $s['status_surat'] == 'Ditolak'))
        ];

        return view('admin/surat/kelola', $data);
    }

    // Admin: Detail pengajuan untuk verifikasi
    public function verifikasi($id_surat)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Hanya admin yang bisa akses
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $surat = $this->suratModel
            ->select('surat.*, jenis_surat.nama_surat, users.nama as nama_pemohon, users.username')
            ->join('jenis_surat', 'jenis_surat.id_jenis = surat.id_jenis')
            ->join('users', 'users.user_id = surat.user_id')
            ->where('surat.id_surat', $id_surat)
            ->first();

        if(!$surat) {
            return redirect()->to('/surat/kelola')->with('error', 'Pengajuan surat tidak ditemukan');
        }

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'surat' => $surat
        ];

        return view('admin/surat/verifikasi', $data);
    }

    // Admin: Proses verifikasi (setujui/tolak)
    public function prosesVerifikasi()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Hanya admin yang bisa akses
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $id_surat = $this->request->getPost('id_surat');
        $status = $this->request->getPost('status');
        $keterangan = $this->request->getPost('keterangan');

        // Validasi input
        if(!in_array($status, ['Disetujui', 'Ditolak'])) {
            return redirect()->back()->with('error', 'Status tidak valid');
        }

        if(empty($keterangan)) {
            return redirect()->back()->with('error', 'Keterangan harus diisi');
        }

        $surat = $this->suratModel->find($id_surat);
        if(!$surat) {
            return redirect()->to('/surat/kelola')->with('error', 'Pengajuan tidak ditemukan');
        }

        try {
            $this->suratModel->update($id_surat, [
                'status_surat' => $status,
                'keterangan' => $keterangan
            ]);

            $message = $status == 'Disetujui' ? 'Pengajuan surat berhasil disetujui' : 'Pengajuan surat berhasil ditolak';
            return redirect()->to('/surat/kelola')->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memproses verifikasi: ' . $e->getMessage());
        }
    }
    public function persetujuan() { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Hanya kepala desa yang bisa akses
        if($session->get('role') !== 'kepala_desa') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak. Hanya kepala desa yang dapat mengakses halaman ini.');
        }

        return view('dashboard/placeholder', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'page_title' => 'Persetujuan Surat'
        ]);
    }

    // Halaman pilih jenis surat
    public function ajukan() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $jenisSurat = $this->jenisSuratModel->findAll();

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'jenis_surat' => $jenisSurat
        ];

        return view('surat/pilih_jenis', $data);
    }

    // Halaman form pengajuan
    public function form($id_jenis = null)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        if(!$id_jenis) {
            return redirect()->to('/surat/ajukan')->with('error', 'Pilih jenis surat terlebih dahulu');
        }

        $session = session();
        $jenisSurat = $this->jenisSuratModel->find($id_jenis);

        if(!$jenisSurat) {
            return redirect()->to('/surat/ajukan')->with('error', 'Jenis surat tidak ditemukan');
        }

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'jenis_surat' => $jenisSurat
        ];

        return view('surat/form_pengajuan', $data);
    }

    // Proses submit pengajuan
    public function submit()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Validasi input
        $rules = [
            'id_jenis' => 'required|numeric',
            'keperluan' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data form
        $id_jenis = $this->request->getPost('id_jenis');
        $keperluan = $this->request->getPost('keperluan');
        
        // Ambil semua data tambahan dari form
        $dataPengajuan = [
            'keperluan' => $keperluan,
        ];

        // Ambil field dinamis lainnya
        $postData = $this->request->getPost();
        foreach($postData as $key => $value) {
            if($key != 'id_jenis' && $key != 'keperluan') {
                $dataPengajuan[$key] = $value;
            }
        }

        // Simpan ke database
        $data = [
            'user_id' => $session->get('user_id'),
            'id_jenis' => $id_jenis,
            'tanggal_pengajuan' => date('Y-m-d'),
            'status_surat' => 'Menunggu',
            'data_pengajuan' => json_encode($dataPengajuan)
        ];

        try {
            $this->suratModel->insert($data);
            return redirect()->to('/surat/status')->with('success', 'Pengajuan surat berhasil dikirim dan menunggu persetujuan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengirim pengajuan: ' . $e->getMessage());
        }
    }

    // Halaman status pengajuan
    public function status() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $userId = $session->get('user_id');

        // Ambil semua surat user dengan join ke jenis_surat
        $suratList = $this->suratModel
            ->select('surat.*, jenis_surat.nama_surat')
            ->join('jenis_surat', 'jenis_surat.id_jenis = surat.id_jenis')
            ->where('surat.user_id', $userId)
            ->orderBy('surat.created_at', 'DESC')
            ->findAll();

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'surat_list' => $suratList
        ];

        return view('surat/status_pengajuan', $data);
    }

    // Detail pengajuan
    public function detail($id_surat)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $userId = $session->get('user_id');

        $surat = $this->suratModel
            ->select('surat.*, jenis_surat.nama_surat')
            ->join('jenis_surat', 'jenis_surat.id_jenis = surat.id_jenis')
            ->where('surat.id_surat', $id_surat)
            ->where('surat.user_id', $userId)
            ->first();

        if(!$surat) {
            return redirect()->to('/surat/status')->with('error', 'Surat tidak ditemukan');
        }

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'surat' => $surat
        ];

        return view('surat/detail_pengajuan', $data);
    }

    // Generate PDF surat
    public function generatePdf($id_surat)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Hanya admin yang bisa generate PDF
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        // Ambil data surat
        $surat = $this->suratModel
            ->select('surat.*, jenis_surat.nama_surat, users.nama as nama_pemohon, users.username')
            ->join('jenis_surat', 'jenis_surat.id_jenis = surat.id_jenis')
            ->join('users', 'users.user_id = surat.user_id')
            ->where('surat.id_surat', $id_surat)
            ->first();

        if(!$surat) {
            return redirect()->to('/surat/kelola')->with('error', 'Surat tidak ditemukan');
        }

        // Hanya surat yang disetujui yang bisa dicetak
        if($surat['status_surat'] !== 'Disetujui') {
            return redirect()->back()->with('error', 'Hanya surat yang disetujui yang dapat dicetak');
        }

        try {
            // Parse data pengajuan
            $dataPengajuan = json_decode($surat['data_pengajuan'], true);
            
            // Siapkan data untuk PDF
            $pdfData = [
                'nomor_surat' => $this->generateNomorSurat($surat),
                'nama' => $surat['nama_pemohon'],
                'nik' => $dataPengajuan['nik'] ?? '',
                'jenis_kelamin' => $dataPengajuan['jenis_kelamin'] ?? '',
                'agama' => $dataPengajuan['agama'] ?? '',
                'pekerjaan' => $dataPengajuan['pekerjaan'] ?? '',
                'status_perkawinan' => $dataPengajuan['status_perkawinan'] ?? '',
                'alamat' => $dataPengajuan['alamat'] ?? '',
                'keperluan' => $this->generateKeperluan($surat['nama_surat'], $dataPengajuan),
                'tanggal_surat' => date('Y-m-d')
            ];

            // Generate PDF
            $pdfGenerator = new PdfGenerator();
            $pdf = $pdfGenerator->generateSuratKeterangan($pdfData, $surat['nama_surat']);
            
            // Output PDF
            $filename = 'Surat_' . str_replace(' ', '_', $surat['nama_surat']) . '_' . $surat['nama_pemohon'] . '.pdf';
            $pdf->Output($filename, 'D'); // 'D' untuk download
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal generate PDF: ' . $e->getMessage());
        }
    }

    // Preview PDF surat
    public function previewPdf($id_surat)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Hanya admin yang bisa preview PDF
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        // Ambil data surat
        $surat = $this->suratModel
            ->select('surat.*, jenis_surat.nama_surat, users.nama as nama_pemohon, users.username')
            ->join('jenis_surat', 'jenis_surat.id_jenis = surat.id_jenis')
            ->join('users', 'users.user_id = surat.user_id')
            ->where('surat.id_surat', $id_surat)
            ->first();

        if(!$surat) {
            return redirect()->to('/surat/kelola')->with('error', 'Surat tidak ditemukan');
        }

        // Hanya surat yang disetujui yang bisa dicetak
        if($surat['status_surat'] !== 'Disetujui') {
            return redirect()->back()->with('error', 'Hanya surat yang disetujui yang dapat dicetak');
        }

        try {
            // Parse data pengajuan
            $dataPengajuan = json_decode($surat['data_pengajuan'], true);
            
            // Siapkan data untuk PDF
            $pdfData = [
                'nomor_surat' => $this->generateNomorSurat($surat),
                'nama' => $surat['nama_pemohon'],
                'nik' => $dataPengajuan['nik'] ?? '',
                'jenis_kelamin' => $dataPengajuan['jenis_kelamin'] ?? '',
                'agama' => $dataPengajuan['agama'] ?? '',
                'pekerjaan' => $dataPengajuan['pekerjaan'] ?? '',
                'status_perkawinan' => $dataPengajuan['status_perkawinan'] ?? '',
                'alamat' => $dataPengajuan['alamat'] ?? '',
                'keperluan' => $this->generateKeperluan($surat['nama_surat'], $dataPengajuan),
                'tanggal_surat' => date('Y-m-d')
            ];

            // Generate PDF
            $pdfGenerator = new PdfGenerator();
            $pdf = $pdfGenerator->generateSuratKeterangan($pdfData, $surat['nama_surat']);
            
            // Output PDF untuk preview di browser
            $filename = 'Preview_Surat_' . str_replace(' ', '_', $surat['nama_surat']) . '.pdf';
            $pdf->Output($filename, 'I'); // 'I' untuk inline preview
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal preview PDF: ' . $e->getMessage());
        }
    }

    private function generateNomorSurat($surat)
    {
        // Format: 140/18/DT/II/2026
        $bulan = date('m');
        $tahun = date('Y');
        $urutan = str_pad($surat['id_surat'], 3, '0', STR_PAD_LEFT);
        
        return "{$urutan}/18/DT/" . $this->getRomanMonth($bulan) . "/{$tahun}";
    }

    private function getRomanMonth($month)
    {
        $romans = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI',
            7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
        ];
        return $romans[(int)$month];
    }

    private function generateKeperluan($jenisSurat, $dataPengajuan)
    {
        $keperluan = $dataPengajuan['keperluan'] ?? '';
        
        // Tambahkan keterangan spesifik berdasarkan jenis surat
        switch ($jenisSurat) {
            case 'Surat Keterangan Domisili':
                $tambahan = "Adalah benar-benar penduduk dan berdomisili di alamat tersebut di atas";
                if(isset($dataPengajuan['tanggal_domisili'])) {
                    $tambahan .= " sejak " . date('d F Y', strtotime($dataPengajuan['tanggal_domisili']));
                }
                $tambahan .= ". Surat keterangan ini dibuat untuk keperluan " . strtolower($keperluan) . ".";
                return $tambahan;
                
            case 'Surat Keterangan Nikah':
                $tambahan = "Adalah benar-benar penduduk desa kami dan akan melangsungkan pernikahan";
                if(isset($dataPengajuan['nama_pasangan'])) {
                    $tambahan .= " dengan " . $dataPengajuan['nama_pasangan'];
                }
                if(isset($dataPengajuan['tanggal_nikah'])) {
                    $tambahan .= " pada " . date('d F Y', strtotime($dataPengajuan['tanggal_nikah']));
                }
                $tambahan .= ". Surat keterangan ini dibuat untuk keperluan pendaftaran nikah di KUA.";
                return $tambahan;
                
            case 'Surat Keterangan Belum Nikah':
                return "Adalah benar-benar penduduk desa kami dan sampai dengan dikeluarkannya surat keterangan ini yang bersangkutan belum pernah menikah. Surat keterangan ini dibuat untuk keperluan " . strtolower($keperluan) . ".";
                
            case 'Surat Keterangan Tidak Mampu':
                $tambahan = "Adalah benar-benar penduduk desa kami yang tergolong keluarga tidak mampu";
                if(isset($dataPengajuan['penghasilan'])) {
                    $tambahan .= " dengan penghasilan rata-rata " . $dataPengajuan['penghasilan'] . " per bulan";
                }
                $tambahan .= ". Surat keterangan ini dibuat untuk keperluan " . strtolower($keperluan) . ".";
                return $tambahan;
                
            case 'Surat Keterangan Kepemilikan Tanah':
                $tambahan = "Adalah benar-benar pemilik tanah";
                if(isset($dataPengajuan['lokasi_tanah'])) {
                    $tambahan .= " yang terletak di " . $dataPengajuan['lokasi_tanah'];
                }
                if(isset($dataPengajuan['luas_tanah'])) {
                    $tambahan .= " dengan luas " . $dataPengajuan['luas_tanah'] . " m²";
                }
                if(isset($dataPengajuan['bukti_kepemilikan'])) {
                    $tambahan .= " berdasarkan " . $dataPengajuan['bukti_kepemilikan'];
                }
                $tambahan .= ". Surat keterangan ini dibuat untuk keperluan " . strtolower($keperluan) . ".";
                return $tambahan;
                
            case 'Surat Izin Keramaian':
                $tambahan = "Dengan ini memberikan izin kepada yang bersangkutan untuk mengadakan acara";
                if(isset($dataPengajuan['jenis_acara'])) {
                    $tambahan .= " " . $dataPengajuan['jenis_acara'];
                }
                if(isset($dataPengajuan['tanggal_acara'])) {
                    $tambahan .= " pada " . date('d F Y', strtotime($dataPengajuan['tanggal_acara']));
                }
                if(isset($dataPengajuan['lokasi_acara'])) {
                    $tambahan .= " di " . $dataPengajuan['lokasi_acara'];
                }
                if(isset($dataPengajuan['jumlah_undangan'])) {
                    $tambahan .= " dengan perkiraan jumlah undangan " . $dataPengajuan['jumlah_undangan'] . " orang";
                }
                $tambahan .= ".";
                return $tambahan;
                
            case 'Surat Keterangan Usaha':
                $tambahan = "Adalah benar-benar penduduk desa kami yang memiliki usaha";
                if(isset($dataPengajuan['jenis_usaha'])) {
                    $tambahan .= " " . $dataPengajuan['jenis_usaha'];
                }
                if(isset($dataPengajuan['alamat_usaha'])) {
                    $tambahan .= " yang berlokasi di " . $dataPengajuan['alamat_usaha'];
                }
                if(isset($dataPengajuan['tanggal_mulai_usaha'])) {
                    $tambahan .= " sejak " . date('d F Y', strtotime($dataPengajuan['tanggal_mulai_usaha']));
                }
                $tambahan .= ". Surat keterangan ini dibuat untuk keperluan " . strtolower($keperluan) . ".";
                return $tambahan;
                
            case 'Surat Keterangan Jual Tanah':
                $tambahan = "Adalah benar-benar pemilik sah tanah";
                if(isset($dataPengajuan['lokasi_tanah'])) {
                    $tambahan .= " yang terletak di " . $dataPengajuan['lokasi_tanah'];
                }
                if(isset($dataPengajuan['luas_tanah'])) {
                    $tambahan .= " dengan luas " . $dataPengajuan['luas_tanah'] . " m²";
                }
                if(isset($dataPengajuan['nama_pembeli'])) {
                    $tambahan .= " dan akan menjual tanah tersebut kepada " . $dataPengajuan['nama_pembeli'];
                }
                $tambahan .= ". Tanah tersebut tidak dalam sengketa dan bebas dari segala ikatan.";
                return $tambahan;
                
            default:
                return $keperluan;
        }
    }
}
