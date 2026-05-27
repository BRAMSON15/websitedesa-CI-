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
            <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; font-weight: 600; margin-bottom: 1rem; padding-left: 0.5rem; margin-top: 1rem;">Menu Navigasi</p>
        </div>
        
        <ul class="sidebar-nav" style="flex: 1; overflow-y: auto; padding-right: 0.5rem;">
            <li><a href="<?= base_url('/dashboard') ?>" <?= (current_url() == base_url('/dashboard')) ? 'class="active"' : '' ?>><i class="ri-dashboard-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Dashboard</a></li>
            
            <?php if($role == 'admin'): ?>
                <li><a href="<?= base_url('/penduduk') ?>"><i class="ri-team-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Data Penduduk</a></li>
                <li><a href="<?= base_url('/surat/kelola') ?>"><i class="ri-mail-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Surat</a></li>
                <li><a href="<?= base_url('/peta/kelola') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Peta Administrasi</a></li>
                <!-- NEW CONTENT MANAGEMENT FOR ADMIN -->
                <li><a href="<?= base_url('/profil/kelola_umum') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil Desa</a></li>
                <li><a href="<?= base_url('/struktur/kelola') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Struktur Desa</a></li>
                <li><a href="<?= base_url('/profil/kelola_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Visi & Misi</a></li>
                <li><a href="<?= base_url('/profil/kelola_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Sejarah</a></li>
            <?php elseif($role == 'kepala_desa'): ?>
                <li><a href="<?= base_url('/surat/persetujuan') ?>"><i class="ri-task-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Persetujuan Surat</a></li>
                <li><a href="<?= base_url('/peta') ?>"><i class="ri-map-pin-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Rekap Peta</a></li>
            <?php else: // masyarakat ?>
                <li><a href="<?= base_url('/profil/lihat') ?>"><i class="ri-information-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Profil Desa</a></li>
                <li><a href="<?= base_url('/struktur/lihat') ?>"><i class="ri-organization-chart" style="margin-right: 10px; font-size: 1.2rem;"></i> Struktur Desa</a></li>
                <li><a href="<?= base_url('/profil/lihat_visimisi') ?>"><i class="ri-focus-2-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Visi & Misi</a></li>
                <li><a href="<?= base_url('/profil/lihat_sejarah') ?>"><i class="ri-history-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Sejarah Desa</a></li>
                <li style="margin: 0.5rem 0;"><hr style="border-top: 1px solid #e2e8f0; opacity: 0.5;"></li>
                <li><a href="<?= base_url('/surat/ajukan') ?>"><i class="ri-send-plane-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Ajukan Surat</a></li>
                <li><a href="<?= base_url('/surat/status') ?>"><i class="ri-file-search-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Status Pengajuan</a></li>
                <li><a href="<?= base_url('/peta') ?>"><i class="ri-road-map-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Peta Administrasi</a></li>
                <li><a href="<?= base_url('/user/profil') ?>"><i class="ri-user-settings-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Profil User</a></li>
            <?php endif; ?>
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
                <h3 style="color: var(--dark); font-size: 1.6rem; margin-bottom: 0.3rem;">Halaman <?= esc($page_title ?? 'Tanpa Judul') ?></h3>
                <p style="color: #64748b; font-size: 0.95rem;">Menampilkan data untuk modul <?= esc($page_title ?? '') ?></p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?= base_url('/dashboard') ?>" class="btn-outline" style="padding: 0.5rem 1rem; border-color: #e2e8f0; display: flex; align-items: center; gap: 0.5rem;"><i class="ri-arrow-left-line"></i> Kembali</a>
            </div>
        </div>

        <!-- Messaging Section for Admin -->
        <?php if($role == 'admin'): ?>
        <div class="card" style="margin-bottom: 2rem;">
            <h4 style="color: var(--dark); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ri-mail-send-line" style="color: var(--primary);"></i> Kirim Informasi ke Masyarakat
            </h4>
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
        <?php endif; ?>

        <!-- Information Card -->
        <div class="card" style="padding: 3rem; text-align: center;">
            <div style="width: 100px; height: 100px; background: rgba(79, 70, 229, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem;">
                <i class="ri-tools-fill" style="font-size: 3.5rem; color: var(--primary);"></i>
            </div>
            <h2 style="color: var(--dark); margin-bottom: 1rem;"><?= esc($page_title ?? '') ?> Sedang Dikembangkan</h2>
            <p style="color: #64748b; font-size: 1.1rem; max-width: 500px; margin: 0 auto;">Fitur basis data dan antarmuka untuk halaman ini sudah dikonfigurasi. Template backend CodeIgniter 4 berhasil tersambung ke rute ini.</p>
        </div>
    </div>
</div>

<script>
// Load users when page loads
document.addEventListener('DOMContentLoaded', function() {
    <?php if($role == 'admin'): ?>
    loadDaftarUser();
    <?php endif; ?>
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
<?php if($role == 'admin'): ?>
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
<?php endif; ?>
</script>
<?= $this->endSection() ?>
