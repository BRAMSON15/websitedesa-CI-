<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php 
$dataPengajuan = json_decode($surat['data_pengajuan'], true);
$statusColors = [
    'Menunggu' => ['bg' => '#fef3c7', 'text' => '#92400e', 'icon' => 'ri-time-line', 'border' => '#f59e0b'],
    'Disetujui' => ['bg' => '#d1fae5', 'text' => '#065f46', 'icon' => 'ri-checkbox-circle-line', 'border' => '#10b981'],
    'Ditolak' => ['bg' => '#fee2e2', 'text' => '#991b1b', 'icon' => 'ri-close-circle-line', 'border' => '#ef4444']
];
$color = $statusColors[$surat['status_surat']];
?>
<div class="dashboard-wrapper">
    <div class="sidebar">
        <a href="<?= base_url('/dashboard') ?>" class="sidebar-logo" style="display: flex; align-items: center; gap: 0.8rem;">
            <div style="width: 35px; height: 35px; background: linear-gradient(135deg, var(--primary), #818cf8); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                <i class="ri-home-smile-fill"></i>
            </div>
            SIDESA
        </a>
        <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem;">Menu Masyarakat</p>
        <ul class="sidebar-nav">
            <li><a href="<?= base_url('/dashboard') ?>"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
            <li><a href="<?= base_url('/profil/lihat_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Visi & Misi</a></li>
            <li><a href="<?= base_url('/profil/lihat_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Sejarah Desa</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/surat/ajukan') ?>"><i class="ri-send-plane-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Ajukan Surat</a></li>
            <li><a href="<?= base_url('/surat/status') ?>" class="active"><i class="ri-file-search-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Status Pengajuan</a></li>
            <li><a href="<?= base_url('/peta') ?>"><i class="ri-road-map-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Peta Administrasi</a></li>
            <li><a href="<?= base_url('/user/profil') ?>"><i class="ri-user-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil User</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Detail Pengajuan Surat</h3>
                <p style="color: #64748b; font-size: 0.95rem;">ID Pengajuan: #<?= str_pad($surat['id_surat'], 4, '0', STR_PAD_LEFT) ?></p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/surat/status') ?>" class="btn-outline" style="padding: 0.6rem 1.2rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-arrow-left-line"></i> Kembali
                </a>
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); cursor: pointer;">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <!-- Status Card -->
        <div class="card" style="background: <?= $color['bg'] ?>; border-left: 4px solid <?= $color['border'] ?>; margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 60px; height: 60px; background: <?= $color['border'] ?>; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="<?= $color['icon'] ?>" style="font-size: 2rem;"></i>
                    </div>
                    <div>
                        <p style="color: <?= $color['text'] ?>; font-size: 0.9rem; margin-bottom: 0.3rem; opacity: 0.8;">Status Pengajuan</p>
                        <h3 style="color: <?= $color['text'] ?>; margin: 0; font-size: 1.8rem;"><?= esc($surat['status_surat']) ?></h3>
                    </div>
                </div>
                <div style="text-align: right;">
                    <p style="color: <?= $color['text'] ?>; font-size: 0.85rem; margin-bottom: 0.3rem; opacity: 0.8;">Tanggal Pengajuan</p>
                    <p style="color: <?= $color['text'] ?>; font-weight: 600; margin: 0;"><?= date('d F Y', strtotime($surat['tanggal_pengajuan'])) ?></p>
                </div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem;">
            <!-- Informasi Surat -->
            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-file-text-line" style="color: var(--primary);"></i> Informasi Surat
                </h4>
                <div style="display: grid; gap: 1rem;">
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-weight: 500;">Jenis Surat</span>
                        <span style="color: var(--dark); font-weight: 600;"><?= esc($surat['nama_surat']) ?></span>
                    </div>
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-weight: 500;">Nomor Pengajuan</span>
                        <span style="color: var(--dark);">#<?= str_pad($surat['id_surat'], 4, '0', STR_PAD_LEFT) ?></span>
                    </div>
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-weight: 500;">Tanggal Pengajuan</span>
                        <span style="color: var(--dark);"><?= date('d F Y, H:i', strtotime($surat['created_at'])) ?> WIB</span>
                    </div>
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-weight: 500;">Terakhir Diupdate</span>
                        <span style="color: var(--dark);"><?= date('d F Y, H:i', strtotime($surat['updated_at'])) ?> WIB</span>
                    </div>
                </div>
            </div>

            <!-- Data Pemohon -->
            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-user-line" style="color: var(--primary);"></i> Data Pemohon
                </h4>
                <div style="display: grid; gap: 1rem;">
                    <?php if(isset($dataPengajuan['nik'])): ?>
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-weight: 500;">NIK</span>
                        <span style="color: var(--dark); font-family: monospace;"><?= esc($dataPengajuan['nik']) ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($dataPengajuan['alamat'])): ?>
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-weight: 500;">Alamat</span>
                        <span style="color: var(--dark);"><?= esc($dataPengajuan['alamat']) ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($dataPengajuan['tempat_lahir']) || isset($dataPengajuan['tanggal_lahir'])): ?>
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-weight: 500;">Tempat, Tanggal Lahir</span>
                        <span style="color: var(--dark);">
                            <?= isset($dataPengajuan['tempat_lahir']) ? esc($dataPengajuan['tempat_lahir']) : '-' ?>, 
                            <?= isset($dataPengajuan['tanggal_lahir']) ? date('d F Y', strtotime($dataPengajuan['tanggal_lahir'])) : '-' ?>
                        </span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($dataPengajuan['jenis_kelamin'])): ?>
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-weight: 500;">Jenis Kelamin</span>
                        <span style="color: var(--dark);"><?= esc($dataPengajuan['jenis_kelamin']) ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($dataPengajuan['pekerjaan'])): ?>
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-weight: 500;">Pekerjaan</span>
                        <span style="color: var(--dark);"><?= esc($dataPengajuan['pekerjaan']) ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Keperluan -->
            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-file-list-line" style="color: var(--primary);"></i> Keperluan & Keterangan
                </h4>
                <div style="background: #f8fafc; padding: 1.2rem; border-radius: 8px; border-left: 4px solid var(--primary);">
                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.5rem; font-weight: 600;">Keperluan:</p>
                    <p style="color: var(--dark); line-height: 1.8; margin: 0;"><?= esc($dataPengajuan['keperluan']) ?></p>
                </div>
                
                <?php if(isset($dataPengajuan['keterangan_tambahan']) && !empty($dataPengajuan['keterangan_tambahan'])): ?>
                <div style="background: #f8fafc; padding: 1.2rem; border-radius: 8px; border-left: 4px solid #64748b; margin-top: 1rem;">
                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.5rem; font-weight: 600;">Keterangan Tambahan:</p>
                    <p style="color: var(--dark); line-height: 1.8; margin: 0;"><?= esc($dataPengajuan['keterangan_tambahan']) ?></p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Keterangan dari Admin (jika ada) -->
            <?php if(!empty($surat['keterangan'])): ?>
            <div class="card" style="background: <?= $surat['status_surat'] == 'Ditolak' ? '#fee2e2' : '#d1fae5' ?>; border-left: 4px solid <?= $surat['status_surat'] == 'Ditolak' ? '#ef4444' : '#10b981' ?>;">
                <h4 style="color: <?= $surat['status_surat'] == 'Ditolak' ? '#991b1b' : '#065f46' ?>; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-message-3-line"></i> Keterangan dari Petugas
                </h4>
                <p style="color: <?= $surat['status_surat'] == 'Ditolak' ? '#991b1b' : '#065f46' ?>; line-height: 1.8; margin: 0;">
                    <?= esc($surat['keterangan']) ?>
                </p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
            <a href="<?= base_url('/surat/status') ?>" class="btn-outline" style="padding: 0.8rem 2rem; text-decoration: none;">
                <i class="ri-arrow-left-line"></i> Kembali ke Daftar
            </a>
            <?php if($surat['status_surat'] == 'Disetujui'): ?>
            <button class="btn-primary" style="padding: 0.8rem 2rem;" onclick="alert('Fitur cetak surat akan segera tersedia')">
                <i class="ri-printer-line"></i> Cetak Surat
            </button>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
