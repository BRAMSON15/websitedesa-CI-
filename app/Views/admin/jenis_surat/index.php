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
            <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem; margin-top: 1rem;">Menu Admin</p>
        </div>
        
        <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; padding-right: 0.5rem;">
            <li><a href="<?= base_url('/dashboard') ?>"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li><a href="<?= base_url('/penduduk') ?>"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
            <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
            <li><a href="<?= base_url('/jenis-surat/kelola') ?>" class="active"><i class="ri-file-list-3-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Jenis Surat</a></li>
            <li><a href="<?= base_url('/template') ?>"><i class="ri-file-edit-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Template Surat</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Kelola Jenis Surat</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Kelola jenis-jenis surat yang dapat diajukan oleh masyarakat</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <button onclick="openModal()" class="btn-primary" style="display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-add-line"></i> Tambah Jenis Surat
                </button>
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); cursor: pointer;">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <?php if(session()->getFlashdata('success')): ?>
        <div style="background: #d1fae5; border-left: 4px solid #10b981; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem;">
            <i class="ri-checkbox-circle-line" style="font-size: 1.5rem; color: #10b981;"></i>
            <p style="color: #065f46; margin: 0;"><?= session()->getFlashdata('success') ?></p>
        </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
        <div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem;">
            <i class="ri-error-warning-line" style="font-size: 1.5rem; color: #ef4444;"></i>
            <p style="color: #991b1b; margin: 0;"><?= session()->getFlashdata('error') ?></p>
        </div>
        <?php endif; ?>

        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <th style="padding: 1.2rem 1.5rem; text-align: left; font-size: 0.85rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; width: 5%;">No</th>
                            <th style="padding: 1.2rem 1.5rem; text-align: left; font-size: 0.85rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; width: 30%;">Nama Surat</th>
                            <th style="padding: 1.2rem 1.5rem; text-align: left; font-size: 0.85rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; width: 50%;">Deskripsi / Persyaratan</th>
                            <th style="padding: 1.2rem 1.5rem; text-align: center; font-size: 0.85rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($jenis_surat_list as $js): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='white'">
                            <td style="padding: 1.2rem 1.5rem; color: #64748b;"><?= $no++ ?></td>
                            <td style="padding: 1.2rem 1.5rem; font-weight: 500; color: var(--dark);">
                                <?= esc($js['nama_surat']) ?>
                            </td>
                            <td style="padding: 1.2rem 1.5rem; color: #475569; font-size: 0.9rem;">
                                <?= esc($js['template']) ?>
                            </td>
                            <td style="padding: 1.2rem 1.5rem;">
                                <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                    <button onclick='editJenisSurat(<?= json_encode($js) ?>)' 
                                            class="btn-outline" 
                                            style="padding: 0.4rem 0.8rem; font-size: 0.85rem;" 
                                            title="Edit">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <button onclick="confirmDelete(<?= $js['id_jenis'] ?>)" 
                                            class="btn-outline" 
                                            style="padding: 0.4rem 0.8rem; font-size: 0.85rem; color: #ef4444; border-color: #fca5a5;" 
                                            title="Hapus">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php if(empty($jenis_surat_list)): ?>
                        <tr>
                            <td colspan="4" style="padding: 3rem 1.5rem; text-align: center; color: #64748b;">
                                <div style="width: 60px; height: 60px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                    <i class="ri-file-list-3-line" style="font-size: 1.8rem; color: #94a3b8;"></i>
                                </div>
                                Belum ada data jenis surat.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Form -->
<div id="formModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div class="card" style="width: 100%; max-width: 500px; margin: 1rem; position: relative; animation: slideUp 0.3s ease-out;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">
            <h4 id="modalTitle" style="color: var(--dark); margin: 0;">Tambah Jenis Surat</h4>
            <button onclick="closeModal()" style="background: none; border: none; font-size: 1.5rem; color: #94a3b8; cursor: pointer; padding: 0;">
                <i class="ri-close-line"></i>
            </button>
        </div>
        
        <form id="jenisSuratForm" action="<?= base_url('/jenis-surat/simpan') ?>" method="POST">
            <?= csrf_field() ?>
            
            <div class="form-group" style="margin-bottom: 1.2rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #475569; font-weight: 500; font-size: 0.95rem;">Nama Surat</label>
                <input type="text" name="nama_surat" id="nama_surat" class="form-control" required placeholder="Contoh: Surat Keterangan Domisili" style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 8px;">
            </div>
            
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #475569; font-weight: 500; font-size: 0.95rem;">Deskripsi & Persyaratan</label>
                <textarea name="template" id="template" class="form-control" rows="4" required placeholder="Deskripsikan fungsi surat ini dan persyaratan yang dibutuhkan untuk pengajuan." style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 8px; resize: vertical;"></textarea>
                <small style="color: #64748b; font-size: 0.8rem; margin-top: 0.3rem; display: block;">Catatan: Isi deskripsi ini akan tampil di menu Ajukan Surat masyarakat.</small>
            </div>
            
            <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
                <button type="button" onclick="closeModal()" class="btn-outline" style="padding: 0.8rem 1.5rem;">Batal</button>
                <button type="submit" class="btn-primary" style="padding: 0.8rem 1.5rem;">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<style>
@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<script>
function openModal() {
    document.getElementById('modalTitle').textContent = 'Tambah Jenis Surat';
    document.getElementById('jenisSuratForm').action = '<?= base_url('/jenis-surat/simpan') ?>';
    document.getElementById('nama_surat').value = '';
    document.getElementById('template').value = '';
    document.getElementById('formModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('formModal').style.display = 'none';
}

function editJenisSurat(data) {
    document.getElementById('modalTitle').textContent = 'Edit Jenis Surat';
    document.getElementById('jenisSuratForm').action = '<?= base_url('/jenis-surat/update/') ?>' + data.id_jenis;
    document.getElementById('nama_surat').value = data.nama_surat;
    document.getElementById('template').value = data.template;
    document.getElementById('formModal').style.display = 'flex';
}

function confirmDelete(id) {
    if(confirm('Apakah Anda yakin ingin menghapus jenis surat ini? Data surat yang terhubung mungkin akan ikut terhapus atau menyebabkan error.')) {
        window.location.href = '<?= base_url('/jenis-surat/hapus/') ?>' + id;
    }
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('formModal');
    if (event.target == modal) {
        closeModal();
    }
}
</script>
<?= $this->endSection() ?>
