<?php

namespace App\Controllers;

use App\Models\ProfilDesaModel;

class StrukturController extends BaseController
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

    public function kelola()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak.');
        }

        $profil = $this->profilModel->first();
        if (!$profil) {
            $this->profilModel->insert(['nama_desa' => 'Desa Cerdas']);
            $profil = $this->profilModel->first();
        }

        // Set default json if empty
        $defaultJson = json_encode([
            ['id' => 1, 'name' => 'Kepala Desa', 'title' => 'Nama Kepala Desa']
        ]);

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'page_title' => 'Kelola Bagan Struktur Desa',
            'profil' => $profil,
            'struktur_json' => empty($profil['struktur_json']) ? $defaultJson : $profil['struktur_json']
        ];

        return view('struktur/kelola', $data);
    }

    public function simpan()
    {
        $auth = $this->checkAuth();
        if($auth) {
            if ($this->request->isAJAX()) return $this->response->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
            return $auth;
        }

        $profil = $this->profilModel->first();
        $json = $this->request->getPost('struktur_json');
        
        if ($json !== null) {
            $this->profilModel->update($profil['id'], ['struktur_json' => $json]);
            
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Bagan berhasil disimpan']);
            }
            
            return redirect()->to('/struktur/kelola')->with('success', 'Bagan struktur berhasil diperbarui');
        }

        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data tidak valid']);
        }
        return redirect()->back()->with('error', 'Gagal menyimpan bagan.');
    }

    public function uploadFoto()
    {
        $auth = $this->checkAuth();
        if($auth) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }

        $fileGambar = $this->request->getFile('foto');
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $rules = [
                'foto' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]'
            ];
            
            if (!$this->validate($rules)) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'File tidak valid. Max 2MB (JPG/PNG).']);
            }

            $newName = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'uploads/struktur', $newName);
            
            $url = base_url('uploads/struktur/' . $newName);
            return $this->response->setJSON(['status' => 'success', 'url' => $url]);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal mengunggah foto.']);
    }

    // `lihat` function for masyarakat if they click some link
    public function lihat()
    {
        return redirect()->to('/#struktur');
    }
}
