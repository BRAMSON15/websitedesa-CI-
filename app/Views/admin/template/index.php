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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Template Surat</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Kelola template surat berdasarkan file Word di folder template</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); cursor: pointer;">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <?php if(session()->getFlashdata('success')): ?>
        <div style="background: #d1fae5; border-left: 4px solid #10b981; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem;">
            <i class="ri-checkbox-circle-line" style="font-size: 1.5rem; color: #10b981;"></i>
            <p style="color: #065f46; margin: 0;"><?= session()->getFlashdata('success') ?></p>
        </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
        <div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem;">
            <i class="ri-error-warning-line" style="font-size: 1.5rem; color: #ef4444;"></i>
            <p style="color: #991b1b; margin: 0;"><?= session()->getFlashdata('error') ?></p>
        </div>
        <?php endif; ?>

        <!-- Info Card -->
        <div class="card" style="background: linear-gradient(135deg, #dbeafe, #bfdbfe); border-left: 4px solid var(--primary); margin-bottom: 2rem;">
            <div style="display: flex; align-items: start; gap: 1rem;">
                <div style="width: 50px; height: 50px; background: var(--primary); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0;">
                    <i class="ri-information-line" style="font-size: 1.5rem;"></i>
                </div>
                <div style="flex: 1;">
                    <h5 style="color: #1e40af; margin-bottom: 0.8rem;">Template Berdasarkan File Word</h5>
                    <p style="color: #1e3a8a; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Template surat ini dibuat berdasarkan file Microsoft Word yang ada di folder <code>app/foldertemplate/</code>. 
                        Anda dapat melihat preview dan menyesuaikan konten template sesuai dengan format yang diinginkan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Template List -->
        <div style="display: grid; gap: 1.5rem;">
            <?php foreach($templates as $letterType => $template): ?>
            <div class="card" style="padding: 0; overflow: hidden;">
                <div style="padding: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                    <div style="display: flex; align-items: center; justify-content: between; gap: 1rem;">
                        <div style="flex: 1;">
                            <h4 style="color: var(--dark); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                                <i class="ri-file-text-line" style="color: var(--primary);"></i>
                                <?= esc($letterType) ?>
                            </h4>
                            <p style="color: #64748b; font-size: 0.9rem; margin: 0;">
                                <i class="ri-folder-line" style="margin-right: 0.3rem;"></i>
                                File: <?= esc($template['template_file']) ?>
                            </p>
                        </div>
                        <div style="display: flex; gap: 0.8rem;">
                            <a href="<?= base_url('/template/preview/' . urlencode($letterType)) ?>" 
                               class="btn-outline" 
                               style="padding: 0.6rem 1rem; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                                <i class="ri-eye-line"></i> Preview
                            </a>
                            <a href="<?= base_url('/template/edit/' . urlencode($letterType)) ?>" 
                               class="btn-primary" 
                               style="padding: 0.6rem 1rem; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                                <i class="ri-edit-line"></i> Edit Template
                            </a>
                        </div>
                    </div>
                </div>
                
                <div style="padding: 1.5rem; background: #f8fafc;">
                    <h6 style="color: var(--dark); margin-bottom: 0.8rem;">Field yang Diperlukan:</h6>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                        <!-- Base fields -->
                        <span style="background: #e0e7ff; color: #3730a3; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">nama</span>
                        <span style="background: #e0e7ff; color: #3730a3; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">nik</span>
                        <span style="background: #e0e7ff; color: #3730a3; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">alamat</span>
                        <span style="background: #e0e7ff; color: #3730a3; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;">keperluan</span>
                        
                        <!-- Specific fields -->
                        <?php if(!empty($template['required_fields'])): ?>
                            <?php foreach($template['required_fields'] as $field): ?>
                            <span style="background: #dcfce7; color: #166534; padding: 0.3rem 0.6rem; border-radius: 15px; font-size: 0.8rem;"><?= esc($field) ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>