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
            <li><a href="<?= base_url('/peta') ?>" class="active"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Peta Administrasi</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Detail Peta Administrasi</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Informasi lengkap wilayah Desa Tifu</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/peta') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-arrow-left-line"></i> Kembali</a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">
            <div class="card">
                <div id="mapDetail" style="width: 100%; height: 500px; border-radius: 8px; overflow: hidden;"></div>
            </div>

            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem;">Informasi Wilayah</h4>
                
                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Nama Desa</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">Desa Tifu</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Pulau</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">Pulau Buru</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Provinsi</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">Maluku</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Koordinat</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 0.95rem;">
                        <?= $peta['koordinat_lat'] ?? '-3.4' ?>° S, <?= $peta['koordinat_lng'] ?? '127.1' ?>° E
                    </p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Luas Wilayah</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">
                        <?= $peta['luas_wilayah'] ?? 'Belum diisi' ?>
                    </p>
                </div>

                <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 1.5rem 0;">

                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Deskripsi</p>
                    <p style="color: var(--dark); font-size: 0.95rem; line-height: 1.6;">
                        <?= $peta['deskripsi'] ?? 'Tidak ada deskripsi' ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #mapDetail {
        z-index: 1;
    }
    
    .leaflet-control-attribution {
        background: rgba(255, 255, 255, 0.8) !important;
        font-size: 0.75rem;
    }

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

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<script>
    const mapDetail = L.map('mapDetail').setView([<?= $peta['koordinat_lat'] ?? '-3.4' ?>, <?= $peta['koordinat_lng'] ?? '127.1' ?>], 13);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    }).addTo(mapDetail);
    
    const marker = L.marker([<?= $peta['koordinat_lat'] ?? '-3.4' ?>, <?= $peta['koordinat_lng'] ?? '127.1' ?>], {
        title: 'Desa Tifu'
    }).addTo(mapDetail);
    
    marker.bindPopup(`
        <div style="font-family: Arial, sans-serif;">
            <h4 style="margin: 0 0 0.5rem 0; color: #1e293b;">Desa Tifu</h4>
            <p style="margin: 0.3rem 0; color: #64748b; font-size: 0.9rem;">
                <strong>Pulau:</strong> Pulau Buru
            </p>
            <p style="margin: 0.3rem 0; color: #64748b; font-size: 0.9rem;">
                <strong>Koordinat:</strong> <?= $peta['koordinat_lat'] ?? '-3.4' ?>° S, <?= $peta['koordinat_lng'] ?? '127.1' ?>° E
            </p>
        </div>
    `).openPopup();
    
    L.circle([<?= $peta['koordinat_lat'] ?? '-3.4' ?>, <?= $peta['koordinat_lng'] ?? '127.1' ?>], {
        color: 'var(--primary)',
        fillColor: 'var(--primary)',
        fillOpacity: 0.1,
        radius: 2000,
        weight: 2
    }).addTo(mapDetail);
</script>

<?= $this->endSection() ?>
