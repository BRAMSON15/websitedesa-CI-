<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="dashboard-wrapper">
    <div class="sidebar" style="display: flex; flex-direction: column; height: 100vh; overflow: hidden;">
        <div style="flex-shrink: 0; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">
            <a href="<?= base_url('/dashboard') ?>" class="sidebar-logo" style="display: flex; align-items: center; gap: 0.8rem;">
                <div style="width: 35px; height: 35px; background: linear-gradient(135deg, var(--primary), #818cf8); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="ri-home-smile-fill"></i>
                </div>
                SIDESA
            </a>
            <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem; margin-top: 1rem;">Menu Kepala Desa</p>
        </div>
        
        <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; padding-right: 0.5rem;">
            <li><a href="<?= base_url('/dashboard') ?>" class="active"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li><a href="<?= base_url('/surat/persetujuan') ?>"><i class="ri-task-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Persetujuan Surat</a></li>
            <li><a href="<?= base_url('/peta') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Rekap Peta</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
        </ul>
        
        <div style="flex-shrink: 0; padding-top: 1rem; border-top: 1px solid #f1f5f9;">
            <a href="<?= base_url('/logout') ?>" style="display: flex; align-items: center; padding: 0.8rem 1rem; color: #ef4444; border-radius: 8px; font-weight: 500; text-decoration: none; transition: background 0.3s; background: #fee2e2;">
                <i class="ri-logout-box-r-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Keluar Sistem
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div>
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Dashboard Kepala Desa</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Selamat datang, <?= esc($nama) ?> - Monitor dan setujui pengajuan surat</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <div style="width: 45px; height: 45px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05); color: #64748b; cursor: pointer; transition: transform 0.2s;">
                    <i class="ri-notification-3-line" style="font-size: 1.2rem;"></i>
                    <span style="position: absolute; top: 0px; right: 0px; width: 10px; height: 10px; background: #ef4444; border-radius: 50%; border: 2px solid white;"></span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); cursor: pointer;">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <!-- Kepala Desa Statistics Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
            <div class="card stat-card" style="border-left: 4px solid #f59e0b; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon warning" style="background: rgba(245, 158, 11, 0.1);"><i class="ri-mail-download-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Menunggu Persetujuan</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($surat_menunggu) ? number_format($surat_menunggu) : '0' ?></h4>
                    <p style="color: #f59e0b; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-time-line"></i> Perlu ditinjau</p>
                </div>
            </div>
            
            <div class="card stat-card" style="border-left: 4px solid var(--secondary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon success" style="background: rgba(16, 185, 129, 0.1);"><i class="ri-checkbox-circle-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Surat Disetujui</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($surat_disetujui) ? number_format($surat_disetujui) : '0' ?></h4>
                    <p style="color: #10b981; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-check-line"></i> Bulan ini</p>
                </div>
            </div>
            
            <div class="card stat-card" style="border-left: 4px solid #ef4444; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;"><i class="ri-close-circle-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Surat Ditolak</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($surat_ditolak) ? number_format($surat_ditolak) : '0' ?></h4>
                    <p style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-information-line"></i> Bulan ini</p>
                </div>
            </div>
            
            <div class="card stat-card" style="border-left: 4px solid var(--primary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon primary" style="background: rgba(79, 70, 229, 0.1);"><i class="ri-team-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Total Penduduk</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($total_penduduk) ? number_format($total_penduduk) : '0' ?></h4>
                    <p style="color: var(--primary); font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-group-line"></i> Warga terdaftar</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions for Kepala Desa -->
        <div class="card" style="margin-bottom: 2rem;">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ri-flashlight-line" style="color: var(--primary);"></i> Aksi Cepat
            </h4>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                <a href="<?= base_url('/surat/persetujuan') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1.2rem; background: linear-gradient(135deg, #f59e0b, #fbbf24); border-radius: 10px; color: white; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-task-line" style="font-size: 1.6rem;"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; margin-bottom: 0.2rem; font-size: 1.05rem;">Tinjau Pengajuan</p>
                        <p style="font-size: 0.85rem; opacity: 0.9;">Setujui atau tolak surat</p>
                    </div>
                </a>
                
                <a href="<?= base_url('/peta') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1.2rem; background: linear-gradient(135deg, #4F46E5, #818cf8); border-radius: 10px; color: white; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-map-pin-line" style="font-size: 1.6rem;"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; margin-bottom: 0.2rem; font-size: 1.05rem;">Lihat Peta Desa</p>
                        <p style="font-size: 0.85rem; opacity: 0.9;">Rekap wilayah administrasi</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Pending Approvals List -->
        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="padding: 1.5rem 1.5rem 1rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--dark); display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-file-list-3-line" style="color: var(--primary);"></i> Surat Menunggu Persetujuan
                </h4>
                <button class="btn-outline" style="padding: 0.4rem 1rem; font-size: 0.9rem;">Lihat Semua</button>
            </div>
            <div style="padding: 3rem 0; text-align: center; color: #94a3b8; background: #fafafa;">
                <div style="width: 80px; height: 80px; background: white; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-inbox-archive-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem; font-size: 1.1rem;">Tidak Ada Pengajuan Baru</h5>
                <p style="font-size: 0.95rem;">Pengajuan surat dari masyarakat akan muncul di sini.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
