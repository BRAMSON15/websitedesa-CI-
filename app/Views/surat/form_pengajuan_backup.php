<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Surat - SIDESA</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: #f1f5f9;
            color: #1e293b;
            line-height: 1.6;
        }
        
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .header {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .form-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #374151;
        }
        
        .required {
            color: #ef4444;
        }
        
        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 16px;
            background: white;
            color: #1f2937;
            transition: border-color 0.2s;
        }
        
        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            border: none;
            font-size: 16px;
        }
        
        .btn-primary {
            background: #3b82f6;
            color: white;
        }
        
        .btn-primary:hover {
            background: #2563eb;
        }
        
        .btn-secondary {
            background: #6b7280;
            color: white;
        }
        
        .btn-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }
        
        .checkbox-group {
            display: flex;
            align-items: start;
            gap: 0.75rem;
        }
        
        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-top: 2px;
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .btn-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1 style="color: #1e293b; margin-bottom: 0.5rem;">Form Pengajuan Surat</h1>
            <p style="color: #64748b;"><?= esc($jenis_surat['nama_surat']) ?></p>
            <div style="margin-top: 1rem;">
                <a href="<?= base_url('/surat/ajukan') ?>" class="btn btn-secondary">
                    <i class="ri-arrow-left-line"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Error Messages -->
        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <i class="ri-error-warning-line"></i>
            <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-error">
            <strong>Terdapat kesalahan:</strong>
            <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="<?= base_url('/surat/submit') ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="id_jenis" value="<?= $jenis_surat['id_jenis'] ?>">

            <div class="form-card">
                <h3 style="margin-bottom: 1.5rem; color: #1e293b;">
                    <i class="ri-file-edit-line" style="color: #3b82f6;"></i> Informasi Pengajuan
                </h3>

                <!-- Nama Pemohon -->
                <div class="form-group">
                    <label class="form-label">Nama Pemohon <span class="required">*</span></label>
                    <input type="text" class="form-input" value="<?= esc($nama) ?>" disabled style="background: #f9fafb; color: #6b7280;">
                    <small style="color: #6b7280;">Data diambil dari profil Anda</small>
                </div>

                <!-- Jenis Surat -->
                <div class="form-group">
                    <label class="form-label">Jenis Surat <span class="required">*</span></label>
                    <input type="text" class="form-input" value="<?= esc($jenis_surat['nama_surat']) ?>" disabled style="background: #f9fafb; color: #6b7280;">
                </div>

                <!-- Keperluan -->
                <div class="form-group">
                    <label for="keperluan" class="form-label">Keperluan / Tujuan Surat <span class="required">*</span></label>
                    <textarea id="keperluan" name="keperluan" class="form-textarea" required placeholder="Jelaskan keperluan atau tujuan pembuatan surat ini..."><?= old('keperluan') ?></textarea>
                    <small style="color: #6b7280;">Minimal 10 karakter</small>
                </div>

                <!-- Alamat -->
                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat Lengkap <span class="required">*</span></label>
                    <textarea id="alamat" name="alamat" class="form-textarea" required placeholder="Masukkan alamat lengkap sesuai KTP..."><?= old('alamat') ?></textarea>
                </div>

                <!-- NIK -->
                <div class="form-group">
                    <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan) <span class="required">*</span></label>
                    <input type="text" id="nik" name="nik" class="form-input" required maxlength="16" pattern="[0-9]{16}" value="<?= old('nik') ?>" placeholder="Masukkan 16 digit NIK">
                    <small style="color: #6b7280;">16 digit angka sesuai KTP</small>
                </div>

                <!-- Tempat & Tanggal Lahir -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="required">*</span></label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-input" required value="<?= old('tempat_lahir') ?>" placeholder="Contoh: Jakarta">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="required">*</span></label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-input" required value="<?= old('tanggal_lahir') ?>">
                    </div>
                </div>

                <!-- Jenis Kelamin & Pekerjaan -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="required">*</span></label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan" class="form-label">Pekerjaan <span class="required">*</span></label>
                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-input" required value="<?= old('pekerjaan') ?>" placeholder="Contoh: Wiraswasta">
                    </div>
                </div>

                <!-- Agama & Status Perkawinan -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="agama" class="form-label">Agama <span class="required">*</span></label>
                        <select id="agama" name="agama" class="form-select" required>
                            <option value="">Pilih Agama</option>
                            <option value="Islam" <?= old('agama') == 'Islam' ? 'selected' : '' ?>>Islam</option>
                            <option value="Kristen" <?= old('agama') == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                            <option value="Katolik" <?= old('agama') == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                            <option value="Hindu" <?= old('agama') == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                            <option value="Buddha" <?= old('agama') == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                            <option value="Konghucu" <?= old('agama') == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan <span class="required">*</span></label>
                        <select id="status_perkawinan" name="status_perkawinan" class="form-select" required>
                            <option value="">Pilih Status</option>
                            <option value="Belum Kawin" <?= old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                            <option value="Kawin" <?= old('status_perkawinan') == 'Kawin' ? 'selected' : '' ?>>Kawin</option>
                            <option value="Cerai Hidup" <?= old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' ?>>Cerai Hidup</option>
                            <option value="Cerai Mati" <?= old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' ?>>Cerai Mati</option>
                        </select>
                    </div>
                </div>

                <!-- Keterangan Tambahan -->
                <div class="form-group">
                    <label for="keterangan_tambahan" class="form-label">Keterangan Tambahan (Opsional)</label>
                    <textarea id="keterangan_tambahan" name="keterangan_tambahan" class="form-textarea" placeholder="Informasi tambahan jika diperlukan..."><?= old('keterangan_tambahan') ?></textarea>
                </div>

                    <!-- Tempat Lahir -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label for="tempat_lahir" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Tempat Lahir <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" required
                                   value="<?= old('tempat_lahir') ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; pointer-events: auto; user-select: text; -webkit-user-select: text; -moz-user-select: text; -ms-user-select: text; background: white; color: var(--dark);"
                                   placeholder="Contoh: Jakarta">
                        </div>
                        <div>
                            <label for="tanggal_lahir" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Tanggal Lahir <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                   value="<?= old('tanggal_lahir') ?>"
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; pointer-events: auto; user-select: text; -webkit-user-select: text; -moz-user-select: text; -ms-user-select: text; background: white; color: var(--dark);">
                        </div>
                    </div>

                    <!-- Jenis Kelamin & Pekerjaan -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label for="jenis_kelamin" style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                                Jenis Kelamin <span style="color: #ef4444;">*</span>
                            </label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required
                                    style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; pointer-events: auto; user-select: text; -webkit-user-select: text; -moz-user-select: text; -ms-user-select: text; background: white; color: var(--dark);">
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
                                   style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; pointer-events: auto; user-select: text; -webkit-user-select: text; -moz-user-select: text; -ms-user-select: text; background: white; color: var(--dark);"
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
                                    style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; pointer-events: auto; user-select: text; -webkit-user-select: text; -moz-user-select: text; -ms-user-select: text; background: white; color: var(--dark);">
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
                                    style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; pointer-events: auto; user-select: text; -webkit-user-select: text; -moz-user-select: text; -ms-user-select: text; background: white; color: var(--dark);">
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
                                  style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; font-family: inherit; resize: vertical; pointer-events: auto; user-select: text; -webkit-user-select: text; -moz-user-select: text; -ms-user-select: text; background: white; color: var(--dark);"
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
// Ensure all form inputs are properly interactive
document.addEventListener('DOMContentLoaded', function() {
    // Remove any potential CSS that might block input interaction
    const inputs = document.querySelectorAll('input, textarea, select');
    inputs.forEach(function(input) {
        input.style.pointerEvents = 'auto';
        input.style.userSelect = 'text';
        input.style.webkitUserSelect = 'text';
        input.style.mozUserSelect = 'text';
        input.style.msUserSelect = 'text';
        
        // Ensure inputs are not readonly unless explicitly set
        if (!input.hasAttribute('readonly') && !input.disabled) {
            input.removeAttribute('readonly');
        }
        
        // Add focus event to ensure input works
        input.addEventListener('focus', function() {
            this.style.outline = '2px solid var(--primary)';
            this.style.outlineOffset = '2px';
        });
        
        input.addEventListener('blur', function() {
            this.style.outline = 'none';
        });
    });
    
    // Fix for any overlay issues
    const form = document.getElementById('formPengajuan');
    if (form) {
        form.style.position = 'relative';
        form.style.zIndex = '1';
    }
});

