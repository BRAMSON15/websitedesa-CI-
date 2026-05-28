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
            <li><a href="<?= base_url('/peta') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Peta Administrasi</a></li>
            <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
            <li><a href="<?= base_url('/surat/ajukan') ?>"><i class="ri-send-plane-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Ajukan Surat</a></li>
            <li><a href="<?= base_url('/surat/status') ?>"><i class="ri-file-search-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Status Pengajuan</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Statistik Wilayah</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Data statistik Desa Tifu, Pulau Buru</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/peta') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-arrow-left-line"></i> Kembali</a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            <div class="card" style="border-left: 4px solid var(--primary);">
                <div style="display: flex; justify-content: space-between; align-items: start;">
                    <div>
                        <p style="color: #64748b; font-size: 0.9rem; margin: 0 0 0.5rem 0;">Total Penduduk</p>
                        <p style="color: var(--dark); font-size: 2rem; font-weight: 700; margin: 0;">
                            <?= number_format($stats['total_penduduk'] ?? 0) ?>
                        </p>
                    </div>
                    <div style="width: 50px; height: 50px; background: rgba(16, 185, 129, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-team-line" style="font-size: 1.5rem; color: var(--primary);"></i>
                    </div>
                </div>
            </div>

            <div class="card" style="border-left: 4px solid #f59e0b;">
                <div style="display: flex; justify-content: space-between; align-items: start;">
                    <div>
                        <p style="color: #64748b; font-size: 0.9rem; margin: 0 0 0.5rem 0;">Laki-laki</p>
                        <p style="color: var(--dark); font-size: 2rem; font-weight: 700; margin: 0;">
                            <?= number_format($stats['laki_laki'] ?? 0) ?>
                        </p>
                    </div>
                    <div style="width: 50px; height: 50px; background: rgba(245, 158, 11, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-men-line" style="font-size: 1.5rem; color: #f59e0b;"></i>
                    </div>
                </div>
            </div>

            <div class="card" style="border-left: 4px solid #ec4899;">
                <div style="display: flex; justify-content: space-between; align-items: start;">
                    <div>
                        <p style="color: #64748b; font-size: 0.9rem; margin: 0 0 0.5rem 0;">Perempuan</p>
                        <p style="color: var(--dark); font-size: 2rem; font-weight: 700; margin: 0;">
                            <?= number_format($stats['perempuan'] ?? 0) ?>
                        </p>
                    </div>
                    <div style="width: 50px; height: 50px; background: rgba(236, 72, 153, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-women-line" style="font-size: 1.5rem; color: #ec4899;"></i>
                    </div>
                </div>
            </div>

            <div class="card" style="border-left: 4px solid #8b5cf6;">
                <div style="display: flex; justify-content: space-between; align-items: start;">
                    <div>
                        <p style="color: #64748b; font-size: 0.9rem; margin: 0 0 0.5rem 0;">Luas Wilayah</p>
                        <p style="color: var(--dark); font-size: 2rem; font-weight: 700; margin: 0;">
                            <?= $peta['luas_wilayah'] ?? 'N/A' ?>
                        </p>
                    </div>
                    <div style="width: 50px; height: 50px; background: rgba(139, 92, 246, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-map-pin-line" style="font-size: 1.5rem; color: #8b5cf6;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem;">Informasi Geografis</h4>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Nama Desa</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem; margin-bottom: 1.5rem;">Desa Tifu</p>

                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Pulau</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem; margin-bottom: 1.5rem;">Pulau Buru</p>

                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Provinsi</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">Maluku</p>
                </div>

                <div>
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Latitude</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem; margin-bottom: 1.5rem;"><?= $peta['koordinat_lat'] ?? '-3.4' ?></p>

                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Longitude</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem; margin-bottom: 1.5rem;"><?= $peta['koordinat_lng'] ?? '127.1' ?></p>

                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Luas Wilayah</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;"><?= $peta['luas_wilayah'] ?? 'Belum diisi' ?></p>
                </div>
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
