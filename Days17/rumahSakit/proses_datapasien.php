<?php 
   require_once "../database/dbkoneksi.php";

   // Mengambil data dari form
   $_id = $_POST['id_pasien'];
   $_nama_pasien = $_POST['nama_pasien'];
   $_umur = $_POST['umur'];
   $_alamat = $_POST['alamat'];
   $_diagnosa = $_POST['diagnosa'];
   $_tanggal_masuk = $_POST['tanggal_masuk'];
   $_nomor_hp = $_POST['nomor_hp'];

   $_proses = $_POST['proses'];

   // array data (tanpa id_pasien jika proses simpan)
   $ar_data = [$_nama_pasien, $_umur, $_alamat, $_diagnosa, $_tanggal_masuk, $_nomor_hp];

   if($_proses == "Simpan"){
       $sql = "INSERT INTO datapasien (nama_pasien, umur, alamat, diagnosa, tanggal_masuk, nomor_hp) 
               VALUES (?, ?, ?, ?, ?, ?)";
   } else if($_proses == "Update"){
       $ar_data[] =$_POST['id_pasien'];  
       $sql = "UPDATE datapasien SET nama_pasien=?, umur=?, alamat=?, diagnosa=?, tanggal_masuk=?, nomor_hp=? WHERE id_pasien=?";
   }

   // Eksekusi query
   if(isset($sql)){
      $st = $dbh->prepare($sql);
      $st->execute($ar_data);
   }

   header('Location:index.php');
   exit();  
?>
