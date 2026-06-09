<?php
// Simulate registering and logging in
require 'system/bootstrap.php';
$db = \Config\Database::connect();
$userModel = new \App\Models\UserModel();
$pendudukModel = new \App\Models\PendudukModel();

// Registration data
$nik = '1234567890123456';
$nama = 'Test Register';
$username = 'testregister';

$userData = [
    'nama' => $nama,
    'nik' => $nik,
    'username' => $username,
    'email' => 'test@test.com',
    'no_telepon' => '08123456789',
    'alamat' => 'Test Alamat',
    'password' => password_hash($nik, PASSWORD_DEFAULT),
    'role' => 'masyarakat'
];

$userModel->insert($userData);
$userId = $userModel->insertID();

$user = $userModel->find($userId);
echo "Registered user:\n";
print_r($user);

// Simulate Login
$inputUsername = 'Test Register';
$inputPassword = $nik;

$users = $userModel->groupStart()
                   ->where('username', $inputUsername)
                   ->orWhere('nama', $inputUsername)
                   ->groupEnd()
                   ->findAll();

echo "\nLogin Matches:\n";
print_r($users);

$validUser = null;
foreach($users as $u) {
    if (password_verify($inputPassword, $u['password']) || $inputPassword == $u['password']) {
        $validUser = $u;
        break;
    } else if ($u['role'] === 'masyarakat' && $inputPassword === $u['nik']) {
        $validUser = $u;
        break;
    }
}

if ($validUser) {
    echo "\nLogin SUCCESS!\n";
} else {
    echo "\nLogin FAILED!\n";
}
