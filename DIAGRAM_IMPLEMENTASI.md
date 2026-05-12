# Implementasi Diagram Activity - Sistem Pengajuan Surat

## Diagram Activity (Sesuai Gambar)

```
┌─────────────────────────────────────────────────────────────────┐
│                         USER SIDE                               │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ●  START                                                       │
│  │                                                              │
│  ▼                                                              │
│ ┌──────────┐                                                    │
│ │  Login   │                                                    │
│ └────┬─────┘                                                    │
│      │                                                          │
│      ▼                                                          │
│ ┌──────────────┐                                               │
│ │ Ajukan Surat │────────────────────────┐                      │
│ └──────────────┘                        │                      │
│                                         │                      │
│                                         ▼                      │
│                              ┌─────────────────────┐           │
│                              │ menampilkan         │           │
│                              │ jenis surat         │           │
│                              └──────────┬──────────┘           │
│                                         │                      │
│ ┌──────────────────┐                   │                      │
│ │ pilih jenis surat│◄──────────────────┘                      │
│ └────────┬─────────┘                                           │
│          │                                                     │
│          ▼                                                     │
│ ┌──────────────┐                                               │
│ │ isi formulir │────────────────────────┐                      │
│ └──────────────┘                        │                      │
│                                         │                      │
│                                         ▼                      │
│                              ┌─────────────────────┐           │
│                              │ kirim pengajuan     │           │
│                              └──────────┬──────────┘           │
│                                         │                      │
│                                         ▼                      │
│                              ┌─────────────────────┐           │
│                              │   Validasi Data     │           │
│                              └──────────┬──────────┘           │
│                                         │                      │
│                        ┌────────────────┴────────────────┐     │
│                        │                                 │     │
│                   Tidak Valid                        Valid     │
│                        │                                 │     │
│                        ▼                                 ▼     │
│              ┌──────────────────┐           ┌──────────────────┐
│              │ menampilkan      │           │ menampilkan      │
│              │ pesan error      │           │ pesan berhasil   │
│              │                  │           │ dan masuk ke     │
│              │                  │           │ menu cetak surat │
│              └────────┬─────────┘           └────────┬─────────┘
│                       │                              │         │
│                       └──────────────┬───────────────┘         │
│                                      │                         │
│                                      ▼                         │
│                                     ═══                        │
│                                      ●  END                    │
│                                                                │
└────────────────────────────────────────────────────────────────┘
```

## Mapping Implementasi

### 1. START → Login
**Implementasi:** `AuthController::login()`
- File: `app/Controllers/AuthController.php`
- View: `app/Views/auth/login.php`
- User login dengan username dan password

### 2. Ajukan Surat
**Implementasi:** `SuratController::ajukan()`
- Route: `GET /surat/ajukan`
- View: `app/Views/surat/pilih_jenis.php`
- User mengklik menu "Ajukan Surat"

### 3. Menampilkan Jenis Surat (SISTEM)
**Implementasi:** `SuratController::ajukan()`
```php
$jenisSurat = $this->jenisSuratModel->findAll();
return view('surat/pilih_jenis', ['jenis_surat' => $jenisSurat]);
```
- Sistem mengambil data dari tabel `jenis_surat`
- Menampilkan dalam bentuk card yang menarik

### 4. Pilih Jenis Surat
**Implementasi:** Link di card jenis surat
```php
<a href="<?= base_url('/surat/form/' . $jenis['id_jenis']) ?>">
```
- User klik salah satu jenis surat
- Redirect ke form pengajuan dengan ID jenis

### 5. Isi Formulir
**Implementasi:** `SuratController::form($id_jenis)`
- Route: `GET /surat/form/(:num)`
- View: `app/Views/surat/form_pengajuan.php`
- Form dengan field:
  - Keperluan (textarea, required, min 10 char)
  - Alamat (textarea, required)
  - NIK (input, required, 16 digit)
  - Tempat & Tanggal Lahir (input, required)
  - Jenis Kelamin (select, required)
  - Pekerjaan (input, required)
  - Keterangan Tambahan (textarea, optional)
  - Checkbox Pernyataan (required)

### 6. Kirim Pengajuan (SISTEM)
**Implementasi:** Form submit
```html
<form action="<?= base_url('/surat/submit') ?>" method="POST">
```
- User klik tombol "Kirim Pengajuan"
- Data dikirim ke controller via POST

