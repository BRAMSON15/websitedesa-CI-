<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
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
    
    .card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }
    
    .btn-outline {
        background: transparent;
        border: 2px solid #6b7280;
        color: #6b7280;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
    }
    
    .btn-outline:hover {
        background: #6b7280;
        color: white;
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
    <form action="<?= base_url('/surat/submit') ?>" method="POST" id="formPengajuan">
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

            <!-- Dynamic Fields Based on Letter Type -->
            <div id="dynamicFields">
                <?php 
                $jenisSurat = $jenis_surat['nama_surat'];
                ?>
                
                <!-- Fields for Surat Keterangan Domisili -->
                <?php if($jenisSurat == 'Surat Keterangan Domisili'): ?>
                <div class="form-group">
                    <label for="tanggal_domisili" class="form-label">Tanggal Mulai Berdomisili <span class="required">*</span></label>
                    <input type="date" id="tanggal_domisili" name="tanggal_domisili" class="form-input" required value="<?= old('tanggal_domisili') ?>">
                </div>
                <?php endif; ?>

                <!-- Fields for Surat Keterangan Nikah -->
                <?php if($jenisSurat == 'Surat Keterangan Nikah'): ?>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nama_pasangan" class="form-label">Nama Calon Pasangan <span class="required">*</span></label>
                        <input type="text" id="nama_pasangan" name="nama_pasangan" class="form-input" required value="<?= old('nama_pasangan') ?>" placeholder="Nama lengkap calon pasangan">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_nikah" class="form-label">Rencana Tanggal Nikah <span class="required">*</span></label>
                        <input type="date" id="tanggal_nikah" name="tanggal_nikah" class="form-input" required value="<?= old('tanggal_nikah') ?>">
                    </div>
                </div>
                <?php endif; ?>

                <!-- Fields for Surat Keterangan Tidak Mampu -->
                <?php if($jenisSurat == 'Surat Keterangan Tidak Mampu'): ?>
                <div class="form-group">
                    <label for="penghasilan" class="form-label">Penghasilan Rata-rata per Bulan <span class="required">*</span></label>
                    <input type="text" id="penghasilan" name="penghasilan" class="form-input" required value="<?= old('penghasilan') ?>" placeholder="Contoh: Rp 500.000">
                </div>
                <?php endif; ?>

                <!-- Fields for Surat Keterangan Kepemilikan Tanah -->
                <?php if($jenisSurat == 'Surat Keterangan Kepemilikan Tanah'): ?>
                <div class="form-group">
                    <label for="lokasi_tanah" class="form-label">Lokasi Tanah <span class="required">*</span></label>
                    <textarea id="lokasi_tanah" name="lokasi_tanah" class="form-textarea" required placeholder="Alamat lengkap lokasi tanah"><?= old('lokasi_tanah') ?></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="luas_tanah" class="form-label">Luas Tanah (m²) <span class="required">*</span></label>
                        <input type="number" id="luas_tanah" name="luas_tanah" class="form-input" required min="1" value="<?= old('luas_tanah') ?>" placeholder="Contoh: 100">
                    </div>
                    <div class="form-group">
                        <label for="bukti_kepemilikan" class="form-label">Bukti Kepemilikan <span class="required">*</span></label>
                        <input type="text" id="bukti_kepemilikan" name="bukti_kepemilikan" class="form-input" required value="<?= old('bukti_kepemilikan') ?>" placeholder="Contoh: Sertifikat HGB">
                    </div>
                </div>
                <?php endif; ?>

                <!-- Fields for Surat Izin Keramaian -->
                <?php if($jenisSurat == 'Surat Izin Keramaian'): ?>
                <div class="form-row">
                    <div class="form-group">
                        <label for="jenis_acara" class="form-label">Jenis Acara <span class="required">*</span></label>
                        <input type="text" id="jenis_acara" name="jenis_acara" class="form-input" required value="<?= old('jenis_acara') ?>" placeholder="Contoh: Pernikahan">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_acara" class="form-label">Tanggal Acara <span class="required">*</span></label>
                        <input type="date" id="tanggal_acara" name="tanggal_acara" class="form-input" required value="<?= old('tanggal_acara') ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="lokasi_acara" class="form-label">Lokasi Acara <span class="required">*</span></label>
                        <input type="text" id="lokasi_acara" name="lokasi_acara" class="form-input" required value="<?= old('lokasi_acara') ?>" placeholder="Alamat lokasi acara">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_undangan" class="form-label">Perkiraan Jumlah Undangan <span class="required">*</span></label>
                        <input type="number" id="jumlah_undangan" name="jumlah_undangan" class="form-input" required min="1" value="<?= old('jumlah_undangan') ?>" placeholder="Contoh: 100">
                    </div>
                </div>
                <?php endif; ?>

                <!-- Fields for Surat Keterangan Usaha -->
                <?php if($jenisSurat == 'Surat Keterangan Usaha'): ?>
                <div class="form-group">
                    <label for="jenis_usaha" class="form-label">Jenis Usaha <span class="required">*</span></label>
                    <input type="text" id="jenis_usaha" name="jenis_usaha" class="form-input" required value="<?= old('jenis_usaha') ?>" placeholder="Contoh: Warung Makan">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="alamat_usaha" class="form-label">Alamat Usaha <span class="required">*</span></label>
                        <textarea id="alamat_usaha" name="alamat_usaha" class="form-textarea" required placeholder="Alamat lengkap lokasi usaha"><?= old('alamat_usaha') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai_usaha" class="form-label">Tanggal Mulai Usaha <span class="required">*</span></label>
                        <input type="date" id="tanggal_mulai_usaha" name="tanggal_mulai_usaha" class="form-input" required value="<?= old('tanggal_mulai_usaha') ?>">
                    </div>
                </div>
                <?php endif; ?>

                <!-- Fields for Surat Keterangan Jual Tanah -->
                <?php if($jenisSurat == 'Surat Keterangan Jual Tanah'): ?>
                <div class="form-group">
                    <label for="lokasi_tanah" class="form-label">Lokasi Tanah yang Dijual <span class="required">*</span></label>
                    <textarea id="lokasi_tanah" name="lokasi_tanah" class="form-textarea" required placeholder="Alamat lengkap lokasi tanah yang akan dijual"><?= old('lokasi_tanah') ?></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="luas_tanah" class="form-label">Luas Tanah (m²) <span class="required">*</span></label>
                        <input type="number" id="luas_tanah" name="luas_tanah" class="form-input" required min="1" value="<?= old('luas_tanah') ?>" placeholder="Contoh: 100">
                    </div>
                    <div class="form-group">
                        <label for="nama_pembeli" class="form-label">Nama Pembeli <span class="required">*</span></label>
                        <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-input" required value="<?= old('nama_pembeli') ?>" placeholder="Nama lengkap pembeli">
                    </div>
                </div>
                <?php endif; ?>
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
                    <div class="checkbox-group">
                        <input type="checkbox" id="pernyataan" required>
                        <label for="pernyataan" style="color: #78350f; font-size: 0.95rem; line-height: 1.6; cursor: pointer;">
                            Saya menyatakan bahwa data yang saya isi adalah benar dan dapat dipertanggungjawabkan. 
                            Saya bersedia menerima sanksi apabila data yang saya berikan tidak sesuai dengan keadaan sebenarnya.
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="btn-actions">
            <a href="<?= base_url('/surat/ajukan') ?>" class="btn-outline">
                <i class="ri-close-line"></i> Batal
            </a>
            <button type="submit" class="btn-primary">
                <i class="ri-send-plane-fill"></i> Kirim Pengajuan
            </button>
        </div>
    </form>
</div>

<script>
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
</script>

<?= $this->endSection() ?>