<?php
require 'vendor/autoload.php';
$config = new \CodeIgniter\Config\Database();
$db = $config->connect('default');

// Update profil desa dengan gambar
$db->table('profil_desa')->update([
    'gambar_sejarah' => 'sejarah_1782278306_1782278306_e0c96230b8c02ce3b0b4.jpeg'
], ['nama_desa' => 'Desa Tifu']);

echo "Data profil berhasil diupdate dengan gambar sejarah!";
?>
