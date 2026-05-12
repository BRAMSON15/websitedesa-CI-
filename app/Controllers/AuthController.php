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
}
