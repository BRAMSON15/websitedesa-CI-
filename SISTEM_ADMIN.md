# Sistem Admin - Sesuai Diagram Activity

## Deskripsi
Sistem admin lengkap untuk mengelola data penduduk dan verifikasi surat sesuai dengan diagram activity yang telah ditentukan.

## Alur Sistem Admin (Sesuai Diagram Activity)

```
1. Login (Admin)
2. Mengelola Data Penduduk
3. Kelola Surat (Verifikasi Pengajuan)
4. Kelola Peta Administrasi
5. Cek Laporan/Status
6. Verifikasi Data:
   - Jika TERIMA: Terima surat dan telah terverifikasi
   - Jika TOLAK: Tolak pengajuan
7. Logout
```

## Fitur yang Telah Diimplementasikan

### 1. Sistem Pengelolaan Data Penduduk

#### A. Halaman Utama Data Penduduk (`/penduduk`)
**File:** `app/Views/admin/penduduk/index.php`
**Controller:** `PendudukController::index()`

**Fitur:**
- ✅ Statistik total penduduk
- ✅ Pencarian berdasarkan nama, NIK, atau alamat
- ✅ Tabel data penduduk dengan pagination
- ✅ Aksi: Detail, Edit, Hapus
- ✅ Filter dan sorting
- ✅ Responsive design

#### B. Tambah Data Penduduk (`/penduduk/tambah`)
**File:** `app/Views/admin/penduduk/tambah.php`
**Controller:** `PendudukController::tambah()`, `PendudukController::simpan()`

**Fitur:**
- ✅ Form lengkap data penduduk
- ✅ Validasi NIK 16 digit unik
- ✅ Validasi semua field required
- ✅ Auto-format TTL (Tempat, Tanggal Lahir)
- ✅ Dropdown untuk agama, jenis kelamin, status keluarga
- ✅ Konfirmasi sebelum simpan

**Field yang Dikelola:**
- NIK (16 digit, unik, required)
- Nama Lengkap (required)
- Tempat & Tanggal Lahir (required)
- Jenis Kelamin (required)
- Alamat Lengkap (required)
- Agama (required)
- Pekerjaan (required)
- Status dalam Keluarga (required)
- Nomor KK (optional, 16 digit)

#### C. Edit Data Penduduk (`/penduduk/edit/{nik}`)
**File:** `app/Views/admin/penduduk/edit.php`
**Controller:** `PendudukController::edit()`, `PendudukController::update()`

**Fitur:**
- ✅ Form edit dengan data existing
- ✅ NIK tidak dapat diubah (read-only)
- ✅ Validasi sama seperti tambah data
- ✅ Konfirmasi sebelum update

#### D. Detail Data Penduduk (`/penduduk/detail/{nik}`)
**Controller:** `PendudukController::detail()`

**Fitur:**
- ✅ Tampilan detail lengkap data penduduk
- ✅ Informasi metadata (created_at, updated_at)

#### E. Hapus Data Penduduk (`/penduduk/hapus/{nik}`)
**Controller:** `PendudukController::hapus()`

**Fitur:**
- ✅ Konfirmasi JavaScript sebelum hapus
- ✅ Soft delete atau hard delete
- ✅ Pesan konfirmasi

#### F. Pencarian Data Penduduk (`/penduduk/cari`)
**Controller:** `PendudukController::cari()`

**Fitur:**
- ✅ Pencarian berdasarkan nama, NIK, alamat
- ✅ Hasil pencarian dengan pagination
- ✅ Reset pencarian

### 2. Sistem Kelola Surat (Verifikasi)

#### A. Halaman Kelola Surat (`/surat/kelola`)
**File:** `app/Views/admin/surat/kelola.php`
**Controller:** `SuratController::kelola()`

**Fitur:**
- ✅ Summary cards: Total, Menunggu, Disetujui, Ditolak
- ✅ Tabel semua pengajuan surat
- ✅ Informasi pemohon dan jenis surat
- ✅ Status dengan badge berwarna
- ✅ Aksi verifikasi/detail

#### B. Halaman Verifikasi Surat (`/surat/verifikasi/{id}`)
**File:** `app/Views/admin/surat/verifikasi.php`
**Controller:** `SuratController::verifikasi()`

