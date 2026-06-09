<?php

namespace App\Controllers;

use App\Models\StrukturDesaModel;

class StrukturController extends BaseController
{
    protected $strukturModel;

    public function __construct()
    {
        $this->strukturModel = new StrukturDesaModel();
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

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'page_title' => 'Kelola Struktur Desa',
            'struktur_list' => $this->strukturModel->findAll()
        ];

        return view('struktur/kelola', $data);
    }

    public function simpan()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'jabatan' => 'required|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan')
        ];

        $this->strukturModel->insert($data);
        return redirect()->to('/struktur/kelola')->with('success', 'Data struktur berhasil ditambahkan');
    }

    public function update($id)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'jabatan' => 'required|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan')
        ];

        $this->strukturModel->update($id, $data);
        return redirect()->to('/struktur/kelola')->with('success', 'Data struktur berhasil diperbarui');
    }

    public function hapus($id)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $this->strukturModel->delete($id);
        return redirect()->to('/struktur/kelola')->with('success', 'Data struktur berhasil dihapus');
    }

    public function lihat()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'page_title' => 'Struktur Desa',
            'struktur_list' => $this->strukturModel->findAll()
        ];

        return view('struktur/lihat', $data);
    }
}
