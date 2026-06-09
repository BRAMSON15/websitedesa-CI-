<?php

namespace App\Controllers;

use App\Models\UserModel;

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

    public function profil()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $userModel = new UserModel();
        
        $userId = $session->get('user_id');
        $user = $userModel->find($userId);

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'page_title' => 'Kelola Profil User',
            'user' => $user
        ];

        return view('user/profil', $data);
    }

    public function updateProfil()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $userModel = new UserModel();
        $userId = $session->get('user_id');
        $oldUser = $userModel->find($userId);
        $oldNik = $oldUser['nik'];

        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'nik' => "required|exact_length[16]|numeric|is_unique[users.nik,user_id,{$userId}]",
            'username' => "required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z0-9_]+$/]|is_unique[users.username,user_id,{$userId}]",
            'email' => "required|valid_email|is_unique[users.email,user_id,{$userId}]",
            'no_telepon' => 'required|min_length[10]|max_length[20]',
            'alamat' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode(', ', $this->validator->getErrors()));
        }

        $newNik = $this->request->getPost('nik');

        $updateData = [
            'nama' => $this->request->getPost('nama'),
            'nik' => $newNik,
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        // Check if password is being updated
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            if (strlen($password) < 6) {
                return redirect()->back()->withInput()->with('error', 'Password minimal 6 karakter');
            }
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $userModel->update($userId, $updateData);

            if ($oldNik != $newNik) {
                // Ignore errors if foreign key prevents it, but try raw update
                $db->query("UPDATE penduduk SET nik = ?, nama = ?, alamat = ? WHERE nik = ?", [
                    $newNik, $updateData['nama'], $updateData['alamat'], $oldNik
                ]);
            } else {
                $db->query("UPDATE penduduk SET nama = ?, alamat = ? WHERE nik = ?", [
                    $updateData['nama'], $updateData['alamat'], $oldNik
                ]);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Database error: Transaksi gagal');
            }
            
            // Update session data
            $session->set([
                'nama' => $updateData['nama'],
                'username' => $updateData['username']
            ]);

            return redirect()->to('/user/profil')->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }
}
