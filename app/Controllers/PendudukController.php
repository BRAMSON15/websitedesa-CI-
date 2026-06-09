<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class PendudukController extends BaseController
{
    protected $pendudukModel;

    public function __construct()
    {
        $this->pendudukModel = new PendudukModel();
    }

    private function checkAuth()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        // Hanya admin yang bisa akses
        if($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak. Hanya admin yang dapat mengelola data penduduk.');
        }
        
        return null;
    }

    // Halaman utama data penduduk
    public function index() 
    { 
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        // Ambil data penduduk dengan pagination
        $currentPage = $this->request->getVar('page') ?? 1;
        $perPage = 10;
        
        $pendudukList = $this->pendudukModel->paginate($perPage);
        $pager = $this->pendudukModel->pager;
        
        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'penduduk_list' => $pendudukList,
            'pager' => $pager,
            'total_penduduk' => $this->pendudukModel->countAll()
        ];

        return view('admin/penduduk/index', $data);
    }

    // Halaman tambah penduduk
    public function tambah()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        
        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role')
        ];

        return view('admin/penduduk/tambah', $data);
    }

    // Proses simpan penduduk baru
    public function simpan()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        // Validasi input
        $rules = [
            'nik' => 'required|exact_length[16]|numeric|is_unique[penduduk.nik]',
            'nama' => 'required|min_length[3]|max_length[100]',
            'tempat_lahir' => 'required|max_length[50]',
            'tanggal_lahir' => 'required|valid_date',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'alamat' => 'required|min_length[10]',
            'agama' => 'required|max_length[50]',
            'pekerjaan' => 'required|max_length[100]',
            'status' => 'required|max_length[50]',
            'nomor_kk' => 'permit_empty|exact_length[16]|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Gabungkan tempat dan tanggal lahir
        $ttl = $this->request->getPost('tempat_lahir') . ', ' . date('d-m-Y', strtotime($this->request->getPost('tanggal_lahir')));

        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'ttl' => $ttl,
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'agama' => $this->request->getPost('agama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'status' => $this->request->getPost('status'),
            'nomor_kk' => $this->request->getPost('nomor_kk') ?: null
        ];

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $this->pendudukModel->insert($data);

            // Create user account automatically
            $userModel = new \App\Models\UserModel();
            $nama = $this->request->getPost('nama');
            $nik = $this->request->getPost('nik');
            
            // Check if user already exists
            $existingUser = $userModel->where('nik', $nik)->first();
            if (!$existingUser) {
                // Generate a valid username from name
                $baseUsername = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $nama));
                if (empty($baseUsername)) $baseUsername = 'user';
                $username = $baseUsername;
                $counter = 1;
                while ($userModel->where('username', $username)->first()) {
                    $username = $baseUsername . $counter;
                    $counter++;
                }

                $userData = [
                    'nama' => $nama,
                    'nik' => $nik,
                    'username' => $username,
                    'password' => password_hash($nik, PASSWORD_DEFAULT),
                    'role' => 'masyarakat',
                    'alamat' => $this->request->getPost('alamat')
                ];
                $userModel->insert($userData);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Database transaction failed');
            }

            return redirect()->to('/penduduk')->with('success', 'Data penduduk dan akun berhasil ditambahkan');
        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    // Halaman edit penduduk
    public function edit($nik)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $penduduk = $this->pendudukModel->find($nik);

        if(!$penduduk) {
            return redirect()->to('/penduduk')->with('error', 'Data penduduk tidak ditemukan');
        }

        // Parse TTL untuk form
        $ttlParts = explode(', ', $penduduk['ttl']);
        $penduduk['tempat_lahir'] = $ttlParts[0] ?? '';
        $penduduk['tanggal_lahir'] = isset($ttlParts[1]) ? date('Y-m-d', strtotime($ttlParts[1])) : '';

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'penduduk' => $penduduk
        ];

        return view('admin/penduduk/edit', $data);
    }

    // Proses update penduduk
    public function update($nik)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $penduduk = $this->pendudukModel->find($nik);
        if(!$penduduk) {
            return redirect()->to('/penduduk')->with('error', 'Data penduduk tidak ditemukan');
        }

        // Validasi input
        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'tempat_lahir' => 'required|max_length[50]',
            'tanggal_lahir' => 'required|valid_date',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'alamat' => 'required|min_length[10]',
            'agama' => 'required|max_length[50]',
            'pekerjaan' => 'required|max_length[100]',
            'status' => 'required|max_length[50]',
            'nomor_kk' => 'permit_empty|exact_length[16]|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Gabungkan tempat dan tanggal lahir
        $ttl = $this->request->getPost('tempat_lahir') . ', ' . date('d-m-Y', strtotime($this->request->getPost('tanggal_lahir')));

        $data = [
            'nama' => $this->request->getPost('nama'),
            'ttl' => $ttl,
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'agama' => $this->request->getPost('agama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'status' => $this->request->getPost('status'),
            'nomor_kk' => $this->request->getPost('nomor_kk') ?: null
        ];

        try {
            $this->pendudukModel->update($nik, $data);
            return redirect()->to('/penduduk')->with('success', 'Data penduduk berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    // Hapus penduduk
    public function hapus($nik)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $penduduk = $this->pendudukModel->find($nik);
        if(!$penduduk) {
            return redirect()->to('/penduduk')->with('error', 'Data penduduk tidak ditemukan');
        }

        try {
            $this->pendudukModel->delete($nik);
            return redirect()->to('/penduduk')->with('success', 'Data penduduk berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->to('/penduduk')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    // Detail penduduk
    public function detail($nik)
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $penduduk = $this->pendudukModel->find($nik);

        if(!$penduduk) {
            return redirect()->to('/penduduk')->with('error', 'Data penduduk tidak ditemukan');
        }

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'penduduk' => $penduduk
        ];

        return view('admin/penduduk/detail', $data);
    }

    // Pencarian penduduk
    public function cari()
    {
        $auth = $this->checkAuth();
        if($auth) return $auth;

        $session = session();
        $keyword = $this->request->getGet('keyword');
        
        if(empty($keyword)) {
            return redirect()->to('/penduduk');
        }

        $pendudukList = $this->pendudukModel
            ->like('nama', $keyword)
            ->orLike('nik', $keyword)
            ->orLike('alamat', $keyword)
            ->paginate(10);
        
        $pager = $this->pendudukModel->pager;

        $data = [
            'nama' => $session->get('nama'),
            'role' => $session->get('role'),
            'penduduk_list' => $pendudukList,
            'pager' => $pager,
            'keyword' => $keyword,
            'total_penduduk' => count($pendudukList)
        ];

        return view('admin/penduduk/index', $data);
    }
}
