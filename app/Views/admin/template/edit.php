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
            <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem; margin-top: 1rem;">Menu Admin</p>
        </div>
        
        <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; padding-right: 0.5rem;">
            <li><a href="<?= base_url('/dashboard') ?>"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li><a href="<?= base_url('/penduduk') ?>"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
            <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
            <li><a href="<?= base_url('/jenis-surat/kelola') ?>"><i class="ri-file-list-3-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Jenis Surat</a></li>
            <li><a href="<?= base_url('/template') ?>" class="active"><i class="ri-file-edit-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Template Surat</a></li>
            <li><a href="<?= base_url('/peta/kelola') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Peta Administrasi</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/profil/kelola_umum') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/kelola') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Struktur Desa</a></li>
            <li><a href="<?= base_url('/profil/kelola_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Visi & Misi</a></li>
            <li><a href="<?= base_url('/profil/kelola_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Sejarah</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Edit Template Surat</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Modifikasi isi template untuk <?= esc($letter_type) ?></p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
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

        <div class="card" style="padding: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 1rem;">
                <h4 style="color: var(--dark); margin: 0; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-file-edit-line" style="color: var(--primary);"></i>
                    <?= esc($template['title'] ?? $letter_type) ?>
                </h4>
                <a href="<?= base_url('/template') ?>" class="btn-outline" style="text-decoration: none; padding: 0.5rem 1rem;">
                    <i class="ri-arrow-left-line"></i> Kembali
                </a>
            </div>

            <div style="background: #fffbeb; border-left: 4px solid #f59e0b; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <h5 style="color: #b45309; margin-top: 0; margin-bottom: 0.5rem;"><i class="ri-information-line"></i> Informasi</h5>
                <p style="color: #92400e; margin: 0; font-size: 0.95rem;">
                    Saat ini fitur modifikasi template dinamis langsung dari antarmuka sedang dalam tahap pengembangan. 
                    Data ini dibaca dari file konfigurasi <code>app/Config/SuratTemplates.php</code> dan file dokumen word di folder <code>app/foldertemplate/</code>.
                </p>
            </div>

            <form action="<?= base_url('/template/update/' . urlencode($letter_type)) ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #475569; font-weight: 500;">Judul Surat</label>
                    <input type="text" class="form-control" value="<?= esc($template['title'] ?? '') ?>" disabled style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc; color: #64748b; cursor: not-allowed;">
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #475569; font-weight: 500;">Isi Template</label>
                    <textarea class="form-control" rows="15" disabled style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc; color: #64748b; cursor: not-allowed; line-height: 1.6; font-family: monospace;"><?= esc($template['content'] ?? '') ?></textarea>
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #475569; font-weight: 500;">Parameter Dinamis Tersedia (Variabel):</label>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                        <span style="background: #e0e7ff; color: #3730a3; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">{{NAMA}}</span>
                        <span style="background: #e0e7ff; color: #3730a3; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">{{NIK}}</span>
                        <span style="background: #e0e7ff; color: #3730a3; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">{{ALAMAT}}</span>
                        <span style="background: #e0e7ff; color: #3730a3; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">{{KEPERLUAN}}</span>
                        <?php if(isset($template['required_fields']) && is_array($template['required_fields'])): ?>
                            <?php foreach($template['required_fields'] as $field): ?>
                                <span style="background: #dcfce7; color: #166534; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">{{<?= strtoupper($field) ?>}}</span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
                    <button type="button" class="btn-primary" disabled style="opacity: 0.6; cursor: not-allowed; padding: 0.8rem 2rem;">
                        <i class="ri-save-line"></i> Simpan Perubahan (Segera Hadir)
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
