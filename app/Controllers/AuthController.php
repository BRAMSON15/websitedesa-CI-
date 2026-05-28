<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Since it's a test app and password hash might not be set up, let's just do a plain string check or bypass if DB is empty
        $user = $model->where('username', $username)->first();
        
        if($user){
            // Use password_verify if hashed, else direct compare for dev
            if(password_verify($password, $user['password']) || $password == $user['password']) {
                $ses_data = [
                    'user_id'       => $user['user_id'],
                    'username'      => $user['username'],
                    'nama'          => $user['nama'],
                    'role'          => $user['role'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);

                // Redirect based on role
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function processRegister()
    {
        $session = session();
        $model = new UserModel();
        
        // Get form data
        $nama = $this->request->getVar('nama');
        $nik = $this->request->getVar('nik');
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $no_telepon = $this->request->getVar('no_telepon');
        $alamat = $this->request->getVar('alamat');
        
        // Validasi input
        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'nik' => 'required|exact_length[16]|numeric|is_unique[users.nik]',
            'username' => 'required|min_length[3]|max_length[100]|is_unique[users.username]|regex_match[/^[a-zA-Z0-9_]+$/]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'no_telepon' => 'required|min_length[10]|max_length[20]',
            'alamat' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('msg', implode(', ', $this->validator->getErrors()));
        }

        // Prepare data for insertion
        $data = [
            'nama' => $nama,
            'nik' => $nik,
            'username' => $username,
            'email' => $email,
            'no_telepon' => $no_telepon,
            'alamat' => $alamat,
            'password' => password_hash($nik, PASSWORD_DEFAULT), // NIK as password
            'role' => 'masyarakat'
        ];

        try {
            $model->insert($data);
            $session->setFlashdata('success', 'Akun berhasil dibuat! Silakan login dengan username dan NIK Anda sebagai password.');
            return redirect()->to('/login');
        } catch (\Exception $e) {
            $session->setFlashdata('msg', 'Gagal membuat akun: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}