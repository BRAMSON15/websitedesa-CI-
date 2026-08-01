<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Desa Tifu | Beranda</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        /* Mobile-first responsive design */
        .hero {
            padding-top: 80px;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)), url('<?= base_url('img/kantordesa.jpeg') ?>');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        .hero-graphics {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 50%;
            height: 100%;
            z-index: 0;
            opacity: 0.8;
            pointer-events: none;
        }
        
        .blob-1 { 
            position: absolute; 
            width: 200px; 
            height: 200px; 
            background: rgba(15, 118, 110, 0.3); 
            border-radius: 50%; 
            top: 10%; 
            right: 10%; 
            filter: blur(40px); 
            animation: float 10s ease-in-out infinite;
            display: none;
        }
        
        .blob-2 { 
            position: absolute; 
            width: 150px; 
            height: 150px; 
            background: rgba(16, 185, 129, 0.2); 
            border-radius: 50%; 
            bottom: 20%; 
            right: 20%; 
            filter: blur(50px); 
            animation: float 12s ease-in-out infinite reverse;
            display: none;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
            100% { transform: translateY(0px); }
        }

        /* Mobile Navigation */
        .navbar {
            padding: 1rem 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .hero {
                padding-top: 100px;
                padding-left: 1rem;
                padding-right: 1rem;
                text-align: center;
            }

            .hero h1 {
                font-size: 2.5rem !important;
                line-height: 1.2 !important;
                margin-bottom: 1rem !important;
            }

            .hero p {
                font-size: 1.1rem !important;
                margin-bottom: 2rem !important;
            }

            .hero .btn-primary,
            .hero .btn-outline {
                padding: 0.8rem 1.5rem !important;
                font-size: 1rem !important;
                width: 100%;
                justify-content: center;
                margin-bottom: 0.5rem;
            }

            .hero > div > div {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .nav-links {
                display: none;
            }

            .navbar .container {
                padding: 0 1rem;
            }

            .hero-graphics {
                display: none;
            }

            .blob-1, .blob-2 {
                display: none;
            }

            /* Visi Misi and Sejarah section mobile */
            #visimisi, #sejarah {
                padding: 60px 1rem 20px !important;
            }

            #visimisi h2, #sejarah h2 {
                font-size: 2rem !important;
                margin-bottom: 0.8rem !important;
            }

            #visimisi p, #sejarah p {
                font-size: 1rem !important;
            }

            #visimisi > div:nth-child(2) {
                grid-template-columns: 1fr !important;
                gap: 1.5rem !important;
            }

            .glass {
                padding: 2rem !important;
            }

            .glass h3 {
                font-size: 1.3rem !important;
            }

            .glass p {
                font-size: 0.95rem !important;
            }

            /* Footer mobile */
            footer {
                padding: 3rem 1rem 2rem !important;
            }

            footer h4 {
                font-size: 1.3rem !important;
            }

            footer p {
                font-size: 0.95rem !important;
            }

            footer > div > div {
                flex-wrap: wrap;
                gap: 0.8rem !important;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem !important;
            }

            .hero p {
                font-size: 1rem !important;
            }

            .hero .btn-primary,
            .hero .btn-outline {
                padding: 0.7rem 1.2rem !important;
                font-size: 0.95rem !important;
            }

            #visimisi h2, #sejarah h2 {
                font-size: 1.8rem !important;
            }

            .glass {
                padding: 1.5rem !important;
            }

            #visimisi .glass > div {
                width: 60px !important;
                height: 60px !important;
                font-size: 2rem !important;
            }
        }

        /* Mobile menu toggle (if needed) */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }

            .nav-links {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .nav-links.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            .nav-links li {
                width: 100%;
                text-align: center;
                margin: 0.5rem 0;
            }

            .nav-links a {
                display: block;
                padding: 0.8rem;
                width: 100%;
            }
        }

        /* Container responsive */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        @media (min-width: 768px) {
            .container {
                padding: 0 2rem;
            }
        }

        @media (min-width: 1024px) {
            .container {
                padding: 0 3rem;
            }

            .hero {
                padding-left: 3rem;
                padding-right: 3rem;
            }

            .blob-1 {
                width: 400px;
                height: 400px;
            }

            .blob-2 {
                width: 300px;
                height: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="hero-graphics">
            <div class="blob-1"></div>
            <div class="blob-2"></div>
        </div>
        <div class="container" style="position: relative; z-index: 1;">
            <div style="max-width: 650px;">
                <!-- <div style="display: inline-block; padding: 0.5rem 1rem; background: rgba(15, 118, 110, 0.1); color: var(--primary); border-radius: 30px; font-weight: 600; font-size: 0.9rem; margin-bottom: 1.5rem;">
                    <i class="ri-rocket-line"></i> Inovasi Desa Digital 2026
                </div> -->
                <h1 style="font-size: 4rem; line-height: 1.1; margin-bottom: 1.5rem; color: #ffffff;">Sistem Informasi <span style="color: #ffffff;">Desa Tifu</span></h1>
                <p style="font-size: 1.25rem; color: #e2e8f0; margin-bottom: 2.5rem; line-height: 1.7;">Pelayanan surat menyurat, peta administrasi, dan data penduduk kini lebih mudah, transparan, dan dapat diakses dari mana saja tanpa antri.</p>
                <div style="display: flex; gap: 1rem;">
                    <a href="<?= base_url('/login') ?>" class="btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem; background: var(--primary);">Mulai Sekarang <i class="ri-arrow-right-line"></i></a>
                    <a href="#visimisi" class="btn-outline" style="padding: 1rem 2rem; font-size: 1.1rem; border-color: rgba(255,255,255,0.3); color: #ffffff; background: rgba(255,255,255,0.1); backdrop-filter: blur(5px);">Kenali Desa</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Visi Misi Section -->
    <div id="visimisi" class="container" style="padding: 100px 1.5rem 0;">
        <div style="text-align: center; margin-bottom: 4rem;">
            <h2 style="font-size: 2.5rem; color: var(--dark); margin-bottom: 1rem;">Visi & Misi Desa</h2>
            <p style="color: #64748b; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Arah dan tujuan pembangunan untuk masa depan yang lebih baik.</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <div class="glass" style="padding: 2.5rem; border-top: 4px solid var(--primary); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="width: 70px; height: 70px; background: rgba(15, 118, 110, 0.1); color: var(--primary); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin-bottom: 1.5rem;">
                    <i class="ri-focus-2-line"></i>
                </div>
                <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">Visi</h3>
                <p style="color: #64748b; line-height: 1.7;"><?= nl2br(esc($profil['visi'] ?? 'Belum ada visi')) ?></p>
            </div>
            
            <div class="glass" style="padding: 2.5rem; border-top: 4px solid #f59e0b; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="width: 70px; height: 70px; background: rgba(245, 158, 11, 0.1); color: #f59e0b; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin-bottom: 1.5rem;">
                    <i class="ri-list-check-2"></i>
                </div>
                <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">Misi</h3>
                <p style="color: #64748b; line-height: 1.7;"><?= nl2br(esc($profil['misi'] ?? 'Belum ada misi')) ?></p>
            </div>
        </div>
    </div>

    <!-- Profil & Sejarah & Peta Section -->
    <div id="sejarah" class="container" style="padding: 100px 1.5rem 50px;">
        <div style="text-align: center; margin-bottom: 4rem;">
            <h2 style="font-size: 2.5rem; color: var(--dark); margin-bottom: 1rem;">Profil, Sejarah & Peta Desa</h2>
            <p style="color: #64748b; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Mengenal lebih dekat asal-usul dan profil <?= esc($profil['nama_desa'] ?? 'Desa') ?> serta batas wilayahnya.</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <!-- Sejarah Kiri -->
            <div class="glass" style="padding: 2.5rem; border-top: 4px solid var(--primary);">
                <h3 style="margin-top: 0; color: var(--dark); margin-bottom: 1.5rem; font-size: 1.5rem;"><i class="ri-history-line"></i> Sejarah Desa</h3>
                <?php if (!empty($profil['gambar_sejarah'])): ?>
                    <div style="text-align: center;">
                        <img src="<?= base_url('uploads/sejarah/' . $profil['gambar_sejarah']) ?>" alt="Sejarah Desa" style="width: 100%; max-height: 250px; object-fit: cover; border-radius: 12px; margin-bottom: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    </div>
                <?php endif; ?>
                <div style="color: #64748b; line-height: 1.8; font-size: 1.05rem; text-align: justify;">
                    <?= nl2br(esc($profil['sejarah'] ?? 'Belum ada data sejarah desa.')) ?>
                </div>
            </div>

            <!-- Peta Kanan -->
            <div class="glass" style="padding: 2.5rem; border-top: 4px solid #10b981;">
                <h3 style="margin-top: 0; color: var(--dark); margin-bottom: 1.5rem; font-size: 1.5rem;"><i class="ri-map-pin-line"></i> Peta Administrasi</h3>
                <?php if (!empty($peta) && !empty($peta['koordinat_lat'])): ?>
                    <div style="text-align: center;">
                        <div id="landingMap" style="width: 100%; height: 350px; border-radius: 12px; margin-bottom: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); z-index: 1;"></div>
                    </div>
                    <?php if(!empty($peta['deskripsi'])): ?>
                        <div style="color: #64748b; line-height: 1.8; font-size: 1.05rem; text-align: justify; padding: 1rem; background: #f8fafc; border-radius: 8px;">
                            <?= nl2br(esc($peta['deskripsi'])) ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Leaflet JS & CSS -->
                    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let lat = <?= esc($peta['koordinat_lat']) ?>;
                            let lng = <?= esc($peta['koordinat_lng']) ?>;
                            let landingMap = L.map('landingMap').setView([lat, lng], 14);
                            
                            L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                                maxZoom: 20,
                                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                                attribution: '© Google Maps'
                            }).addTo(landingMap);

                            const customIcon = L.divIcon({
                                className: 'custom-pin',
                                html: `<div style="background-color: #10b981; width: 24px; height: 24px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); border: 3px solid white; box-shadow: 0 3px 6px rgba(0,0,0,0.3);"></div>`,
                                iconSize: [24, 24],
                                iconAnchor: [12, 24]
                            });

                            L.marker([lat, lng], {icon: customIcon}).addTo(landingMap)
                                .bindPopup("<b><?= esc($peta['judul_peta'] ?? 'Peta Administrasi') ?></b><br>Titik Pusat Desa")
                                .openPopup();
                        });
                    </script>
                <?php else: ?>
                    <div style="text-align: center; color: #94a3b8; padding: 2rem;">
                        <p>Belum ada peta administrasi yang diatur.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Struktur Desa Section -->
    <div id="struktur" class="container" style="padding: 100px 1.5rem 50px;">
        <div style="text-align: center; margin-bottom: 4rem;">
            <h2 style="font-size: 2.5rem; color: var(--dark); margin-bottom: 1rem;">Struktur Pemerintahan Desa</h2>
            <p style="color: #64748b; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Pemerintah desa yang bertugas dan melayani masyarakat.</p>
        </div>
        
        <?php if(empty($profil['struktur_json'])): ?>
        <div style="text-align: center; color: #94a3b8; padding: 2rem;">
            <p>Belum ada bagan struktur desa yang dibuat.</p>
        </div>
        <?php else: ?>
        <!-- Modal Detail Publik -->
        <div id="publicDetailModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(5px);">
            <div style="background: white; padding: 2.5rem; border-radius: 16px; width: 100%; max-width: 350px; text-align: center; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); position: relative;">
                <button onclick="document.getElementById('publicDetailModal').style.display='none'" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #94a3b8; transition: color 0.3s;" onmouseover="this.style.color='#ef4444'" onmouseout="this.style.color='#94a3b8'"><i class="ri-close-line"></i></button>
                
                <div style="width: 120px; height: 120px; margin: 0 auto 1.5rem; border-radius: 50%; padding: 5px; border: 3px solid var(--primary);">
                    <img id="detailImg" src="" alt="Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%; background: #f1f5f9;">
                </div>
                <h3 id="detailName" style="margin: 0 0 0.5rem; color: var(--dark); font-size: 1.5rem;"></h3>
                <p id="detailTitle" style="margin: 0; color: #3b82f6; font-weight: 600; font-size: 1.1rem;"></p>
                <div style="margin-top: 1.5rem; padding-jtop: 1.5rem; border-top: 1px solid #f1f5f9;">
                    <span style="display: inline-block; padding: 0.4rem 1rem; background: #eff6ff; color: #1e40af; border-radius: 20px; font-size: 0.9rem; font-weight: 500;">Pemerintah Desa Tifu</span>
                </div>
            </div>
        </div>

        <div class="glass" style="padding: 1.5rem; border-top: 4px solid var(--primary); overflow: hidden;">
            <style>
                #tree-public { width: 100%; height: 600px; background: transparent; }
                .balkan-app-watermark { display: none !important; }
            </style>
            <script src="https://balkan.app/js/OrgChart.js"></script>
            <div id="tree-public"></div>
            <script>
                // Desain Kustom (Tengah Sempurna)
                OrgChart.templates.desa = Object.assign({}, OrgChart.templates.ana);
                OrgChart.templates.desa.size = [200, 200];
                OrgChart.templates.desa.node = '<rect x="0" y="0" height="200" width="200" fill="#0ea5e9" stroke-width="1" stroke="#0ea5e9" rx="15" ry="15"></rect>';
                OrgChart.templates.desa.field_0 = '<text style="font-size: 18px; font-weight: 600; font-family: Inter, sans-serif;" fill="#ffffff" x="100" y="145" text-anchor="middle">{val}</text>';
                OrgChart.templates.desa.field_1 = '<text style="font-size: 14px; font-family: Inter, sans-serif;" fill="#f0f9ff" x="100" y="170" text-anchor="middle">{val}</text>';
                OrgChart.templates.desa.img_0 = '<clipPath id="{randId}"><circle cx="100" cy="70" r="45"></circle></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="55" y="25" width="90" height="90"></image>';

                var chartPublic = new OrgChart(document.getElementById("tree-public"), {
                    enableSearch: false,
                    template: "desa", // Template desa khusus buatan kita
                    mouseScroller: OrgChart.action.none, // Tidak bisa digeser/pan
                    scaleInitial: OrgChart.match.boundary, // Menyesuaikan ukuran semua node
                    nodeMouseClick: OrgChart.action.none, // Matikan popup bawaan
                    nodeBinding: {
                        field_0: "name",
                        field_1: "title",
                        img_0: "img"
                    },
                    nodes: <?= $profil['struktur_json'] ?>
                });

                // Menampilkan popup kustom kita saat diklik
                chartPublic.on('click', function(sender, args) {
                    var node = chartPublic.get(args.node.id);
                    document.getElementById('detailName').innerText = node.name || '-';
                    document.getElementById('detailTitle').innerText = node.title || '-';
                    
                    var img = document.getElementById('detailImg');
                    if(node.img) {
                        img.src = node.img;
                    } else {
                        img.src = 'https://ui-avatars.com/api/?name=' + encodeURIComponent(node.name || 'A') + '&background=e2e8f0&color=475569&size=150';
                    }
                    
                    document.getElementById('publicDetailModal').style.display = 'flex';
                    return false;
                });
            </script>
        </div>
        <?php endif; ?>
    </div>
    
    <footer style="background: var(--dark); color: #cbd5e1; padding: 4rem 1.5rem 2rem; border-top: 1px solid rgba(255,255,255,0.1);">
        <div class="container" style="text-align: center;">
            <h4 style="color: white; font-size: 1.5rem; margin-bottom: 1rem;">Desa Digital</h4>
            <p style="max-width: 400px; margin: 0 auto 2rem;">Pusat layanan informasi dan administrasi desa terintegrasi untuk masyarakat cerdas.</p>
            <div style="display: flex; gap: 1rem; justify-content: center; margin-bottom: 3rem;">
                <a href="#" style="color: white; border-radius: 50%; background: rgba(255,255,255,0.1); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;"><i class="ri-facebook-fill"></i></a>
                <a href="#" style="color: white; border-radius: 50%; background: rgba(255,255,255,0.1); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;"><i class="ri-instagram-line"></i></a>
                <a href="#" style="color: white; border-radius: 50%; background: rgba(255,255,255,0.1); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;"><i class="ri-twitter-x-line"></i></a>
            </div>
            <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem; font-size: 0.9rem;">
                &copy; <?= date('Y') ?> Pemerintah Desa Cerdas. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle functionality
        function toggleMobileMenu() {
            const navLinks = document.getElementById('navLinks');
            const toggleButton = document.querySelector('.mobile-menu-toggle i');
            
            navLinks.classList.toggle('active');
            
            // Change icon
            if (navLinks.classList.contains('active')) {
                toggleButton.className = 'ri-close-line';
            } else {
                toggleButton.className = 'ri-menu-line';
            }
        }

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                const navLinks = document.getElementById('navLinks');
                const toggleButton = document.querySelector('.mobile-menu-toggle i');
                
                navLinks.classList.remove('active');
                toggleButton.className = 'ri-menu-line';
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            const navLinks = document.getElementById('navLinks');
            const toggleButton = document.querySelector('.mobile-menu-toggle');
            const navbar = document.querySelector('.navbar');
            
            if (!navbar.contains(e.target) && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                document.querySelector('.mobile-menu-toggle i').className = 'ri-menu-line';
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 30px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            }
        });
    </script>
</body>
</html>
