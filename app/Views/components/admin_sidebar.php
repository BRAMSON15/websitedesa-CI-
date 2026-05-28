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
    
    <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; overflow-x: hidden; padding-right: 0.5rem; min-height: 0;">
        <li><a href="<?= base_url('/dashboard') ?>" <?= (current_url() == base_url('/dashboard')) ? 'class="active"' : '' ?>><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
        <li><a href="<?= base_url('/penduduk') ?>" <?= (strpos(current_url(), '/penduduk') !== false) ? 'class="active"' : '' ?>><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
        <li><a href="<?= base_url('/surat/kelola') ?>" <?= (strpos(current_url(), '/surat') !== false) ? 'class="active"' : '' ?>><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
        <li><a href="<?= base_url('/peta/kelola') ?>" <?= (strpos(current_url(), '/peta') !== false) ? 'class="active"' : '' ?>><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Peta Administrasi</a></li>
        <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
        <li><a href="<?= base_url('/profil/kelola_umum') ?>" <?= (strpos(current_url(), '/profil/kelola') !== false) ? 'class="active"' : '' ?>><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil Desa</a></li>
        <li><a href="<?= base_url('/struktur/kelola') ?>" <?= (strpos(current_url(), '/struktur') !== false) ? 'class="active"' : '' ?>><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Struktur Desa</a></li>
        <li><a href="<?= base_url('/profil/kelola_visimisi') ?>" <?= (strpos(current_url(), '/kelola_visimisi') !== false) ? 'class="active"' : '' ?>><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Visi & Misi</a></li>
    </ul>
    
    <div style="flex-shrink: 0; padding-top: 1rem; border-top: 1px solid #f1f5f9;">
        <a href="<?= base_url('/logout') ?>" style="display: flex; align-items: center; padding: 0.8rem 1rem; color: #ef4444; border-radius: 8px; font-weight: 500; text-decoration: none; transition: background 0.3s; background: #fee2e2;">
            <i class="ri-logout-box-r-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Keluar Sistem
        </a>
    </div>
</div>
