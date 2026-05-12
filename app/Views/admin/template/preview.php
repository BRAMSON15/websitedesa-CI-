<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="dashboard-wrapper">
    <div class="sidebar">
        <a href="<?= base_url('/dashboard') ?>" class="sidebar-logo" style="display: flex; align-items: center; gap: 0.8rem;">
            <div style="width: 35px; height: 35px; background: linear-gradient(135deg, var(--primary), #818cf8); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                <i class="ri-home-smile-fill"></i>
            </div>
            SIDESA
        </a>
        <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem;">Menu Admin</p>
        <ul class="sidebar-nav">
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
        
        <div style="position: absolute; bottom: 2rem; width: calc(100% - 3rem);">
            <a href="<?= base_url('/logout') ?>" style="display: flex; align-items: center; padding: 0.8rem 1rem; color: #ef4444; border-radius: 8px; font-weight: 500; text-decoration: none; transition: background 0.3s; background: #fee2e2;">
                <i class="ri-logout-box-r-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Keluar Sistem
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div>
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Preview Template</h3>
                <p style="color: #64748b; font-size: 0.95rem;"><?= esc($letter_type) ?></p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/template') ?>" class="btn-outline" style="padding: 0.6rem 1.2rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-arrow-left-line"></i> Kembali
                </a>
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); cursor: pointer;">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <!-- Template Info -->
        <div class="card" style="margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; justify-content: between; gap: 1rem; margin-bottom: 1rem;">
                <div style="flex: 1;">
                    <h4 style="color: var(--dark); margin-bottom: 0.5rem;"><?= esc($template['title']) ?></h4>
                    <p style="color: #64748b; font-size: 0.9rem; margin: 0;">
                        <i class="ri-folder-line" style="margin-right: 0.3rem;"></i>
                        Berdasarkan file: <?= esc($template['template_file']) ?>
                    </p>
                </div>
                <a href="<?= base_url('/template/edit/' . urlencode($letter_type)) ?>" 
                   class="btn-primary" 
                   style="padding: 0.6rem 1rem; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-edit-line"></i> Edit Template
                </a>
            </div>
        </div>

        <!-- Preview Content -->
        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="padding: 1.5rem; border-bottom: 1px solid #f1f5f9; background: #f8fafc;">
                <h4 style="color: var(--dark); margin: 0; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-eye-line" style="color: var(--primary);"></i> Preview Surat
                </h4>
                <p style="color: #64748b; font-size: 0.9rem; margin-top: 0.5rem; margin-bottom: 0;">
                    Preview menggunakan data contoh untuk menampilkan hasil akhir surat
                </p>
            </div>

            <!-- Letter Preview -->
            <div style="padding: 2rem; background: white; font-family: 'Times New Roman', serif; line-height: 1.6;">
                <!-- Header -->
                <div style="text-align: center; margin-bottom: 2rem; border-bottom: 2px solid #000; padding-bottom: 1rem;">
                    <h2 style="margin: 0; font-size: 1.2rem; font-weight: bold;">PEMERINTAH KABUPATEN BURU</h2>
                    <h2 style="margin: 0; font-size: 1.2rem; font-weight: bold;">KECAMATAN LOLONG GUBA</h2>
                    <h2 style="margin: 0; font-size: 1.2rem; font-weight: bold;">DESA TIFU</h2>
                    <p style="margin: 0.5rem 0 0 0; font-size: 0.9rem;">Alamat: Jalan Inaboti No 01 Telep ___Code Pos: 97574</p>
                </div>

                <!-- Title -->
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <h3 style="margin: 0; font-size: 1.1rem; font-weight: bold; text-decoration: underline;">
                        <?= esc($template['title']) ?>
                    </h3>
                    <p style="margin: 0.5rem 0 0 0;">Nomor: 001/18/DT/IV/2026</p>
                </div>

                <!-- Content -->
                <div style="margin-bottom: 2rem;">
                    <p style="margin-bottom: 1rem;">Yang bertanda tangan dibawah ini;</p>
                    
                    <table style="margin-bottom: 1rem; width: 100%;">
                        <tr><td style="width: 120px; padding: 0.2rem 0;">Nama</td><td style="width: 20px;">:</td><td>NIKLAS SALASIWA</td></tr>
                        <tr><td style="padding: 0.2rem 0;">Jabatan</td><td>:</td><td>Kepala Desa</td></tr>
                        <tr><td style="padding: 0.2rem 0;">Alamat</td><td>:</td><td>Desa Tifu Kecamatan Lolong Guba Kab. Buru</td></tr>
                    </table>

                    <p style="margin-bottom: 1rem;">Dengan ini menerangkan dengan sesungguhnya bahwa:</p>

                    <table style="margin-bottom: 1.5rem; width: 100%;">
                        <tr><td style="width: 150px; padding: 0.2rem 0;">Nama Lengkap / Alias</td><td style="width: 20px;">:</td><td><?= esc($sample_data['nama']) ?></td></tr>
                        <tr><td style="padding: 0.2rem 0;">NIK</td><td>:</td><td><?= esc($sample_data['nik']) ?></td></tr>
                        <tr><td style="padding: 0.2rem 0;">Jenis Kelamin</td><td>:</td><td><?= esc($sample_data['jenis_kelamin']) ?></td></tr>
                        <tr><td style="padding: 0.2rem 0;">Agama</td><td>:</td><td><?= esc($sample_data['agama']) ?></td></tr>
                        <tr><td style="padding: 0.2rem 0;">Pekerjaan</td><td>:</td><td><?= esc($sample_data['pekerjaan']) ?></td></tr>
                        <tr><td style="padding: 0.2rem 0;">Status perkawinan</td><td>:</td><td><?= esc($sample_data['status_perkawinan']) ?></td></tr>
                        <tr><td style="padding: 0.2rem 0;">Tempat Tinggal</td><td>:</td><td><?= esc($sample_data['alamat']) ?></td></tr>
                    </table>

                    <!-- Template specific content -->
                    <div style="text-align: justify; margin-bottom: 1.5rem;">
                        <?= nl2br(esc($preview_content)) ?>
                    </div>

                    <p style="text-align: justify;">
                        Demikian Surat keterangan ini di buat dan di pergunakan sebagaimana perlunya dan dapat di pertanggungjawabkan.
                    </p>
                </div>

                <!-- Signature -->
                <div style="text-align: right; margin-top: 2rem;">
                    <p style="margin: 0;">Tifu, <?= date('d F Y') ?></p>
                    <p style="margin: 0.5rem 0;">Plt Kepala Desa Tifu,</p>
                    <div style="height: 60px;"></div>
                    <p style="margin: 0; font-weight: bold; text-decoration: underline;">NIKLAS SALASIWA</p>
                    <p style="margin: 0;">NIP 197005122014121004</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>