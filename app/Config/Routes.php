<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Authentication Routes
$routes->get('/login', 'AuthController::login');
$routes->post('/processLogin', 'AuthController::processLogin');
$routes->get('/register', 'AuthController::register');
$routes->post('/processRegister', 'AuthController::processRegister');
$routes->get('/logout', 'AuthController::logout');

// Dashboard Router
$routes->get('/dashboard', 'DashboardController::index');

// Penduduk Routes
$routes->get('/penduduk', 'PendudukController::index');
$routes->get('/penduduk/tambah', 'PendudukController::tambah');
$routes->post('/penduduk/simpan', 'PendudukController::simpan');
$routes->get('/penduduk/edit/(:segment)', 'PendudukController::edit/$1');
$routes->post('/penduduk/update/(:segment)', 'PendudukController::update/$1');
$routes->get('/penduduk/hapus/(:segment)', 'PendudukController::hapus/$1');
$routes->get('/penduduk/detail/(:segment)', 'PendudukController::detail/$1');
$routes->get('/penduduk/cari', 'PendudukController::cari');

// Surat Routes
$routes->get('/surat/kelola', 'SuratController::kelola');
$routes->get('/surat/verifikasi/(:num)', 'SuratController::verifikasi/$1');
$routes->post('/surat/proses-verifikasi', 'SuratController::prosesVerifikasi');
$routes->get('/surat/generate-pdf/(:num)', 'SuratController::generatePdf/$1');
$routes->get('/surat/preview-pdf/(:num)', 'SuratController::previewPdf/$1');
$routes->get('/surat/persetujuan', 'SuratController::persetujuan');
$routes->get('/surat/ajukan', 'SuratController::ajukan');
$routes->get('/surat/form/(:num)', 'SuratController::form/$1');
$routes->post('/surat/submit', 'SuratController::submit');
$routes->get('/surat/status', 'SuratController::status');
$routes->get('/surat/detail/(:num)', 'SuratController::detail/$1');
$routes->get('/surat/hapus/(:num)', 'SuratController::hapus/$1');

// Template Routes
$routes->get('/template', 'TemplateController::index');
$routes->get('/template/edit/(:any)', 'TemplateController::edit/$1');
$routes->get('/template/preview/(:any)', 'TemplateController::preview/$1');

// Peta Routes
$routes->get('/peta', 'PetaController::index');
$routes->get('/peta/detail', 'PetaController::detail');
$routes->get('/peta/statistik', 'PetaController::statistik');
$routes->get('/peta/export', 'PetaController::export');
$routes->get('/peta/galeri', 'PetaController::galeri');
$routes->get('/peta/kelola', 'PetaController::kelola');
$routes->post('/peta/simpanPeta', 'PetaController::simpanPeta');

// Profil Desa Routes
$routes->get('/profil/kelola_umum', 'ProfilController::kelola_umum');
$routes->get('/profil/kelola_visimisi', 'ProfilController::kelola_visimisi');
$routes->get('/profil/kelola_sejarah', 'ProfilController::kelola_sejarah');
$routes->post('/profil/simpanVisimisi', 'ProfilController::simpanVisimisi');
$routes->post('/profil/simpanProfil', 'ProfilController::simpanProfil');
$routes->get('/profil/lihat', 'ProfilController::lihat');
$routes->get('/profil/lihat_visimisi', 'ProfilController::lihat_visimisi');
$routes->get('/profil/lihat_sejarah', 'ProfilController::lihat_sejarah');

// Struktur Desa Routes
$routes->get('/struktur/kelola', 'StrukturController::kelola');
$routes->post('/struktur/simpan', 'StrukturController::simpan');
$routes->post('/struktur/update/(:num)', 'StrukturController::update/$1');
$routes->get('/struktur/hapus/(:num)', 'StrukturController::hapus/$1');
$routes->get('/struktur/lihat', 'StrukturController::lihat');

// User Profil Routes
$routes->get('/user/profil', 'UserController::profil');
$routes->post('/user/updateProfil', 'UserController::updateProfil');

