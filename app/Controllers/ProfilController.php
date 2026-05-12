<?php

namespace App\Controllers;

class ProfilController extends BaseController
{
    private function checkAuth()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        return null;
    }

    private function renderView($title, $role_required = null)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Check role if specified
        if($role_required && $session->get('role') !== $role_required) {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return view('dashboard/placeholder', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'page_title' => $title
        ]);
    }

    // Admin functions
    public function kelola_umum() { 
        return $this->renderView('Kelola Profil Desa', 'admin'); 
    }
    
    public function kelola_visimisi() { 
        return $this->renderView('Kelola Visi & Misi', 'admin'); 
    }
    
    public function kelola_sejarah() { 
        return $this->renderView('Kelola Sejarah Desa', 'admin'); 
    }
    
    // Public functions (for all users)
    public function lihat() { 
        return $this->renderView('Profil Desa'); 
    }
    
    public function lihat_visimisi() { 
        return $this->renderView('Visi & Misi'); 
    }
    
    public function lihat_sejarah() { 
        return $this->renderView('Sejarah Desa'); 
    }
}
