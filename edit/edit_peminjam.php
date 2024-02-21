<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}
$role = $_SESSION["role"];
// else{
//     echo "<script>console.log($_SESSION['".'user_id'."'])</script>"
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan</title>

    <!-- Custom fonts for this template-->
    <link href="../dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4e73df;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a.add-button {
            background-color: #28a745;

        }

        a.add-button {
            display: inline-block;
            margin: 5px;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
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
            color: #000;
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

        .nav-link {
            display: flex;
            align-items: center;
        }

        .nav-link i {
            margin-right: 10px;
        }


        /* css tambahan */
        h2 {
            color: #164863;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 10px auto;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #164863;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }


        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            text-align: center;
        }


        body {
            font-family: Arial, sans-serif;
            background-color: #164863;
            color: #fff;
            margin: 0;
        }


        form {
            width: 60%;
            border-radius: 10px;
        }

        label {
            display: block;
            color: #164863;
        }

        input,
        select {
            width: calc(100% - 20px);
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            appearance: none;
            background-image: linear-gradient(45deg, transparent 50%, #164863 50%);
            background-position: calc(100% - 15px) calc(0.5em + 2px), calc(100% - 10px) calc(0.5em + 2px);
            background-size: 5px 5px, 5px 5px;
            background-repeat: no-repeat;
            padding-right: 30px;
        }

        select:focus {
            outline: none;
            border-color: #4e73df;
        }

        button {
            background-color: #4e73df;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #375cab;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group:after {
            content: "";
            display: table;
            clear: both;
        }

        .form-group label,
        .form-group select {
            float: left;
            width: 48%;
        }

        .form-group select {
            margin-left: 4%;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Perpus</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../admin/home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php
            if ($role === "admin") :
            ?>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pendataan
                </div>

                <!-- Nav Item - Data Buku -->
                <li class="nav-item">
                    <a class="nav-link" href="../admin/index_data_buku.php">
                        <i class="fas fa-book"></i>
                        <span>Data Buku</span></a>
                </li>

                <!-- Nav Item - Data Peminjam -->
                <li class="nav-item">
                    <a class="nav-link" href="../admin/index_peminjam.php">
                        <i class="fas fa-handshake"></i>
                        <span>Data Pengguna</span></a>
                </li>

                <!-- Nav Item - Data Anggota -->
                <li class="nav-item">
                    <a class="nav-link" href="../admin/index_data_anggota.php">
                        <i class="fas fa-users"></i>
                        <span>Data Anggota</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Laporan
                </div>

                <!-- Nav Item - Laporan -->
                <li class="nav-item">
                    <a class="nav-link" href="../admin/index_laporan.php">
                        <i class="fas fa-file-alt"></i>
                        <span>Laporan</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Ulasan Buku
                </div>

                <!-- Nav Item - Ulasan Buku -->
                <li class="nav-item">
                    <a class="nav-link" href="../admin/index_ulasan_buku.php">
                        <i class="fas fa-comments"></i>
                        <span>Ulasan Buku</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Akun
                </div>

                <!-- Nav Item - Registrasi -->
                <li class="nav-item">
                    <a class="nav-link" href="../admin/index_register.php">
                        <i class="fas fa-user-plus"></i>
                        <span>Registrasi</span>
                    </a>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">


            <?php endif ?>

            <?php
            if ($role === "petugas") :
            ?>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pendataan
                </div>

                <!-- Nav Item - Data Buku -->
                <li class="nav-item">
                    <a class="nav-link" href="../admin/index_data_buku.php">
                        <i class="fas fa-book"></i>
                        <span>Data Buku</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Laporan
                </div>

                <!-- Nav Item - Laporan -->
                <li class="nav-item">
                    <a class="nav-link" href="../admin/index_laporan.php">
                        <i class="fas fa-file-alt"></i>
                        <span>Laporan</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
            <?php endif ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Username</span>
                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="h3 mb-0 text-gray-800">Edit Peminjam</h2>
                        
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-4">
                            <?php
                            // Include database connection
                            include('koneksi.php');

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                // Tangkap data yang dikirim dari formulir edit peminjam
                                $peminjaman_id = $_POST['peminjaman_id'];
                                $tanggal_pinjam = $_POST['tanggal_pinjam'];
                                $user_id = $_POST['user_id'];
                                $tanggal_kembali = $_POST['tanggal_kembali'];
                                $status_peminjam = $_POST['status_peminjam'];

                                // Query untuk memperbarui data peminjam
                                $query = "UPDATE `peminjaman` SET 
                                            `tanggal_pinjam` = '$tanggal_pinjam',
                                            `user_id` = '$user_id',
                                            `tanggal_kembali` = '$tanggal_kembali',
                                            `status_peminjam` = '$status_peminjam'
                                            WHERE `peminjaman_id` = $peminjaman_id";

                                if ($conn->query($query)) {
                                    echo "Data peminjam berhasil diperbarui. <a href='../admin/index_peminjam.php'>Kembali ke Daftar Peminjam</a>";
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                            } elseif (isset($_GET['id'])) {
                                $peminjaman_id = $_GET['id'];

                                // Fetch data peminjam berdasarkan ID
                                $query = "SELECT * FROM `peminjaman` WHERE `peminjaman_id` = $peminjaman_id";
                                $result = $conn->query($query) or die($conn->error);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();

                                    // Form untuk mengedit data peminjam
                                    echo "
                                        <form action='../proses/proses_peminjam.php' method='post'>
                                            <input type='hidden' name='peminjaman_id' value='{$row['peminjaman_id']}'>
                                            <label for='tanggal_pinjam'>Tanggal Pinjam:</label>
                                            <input type='date' name='tanggal_pinjam' value='{$row['tanggal_pinjam']}' required><br>
                                            
                                            <label for='user_id'>Nama Peminjam:</label>
                                            <input type='text' name='user_id' value='{$row['user_id']}' required><br>

                                            <label for='tanggal_kembali'>Tanggal Kembali:</label>
                                            <input type='date' name='tanggal_kembali' value='{$row['tanggal_kembali']}' required><br>

                                            <label for='status_peminjam'>Status Peminjam:</label>
                                            <input type='text' name='status_peminjam' value='{$row['status_peminjam']}' required><br>

                                            <input type='submit' value='Simpan Perubahan'>
                                        </form>";
                                } else {
                                    echo "Data peminjam tidak ditemukan.";
                                }
                            } else {
                                echo "ID peminjam tidak diberikan.";
                            }

                            // Close connection
                            $conn->close();
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
                    <a class="btn btn-primary1" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="../dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../dashboard/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../dashboard/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../dashboard/js/demo/chart-area-demo.js"></script>
    <script src="../dashboard/js/demo/chart-pie-demo.js"></script>

</body>

</html>