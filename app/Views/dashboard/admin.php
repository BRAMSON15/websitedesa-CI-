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
            <li><a href="<?= base_url('/dashboard') ?>" class="active"><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            <li><a href="<?= base_url('/penduduk') ?>"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
            <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Dashboard Administrator</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Selamat datang, <?= esc($nama) ?> - Kelola sistem desa dengan mudah</p>
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

        <!-- Admin Statistics Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
            <div class="card stat-card" style="border-left: 4px solid var(--primary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon primary" style="background: rgba(79, 70, 229, 0.1);"><i class="ri-team-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Total Penduduk</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($total_penduduk) ? number_format($total_penduduk) : '0' ?></h4>
                    <p style="color: #10b981; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-arrow-up-line"></i> Data terdaftar</p>
                </div>
            </div>
            
            <div class="card stat-card" style="border-left: 4px solid #f59e0b; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon warning" style="background: rgba(245, 158, 11, 0.1);"><i class="ri-mail-download-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Surat Menunggu</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($surat_menunggu) ? number_format($surat_menunggu) : '0' ?></h4>
                    <p style="color: #f59e0b; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-time-line"></i> Perlu ditindaklanjuti</p>
                </div>
            </div>
            
            <div class="card stat-card" style="border-left: 4px solid var(--secondary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon success" style="background: rgba(16, 185, 129, 0.1);"><i class="ri-checkbox-circle-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Surat Selesai</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($surat_selesai) ? number_format($surat_selesai) : '0' ?></h4>
                    <p style="color: #10b981; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-check-line"></i> Bulan ini</p>
                </div>
            </div>
            
            <div class="card stat-card" style="border-left: 4px solid #8b5cf6; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="stat-icon" style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6;"><i class="ri-map-pin-line"></i></div>
                <div>
                    <p style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 0.2rem;">Wilayah Administrasi</p>
                    <h4 style="font-size: 1.8rem; color: var(--dark);"><?= isset($total_wilayah) ? number_format($total_wilayah) : '0' ?></h4>
                    <p style="color: #8b5cf6; font-size: 0.85rem; margin-top: 0.5rem;"><i class="ri-map-2-line"></i> Area terdaftar</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card" style="margin-bottom: 2rem;">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ri-flashlight-line" style="color: var(--primary);"></i> Aksi Cepat
            </h4>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <a href="<?= base_url('/penduduk/tambah') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, #4F46E5, #818cf8); border-radius: 10px; color: white; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="width: 45px; height: 45px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-user-add-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; margin-bottom: 0.2rem;">Tambah Penduduk</p>
                        <p style="font-size: 0.85rem; opacity: 0.9;">Data baru</p>
                    </div>
                </a>
                
                <a href="<?= base_url('/surat/kelola') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, #10b981, #34d399); border-radius: 10px; color: white; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="width: 45px; height: 45px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-mail-settings-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; margin-bottom: 0.2rem;">Kelola Surat</p>
                        <p style="font-size: 0.85rem; opacity: 0.9;">Proses pengajuan</p>
                    </div>
                </a>
                <a href="<?= base_url('/peta/kelola') ?>" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: linear-gradient(135deg, #8b5cf6, #a78bfa); border-radius: 10px; color: white; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="width: 45px; height: 45px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-map-pin-add-line" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; margin-bottom: 0.2rem;">Kelola Peta</p>
                        <p style="font-size: 0.85rem; opacity: 0.9;">Administrasi wilayah</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="padding: 1.5rem 1.5rem 1rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--dark); display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-mail-send-line" style="color: var(--primary);"></i> Kirim Informasi ke Masyarakat
                </h4>
            </div>
            <div style="padding: 1.5rem;">
                <form id="formKirimPesan" method="POST" action="<?= base_url('/pesan/kirim') ?>">
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">Tipe Pesan</label>
                        <select name="tipe_pesan" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: var(--dark);">
                            <option value="info">Informasi</option>
                            <option value="warning">Peringatan</option>
                            <option value="success">Pengumuman Baik</option>
                            <option value="error">Penting</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">Penerima</label>
                        <select name="user_id_penerima" id="userSelect" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: var(--dark);">
                            <option value="">-- Pilih Penerima --</option>
                            <option value="broadcast">📢 Kirim ke Semua Masyarakat</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">Judul Pesan</label>
                        <input type="text" name="judul" placeholder="Masukkan judul pesan" required style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: var(--dark); box-sizing: border-box;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; color: var(--dark); font-weight: 600; margin-bottom: 0.5rem;">Isi Pesan</label>
                        <textarea name="isi_pesan" placeholder="Masukkan isi pesan..." required style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: var(--dark); min-height: 120px; box-sizing: border-box; font-family: inherit;"></textarea>
                    </div>

                    <div style="display: flex; gap: 1rem;">
                        <button type="submit" class="btn-primary" style="padding: 0.8rem 1.5rem; font-size: 0.95rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                            <i class="ri-send-plane-line"></i> Kirim Pesan
                        </button>
                        <button type="reset" class="btn-outline" style="padding: 0.8rem 1.5rem; font-size: 0.95rem;">Bersihkan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="card" style="padding: 0; overflow: hidden; margin-top: 2rem;">
            <div style="padding: 1.5rem 1.5rem 1rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--dark); display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ri-history-line" style="color: var(--primary);"></i> Aktivitas Terbaru
                </h4>
                <button class="btn-outline" style="padding: 0.4rem 1rem; font-size: 0.9rem;">Lihat Semua</button>
            </div>
            <div style="padding: 3rem 0; text-align: center; color: #94a3b8; background: #fafafa;">
                <div style="width: 80px; height: 80px; background: white; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="ri-inbox-archive-line" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
                <h5 style="color: #64748b; margin-bottom: 0.5rem; font-size: 1.1rem;">Belum Ada Aktivitas</h5>
                <p style="font-size: 0.95rem;">Log aktivitas sistem akan muncul di sini secara otomatis.</p>
            </div>
        </div>
    </div>
</div>

<script>
// Load users when page loads
document.addEventListener('DOMContentLoaded', function() {
    loadDaftarUser();
});

function loadDaftarUser() {
    fetch('<?= base_url('/pesan/daftar-user') ?>')
        .then(response => response.json())
        .then(data => {
            if(data.success && data.data) {
                const userSelect = document.getElementById('userSelect');
                data.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.user_id;
                    option.textContent = user.nama + ' (' + user.role + ')';
                    userSelect.appendChild(option);
                });
            }
        })
        .catch(error => console.error('Error:', error));
}

