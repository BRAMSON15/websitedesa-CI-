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
            <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem; margin-top: 1rem;">Menu Kepala Desa</p>
        </div>
        
        <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; padding-right: 0.5rem;">
            <li><a href="<?= base_url('/dashboard') ?>"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li><a href="<?= base_url('/surat/persetujuan') ?>" class="active"><i class="ri-task-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Persetujuan Surat</a></li>
            <li><a href="<?= base_url('/peta') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Rekap Peta</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Persetujuan Pengajuan Surat</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Kelola dan setujui pengajuan surat dari masyarakat</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <div style="width: 45px; height: 45px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05); color: #64748b; cursor: pointer; transition: transform 0.2s;">
                    <i class="ri-notification-3-line" style="font-size: 1.2rem;"></i>
                    <?php if(count($surat_menunggu) > 0): ?>
                    <span style="position: absolute; top: 0px; right: 0px; width: 10px; height: 10px; background: #ef4444; border-radius: 50%; border: 2px solid white;"></span>
                    <?php endif; ?>
                </div>
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); cursor: pointer;">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <div style="display: flex; gap: 0.5rem; margin-bottom: 2rem; border-bottom: 2px solid #f1f5f9;">
            <button class="tab-btn active" onclick="switchTab('menunggu')" style="padding: 1rem 1.5rem; border: none; background: none; color: var(--primary); font-weight: 600; cursor: pointer; border-bottom: 3px solid var(--primary); margin-bottom: -2px;">
                <i class="ri-time-line" style="margin-right: 0.5rem;"></i> Menunggu Persetujuan
                <span style="background: #f59e0b; color: white; padding: 0.2rem 0.6rem; border-radius: 20px; font-size: 0.85rem; margin-left: 0.5rem;"><?= count($surat_menunggu) ?></span>
            </button>
            <button class="tab-btn" onclick="switchTab('disetujui')" style="padding: 1rem 1.5rem; border: none; background: none; color: #64748b; font-weight: 600; cursor: pointer;">
                <i class="ri-checkbox-circle-line" style="margin-right: 0.5rem;"></i> Disetujui
                <span style="background: #10b981; color: white; padding: 0.2rem 0.6rem; border-radius: 20px; font-size: 0.85rem; margin-left: 0.5rem;"><?= count($surat_disetujui) ?></span>
            </button>
            <button class="tab-btn" onclick="switchTab('ditolak')" style="padding: 1rem 1.5rem; border: none; background: none; color: #64748b; font-weight: 600; cursor: pointer;">
                <i class="ri-close-circle-line" style="margin-right: 0.5rem;"></i> Ditolak
                <span style="background: #ef4444; color: white; padding: 0.2rem 0.6rem; border-radius: 20px; font-size: 0.85rem; margin-left: 0.5rem;"><?= count($surat_ditolak) ?></span>
            </button>
        </div>

        <!-- Tab: Menunggu Persetujuan -->
        <div id="tab-menunggu" class="tab-content" style="display: block;">
            <?php if(count($surat_menunggu) > 0): ?>
            <div style="display: grid; gap: 1.5rem;">
                <?php foreach($surat_menunggu as $surat): ?>
                <div class="card" style="border-left: 4px solid #f59e0b; transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                    <div style="display: grid; grid-template-columns: 1fr auto; gap: 1.5rem; align-items: start;">
                        <div>
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                <div style="width: 50px; height: 50px; background: #fef3c7; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="ri-mail-download-line" style="color: #f59e0b; font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <h4 style="color: var(--dark); margin: 0; font-size: 1.1rem;"><?= esc($surat['nama_surat']) ?></h4>
                                    <p style="color: #64748b; margin: 0; font-size: 0.9rem;">ID: #<?= str_pad($surat['id_surat'], 4, '0', STR_PAD_LEFT) ?></p>
                                </div>
                            </div>
                            
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1rem;">
                                <div>
                                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Pemohon</p>
                                    <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= esc($surat['nama_pemohon']) ?></p>
                                </div>
                                <div>
                                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Tanggal Pengajuan</p>
                                    <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= date('d F Y', strtotime($surat['created_at'])) ?></p>
                                </div>
                                <div>
                                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Status</p>
                                    <span style="background: #fef3c7; color: #92400e; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                                        <i class="ri-time-line"></i> Menunggu
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div style="display: flex; gap: 0.8rem; flex-direction: column;">
                            <a href="<?= base_url('/surat/verifikasi/' . $surat['id_surat']) ?>" class="btn-primary" style="padding: 0.8rem 1.5rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem; white-space: nowrap;">
                                <i class="ri-eye-line"></i> Tinjau
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="card" style="text-align: center; padding: 3rem 1.5rem;">
                <div style="width: 80px; height: 80px; background: white; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-inbox-archive-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem; font-size: 1.1rem;">Tidak Ada Pengajuan Menunggu</h5>
                <p style="color: #94a3b8; font-size: 0.95rem;">Semua pengajuan surat telah diproses.</p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Tab: Disetujui -->
        <div id="tab-disetujui" class="tab-content" style="display: none;">
            <?php if(count($surat_disetujui) > 0): ?>
            <div style="display: grid; gap: 1.5rem;">
                <?php foreach($surat_disetujui as $surat): ?>
                <div class="card" style="border-left: 4px solid #10b981; transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                    <div style="display: grid; grid-template-columns: 1fr auto; gap: 1.5rem; align-items: start;">
                        <div>
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                <div style="width: 50px; height: 50px; background: #d1fae5; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="ri-checkbox-circle-line" style="color: #10b981; font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <h4 style="color: var(--dark); margin: 0; font-size: 1.1rem;"><?= esc($surat['nama_surat']) ?></h4>
                                    <p style="color: #64748b; margin: 0; font-size: 0.9rem;">ID: #<?= str_pad($surat['id_surat'], 4, '0', STR_PAD_LEFT) ?></p>
                                </div>
                            </div>
                            
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1rem;">
                                <div>
                                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Pemohon</p>
                                    <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= esc($surat['nama_pemohon']) ?></p>
                                </div>
                                <div>
                                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Tanggal Disetujui</p>
                                    <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= date('d F Y', strtotime($surat['updated_at'])) ?></p>
                                </div>
                                <div>
                                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Status</p>
                                    <span style="background: #d1fae5; color: #065f46; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                                        <i class="ri-checkbox-circle-line"></i> Disetujui
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div style="display: flex; gap: 0.8rem; flex-direction: column;">
                            <a href="<?= base_url('/surat/preview-pdf/' . $surat['id_surat']) ?>" target="_blank" class="btn-outline" style="padding: 0.8rem 1.5rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem; white-space: nowrap; border: 2px solid #10b981; color: #10b981;">
                                <i class="ri-eye-line"></i> Preview
                            </a>
                            <a href="<?= base_url('/surat/generate-pdf/' . $surat['id_surat']) ?>" class="btn-primary" style="padding: 0.8rem 1.5rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem; white-space: nowrap; background: #10b981;">
                                <i class="ri-download-line"></i> Cetak
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="card" style="text-align: center; padding: 3rem 1.5rem;">
                <div style="width: 80px; height: 80px; background: white; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-inbox-archive-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem; font-size: 1.1rem;">Tidak Ada Surat Disetujui</h5>
                <p style="color: #94a3b8; font-size: 0.95rem;">Belum ada pengajuan yang disetujui.</p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Tab: Ditolak -->
        <div id="tab-ditolak" class="tab-content" style="display: none;">
            <?php if(count($surat_ditolak) > 0): ?>
            <div style="display: grid; gap: 1.5rem;">
                <?php foreach($surat_ditolak as $surat): ?>
                <div class="card" style="border-left: 4px solid #ef4444; transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                    <div style="display: grid; grid-template-columns: 1fr auto; gap: 1.5rem; align-items: start;">
                        <div>
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                <div style="width: 50px; height: 50px; background: #fee2e2; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="ri-close-circle-line" style="color: #ef4444; font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <h4 style="color: var(--dark); margin: 0; font-size: 1.1rem;"><?= esc($surat['nama_surat']) ?></h4>
                                    <p style="color: #64748b; margin: 0; font-size: 0.9rem;">ID: #<?= str_pad($surat['id_surat'], 4, '0', STR_PAD_LEFT) ?></p>
                                </div>
                            </div>
                            
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1rem;">
                                <div>
                                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Pemohon</p>
                                    <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= esc($surat['nama_pemohon']) ?></p>
                                </div>
                                <div>
                                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Tanggal Ditolak</p>
                                    <p style="color: var(--dark); font-weight: 600; margin: 0;"><?= date('d F Y', strtotime($surat['updated_at'])) ?></p>
                                </div>
                                <div>
                                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.3rem;">Status</p>
                                    <span style="background: #fee2e2; color: #991b1b; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                                        <i class="ri-close-circle-line"></i> Ditolak
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div style="display: flex; gap: 0.8rem; flex-direction: column;">
                            <a href="<?= base_url('/surat/verifikasi/' . $surat['id_surat']) ?>" class="btn-outline" style="padding: 0.8rem 1.5rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem; white-space: nowrap; border: 2px solid #ef4444; color: #ef4444;">
                                <i class="ri-eye-line"></i> Lihat
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="card" style="text-align: center; padding: 3rem 1.5rem;">
                <div style="width: 80px; height: 80px; background: white; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-inbox-archive-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem; font-size: 1.1rem;">Tidak Ada Surat Ditolak</h5>
                <p style="color: #94a3b8; font-size: 0.95rem;">Belum ada pengajuan yang ditolak.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function switchTab(tabName) {
    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.style.display = 'none';
    });
    
    // Remove active class from all buttons
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.style.color = '#64748b';
        btn.style.borderBottom = 'none';
    });
    
    // Show selected tab
    document.getElementById('tab-' + tabName).style.display = 'block';
    
    // Add active class to clicked button
    event.target.closest('.tab-btn').style.color = 'var(--primary)';
    event.target.closest('.tab-btn').style.borderBottom = '3px solid var(--primary)';
    event.target.closest('.tab-btn').style.marginBottom = '-2px';
}
</script>

<?= $this->endSection() ?>
