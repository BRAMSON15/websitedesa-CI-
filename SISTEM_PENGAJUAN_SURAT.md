# Sistem Pengajuan Surat untuk Masyarakat

## Deskripsi
Sistem pengajuan surat online untuk masyarakat yang memungkinkan warga desa mengajukan berbagai jenis surat secara digital sesuai dengan diagram activity yang telah ditentukan.

## Alur Sistem (Sesuai Diagram Activity)

```
1. User Login
2. Pilih "Ajukan Surat"
3. Sistem menampilkan jenis surat yang tersedia
4. User memilih jenis surat
5. Sistem menampilkan form pengajuan
6. User mengisi formulir
7. Sistem melakukan validasi:
   - Jika VALID: Menampilkan pesan berhasil dan masuk ke menu cetak surat
   - Jika TIDAK VALID: Menampilkan pesan error
8. Selesai
```

## Fitur yang Telah Dibuat

### 1. Halaman Pilih Jenis Surat (`/surat/ajukan`)
**File:** `app/Views/surat/pilih_jenis.php`

**Fitur:**
- Menampilkan semua jenis surat yang tersedia dalam bentuk card
- Setiap card menampilkan nama surat dan deskripsi singkat
- Klik card untuk langsung ke form pengajuan
- Info box dengan petunjuk pengajuan surat

### 2. Halaman Form Pengajuan (`/surat/form/{id_jenis}`)
**File:** `app/Views/surat/form_pengajuan.php`

**Fitur:**
- Form dinamis untuk pengajuan surat
- Field yang tersedia:
  - Nama Pemohon (otomatis dari session)
  - Jenis Surat (otomatis dari pilihan)
  - Keperluan/Tujuan Surat (required, min 10 karakter)
  - Alamat Lengkap (required)
  - NIK (required, 16 digit)
  - Tempat & Tanggal Lahir (required)
  - Jenis Kelamin (required)
  - Pekerjaan (required)
  - Keterangan Tambahan (optional)
- Checkbox pernyataan kebenaran data
- Validasi client-side dan server-side
- Konfirmasi sebelum submit

### 3. Proses Submit (`POST /surat/submit`)
**Controller:** `SuratController::submit()`

**Proses:**
1. Validasi autentikasi user
2. Validasi input form (keperluan minimal 10 karakter)
3. Mengumpulkan semua data form
4. Menyimpan data ke database dengan format JSON di field `data_pengajuan`
5. Status awal: "Menunggu"
6. Redirect ke halaman status dengan pesan sukses/error

### 4. Halaman Status Pengajuan (`/surat/status`)
**File:** `app/Views/surat/status_pengajuan.php`

**Fitur:**
- Summary cards: Total, Menunggu, Disetujui, Ditolak
- Tabel daftar semua pengajuan user
- Informasi: No, Jenis Surat, Tanggal, Status
- Badge status dengan warna berbeda:
  - Menunggu: Kuning
  - Disetujui: Hijau
  - Ditolak: Merah
- Tombol detail untuk setiap pengajuan
- Empty state jika belum ada pengajuan

### 5. Halaman Detail Pengajuan (`/surat/detail/{id_surat}`)
**File:** `app/Views/surat/detail_pengajuan.php`

**Fitur:**
- Status card dengan warna sesuai status
- Informasi surat lengkap
- Data pemohon lengkap
- Keperluan dan keterangan
- Keterangan dari petugas (jika ada)
- Tombol cetak (untuk surat yang disetujui)

## Struktur Database

### Tabel: `surat`
```sql
- id_surat (PK, INT, AUTO_INCREMENT)
- user_id (FK ke users)
- id_jenis (FK ke jenis_surat)
- tanggal_pengajuan (DATE)
- status_surat (ENUM: 'Menunggu', 'Disetujui', 'Ditolak')
- keterangan (TEXT, nullable) - untuk catatan dari petugas
- data_pengajuan (TEXT, nullable) - JSON data form
- created_at (DATETIME)
- updated_at (DATETIME)
```

### Tabel: `jenis_surat`
```sql
- id_jenis (PK, INT, AUTO_INCREMENT)
- nama_surat (VARCHAR 100)
- template (TEXT, nullable) - deskripsi/template surat
```

## File yang Dibuat/Dimodifikasi

### Controllers
- ✅ `app/Controllers/SuratController.php` - Dimodifikasi dengan fungsi lengkap

