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
            <li><a href="<?= base_url('/dashboard') ?>" <?= (current_url() == base_url('/dashboard')) ? 'class="active"' : '' ?>><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            
            <?php if($role == 'admin'): ?>
                <li><a href="<?= base_url('/penduduk') ?>"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
                <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
                <li><a href="<?= base_url('/peta/kelola') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Peta Administrasi</a></li>
                <!-- NEW CONTENT MANAGEMENT FOR ADMIN -->
                <li><a href="<?= base_url('/profil/kelola_umum') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil Desa</a></li>
                <li><a href="<?= base_url('/struktur/kelola') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Struktur Desa</a></li>
                <li><a href="<?= base_url('/profil/kelola_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Visi & Misi</a></li>
                <li><a href="<?= base_url('/profil/kelola_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Sejarah</a></li>
            <?php elseif($role == 'kepala_desa'): ?>
                <li><a href="<?= base_url('/surat/persetujuan') ?>"><i class="ri-task-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Persetujuan Surat</a></li>
                <li><a href="<?= base_url('/peta') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Rekap Peta</a></li>
            <?php else: // masyarakat ?>
                <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
                <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
                <li><a href="<?= base_url('/profil/lihat_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Visi & Misi</a></li>
                <li><a href="<?= base_url('/profil/lihat_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Sejarah Desa</a></li>
                <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
                <li><a href="<?= base_url('/surat/ajukan') ?>"><i class="ri-send-plane-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Ajukan Surat</a></li>
                <li><a href="<?= base_url('/surat/status') ?>"><i class="ri-file-search-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Status Pengajuan</a></li>
                <li><a href="<?= base_url('/peta') ?>"><i class="ri-road-map-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Peta Administrasi</a></li>
                <li><a href="<?= base_url('/user/profil') ?>"><i class="ri-user-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil User</a></li>
            <?php endif; ?>
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
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Peta Administrasi Desa Tifu</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Peta wilayah administrasi Desa Tifu, Pulau Buru</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/peta/galeri') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-gallery-line"></i> Galeri</a>
                <a href="<?= base_url('/peta/export') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-download-line"></i> Export</a>
                <a href="<?= base_url('/peta/statistik') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-bar-chart-line"></i> Statistik</a>
                <a href="<?= base_url('/peta/detail') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-info-line"></i> Detail</a>
                <a href="<?= base_url('/peta') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-arrow-left-line"></i> Kembali</a>
            </div>
        </div>

        <div class="card" style="padding: 0; overflow: hidden; display: flex; gap: 1rem; height: calc(100vh - 200px);">
            <!-- Map Container -->
            <div id="map" style="flex: 1; border-radius: 8px; overflow: hidden;"></div>
            
            <!-- Info Panel -->
            <div style="width: 300px; padding: 1.5rem; overflow-y: auto; border-left: 1px solid #e2e8f0;">
                <h4 style="color: var(--dark); margin-bottom: 1rem; font-size: 1.1rem;">Informasi Wilayah</h4>
                
                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Nama Desa</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">Desa Tifu</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Pulau</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">Pulau Buru</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Koordinat</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 0.95rem;">-3.4° S, 127.1° E</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Luas Wilayah</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;"><?= $peta['luas_wilayah'] ?? 'Belum diisi' ?></p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Jumlah Penduduk</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;"><?= isset($jumlah_penduduk) ? number_format($jumlah_penduduk) : 'Data tersedia' ?></p>
                </div>

                <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 1.5rem 0;">

                <div style="background: #f0f9ff; padding: 1rem; border-radius: 8px; border-left: 4px solid var(--primary);">
                    <p style="color: #0369a1; font-size: 0.9rem; margin: 0;">
                        <i class="ri-information-line" style="margin-right: 0.5rem;"></i>
                        Peta ini menampilkan lokasi geografis Desa Tifu di Pulau Buru, Maluku.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #map {
        z-index: 1;
    }
    
    .leaflet-control-attribution {
        background: rgba(255, 255, 255, 0.8) !important;
        font-size: 0.75rem;
    }
</style>

<script>
    let osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    });

    let hybridLayer = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: '© Google Maps'
    });

    // Initialize map centered on Desa Tifu, Pulau Buru
    const map = L.map('map', {
        center: [<?= $peta['koordinat_lat'] ?? '-3.4' ?>, <?= $peta['koordinat_lng'] ?? '127.1' ?>],
        zoom: 13,
        layers: [hybridLayer]
    });
    
    let baseMaps = {
        "Satelit Hybrid": hybridLayer,
        "Peta Biasa (OSM)": osmLayer
    };

    L.control.layers(baseMaps).addTo(map);
    
    // Custom icon to prevent broken default leaflet image
    const customIcon = L.divIcon({
        className: 'custom-pin',
        html: `<div style="background-color: var(--primary); width: 24px; height: 24px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); border: 3px solid white; box-shadow: 0 3px 6px rgba(0,0,0,0.3);"></div>`,
        iconSize: [24, 24],
        iconAnchor: [12, 24],
        popupAnchor: [0, -24]
    });

    // Add marker for Desa Tifu
    const marker = L.marker([<?= $peta['koordinat_lat'] ?? '-3.4' ?>, <?= $peta['koordinat_lng'] ?? '127.1' ?>], {
        title: 'Desa Tifu',
        icon: customIcon
    }).addTo(map);
    
    // Add popup to marker
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
    
    // Add circle to show approximate area
    L.circle([<?= $peta['koordinat_lat'] ?? '-3.4' ?>, <?= $peta['koordinat_lng'] ?? '127.1' ?>], {
        color: 'var(--primary)',
        fillColor: 'var(--primary)',
        fillOpacity: 0.1,
        radius: 2000,
        weight: 2
    }).addTo(map);
</script>

<?= $this->endSection() ?>
