<?php

namespace App\Controllers;

use App\Models\PesanModel;
use App\Models\UserModel;

class PesanController extends BaseController
{
    protected $pesanModel;
    protected $userModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
        $this->userModel = new UserModel();
    }

    private function checkAuth()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        return null;
    }

    // Admin: Send message to specific user
    public function kirimPesan()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Hanya admin yang bisa mengirim pesan
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $user_id_penerima = $this->request->getPost('user_id_penerima');
        $judul = $this->request->getPost('judul');
        $isi_pesan = $this->request->getPost('isi_pesan');
        $tipe_pesan = $this->request->getPost('tipe_pesan') ?? 'info';

        // Validasi input
        if(empty($user_id_penerima) || empty($judul) || empty($isi_pesan)) {
            return redirect()->back()->with('error', 'Semua field harus diisi');
        }

        try {
            $this->pesanModel->kirimPesan(
                $session->get('user_id'),
                $user_id_penerima,
                $judul,
                $isi_pesan,
                $tipe_pesan
            );
            return redirect()->back()->with('success', 'Pesan berhasil dikirim');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengirim pesan: ' . $e->getMessage());
        }
    }

    // Admin: Send broadcast message to all users
    public function kirimPesanBroadcast()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Hanya admin yang bisa mengirim broadcast
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $judul = $this->request->getPost('judul');
        $isi_pesan = $this->request->getPost('isi_pesan');
        $tipe_pesan = $this->request->getPost('tipe_pesan') ?? 'info';

        // Validasi input
        if(empty($judul) || empty($isi_pesan)) {
            return redirect()->back()->with('error', 'Judul dan isi pesan harus diisi');
        }

        try {
            $this->pesanModel->kirimPesanBroadcast(
                $session->get('user_id'),
                $judul,
                $isi_pesan,
                $tipe_pesan
            );
            return redirect()->back()->with('success', 'Pesan broadcast berhasil dikirim ke semua pengguna');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengirim pesan: ' . $e->getMessage());
        }
    }

    // Get messages for current user
    public function getPesan()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $user_id = $session->get('user_id');

        $pesan = $this->pesanModel->getPesanUser($user_id);

        return $this->response->setJSON([
            'success' => true,
            'data' => $pesan
        ]);
    }

    // Get unread message count
    public function getCountPesanBelumDibaca()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $user_id = $session->get('user_id');

        $count = $this->pesanModel->countPesanBelumDibaca($user_id);

        return $this->response->setJSON([
            'success' => true,
            'count' => $count
        ]);
    }

    // Mark message as read
    public function tandaiSudahDibaca($id_pesan)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        try {
            $this->pesanModel->tandaiSudahDibaca($id_pesan);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Pesan ditandai sudah dibaca'
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menandai pesan: ' . $e->getMessage()
            ]);
        }
    }

    // Get list of users for sending message (admin only)
    public function getDaftarUser()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Hanya admin yang bisa akses
        if($session->get('role') !== 'admin') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Akses ditolak'
            ]);
        }

        // Get all users except admin
        $users = $this->userModel->where('role !=', 'admin')->findAll();

        return $this->response->setJSON([
            'success' => true,
            'data' => $users
        ]);
    }
}