### Views
- ✅ `app/Views/surat/pilih_jenis.php` - Halaman pilih jenis surat
- ✅ `app/Views/surat/form_pengajuan.php` - Form pengajuan surat
- ✅ `app/Views/surat/status_pengajuan.php` - Daftar status pengajuan
- ✅ `app/Views/surat/detail_pengajuan.php` - Detail pengajuan

### Routes
- ✅ `app/Config/Routes.php` - Ditambahkan route baru:
  - `GET /surat/ajukan` - Pilih jenis surat
  - `GET /surat/form/(:num)` - Form pengajuan
  - `POST /surat/submit` - Submit pengajuan
  - `GET /surat/status` - Status pengajuan
  - `GET /surat/detail/(:num)` - Detail pengajuan

### Seeders
- ✅ `app/Database/Seeds/JenisSuratSeeder.php` - Data jenis surat

## Jenis Surat yang Tersedia

1. **Surat Keterangan Domisili**
2. **Surat Keterangan Tidak Mampu (SKTM)**
3. **Surat Keterangan Usaha**
4. **Surat Pengantar Nikah**
5. **Surat Keterangan Kelahiran**
6. **Surat Keterangan Kematian**
7. **Surat Keterangan Pindah**
8. **Surat Keterangan Penghasilan**
9. **Surat Keterangan Ahli Waris**
10. **Surat Keterangan Belum Menikah**

## Cara Menjalankan

### 1. Jalankan Migration (jika belum)
```bash
php spark migrate
```

### 2. Jalankan Seeder untuk Jenis Surat
```bash
php spark db:seed JenisSuratSeeder
```

### 3. Pastikan User Sudah Ada
Gunakan seeder yang sudah ada atau buat user manual dengan role "masyarakat"

### 4. Testing Flow
1. Login sebagai user dengan role "masyarakat"
2. Klik menu "Ajukan Surat" atau tombol di dashboard
3. Pilih jenis surat yang diinginkan
4. Isi formulir dengan lengkap
5. Centang pernyataan dan submit
6. Cek status di menu "Status Pengajuan"
7. Klik "Detail" untuk melihat detail pengajuan

## Validasi yang Diterapkan

### Server-Side (Controller)
- ✅ User harus login
- ✅ ID jenis surat harus valid
- ✅ Keperluan minimal 10 karakter
- ✅ Semua field required harus diisi

### Client-Side (JavaScript)
- ✅ NIK hanya boleh angka
- ✅ NIK harus 16 digit
- ✅ Checkbox pernyataan harus dicentang
- ✅ Konfirmasi sebelum submit

## Keamanan

1. **CSRF Protection** - Menggunakan `csrf_field()` di semua form
2. **XSS Prevention** - Menggunakan `esc()` untuk semua output
3. **Authentication Check** - Semua method memerlukan login
4. **Authorization** - User hanya bisa melihat pengajuan miliknya sendiri
5. **Input Validation** - Validasi di server dan client side

## Fitur Tambahan yang Bisa Dikembangkan

1. **Upload Dokumen Pendukung** - Untuk lampiran KTP, KK, dll
2. **Notifikasi Real-time** - Email/SMS saat status berubah
3. **Tracking Timeline** - Riwayat perubahan status
4. **Cetak Surat PDF** - Generate PDF surat yang disetujui
5. **Rating & Feedback** - User bisa memberi rating layanan
6. **Chat dengan Petugas** - Komunikasi langsung untuk klarifikasi
7. **Reminder** - Pengingat untuk melengkapi dokumen

## Catatan Penting

1. Data pengajuan disimpan dalam format JSON di field `data_pengajuan`
2. Status default pengajuan adalah "Menunggu"
3. Field `keterangan` diisi oleh admin/kepala desa saat approve/reject
4. Tanggal pengajuan otomatis diisi dengan tanggal hari ini
5. Sistem menggunakan session untuk autentikasi

## Troubleshooting

### Error: "Pilih jenis surat terlebih dahulu"
- Pastikan mengakses form melalui halaman pilih jenis surat
- Jangan akses URL `/surat/form/` secara langsung tanpa ID

### Error: "Jenis surat tidak ditemukan"
- Pastikan seeder jenis surat sudah dijalankan
- Cek apakah ID jenis surat valid di database

### Data tidak tersimpan
- Cek apakah semua field required sudah diisi
- Lihat error di console browser atau log CodeIgniter
- Pastikan database connection berfungsi

## Kontak & Support

Untuk pertanyaan atau masalah, hubungi tim developer atau buka issue di repository.
