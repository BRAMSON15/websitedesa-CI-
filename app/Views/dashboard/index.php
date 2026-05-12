<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="dashboard-wrapper">
    <div class="sidebar">
        <a href="<?= base_url('/dashboard') ?>" class="sidebar-logo" style="display: flex; align-items: center; gap: 0.8rem;">
            <div style="width: 35px; height: 35px; background: linear-gradient(135deg, var(--primary), #818cf8); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                <i class="ri-home-smile-fill"></i>
            </div>
            SIDESA
        </a>
        <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem;">Menu Navigasi</p>
        <ul class="sidebar-nav">
            <li><a href="<?= base_url('/dashboard') ?>" class="active"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            
            <?php if($role == 'admin'): ?>
                <li><a href="<?= base_url('/penduduk') ?>"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
                <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
                <li><a href="<?= base_url('/peta/kelola') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Peta Administrasi</a></li>
                <!-- NEW CONTENT MANAGEMENT FOR ADMIN -->
                <li><a href="<?= base_url('/profil/kelola_umum') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil Desa</a></li>
                <li><a href="<?= base_url('/struktur/kelola') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Struktur Desa</a></li>
                <li><a href="<?= base_url('/profil/kelola_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Visi & Misi</a></li>
                <li><a href="<?= base_url('/profil/kelola_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Sejarah</a></li>
            <?php elseif($role == 'kepala_desa'): ?>
                <li><a href="<?= base_url('/surat/persetujuan') ?>"><i class="ri-task-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Persetujuan Surat</a></li>
                <li><a href="<?= base_url('/peta') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Rekap Peta</a></li>
            <?php else: // masyarakat ?>
                <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
                <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
                <li><a href="<?= base_url('/profil/lihat_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Visi & Misi</a></li>
                <li><a href="<?= base_url('/profil/lihat_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Sejarah Desa</a></li>
                <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
                <li><a href="<?= base_url('/surat/ajukan') ?>"><i class="ri-send-plane-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Ajukan Surat</a></li>
                <li><a href="<?= base_url('/surat/status') ?>"><i class="ri-file-search-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Status Pengajuan</a></li>
                <li><a href="<?= base_url('/peta') ?>"><i class="ri-road-map-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Peta Administrasi</a></li>
                <li><a href="<?= base_url('/user/profil') ?>"><i class="ri-user-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil User</a></li>
            <?php endif; ?>
        </ul>
        
        <div style="position: absolute; bottom: 2rem; width: calc(100% - 3rem);">
            <a href="<?= base_url('/logout') ?>" style="display: flex; align-items: center; padding: 0.8rem 1rem; color: #ef4444; border-radius: 8px; font-weight: 500; text-decoration: none; transition: background 0.3s; background: #fee2e2;">
                <i class="ri-logout-box-r-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Keluar Sistem
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div>
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Ringkasan Panel</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Selamat bertugas, <?= esc($nama) ?> (Role: <?= esc(str_replace('_', ' ', $role)) ?>)</p>
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

        <!-- Dashboard Cards Example -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
            <?php if($role == 'masyarakat'): ?>
                <div class="card stat-card" style="border-left: 4px solid var(--primary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="stat-icon primary" style="background: rgba(79, 70, 229, 0.1);"><i class="ri-mail-send-line"></i></div>
                    <div>
                        <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Surat Diajukan</p>
                        <h4 style="font-size: 1.8rem; color: var(--dark);">0</h4>
                    </div>
                </div>
                <div class="card stat-card" style="border-left: 4px solid var(--secondary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="stat-icon success" style="background: rgba(16, 185, 129, 0.1);"><i class="ri-checkbox-circle-line"></i></div>
                    <div>
                        <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Surat Disetujui</p>
                        <h4 style="font-size: 1.8rem; color: var(--dark);">0</h4>
                    </div>
                </div>
                <div class="card stat-card" style="border-left: 4px solid #f59e0b; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="stat-icon warning" style="background: rgba(245, 158, 11, 0.1);"><i class="ri-time-line"></i></div>
                    <div>
                        <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Dalam Proses</p>
                        <h4 style="font-size: 1.8rem; color: var(--dark);">0</h4>
                    </div>
                </div>
            <?php else: ?>
                <div class="card stat-card" style="border-left: 4px solid #f59e0b; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="stat-icon warning" style="background: rgba(245, 158, 11, 0.1);"><i class="ri-mail-download-line"></i></div>
                    <div>
                        <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Menunggu Review</p>
                        <h4 style="font-size: 1.8rem; color: var(--dark);">0</h4>
                    </div>
                </div>
                <div class="card stat-card" style="border-left: 4px solid var(--primary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="stat-icon primary" style="background: rgba(79, 70, 229, 0.1);"><i class="ri-team-line"></i></div>
                    <div>
                        <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Total Penduduk</p>
                        <h4 style="font-size: 1.8rem; color: var(--dark);">0</h4>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="padding: 1.5rem 1.5rem 1rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--dark);">Aktivitas Terbaru</h4>
                <button class="btn-outline" style="padding: 0.4rem 1rem; font-size: 0.9rem;">Lihat Semua</button>
            </div>
            <div style="padding: 3rem 0; text-align: center; color: #94a3b8; background: #fafafa;">
                <div style="width: 80px; height: 80px; background: white; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-inbox-archive-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem; font-size: 1.1rem;">Belum Ada Data</h5>
                <p style="font-size: 0.95rem;">Aktivitas sistem akan muncul di sini secara otomatis.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
