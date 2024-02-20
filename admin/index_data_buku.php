<?php
include('koneksi.php');
session_start();
$role = $_SESSION['role'];
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
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
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

        .text-primary1:hover {
            background-color: #ddd;
            border-color: #427D9D;
            color: #000000;
        }

        .text-primary1 {
            background-color: #ffffff;
            border-color: #164863;
            transition: background-color 0.3s ease;
            color: #000000;
        }



        /* Gaya tombol Logout di dalam sidebar */
        .nav-link {
            display: flex;
            align-items: center;
        }

        /* Membuat spasi di antara ikon dan teks pada item navigasi */
        .nav-link i {
            margin-right: 10px;
        }

        .text-search-icon {
            color: #176B87;
            /* Warna yang diinginkan */
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
            width: 80%;
            /* Adjusted width to 80% */
            margin: 10px auto;
            /* Centered the table */
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            /* Reduced padding for a more compact look */
            text-align: left;
        }

        th {
            background-color: #164863;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a.edit-button,
        a.hapus-button {
            display: inline-block;
            margin: 5px;
            padding: 6px 12px;
            /* Adjusted padding for a more compact look */
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        a.edit-button {
            background-color: #40A2D8;
        }

        a.hapus-button {
            background-color: #dc3545;
        }

        a.edit-button:hover {
            background-color: #0B60B0;
        }

        a.hapus-button:hover {
            background-color: #BF3131;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            text-align: center;
        }

        .page-item a.page-link:hover {
            color: #8c8c8c;
            /* Ganti dengan warna yang diinginkan */
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
                        <h2 class="h3 mb-0 text-gray-800">Data Buku</h2>
                    </div>
                    <a href="../create/create_data_buku.php" class="mb-4 btn btn-primary1">Tambah Buku</a>

                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-4">
                            <?php
                            // Proses saat pengguna meminjam buku
                            if (isset($_POST['pinjam'])) {
                                $buku_id = $_POST['buku_id'];
                                $tanggal_peminjaman = date('Y-m-d');
                                $tanggal_kembali = date('Y-m-d', strtotime('+7 days')); // Tambahkan 7 hari dari tanggal peminjaman

                                // Masukkan data peminjaman ke dalam tabel peminjaman
                                $query = "INSERT INTO peminjaman (buku_id, tanggal_peminjaman, tanggal_kembali, status_peminjam)
                                          VALUES ('$buku_id', '$tanggal_peminjaman', '$tanggal_kembali', 'dipinjam')";
                                $result = $conn->query($query);

                                if ($result) {
                                    // Update ketersediaan buku
                                    $update_sql = "UPDATE buku SET ketersediaan = 'not available' WHERE buku_id = $buku_id";
                                    if ($conn->query($update_sql) === TRUE) {
                                        echo "Buku berhasil dipinjam dan ketersediaan buku diperbarui.";
                                    } else {
                                        echo "Error updating ketersediaan buku: " . $conn->error;
                                    }
                                } else {
                                    echo "Gagal meminjam buku: " . $conn->error;
                                }
                            }

                            // Proses pengecekan pengembalian buku yang melewati batas waktu
                            $query = "UPDATE peminjaman
                                      SET status_peminjam = 'selesai'
                                      WHERE tanggal_kembali < CURDATE() AND status_peminjam = 'dipinjam'";
                            $result = $conn->query($query);

                            if ($result) {
                                //echo "Status peminjaman diperbarui.";
                            } else {
                                echo "Gagal memperbarui status peminjaman: " . $conn->error;
                            }

                            // Eksekusi query untuk mendapatkan informasi buku
                            $query = "SELECT b.*, bk.nama_kategori, p.status_peminjam
                                      FROM buku b
                                      JOIN buku_kategori bk ON b.kategori_id = bk.kategori_id
                                      LEFT JOIN peminjaman p ON b.buku_id = p.buku_id";
                            $result = $conn->query($query) or die($conn->error);

                            $query_total_data = "SELECT COUNT(*) as total FROM buku";
                            $result_total_data = $conn->query($query_total_data);
                            $row_total_data = $result_total_data->fetch_assoc();
                            $total_data = $row_total_data['total'];

                            // Langkah 2: Hitung jumlah total halaman
                            $data_per_halaman = 5;
                            $total_halaman = ceil($total_data / $data_per_halaman);

                            // Langkah 3: Tentukan halaman saat ini
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }

                            // Langkah 4: Lakukan query untuk mengambil data sesuai dengan halaman saat ini
                            $offset = ($page - 1) * $data_per_halaman;
                            $query_data_buku = "SELECT b.*, bk.nama_kategori, p.status_peminjam
                            FROM buku b
                            JOIN buku_kategori bk ON b.kategori_id = bk.kategori_id
                            LEFT JOIN peminjaman p ON b.buku_id = p.buku_id LIMIT $offset, $data_per_halaman";
                            $result_data_buku = $conn->query($query_data_buku);

                            // Tampilkan tabel buku beserta status peminjamannya
                            echo "<table border='1'>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cover</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th>Status Peminjaman</th>
                                        <th>Ketersediaan</th>
                                        <th>Aksi</th>
                                    </tr>";

                            while ($row = $result_data_buku->fetch_assoc()) {
                                echo "<tr>
                                                <td>{$row['buku_id']}</td>
                                                <td><img src='../proses/uploads/{$row['cover']}' alt='Cover Buku' style='max-width:100px; max-height:100px;'></td>
                                                <td>{$row['judul']}</td>
                                                <td>{$row['penulis']}</td>
                                                <td>{$row['kategori_id']}</td>
                                                <td>{$row['status_peminjam']}</td>
                                                <td>{$row['ketersediaan']}</td>
                                                <td>
                                                    <a href='../edit/edit_data_buku.php?buku_id={$row['buku_id']}' class='edit-button'>Edit</a> 
                                                    <a href='#' class='hapus-button' onclick='confirmDelete({$row['buku_id']})'>Hapus</a>
                                                </td>
                                            </tr>";
                            }

                            echo "</table>";
                            $previous_page = ($page > 1) ? $page - 1 : 1;
                            $next_page = ($page < $total_halaman) ? $page + 1 : $total_halaman;

                            // Langkah 7: Buat tombol pagination
                            echo '<ul class="pagination justify-content-center">';
                            echo '<li class="page-item"><a class="page-link btn-primary1" href="?page=' . $previous_page . '">&laquo; Previous</a></li>';
                            for ($i = max(1, $page - 2); $i <= min($page + 2, $total_halaman); $i++) {
                                echo '<li class="page-item ' . (($page == $i) ? "active" : "") . '"><a class="page-link text-primary1" href="?page=' . $i . '">' . $i . '</a></li>';
                            }
                            echo '<li class="page-item"><a class="page-link btn-primary1" href="?page=' . $next_page . '">Next &raquo;</a></li>';
                            echo '</ul>';

                            ?>

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
                    <a class="btn btn-primary1" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/chart-area-demo.js"></script>
    <script src="asset/js/demo/chart-pie-demo.js"></script>

    <script>
        function confirmDelete(buku_id) {
            if (confirm("Anda yakin ingin menghapus data ini?")) {
                window.location.href = '../hapus/hapus_data_buku.php?id=' + buku_id;
            }
        }
    </script>
</body>

</html>