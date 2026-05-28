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
            <li><a href="<?= base_url('/profil/lihat_visimisi') ?>" class="active"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Visi & Misi</a></li>
            <li><a href="<?= base_url('/profil/lihat_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Sejarah Desa</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Visi & Misi Desa Tifu</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Visi dan misi yang menjadi panduan Desa Tifu</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/dashboard') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-arrow-left-line"></i> Kembali</a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
            <!-- Visi Card -->
            <div class="card" style="border-top: 4px solid var(--primary); overflow: hidden;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="width: 50px; height: 50px; background: rgba(16, 185, 129, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-focus-2-line" style="font-size: 1.5rem; color: var(--primary);"></i>
                    </div>
                    <div>
                        <h4 style="color: var(--dark); margin: 0; font-size: 1.1rem;">Visi</h4>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Panduan masa depan desa</p>
                    </div>
                </div>

                <div style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(16, 185, 129, 0.1)); padding: 1.5rem; border-radius: 8px; border-left: 4px solid var(--primary);">
                    <p style="color: var(--dark); font-size: 1rem; line-height: 1.8; margin: 0;">
                        <?= $profil['visi'] ?? '<span style="color: #cbd5e1; font-style: italic;">Belum ada visi yang ditetapkan</span>' ?>
                    </p>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="card" style="border-top: 4px solid #f59e0b; overflow: hidden;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="width: 50px; height: 50px; background: rgba(245, 158, 11, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-checkbox-multiple-line" style="font-size: 1.5rem; color: #f59e0b;"></i>
                    </div>
                    <div>
                        <h4 style="color: var(--dark); margin: 0; font-size: 1.1rem;">Misi</h4>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Langkah-langkah pencapaian visi</p>
                    </div>
                </div>

                <div style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.05), rgba(245, 158, 11, 0.1)); padding: 1.5rem; border-radius: 8px; border-left: 4px solid #f59e0b;">
                    <p style="color: var(--dark); font-size: 1rem; line-height: 1.8; margin: 0;">
                        <?= $profil['misi'] ?? '<span style="color: #cbd5e1; font-style: italic;">Belum ada misi yang ditetapkan</span>' ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Info Section -->
        <div class="card">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ri-information-line" style="color: var(--primary);"></i> Tentang Visi & Misi
            </h4>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <h5 style="color: var(--dark); margin-bottom: 1rem; font-size: 0.95rem;">Apa itu Visi?</h5>
                    <p style="color: #64748b; line-height: 1.6; margin: 0;">
                        Visi adalah gambaran atau pandangan jauh ke depan tentang apa yang ingin dicapai oleh Desa Tifu. Visi memberikan arah dan tujuan jangka panjang yang menjadi inspirasi bagi seluruh masyarakat desa.
                    </p>
                </div>

                <div>
                    <h5 style="color: var(--dark); margin-bottom: 1rem; font-size: 0.95rem;">Apa itu Misi?</h5>
                    <p style="color: #64748b; line-height: 1.6; margin: 0;">
                        Misi adalah serangkaian langkah atau tindakan konkret yang akan dilakukan untuk mewujudkan visi. Misi menjelaskan bagaimana Desa Tifu akan mencapai tujuan yang telah ditetapkan dalam visi.
                    </p>
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 2rem 0;">

            <div style="background: #f0f9ff; padding: 1.5rem; border-radius: 8px; border-left: 4px solid var(--primary);">
                <p style="color: #0369a1; margin: 0;">
                    <i class="ri-lightbulb-line" style="margin-right: 0.5rem;"></i>
                    <strong>Catatan:</strong> Visi dan misi Desa Tifu adalah komitmen kami untuk membangun desa yang lebih baik, sejahtera, dan berkelanjutan bagi seluruh masyarakat.
                </p>
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
