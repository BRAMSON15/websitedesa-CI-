# Quick Start - Sistem Pengajuan Surat

## Setup Cepat

### 1. Jalankan Seeder Jenis Surat
```bash
php spark db:seed JenisSuratSeeder
```

### 2. Login sebagai Masyarakat
- Username: (user dengan role masyarakat)
- Password: (sesuai database)

### 3. Akses Menu
- Dashboard → Ajukan Surat
- Atau langsung ke: `http://localhost:8080/surat/ajukan`

## Alur Penggunaan

```
Login → Pilih Jenis Surat → Isi Form → Submit → Cek Status
```

## URL Penting

| Halaman | URL | Deskripsi |
|---------|-----|-----------|
| Pilih Jenis Surat | `/surat/ajukan` | Memilih jenis surat |
| Form Pengajuan | `/surat/form/{id}` | Mengisi formulir |
| Status Pengajuan | `/surat/status` | Melihat daftar pengajuan |
| Detail Pengajuan | `/surat/detail/{id}` | Detail satu pengajuan |

## Status Surat

- 🟡 **Menunggu** - Pengajuan baru, menunggu review
- 🟢 **Disetujui** - Surat disetujui, bisa dicetak
- 🔴 **Ditolak** - Pengajuan ditolak, lihat keterangan

## Field Form yang Wajib Diisi

✅ Keperluan (min 10 karakter)  
✅ Alamat Lengkap  
✅ NIK (16 digit)  
✅ Tempat & Tanggal Lahir  
✅ Jenis Kelamin  
✅ Pekerjaan  
✅ Checkbox Pernyataan  

## Testing Data

Untuk testing, gunakan data berikut:
- NIK: 1234567890123456
- Alamat: Jl. Contoh No. 123, RT 01/RW 02
- Tempat Lahir: Jakarta
- Tanggal Lahir: 1990-01-01
- Jenis Kelamin: Laki-laki
- Pekerjaan: Wiraswasta
- Keperluan: Untuk keperluan pembuatan KTP baru

## Troubleshooting Cepat

**Tidak ada jenis surat?**
```bash
php spark db:seed JenisSuratSeeder
```

**Error saat submit?**
- Pastikan semua field required terisi
- Cek NIK harus 16 digit angka
- Centang checkbox pernyataan

**Tidak bisa akses halaman?**
- Pastikan sudah login
- Cek role user adalah "masyarakat"

## Fitur Utama

✨ Pilih dari 10+ jenis surat  
✨ Form dinamis dan user-friendly  
✨ Validasi real-time  
✨ Tracking status pengajuan  
✨ Detail lengkap setiap pengajuan  
✨ Responsive design  

## Next Steps

Setelah sistem berjalan:
1. Buat sistem approval untuk admin/kepala desa
2. Tambahkan fitur cetak PDF
3. Implementasi notifikasi
4. Upload dokumen pendukung

---

📖 Dokumentasi lengkap: `SISTEM_PENGAJUAN_SURAT.md`
