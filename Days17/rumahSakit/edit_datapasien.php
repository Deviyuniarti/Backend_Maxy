<?php
    require_once "../database/dbkoneksi.php";
    
    // Cek apakah parameter 'id_pasien' tersedia
    if (isset($_GET['id_pasien'])) {
        $_id = $_GET['id_pasien'];
        
        // Query untuk mengambil data pasien berdasarkan id_pasien
        $sql = "SELECT * FROM datapasien WHERE id_pasien=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_id]);
        $row = $st->fetch(PDO::FETCH_ASSOC); // Mengambil data dalam bentuk array asosiatif
        
        // Jika data tidak ditemukan
        if (!$row) {
            echo "<h2>Data pasien tidak ditemukan.</h2>";
            exit;
        }
    } else {
        // Jika 'id_pasien' tidak tersedia di URL
        echo "<h2>Parameter id_pasien tidak ditemukan di URL.</h2>";
        exit;
    }

    // Jika form di-submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_pasien = $_POST['id_pasien'];
        $nama_pasien = $_POST['nama_pasien'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        $diagnosa = $_POST['diagnosa'];
        $tanggal_masuk = $_POST['tanggal_masuk'];
        $nomor_hp = $_POST['nomor_hp'];

        // Query untuk mengupdate data pasien
        $sql = "UPDATE datapasien SET 
                    nama_pasien=?, umur=?, alamat=?, diagnosa=?, tanggal_masuk=?, nomor_hp=?
                WHERE id_pasien=?";
        $st = $dbh->prepare($sql);
        $st->execute([$nama_pasien, $umur, $alamat, $diagnosa, $tanggal_masuk, $nomor_hp, $id_pasien]);

        // Redirect ke halaman view setelah berhasil mengupdate data
        header("Location:index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(to bottom right, #a8c0ff, #3f2b96);
        }
    </style>
</head>
<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">
                            Edit Data Pasien
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="id_pasien" value="<?= $row['id_pasien'] ?>" />
                            
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputNama" name="nama_pasien" type="text" placeholder="Nama Pasien" value="<?= $row['nama_pasien'] ?>" required />
                                <label for="inputNama">Nama Pasien</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputUmur" name="umur" type="number" placeholder="Umur" value="<?= $row['umur'] ?>" required />
                                <label for="inputUmur">Umur</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputAlamat" name="alamat" type="text" placeholder="Alamat" value="<?= $row['alamat'] ?>" required />
                                <label for="inputAlamat">Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputDiagnosa" name="diagnosa" type="text" placeholder="Diagnosa" value="<?= $row['diagnosa'] ?>" required />
                                <label for="inputDiagnosa">Diagnosa</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputTanggalMasuk" name="tanggal_masuk" type="date" placeholder="Tanggal Masuk" value="<?= $row['tanggal_masuk'] ?>" required />
                                <label for="inputTanggalMasuk">Tanggal Masuk</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputNomorHP" name="nomor_hp" type="text" placeholder="Nomor HP" value="<?= $row['nomor_hp'] ?>" required />
                                <label for="inputNomorHP">Nomor HP</label>
                            </div>
                            
                            <div class="d-flex justify-content-end mt-4 mb-0">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">
                            <a href="index.php">Kembali ke Daftar Pasien</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
