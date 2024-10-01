<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(to bottom right, #a8c0ff, #3f2b96);
        }
    </style>
</head>
<body>
    <div class="container-fluid px-2">
        <h2 class="mt-2">Tambah Data Pasien</h2>
        <div class="d-flex justify-content-between mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Tambah Data Pasien</li>
            </ol>
            <a href="index.php" class="btn btn-warning btn-sm" style="height: 40px;">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form action="index.php" method="POST">
                    <input type="hidden" name="id_pasien" value=""> <!-- Field hidden untuk update -->
                    
                    <div class="form-group mb-3">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="umur">Umur</label>
                        <input type="number" name="umur" id="umur" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="diagnosa">Diagnosa</label>
                        <input type="text" name="diagnosa" id="diagnosa" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomor_hp">Nomor HP</label>
                        <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" required>
                    </div>
                    <!-- Value Simpan di sini agar proses di backend mengenali -->
                    <button type="submit" name="proses" value="Simpan" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
