<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<script src="https://balkan.app/js/OrgChart.js"></script>
<style>
    #tree {
        width: 100%;
        height: 600px;
        background: #f8fafc;
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        margin-bottom: 2rem;
        position: relative;
    }
    
    /* Customize the editor a bit if needed */
    .balkan-app-watermark { display: none !important; }
</style>

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
            <li><a href="<?= base_url('/jenis-surat/kelola') ?>"><i class="ri-file-list-3-line" style="margin-right: 10px; font-size: 1.2rem;"></i> Kelola Jenis Surat</a></li>
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
                <h3 style="color: var(--dark); font-size: 1.8rem; margin-bottom: 0.3rem;">Visual Editor Bagan Struktur Desa</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Desain bagan organisasi desa interaktif yang akan tampil di halaman depan.</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <button onclick="saveChart()" class="btn-primary" style="padding: 0.6rem 1.5rem; display: flex; align-items: center; gap: 0.5rem; border: none; cursor: pointer; font-size: 1rem; font-weight: 600;">
                    <i class="ri-save-3-line"></i> Simpan Bagan
                </button>
                <div style="display: flex; align-items: center; gap: 0.8rem; background: white; padding: 0.4rem 0.4rem 0.4rem 1.2rem; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                    <span style="font-weight: 600; font-size: 0.95rem; color: var(--dark); padding-right: 0.5rem;"><?= esc($nama) ?></span>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&background=4F46E5&color=fff" alt="Avatar" style="width: 38px; height: 38px; border-radius: 50%;">
                </div>
            </div>
        </div>

        <div id="alert-container"></div>

        <div class="card" style="padding: 1rem;">
            <div style="display: flex; gap: 1rem; margin-bottom: 1rem; padding: 1rem; background: #eff6ff; border-radius: 8px; border-left: 4px solid #3b82f6;">
                <i class="ri-information-fill" style="color: #3b82f6; font-size: 1.5rem;"></i>
                <div>
                    <h5 style="color: #1e40af; margin-bottom: 0.2rem;">Petunjuk Penggunaan:</h5>
                    <p style="color: #1e3a8a; font-size: 0.9rem; margin: 0;">
                        1. Klik ikon <b>titik tiga (⋮)</b> di pojok kanan atas kotak jabatan untuk memunculkan menu.<br>
                        2. Pilih <b>Tambah Bawahan</b> untuk menambahkan anggota baru di bawah posisi tersebut.<br>
                        3. Klik 2 kali pada kotak, atau pilih <b>Edit Kotak Ini</b> untuk mengubah Nama dan Jabatan.<br>
                        4. Jangan lupa klik <b>Simpan Bagan</b> di pojok kanan atas setelah selesai mendesain.
                    </p>
                </div>
            </div>

            <!-- Canvas Bagan -->
            <div id="tree"></div>
        </div>
    </div>
</div>

<!-- Modal Edit Kustom -->
<div id="customEditModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
    <div style="background: white; padding: 2rem; border-radius: 12px; width: 100%; max-width: 400px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
        <h4 style="margin-top: 0; color: var(--dark);">Edit Profil Anggota</h4>
        <input type="hidden" id="editNodeId">
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Nama Lengkap</label>
            <input type="text" id="editNodeName" style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Jabatan</label>
            <input type="text" id="editNodeTitle" style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Foto Profil (Opsional)</label>
            <input type="file" id="editNodePhoto" accept="image/*" style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; font-size: 0.9rem;">
        </div>
        
        <div style="display: flex; justify-content: flex-end; gap: 1rem;">
            <button onclick="document.getElementById('customEditModal').style.display='none'" style="padding: 0.6rem 1.2rem; background: #f1f5f9; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">Batal</button>
            <button onclick="saveCustomNode()" id="btnSaveNode" class="btn-primary" style="padding: 0.6rem 1.2rem; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">Simpan Data</button>
        </div>
    </div>
</div>