// Handle form submission
document.getElementById('formKirimPesan').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const userSelect = document.getElementById('userSelect').value;
    const judul = document.querySelector('input[name="judul"]').value;
    const isiPesan = document.querySelector('textarea[name="isi_pesan"]').value;
    const tipePesan = document.querySelector('select[name="tipe_pesan"]').value;

    if(!userSelect) {
        alert('Pilih penerima pesan terlebih dahulu');
        return;
    }

    if(userSelect === 'broadcast') {
        // Send broadcast message
        fetch('<?= base_url('/pesan/kirim-broadcast') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'judul=' + encodeURIComponent(judul) + 
                  '&isi_pesan=' + encodeURIComponent(isiPesan) + 
                  '&tipe_pesan=' + encodeURIComponent(tipePesan)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('Pesan broadcast berhasil dikirim ke semua pengguna');
                document.getElementById('formKirimPesan').reset();
                loadDaftarUser();
            } else {
                alert('Gagal mengirim pesan: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim pesan');
        });
    } else {
        // Send personal message
        fetch('<?= base_url('/pesan/kirim') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'user_id_penerima=' + encodeURIComponent(userSelect) + 
                  '&judul=' + encodeURIComponent(judul) + 
                  '&isi_pesan=' + encodeURIComponent(isiPesan) + 
                  '&tipe_pesan=' + encodeURIComponent(tipePesan)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('Pesan berhasil dikirim');
                document.getElementById('formKirimPesan').reset();
                loadDaftarUser();
            } else {
                alert('Gagal mengirim pesan: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim pesan');
        });
    }
});
</script>
<?= $this->endSection() ?>
