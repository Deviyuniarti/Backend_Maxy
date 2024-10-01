<?php
    require_once "../database/dbkoneksi.php";

    if (isset($_GET['id_pasien'])) {
        $_id = $_GET['id_pasien'];
        

        $sql = "SELECT * FROM datapasien WHERE id_pasien=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_id]);
        $row = $st->fetch(PDO::FETCH_ASSOC);

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>View Data Pasien</title>
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
                            View Data Pasien
                        </h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputId" type="text" placeholder="ID Pasien" readonly value="<?= $row['id_pasien'] ?>" />
                                <label for="inputId">ID Pasien</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputNama" type="text" placeholder="Nama Pasien" readonly value="<?= $row['nama_pasien'] ?>" />
                                <label for="inputNama">Nama Pasien</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputUmur" type="text" placeholder="Umur" readonly value="<?= $row['umur'] ?>" />
                                <label for="inputUmur">Umur</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputAlamat" type="text" placeholder="Alamat" readonly value="<?= $row['alamat'] ?>" />
                                <label for="inputAlamat">Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputDiagnosa" type="text" placeholder="Diagnosa" readonly value="<?= $row['diagnosa'] ?>" />
                                <label for="inputDiagnosa">Diagnosa</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputTanggalMasuk" type="text" placeholder="Tanggal Masuk" readonly value="<?= $row['tanggal_masuk'] ?>" />
                                <label for="inputTanggalMasuk">Tanggal Masuk</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputNomorHP" type="text" placeholder="Nomor HP" readonly value="<?= $row['nomor_hp'] ?>" />
                                <label for="inputNomorHP">Nomor HP</label>
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
