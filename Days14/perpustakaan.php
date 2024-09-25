<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Perpustakaan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Sistem Manajemen Perpustakaan</h1>
        
        <?php
        session_start();

        // Fungsi untuk mereset session
        function resetSession() {
            session_destroy(); // Menghapus semua data session
            header("Location: " . $_SERVER['PHP_SELF']); // Reload halaman
            exit();
        }

        // Periksa jika tombol reset ditekan
        if (isset($_POST['reset'])) {
            resetSession();
        }

        // Daftar buku di perpustakaan
        $books = [
            "Atomic Habits - James Clear",
            "Madilog - Tan Malaka",
            "Sepatu Dahlan - Khrisna Pabichara",
            "Laskar Pelangi - Andrea Hirata",
            "Bumi Manusia - Pramoedya Ananta Toer"
        ];

        // Inisialisasi daftar buku dan daftar peminjaman jika belum ada di session
        if (!isset($_SESSION['books'])) {
            $_SESSION['books'] = $books;
        } else {
            // Paksa ulang daftar buku sesuai dengan data baru
            $_SESSION['books'] = $books;
        }

        if (!isset($_SESSION['borrowed_books'])) {
            $_SESSION['borrowed_books'] = [];
        }

        // Fungsi untuk menampilkan daftar buku
        function displayBooks() {
            if (empty($_SESSION['books'])) {
                echo "<p>Tidak ada buku yang tersedia di perpustakaan.</p>";
            } else {
                echo "<ul>";
                foreach ($_SESSION['books'] as $index => $book) {
                    echo "<li>$book</li>";
                }
                echo "</ul>";
            }
        }

        // Fungsi untuk meminjam buku
        function borrowBook($index) {
            if (isset($_SESSION['books'][$index])) {
                $book = $_SESSION['books'][$index];
                $_SESSION['borrowed_books'][] = $book; 
                unset($_SESSION['books'][$index]); 
                $_SESSION['books'] = array_values($_SESSION['books']); 
                echo "<p>Anda meminjam: <strong>$book</strong></p>";
            } else {
                echo "<p>Indeks buku tidak valid.</p>";
            }
        }

        // Fungsi untuk mengembalikan buku
        function returnBook($book) {
            $borrowedIndex = array_search($book, $_SESSION['borrowed_books']);
            if ($borrowedIndex !== false) {
                $_SESSION['books'][] = $book; 
                unset($_SESSION['borrowed_books'][$borrowedIndex]); 
                echo "<p>Anda mengembalikan: <strong>$book</strong></p>";
            } else {
                echo "<p>Buku tidak ditemukan dalam daftar pinjaman.</p>";
            }
        }

        // Menu navigasi
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];
            switch ($action) {
                case 'view':
                    echo "<h2>Daftar Buku</h2>";
                    displayBooks();
                    break;
                case 'borrow':
                    $index = $_POST['index'];
                    borrowBook($index);
                    break;
                case 'return':
                    $book = $_POST['book'];
                    returnBook($book);
                    break;
            }
        }
        ?>

        <h2>Menu</h2>
        <form method="POST">
            <button type="submit" name="action" value="view">Lihat Daftar Buku</button>
        </form>

        <form method="POST">
            <label for="index">Peminjaman Buku (Masukkan Indeks Buku):</label>
            <input type="number" id="index" name="index" min="0" max="<?php echo count($_SESSION['books']) - 1; ?>" required>
            <button type="submit" name="action" value="borrow">Pinjam Buku</button>
        </form>

        <form method="POST">
            <label for="book">Pengembalian Buku (Masukkan Judul Buku):</label>
            <input type="text" id="book" name="book" required>
            <button type="submit" name="action" value="return">Kembalikan Buku</button>
        </form>

        <form method="POST">
            <button type="submit" name="reset">Reset Data Session</button>
        </form>
    </div>
</body>
</html>
