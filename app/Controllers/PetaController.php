<?php

namespace App\Controllers;

use App\Models\PetaAdministrasiModel;

class PetaController extends BaseController
{
    protected $petaModel;

    public function __construct()
    {
        $this->petaModel = new PetaAdministrasiModel();
    }

    private function checkAuth()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        return null;
    }

    public function index() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $peta = $this->petaModel->first();
        
        // Get jumlah penduduk
        $db = \Config\Database::connect();
        $jumlah_penduduk = $db->table('penduduk')->countAllResults();

        return view('peta/index', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'peta' => $peta,
            'jumlah_penduduk' => $jumlah_penduduk
        ]);
    }

    public function detail()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $peta = $this->petaModel->first();

        return view('peta/detail', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'peta' => $peta
        ]);
    }

    public function statistik()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $peta = $this->petaModel->first();
        
        $db = \Config\Database::connect();
        
        $stats = [
            'total_penduduk' => $db->table('penduduk')->countAllResults(),
            'laki_laki' => $db->table('penduduk')->where('jenis_kelamin', 'Laki-laki')->countAllResults(),
            'perempuan' => $db->table('penduduk')->where('jenis_kelamin', 'Perempuan')->countAllResults(),
        ];

        return view('peta/statistik', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'peta' => $peta,
            'stats' => $stats
        ]);
    }

    public function export()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $peta = $this->petaModel->first();

        return view('peta/export', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'peta' => $peta
        ]);
    }

    public function galeri()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $peta = $this->petaModel->first();

        return view('peta/galeri', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'peta' => $peta
        ]);
    }
    
    public function kelola() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Check role
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak.');
        }

        $peta = $this->petaModel->first();

        return view('peta/kelola', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'peta' => $peta
        ]);
    }

    public function simpanPeta()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        if($session->get('role') !== 'admin') {
            return $this->response->setJSON(['success' => false, 'message' => 'Akses ditolak'])->setStatusCode(403);
        }

        $judul_peta = $this->request->getPost('judul_peta');
        $data_spasial = $this->request->getPost('data_spasial');
        $deskripsi = $this->request->getPost('deskripsi');
        $luas_wilayah = $this->request->getPost('luas_wilayah');
        $koordinat_lat = $this->request->getPost('koordinat_lat');
        $koordinat_lng = $this->request->getPost('koordinat_lng');

        $peta_existing = $this->petaModel->first();

        $data = [
            'judul_peta' => $judul_peta,
            'data_spasial' => $data_spasial,
            'deskripsi' => $deskripsi,
            'luas_wilayah' => $luas_wilayah,
            'koordinat_lat' => $koordinat_lat,
            'koordinat_lng' => $koordinat_lng,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        try {
            if($peta_existing) {
                $this->petaModel->update($peta_existing['id_peta'], $data);
                $message = 'Peta berhasil diperbarui';
            } else {
                $data['created_at'] = date('Y-m-d H:i:s');
                $this->petaModel->insert($data);
                $message = 'Peta berhasil disimpan';
            }

            return $this->response->setJSON(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            log_message('error', 'Error saving peta: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menyimpan peta: ' . $e->getMessage()])->setStatusCode(500);
        }
    }
}
