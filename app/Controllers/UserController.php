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
        $role = $session->get('role');
        $isKepalaDesa = $role === 'kepala_desa';
        
        $nikLabel = $isKepalaDesa ? 'NIP' : 'NIK';
        $nikRules = $isKepalaDesa ? "required|numeric|min_length[16]|max_length[18]|is_unique[users.nik,user_id,{$userId}]" : "required|exact_length[16]|numeric|is_unique[users.nik,user_id,{$userId}]";

        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama lengkap wajib diisi.',
                    'min_length' => 'Nama minimal 3 karakter.'
                ]
            ],
            'nik' => [
                'rules' => $nikRules,
                'errors' => [
                    'required' => "$nikLabel wajib diisi.",
                    'exact_length' => "$nikLabel harus 16 digit.",
                    'min_length' => "$nikLabel minimal 16 digit.",
                    'max_length' => "$nikLabel maksimal 18 digit.",
                    'numeric' => "$nikLabel hanya boleh berisi angka.",
                    'is_unique' => "$nikLabel ini sudah terdaftar pada akun lain."
                ]
            ],
            'username' => [
                'rules' => "required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z0-9_\.]+$/]|is_unique[users.username,user_id,{$userId}]",
                'errors' => [
                    'required' => 'Username wajib diisi.',
                    'min_length' => 'Username minimal 3 karakter.',
                    'regex_match' => 'Username hanya boleh berisi huruf, angka, garis bawah, dan titik (Tanpa Spasi).',
                    'is_unique' => 'Username ini sudah digunakan.'
                ]
            ],
            'email' => [
                'rules' => "required|valid_email|is_unique[users.email,user_id,{$userId}]",
                'errors' => [
                    'required' => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'is_unique' => 'Email ini sudah terdaftar.'
                ]
            ],
            'no_telepon' => [
                'rules' => 'required|min_length[10]|max_length[20]',
                'errors' => [
                    'required' => 'Nomor telepon wajib diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Alamat lengkap wajib diisi.'
                ]
            ]
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
