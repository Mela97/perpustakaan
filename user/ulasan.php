<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

// Langkah 1: Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM buku_ulasan";

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}



// Tutup koneksi
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User</title>

    <!-- Custom fonts for this template-->
    <link href="../dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .reviews {
            margin-top: 20px;
        }

        .review {
            border-bottom: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }

        .reviewer {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .reviewer .name {
            font-weight: bold;
        }

        .reviewer .date {
            font-size: 12px;
            color: #999;
        }

        .rating {
            display: flex;
            margin-bottom: 10px;
        }

        .rating .star {
            font-size: 20px;
            color: #ddd;
            margin-right: 5px;
        }

        .rating .star.filled {
            color: gold;
        }

        .description {
            line-height: 1.5;
        }

        .rating {
            display: flex;
            margin-bottom: 10px;
        }

        .rating .star {
            font-size: 20px;
            cursor: pointer;
            user-select: none;
        }

        .rating .star.filled {
            color: gold;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }

        .bg-gradient-primary {
            background-color: #164863;
            background-image: linear-gradient(180deg, #164863 10%, #164863 100%);
            background-size: cover;
        }

        .sidebar {
            background-color: #164863;
        }

        .btn-primary1:hover {
            background-color: #427D9D;
            border-color: #427D9D;
            color: #000000;
        }

        .btn-primary1 {
            background-color: #164863;
            border-color: #164863;
            transition: background-color 0.3s ease;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #427D9D;
            border-color: #427D9D;
        }

        .btn-primary {
            background-color: #164863;
            border-color: #164863;
            transition: background-color 0.3s ease;
            color: #ffffff;
        }

        .btn-primary2:hover {
            background-color: #F3B664;
            border-color: #F3B664;
            color: #ffffff;
        }

        .btn-primary2 {
            background-color: #FB8B24;
            border-color: #FB8B24;
            transition: background-color 0.3s ease;
            color: #ffffff;
            font-size: 14px;
        }

        .btn-secondary1 {
            background-color: #3559E0;
            border-color: #3559E0;
            transition: background-color 0.3s ease;
            color: #ffffff;
            font-size: 14px;
        }

        .btn-secondary1:hover {
            background-color: #0174BE;
            border-color: #0174BE;
            color: #ffffff;
        }

        .btn-info1 {
            background-color: #0D9276;
            border-color: #0D9276;
            color: #ffffff;
            font-size: 14px;
        }

        .btn-info1:hover {
            background-color: #43766C;
            border-color: #43766C;
            color: #ffffff;
        }


        .card-body button {
            float: left;
        }

        .font-size-14 {
            font-size: 13px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="padding-top: 90px;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed-top">

                    <!-- Logo -->
                    <a class="navbar-brand" href="#">
                        <img src="../logo.png" width="50" height="55" class="d-inline-block align-top" alt="Your Logo">
                    </a>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Navbar Akun Pengguna -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo $_SESSION['username'];
                                } else {
                                    echo "Pengguna";
                                }
                                ?>
                                <i class="fas fa-user-circle fa-fw fa-2x"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="daftar_bookmark.php"><i class="fas fa-heart"></i> Favorite</a>
                                <a class="dropdown-item" href="mengulas.php"><i class="fas fa-comment-alt fa-fw"></i> Ulasan</a>
                                <a class="dropdown-item" href="daftar_pinjam.php"><i class="fas fa-plus-circle fa-fw"></i> Pinjam Buku</a>
                                <a class="dropdown-item" href="riwayat_pinjam.php"><i class="fas fa-history fa-fw"></i> Riwayat Peminjaman</a>
                                <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-fw"></i> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="col">
                    <a class="btn btn-secondary btn-sm float-left mb-3" href="javascript:history.go(-1)">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h4 class="float-left ml-3">Lihat Ulasan</h4>
                </div>
                <div class="container-fluid d-flex flex-row">
                    <div class="container col-md-4">
                        <div class="card h-100 shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-12 d-flex flex-column">
                                    <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "perpustakaan_digital";

                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    if ($conn->connect_error) {
                                        die("Koneksi gagal: " . $conn->connect_error);
                                    }

                                    if (isset($_GET['buku_id'])) {
                                        $buku_id = $_GET['buku_id'];

                                        $sql_buku = "SELECT * FROM buku WHERE buku_id = $buku_id";
                                        $result_buku = $conn->query($sql_buku);

                                        if ($result_buku && $result_buku->num_rows > 0) {
                                            $row_buku = $result_buku->fetch_assoc();
                                            echo '<img src="../proses/uploads/' . $row_buku['cover'] . '" class="img-fluid rounded-start" alt="Cover Image">';
                                            echo '<div style="text-align: center;">';
                                            echo '<h5 class="card-title mt-2">' . $row_buku['judul'] . '</h5>';
                                            echo '</div>';
                                        } else {
                                            echo 'Buku tidak ditemukan.';
                                        }
                                    } else {
                                        echo 'Parameter buku_id tidak ditemukan.';
                                    }

                                    $conn->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container col-md-8">
                        <div class="card-body">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "perpustakaan_digital";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Koneksi gagal: " . $conn->connect_error);
                            }

                            if (isset($_GET['buku_id'])) {
                                $buku_id = $_GET['buku_id'];

                                $sql_buku = "SELECT * FROM buku WHERE buku_id = $buku_id";
                                $result_buku = $conn->query($sql_buku);

                                if ($result_buku && $result_buku->num_rows > 0) {
                                    $row_buku = $result_buku->fetch_assoc();
                                    echo '<h2 class="card-title">' . $row_buku['penulis'] . '</h2>';
                                    echo '<h2 class="card-text"><b></b> <span class="text-dark">' . $row_buku['judul'] . '</span></h2>';
                                    echo '<hr>';
                                    echo '<h5 class="card-text"><b></b> <span class="text-dark"> Deskripsi Buku</span></h5>';
                                    echo '<p class="font-size-14">' . $row_buku['deskripsi'] . '</p>';
                                    echo '<h6 class="card-text"><b></b> <span class="text-dark">Tahun Terbit:</span></h6>';
                                    echo '<p>' . $row_buku['tahun_terbit'] . '</p>';
                                    echo '<h6 class="card-text"><b></b> <span class="text-dark">Penerbit:</span></h6>';
                                    echo '<p>' . $row_buku['penerbit'] . '</p>';
                                } else {
                                    echo 'Buku tidak ditemukan.';
                                }
                            } else {
                                echo 'Parameter buku_id tidak ditemukan.';
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <h1>Ulasan Buku</h1>
                    <div class="reviews">
                        <?php
                        // Langkah 1: Koneksi ke database
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "perpustakaan_digital";

                        // Membuat koneksi
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Memeriksa koneksi
                        if ($conn->connect_error) {
                            die("Koneksi gagal: " . $conn->connect_error);
                        }

                        // Mendapatkan buku_id dari parameter URL
                        $buku_id = isset($_GET['buku_id']) ? $_GET['buku_id'] : null;

                        // Memastikan buku_id tidak kosong dan merupakan angka
                        if (!empty($buku_id) && is_numeric($buku_id)) {
                            // Jumlah ulasan per halaman
                            $ulasan_per_halaman = 3;

                            // Halaman saat ini
                            $halaman = isset($_GET['page']) ? $_GET['page'] : 1;

                            // Hitung offset
                            $offset = ($halaman - 1) * $ulasan_per_halaman;

                            // Kueri untuk mengambil ulasan berdasarkan halaman
                            $sql_ulasan = "SELECT buku_ulasan.*, buku.judul, user.username FROM buku_ulasan
            INNER JOIN buku ON buku_ulasan.buku_id = buku.buku_id
            INNER JOIN user ON buku_ulasan.user_id = user.user_id
            WHERE buku_ulasan.buku_id = $buku_id
            LIMIT $offset, $ulasan_per_halaman";
                            $result = $conn->query($sql_ulasan);

                            if ($result && $result->num_rows > 0) {
                                // Menampilkan ulasan
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="review">';
                                    echo '<div class="reviewer">';
                                    echo '<span class="name">' . $row['username'] . '</span>';
                                    echo '</div>';
                                    echo '<div class="rating">';

                                    // Menampilkan bintang berdasarkan rating dari database
                                    $rating = $row['rating'];
                                    for ($i = 1; $i <= $rating; $i++) {
                                        echo '<span class="star filled">⭐</span>';
                                    }

                                    echo '</div>';
                                    echo '<div class="description">';
                                    echo '<p>' . $row['ulasan'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                // Menampilkan pesan jika tidak ada ulasan
                                echo '<p>Tidak ada ulasan untuk buku ini.</p>';
                            }

                            // Hitung total halaman
                            $sql_count = "SELECT COUNT(*) AS total FROM buku_ulasan WHERE buku_id = $buku_id";
                            $result_count = $conn->query($sql_count);
                            $row_count = $result_count->fetch_assoc();
                            $total_ulasan = $row_count['total'];
                            $total_halaman = ceil($total_ulasan / $ulasan_per_halaman);

                            // Langkah 7: Buat tombol pagination
                            if ($total_halaman > 1) {
                                echo '<ul class="pagination justify-content-center">';
                                $previous_page = ($halaman > 1) ? $halaman - 1 : 1;
                                $next_page = ($halaman < $total_halaman) ? $halaman + 1 : $total_halaman;
                                echo '<li class="page-item"><a class="page-link btn-primary1" href="?buku_id=' . $buku_id . '&page=' . $previous_page . '"><i class="fas fa-angle-left"></i></a></li>';
                                for ($i = 1; $i <= $total_halaman; $i++) {
                                    echo '<li class="page-item ' . (($halaman == $i) ? "active" : "") . '"><a class="page-link text-primary1" href="?buku_id=' . $buku_id . '&page=' . $i . '">' . $i . '</a></li>';
                                }
                                echo '<li class="page-item"><a class="page-link btn-primary1" href="?buku_id=' . $buku_id . '&page=' . $next_page . '"><i class="fas fa-angle-right"></i></a></li>';
                                echo '</ul>';
                            }
                        }

                        $conn->close();
                        ?>
                    </div>
                    </ </div>
                </div>
            </div>




        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Footer section -->
    <!-- Include footer content here -->

    <?php
    // Tutup koneksi setelah penggunaan hasil kueri

    ?>
</body>

</html>




</div>

</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../login.php">Logout</a>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="../dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../dashboard/vendor/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../dashboard/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../dashboard/vendor/js/demo/chart-area-demo.js"></script>
<script src="../dashboard/vendor/js/demo/chart-pie-demo.js"></script>
<!-- Tambahkan ini di bagian head atau sebelum tag penutup body -->
<script>
    $(document).ready(function() {
        $('.ulasan-btn').click(function() {
            var bukuId = $(this).data('buku-id');
            window.location.href = 'ulasan.php?buku_id=' + bukuId;
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Add an input event listener to the search input
        $("#searchInput").on("input", function() {
            let searchTerm = $(this).val().toLowerCase(); // Get the value of the input and convert to lowercase

            // Keep track if any results are found
            let resultsFound = false;

            // Loop through each searchable card
            $(".searchable").each(function() {
                let cardText = $(this).text().toLowerCase(); // Get the text content of the card and convert to lowercase

                // Check if the card text contains the search term
                if (cardText.includes(searchTerm)) {
                    $(this).show(); // If yes, show the card
                    resultsFound = true; // Mark that results are found
                } else {
                    $(this).hide(); // If no, hide the card
                }
            });

            // Show/hide the no results message based on resultsFound
            if (resultsFound) {
                $("#noResultsMessage").hide();
            } else {
                $("#noResultsMessage").show();
            }
        });
    });
</script>
</body>

</html>