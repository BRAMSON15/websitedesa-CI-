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
            <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-top: 1rem; padding-left: 0.5rem;">Menu Masyarakat</p>
        </div>
        <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; padding-right: 0.5rem;">
            <li><a href="<?= base_url('/dashboard') ?>"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
            <li><a href="<?= base_url('/profil/lihat_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Visi & Misi</a></li>
            <li><a href="<?= base_url('/profil/lihat_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Sejarah Desa</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/surat/ajukan') ?>" class="active"><i class="ri-send-plane-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Ajukan Surat</a></li>
            <li><a href="<?= base_url('/surat/status') ?>"><i class="ri-file-search-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Status Pengajuan</a></li>
            <li><a href="<?= base_url('/peta') ?>"><i class="ri-road-map-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Peta Administrasi</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Ajukan Surat</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Pilih jenis surat yang ingin Anda ajukan</p>
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

        <!-- Info Card -->
        <div class="card" style="background: linear-gradient(135deg, #eff6ff, #dbeafe); border-left: 4px solid #3b82f6; margin-bottom: 2rem;">
            <div style="display: flex; align-items: start; gap: 1rem;">
                <div style="width: 50px; height: 50px; background: #3b82f6; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0;">
                    <i class="ri-information-line" style="font-size: 1.5rem;"></i>
                </div>
                <div>
                    <h5 style="color: #1e40af; margin-bottom: 0.5rem;">Petunjuk Pengajuan Surat</h5>
                    <ul style="color: #1e3a8a; font-size: 0.9rem; line-height: 1.8; margin: 0; padding-left: 1.2rem;">
                        <li>Pilih jenis surat yang sesuai dengan kebutuhan Anda</li>
                        <li>Isi formulir dengan data yang lengkap dan benar</li>
                        <li>Pastikan semua informasi sesuai dengan dokumen resmi</li>
                        <li>Setelah submit, Anda dapat memantau status di menu "Status Pengajuan"</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Jenis Surat Cards -->
        <div class="card">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ri-file-list-3-line" style="color: var(--primary);"></i> Pilih Jenis Surat
            </h4>

            <?php if(empty($jenis_surat)): ?>
            <div style="padding: 3rem 0; text-align: center; color: #94a3b8;">
                <div style="width: 80px; height: 80px; background: #f8fafc; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-file-forbid-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem;">Belum Ada Jenis Surat</h5>
                <p style="font-size: 0.95rem;">Hubungi admin untuk menambahkan jenis surat.</p>
            </div>
            <?php else: ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                <?php foreach($jenis_surat as $jenis): ?>
                <a href="<?= base_url('/surat/form/' . $jenis['id_jenis']) ?>" style="text-decoration: none;">
                    <div class="card" style="border: 2px solid #e2e8f0; transition: all 0.3s; cursor: pointer; height: 100%;" 
                         onmouseover="this.style.borderColor='var(--primary)'; this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(79, 70, 229, 0.15)'" 
                         onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 10px rgba(0,0,0,0.05)'">
                        <div style="display: flex; align-items: start; gap: 1rem;">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary), #818cf8); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0;">
                                <i class="ri-file-text-line" style="font-size: 1.8rem;"></i>
                            </div>
                            <div style="flex: 1;">
                                <h5 style="color: var(--dark); margin-bottom: 0.5rem; font-size: 1.1rem;"><?= esc($jenis['nama_surat']) ?></h5>
                                <p style="color: #64748b; font-size: 0.9rem; line-height: 1.6; margin-bottom: 1rem;">
                                    <?= $jenis['template'] ? esc(substr($jenis['template'], 0, 100)) . '...' : 'Klik untuk mengisi formulir pengajuan surat ini' ?>
                                </p>
                                <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--primary); font-weight: 600; font-size: 0.9rem;">
                                    <span>Ajukan Sekarang</span>
                                    <i class="ri-arrow-right-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
