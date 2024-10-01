<?php
    require_once "../database/dbkoneksi.php";
    $id = $_GET['iddel'];
    $sql = "DELETE FROM datapasien WHERE id_pasien =?";
    $statment = $dbh->prepare($sql);
    $statment->execute([$id]);

    header("location:index.php");
?>