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
            <li><a href="<?= base_url('/penduduk') ?>" class="active"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
            <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Data Penduduk</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Kelola data penduduk desa</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/penduduk/tambah') ?>" class="btn-primary" style="padding: 0.6rem 1.2rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-user-add-line"></i> Tambah Penduduk
                </a>
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

        <!-- Statistics Card -->
        <div class="card" style="background: linear-gradient(135deg, #eff6ff, #dbeafe); border-left: 4px solid #3b82f6; margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 60px; height: 60px; background: #3b82f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="ri-team-line" style="font-size: 2rem;"></i>
                </div>
                <div>
                    <p style="color: #1e40af; font-size: 0.9rem; margin-bottom: 0.3rem;">Total Penduduk Terdaftar</p>
                    <h3 style="color: #1e40af; margin: 0; font-size: 2rem;"><?= number_format($total_penduduk) ?></h3>
                </div>
            </div>
        </div>

        <!-- Search & Filter -->
        <div class="card" style="margin-bottom: 1.5rem;">
            <form action="<?= base_url('/penduduk/cari') ?>" method="GET" style="display: flex; gap: 1rem; align-items: end;">
                <div style="flex: 1;">
                    <label style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">
                        Cari Penduduk
                    </label>
                    <input type="text" name="keyword" value="<?= isset($keyword) ? esc($keyword) : '' ?>" 
                           placeholder="Cari berdasarkan nama, NIK, atau alamat..."
                           style="width: 100%; padding: 0.8rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem;">
                </div>
                <button type="submit" class="btn-primary" style="padding: 0.8rem 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-search-line"></i> Cari
                </button>
                <?php if(isset($keyword)): ?>
                <a href="<?= base_url('/penduduk') ?>" class="btn-outline" style="padding: 0.8rem 1rem; text-decoration: none;">
                    <i class="ri-close-line"></i> Reset
                </a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Data Table -->
        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="padding: 1.5rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--dark); display: flex; align-items: center; gap: 0.5rem; margin: 0;">
                    <i class="ri-file-list-3-line" style="color: var(--primary);"></i> 
                    <?= isset($keyword) ? 'Hasil Pencarian: "' . esc($keyword) . '"' : 'Daftar Penduduk' ?>
                </h4>
                <span style="color: #64748b; font-size: 0.9rem;">
                    <?= isset($keyword) ? count($penduduk_list) : $total_penduduk ?> data
                </span>
            </div>

            <?php if(empty($penduduk_list)): ?>
            <div style="padding: 3rem 0; text-align: center; color: #94a3b8;">
                <div style="width: 80px; height: 80px; background: #f8fafc; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-user-forbid-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem;">
                    <?= isset($keyword) ? 'Tidak Ada Hasil' : 'Belum Ada Data Penduduk' ?>
                </h5>
                <p style="font-size: 0.95rem; margin-bottom: 1.5rem;">
                    <?= isset($keyword) ? 'Coba kata kunci lain atau reset pencarian' : 'Mulai tambahkan data penduduk baru' ?>
                </p>
                <?php if(!isset($keyword)): ?>
                <a href="<?= base_url('/penduduk/tambah') ?>" class="btn-primary" style="text-decoration: none; padding: 0.6rem 1.5rem; display: inline-block;">
                    <i class="ri-add-line"></i> Tambah Penduduk Pertama
                </a>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">No</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">NIK</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">Nama</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">TTL</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">Jenis Kelamin</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">Pekerjaan</th>
                            <th style="padding: 1rem; text-align: center; color: var(--dark); font-weight: 600;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($penduduk_list as $index => $penduduk): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" 
                            onmouseover="this.style.background='#f8fafc'" 
                            onmouseout="this.style.background='white'">
                            <td style="padding: 1rem; color: #64748b;"><?= ($pager->getCurrentPage() - 1) * $pager->getPerPage() + $index + 1 ?></td>
                            <td style="padding: 1rem;">
                                <span style="font-family: monospace; color: var(--dark); font-weight: 600;"><?= esc($penduduk['nik']) ?></span>
                            </td>
                            <td style="padding: 1rem;">
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary), #818cf8); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0;">
                                        <i class="ri-user-line"></i>
                                    </div>
                                    <div>
                                        <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= esc($penduduk['nama']) ?></p>
                                        <p style="color: #64748b; font-size: 0.85rem; margin: 0;"><?= esc($penduduk['status']) ?></p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 1rem; color: #64748b;"><?= esc($penduduk['ttl']) ?></td>
                            <td style="padding: 1rem;">
                                <span style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.3rem 0.8rem; background: <?= $penduduk['jenis_kelamin'] == 'Laki-laki' ? '#dbeafe' : '#fce7f3' ?>; color: <?= $penduduk['jenis_kelamin'] == 'Laki-laki' ? '#1e40af' : '#be185d' ?>; border-radius: 15px; font-size: 0.85rem; font-weight: 600;">
                                    <i class="<?= $penduduk['jenis_kelamin'] == 'Laki-laki' ? 'ri-men-line' : 'ri-women-line' ?>"></i>
                                    <?= esc($penduduk['jenis_kelamin']) ?>
                                </span>
                            </td>
                            <td style="padding: 1rem; color: #64748b;"><?= esc($penduduk['pekerjaan']) ?></td>
                            <td style="padding: 1rem; text-align: center;">
                                <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                    <a href="<?= base_url('/penduduk/detail/' . $penduduk['nik']) ?>" 
                                       class="btn-outline" 
                                       style="padding: 0.4rem 0.8rem; text-decoration: none; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 0.3rem;">
                                        <i class="ri-eye-line"></i> Detail
                                    </a>
                                    <a href="<?= base_url('/penduduk/edit/' . $penduduk['nik']) ?>" 
                                       class="btn-primary" 
                                       style="padding: 0.4rem 0.8rem; text-decoration: none; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 0.3rem;">
                                        <i class="ri-edit-line"></i> Edit
                                    </a>
                                    <button onclick="confirmDelete('<?= $penduduk['nik'] ?>', '<?= esc($penduduk['nama']) ?>')" 
                                            style="padding: 0.4rem 0.8rem; background: #ef4444; color: white; border: none; border-radius: 6px; font-size: 0.85rem; cursor: pointer; display: inline-flex; align-items: center; gap: 0.3rem; transition: background 0.2s;"
                                            onmouseover="this.style.background='#dc2626'" 
                                            onmouseout="this.style.background='#ef4444'">
                                        <i class="ri-delete-bin-line"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if($pager->getPageCount() > 1): ?>
            <div style="padding: 1.5rem; border-top: 1px solid #f1f5f9; display: flex; justify-content: between; align-items: center;">
                <div style="color: #64748b; font-size: 0.9rem;">
                    Menampilkan <?= ($pager->getCurrentPage() - 1) * $pager->getPerPage() + 1 ?> - 
                    <?= min($pager->getCurrentPage() * $pager->getPerPage(), $total_penduduk) ?> 
                    dari <?= $total_penduduk ?> data
                </div>
                <div style="margin-left: auto;">
                    <?= $pager->links() ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function confirmDelete(nik, nama) {
    if(confirm(`Apakah Anda yakin ingin menghapus data penduduk "${nama}" (NIK: ${nik})?\n\nTindakan ini tidak dapat dibatalkan.`)) {
        window.location.href = `<?= base_url('/penduduk/hapus/') ?>${nik}`;
    }
}
</script>

<?= $this->endSection() ?>