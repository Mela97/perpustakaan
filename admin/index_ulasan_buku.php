<?php
include('koneksi.php');
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

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-gradient-primary {
            background-color: #164863;
            background-image: linear-gradient(180deg, #164863 10%, #164863 100%);
            background-size: cover;
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

        .sidebar {
            background-color: #164863;
        }

        .btn-primary2:hover {
            background-color: #0174BE;
            border-color: #0174BE;
            color: #ffffff;
        }

        .btn-primary2 {
            background-color: #3559E0;
            border-color: #3559E0;
            transition: background-color 0.3s ease;
            color: #ffffff;
            font-size: 14px;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .nav-link i {
            margin-right: 10px;
        }



        /* css tambahan */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }

        h2 {
            color: #164863;
        }

        table {
            border-collapse: collapse;
            margin: 10px auto;
            width: 70%;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        thead {
            height: 50%;
        }

        th {
            background-color: #164863;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a.edit-button {
            display: inline-block;
            margin: 5px;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        a.edit-button {
            background-color: #40A2D8;
        }

        a.edit-button:hover {
            background-color: #0B60B0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            text-align: center;
        }

        .dropdown-menu a.dropdown-item {
            color: #164863;
        }

        .dropdown-menu a.dropdown-item:hover {
            background-color: #427D9D;
            color: #ffffff;
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
                <a class="nav-link" href="home.php">
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
                    <a class="nav-link" href="index_data_buku.php">
                        <i class="fas fa-book"></i>
                        <span>Data Buku</span></a>
                </li>

                <!-- Nav Item - Data Peminjam -->
                <li class="nav-item">
                    <a class="nav-link" href="index_peminjam.php">
                        <i class="fas fa-handshake"></i>
                        <span>Data Peminjam</span></a>
                </li>

                <!-- Nav Item - Data Anggota -->
                <li class="nav-item">
                    <a class="nav-link" href="index_data_anggota.php">
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
                    <a class="nav-link" href="index_laporan.php">
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
                    <a class="nav-link" href="index_ulasan_buku.php">
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
                    <a class="nav-link" href="index_register.php">
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
                    <a class="nav-link" href="index_data_buku.php">
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
                    <a class="nav-link" href="index_laporan.php">
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
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- Navbar -->
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
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo $_SESSION['username'];
                                } else {
                                    echo "Pengguna";
                                }
                                ?> <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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

                <!-- End of Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="h3 mb-0 text-gray-800">Ulasan</h2>
                    </div>

                    <!-- Daftar Ulasan -->
                    <div class="container">
                        <div class="row">
                            <!-- Kolom untuk Menampilkan Ulasan Buku -->
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" style="width: 80%;" cellspacing="0">
                                            <tbody>
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

                                                // Langkah 1: Tentukan jumlah total data
                                                $query_total_data = "SELECT COUNT(*) as total FROM buku_ulasan";
                                                $result_total_data = $conn->query($query_total_data);
                                                $row_total_data = $result_total_data->fetch_assoc();
                                                $total_data = $row_total_data['total'];

                                                // Langkah 2: Hitung jumlah total halaman
                                                $data_per_halaman = 4;
                                                $total_halaman = ceil($total_data / $data_per_halaman);

                                                // Langkah 3: Tentukan halaman saat ini
                                                if (!isset($_GET['page'])) {
                                                    $page = 1;
                                                } else {
                                                    $page = $_GET['page'];
                                                }

                                                // Langkah 4: Lakukan query untuk mengambil data sesuai dengan halaman saat ini
                                                $offset = ($page - 1) * $data_per_halaman;
                                                $sql = "SELECT bu.judul, buku_id
                                FROM buku bu
                                LIMIT $offset, $data_per_halaman";

                                                $result = $conn->query($sql);

                                                // Periksa apakah ada hasil yang dikembalikan
                                                if ($result->num_rows > 0) {
                                                    // Tampilkan tabel dengan data judul buku dan detail ulasan
                                                    echo "<table>";
                                                    echo "<thead>
                                <tr>
                                    <th>Judul Buku</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>";
                                                    echo "<tbody>";
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['judul'] . "</td>";
                                                        echo "<td>";
                                                        // Query untuk mengecek apakah buku memiliki ulasan
                                                        $buku_id = $row['buku_id'];
                                                        $query_ulasan = "SELECT * FROM buku_ulasan WHERE buku_id = $buku_id";
                                                        $result_ulasan = $conn->query($query_ulasan);
                                                        if ($result_ulasan->num_rows > 0) {
                                                            // Jika buku memiliki ulasan, tampilkan tombol detail
                                                            echo "<a href='detail.php?id=" . $row['buku_id'] . "' class='btn btn-primary'>Detail</a>";
                                                        } else {
                                                            // Jika buku tidak memiliki ulasan, tampilkan pesan
                                                            echo "Buku ini belum memiliki ulasan.";
                                                        }
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                    echo "</tbody>";
                                                    echo "</table>";

                                                    // Langkah 7: Buat tombol pagination
                                                    echo '<ul class="pagination justify-content-center">';
                                                    $previous_page = ($page > 1) ? $page - 1 : 1;
                                                    echo '<li class="page-item"><a class="page-link btn-primary1" href="?page=' . $previous_page . '"><</a></li>';
                                                    for ($i = 1; $i <= $total_halaman; $i++) {
                                                        echo '<li class="page-item ' . (($page == $i) ? "active" : "") . '"><a class="page-link text-primary1" href="?page=' . $i . '">' . $i . '</a></li>';
                                                    }
                                                    $next_page = ($page < $total_halaman) ? $page + 1 : $total_halaman;
                                                    echo '<li class="page-item"><a class="page-link btn-primary1" href="?page=' . $next_page . '">></a></li>';
                                                    echo '</ul>';
                                                } else {
                                                    // Jika tidak ada data judul buku yang ditemukan
                                                    echo "<p>Tidak ada judul buku yang tersedia.</p>";
                                                }

                                                // Tutup koneksi
                                                $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                   
</body>
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
                <a class="btn btn-primary1" href="../login.php">Logout</a>
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