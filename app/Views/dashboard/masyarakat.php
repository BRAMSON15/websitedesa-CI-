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
            <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem; margin-top: 1rem;">Menu Masyarakat</p>
        </div>
        
        <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; padding-right: 0.5rem;">
            <li><a href="<?= base_url('/dashboard') ?>" class="active"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
            <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
            <li><a href="<?= base_url('/profil/lihat_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Visi & Misi</a></li>
            <li><a href="<?= base_url('/profil/lihat_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Sejarah Desa</a></li>
            <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
            <li><a href="<?= base_url('/surat/ajukan') ?>"><i class="ri-send-plane-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Ajukan Surat</a></li>
            <li><a href="<?= base_url('/surat/status') ?>"><i class="ri-file-search-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Status Pengajuan</a></li>
            <li><a href="<?= base_url('/peta') ?>"><i class="ri-road-map-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Peta Administrasi</a></li>
            <li><a href="<?= base_url('/user/profil') ?>"><i class="ri-user-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil User</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Dashboard Masyarakat</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Selamat datang, <?= esc($nama) ?> - Kelola pengajuan surat Anda</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <div style="width: 45px; height: 45px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05); color: #64748b; cursor: pointer; transition: transform 0.2s;">
                    <i class="ri-notification-3-line" style="font-size: 1.2rem;"></i>
                    <span style="position: absolute; top: 0px; right: 0px; width: 10px; height: 10px; background: #ef4444; border-radius: 50%; border: 2px solid white;"></span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); cursor: pointer;">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <!-- Masyarakat Statistics Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
            <div class="card stat-card" style="border-left: 4px solid var(--primary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon primary" style="background: rgba(79, 70, 229, 0.1);"><i class="ri-mail-send-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Surat Diajukan</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($surat_diajukan) ? number_format($surat_diajukan) : '0' ?></h4>
                    <p style="color: var(--primary); font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-file-list-line"></i> Total pengajuan</p>
                </div>
            </div>
            
            <div class="card stat-card" style="border-left: 4px solid var(--secondary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon success" style="background: rgba(16, 185, 129, 0.1);"><i class="ri-checkbox-circle-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Surat Disetujui</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($surat_disetujui) ? number_format($surat_disetujui) : '0' ?></h4>
                    <p style="color: #10b981; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-check-double-line"></i> Siap diambil</p>
                </div>
            </div>
            
            <div class="card stat-card" style="border-left: 4px solid #f59e0b; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon warning" style="background: rgba(245, 158, 11, 0.1);"><i class="ri-time-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Dalam Proses</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($surat_proses) ? number_format($surat_proses) : '0' ?></h4>
                    <p style="color: #f59e0b; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-loader-4-line"></i> Sedang ditinjau</p>
                </div>
            </div>
            
            <div class="card stat-card" style="border-left: 4px solid #ef4444; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;"><i class="ri-close-circle-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Surat Ditolak</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($surat_ditolak) ? number_format($surat_ditolak) : '0' ?></h4>
                    <p style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-information-line"></i> Perlu perbaikan</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions for Masyarakat -->
        <div class="card" style="margin-bottom: 2rem;">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ri-flashlight-line" style="color: var(--primary);"></i> Layanan Cepat
            </h4>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <a href="<?= base_url('/surat/ajukan') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, #4F46E5, #818cf8); border-radius: 10px; color: white; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="width: 45px; height: 45px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-send-plane-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; margin-bottom: 0.2rem;">Ajukan Surat</p>
                        <p style="font-size: 0.85rem; opacity: 0.9;">Buat pengajuan baru</p>
                    </div>
                </a>
                
                <a href="<?= base_url('/surat/status') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, #10b981, #34d399); border-radius: 10px; color: white; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="width: 45px; height: 45px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-file-search-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; margin-bottom: 0.2rem;">Cek Status</p>
                        <p style="font-size: 0.85rem; opacity: 0.9;">Lacak pengajuan</p>
                    </div>
                </a>
                
                <a href="<?= base_url('/peta') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, #8b5cf6, #a78bfa); border-radius: 10px; color: white; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="width: 45px; height: 45px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-road-map-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; margin-bottom: 0.2rem;">Lihat Peta</p>
                        <p style="font-size: 0.85rem; opacity: 0.9;">Peta wilayah desa</p>
                    </div>
                </a>
                
                <a href="<?= base_url('/user/profil') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, #f59e0b, #fbbf24); border-radius: 10px; color: white; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="width: 45px; height: 45px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-user-settings-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; margin-bottom: 0.2rem;">Profil Saya</p>
                        <p style="font-size: 0.85rem; opacity: 0.9;">Kelola akun</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Information Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            <div class="card" style="background: linear-gradient(135deg, #eff6ff, #dbeafe); border-left: 4px solid #3b82f6;">
                <div style="display: flex; align-items: start; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: #3b82f6; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0;">
                        <i class="ri-information-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h5 style="color: #1e40af; margin-bottom: 0.5rem;">Informasi Penting</h5>
                        <p style="color: #1e3a8a; font-size: 0.9rem; line-height: 1.6;">Pastikan data yang Anda masukkan dalam pengajuan surat sudah benar dan sesuai dengan dokumen resmi.</p>
                    </div>
                </div>
            </div>
            
            <div class="card" style="background: linear-gradient(135deg, #f0fdf4, #dcfce7); border-left: 4px solid #22c55e;">
                <div style="display: flex; align-items: start; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: #22c55e; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0;">
                        <i class="ri-customer-service-2-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h5 style="color: #15803d; margin-bottom: 0.5rem;">Butuh Bantuan?</h5>
                        <p style="color: #166534; font-size: 0.9rem; line-height: 1.6;">Hubungi kantor desa untuk informasi lebih lanjut mengenai persyaratan dan proses pengajuan surat.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Submissions -->
        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="padding: 1.5rem 1.5rem 1rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--dark); display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-mail-line" style="color: var(--primary);"></i> Pesan dari Kantor Desa
                </h4>
                <button class="btn-outline" style="padding: 0.4rem 1rem; font-size: 0.9rem;" onclick="loadPesan()">Refresh</button>
            </div>
            <div id="pesanContainer" style="padding: 3rem 0; text-align: center; color: #94a3b8; background: #fafafa;">
                <div style="width: 80px; height: 80px; background: white; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-inbox-archive-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem; font-size: 1.1rem;">Belum Ada Pesan</h5>
                <p style="font-size: 0.95rem;">Pesan dari kantor desa akan muncul di sini.</p>
            </div>
        </div>

        <!-- Recent Submissions -->
        <div class="card" style="padding: 0; overflow: hidden; margin-top: 2rem;">
            <div style="padding: 1.5rem 1.5rem 1rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--dark); display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-file-list-3-line" style="color: var(--primary);"></i> Riwayat Pengajuan Surat
                </h4>
                <button class="btn-outline" style="padding: 0.4rem 1rem; font-size: 0.9rem;">Lihat Semua</button>
            </div>
            <div style="padding: 3rem 0; text-align: center; color: #94a3b8; background: #fafafa;">
                <div style="width: 80px; height: 80px; background: white; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-inbox-archive-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem; font-size: 1.1rem;">Belum Ada Pengajuan</h5>
                <p style="font-size: 0.95rem;">Riwayat pengajuan surat Anda akan muncul di sini.</p>
                <a href="<?= base_url('/surat/ajukan') ?>" class="btn-primary" style="margin-top: 1rem; display: inline-block; padding: 0.6rem 1.5rem; text-decoration: none;">
                    <i class="ri-add-line"></i> Buat Pengajuan Pertama
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Load messages when page loads
document.addEventListener('DOMContentLoaded', function() {
    loadPesan();
});

