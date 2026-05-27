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
            <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-top: 1rem; padding-left: 0.5rem;">Menu Admin</p>
        </div>
        <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; padding-right: 0.5rem;">
            <li><a href="<?= base_url('/dashboard') ?>"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li><a href="<?= base_url('/penduduk') ?>" class="active"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
            <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Edit Data Penduduk</h3>
                <p style="color: #64748b; font-size: 0.95rem;">NIK: <?= esc($penduduk['nik']) ?></p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/penduduk') ?>" class="btn-outline" style="padding: 0.6rem 1.2rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-arrow-left-line"></i> Kembali
                </a>
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

        <?php if(session()->getFlashdata('errors')): ?>
        <div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                <i class="ri-error-warning-line" style="font-size: 1.5rem; color: #ef4444;"></i>
                <h5 style="color: #991b1b; margin: 0;">Terdapat kesalahan:</h5>
            </div>
            <ul style="color: #991b1b; margin: 0; padding-left: 3rem;">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('/penduduk/update/' . $penduduk['nik']) ?>" method="POST" id="formEditPenduduk">
            <?= csrf_field() ?>
            
            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-user-settings-line" style="color: var(--primary);"></i> Edit Data Identitas
                </h4>

                <div style="display: grid; gap: 1.5rem;">
                    <!-- NIK (Read Only) -->
                    <div>
                        <label style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            NIK (Nomor Induk Kependudukan)
                        </label>
                        <input type="text" value="<?= esc($penduduk['nik']) ?>" disabled
                               style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: monospace; background: #f8fafc; color: #64748b;">
                        <p style="color: #64748b; font-size: 0.85rem; margin-top: 0.3rem;">NIK tidak dapat diubah</p>
                    </div>

                    <!-- Nama -->
                    <div>
                        <label for="nama" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            Nama Lengkap <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" id="nama" name="nama" required maxlength="100"
                               value="<?= old('nama', $penduduk['nama']) ?>"
                               style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                               placeholder="Masukkan nama lengkap">
                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label for="tempat_lahir" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Tempat Lahir <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" required maxlength="50"
                                   value="<?= old('tempat_lahir', $penduduk['tempat_lahir']) ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                   placeholder="Contoh: Jakarta">
                        </div>
                        <div>
                            <label for="tanggal_lahir" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Tanggal Lahir <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                   value="<?= old('tanggal_lahir', $penduduk['tanggal_lahir']) ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="jenis_kelamin" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            Jenis Kelamin <span style="color: #ef4444;">*</span>
                        </label>
                        <select id="jenis_kelamin" name="jenis_kelamin" required
                                style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" <?= old('jenis_kelamin', $penduduk['jenis_kelamin']) == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= old('jenis_kelamin', $penduduk['jenis_kelamin']) == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            Alamat Lengkap <span style="color: #ef4444;">*</span>
                        </label>
                        <textarea id="alamat" name="alamat" rows="3" required
                                  style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: inherit; resize: vertical;"
                                  placeholder="Masukkan alamat lengkap (RT/RW, Desa, Kecamatan)"><?= old('alamat', $penduduk['alamat']) ?></textarea>
                    </div>

                    <!-- Agama & Pekerjaan -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label for="agama" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Agama <span style="color: #ef4444;">*</span>
                            </label>
                            <select id="agama" name="agama" required
                                    style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                                <option value="">Pilih Agama</option>
                                <option value="Islam" <?= old('agama', $penduduk['agama']) == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                <option value="Kristen" <?= old('agama', $penduduk['agama']) == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                                <option value="Katolik" <?= old('agama', $penduduk['agama']) == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                                <option value="Hindu" <?= old('agama', $penduduk['agama']) == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha" <?= old('agama', $penduduk['agama']) == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                                <option value="Konghucu" <?= old('agama', $penduduk['agama']) == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label for="pekerjaan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Pekerjaan <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" id="pekerjaan" name="pekerjaan" required maxlength="100"
                                   value="<?= old('pekerjaan', $penduduk['pekerjaan']) ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                   placeholder="Contoh: Wiraswasta, PNS, Petani">
                        </div>
                    </div>

                    <!-- Status & Nomor KK -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label for="status" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Status dalam Keluarga <span style="color: #ef4444;">*</span>
                            </label>
                            <select id="status" name="status" required
                                    style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                                <option value="">Pilih Status</option>
                                <option value="Kepala Keluarga" <?= old('status', $penduduk['status']) == 'Kepala Keluarga' ? 'selected' : '' ?>>Kepala Keluarga</option>
                                <option value="Istri" <?= old('status', $penduduk['status']) == 'Istri' ? 'selected' : '' ?>>Istri</option>
                                <option value="Anak" <?= old('status', $penduduk['status']) == 'Anak' ? 'selected' : '' ?>>Anak</option>
                                <option value="Menantu" <?= old('status', $penduduk['status']) == 'Menantu' ? 'selected' : '' ?>>Menantu</option>
                                <option value="Cucu" <?= old('status', $penduduk['status']) == 'Cucu' ? 'selected' : '' ?>>Cucu</option>
                                <option value="Orang Tua" <?= old('status', $penduduk['status']) == 'Orang Tua' ? 'selected' : '' ?>>Orang Tua</option>
                                <option value="Mertua" <?= old('status', $penduduk['status']) == 'Mertua' ? 'selected' : '' ?>>Mertua</option>
                                <option value="Famili Lain" <?= old('status', $penduduk['status']) == 'Famili Lain' ? 'selected' : '' ?>>Famili Lain</option>
                                <option value="Pembantu" <?= old('status', $penduduk['status']) == 'Pembantu' ? 'selected' : '' ?>>Pembantu</option>
                                <option value="Lainnya" <?= old('status', $penduduk['status']) == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label for="nomor_kk" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Nomor Kartu Keluarga (Opsional)
                            </label>
                            <input type="text" id="nomor_kk" name="nomor_kk" maxlength="16" pattern="[0-9]{16}"
                                   value="<?= old('nomor_kk', $penduduk['nomor_kk']) ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: monospace;"
                                   placeholder="16 digit nomor KK (opsional)">
                            <p style="color: #64748b; font-size: 0.85rem; margin-top: 0.3rem;">Kosongkan jika tidak ada</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                <a href="<?= base_url('/penduduk') ?>" class="btn-outline" style="padding: 0.8rem 2rem; text-decoration: none;">
                    <i class="ri-close-line"></i> Batal
                </a>
                <button type="submit" class="btn-primary" style="padding: 0.8rem 2rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-save-line"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Validasi Nomor KK hanya angka
document.getElementById('nomor_kk').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Konfirmasi sebelum submit
document.getElementById('formEditPenduduk').addEventListener('submit', function(e) {
    if(!confirm('Apakah Anda yakin ingin menyimpan perubahan data penduduk ini?')) {
        e.preventDefault();
        return false;
    }
});
</script>

<?= $this->endSection() ?>