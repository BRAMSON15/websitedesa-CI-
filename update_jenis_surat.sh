#!/bin/bash

echo "🔄 Memperbarui Jenis Surat..."
echo "================================"

# Jalankan seeder untuk update jenis surat
echo "📝 Menjalankan seeder jenis surat..."
php spark db:seed JenisSuratSeeder

echo ""
echo "✅ Update selesai!"
echo ""
echo "📋 Jenis surat yang tersedia sekarang:"
echo "1. Surat Keterangan Domisili"
echo "2. Surat Keterangan Nikah"
echo "3. Surat Keterangan Belum Nikah"
echo "4. Surat Keterangan Tidak Mampu"
echo "5. Surat Keterangan Kepemilikan Tanah"
echo "6. Surat Izin Keramaian"
echo "7. Surat Keterangan Usaha"
echo "8. Surat Keterangan Jual Tanah"
echo ""
echo "🌐 Silakan akses: http://localhost:8080/surat/ajukan"
echo "📖 Dokumentasi: UPDATE_JENIS_SURAT.md"