<script>
    var chartData = <?= $struktur_json ?>;

    // Desain Kustom (Tengah Sempurna)
    OrgChart.templates.desa = Object.assign({}, OrgChart.templates.ana);
    OrgChart.templates.desa.size = [200, 200];
    OrgChart.templates.desa.node = '<rect x="0" y="0" height="200" width="200" fill="#0ea5e9" stroke-width="1" stroke="#0ea5e9" rx="15" ry="15"></rect>';
    OrgChart.templates.desa.field_0 = '<text style="font-size: 18px; font-weight: 600; font-family: Inter, sans-serif;" fill="#ffffff" x="100" y="145" text-anchor="middle">{val}</text>';
    OrgChart.templates.desa.field_1 = '<text style="font-size: 14px; font-family: Inter, sans-serif;" fill="#f0f9ff" x="100" y="170" text-anchor="middle">{val}</text>';
    OrgChart.templates.desa.img_0 = '<clipPath id="{randId}"><circle cx="100" cy="70" r="45"></circle></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="55" y="25" width="90" height="90"></image>';

    var chart = new OrgChart(document.getElementById("tree"), {
        enableSearch: false,
        template: "desa", 
        mouseScroller: OrgChart.action.pan,
        editUI: new OrgChart.editUI(), 
        nodeMenu: {
            add: { text: "Tambah Bawahan" },
            edit: { text: "Edit Kotak Ini" },
            remove: { text: "Hapus Kotak Ini" }
        },
        nodeBinding: {
            field_0: "name",    
            field_1: "title",
            img_0: "img" // Binding gambar
        },
        nodes: chartData
    });

    // Mencegah editUI bawaan dan menampilkan Modal kustom kita
    chart.editUI.on('show', function (sender, id) {
        var node = chart.get(id);
        document.getElementById('editNodeId').value = id;
        document.getElementById('editNodeName').value = node.name || '';
        document.getElementById('editNodeTitle').value = node.title || '';
        document.getElementById('editNodePhoto').value = '';
        
        document.getElementById('customEditModal').style.display = 'flex';
        return false; // Mencegah editUI default
    });

    function saveCustomNode() {
        var id = document.getElementById('editNodeId').value;
        var name = document.getElementById('editNodeName').value;
        var title = document.getElementById('editNodeTitle').value;
        var fileInput = document.getElementById('editNodePhoto');
        var btn = document.getElementById('btnSaveNode');
        
        btn.innerHTML = 'Menyimpan...';
        btn.disabled = true;

        if (fileInput.files.length > 0) {
            var formData = new FormData();
            formData.append('foto', fileInput.files[0]);
            
            fetch('<?= base_url('/struktur/uploadFoto') ?>', {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data => {
                btn.innerHTML = 'Simpan Data';
                btn.disabled = false;
                if (data.status === 'success') {
                    chart.updateNode({ id: id, pid: chart.get(id).pid, name: name, title: title, img: data.url });
                    document.getElementById('customEditModal').style.display = 'none';
                } else {
                    alert(data.message);
                }
            }).catch(e => {
                btn.innerHTML = 'Simpan Data';
                btn.disabled = false;
                alert('Gagal mengunggah foto');
            });
        } else {
            var oldImg = chart.get(id).img || null;
            chart.updateNode({ id: id, pid: chart.get(id).pid, name: name, title: title, img: oldImg });
            btn.innerHTML = 'Simpan Data';
            btn.disabled = false;
            document.getElementById('customEditModal').style.display = 'none';
        }
    }

    function saveChart() {
        var nodesArray = [];
        if (chart && chart.nodes) {
            for (var id in chart.nodes) {
                var nodeData = chart.get(id);
                if(nodeData) nodesArray.push(nodeData);
            }
        }
        
        var jsonString = JSON.stringify(nodesArray);
        var btn = document.querySelector('button[onclick="saveChart()"]');
        var oldHtml = btn.innerHTML;
        btn.innerHTML = '<i class="ri-loader-4-line ri-spin"></i> Menyimpan...';
        btn.disabled = true;

        fetch('<?= base_url('/struktur/simpan') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: 'struktur_json=' + encodeURIComponent(jsonString)
        })
        .then(response => response.json())
        .then(data => {
            btn.innerHTML = oldHtml;
            btn.disabled = false;
            var alertContainer = document.getElementById('alert-container');
            if(data.status === 'success') {
                alertContainer.innerHTML = '<div style="background: #d1fae5; border-left: 4px solid #10b981; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem;"><i class="ri-checkbox-circle-line" style="font-size: 1.5rem; color: #10b981;"></i><p style="color: #065f46; margin: 0;">' + data.message + '</p></div>';
            } else {
                alertContainer.innerHTML = '<div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem;"><i class="ri-error-warning-line" style="font-size: 1.5rem; color: #ef4444;"></i><p style="color: #991b1b; margin: 0;">' + data.message + '</p></div>';
            }
            setTimeout(() => { alertContainer.innerHTML = ''; }, 3000);
        })
        .catch(error => {
            btn.innerHTML = oldHtml;
            btn.disabled = false;
            alert("Terjadi kesalahan sistem saat menyimpan data.");
        });
    }
</script>
<?= $this->endSection() ?>
