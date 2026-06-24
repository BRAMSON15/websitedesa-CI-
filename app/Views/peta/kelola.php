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
            <li><a href="<?= base_url('/penduduk') ?>"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
            <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
            <li><a href="<?= base_url('/peta/kelola') ?>" class="active"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Peta Administrasi</a></li>
            <li><a href="<?= base_url('/profil/kelola_umum') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/kelola') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Struktur Desa</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Kelola Peta Administrasi</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Mengelola data peta wilayah Desa Tifu, Pulau Buru</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/peta') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-eye-line"></i> Lihat Peta</a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Form Input Peta -->
            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-map-pin-add-line" style="color: var(--primary);"></i> Input Data Peta
                </h4>

                <form id="formPeta">
                    <div class="form-group">
                        <label class="form-label">Judul Peta</label>
                        <input type="text" name="judul_peta" class="form-control" placeholder="Contoh: Peta Administrasi Desa Tifu" value="<?= $peta['judul_peta'] ?? 'Peta Administrasi Desa Tifu' ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Deskripsi Peta</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi wilayah administrasi..."><?= $peta['deskripsi'] ?? 'Peta wilayah administrasi Desa Tifu, Pulau Buru, Maluku' ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Luas Wilayah</label>
                        <input type="text" name="luas_wilayah" class="form-control" placeholder="Contoh: 25.5 km²" value="<?= $peta['luas_wilayah'] ?? '' ?>">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label class="form-label">Latitude</label>
                            <input type="number" name="koordinat_lat" class="form-control" step="0.00000001" placeholder="-3.4" value="<?= $peta['koordinat_lat'] ?? '-3.4' ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Longitude</label>
                            <input type="number" name="koordinat_lng" class="form-control" step="0.00000001" placeholder="127.1" value="<?= $peta['koordinat_lng'] ?? '127.1' ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Data Spasial (GeoJSON atau URL Embed)</label>
                        <textarea name="data_spasial" class="form-control" rows="4" placeholder="Masukkan GeoJSON atau URL embed peta..."><?= $peta['data_spasial'] ?? '' ?></textarea>
                        <small style="color: #64748b; display: block; margin-top: 0.5rem;">
                            <i class="ri-information-line"></i> Opsional: Gunakan GeoJSON untuk polygon/area atau URL embed dari Google Maps/Leaflet
                        </small>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 0.5rem;">
                        <i class="ri-save-line"></i> Simpan Peta
                    </button>
                </form>
            </div>

            <!-- Info Wilayah -->
            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-information-line" style="color: var(--primary);"></i> Informasi Wilayah
                </h4>

                <div style="background: #f0f9ff; padding: 1rem; border-radius: 8px; border-left: 4px solid var(--primary); margin-bottom: 1.5rem;">
                    <p style="color: #0369a1; font-size: 0.9rem; margin: 0;">
                        <i class="ri-map-pin-line" style="margin-right: 0.5rem;"></i>
                        <strong>Desa Tifu</strong> - Pulau Buru, Maluku
                    </p>
                </div>

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

                <div>
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.3rem;">Status</p>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <div style="width: 10px; height: 10px; background: #10b981; border-radius: 50%;"></div>
                        <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">
                            <?= $peta ? 'Peta Tersedia' : 'Belum Ada Peta' ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview Peta -->
        <div class="card">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ri-map-line" style="color: var(--primary);"></i> Preview Peta
            </h4>

            <div id="mapPreview" style="width: 100%; height: 400px; border-radius: 8px; overflow: hidden; background: #f1f5f9;"></div>
        </div>
    </div>
</div>

<style>
    #mapPreview {
        z-index: 1;
    }
    
    .leaflet-control-attribution {
        background: rgba(255, 255, 255, 0.8) !important;
        font-size: 0.75rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--dark);
        font-weight: 500;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 0.95rem;
        font-family: inherit;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .btn-primary {
        background: var(--primary);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background: #059669;
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
    let osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    });

    let hybridLayer = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: '© Google Maps'
    });

    // Initialize preview map
    let mapPreview = L.map('mapPreview', {
        center: [<?= $peta['koordinat_lat'] ?? '-3.4' ?>, <?= $peta['koordinat_lng'] ?? '127.1' ?>],
        zoom: 13,
        layers: [hybridLayer]
    });
    
    let baseMaps = {
        "Satelit Hybrid": hybridLayer,
        "Peta Biasa (OSM)": osmLayer
    };

    L.control.layers(baseMaps).addTo(mapPreview);
    
    // Custom icon to prevent broken default leaflet image
    const customIcon = L.divIcon({
        className: 'custom-pin',
        html: `<div style="background-color: var(--primary); width: 24px; height: 24px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); border: 3px solid white; box-shadow: 0 3px 6px rgba(0,0,0,0.3);"></div>`,
        iconSize: [24, 24],
        iconAnchor: [12, 24],
        popupAnchor: [0, -24]
    });

    let marker = L.marker([<?= $peta['koordinat_lat'] ?? '-3.4' ?>, <?= $peta['koordinat_lng'] ?? '127.1' ?>], {
        title: 'Desa Tifu',
        draggable: true,
        icon: customIcon
    }).addTo(mapPreview);
    
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
    }).addTo(mapPreview);

    // Form submission
    document.getElementById('formPeta').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch('<?= base_url('/peta/simpanPeta') ?>', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if(result.success) {
                alert(result.message);
                location.reload();
            } else {
                alert('Error: ' + result.message);
            }
        } catch(error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        }
    });

    const latInput = document.querySelector('input[name="koordinat_lat"]');
    const lngInput = document.querySelector('input[name="koordinat_lng"]');

    // Update map preview when coordinates change in input
    latInput.addEventListener('input', updateMapPreview);
    lngInput.addEventListener('input', updateMapPreview);

    function updateMapPreview() {
        const lat = parseFloat(latInput.value);
        const lng = parseFloat(lngInput.value);

        if(!isNaN(lat) && !isNaN(lng)) {
            mapPreview.setView([lat, lng], mapPreview.getZoom());
            marker.setLatLng([lat, lng]);
        }
    }

    // Update inputs when marker is dragged
    marker.on('dragend', function(e) {
        const position = marker.getLatLng();
        latInput.value = position.lat.toFixed(8);
        lngInput.value = position.lng.toFixed(8);
        mapPreview.setView(position, mapPreview.getZoom());
    });

    // Update marker and inputs when map is clicked
    mapPreview.on('click', function(e) {
        const position = e.latlng;
        marker.setLatLng(position);
        latInput.value = position.lat.toFixed(8);
        lngInput.value = position.lng.toFixed(8);
    });
</script>

<?= $this->endSection() ?>
