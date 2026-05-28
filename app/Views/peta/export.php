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
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Export Peta</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Unduh data peta dalam berbagai format</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/peta') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-arrow-left-line"></i> Kembali</a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            <div class="card" style="border-top: 4px solid var(--primary);">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="width: 50px; height: 50px; background: rgba(16, 185, 129, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-file-pdf-line" style="font-size: 1.5rem; color: var(--primary);"></i>
                    </div>
                    <div>
                        <h4 style="color: var(--dark); margin: 0; font-size: 1rem;">Export PDF</h4>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Unduh peta dalam format PDF</p>
                    </div>
                </div>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 1.5rem;">Dapatkan file PDF berisi peta administrasi Desa Tifu dengan informasi lengkap.</p>
                <button onclick="exportPDF()" class="btn-primary" style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 0.5rem;">
                    <i class="ri-download-line"></i> Download PDF
                </button>
            </div>

            <div class="card" style="border-top: 4px solid #f59e0b;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="width: 50px; height: 50px; background: rgba(245, 158, 11, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-file-excel-line" style="font-size: 1.5rem; color: #f59e0b;"></i>
                    </div>
                    <div>
                        <h4 style="color: var(--dark); margin: 0; font-size: 1rem;">Export Excel</h4>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Unduh data dalam format Excel</p>
                    </div>
                </div>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 1.5rem;">Dapatkan file Excel berisi data statistik dan informasi wilayah Desa Tifu.</p>
                <button onclick="exportExcel()" class="btn-primary" style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 0.5rem; background: #f59e0b;">
                    <i class="ri-download-line"></i> Download Excel
                </button>
            </div>

            <div class="card" style="border-top: 4px solid #8b5cf6;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="width: 50px; height: 50px; background: rgba(139, 92, 246, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-map-line" style="font-size: 1.5rem; color: #8b5cf6;"></i>
                    </div>
                    <div>
                        <h4 style="color: var(--dark); margin: 0; font-size: 1rem;">Export GeoJSON</h4>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Unduh data spasial dalam format GeoJSON</p>
                    </div>
                </div>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 1.5rem;">Dapatkan file GeoJSON untuk digunakan di aplikasi GIS atau mapping lainnya.</p>
                <button onclick="exportGeoJSON()" class="btn-primary" style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 0.5rem; background: #8b5cf6;">
                    <i class="ri-download-line"></i> Download GeoJSON
                </button>
            </div>
        </div>

        <div class="card" style="margin-top: 2rem;">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem;">Informasi Peta</h4>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Nama Peta</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem; margin-bottom: 1.5rem;"><?= $peta['judul_peta'] ?? 'Peta Administrasi Desa Tifu' ?></p>

                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Luas Wilayah</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem; margin-bottom: 1.5rem;"><?= $peta['luas_wilayah'] ?? 'Belum diisi' ?></p>

                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Terakhir Diperbarui</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">
                        <?= $peta['updated_at'] ? date('d M Y H:i', strtotime($peta['updated_at'])) : 'Belum diperbarui' ?>
                    </p>
                </div>

                <div>
                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Koordinat</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem; margin-bottom: 1.5rem;">
                        <?= $peta['koordinat_lat'] ?? '-3.4' ?>° S, <?= $peta['koordinat_lng'] ?? '127.1' ?>° E
                    </p>

                    <p style="color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem;">Lokasi</p>
                    <p style="color: var(--dark); font-weight: 600; font-size: 1rem;">Desa Tifu, Pulau Buru, Maluku</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
    function exportPDF() {
        const element = document.createElement('div');
        element.innerHTML = `
            <div style="padding: 20px; font-family: Arial, sans-serif;">
                <h1 style="text-align: center; margin-bottom: 30px;">Peta Administrasi Desa Tifu</h1>
                
                <h2 style="margin-top: 20px; margin-bottom: 10px;">Informasi Wilayah</h2>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd;"><strong>Nama Desa</strong></td>
                        <td style="padding: 8px; border: 1px solid #ddd;">Desa Tifu</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd;"><strong>Pulau</strong></td>
                        <td style="padding: 8px; border: 1px solid #ddd;">Pulau Buru</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd;"><strong>Provinsi</strong></td>
                        <td style="padding: 8px; border: 1px solid #ddd;">Maluku</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd;"><strong>Koordinat</strong></td>
                        <td style="padding: 8px; border: 1px solid #ddd;">${<?= $peta['koordinat_lat'] ?? '-3.4' ?>}° S, ${<?= $peta['koordinat_lng'] ?? '127.1' ?>}° E</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd;"><strong>Luas Wilayah</strong></td>
                        <td style="padding: 8px; border: 1px solid #ddd;">${<?= $peta['luas_wilayah'] ?? 'Belum diisi' ?>}</td>
                    </tr>
                </table>

                <h2 style="margin-top: 20px; margin-bottom: 10px;">Deskripsi</h2>
                <p>${<?= $peta['deskripsi'] ?? 'Tidak ada deskripsi' ?>}</p>

                <p style="margin-top: 30px; text-align: center; color: #666; font-size: 12px;">
                    Dokumen ini dihasilkan dari Sistem Informasi Desa (SIDESA) pada ${new Date().toLocaleDateString('id-ID')}
                </p>
            </div>
        `;

        const opt = {
            margin: 10,
            filename: 'Peta_Administrasi_Desa_Tifu.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { orientation: 'portrait', unit: 'mm', format: 'a4' }
        };

        html2pdf().set(opt).from(element).save();
    }

    function exportExcel() {
        const data = [
            ['PETA ADMINISTRASI DESA TIFU'],
            [],
            ['Informasi Wilayah'],
            ['Nama Desa', 'Desa Tifu'],
            ['Pulau', 'Pulau Buru'],
            ['Provinsi', 'Maluku'],
            ['Koordinat', '<?= $peta['koordinat_lat'] ?? '-3.4' ?>° S, <?= $peta['koordinat_lng'] ?? '127.1' ?>° E'],
            ['Luas Wilayah', '<?= $peta['luas_wilayah'] ?? 'Belum diisi' ?>'],
            [],
            ['Deskripsi'],
            ['<?= $peta['deskripsi'] ?? 'Tidak ada deskripsi' ?>']
        ];

        let csv = data.map(row => row.join(',')).join('\n');
        let blob = new Blob([csv], { type: 'text/csv' });
        let url = window.URL.createObjectURL(blob);
        let a = document.createElement('a');
        a.href = url;
        a.download = 'Peta_Administrasi_Desa_Tifu.csv';
        a.click();
    }

    function exportGeoJSON() {
        const geoJSON = {
            type: 'FeatureCollection',
            features: [
                {
                    type: 'Feature',
                    properties: {
                        name: '<?= $peta['judul_peta'] ?? 'Peta Administrasi Desa Tifu' ?>',
                        description: '<?= $peta['deskripsi'] ?? 'Peta wilayah administrasi Desa Tifu' ?>',
                        area: '<?= $peta['luas_wilayah'] ?? 'Belum diisi' ?>'
                    },
                    geometry: {
                        type: 'Point',
                        coordinates: [<?= $peta['koordinat_lng'] ?? '127.1' ?>, <?= $peta['koordinat_lat'] ?? '-3.4' ?>]
                    }
                }
            ]
        };

        let blob = new Blob([JSON.stringify(geoJSON, null, 2)], { type: 'application/json' });
        let url = window.URL.createObjectURL(blob);
        let a = document.createElement('a');
        a.href = url;
        a.download = 'Peta_Administrasi_Desa_Tifu.geojson';
        a.click();
    }
</script>

<?= $this->endSection() ?>
