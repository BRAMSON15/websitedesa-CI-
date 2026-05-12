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
        <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem;">Menu Masyarakat</p>
        <ul class="sidebar-nav">
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
        
        <div style="position: absolute; bottom: 2rem; width: calc(100% - 3rem);">
            <a href="<?= base_url('/logout') ?>" style="display: flex; align-items: center; padding: 0.8rem 1rem; color: #ef4444; border-radius: 8px; font-weight: 500; text-decoration: none; transition: background 0.3s; background: #fee2e2;">
                <i class="ri-logout-box-r-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Keluar Sistem
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div>
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Form Pengajuan Surat</h3>
                <p style="color: #64748b; font-size: 0.95rem;"><?= esc($jenis_surat['nama_surat']) ?></p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/surat/ajukan') ?>" class="btn-outline" style="padding: 0.6rem 1.2rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
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

        <form action="<?= base_url('/surat/submit') ?>" method="POST" id="formPengajuan">
            <?= csrf_field() ?>
            <input type="hidden" name="id_jenis" value="<?= $jenis_surat['id_jenis'] ?>">

            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-file-edit-line" style="color: var(--primary);"></i> Informasi Pengajuan
                </h4>

                <div style="display: grid; gap: 1.5rem;">
                    <!-- Nama Pemohon (dari session) -->
                    <div>
                        <label style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            Nama Pemohon <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" value="<?= esc($nama) ?>" disabled 
                               style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; background: #f8fafc; color: #64748b;">
                        <p style="color: #64748b; font-size: 0.85rem; margin-top: 0.3rem;">Data diambil dari profil Anda</p>
                    </div>

                    <!-- Jenis Surat -->
                    <div>
                        <label style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            Jenis Surat <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" value="<?= esc($jenis_surat['nama_surat']) ?>" disabled 
                               style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; background: #f8fafc; color: #64748b;">
                    </div>

                    <!-- Keperluan -->
                    <div>
                        <label for="keperluan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            Keperluan / Tujuan Surat <span style="color: #ef4444;">*</span>
                        </label>
                        <textarea id="keperluan" name="keperluan" rows="4" required
                                  style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: inherit; resize: vertical;"
                                  placeholder="Jelaskan keperluan atau tujuan pembuatan surat ini..."><?= old('keperluan') ?></textarea>
                        <p style="color: #64748b; font-size: 0.85rem; margin-top: 0.3rem;">Minimal 10 karakter</p>
                    </div>

                    <!-- Alamat Lengkap -->
                    <div>
                        <label for="alamat" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            Alamat Lengkap <span style="color: #ef4444;">*</span>
                        </label>
                        <textarea id="alamat" name="alamat" rows="3" required
                                  style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: inherit; resize: vertical;"
                                  placeholder="Masukkan alamat lengkap sesuai KTP..."><?= old('alamat') ?></textarea>
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="nik" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            NIK (Nomor Induk Kependudukan) <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" id="nik" name="nik" required maxlength="16" pattern="[0-9]{16}"
                               value="<?= old('nik') ?>"
                               style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                               placeholder="Masukkan 16 digit NIK">
                        <p style="color: #64748b; font-size: 0.85rem; margin-top: 0.3rem;">16 digit angka sesuai KTP</p>
                    </div>

                    <!-- Tempat Lahir -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label for="tempat_lahir" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Tempat Lahir <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" required
                                   value="<?= old('tempat_lahir') ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                   placeholder="Contoh: Jakarta">
                        </div>
                        <div>
                            <label for="tanggal_lahir" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Tanggal Lahir <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                   value="<?= old('tanggal_lahir') ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                        </div>
                    </div>

                    <!-- Jenis Kelamin & Pekerjaan -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label for="jenis_kelamin" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Jenis Kelamin <span style="color: #ef4444;">*</span>
                            </label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required
                                    style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label for="pekerjaan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Pekerjaan <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" id="pekerjaan" name="pekerjaan" required
                                   value="<?= old('pekerjaan') ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                   placeholder="Contoh: Wiraswasta">
                        </div>
                    </div>

                    <!-- Agama & Status Perkawinan -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label for="agama" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Agama <span style="color: #ef4444;">*</span>
                            </label>
                            <select id="agama" name="agama" required
                                    style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                                <option value="">Pilih Agama</option>
                                <option value="Islam" <?= old('agama') == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                <option value="Kristen" <?= old('agama') == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                                <option value="Katolik" <?= old('agama') == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                                <option value="Hindu" <?= old('agama') == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha" <?= old('agama') == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                                <option value="Konghucu" <?= old('agama') == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label for="status_perkawinan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Status Perkawinan <span style="color: #ef4444;">*</span>
                            </label>
                            <select id="status_perkawinan" name="status_perkawinan" required
                                    style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                                <option value="">Pilih Status</option>
                                <option value="Belum Kawin" <?= old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                                <option value="Kawin" <?= old('status_perkawinan') == 'Kawin' ? 'selected' : '' ?>>Kawin</option>
                                <option value="Cerai Hidup" <?= old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' ?>>Cerai Hidup</option>
                                <option value="Cerai Mati" <?= old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' ?>>Cerai Mati</option>
                            </select>
                        </div>
                    </div>

                    <!-- Keterangan Tambahan -->
                    <div>
                        <label for="keterangan_tambahan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                            Keterangan Tambahan (Opsional)
                        </label>
                        <textarea id="keterangan_tambahan" name="keterangan_tambahan" rows="3"
                                  style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: inherit; resize: vertical;"
                                  placeholder="Informasi tambahan jika diperlukan..."><?= old('keterangan_tambahan') ?></textarea>
                    </div>

                    <!-- Dynamic Fields Based on Letter Type -->
                    <div id="dynamicFields">
                        <?php 
                        $jenisSurat = $jenis_surat['nama_surat'];
                        ?>
                        
                        <!-- Fields for Surat Keterangan Domisili -->
                        <?php if($jenisSurat == 'Surat Keterangan Domisili'): ?>
                        <div class="dynamic-field">
                            <label for="tanggal_domisili" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Tanggal Mulai Berdomisili <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="date" id="tanggal_domisili" name="tanggal_domisili" required
                                   value="<?= old('tanggal_domisili') ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                        </div>
                        <?php endif; ?>

                        <!-- Fields for Surat Keterangan Nikah -->
                        <?php if($jenisSurat == 'Surat Keterangan Nikah'): ?>
                        <div class="dynamic-field" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div>
                                <label for="nama_pasangan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                    Nama Calon Pasangan <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="text" id="nama_pasangan" name="nama_pasangan" required
                                       value="<?= old('nama_pasangan') ?>"
                                       style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                       placeholder="Nama lengkap calon pasangan">
                            </div>
                            <div>
                                <label for="tanggal_nikah" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                    Rencana Tanggal Nikah <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="date" id="tanggal_nikah" name="tanggal_nikah" required
                                       value="<?= old('tanggal_nikah') ?>"
                                       style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Fields for Surat Keterangan Tidak Mampu -->
                        <?php if($jenisSurat == 'Surat Keterangan Tidak Mampu'): ?>
                        <div class="dynamic-field">
                            <label for="penghasilan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Penghasilan Rata-rata per Bulan <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" id="penghasilan" name="penghasilan" required
                                   value="<?= old('penghasilan') ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                   placeholder="Contoh: Rp 500.000">
                        </div>
                        <?php endif; ?>

                        <!-- Fields for Surat Keterangan Kepemilikan Tanah -->
                        <?php if($jenisSurat == 'Surat Keterangan Kepemilikan Tanah'): ?>
                        <div class="dynamic-field" style="display: grid; gap: 1rem;">
                            <div>
                                <label for="lokasi_tanah" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                    Lokasi Tanah <span style="color: #ef4444;">*</span>
                                </label>
                                <textarea id="lokasi_tanah" name="lokasi_tanah" rows="2" required
                                          style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: inherit; resize: vertical;"
                                          placeholder="Alamat lengkap lokasi tanah"><?= old('lokasi_tanah') ?></textarea>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div>
                                    <label for="luas_tanah" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Luas Tanah (m²) <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="number" id="luas_tanah" name="luas_tanah" required min="1"
                                           value="<?= old('luas_tanah') ?>"
                                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                           placeholder="Contoh: 100">
                                </div>
                                <div>
                                    <label for="bukti_kepemilikan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Bukti Kepemilikan <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="text" id="bukti_kepemilikan" name="bukti_kepemilikan" required
                                           value="<?= old('bukti_kepemilikan') ?>"
                                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                           placeholder="Contoh: Sertifikat HGB">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Fields for Surat Izin Keramaian -->
                        <?php if($jenisSurat == 'Surat Izin Keramaian'): ?>
                        <div class="dynamic-field" style="display: grid; gap: 1rem;">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div>
                                    <label for="jenis_acara" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Jenis Acara <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="text" id="jenis_acara" name="jenis_acara" required
                                           value="<?= old('jenis_acara') ?>"
                                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                           placeholder="Contoh: Pernikahan">
                                </div>
                                <div>
                                    <label for="tanggal_acara" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Tanggal Acara <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="date" id="tanggal_acara" name="tanggal_acara" required
                                           value="<?= old('tanggal_acara') ?>"
                                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                                </div>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div>
                                    <label for="lokasi_acara" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Lokasi Acara <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="text" id="lokasi_acara" name="lokasi_acara" required
                                           value="<?= old('lokasi_acara') ?>"
                                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                           placeholder="Alamat lokasi acara">
                                </div>
                                <div>
                                    <label for="jumlah_undangan" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Perkiraan Jumlah Undangan <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="number" id="jumlah_undangan" name="jumlah_undangan" required min="1"
                                           value="<?= old('jumlah_undangan') ?>"
                                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                           placeholder="Contoh: 100">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Fields for Surat Keterangan Usaha -->
                        <?php if($jenisSurat == 'Surat Keterangan Usaha'): ?>
                        <div class="dynamic-field" style="display: grid; gap: 1rem;">
                            <div>
                                <label for="jenis_usaha" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                    Jenis Usaha <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="text" id="jenis_usaha" name="jenis_usaha" required
                                       value="<?= old('jenis_usaha') ?>"
                                       style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                       placeholder="Contoh: Warung Makan">
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div>
                                    <label for="alamat_usaha" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Alamat Usaha <span style="color: #ef4444;">*</span>
                                    </label>
                                    <textarea id="alamat_usaha" name="alamat_usaha" rows="2" required
                                              style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: inherit; resize: vertical;"
                                              placeholder="Alamat lengkap lokasi usaha"><?= old('alamat_usaha') ?></textarea>
                                </div>
                                <div>
                                    <label for="tanggal_mulai_usaha" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Tanggal Mulai Usaha <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="date" id="tanggal_mulai_usaha" name="tanggal_mulai_usaha" required
                                           value="<?= old('tanggal_mulai_usaha') ?>"
                                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Fields for Surat Keterangan Jual Tanah -->
                        <?php if($jenisSurat == 'Surat Keterangan Jual Tanah'): ?>
                        <div class="dynamic-field" style="display: grid; gap: 1rem;">
                            <div>
                                <label for="lokasi_tanah" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                    Lokasi Tanah yang Dijual <span style="color: #ef4444;">*</span>
                                </label>
                                <textarea id="lokasi_tanah" name="lokasi_tanah" rows="2" required
                                          style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: inherit; resize: vertical;"
                                          placeholder="Alamat lengkap lokasi tanah yang akan dijual"><?= old('lokasi_tanah') ?></textarea>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div>
                                    <label for="luas_tanah" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Luas Tanah (m²) <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="number" id="luas_tanah" name="luas_tanah" required min="1"
                                           value="<?= old('luas_tanah') ?>"
                                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                           placeholder="Contoh: 100">
                                </div>
                                <div>
                                    <label for="nama_pembeli" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                        Nama Pembeli <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="text" id="nama_pembeli" name="nama_pembeli" required
                                           value="<?= old('nama_pembeli') ?>"
                                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;"
                                           placeholder="Nama lengkap pembeli">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Pernyataan -->
            <div class="card" style="background: linear-gradient(135deg, #fef3c7, #fde68a); border-left: 4px solid #f59e0b;">
                <div style="display: flex; align-items: start; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: #f59e0b; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0;">
                        <i class="ri-shield-check-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div style="flex: 1;">
                        <h5 style="color: #92400e; margin-bottom: 0.8rem;">Pernyataan</h5>
                        <div style="display: flex; align-items: start; gap: 0.8rem;">
                            <input type="checkbox" id="pernyataan" required 
                                   style="width: 20px; height: 20px; margin-top: 0.2rem; cursor: pointer;">
                            <label for="pernyataan" style="color: #78350f; font-size: 0.95rem; line-height: 1.6; cursor: pointer;">
                                Saya menyatakan bahwa data yang saya isi adalah benar dan dapat dipertanggungjawabkan. 
                                Saya bersedia menerima sanksi apabila data yang saya berikan tidak sesuai dengan keadaan sebenarnya.
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                <a href="<?= base_url('/surat/ajukan') ?>" class="btn-outline" style="padding: 0.8rem 2rem; text-decoration: none;">
                    <i class="ri-close-line"></i> Batal
                </a>
                <button type="submit" class="btn-primary" style="padding: 0.8rem 2rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-send-plane-fill"></i> Kirim Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Validasi NIK hanya angka
document.getElementById('nik').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Konfirmasi sebelum submit
document.getElementById('formPengajuan').addEventListener('submit', function(e) {
    if(!document.getElementById('pernyataan').checked) {
        e.preventDefault();
        alert('Anda harus menyetujui pernyataan terlebih dahulu');
        return false;
    }
    
    if(!confirm('Apakah Anda yakin data yang diisi sudah benar dan ingin mengirim pengajuan ini?')) {
        e.preventDefault();
        return false;
    }
});
</script>

<?= $this->endSection() ?>