// Validasi NIK hanya angka
document.addEventListener('DOMContentLoaded', function() {
    const nikInput = document.getElementById('nik');
    if (nikInput) {
        nikInput.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    }
});

// Konfirmasi sebelum submit
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formPengajuan');
    if (form) {
        form.addEventListener('submit', function(e) {
            const pernyataan = document.getElementById('pernyataan');
            if (pernyataan && !pernyataan.checked) {
                e.preventDefault();
                alert('Anda harus menyetujui pernyataan terlebih dahulu');
                return false;
            }
            
            if(!confirm('Apakah Anda yakin data yang diisi sudah benar dan ingin mengirim pengajuan ini?')) {
                e.preventDefault();
                return false;
            }
        });
    }
});

// Debug function to check form interactivity
function debugFormInputs() {
    const inputs = document.querySelectorAll('input, textarea, select');
    console.log('Total form inputs found:', inputs.length);
    inputs.forEach(function(input, index) {
        console.log(`Input ${index + 1}:`, {
            id: input.id,
            name: input.name,
            type: input.type,
            disabled: input.disabled,
            readonly: input.readOnly,
            style: window.getComputedStyle(input).pointerEvents
        });
    });
}

// Call debug function (remove in production)
// debugFormInputs();
</script>

<?= $this->endSection() ?>
