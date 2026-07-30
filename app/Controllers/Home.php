<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $profilModel = new \App\Models\ProfilDesaModel();
        $profil = $profilModel->first();
        return view('landing_page', ['profil' => $profil]);
    }
}
