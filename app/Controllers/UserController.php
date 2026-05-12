<?php

namespace App\Controllers;

class UserController extends BaseController
{
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
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();

        return view('dashboard/placeholder', [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'page_title' => $title
        ]);
    }

    public function profil() { 
        return $this->renderView('Kelola Profil User'); 
    }
}
