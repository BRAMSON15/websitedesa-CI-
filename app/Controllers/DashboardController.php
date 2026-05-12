<?php

namespace App\Controllers;

use App\Models\PendudukModel;
use App\Models\SuratModel;
use App\Models\PetaAdministrasiModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $role = $session->get('role');
        $userId = $session->get('user_id');
        
        $data = [
            'nama' => $session->get('nama'),
            'role' => $role
        ];

        // Load models
        $pendudukModel = new PendudukModel();
        $suratModel = new SuratModel();
        $petaModel = new PetaAdministrasiModel();

        // Get statistics based on role
        if($role == 'admin') {
            $data['total_penduduk'] = $pendudukModel->countAll();
            $data['surat_menunggu'] = $suratModel->where('status_surat', 'Menunggu')->countAllResults();
            $data['surat_selesai'] = $suratModel->where('status_surat', 'Disetujui')->countAllResults();
            $data['total_wilayah'] = $petaModel->countAll();
            
            return view('dashboard/admin', $data);
            
        } elseif($role == 'kepala_desa') {
            $data['total_penduduk'] = $pendudukModel->countAll();
            $data['surat_menunggu'] = $suratModel->where('status_surat', 'Menunggu')->countAllResults();
            $data['surat_disetujui'] = $suratModel->where('status_surat', 'Disetujui')
                ->where('MONTH(updated_at)', date('m'))
                ->where('YEAR(updated_at)', date('Y'))
                ->countAllResults();
            $data['surat_ditolak'] = $suratModel->where('status_surat', 'Ditolak')
                ->where('MONTH(updated_at)', date('m'))
                ->where('YEAR(updated_at)', date('Y'))
                ->countAllResults();
            
            return view('dashboard/kepala_desa', $data);
            
        } else { // masyarakat
            $data['surat_diajukan'] = $suratModel->where('user_id', $userId)->countAllResults();
            $data['surat_disetujui'] = $suratModel->where('user_id', $userId)
                ->where('status_surat', 'Disetujui')
                ->countAllResults();
            $data['surat_proses'] = $suratModel->where('user_id', $userId)
                ->where('status_surat', 'Menunggu')
                ->countAllResults();
            $data['surat_ditolak'] = $suratModel->where('user_id', $userId)
                ->where('status_surat', 'Ditolak')
                ->countAllResults();
            
            return view('dashboard/masyarakat', $data);
        }
    }
}
