<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpus Smea</title>

    <!-- Custom fonts for this template-->
    <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dashboard/css/sb-admin-2.min.css" rel="stylesheet">
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

        .nav-link {
            color: #ffffff !important;
        }

        .nav-item.active .nav-link {
            color: #ffffff !important;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #000000 !important;
        }

        .navbar-light .navbar-toggler-icon {
            background-color: #ffffff;
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

        .card {
            float: left;
            margin-right: 15px;
            margin-bottom: 25px;
            margin-left: 17px;
        }


        .small {
            font-size: 12px;
        }

        .card-text {
            font-size: 12px;
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
                        <img src="logo.png" width="50" height="55" class="d-inline-block align-top" alt="Your Logo">
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

                    <!-- Navbar Authentication Options -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <h6 class="nav-link font-weight-bold">
                                <a href="login.php" style="color: #164863;">Masuk</a>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <h6 class="nav-link font-weight-bold">
                                <a href="registerr.php" style="color: #164863;">Daftar</a>
                            </h6>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h1>Daftar Buku</h1>
                    <?php
                    // Koneksi ke database
                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "perpustakaan_digital";

                    // Membuat koneksi
                    $conn = new mysqli($host, $username, $password, $database);


                    // Periksa koneksi
                    if ($conn->connect_error) {
                        die("Koneksi Gagal: " . $conn->connect_error);
                    }

                    // Query untuk mengambil data buku dan ulasannya
                    $sql = "SELECT b.*, GROUP_CONCAT(u.ulasan SEPARATOR '<br>') AS ulasan FROM buku b LEFT JOIN buku_ulasan u ON b.buku_id = u.buku_id GROUP BY b.buku_id";
                    $result = $conn->query($sql);

                    // Periksa apakah ada hasil
                    if ($result->num_rows > 0) {
                        // Menampilkan data buku
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="card" style="width: 210px; height: 390px;">
                                <img src="proses/uploads/<?php echo $row['cover']; ?>" class="card-img-top" alt="Cover Image" style="width: 100%; height: 210px; object-fit: cover;">
                                <div class="card-body" style="padding: 10px;">
                                    <h5 class="card-title judul" style="font-size: 20px;"><?php echo $row['judul']; ?></h5>
                                    <p class="card-text penulis" style="font-size: 16px;"><?php echo isset($row['penulis']) ? $row['penulis'] : 'Unknown'; ?></p>
                                    <!-- Tampilkan ulasan -->
                                    <a href="user/ulasan.php?buku_id=<?php echo $row['buku_id']; ?>" class="btn btn-info1 btn-sm">Ulasan</a>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "Tidak ada buku yang tersedia.";
                    }
                    ?>




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
    <script src="dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="dashboard/vendor/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="dashboard/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="dashboard/vendor/js/demo/chart-area-demo.js"></script>
    <script src="dashboard/vendor/js/demo/chart-pie-demo.js"></script>
    <!-- Tambahkan ini di bagian head atau sebelum tag penutup body -->

</body>

</html>