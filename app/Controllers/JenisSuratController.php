<?php

namespace App\Controllers;

use App\Models\JenisSuratModel;

class JenisSuratController extends BaseController
{
    protected $jenisSuratModel;

    public function __construct()
    {
        $this->jenisSuratModel = new JenisSuratModel();
    }

    private function checkAuth()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        // Hanya admin yang bisa akses
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak.');
        }
        
        return null;
    }

    public function index()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'page_title' => 'Kelola Jenis Surat',
            'jenis_surat_list' => $this->jenisSuratModel->findAll()
        ];

        return view('admin/jenis_surat/index', $data);
    }

    public function simpan()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $rules = [
            'nama_surat' => 'required|min_length[3]|max_length[100]',
            'template' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_surat' => $this->request->getPost('nama_surat'),
            'template' => $this->request->getPost('template')
        ];

        try {
            $this->jenisSuratModel->insert($data);
            return redirect()->to('/jenis-surat/kelola')->with('success', 'Jenis Surat berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function update($id)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $rules = [
            'nama_surat' => 'required|min_length[3]|max_length[100]',
            'template' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_surat' => $this->request->getPost('nama_surat'),
            'template' => $this->request->getPost('template')
        ];

        try {
            $this->jenisSuratModel->update($id, $data);
            return redirect()->to('/jenis-surat/kelola')->with('success', 'Jenis Surat berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function hapus($id)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        try {
            $this->jenisSuratModel->delete($id);
            return redirect()->to('/jenis-surat/kelola')->with('success', 'Jenis Surat berhasil dihapus');
        } catch (\Exception $e) {
            // Might fail due to foreign key constraints if letters are associated
            return redirect()->to('/jenis-surat/kelola')->with('error', 'Gagal menghapus jenis surat. Pastikan tidak ada surat yang sedang menggunakan jenis surat ini.');
        }
    }
}
