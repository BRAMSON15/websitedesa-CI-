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
            <li><a href="<?= base_url('/surat/ajukan') ?>"><i class="ri-send-plane-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Ajukan Surat</a></li>
            <li><a href="<?= base_url('/surat/status') ?>" class="active"><i class="ri-file-search-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Status Pengajuan</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Status Pengajuan Surat</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Pantau status pengajuan surat Anda</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/surat/ajukan') ?>" class="btn-primary" style="padding: 0.6rem 1.2rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-add-line"></i> Ajukan Surat Baru
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

        <!-- Summary Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
            <?php 
            $total = count($surat_list);
            $menunggu = count(array_filter($surat_list, fn($s) => $s['status_surat'] == 'Menunggu'));
            $disetujui = count(array_filter($surat_list, fn($s) => $s['status_surat'] == 'Disetujui'));
            $ditolak = count(array_filter($surat_list, fn($s) => $s['status_surat'] == 'Ditolak'));
            ?>
            <div class="card" style="border-left: 4px solid var(--primary); padding: 1rem;">
                <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Total Pengajuan</p>
                <h3 style="color: var(--dark); font-size: 1.8rem;"><?= $total ?></h3>
            </div>
            <div class="card" style="border-left: 4px solid #f59e0b; padding: 1rem;">
                <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Menunggu</p>
                <h3 style="color: #f59e0b; font-size: 1.8rem;"><?= $menunggu ?></h3>
            </div>
            <div class="card" style="border-left: 4px solid #10b981; padding: 1rem;">
                <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Disetujui</p>
                <h3 style="color: #10b981; font-size: 1.8rem;"><?= $disetujui ?></h3>
            </div>
            <div class="card" style="border-left: 4px solid #ef4444; padding: 1rem;">
                <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Ditolak</p>
                <h3 style="color: #ef4444; font-size: 1.8rem;"><?= $ditolak ?></h3>
            </div>
        </div>

        <!-- Daftar Surat -->
        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="padding: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                <h4 style="color: var(--dark); display: flex; align-items: center; gap: 0.5rem; margin: 0;">
                    <i class="ri-file-list-3-line" style="color: var(--primary);"></i> Riwayat Pengajuan
                </h4>
            </div>

            <?php if(empty($surat_list)): ?>
            <div style="padding: 3rem 0; text-align: center; color: #94a3b8;">
                <div style="width: 80px; height: 80px; background: #f8fafc; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-inbox-archive-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem;">Belum Ada Pengajuan</h5>
                <p style="font-size: 0.95rem; margin-bottom: 1.5rem;">Anda belum pernah mengajukan surat.</p>
                <a href="<?= base_url('/surat/ajukan') ?>" class="btn-primary" style="text-decoration: none; padding: 0.6rem 1.5rem; display: inline-block;">
                    <i class="ri-add-line"></i> Ajukan Surat Pertama
                </a>
            </div>
            <?php else: ?>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">No</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">Jenis Surat</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">Tanggal Pengajuan</th>
                            <th style="padding: 1rem; text-align: left; color: var(--dark); font-weight: 600;">Status</th>
                            <th style="padding: 1rem; text-align: center; color: var(--dark); font-weight: 600;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($surat_list as $index => $surat): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" 
                            onmouseover="this.style.background='#f8fafc'" 
                            onmouseout="this.style.background='white'">
                            <td style="padding: 1rem; color: #64748b;"><?= $index + 1 ?></td>
                            <td style="padding: 1rem;">
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary), #818cf8); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0;">
                                        <i class="ri-file-text-line"></i>
                                    </div>
                                    <div>
                                        <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= esc($surat['nama_surat']) ?></p>
                                        <p style="color: #64748b; font-size: 0.85rem; margin: 0;">ID: #<?= str_pad($surat['id_surat'], 4, '0', STR_PAD_LEFT) ?></p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 1rem; color: #64748b;">
                                <?= date('d M Y', strtotime($surat['tanggal_pengajuan'])) ?>
                            </td>
                            <td style="padding: 1rem;">
                                <?php 
                                $statusColors = [
                                    'Menunggu' => ['bg' => '#fef3c7', 'text' => '#92400e', 'icon' => 'ri-time-line'],
                                    'Disetujui' => ['bg' => '#d1fae5', 'text' => '#065f46', 'icon' => 'ri-checkbox-circle-line'],
                                    'Ditolak' => ['bg' => '#fee2e2', 'text' => '#991b1b', 'icon' => 'ri-close-circle-line']
                                ];
                                $color = $statusColors[$surat['status_surat']];
                                ?>
                                <span style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.4rem 0.8rem; background: <?= $color['bg'] ?>; color: <?= $color['text'] ?>; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                                    <i class="<?= $color['icon'] ?>"></i>
                                    <?= esc($surat['status_surat']) ?>
                                </span>
                            </td>
                            <td style="padding: 1rem; text-align: center;">
                                <a href="<?= base_url('/surat/detail/' . $surat['id_surat']) ?>" 
                                   class="btn-outline" 
                                   style="padding: 0.4rem 1rem; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.4rem;">
                                    <i class="ri-eye-line"></i> Detail
                                </a>
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
<?= $this->endSection() ?>
