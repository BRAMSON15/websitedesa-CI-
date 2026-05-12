# Perubahan Dashboard - Pemisahan Beranda per Role User

## Ringkasan Perubahan

Dashboard telah dipisahkan menjadi 3 tampilan berbeda berdasarkan role user:
1. **Dashboard Admin** - `app/Views/dashboard/admin.php`
2. **Dashboard Kepala Desa** - `app/Views/dashboard/kepala_desa.php`
3. **Dashboard Masyarakat** - `app/Views/dashboard/masyarakat.php`

## File yang Dibuat

### 1. Dashboard Admin (`app/Views/dashboard/admin.php`)
**Fitur:**
- Statistik: Total Penduduk, Surat Menunggu, Surat Selesai, Wilayah Administrasi
- Menu navigasi khusus admin
- Aksi cepat: Tambah Penduduk, Kelola Surat, Kelola Konten, Kelola Peta
- Tampilan aktivitas terbaru

### 2. Dashboard Kepala Desa (`app/Views/dashboard/kepala_desa.php`)
**Fitur:**
- Statistik: Menunggu Persetujuan, Surat Disetujui, Surat Ditolak, Total Penduduk
- Menu navigasi khusus kepala desa
- Aksi cepat: Tinjau Pengajuan, Lihat Peta Desa
- Daftar surat menunggu persetujuan

### 3. Dashboard Masyarakat (`app/Views/dashboard/masyarakat.php`)
**Fitur:**
- Statistik: Surat Diajukan, Surat Disetujui, Dalam Proses, Surat Ditolak
- Menu navigasi khusus masyarakat
- Layanan cepat: Ajukan Surat, Cek Status, Lihat Peta, Profil Saya
- Kartu informasi dan bantuan
- Riwayat pengajuan surat

## File yang Dimodifikasi

### `app/Controllers/DashboardController.php`
**Perubahan:**
- Menambahkan import model: `PendudukModel`, `SuratModel`, `PetaAdministrasiModel`
- Menambahkan logika untuk mengambil statistik berdasarkan role
- Mengarahkan ke view yang sesuai berdasarkan role user:
  - `admin` → `dashboard/admin`
  - `kepala_desa` → `dashboard/kepala_desa`
  - `masyarakat` → `dashboard/masyarakat`

**Statistik yang Ditampilkan:**

#### Admin:
- `total_penduduk` - Total semua penduduk
- `surat_menunggu` - Surat dengan status "Menunggu"
- `surat_selesai` - Surat dengan status "Disetujui"
- `total_wilayah` - Total wilayah administrasi

#### Kepala Desa:
- `total_penduduk` - Total semua penduduk
- `surat_menunggu` - Surat dengan status "Menunggu"
- `surat_disetujui` - Surat disetujui bulan ini
- `surat_ditolak` - Surat ditolak bulan ini

#### Masyarakat:
- `surat_diajukan` - Total surat yang diajukan user
- `surat_disetujui` - Surat user yang disetujui
- `surat_proses` - Surat user yang sedang diproses
- `surat_ditolak` - Surat user yang ditolak

## Catatan Penting

1. **Field Database**: Menggunakan field `status_surat` dengan nilai ENUM: 'Menunggu', 'Disetujui', 'Ditolak'
2. **Session Data**: Memerlukan `user_id`, `nama`, dan `role` dalam session
3. **File Lama**: File `app/Views/dashboard/index.php` masih ada sebagai backup, bisa dihapus jika tidak diperlukan

## Cara Kerja

1. User login dan session menyimpan `role` user
2. `DashboardController` membaca role dari session
3. Controller mengambil data statistik sesuai role
4. Controller mengarahkan ke view yang sesuai dengan role
5. View menampilkan dashboard yang disesuaikan dengan kebutuhan role

## Testing

Untuk menguji perubahan ini:
1. Login sebagai user dengan role `admin`
2. Login sebagai user dengan role `kepala_desa`
3. Login sebagai user dengan role `masyarakat`
4. Pastikan setiap role menampilkan dashboard yang berbeda dengan statistik yang sesuai
