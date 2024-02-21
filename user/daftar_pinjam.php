<?php
session_start();
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_digital";

// Buat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mendapatkan daftar buku
$query = "SELECT buku.*,peminjaman.* FROM buku INNER JOIN peminjaman on peminjaman.buku_id = buku.buku_id ";

// Eksekusi query
$result = $koneksi->query($query);

// Periksa apakah query berhasil dieksekusi
if (!$result) {
    die("Error: " . $koneksi->error);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pinjam</title>

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
            margin-right: 4px;
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

        .btn-info2 {
            background-color: #0D9276;
            border-color: #0D9276;
            color: #ffffff;
            font-size: 14px;
        }

        .btn-info2:hover {
            background-color: #43766C;
            border-color: #43766C;
            color: #ffffff;
        }

        .card {
            float: left;
            margin-right: 10px;
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
                            <h4 class="float-left ml-3">Daftar Buku yang Dipinjam</h4>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <?php
                        if (isset($result) && $result !== null && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row['status_peminjam'] === "dipinjam" && $row['user_id'] == $_SESSION['user_id']) :
                        ?>
                                    <div class="card" style="width: 200px; height: 380px; margin-right: 10px;">
                                        <img src="../proses/uploads/<?php echo $row['cover']; ?>" class="card-img-top" alt="Cover Image" style="width: 100%; height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                            <p class="card-text">Penulis: <?php echo $row['penulis']; ?></p>

                                            <a href='../proses/proses_kembalikan_buku.php?id_buku=<?php echo $row['peminjaman_id']; ?>'>
                                                <button class="btn btn-info2 btn-sm ">Selesai</button>
                                            </a>

                                            <?php
                                            // Tambahkan pengecekan sebelum mengakses kunci tanggal_pinjam
                                            if (isset($row['tanggal_pinjam'])) {
                                            ?>
                                                <small class="text-muted"> <?php echo $row['tanggal_pinjam']; ?></small>
                                            <?php
                                            } else {
                                                // Jika kunci tanggal_pinjam tidak ada, berikan pesan alternatif
                                            ?>
                                                <small class="text-muted">Tanggal Pinjam Tidak Tersedia</small>
                                            <?php
                                            }
                                            // 
                                            ?>
                                        </div>
                                    </div>

                        <?php
                                endif;
                            }
                        } else {
                            echo '<div class="col"><p>Tidak ada buku yang dipinjam.</p></div>';
                        }
                        ?>

                    </div>
                </div>



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
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
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

    <!-- Tambahkan setelah bagian <script src="../dashboard/vendor/js/demo/chart-pie-demo.js"></script> -->
    <script>
        $(document).ready(function() {
            $('.btn-kembalikan').click(function() {
                var id_buku = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: '../proses/proses_kembalikan_buku.php',
                    data: {
                        id_buku: id_buku
                    },
                    success: function(response) {
                        // Tambahkan kode di sini untuk menangani respons setelah buku dikembalikan
                        // Contoh: Tampilkan pesan sukses atau perbarui tampilan buku yang dikembalikan
                        alert("Buku berhasil dikembalikan");
                        // Refresh halaman setelah mengembalikan buku (opsional)
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Tambahkan kode di sini untuk menangani kesalahan saat mengembalikan buku
                        alert('Terjadi kesalahan saat mengembalikan buku: ' + error);
                    }
                });
            });
        });
    </script>

</body>

</html>