<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Ulasan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .back-btn {
            margin-bottom: 20px;
        }

        .back-btn a {
            text-decoration: none;
            color: #164863;
            font-size: 18px;
        }

        .back-btn a:hover {
            color: #3559E0;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            color: #164863;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .card p {
            margin: 5px 0;
            color: #555;
        }

        .rating {
            color: gold;
        }

        .rating::before {
            content: "\2605"; /* karakter bintang */
            font-size: 16px;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="back-btn">
            <a href="index_ulasan_buku.php"><i class="fas fa-arrow-left"></i></a>
        </div>
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
                        echo '<div class="card">';
                        echo "<p><strong>Rating:</strong> <span class='rating'>" . $row_ulasan['rating'] . "</span></p>";
                        echo "<p><strong>Username:</strong> " . $row_ulasan['username'] . "</p>";
                        echo "<p><strong>Ulasan:</strong> " . $row_ulasan['ulasan'] . "</p>";
                        echo '</div>';
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
</body>

</html>