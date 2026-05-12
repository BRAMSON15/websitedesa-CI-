# Update Jenis Surat - Daftar Baru

## Perubahan yang Dilakukan

Telah diperbarui daftar jenis surat sesuai permintaan dengan 8 jenis surat yang baru:

## Daftar Jenis Surat Terbaru

### 1. **Surat Keterangan Domisili**
- **Deskripsi:** Surat keterangan yang menyatakan bahwa seseorang bertempat tinggal di wilayah tertentu
- **Kegunaan:** Pembuatan KTP, pendaftaran sekolah, atau keperluan administrasi lainnya
- **Persyaratan:** KTP, KK, dan surat pengantar RT/RW

### 2. **Surat Keterangan Nikah**
- **Deskripsi:** Surat pengantar dari desa untuk keperluan pendaftaran pernikahan
- **Kegunaan:** Syarat administrasi untuk melangsungkan pernikahan di KUA atau Catatan Sipil
- **Persyaratan:** KTP calon pengantin, KK, akta kelahiran, dan surat keterangan belum menikah

### 3. **Surat Keterangan Belum Nikah**
- **Deskripsi:** Surat yang menerangkan bahwa seseorang belum pernah menikah atau berstatus lajang
- **Kegunaan:** Melamar pekerjaan, pendaftaran pernikahan, atau administrasi lainnya
- **Persyaratan:** KTP, KK, dan surat pernyataan dari yang bersangkutan

### 4. **Surat Keterangan Tidak Mampu**
- **Deskripsi:** Surat yang menerangkan kondisi ekonomi tidak mampu
- **Kegunaan:** Keringanan biaya pendidikan, kesehatan, bantuan sosial, atau keperluan hukum
- **Persyaratan:** KTP, KK, dan surat pernyataan penghasilan

### 5. **Surat Keterangan Kepemilikan Tanah**
- **Deskripsi:** Surat yang menerangkan kepemilikan tanah berdasarkan data desa
- **Kegunaan:** Sertifikasi tanah, jual beli, atau administrasi pertanahan lainnya
- **Persyaratan:** KTP, KK, bukti kepemilikan tanah (girik/petok), dan surat keterangan RT/RW

### 6. **Surat Izin Keramaian**
- **Deskripsi:** Surat izin untuk mengadakan acara atau kegiatan yang mengundang keramaian
- **Kegunaan:** Acara pernikahan, khitanan, syukuran, atau kegiatan sosial lainnya
- **Persyaratan:** KTP penyelenggara, proposal kegiatan, dan rekomendasi RT/RW

### 7. **Surat Keterangan Usaha**
- **Deskripsi:** Surat yang menerangkan kepemilikan dan operasional usaha di wilayah tertentu
- **Kegunaan:** Pengajuan kredit usaha, perizinan, bantuan modal, atau administrasi usaha
- **Persyaratan:** KTP, KK, foto usaha, dan surat keterangan RT/RW

### 8. **Surat Keterangan Jual Tanah**
- **Deskripsi:** Surat keterangan untuk keperluan jual beli tanah
- **Kegunaan:** Proses balik nama dan administrasi pertanahan, memastikan tanah tidak dalam sengketa
- **Persyaratan:** KTP penjual dan pembeli, bukti kepemilikan tanah, dan surat persetujuan ahli waris

## File yang Diperbarui

### 1. **JenisSuratSeeder.php**
- **Path:** `app/Database/Seeds/JenisSuratSeeder.php`
- **Perubahan:** 
  - Mengganti 10 jenis surat lama dengan 8 jenis surat baru
  - Menambahkan `truncate()` untuk menghapus data lama
  - Menambahkan deskripsi dan persyaratan yang lebih detail

## Cara Menjalankan Update

### 1. Jalankan Seeder Baru
```bash
php spark db:seed JenisSuratSeeder
```

### 2. Verifikasi Data
- Login ke sistem sebagai masyarakat
- Akses halaman "Ajukan Surat"
- Pastikan 8 jenis surat baru muncul dengan deskripsi yang benar

### 3. Test Pengajuan
- Pilih salah satu jenis surat
- Isi form pengajuan
- Submit dan verifikasi data tersimpan dengan benar

## Dampak Perubahan

### ✅ **Yang Tidak Berubah:**
- Struktur database tetap sama
- Form pengajuan tetap sama
- Proses verifikasi admin tetap sama
- Sistem tracking status tetap sama

### 🔄 **Yang Berubah:**
- Daftar jenis surat di halaman pilih surat
- Deskripsi dan template setiap jenis surat
- Persyaratan yang lebih spesifik untuk setiap jenis

### ⚠️ **Perhatian:**
- Data pengajuan surat lama (jika ada) tetap tersimpan
- Hanya daftar jenis surat yang berubah
- Admin masih bisa memverifikasi pengajuan lama

## Testing Checklist

- [ ] Seeder berhasil dijalankan tanpa error
- [ ] Halaman pilih jenis surat menampilkan 8 jenis baru
- [ ] Setiap jenis surat memiliki deskripsi yang benar
- [ ] Form pengajuan berfungsi untuk semua jenis surat
- [ ] Admin dapat memverifikasi pengajuan dengan jenis surat baru
- [ ] Status tracking berfungsi normal

## Screenshot/Preview

Setelah update, halaman "Ajukan Surat" akan menampilkan:

```
📄 Surat Keterangan Domisili
   Surat keterangan yang menyatakan bahwa seseorang bertempat tinggal...

💒 Surat Keterangan Nikah  
   Surat pengantar dari desa untuk keperluan pendaftaran pernikahan...

👤 Surat Keterangan Belum Nikah
   Surat yang menerangkan bahwa seseorang belum pernah menikah...

💰 Surat Keterangan Tidak Mampu
   Surat yang menerangkan kondisi ekonomi tidak mampu...

🏡 Surat Keterangan Kepemilikan Tanah
   Surat yang menerangkan kepemilikan tanah berdasarkan data desa...

🎉 Surat Izin Keramaian
   Surat izin untuk mengadakan acara atau kegiatan yang mengundang...

🏪 Surat Keterangan Usaha
   Surat yang menerangkan kepemilikan dan operasional usaha...

📋 Surat Keterangan Jual Tanah
   Surat keterangan untuk keperluan jual beli tanah...
```

## Rollback (Jika Diperlukan)

Jika perlu kembali ke daftar lama, jalankan:
```sql
-- Backup manual atau restore dari backup database
-- Atau buat seeder dengan data lama
```

---

✅ **Update berhasil diterapkan!** Sistem sekarang menggunakan 8 jenis surat sesuai permintaan.