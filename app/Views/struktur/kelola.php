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
            <li><a href="<?= base_url('/peta/kelola') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Peta Administrasi</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/profil/kelola_umum') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/kelola') ?>" class="active"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Struktur Desa</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Kelola Struktur Desa</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Manajemen data perangkat dan struktur desa</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <button onclick="openModal('addModal')" class="btn-primary" style="padding: 0.6rem 1.2rem; display: flex; align-items: center; gap: 0.5rem; border: none; cursor: pointer;">
                    <i class="ri-user-add-line"></i> Tambah Perangkat
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
            <div style="padding: 1.5rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--dark); display: flex; align-items: center; gap: 0.5rem; margin: 0;">
                    <i class="ri-organization-chart" style="color: var(--primary);"></i> 
                    Daftar Perangkat Desa
                </h4>
            </div>

            <?php if(empty($struktur_list)): ?>
            <div style="padding: 3rem 0; text-align: center; color: #94a3b8;">
                <div style="width: 80px; height: 80px; background: #f8fafc; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-group-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem;">Belum Ada Data Struktur Desa</h5>
                <p style="font-size: 0.95rem; margin-bottom: 1.5rem;">Mulai tambahkan perangkat desa baru</p>
                <button onclick="openModal('addModal')" class="btn-primary" style="padding: 0.6rem 1.5rem; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-add-line"></i> Tambah Data Pertama
                </button>
            </div>
            <?php else: ?>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600; width: 50px;">No</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">Nama</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">Jabatan</th>
                            <th style="padding: 1rem; text-align: center; color: var(--dark); font-weight: 600; width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($struktur_list as $index => $item): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='white'">
                            <td style="padding: 1rem; color: #64748b;"><?= $index + 1 ?></td>
                            <td style="padding: 1rem; font-weight: 500; color: var(--dark);"><?= esc($item['nama']) ?></td>
                            <td style="padding: 1rem; color: #64748b;">
                                <span style="background: #e0e7ff; color: #4338ca; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                                    <?= esc($item['jabatan']) ?>
                                </span>
                            </td>
                            <td style="padding: 1rem; text-align: center;">
                                <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                    <button onclick="openEditModal(<?= $item['id_struktur'] ?>, '<?= esc(addslashes($item['nama'])) ?>', '<?= esc(addslashes($item['jabatan'])) ?>')" class="btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.85rem; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 0.3rem;">
                                        <i class="ri-edit-line"></i> Edit
                                    </button>
                                    <a href="<?= base_url('/struktur/hapus/' . $item['id_struktur']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" style="padding: 0.4rem 0.8rem; background: #ef4444; color: white; border-radius: 6px; text-decoration: none; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 0.3rem;">
                                        <i class="ri-delete-bin-line"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div id="addModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: white; padding: 2rem; border-radius: 12px; width: 100%; max-width: 500px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h4 style="margin: 0; color: var(--dark);">Tambah Perangkat Desa</h4>
            <button onclick="closeModal('addModal')" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #64748b;">&times;</button>
        </div>
        <form action="<?= base_url('/struktur/simpan') ?>" method="POST">
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: var(--dark); font-weight: 500;">Nama Lengkap</label>
                <input type="text" name="nama" required style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: var(--dark); font-weight: 500;">Jabatan</label>
                <input type="text" name="jabatan" required placeholder="Contoh: Kepala Desa, Sekretaris, dll" style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;">
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 1rem;">
                <button type="button" onclick="closeModal('addModal')" style="padding: 0.6rem 1.2rem; background: #f1f5f9; color: #64748b; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">Batal</button>
                <button type="submit" class="btn-primary" style="padding: 0.6rem 1.2rem; border: none; cursor: pointer; font-weight: 500;">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: white; padding: 2rem; border-radius: 12px; width: 100%; max-width: 500px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h4 style="margin: 0; color: var(--dark);">Edit Perangkat Desa</h4>
            <button onclick="closeModal('editModal')" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #64748b;">&times;</button>
        </div>
        <form id="editForm" method="POST">
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: var(--dark); font-weight: 500;">Nama Lengkap</label>
                <input type="text" id="editNama" name="nama" required style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: var(--dark); font-weight: 500;">Jabatan</label>
                <input type="text" id="editJabatan" name="jabatan" required style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;">
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 1rem;">
                <button type="button" onclick="closeModal('editModal')" style="padding: 0.6rem 1.2rem; background: #f1f5f9; color: #64748b; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">Batal</button>
                <button type="submit" class="btn-primary" style="padding: 0.6rem 1.2rem; border: none; cursor: pointer; font-weight: 500;">Update Data</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = 'flex';
    }
    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }
    function openEditModal(id, nama, jabatan) {
        document.getElementById('editForm').action = '<?= base_url('/struktur/update/') ?>' + id;
        document.getElementById('editNama').value = nama;
        document.getElementById('editJabatan').value = jabatan;
        openModal('editModal');
    }
</script>

<?= $this->endSection() ?>
