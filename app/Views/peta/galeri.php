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
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Galeri Peta</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Koleksi peta dan dokumentasi visual Desa Tifu</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/peta') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-arrow-left-line"></i> Kembali</a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1.5rem;">
            <div class="card" style="overflow: hidden; cursor: pointer; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.1)'">
                <div style="width: 100%; height: 200px; background: linear-gradient(135deg, #10b981, #059669); display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="ri-map-pin-line" style="font-size: 3rem;"></i>
                </div>
                <div style="padding: 1.5rem;">
                    <h4 style="color: var(--dark); margin: 0 0 0.5rem 0; font-size: 1rem;">Peta Administrasi</h4>
                    <p style="color: #64748b; font-size: 0.9rem; margin: 0 0 1rem 0;">Peta wilayah administrasi Desa Tifu dengan batas-batas wilayah yang jelas.</p>
                    <button onclick="viewMap('admin')" class="btn-primary" style="width: 100%; padding: 0.5rem; border: none; background: var(--primary); color: white; border-radius: 4px; cursor: pointer; font-weight: 500;">
                        Lihat Peta
                    </button>
                </div>
            </div>

            <div class="card" style="overflow: hidden; cursor: pointer; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.1)'">
                <div style="width: 100%; height: 200px; background: linear-gradient(135deg, #f59e0b, #d97706); display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="ri-bar-chart-line" style="font-size: 3rem;"></i>
                </div>
                <div style="padding: 1.5rem;">
                    <h4 style="color: var(--dark); margin: 0 0 0.5rem 0; font-size: 1rem;">Statistik Wilayah</h4>
                    <p style="color: #64748b; font-size: 0.9rem; margin: 0 0 1rem 0;">Data statistik penduduk dan informasi demografis Desa Tifu.</p>
                    <button onclick="viewMap('stats')" class="btn-primary" style="width: 100%; padding: 0.5rem; border: none; background: #f59e0b; color: white; border-radius: 4px; cursor: pointer; font-weight: 500;">
                        Lihat Statistik
                    </button>
                </div>
            </div>

            <div class="card" style="overflow: hidden; cursor: pointer; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.1)'">
                <div style="width: 100%; height: 200px; background: linear-gradient(135deg, #8b5cf6, #7c3aed); display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="ri-information-line" style="font-size: 3rem;"></i>
                </div>
                <div style="padding: 1.5rem;">
                    <h4 style="color: var(--dark); margin: 0 0 0.5rem 0; font-size: 1rem;">Detail Wilayah</h4>
                    <p style="color: #64748b; font-size: 0.9rem; margin: 0 0 1rem 0;">Informasi lengkap dan detail tentang wilayah Desa Tifu.</p>
                    <button onclick="viewMap('detail')" class="btn-primary" style="width: 100%; padding: 0.5rem; border: none; background: #8b5cf6; color: white; border-radius: 4px; cursor: pointer; font-weight: 500;">
                        Lihat Detail
                    </button>
                </div>
            </div>

            <div class="card" style="overflow: hidden; cursor: pointer; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.1)'">
                <div style="width: 100%; height: 200px; background: linear-gradient(135deg, #ec4899, #db2777); display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="ri-download-line" style="font-size: 3rem;"></i>
                </div>
                <div style="padding: 1.5rem;">
                    <h4 style="color: var(--dark); margin: 0 0 0.5rem 0; font-size: 1rem;">Export Data</h4>
                    <p style="color: #64748b; font-size: 0.9rem; margin: 0 0 1rem 0;">Unduh data peta dalam berbagai format (PDF, Excel, GeoJSON).</p>
                    <button onclick="viewMap('export')" class="btn-primary" style="width: 100%; padding: 0.5rem; border: none; background: #ec4899; color: white; border-radius: 4px; cursor: pointer; font-weight: 500;">
                        Export
                    </button>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 2rem;">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem;">Tentang Peta Administrasi</h4>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <h5 style="color: var(--dark); margin-bottom: 1rem; font-size: 0.95rem;">Desa Tifu</h5>
                    <p style="color: #64748b; line-height: 1.6; margin: 0;">
                        Desa Tifu adalah sebuah desa yang terletak di Pulau Buru, Provinsi Maluku. Desa ini memiliki potensi alam yang kaya dan masyarakat yang dinamis. Peta administrasi ini menunjukkan batas-batas wilayah dan lokasi geografis Desa Tifu.
                    </p>
                </div>

                <div>
                    <h5 style="color: var(--dark); margin-bottom: 1rem; font-size: 0.95rem;">Informasi Geografis</h5>
                    <p style="color: #64748b; line-height: 1.6; margin: 0;">
                        <strong>Koordinat:</strong> <?= $peta['koordinat_lat'] ?? '-3.4' ?>° S, <?= $peta['koordinat_lng'] ?? '127.1' ?>° E<br>
                        <strong>Luas Wilayah:</strong> <?= $peta['luas_wilayah'] ?? 'Belum diisi' ?><br>
                        <strong>Lokasi:</strong> Pulau Buru, Maluku, Indonesia
                    </p>
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

<script>
    function viewMap(type) {
        switch(type) {
            case 'admin':
                window.location.href = '<?= base_url('/peta') ?>';
                break;
            case 'stats':
                window.location.href = '<?= base_url('/peta/statistik') ?>';
                break;
            case 'detail':
                window.location.href = '<?= base_url('/peta/detail') ?>';
                break;
            case 'export':
                window.location.href = '<?= base_url('/peta/export') ?>';
                break;
        }
    }
</script>

<?= $this->endSection() ?>
