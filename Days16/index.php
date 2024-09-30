<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Daftar Buku di Perpustakaan</h1>

    <!-- Form untuk menambah buku baru -->
    <form method="POST">
        <label for="judul">Judul Buku:</label>
        <input type="text" id="judul" name="judul" required>

        <label for="pengarang">Pengarang:</label>
        <input type="text" id="pengarang" name="pengarang" required>

        <label for="tahunTerbit">Tahun Terbit:</label>
        <input type="number" id="tahunTerbit" name="tahunTerbit" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>

        <button type="submit" name="submit">Tambah Buku</button>
    </form>

    <?php
    // Definisi kelas Buku
    class Buku {
        public $judul;
        public $pengarang;
        public $tahunTerbit;
        public $genre;

        public function __construct($judul, $pengarang, $tahunTerbit, $genre) {
            $this->judul = $judul;
            $this->pengarang = $pengarang;
            $this->tahunTerbit = $tahunTerbit;
            $this->genre = $genre;
        }

        public function getDetailBuku() {
            return "<strong>Judul:</strong> {$this->judul} <br> 
                    <strong>Pengarang:</strong> {$this->pengarang} <br> 
                    <strong>Tahun Terbit:</strong> {$this->tahunTerbit} <br> 
                    <strong>Genre:</strong> {$this->genre}";
        }
    }

    // Definisi kelas Perpustakaan
    class Perpustakaan {
        public $lokasi;
        public $daftarBuku = [];

        public function __construct($lokasi) {
            $this->lokasi = $lokasi;
        }

        public function tambahBuku($buku) {
            $this->daftarBuku[] = $buku;
        }

        public function getDaftarBuku() {
            if (empty($this->daftarBuku)) {
                echo "<p>Tidak ada buku di perpustakaan.</p>";
            } else {
                echo "<div class='book-list'>";
                foreach ($this->daftarBuku as $buku) {
                    echo "<div class='book-item'>{$buku->getDetailBuku()}</div>";
                }
                echo "</div>";
            }
        }
    }

    // Membuat objek Perpustakaan
    $perpustakaan = new Perpustakaan("Jakarta");

    // Membuat beberapa objek Buku dan menambahkannya ke dalam Perpustakaan
    $buku1 = new Buku("The Great Gatsby", "F. Scott Fitzgerald", 1925, "Novel");
    $buku2 = new Buku("To Kill a Mockingbird", "Harper Lee", 1960, "Fiction");
    $buku3 = new Buku("1984", "George Orwell", 1949, "Dystopian");
    $buku4 = new Buku("Moby Dick", "Herman Melville", 1851, "Adventure");

    // Menambahkan buku ke dalam Perpustakaan
    $perpustakaan->tambahBuku($buku1);
    $perpustakaan->tambahBuku($buku2);
    $perpustakaan->tambahBuku($buku3);
    $perpustakaan->tambahBuku($buku4);

    // Cek apakah form telah disubmit untuk menambah buku baru
    if (isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $tahunTerbit = $_POST['tahunTerbit'];
        $genre = $_POST['genre'];

        // Membuat objek Buku baru dan menambahkannya ke Perpustakaan
        $bukuBaru = new Buku($judul, $pengarang, $tahunTerbit, $genre);
        $perpustakaan->tambahBuku($bukuBaru);
    }

    // Mencetak daftar buku di perpustakaan
    $perpustakaan->getDaftarBuku();
    ?>
</div>
</body>
</html>