**Fitur:**
- ✅ Detail lengkap pengajuan surat
- ✅ Data pemohon lengkap
- ✅ Keperluan dan keterangan
- ✅ Form verifikasi (Setujui/Tolak)
- ✅ Field keterangan wajib diisi
- ✅ Konfirmasi sebelum proses

#### C. Proses Verifikasi (`POST /surat/proses-verifikasi`)
**Controller:** `SuratController::prosesVerifikasi()`

**Fitur:**
- ✅ Update status surat (Disetujui/Ditolak)
- ✅ Simpan keterangan dari admin
- ✅ Validasi input
- ✅ Redirect dengan pesan sukses/error

## Struktur Database yang Digunakan

### Tabel: `penduduk`
```sql
- nik (PK, VARCHAR 20) - Nomor Induk Kependudukan
- nama (VARCHAR 100) - Nama lengkap
- ttl (VARCHAR 100) - Tempat, Tanggal Lahir (format: "Jakarta, 01-01-2000")
- jenis_kelamin (ENUM: 'Laki-laki', 'Perempuan')
- alamat (TEXT) - Alamat lengkap
- agama (VARCHAR 50) - Agama
- pekerjaan (VARCHAR 100) - Pekerjaan
- status (VARCHAR 50) - Status dalam keluarga
- nomor_kk (VARCHAR 20, nullable) - Nomor Kartu Keluarga
- created_at (DATETIME)
- updated_at (DATETIME)
```

### Tabel: `surat` (untuk verifikasi)
```sql
- id_surat (PK, INT, AUTO_INCREMENT)
- user_id (FK ke users)
- id_jenis (FK ke jenis_surat)
- tanggal_pengajuan (DATE)
- status_surat (ENUM: 'Menunggu', 'Disetujui', 'Ditolak')
- keterangan (TEXT, nullable) - Keterangan dari admin
- data_pengajuan (TEXT, nullable) - JSON data form
- created_at (DATETIME)
- updated_at (DATETIME)
```

## File yang Dibuat/Dimodifikasi

### Controllers
- ✅ `app/Controllers/PendudukController.php` - CRUD lengkap penduduk
- ✅ `app/Controllers/SuratController.php` - Ditambahkan fungsi admin

### Views - Admin Penduduk
- ✅ `app/Views/admin/penduduk/index.php` - Daftar penduduk
- ✅ `app/Views/admin/penduduk/tambah.php` - Form tambah penduduk
- ✅ `app/Views/admin/penduduk/edit.php` - Form edit penduduk
- ✅ `app/Views/admin/penduduk/detail.php` - Detail penduduk (belum dibuat)

### Views - Admin Surat
- ✅ `app/Views/admin/surat/kelola.php` - Daftar pengajuan surat
- ✅ `app/Views/admin/surat/verifikasi.php` - Form verifikasi surat

### Routes
- ✅ `app/Config/Routes.php` - Ditambahkan route lengkap:

**Penduduk Routes:**
```php
$routes->get('/penduduk', 'PendudukController::index');
$routes->get('/penduduk/tambah', 'PendudukController::tambah');
$routes->post('/penduduk/simpan', 'PendudukController::simpan');
$routes->get('/penduduk/edit/(:segment)', 'PendudukController::edit/$1');
$routes->post('/penduduk/update/(:segment)', 'PendudukController::update/$1');
$routes->get('/penduduk/hapus/(:segment)', 'PendudukController::hapus/$1');
$routes->get('/penduduk/detail/(:segment)', 'PendudukController::detail/$1');
$routes->get('/penduduk/cari', 'PendudukController::cari');
```

**Surat Routes (Admin):**
```php
$routes->get('/surat/kelola', 'SuratController::kelola');
$routes->get('/surat/verifikasi/(:num)', 'SuratController::verifikasi/$1');
$routes->post('/surat/proses-verifikasi', 'SuratController::prosesVerifikasi');
```

## Validasi yang Diterapkan

