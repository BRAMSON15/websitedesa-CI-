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
            background: linear-gradient(rgba(15, 23, 42, 0.6), rgba(15, 23, 42, 0.6)), url('<?= base_url('img/TELUK-TIFU.jpeg') ?>');
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

            /* Features section mobile */
            #fitur .container {
                padding: 60px 1rem !important;
            }

            #fitur h2 {
                font-size: 2rem !important;
                margin-bottom: 0.8rem !important;
            }

            #fitur p {
                font-size: 1rem !important;
            }

            #fitur > div > div {
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

            #fitur h2 {
                font-size: 1.8rem !important;
            }

            .glass {
                padding: 1.5rem !important;
            }

            .glass > div {
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
    <nav class="navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="<?= base_url() ?>" class="navbar-brand" style="display: flex; align-items: center; gap: 0.5rem;">
                <div style="background: linear-gradient(135deg, var(--primary), var(--primary-hover)); color: white; width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                    <i class="ri-home-smile-fill"></i>
                </div>
                SIDESA
            </a>
            
            <!-- Mobile menu toggle -->
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <i class="ri-menu-line"></i>
            </button>
            
            <ul class="nav-links" id="navLinks" style="display: flex; align-items: center;">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Berita</a></li>
                <li><a href="#">Layanan</a></li>
                <li><a href="<?= base_url('/login') ?>" class="btn-primary" style="color: white !important;">Masuk Sistem</a></li>
            </ul>
        </div>
    </nav>

    <div class="hero">
        <div class="hero-graphics">
            <div class="blob-1"></div>
            <div class="blob-2"></div>
        </div>
        <div class="container" style="position: relative; z-index: 1;">
            <div style="max-width: 650px;">
                <div style="display: inline-block; padding: 0.5rem 1rem; background: rgba(15, 118, 110, 0.1); color: var(--primary); border-radius: 30px; font-weight: 600; font-size: 0.9rem; margin-bottom: 1.5rem;">
                    <i class="ri-rocket-line"></i> Inovasi Desa Digital 2026
                </div>
                <h1 style="font-size: 4rem; line-height: 1.1; margin-bottom: 1.5rem; color: #ffffff;">Sistem Informasi <span style="background: linear-gradient(to right, #2DD4BF, #10B981); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Desa Cerdas</span></h1>
                <p style="font-size: 1.25rem; color: #e2e8f0; margin-bottom: 2.5rem; line-height: 1.7;">Pelayanan surat menyurat, peta administrasi, dan data penduduk kini lebih mudah, transparan, dan dapat diakses dari mana saja tanpa antri.</p>
                <div style="display: flex; gap: 1rem;">
                    <a href="<?= base_url('/login') ?>" class="btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem; background: var(--primary);">Mulai Sekarang <i class="ri-arrow-right-line"></i></a>
                    <a href="#fitur" class="btn-outline" style="padding: 1rem 2rem; font-size: 1.1rem; border-color: rgba(255,255,255,0.3); color: #ffffff; background: rgba(255,255,255,0.1); backdrop-filter: blur(5px);">Pelajari Fitur</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features section summary -->
    <div id="fitur" class="container" style="padding: 100px 1.5rem;">
        <div style="text-align: center; margin-bottom: 4rem;">
            <h2 style="font-size: 2.5rem; color: var(--dark); margin-bottom: 1rem;">Layanan Unggulan Desa</h2>
            <p style="color: #64748b; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Kami menghadirkan berbagai fitur digital yang memudahkan warga dalam mengurus administrasi.</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <!-- fitur 1 -->
            <div class="glass" style="padding: 2.5rem; border-top: 4px solid var(--primary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="width: 70px; height: 70px; background: rgba(15, 118, 110, 0.1); color: var(--primary); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin-bottom: 1.5rem;">
                    <i class="ri-file-paper-2-line"></i>
                </div>
                <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">Pengajuan Surat</h3>
                <p style="color: #64748b; line-height: 1.7;">Ajukan surat keterangan usaha, domisili, atau pengantar RT/RW secara aman dari rumah. Proses otomatis masuk ke kepala desa untuk persetujuan.</p>
            </div>
            <!-- fitur 2 -->
            <div class="glass" style="padding: 2.5rem; border-top: 4px solid var(--secondary); transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="width: 70px; height: 70px; background: rgba(16, 185, 129, 0.1); color: var(--secondary); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin-bottom: 1.5rem;">
                    <i class="ri-map-pin-2-line"></i>
                </div>
                <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">Peta Administrasi</h3>
                <p style="color: #64748b; line-height: 1.7;">Akses peta interaktif yang menampilkan batas desa, wilayah rukun tetangga, hingga fasilitas jalan dan sumber daya alam secara visual.</p>
            </div>
            <!-- fitur 3 -->
            <div class="glass" style="padding: 2.5rem; border-top: 4px solid #f59e0b; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="width: 70px; height: 70px; background: rgba(245, 158, 11, 0.1); color: #f59e0b; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin-bottom: 1.5rem;">
                    <i class="ri-team-line"></i>
                </div>
                <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">Integrasi Kependudukan</h3>
                <p style="color: #64748b; line-height: 1.7;">Seluruh data kartu keluarga dan NIK tersimpan dengan aman dan dapat diolah untuk menghasilkan laporan statistik warga yang akurat.</p>
            </div>
        </div>
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
