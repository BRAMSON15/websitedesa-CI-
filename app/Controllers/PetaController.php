<?php

namespace App\Controllers;

class PetaController extends BaseController
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

    public function index() { 
        return $this->renderView('Peta Administrasi'); 
    }
    
    public function kelola() { 
        return $this->renderView('Kelola Peta Administrasi', 'admin'); 
    }
}
