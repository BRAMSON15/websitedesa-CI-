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
            <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem; margin-top: 1rem;">Menu Navigasi</p>
        </div>
        
        <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; padding-right: 0.5rem;">
            <li><a href="<?= base_url('/dashboard') ?>"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
            <li><a href="<?= base_url('/profil/lihat_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Visi & Misi</a></li>
            <li><a href="<?= base_url('/profil/lihat_sejarah') ?>" class="active"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Sejarah Desa</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/surat/ajukan') ?>"><i class="ri-send-plane-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Ajukan Surat</a></li>
            <li><a href="<?= base_url('/surat/status') ?>"><i class="ri-file-search-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Status Pengajuan</a></li>
            <li><a href="<?= base_url('/peta') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Peta Administrasi</a></li>
            <li><a href="<?= base_url('/user/profil') ?>"><i class="ri-user-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil User</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Sejarah Desa Tifu</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Latar belakang dan perkembangan Desa Tifu</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/dashboard') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-arrow-left-line"></i> Kembali</a>
            </div>
        </div>

        <div class="card">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="ri-history-line" style="font-size: 2rem;"></i>
                </div>
                <div>
                    <h4 style="color: var(--dark); margin: 0; font-size: 1.2rem;">Sejarah Desa Tifu</h4>
                    <p style="color: #64748b; font-size: 0.9rem; margin: 0.3rem 0 0 0;">Kisah perjalanan dan perkembangan desa kami</p>
                </div>
            </div>

            <?php if(!empty($profil['gambar_sejarah'])): ?>
            <div style="margin-bottom: 2rem;">
                <img src="<?= base_url('uploads/sejarah/' . $profil['gambar_sejarah']) ?>" alt="Gambar Sejarah Desa" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);" onerror="this.style.display='none'">
            </div>
            <?php endif; ?>

            <div style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.05), rgba(245, 158, 11, 0.1)); padding: 2rem; border-radius: 8px; border-left: 4px solid #f59e0b;">
                <p style="color: var(--dark); font-size: 1rem; line-height: 1.8; margin: 0; white-space: pre-wrap;">
                    <?= $profil['sejarah'] ?? '<span style="color: #cbd5e1; font-style: italic;">Belum ada sejarah yang ditetapkan</span>' ?>
                </p>
            </div>
        </div>

        <div class="card" style="margin-top: 2rem;">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ri-links-line" style="color: var(--primary);"></i> Navigasi Cepat
            </h4>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <a href="<?= base_url('/profil/lihat') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05)); border-radius: 8px; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(16, 185, 129, 0.2);" onmouseover="this.style.background='linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(16, 185, 129, 0.1))'" onmouseout="this.style.background='linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05))'">
                    <div style="width: 40px; height: 40px; background: var(--primary); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="ri-home-smile-line"></i>
                    </div>
                    <div>
                        <p style="color: var(--dark); font-weight: 600; margin: 0; font-size: 0.95rem;">Profil Desa</p>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Informasi umum</p>
                    </div>
                </a>

                <a href="<?= base_url('/profil/lihat_visimisi') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05)); border-radius: 8px; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(16, 185, 129, 0.2);" onmouseover="this.style.background='linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(16, 185, 129, 0.1))'" onmouseout="this.style.background='linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05))'">
                    <div style="width: 40px; height: 40px; background: var(--primary); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="ri-focus-2-line"></i>
                    </div>
                    <div>
                        <p style="color: var(--dark); font-weight: 600; margin: 0; font-size: 0.95rem;">Visi & Misi</p>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Panduan desa</p>
                    </div>
                </a>

                <a href="<?= base_url('/struktur/lihat') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(139, 92, 246, 0.05)); border-radius: 8px; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(139, 92, 246, 0.2);" onmouseover="this.style.background='linear-gradient(135deg, rgba(139, 92, 246, 0.2), rgba(139, 92, 246, 0.1))'" onmouseout="this.style.background='linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(139, 92, 246, 0.05))'">
                    <div style="width: 40px; height: 40px; background: #8b5cf6; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="ri-organization-chart"></i>
                    </div>
                    <div>
                        <p style="color: var(--dark); font-weight: 600; margin: 0; font-size: 0.95rem;">Struktur Desa</p>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Organisasi</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-outline {
        background: transparent;
        color: var(--primary);
        border: 1px solid var(--primary);
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s;
    }

    .btn-outline:hover {
        background: var(--primary);
        color: white;
    }
</style>

<?= $this->endSection() ?>
