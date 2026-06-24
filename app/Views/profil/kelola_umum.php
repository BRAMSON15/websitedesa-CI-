<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="dashboard-wrapper">
    <?= $this->include('components/admin_sidebar') ?>

    <div class="main-content">
        <div class="topbar">
            <div>
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Kelola Profil Desa</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Mengelola informasi umum dan sejarah Desa Tifu</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/profil/lihat') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-eye-line"></i> Lihat</a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-history-line" style="color: var(--primary);"></i> Input Sejarah Desa
                </h4>

                <form id="formProfil" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label">Sejarah Desa Tifu</label>
                        <textarea name="sejarah" class="form-control" rows="6" placeholder="Masukkan sejarah Desa Tifu..." required><?= $profil['sejarah'] ?? '' ?></textarea>
                        <small style="color: #64748b; display: block; margin-top: 0.5rem;">
                            <i class="ri-information-line"></i> Ceritakan sejarah, asal-usul, dan perkembangan Desa Tifu
                        </small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Gambar Sejarah Desa</label>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            <div style="position: relative; border: 2px dashed #e2e8f0; border-radius: 6px; padding: 2rem; text-align: center; cursor: pointer; transition: all 0.3s; background: #f8fafc;" id="uploadArea">
                                <input type="file" name="gambar_sejarah" id="gambarSejarah" class="form-control" style="display: none;" accept="image/*">
                                <div id="uploadPlaceholder" style="pointer-events: none;">
                                    <i class="ri-image-add-line" style="font-size: 2.5rem; color: var(--primary); display: block; margin-bottom: 0.5rem;"></i>
                                    <p style="color: var(--dark); font-weight: 500; margin: 0.5rem 0;">Klik atau drag gambar ke sini</p>
                                    <p style="color: #94a3b8; font-size: 0.85rem; margin: 0;">Format: JPG, PNG | Ukuran maks: 2MB</p>
                                </div>
                                <div id="uploadPreview" style="display: none; pointer-events: none;">
                                    <img id="previewImg" style="max-width: 100%; max-height: 200px; border-radius: 4px;">
                                    <p id="fileName" style="color: #64748b; margin-top: 0.5rem; font-size: 0.85rem;"></p>
                                </div>
                            </div>
                            <?php if(!empty($profil['gambar_sejarah']) && file_exists(FCPATH . 'uploads/sejarah/' . $profil['gambar_sejarah'])): ?>
                            <div style="background: #f0fdf4; padding: 0.75rem; border-radius: 6px; border-left: 4px solid var(--primary); display: flex; align-items: center; gap: 0.75rem;">
                                <i class="ri-check-circle-line" style="color: var(--primary); font-size: 1.2rem;"></i>
                                <div>
                                    <p style="color: var(--primary); font-weight: 500; margin: 0; font-size: 0.9rem;">Gambar saat ini</p>
                                    <p style="color: #65a30d; font-size: 0.8rem; margin: 0.2rem 0 0 0;"><?= $profil['gambar_sejarah'] ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <small style="color: #64748b; display: block; margin-top: 0.5rem;">
                            <i class="ri-information-line"></i> Upload gambar untuk mengilustrasikan sejarah desa
                        </small>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 0.5rem;">
                        <i class="ri-save-line"></i> Simpan Profil Desa
                    </button>
                </form>
            </div>

            <div class="card">
                <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-eye-line" style="color: var(--primary);"></i> Preview Sejarah
                </h4>

                <div style="background: #f1f5f9; padding: 1.5rem; border-radius: 8px; border-left: 4px solid var(--primary); max-height: 400px; overflow-y: auto;">
                    <p id="previewSejarah" style="color: #64748b; margin: 0; line-height: 1.8; font-size: 0.95rem;">
                        <?= $profil['sejarah'] ?? 'Belum ada sejarah yang ditetapkan' ?>
                    </p>
                </div>

                <div style="margin-top: 1.5rem; padding: 1rem; background: #f0f9ff; border-radius: 8px; border-left: 4px solid var(--primary);">
                    <p style="color: #0369a1; font-size: 0.85rem; margin: 0;">
                        <i class="ri-information-line"></i> Informasi Desa Tifu: Pulau Buru, Maluku, Indonesia
                    </p>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 2rem;">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ri-links-line" style="color: var(--primary);"></i> Navigasi Cepat
            </h4>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <a href="<?= base_url('/profil/kelola_visimisi') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05)); border-radius: 8px; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(16, 185, 129, 0.2);" onmouseover="this.style.background='linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(16, 185, 129, 0.1))'" onmouseout="this.style.background='linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05))'">
                    <div style="width: 40px; height: 40px; background: var(--primary); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="ri-focus-2-line"></i>
                    </div>
                    <div>
                        <p style="color: var(--dark); font-weight: 600; margin: 0; font-size: 0.95rem;">Kelola Visi & Misi</p>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Atur visi dan misi</p>
                    </div>
                </a>

                <a href="<?= base_url('/profil/lihat') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.05)); border-radius: 8px; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(245, 158, 11, 0.2);" onmouseover="this.style.background='linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(245, 158, 11, 0.1))'" onmouseout="this.style.background='linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.05))'">
                    <div style="width: 40px; height: 40px; background: #f59e0b; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="ri-home-smile-line"></i>
                    </div>
                    <div>
                        <p style="color: var(--dark); font-weight: 600; margin: 0; font-size: 0.95rem;">Lihat Profil Desa</p>
                        <p style="color: #64748b; font-size: 0.85rem; margin: 0.3rem 0 0 0;">Tampilan publik</p>
                    </div>
                </a>
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
    const sejarahInput = document.querySelector('textarea[name="sejarah"]');
    const previewSejarah = document.getElementById('previewSejarah');
    const uploadArea = document.getElementById('uploadArea');
    const gambarInput = document.getElementById('gambarSejarah');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const uploadPreview = document.getElementById('uploadPreview');
    const previewImg = document.getElementById('previewImg');
    const fileName = document.getElementById('fileName');

    sejarahInput.addEventListener('input', function() {
        previewSejarah.textContent = this.value || 'Belum ada sejarah yang ditetapkan';
    });

    // Upload area click handler
    uploadArea.addEventListener('click', () => gambarInput.click());

    // Drag and drop handlers
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = 'var(--primary)';
        uploadArea.style.background = 'rgba(16, 185, 129, 0.05)';
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.style.borderColor = '#e2e8f0';
        uploadArea.style.background = '#f8fafc';
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#e2e8f0';
        uploadArea.style.background = '#f8fafc';
        
        const files = e.dataTransfer.files;
        if(files.length > 0) {
            gambarInput.files = files;
            handleFileSelect();
        }
    });

    // File input change handler
    gambarInput.addEventListener('change', handleFileSelect);

    function handleFileSelect() {
        const file = gambarInput.files[0];
        
        if(!file) return;

        // Validasi tipe file
        if(!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
            alert('Format file tidak didukung. Gunakan JPG atau PNG.');
            gambarInput.value = '';
            return;
        }

        // Validasi ukuran file (2MB)
        if(file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            gambarInput.value = '';
            return;
        }

        // Tampilkan preview
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImg.src = e.target.result;
            fileName.textContent = file.name;
            uploadPlaceholder.style.display = 'none';
            uploadPreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }

    document.getElementById('formProfil').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch('<?= base_url('/profil/simpanProfil') ?>', {
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
</script>

<?= $this->endSection() ?>
