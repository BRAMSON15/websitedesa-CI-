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
        <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem;">Menu Admin</p>
        <ul class="sidebar-nav">
            <li><a href="<?= base_url('/dashboard') ?>"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li><a href="<?= base_url('/penduduk') ?>"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
            <li><a href="<?= base_url('/surat/kelola') ?>" class="active"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
            <li><a href="<?= base_url('/peta/kelola') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Peta Administrasi</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/profil/kelola_umum') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/kelola') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Struktur Desa</a></li>
            <li><a href="<?= base_url('/profil/kelola_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Visi & Misi</a></li>
            <li><a href="<?= base_url('/profil/kelola_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Sejarah</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Verifikasi Pengajuan Surat</h3>
                <p style="color: #64748b; font-size: 0.95rem;">ID Pengajuan: #<?= str_pad($surat['id_surat'], 4, '0', STR_PAD_LEFT) ?></p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/surat/kelola') ?>" class="btn-outline" style="padding: 0.6rem 1.2rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-arrow-left-line"></i> Kembali
                </a>
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); cursor: pointer;">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
        <div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem;">
            <i class="ri-error-warning-line" style="font-size: 1.5rem; color: #ef4444;"></i>
            <p style="color: #991b1b; margin: 0;"><?= session()->getFlashdata('error') ?></p>
        </div>
        <?php endif; ?>

        <!-- Status Card -->
        <div class="card" style="background: <?= $color['bg'] ?>; border-left: 4px solid <?= $color['border'] ?>; margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 60px; height: 60px; background: <?= $color['border'] ?>; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="<?= $color['icon'] ?>" style="font-size: 2rem;"></i>
                    </div>
                    <div>
                        <p style="color: <?= $color['text'] ?>; font-size: 0.9rem; margin-bottom: 0.3rem; opacity: 0.8;">Status Saat Ini</p>
                        <h3 style="color: <?= $color['text'] ?>; margin: 0; font-size: 1.8rem;"><?= esc($surat['status_surat']) ?></h3>
                    </div>
                </div>
                <div style="text-align: right;">
                    <p style="color: <?= $color['text'] ?>; font-size: 0.85rem; margin-bottom: 0.3rem; opacity: 0.8;">Tanggal Pengajuan</p>
                    <p style="color: <?= $color['text'] ?>; font-weight: 600; margin: 0;"><?= date('d F Y', strtotime($surat['tanggal_pengajuan'])) ?></p>
                </div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
            <!-- Detail Pengajuan -->
            <div>
                <!-- Informasi Surat -->
                <div class="card" style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="ri-file-text-line" style="color: var(--primary);"></i> Informasi Surat
                    </h4>
                    <div style="display: grid; gap: 1rem;">
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Jenis Surat</span>
                            <span style="color: var(--dark); font-weight: 600;"><?= esc($surat['nama_surat']) ?></span>
                        </div>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Pemohon</span>
                            <span style="color: var(--dark); font-weight: 600;"><?= esc($surat['nama_pemohon']) ?></span>
                        </div>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Username</span>
                            <span style="color: var(--dark);">@<?= esc($surat['username']) ?></span>
                        </div>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Tanggal Pengajuan</span>
                            <span style="color: var(--dark);"><?= date('d F Y, H:i', strtotime($surat['created_at'])) ?> WIB</span>
                        </div>
                    </div>
                </div>

                <!-- Data Pemohon -->
                <div class="card" style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="ri-user-line" style="color: var(--primary);"></i> Data Pemohon
                    </h4>
                    <div style="display: grid; gap: 1rem;">
                        <?php if(isset($dataPengajuan['nik'])): ?>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">NIK</span>
                            <span style="color: var(--dark); font-family: monospace; font-weight: 600;"><?= esc($dataPengajuan['nik']) ?></span>
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
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0;">
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
            </div>

            <!-- Panel Verifikasi -->
            <div>
                <?php if($surat['status_surat'] == 'Menunggu'): ?>
                <!-- Form Verifikasi -->
                <div class="card">
                    <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="ri-shield-check-line" style="color: var(--primary);"></i> Verifikasi Pengajuan
                    </h4>
                    
                    <form action="<?= base_url('/surat/proses-verifikasi') ?>" method="POST" id="formVerifikasi">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_surat" value="<?= $surat['id_surat'] ?>">
                        
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.8rem;">
                                Keputusan Verifikasi <span style="color: #ef4444;">*</span>
                            </label>
                            <div style="display: grid; gap: 0.8rem;">
                                <label style="display: flex; align-items: center; gap: 0.8rem; padding: 1rem; border: 2px solid #e2e8f0; border-radius: 8px; cursor: pointer; transition: all 0.2s;" onclick="selectStatus(this, 'Disetujui')">
                                    <input type="radio" name="status" value="Disetujui" style="width: 20px; height: 20px;">
                                    <div style="display: flex; align-items: center; gap: 0.8rem;">
                                        <div style="width: 40px; height: 40px; background: #d1fae5; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                            <i class="ri-checkbox-circle-line" style="color: #10b981; font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <p style="color: var(--dark); font-weight: 600; margin: 0;">Setujui Pengajuan</p>
                                            <p style="color: #64748b; font-size: 0.85rem; margin: 0;">Surat akan disetujui dan dapat dicetak</p>
                                        </div>
                                    </div>
                                </label>
                                
                                <label style="display: flex; align-items: center; gap: 0.8rem; padding: 1rem; border: 2px solid #e2e8f0; border-radius: 8px; cursor: pointer; transition: all 0.2s;" onclick="selectStatus(this, 'Ditolak')">
                                    <input type="radio" name="status" value="Ditolak" style="width: 20px; height: 20px;">
                                    <div style="display: flex; align-items: center; gap: 0.8rem;">
                                        <div style="width: 40px; height: 40px; background: #fee2e2; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                            <i class="ri-close-circle-line" style="color: #ef4444; font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <p style="color: var(--dark); font-weight: 600; margin: 0;">Tolak Pengajuan</p>
                                            <p style="color: #64748b; font-size: 0.85rem; margin: 0;">Pengajuan akan ditolak dengan alasan</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div style="margin-bottom: 1.5rem;">
                            <label for="keterangan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Keterangan <span style="color: #ef4444;">*</span>
                            </label>
                            <textarea id="keterangan" name="keterangan" rows="4" required
                                      style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: inherit; resize: vertical;"
                                      placeholder="Berikan keterangan untuk keputusan Anda..."></textarea>
                            <p style="color: #64748b; font-size: 0.85rem; margin-top: 0.3rem;">Keterangan akan dilihat oleh pemohon</p>
                        </div>

                        <button type="submit" class="btn-primary" style="width: 100%; padding: 0.8rem; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                            <i class="ri-send-plane-fill"></i> Proses Verifikasi
                        </button>
                    </form>
                </div>
                <?php elseif($surat['status_surat'] == 'Disetujui'): ?>
                <!-- Surat Disetujui - Aksi PDF -->
                <div class="card" style="background: <?= $color['bg'] ?>; border-left: 4px solid <?= $color['border'] ?>; margin-bottom: 1.5rem;">
                    <h4 style="color: <?= $color['text'] ?>; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="ri-checkbox-circle-line"></i> Surat Disetujui
                    </h4>
                    <p style="color: <?= $color['text'] ?>; margin-bottom: 1.5rem;">
                        Pengajuan telah disetujui pada <?= date('d F Y, H:i', strtotime($surat['updated_at'])) ?> WIB. 
                        Surat dapat dicetak dalam format PDF.
                    </p>
                    
                    <div style="display: grid; gap: 0.8rem;">
                        <a href="<?= base_url('/surat/preview-pdf/' . $surat['id_surat']) ?>" target="_blank" 
                           class="btn-outline" style="padding: 0.8rem 1rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem; background: white; color: <?= $color['border'] ?>; border: 2px solid <?= $color['border'] ?>;">
                            <i class="ri-eye-line"></i> Preview PDF
                        </a>
                        
                        <a href="<?= base_url('/surat/generate-pdf/' . $surat['id_surat']) ?>" 
                           class="btn-primary" style="padding: 0.8rem 1rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem; background: <?= $color['border'] ?>; border: none;">
                            <i class="ri-download-line"></i> Download PDF
                        </a>
                    </div>
                    
                    <?php if(!empty($surat['keterangan'])): ?>
                    <div style="background: rgba(255,255,255,0.7); padding: 1rem; border-radius: 6px; margin-top: 1rem;">
                        <p style="color: <?= $color['text'] ?>; font-size: 0.85rem; margin-bottom: 0.5rem; font-weight: 600;">Keterangan Persetujuan:</p>
                        <p style="color: <?= $color['text'] ?>; line-height: 1.6; margin: 0;"><?= esc($surat['keterangan']) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php else: ?>
                <!-- Status Ditolak -->
                <div class="card" style="background: <?= $color['bg'] ?>; border-left: 4px solid <?= $color['border'] ?>;">
                    <h4 style="color: <?= $color['text'] ?>; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="ri-close-circle-line"></i> Pengajuan Ditolak
                    </h4>
                    <p style="color: <?= $color['text'] ?>; margin-bottom: 1rem;">
                        Pengajuan ini telah ditolak pada <?= date('d F Y, H:i', strtotime($surat['updated_at'])) ?> WIB.
                    </p>
                    
                    <?php if(!empty($surat['keterangan'])): ?>
                    <div style="background: rgba(255,255,255,0.5); padding: 1rem; border-radius: 6px; margin-top: 1rem;">
                        <p style="color: <?= $color['text'] ?>; font-size: 0.85rem; margin-bottom: 0.5rem; font-weight: 600;">Alasan Penolakan:</p>
                        <p style="color: <?= $color['text'] ?>; line-height: 1.6; margin: 0;"><?= esc($surat['keterangan']) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <!-- Info Pemohon -->
                <div class="card" style="margin-top: 1.5rem;">
                    <h4 style="color: var(--dark); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="ri-user-line" style="color: var(--primary);"></i> Info Pemohon
                    </h4>
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($surat['nama_pemohon']) ?>&background=4F46E5&color=fff" 
                             alt="Avatar" style="width: 60px; height: 60px; border-radius: 50%;">
                        <div>
                            <p style="color: var(--dark); font-weight: 600; margin: 0; font-size: 1.1rem;"><?= esc($surat['nama_pemohon']) ?></p>
                            <p style="color: #64748b; margin: 0;">@<?= esc($surat['username']) ?></p>
                            <p style="color: #64748b; font-size: 0.85rem; margin: 0;">Bergabung <?= date('M Y', strtotime($surat['created_at'])) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function selectStatus(element, status) {
    // Reset semua border
    document.querySelectorAll('label[onclick*="selectStatus"]').forEach(label => {
        label.style.borderColor = '#e2e8f0';
        label.style.background = 'white';
    });
    
    // Highlight yang dipilih
    if(status === 'Disetujui') {
        element.style.borderColor = '#10b981';
        element.style.background = '#f0fdf4';
    } else {
        element.style.borderColor = '#ef4444';
        element.style.background = '#fef2f2';
    }
}

// Konfirmasi sebelum submit
document.getElementById('formVerifikasi').addEventListener('submit', function(e) {
    const status = document.querySelector('input[name="status"]:checked');
    const keterangan = document.getElementById('keterangan').value;
    
    if(!status) {
        e.preventDefault();
        alert('Pilih keputusan verifikasi terlebih dahulu');
        return false;
    }
    
    if(!keterangan.trim()) {
        e.preventDefault();
        alert('Keterangan harus diisi');
        return false;
    }
    
    const action = status.value === 'Disetujui' ? 'menyetujui' : 'menolak';
    if(!confirm(`Apakah Anda yakin ingin ${action} pengajuan surat ini?\n\nTindakan ini tidak dapat dibatalkan.`)) {
        e.preventDefault();
        return false;
    }
});
</script>

<?= $this->endSection() ?>