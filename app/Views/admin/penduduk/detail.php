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
        <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem;">Menu Admin</p>
        <ul class="sidebar-nav">
            <li><a href="<?= base_url('/dashboard') ?>"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li><a href="<?= base_url('/penduduk') ?>" class="active"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
            <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Detail Data Penduduk</h3>
                <p style="color: #64748b; font-size: 0.95rem;">NIK: <?= esc($penduduk['nik']) ?></p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/penduduk/edit/' . $penduduk['nik']) ?>" class="btn-primary" style="padding: 0.6rem 1.2rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-edit-line"></i> Edit Data
                </a>
                <a href="<?= base_url('/penduduk') ?>" class="btn-outline" style="padding: 0.6rem 1.2rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-arrow-left-line"></i> Kembali
                </a>
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); cursor: pointer;">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 300px; gap: 2rem;">
            <!-- Detail Penduduk -->
            <div>
                <!-- Informasi Identitas -->
                <div class="card" style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="ri-user-line" style="color: var(--primary);"></i> Informasi Identitas
                    </h4>
                    <div style="display: grid; gap: 1rem;">
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">NIK</span>
                            <span style="color: var(--dark); font-weight: 600; font-family: monospace;"><?= esc($penduduk['nik']) ?></span>
                        </div>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Nama Lengkap</span>
                            <span style="color: var(--dark); font-weight: 600; font-size: 1.1rem;"><?= esc($penduduk['nama']) ?></span>
                        </div>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Tempat, Tanggal Lahir</span>
                            <span style="color: var(--dark);"><?= esc($penduduk['ttl']) ?></span>
                        </div>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Jenis Kelamin</span>
                            <span style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.3rem 0.8rem; background: <?= $penduduk['jenis_kelamin'] == 'Laki-laki' ? '#dbeafe' : '#fce7f3' ?>; color: <?= $penduduk['jenis_kelamin'] == 'Laki-laki' ? '#1e40af' : '#be185d' ?>; border-radius: 15px; font-size: 0.9rem; font-weight: 600;">
                                <i class="<?= $penduduk['jenis_kelamin'] == 'Laki-laki' ? 'ri-men-line' : 'ri-women-line' ?>"></i>
                                <?= esc($penduduk['jenis_kelamin']) ?>
                            </span>
                        </div>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Agama</span>
                            <span style="color: var(--dark);"><?= esc($penduduk['agama']) ?></span>
                        </div>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Pekerjaan</span>
                            <span style="color: var(--dark);"><?= esc($penduduk['pekerjaan']) ?></span>
                        </div>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid #f1f5f9;">
                            <span style="color: #64748b; font-weight: 500;">Status dalam Keluarga</span>
                            <span style="color: var(--dark); font-weight: 600;"><?= esc($penduduk['status']) ?></span>
                        </div>
                        <?php if(!empty($penduduk['nomor_kk'])): ?>
                        <div style="display: grid; grid-template-columns: 200px 1fr; gap: 1rem; padding: 0.8rem 0;">
                            <span style="color: #64748b; font-weight: 500;">Nomor KK</span>
                            <span style="color: var(--dark); font-family: monospace;"><?= esc($penduduk['nomor_kk']) ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="card">
                    <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="ri-map-pin-line" style="color: var(--primary);"></i> Alamat Lengkap
                    </h4>
                    <div style="background: #f8fafc; padding: 1.2rem; border-radius: 8px; border-left: 4px solid var(--primary);">
                        <p style="color: var(--dark); line-height: 1.8; margin: 0; font-size: 1rem;"><?= esc($penduduk['alamat']) ?></p>
                    </div>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div>
                <!-- Avatar & Quick Info -->
                <div class="card" style="text-align: center; margin-bottom: 1.5rem;">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($penduduk['nama']) ?>&background=4F46E5&color=fff&size=120" 
                         alt="Avatar" style="width: 120px; height: 120px; border-radius: 50%; margin-bottom: 1rem;">
                    <h4 style="color: var(--dark); margin-bottom: 0.5rem;"><?= esc($penduduk['nama']) ?></h4>
                    <p style="color: #64748b; margin-bottom: 1rem;"><?= esc($penduduk['status']) ?></p>
                    <div style="display: flex; gap: 0.5rem; justify-content: center;">
                        <a href="<?= base_url('/penduduk/edit/' . $penduduk['nik']) ?>" class="btn-primary" style="padding: 0.5rem 1rem; text-decoration: none; font-size: 0.9rem;">
                            <i class="ri-edit-line"></i> Edit
                        </a>
                        <button onclick="confirmDelete('<?= $penduduk['nik'] ?>', '<?= esc($penduduk['nama']) ?>')" 
                                class="btn-outline" style="padding: 0.5rem 1rem; border-color: #ef4444; color: #ef4444; font-size: 0.9rem;">
                            <i class="ri-delete-bin-line"></i> Hapus
                        </button>
                    </div>
                </div>

                <!-- Metadata -->
                <div class="card">
                    <h4 style="color: var(--dark); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="ri-information-line" style="color: var(--primary);"></i> Informasi Sistem
                    </h4>
                    <div style="display: grid; gap: 0.8rem;">
                        <div>
                            <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.2rem;">Tanggal Dibuat</p>
                            <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= date('d F Y, H:i', strtotime($penduduk['created_at'])) ?> WIB</p>
                        </div>
                        <div>
                            <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.2rem;">Terakhir Diperbarui</p>
                            <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= date('d F Y, H:i', strtotime($penduduk['updated_at'])) ?> WIB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(nik, nama) {
    if(confirm(`Apakah Anda yakin ingin menghapus data penduduk "${nama}" (NIK: ${nik})?\n\nTindakan ini tidak dapat dibatalkan.`)) {
        window.location.href = `<?= base_url('/penduduk/hapus/') ?>${nik}`;
    }
}
</script>

<?= $this->endSection() ?>