<?php
session_start();

// Check if there's a notification message in the session
if (isset($_SESSION['notification'])) {
    // Display the notification using JavaScript alert
    echo "<script>alert('" . $_SESSION['notification'] . "');</script>";

    // Remove the notification message from the session
    unset($_SESSION['notification']);
}

// Langkah 1: Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

$conn = new mysqli($servername, $username, $password, $dbname);

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

        .card-body button {
            float: left;
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
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Logo -->
                    <a class="navbar-brand" href="#">
                        <img src="../logo.png" width="50" height="55" class="d-inline-block align-top" alt="Your Logo">
                    </a>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary1" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Navbar Akun Pengguna -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle fa-fw fa-2x"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="daftar_bookmark.php"><i class="fas fa-heart"></i></i> Favorite</a>
                                <a class="dropdown-item" href="mengulas.php"><i class="fas fa-comment-alt fa-fw"></i> Ulasan</a>
                                <a class="dropdown-item" href="daftar_pinjam.php"><i class="fas fa-plus-circle fa-fw"></i> Pinjam Buku</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-fw"></i> Keluar</a>
                            </div>

                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-secondary btn-sm float-left mb-3" href="javascript:history.go(-1)">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <h4 class="float-left ml-3">Beri Ulasan</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <?php
                            // Koneksi ke database
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "perpustakaan_digital";
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Koneksi gagal: " . $conn->connect_error);
                            }
                            $id = $_SESSION['user_id'];
                            // Kueri SQL untuk mengambil data peminjaman buku yang sudah dikembalikan bersama dengan user ID
                            $sql = "SELECT peminjaman.*, buku.*, user.user_id AS user_id
                        FROM peminjaman
                        JOIN buku ON peminjaman.buku_id = buku.buku_id
                        JOIN user ON peminjaman.user_id = user.user_id
                        WHERE peminjaman.status_peminjam = 'dikembalikan' AND user.user_id = $id";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Menampilkan data peminjaman
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='col mb-4'>";
                                    echo "<div class='card' style='width: 210px; height: 399px;'>";
                                    echo "<img src='../proses/uploads/" . $row['cover'] . "' class='card-img-top' alt='Cover Buku' style='width: 100%; height: 210px; object-fit: cover;'>";
                                    echo "<div class='card-body'>";
                                    echo "<h5 class='card-title'>" . $row['judul'] . "</h5>";
                                    echo "<p class='card-text'>Peminjam: " . $row['username'] . "</p>";
                                    // Modal untuk mengulas
                                    echo "<button class='btn btn-primary1' data-toggle='modal' data-target='#ulasModal{$row['buku_id']}'>Beri Ulasan</button>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    // Modal untuk mengulas
                                    echo "<div class='modal fade' id='ulasModal{$row['buku_id']}' tabindex='-1' role='dialog' aria-labelledby='ulasModalLabel{$row['buku_id']}' aria-hidden='true'>";
                                    echo "<div class='modal-dialog' role='document'>";
                                    echo "<div class='modal-content'>";
                                    echo "<div class='modal-header'>";
                                    echo "<h5 class='modal-title' id='ulasModalLabel{$row['buku_id']}'>Ulas Buku Ini</h5>";
                                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                    echo "<span aria-hidden='true'>&times;</span>";
                                    echo "</button>";
                                    echo "</div>";
                                    echo "<div class='modal-body'>";
                                    echo "<form action='proses_tambah_ulasan.php' method='POST'>";
                                    echo "<input type='hidden' name='buku_id' value='{$row['buku_id']}'>";
                                    echo "<div class='form-group'>";
                                    echo "<label for='ulasan'>Ulasan:</label>";
                                    echo "<textarea id='ulasan' name='ulasan' rows='4' class='form-control' placeholder='Masukkan ulasan Anda' required></textarea>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo "<label for='rating'>Rating:</label>";
                                    echo "<select name='rating' id='rating' class='form-control' required>";
                                    echo "<option value=''>Pilih Rating</option>";
                                    echo "<option value='1'>1</option>";
                                    echo "<option value='2'>2</option>";
                                    echo "<option value='3'>3</option>";
                                    echo "<option value='4'>4</option>";
                                    echo "<option value='5'>5</option>";
                                    echo "</select>";
                                    echo "</div>";
                                    echo "<button type='submit' class='btn btn-primary'>Kirim Ulasan</button>";
                                    echo "</form>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    // Akhir modal untuk mengulas
                                }
                            } else {
                                echo "Tidak ada data peminjaman buku yang sudah dikembalikan.";
                            }

                            ?>
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

</body>

</html>