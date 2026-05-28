<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="dashboard-wrapper">
    <?= $this->include('components/admin_sidebar') ?>

    <div class="main-content">
        <div class="topbar">
            <div>
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Kelola Visi & Misi</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Mengelola visi dan misi Desa Tifu</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/profil/lihat_visimisi') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-eye-line"></i> Lihat</a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-focus-2-line" style="color: var(--primary);"></i> Input Visi & Misi
                </h4>

                <form id="formVisimisi">
                    <div class="form-group">
                        <label class="form-label">Visi Desa</label>
                        <textarea name="visi" class="form-control" rows="5" placeholder="Masukkan visi Desa Tifu..." required><?= $profil['visi'] ?? '' ?></textarea>
                        <small style="color: #64748b; display: block; margin-top: 0.5rem;">
                            <i class="ri-information-line"></i> Visi adalah gambaran masa depan yang ingin dicapai desa
                        </small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Misi Desa</label>
                        <textarea name="misi" class="form-control" rows="5" placeholder="Masukkan misi Desa Tifu..." required><?= $profil['misi'] ?? '' ?></textarea>
                        <small style="color: #64748b; display: block; margin-top: 0.5rem;">
                            <i class="ri-information-line"></i> Misi adalah langkah-langkah untuk mencapai visi
                        </small>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 0.5rem;">
                        <i class="ri-save-line"></i> Simpan Visi & Misi
                    </button>
                </form>
            </div>

            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-eye-line" style="color: var(--primary);"></i> Preview
                </h4>

                <div style="background: #f0f9ff; padding: 1.5rem; border-radius: 8px; border-left: 4px solid var(--primary); margin-bottom: 1.5rem;">
                    <h5 style="color: var(--dark); margin: 0 0 0.5rem 0; font-size: 0.95rem;">Visi</h5>
                    <p id="previewVisi" style="color: #64748b; margin: 0; line-height: 1.6; font-size: 0.9rem;">
                        <?= $profil['visi'] ?? 'Belum ada visi' ?>
                    </p>
                </div>

                <div style="background: #fef3c7; padding: 1.5rem; border-radius: 8px; border-left: 4px solid #f59e0b;">
                    <h5 style="color: var(--dark); margin: 0 0 0.5rem 0; font-size: 0.95rem;">Misi</h5>
                    <p id="previewMisi" style="color: #64748b; margin: 0; line-height: 1.6; font-size: 0.9rem;">
                        <?= $profil['misi'] ?? 'Belum ada misi' ?>
                    </p>
                </div>

                <div style="margin-top: 1.5rem; padding: 1rem; background: #f1f5f9; border-radius: 8px;">
                    <p style="color: #64748b; font-size: 0.85rem; margin: 0;">
                        <i class="ri-information-line"></i> Preview akan diperbarui saat Anda mengetik
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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
        resize: vertical;
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

<script>
    const visiInput = document.querySelector('textarea[name="visi"]');
    const misiInput = document.querySelector('textarea[name="misi"]');
    const previewVisi = document.getElementById('previewVisi');
    const previewMisi = document.getElementById('previewMisi');

    visiInput.addEventListener('input', function() {
        previewVisi.textContent = this.value || 'Belum ada visi';
    });

    misiInput.addEventListener('input', function() {
        previewMisi.textContent = this.value || 'Belum ada misi';
    });

    document.getElementById('formVisimisi').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData);

        try {
            const response = await fetch('<?= base_url('/profil/simpanVisimisi') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
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
</script>

<?= $this->endSection() ?>