### 7. Validasi Data (SISTEM)
**Implementasi:** `SuratController::submit()`
```php
$rules = [
    'id_jenis' => 'required|numeric',
    'keperluan' => 'required|min_length[10]',
];

if (!$this->validate($rules)) {
    // TIDAK VALID
    return redirect()->back()->withInput()
        ->with('errors', $this->validator->getErrors());
}

// VALID
$this->suratModel->insert($data);
return redirect()->to('/surat/status')
    ->with('success', 'Pengajuan berhasil');
```

### 8a. Tidak Valid → Menampilkan Pesan Error
**Implementasi:** Redirect back dengan error
```php
return redirect()->back()->withInput()
    ->with('errors', $this->validator->getErrors());
```
- View menampilkan error di bagian atas form
- Data form tetap tersimpan (withInput)
- User bisa memperbaiki dan submit ulang

### 8b. Valid → Menampilkan Pesan Berhasil
**Implementasi:** Redirect ke status dengan success message
```php
return redirect()->to('/surat/status')
    ->with('success', 'Pengajuan surat berhasil dikirim');
```
- View: `app/Views/surat/status_pengajuan.php`
- Menampilkan alert hijau dengan pesan sukses
- User bisa melihat daftar pengajuan dan statusnya

### 9. Menu Cetak Surat
**Implementasi:** Halaman Status & Detail
- Route: `GET /surat/status` - Daftar semua pengajuan
- Route: `GET /surat/detail/(:num)` - Detail satu pengajuan
- Tombol "Cetak Surat" muncul jika status = "Disetujui"

### 10. END
User selesai menggunakan sistem atau logout

## Fitur Tambahan yang Diimplementasikan

### A. Dashboard Masyarakat
- Statistik pengajuan surat
- Quick action untuk ajukan surat
- Informasi dan bantuan

### B. Status Tracking
- Summary cards (Total, Menunggu, Disetujui, Ditolak)
- Tabel dengan badge status berwarna
- Filter dan pencarian (bisa dikembangkan)

### C. Detail Pengajuan
- Informasi lengkap surat
- Data pemohon
- Keperluan dan keterangan
- Keterangan dari petugas (jika ada)
- Timeline status (bisa dikembangkan)

## Validasi yang Diterapkan

### Client-Side (JavaScript)
```javascript
// NIK hanya angka
document.getElementById('nik').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Konfirmasi submit
document.getElementById('formPengajuan').addEventListener('submit', function(e) {
    if(!confirm('Apakah data sudah benar?')) {
        e.preventDefault();
    }
});
```

### Server-Side (PHP)
```php
$rules = [
    'id_jenis' => 'required|numeric',
    'keperluan' => 'required|min_length[10]',
];
```

## Flow Data

```
User Input (Form)
    ↓
POST /surat/submit
    ↓
Validation
    ↓
├─ Invalid → Back with Errors
│
└─ Valid → Save to Database
           ↓
       JSON Format in data_pengajuan
           ↓
       Redirect to /surat/status
           ↓
       Show Success Message
```

## Database Schema

```sql
surat
├─ id_surat (PK)
├─ user_id (FK → users)
├─ id_jenis (FK → jenis_surat)
├─ tanggal_pengajuan
├─ status_surat (Menunggu/Disetujui/Ditolak)
├─ keterangan (dari petugas)
├─ data_pengajuan (JSON)
├─ created_at
└─ updated_at
```

## Contoh Data JSON di data_pengajuan

```json
{
  "keperluan": "Untuk pembuatan KTP baru",
  "alamat": "Jl. Contoh No. 123, RT 01/RW 02",
  "nik": "1234567890123456",
  "tempat_lahir": "Jakarta",
  "tanggal_lahir": "1990-01-01",
  "jenis_kelamin": "Laki-laki",
  "pekerjaan": "Wiraswasta",
  "keterangan_tambahan": "Segera diperlukan"
}
```

## Kesimpulan

✅ Semua step dalam diagram activity telah diimplementasikan  
✅ Validasi data berjalan di client dan server side  
✅ Error handling yang baik  
✅ User experience yang smooth  
✅ Data tersimpan dengan aman  
✅ Status tracking yang jelas  

Sistem siap digunakan dan dapat dikembangkan lebih lanjut! 🚀
