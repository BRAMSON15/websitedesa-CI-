# Panduan Sistem Persetujuan Surat untuk Kepala Desa

## Ringkasan Fitur

Sistem persetujuan surat untuk kepala desa telah diimplementasikan dengan fitur lengkap untuk mengelola pengajuan surat dari masyarakat.

## Fitur Utama

### 1. Dashboard Kepala Desa
- **Lokasi**: `/dashboard`
- **Statistik Real-time**:
  - Surat Menunggu Persetujuan
  - Surat Disetujui (bulan ini)
  - Surat Ditolak (bulan ini)
  - Total Penduduk Terdaftar

### 2. Halaman Persetujuan Surat
- **Lokasi**: `/surat/persetujuan`
- **Fitur**:
  - Tampilan tabbed untuk 3 status: Menunggu, Disetujui, Ditolak
  - Daftar lengkap pengajuan surat dengan informasi:
    - Jenis surat
    - Nama pemohon
    - Tanggal pengajuan
    - Status saat ini
  - Aksi cepat untuk setiap pengajuan

### 3. Tinjau Pengajuan Surat
- **Lokasi**: `/surat/verifikasi/{id_surat}`
- **Fitur**:
  - Tampilan detail lengkap pengajuan
  - Informasi surat dan pemohon
  - Data pengajuan yang diisi pemohon
  - Panel verifikasi untuk:
    - Menyetujui pengajuan
    - Menolak pengajuan dengan alasan
  - Tombol cetak/download PDF untuk surat yang disetujui

### 4. Cetak Surat (PDF)
- **Preview PDF**: `/surat/preview-pdf/{id_surat}`
  - Melihat pratinjau surat dalam format PDF
  - Dapat dibuka di tab baru
  
- **Download PDF**: `/surat/generate-pdf/{id_surat}`
  - Mengunduh surat dalam format PDF
  - Surat sudah terisi dengan data pemohon
  - Format resmi pemerintah desa

## Menu Sidebar Kepala Desa

```
SIDESA
├── Dashboard
├── Persetujuan Surat ← BARU
├── Rekap Peta
├── Profil Desa
└── Struktur Desa
```

## Alur Kerja Persetujuan Surat

### 1. Masyarakat Mengajukan Surat
- Masyarakat login ke sistem
- Pilih jenis surat yang diinginkan
- Isi form pengajuan dengan data lengkap
- Submit pengajuan

### 2. Kepala Desa Menerima Notifikasi
- Dashboard menampilkan jumlah surat menunggu
- Notifikasi di topbar menunjukkan ada pengajuan baru

### 3. Kepala Desa Meninjau Pengajuan
- Buka menu "Persetujuan Surat"
- Lihat daftar surat yang menunggu persetujuan
- Klik "Tinjau" untuk melihat detail lengkap

### 4. Kepala Desa Memverifikasi
- Pilih keputusan: Setujui atau Tolak
- Isi keterangan/alasan
- Klik "Proses Verifikasi"

### 5. Cetak Surat (Jika Disetujui)
- Surat yang disetujui dapat dilihat di tab "Disetujui"
- Klik "Preview" untuk melihat pratinjau
- Klik "Cetak" untuk download PDF
- PDF siap untuk dicetak dan ditandatangani

## Struktur Data

### Tabel Surat
```
id_surat (Primary Key)
id_jenis (Foreign Key ke jenis_surat)
user_id (Foreign Key ke users)
status_surat (Menunggu, Disetujui, Ditolak)
data_pengajuan (JSON - data form yang diisi)
keterangan (Alasan persetujuan/penolakan)
tanggal_pengajuan
created_at
updated_at
```

## Fitur Keamanan

1. **Autentikasi**: Hanya kepala desa yang dapat mengakses halaman persetujuan
2. **Validasi**: Semua data divalidasi sebelum disimpan
3. **Audit Trail**: Semua perubahan status tercatat dengan timestamp
4. **Konfirmasi**: Kepala desa harus mengkonfirmasi keputusan sebelum diproses

## Integrasi dengan Sistem Lain

### Dashboard
- Statistik surat menunggu ditampilkan di dashboard kepala desa
- Link cepat ke halaman persetujuan

### Sidebar
- Menu "Persetujuan Surat" tersedia di sidebar kepala desa
- Status aktif saat berada di halaman persetujuan

### PDF Generator
- Menggunakan TCPDF untuk generate PDF
- Template surat dari database
- Data pemohon otomatis terisi

## Troubleshooting

### Surat tidak muncul di halaman persetujuan
- Pastikan status surat di database adalah "Menunggu"
- Periksa apakah user_id dan id_jenis valid

### PDF tidak bisa didownload
- Pastikan folder `writable/uploads` ada dan writable
- Periksa apakah TCPDF library sudah terinstall

### Notifikasi tidak muncul
- Refresh halaman untuk update data terbaru
- Periksa apakah ada surat dengan status "Menunggu"

## File yang Dimodifikasi/Dibuat

1. **Controller**:
   - `app/Controllers/SuratController.php` - Update method `persetujuan()`

2. **Views**:
   - `app/Views/dashboard/kepala_desa_persetujuan.php` - BARU

3. **Routes**:
   - `/surat/persetujuan` - Sudah ada di Routes.php

## Testing Checklist

- [ ] Login sebagai kepala_desa
- [ ] Buka dashboard - lihat statistik surat menunggu
- [ ] Klik "Persetujuan Surat" di sidebar
- [ ] Lihat daftar surat menunggu di tab pertama
- [ ] Klik "Tinjau" pada salah satu surat
- [ ] Lihat detail lengkap pengajuan
- [ ] Setujui atau tolak pengajuan
- [ ] Lihat surat di tab "Disetujui" atau "Ditolak"
- [ ] Klik "Preview" untuk melihat PDF
- [ ] Klik "Cetak" untuk download PDF
- [ ] Verifikasi PDF berisi data pemohon yang benar

## Catatan Penting

- Setiap perubahan status surat akan dinotifikasi ke pemohon (jika sistem notifikasi email sudah diimplementasikan)
- Keterangan persetujuan/penolakan akan terlihat oleh pemohon di halaman status pengajuan mereka
- PDF yang dihasilkan sudah dalam format resmi pemerintah desa dengan header, logo, dan tempat tanda tangan
