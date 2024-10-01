<?php   
    require_once "../database/dbkoneksi.php";
    $sql = "SELECT * FROM datapasien";
    $rs = $dbh->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien Rumah Sakit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Pasien Rumah Sakit</h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6"></div>
                </div>
                <div class="card mb-4"></div>
                    <a class="btn btn-info mb-3" href="create_datapasien.php" role="button"> <i class="fas fa-plus-circle"></i> Create Pasien</a>
                    <div class="table-responsive text-center">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <th>ID Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>Diagnosa</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Nomor HP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rs as $row) { ?>
                                    <tr>
                                        <td><?= $row['id_pasien'] ?></td>
                                        <td><?= $row['nama_pasien'] ?></td>
                                        <td><?= $row['umur'] ?></td>
                                        <td><?= $row['alamat'] ?></td>
                                        <td><?= $row['diagnosa'] ?></td>
                                        <td><?= $row['tanggal_masuk'] ?></td>
                                        <td><?= $row['nomor_hp'] ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm btn-action" href="view_datapasien.php?id_pasien=<?= $row['id_pasien'] ?>">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="edit_datapasien.php?id_pasien=<?= $row['id_pasien'] ?>">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-info btn-sm" href="delete_datapasien.php?iddel=<?= $row['id_pasien'] ?>" 
                                            onclick="if(!confirm('Anda Yakin Hapus Data Pasien <?= $row['nama_pasien'] ?>?')) {return false}">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
  
</body>
</html>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>