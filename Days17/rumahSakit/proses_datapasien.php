<?php 
require_once "../database/dbkoneksi.php";

// Mengambil data dari form dan memvalidasi
$_id = isset($_POST['id_pasien']) ? $_POST['id_pasien'] : null; // Hanya untuk update
$_nama_pasien = $_POST['nama_pasien'] ?? '';
$_umur = $_POST['umur'] ?? 0;
$_alamat = $_POST['alamat'] ?? '';
$_diagnosa = $_POST['diagnosa'] ?? '';
$_tanggal_masuk = $_POST['tanggal_masuk'] ?? '';
$_nomor_hp = $_POST['nomor_hp'] ?? '';

$_proses = $_POST['proses'] ?? '';

if ($_proses == "Simpan") {
    // Array data untuk proses simpan
    $ar_data = [$_nama_pasien, $_umur, $_alamat, $_diagnosa, $_tanggal_masuk, $_nomor_hp];
    
    $sql = "INSERT INTO datapasien (nama_pasien, umur, alamat, diagnosa, tanggal_masuk, nomor_hp) 
            VALUES (?, ?, ?, ?, ?, ?)";
} else if ($_proses == "Update") {
    // Array data untuk proses update
    $ar_data = [$_nama_pasien, $_umur, $_alamat, $_diagnosa, $_tanggal_masuk, $_nomor_hp, $_id];  
    $sql = "UPDATE datapasien SET nama_pasien=?, umur=?, alamat=?, diagnosa=?, tanggal_masuk=?, nomor_hp=? WHERE id_pasien=?";
}

// Eksekusi query
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman index
header('Location: index.php');
exit();  
?>
