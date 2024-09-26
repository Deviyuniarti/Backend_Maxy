<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Sistem Penilaian Siswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h1>Sistem Penilaian Siswa</h1>
            </div>
            <div class="card-body">
                <!-- Form untuk input data siswa -->
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nama">Nama Siswa:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai1">Nilai 1:</label>
                        <input type="number" class="form-control" id="nilai1" name="nilai1" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai2">Nilai 2:</label>
                        <input type="number" class="form-control" id="nilai2" name="nilai2" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai3">Nilai 3:</label>
                        <input type="number" class="form-control" id="nilai3" name="nilai3" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                </form>
                <hr>

                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Rata-Rata</th>
                            <th>Predikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Array Siswa dan Nilai default
                            $siswa = [
                                ["nama" => "Devi Yuniarti", "nilai" => [85, 90, 88]],
                                ["nama" => "Syita Dwi Safitri", "nilai" => [78, 82, 84]],
                                ["nama" => "Muh Ikra", "nilai" => [92, 89, 94]],
                                ["nama" => "Rizwan Usra", "nilai" => [70, 75, 72]],
                            ];

                            // Jika form di-submit, tambahkan data baru ke array siswa
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $nama = $_POST['nama'];
                                $nilai1 = (int)$_POST['nilai1'];
                                $nilai2 = (int)$_POST['nilai2'];
                                $nilai3 = (int)$_POST['nilai3'];

                                // Tambah data siswa baru ke array
                                $siswa[] = [
                                    "nama" => $nama,
                                    "nilai" => [$nilai1, $nilai2, $nilai3]
                                ];
                            }

                            // Fungsi untuk menghitung rata-rata nilai
                            function hitungRataRata($nilai) {
                                $totalNilai = array_sum($nilai);
                                $jumlahPelajaran = count($nilai);
                                return $totalNilai / $jumlahPelajaran;
                            }

                            // Looping untuk menampilkan hasil penilaian
                            foreach ($siswa as $dataSiswa) {
                                $nama = $dataSiswa['nama'];
                                $nilai = $dataSiswa['nilai'];
                                $rataRata = hitungRataRata($nilai);

                                // Menentukan Predikat
                                if ($rataRata >= 85) {
                                    $predikat = "A";
                                    $predikat_class = "badge badge-success";
                                } elseif ($rataRata >= 75) {
                                    $predikat = "B";
                                    $predikat_class = "badge badge-primary";
                                } elseif ($rataRata >= 65) {
                                    $predikat = "C";
                                    $predikat_class = "badge badge-warning";
                                } else {
                                    $predikat = "D";
                                    $predikat_class = "badge badge-danger";
                                }

                                // Tampilan data Dalam Tabel
                                echo "<tr>";
                                echo "<td>$nama</td>";
                                echo "<td>" . implode(", ", $nilai) . "</td>";
                                echo "<td>" . number_format($rataRata, 2) . "</td>";
                                echo "<td><span class='$predikat_class'>$predikat</span></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>