function loadPesan() {
    fetch('<?= base_url('/pesan/get') ?>')
        .then(response => response.json())
        .then(data => {
            if(data.success && data.data && data.data.length > 0) {
                const pesanContainer = document.getElementById('pesanContainer');
                pesanContainer.innerHTML = '';
                
                data.data.forEach(pesan => {
                    const tipePesanColors = {
                        'info': { bg: '#eff6ff', border: '#3b82f6', icon: 'ri-information-line', color: '#1e40af' },
                        'warning': { bg: '#fef3c7', border: '#f59e0b', icon: 'ri-alert-line', color: '#92400e' },
                        'success': { bg: '#f0fdf4', border: '#22c55e', icon: 'ri-checkbox-circle-line', color: '#15803d' },
                        'error': { bg: '#fee2e2', border: '#ef4444', icon: 'ri-error-warning-line', color: '#991b1b' }
                    };
                    
                    const tipePesan = tipePesanColors[pesan.tipe_pesan] || tipePesanColors['info'];
                    
                    const pesanDiv = document.createElement('div');
                    pesanDiv.style.cssText = `
                        background: ${tipePesan.bg};
                        border-left: 4px solid ${tipePesan.border};
                        padding: 1.5rem;
                        margin-bottom: 1rem;
                        border-radius: 8px;
                        cursor: pointer;
                        transition: transform 0.2s;
                    `;
                    pesanDiv.onmouseover = function() { this.style.transform = 'translateX(5px)'; };
                    pesanDiv.onmouseout = function() { this.style.transform = 'translateX(0)'; };
                    
                    const tanggal = new Date(pesan.created_at).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    
                    pesanDiv.innerHTML = `
                        <div style="display: flex; gap: 1rem;">
                            <div style="width: 50px; height: 50px; background: ${tipePesan.border}; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0;">
                                <i class="${tipePesan.icon}" style="font-size: 1.5rem;"></i>
                            </div>
                            <div style="flex: 1;">
                                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 0.5rem;">
                                    <h5 style="color: ${tipePesan.color}; margin: 0; font-weight: 600;">${pesan.judul}</h5>
                                    <span style="font-size: 0.8rem; color: #64748b;">${tanggal}</span>
                                </div>
                                <p style="color: ${tipePesan.color}; margin: 0; line-height: 1.6; font-size: 0.95rem;">${pesan.isi_pesan}</p>
                                ${pesan.status_baca === 'belum_dibaca' ? '<span style="display: inline-block; margin-top: 0.5rem; background: ' + tipePesan.border + '; color: white; padding: 0.2rem 0.6rem; border-radius: 4px; font-size: 0.75rem; font-weight: 600;">BARU</span>' : ''}
                            </div>
                        </div>
                    `;
                    
                    pesanContainer.appendChild(pesanDiv);
                    
                    // Mark as read when clicked
                    if(pesan.status_baca === 'belum_dibaca') {
                        pesanDiv.addEventListener('click', function() {
                            fetch('<?= base_url('/pesan/tandai-dibaca/') ?>' + pesan.id_pesan)
                                .then(response => response.json())
                                .then(data => {
                                    if(data.success) {
                                        loadPesan();
                                    }
                                });
                        });
                    }
                });
            }
        })
        .catch(error => console.error('Error:', error));
}
</script>
<?= $this->endSection() ?>
