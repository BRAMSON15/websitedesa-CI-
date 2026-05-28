<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="hero" style="padding-top: 0;">
    <div class="hero-bg-shape"></div>
    <div class="container" style="display: flex; height: 100vh; align-items: center; justify-content: center; z-index: 10; position: relative;">
        <!-- decorative elements -->
        <div style="position: absolute; left: 10%; top: 20%; width: 100px; height: 100px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; filter: blur(20px);"></div>
        <div style="position: absolute; right: 15%; bottom: 15%; width: 150px; height: 150px; background: rgba(79, 70, 229, 0.1); border-radius: 50%; filter: blur(30px);"></div>

        <div class="glass" style="width: 100%; max-width: 500px; padding: 2.5rem; position: relative; z-index: 2; max-height: 90vh; overflow-y: auto;">
            <div style="text-align: center; margin-bottom: 2rem;">
                <div style="width: 64px; height: 64px; background: white; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                    <img src="<?= base_url('logo/image.png') ?>" alt="Logo Desa" style="width: 48px; height: 48px; object-fit: contain;">
                </div>
                <h2 style="font-size: 1.8rem; margin-bottom: 0.5rem; color: var(--dark);">Daftar Akun Masyarakat</h2>
                <p style="color: #64748b; font-size: 0.95rem;">Buat akun untuk mengakses layanan desa</p>
            </div>

            <?php if(session()->getFlashdata('msg')):?>
                <div style="background: #fee2e2; color: #ef4444; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem; text-align: center; font-weight: 500;">
                    <i class="ri-error-warning-line"></i> <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>

            <?php if(session()->getFlashdata('success')):?>
                <div style="background: #d1fae5; color: #10b981; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem; text-align: center; font-weight: 500;">
                    <i class="ri-checkbox-circle-line"></i> <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif;?>

            <form action="<?= base_url('/processRegister') ?>" method="post">
                <div class="form-group">
                    <label class="form-label" style="font-size: 0.9rem;">Nama Lengkap</label>
                    <div style="position: relative;">
                        <i class="ri-user-line" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="text" name="nama" class="form-control" style="padding-left: 2.5rem;" placeholder="Masukkan nama lengkap" required value="<?= old('nama') ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size: 0.9rem;">NIK (Nomor Induk Kependudukan)</label>
                    <div style="position: relative;">
                        <i class="ri-id-card-line" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="text" name="nik" class="form-control" style="padding-left: 2.5rem;" placeholder="Masukkan NIK (16 digit)" required value="<?= old('nik') ?>" maxlength="16" pattern="[0-9]{16}">
                        <small style="color: #94a3b8; font-size: 0.8rem; display: block; margin-top: 0.3rem;">NIK akan digunakan sebagai password login Anda</small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size: 0.9rem;">Username</label>
                    <div style="position: relative;">
                        <i class="ri-at-line" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="text" name="username" class="form-control" style="padding-left: 2.5rem;" placeholder="Masukkan username" required value="<?= old('username') ?>">
                        <small style="color: #94a3b8; font-size: 0.8rem; display: block; margin-top: 0.3rem;">Username hanya boleh mengandung huruf, angka, dan underscore</small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size: 0.9rem;">Email</label>
                    <div style="position: relative;">
                        <i class="ri-mail-line" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="email" name="email" class="form-control" style="padding-left: 2.5rem;" placeholder="Masukkan email" required value="<?= old('email') ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size: 0.9rem;">Nomor Telepon</label>
                    <div style="position: relative;">
                        <i class="ri-phone-line" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="tel" name="no_telepon" class="form-control" style="padding-left: 2.5rem;" placeholder="Masukkan nomor telepon" required value="<?= old('no_telepon') ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size: 0.9rem;">Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Masukkan alamat lengkap" required style="resize: vertical; min-height: 80px;"><?= old('alamat') ?></textarea>
                </div>

                <div class="form-group" style="margin-top: 2.5rem;">
                    <button type="submit" class="btn-primary" style="width: 100%; font-size: 1rem; padding: 0.8rem; display: flex; justify-content: center; align-items: center; gap: 0.5rem;">
                        Daftar Akun <i class="ri-arrow-right-line"></i>
                    </button>
                </div>
            </form>

            <div style="text-align: center; margin-top: 2rem; border-top: 1px solid #e2e8f0; padding-top: 1.5rem;">
                <p style="font-size: 0.9rem; color: #64748b;">Sudah memiliki akun? <br><a href="<?= base_url('/login') ?>" style="color: var(--primary); text-decoration: none; font-weight: 600; display: inline-block; margin-top: 0.5rem;">Masuk sekarang!</a></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
