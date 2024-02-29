


<!-- Detail ulasan -->
<div class="container mt-4">
    <h2 class="text-center">Detail Ulasan</h2>
   <?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah parameter id sudah diberikan
if (isset($_GET['id'])) {
    // Ambil nilai id dari parameter
    $buku_id = $_GET['id'];

    // Query untuk mendapatkan informasi judul buku
    $query_buku = "SELECT judul FROM buku WHERE buku_id = $buku_id";
    $result_buku = $conn->query($query_buku);

    if ($result_buku->num_rows > 0) {
        // Tampilkan informasi judul buku
        $row_buku = $result_buku->fetch_assoc();
        echo "<h1>Detail Ulasan Buku: " . $row_buku['judul'] . "</h1>";

        // Query untuk mendapatkan ulasan buku
        $query_ulasan = "SELECT buku_ulasan.ulasan, buku_ulasan.rating, user.username
                         FROM buku_ulasan
                         INNER JOIN user ON buku_ulasan.user_id = user.user_id
                         WHERE buku_ulasan.buku_id = $buku_id";
        $result_ulasan = $conn->query($query_ulasan);

        if ($result_ulasan->num_rows > 0) {
            // Tampilkan ulasan buku
            while ($row_ulasan = $result_ulasan->fetch_assoc()) {
                echo "<h2>Ulasan:</h2>";
                echo "<p>Rating: " . $row_ulasan['rating'] . "</p>";
                echo "<p>Username: " . $row_ulasan['username'] . "</p>";
                echo "<p>Ulasan: " . $row_ulasan['ulasan'] . "</p>";
            }
        } else {
            // Jika buku tidak memiliki ulasan
            echo "<p>Buku ini belum memiliki ulasan.</p>";
        }
    } else {
        // Jika id buku tidak ditemukan
        echo "<p>Buku tidak ditemukan.</p>";
    }
} else {
    // Jika parameter id tidak diberikan
    echo "<p>Parameter id tidak diberikan.</p>";
}

// Tutup koneksi
$conn->close();
?>
</div>