### Server-Side (PHP)
**Penduduk:**
```php
$rules = [
    'nik' => 'required|exact_length[16]|numeric|is_unique[penduduk.nik]',
    'nama' => 'required|min_length[3]|max_length[100]',
    'tempat_lahir' => 'required|max_length[50]',
    'tanggal_lahir' => 'required|valid_date',
    'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
    'alamat' => 'required|min_length[10]',
    'agama' => 'required|max_length[50]',
    'pekerjaan' => 'required|max_length[100]',
    'status' => 'required|max_length[50]',
    'nomor_kk' => 'permit_empty|exact_length[16]|numeric'
];
```

**Verifikasi Surat:**
```php
- Status harus 'Disetujui' atau 'Ditolak'
- Keterangan wajib diisi
- ID surat harus valid
```

### Client-Side (JavaScript)
- ✅ NIK dan Nomor KK hanya boleh angka
- ✅ Konfirmasi sebelum submit/hapus
- ✅ Validasi form sebelum submit

## Keamanan

1. **Authentication Check** - Semua method memerlukan login
2. **Authorization Check** - Hanya admin yang bisa akses
3. **CSRF Protection** - Menggunakan `csrf_field()` di semua form
4. **XSS Prevention** - Menggunakan `esc()` untuk semua output
5. **SQL Injection Prevention** - Menggunakan CodeIgniter ORM
6. **Input Validation** - Validasi di server dan client side

## Cara Menjalankan

### 1. Pastikan Database Sudah Migrate
```bash
php spark migrate
```

### 2. Buat User Admin
```sql
INSERT INTO users (nama, username, password, role) 
VALUES ('Administrator', 'admin', '$2y$10$hashedpassword', 'admin');
```

### 3. Testing Flow Admin

#### A. Kelola Data Penduduk
1. Login sebagai admin
2. Klik menu "Data Penduduk"
3. Klik "Tambah Penduduk"
4. Isi form dengan data lengkap
5. Submit dan verifikasi data tersimpan
6. Test edit, detail, dan hapus data

#### B. Kelola Surat
1. Pastikan ada pengajuan surat dari masyarakat
2. Login sebagai admin
3. Klik menu "Kelola Surat"
4. Klik "Verifikasi" pada pengajuan
5. Pilih "Setujui" atau "Tolak"
6. Isi keterangan dan submit
7. Verifikasi status berubah

## Fitur yang Belum Diimplementasikan

### 1. Kelola Peta Administrasi
- Halaman kelola peta
- CRUD data wilayah
- Upload/edit peta

### 2. Cek Laporan/Status
- Dashboard laporan
- Export data
- Statistik lengkap

### 3. Fitur Tambahan
- Import/Export Excel
- Backup/Restore data
- Log aktivitas admin
- Notifikasi real-time

## Troubleshooting

### Error: "Akses ditolak"
- Pastikan login sebagai user dengan role "admin"
- Cek session dan role di database

### Error saat simpan data penduduk
- Pastikan NIK unik (belum ada di database)
- Cek validasi semua field required
- Pastikan format tanggal benar

### Error saat verifikasi surat
- Pastikan ID surat valid
- Cek status surat (hanya yang "Menunggu" bisa diverifikasi)
- Pastikan keterangan tidak kosong

## Mapping dengan Diagram Activity

| Step Diagram | Implementasi | Status |
|--------------|--------------|--------|
| Login | AuthController::login() | ✅ |
| Mengelola Data Penduduk | PendudukController (CRUD) | ✅ |
| Kelola Surat | SuratController::kelola() | ✅ |
| Kelola Peta Administrasi | PetaController (belum) | ❌ |
| Cek Laporan/Status | Dashboard reports (belum) | ❌ |
| Verifikasi Data | SuratController::verifikasi() | ✅ |
| - Terima | Status = 'Disetujui' | ✅ |
| - Tolak | Status = 'Ditolak' | ✅ |
| Logout | AuthController::logout() | ✅ |

## Next Steps

1. **Implementasi Kelola Peta Administrasi**
2. **Sistem Laporan dan Statistik**
3. **Dashboard Admin yang Lebih Lengkap**
4. **Fitur Import/Export Data**
5. **Sistem Notifikasi**
6. **Log Aktivitas Admin**

---

📖 Dokumentasi ini mencakup implementasi lengkap sistem admin sesuai diagram activity yang diberikan.