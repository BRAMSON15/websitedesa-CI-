<?php

namespace App\Controllers;

use App\Models\ProfilDesaModel;

class ProfilController extends BaseController
{
    protected $profilModel;

    public function __construct()
    {
        $this->profilModel = new ProfilDesaModel();
    }

    private function checkAuth()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        return null;
    }

    public function kelola_umum() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak.');
        }

        $profil = $this->profilModel->first();

        return view('profil/kelola_umum', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'profil' => $profil
        ]);
    }
    
    public function kelola_visimisi() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak.');
        }

        $profil = $this->profilModel->first();

        return view('profil/kelola_visimisi', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'profil' => $profil
        ]);
    }
    
    public function kelola_sejarah() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak.');
        }

        return redirect()->to('/profil/kelola_umum');
    }
    
    public function lihat() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $profil = $this->profilModel->first();

        return view('profil/lihat', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'profil' => $profil
        ]);
    }
    
    public function lihat_visimisi() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $profil = $this->profilModel->first();

        return view('profil/lihat_visimisi', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'profil' => $profil
        ]);
    }
    
    public function lihat_sejarah() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $profil = $this->profilModel->first();

        return view('profil/lihat_sejarah', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'profil' => $profil
        ]);
    }

    public function simpanVisimisi()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        if($session->get('role') !== 'admin') {
            return $this->response->setJSON(['success' => false, 'message' => 'Akses ditolak'])->setStatusCode(403);
        }

        $visi = $this->request->getPost('visi');
        $misi = $this->request->getPost('misi');

        $profil_existing = $this->profilModel->first();

        $data = [
            'visi' => $visi,
            'misi' => $misi,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        try {
            if($profil_existing) {
                $this->profilModel->update($profil_existing['id'], $data);
                $message = 'Visi & Misi berhasil diperbarui';
            } else {
                $data['nama_desa'] = 'Desa Tifu';
                $data['created_at'] = date('Y-m-d H:i:s');
                $this->profilModel->insert($data);
                $message = 'Visi & Misi berhasil disimpan';
            }

            return $this->response->setJSON(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            log_message('error', 'Error saving visi misi: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menyimpan: ' . $e->getMessage()])->setStatusCode(500);
        }
    }

    public function simpanProfil()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        if($session->get('role') !== 'admin') {
            return $this->response->setJSON(['success' => false, 'message' => 'Akses ditolak'])->setStatusCode(403);
        }

        $sejarah = $this->request->getPost('sejarah');

        $profil_existing = $this->profilModel->first();

        $data = [
            'sejarah' => $sejarah,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        try {
            if($profil_existing) {
                $this->profilModel->update($profil_existing['id'], $data);
                $message = 'Profil Desa berhasil diperbarui';
            } else {
                $data['nama_desa'] = 'Desa Tifu';
                $data['created_at'] = date('Y-m-d H:i:s');
                $this->profilModel->insert($data);
                $message = 'Profil Desa berhasil disimpan';
            }

            return $this->response->setJSON(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            log_message('error', 'Error saving profil: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menyimpan: ' . $e->getMessage()])->setStatusCode(500);
        }
    }
}