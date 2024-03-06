<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #164863;
            color: #fff;
        }

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


        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            text-align: center;
        }

        form {
            margin-top: 20px;
            width: 60%;

        }

        form label {
            margin-bottom: 5px;
        }

        form input,
        form select {
            margin-bottom: 10px;
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

        .user-item {
            cursor: pointer;
            padding: 5px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
            color: #000;
        }

        .user-item:hover {
            background-color: #ddd;
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
                        <span>Data Peminjam</span></a>
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
                                <a class="dropdown-item" href="../index.php" data-toggle="modal" data-target="#logoutModal">
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
                    <div class="col">
                        <h2>Tambah Peminjaman</h2>
                    </div>
                    <?php
                    // Include database connection
                    include('koneksi.php');

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Tangkap data yang dikirim dari formulir tambah peminjam
                        $tanggal_pinjam = $_POST['tanggal_pinjam'];
                        $tanggal_kembali = $_POST['tanggal_kembali'];
                        $email_peminjam = $_POST['email_peminjam']; // Ubah dari 'username' menjadi 'email_peminjam'
                        $status_peminjam = $_POST['status_peminjam'];
                        $buku_id = $_POST['buku_id'];

                        // Query untuk menambahkan data peminjam baru
                        $query = "INSERT INTO `peminjaman` (`tanggal_pinjam`, `tanggal_kembali`, `email_peminjam`,`status_peminjam`, `buku_id`)
                  VALUES ('$tanggal_pinjam', '$tanggal_kembali', '$email_peminjam','$status_peminjam', '$buku_id')";

                        if ($conn->query($query)) {
                            echo "Data peminjam berhasil ditambahkan. <a href='../admin/index_peminjam.php'>Kembali ke Daftar Peminjam</a>";
                        } else {
                            echo "Error: " . $conn->error;
                        }
                    }
                    ?>

                    <form action="../proses/proses_peminjam.php" method="post">
                        <input type="hidden" name="perpus_id" value="<?php echo $perpus_id; ?>">
                        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required><br>

                        <label for="tanggal_kembali">Tanggal Kembali:</label>
                        <input type="date" name="tanggal_kembali" id="tanggal_kembali" required><br>

                        <label for="email_peminjam">Email Peminjam:</label>
                        <input type="text" id="email_peminjam" name="email_peminjam" placeholder="Cari akun pengguna..." required>
                        <div id="searchResults"></div>

                        <label for="buku_id">Judul Buku:</label>
                        <select name="buku_id" required>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM buku");
                            while ($d = mysqli_fetch_assoc($result)) :
                            ?>
                                <option value="<?= $d['buku_id'] ?>"><?= $d['judul'] ?></option>
                            <?php endwhile ?>
                        </select>

                        <input type="submit" value="Tambah Peminjaman">
                    </form>
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
                    <a class="btn btn-primary1" href="../index.php">Logout</a>
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
    <script>
        function searchUser() {
            var input, filter, xhttp, output;
            input = document.getElementById("search");
            filter = input.value;

            if (filter.length == 0) {
                document.getElementById("searchResults").innerHTML = "";
                return;
            }

            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    output = "";
                    var emails = JSON.parse(this.responseText);
                    for (var i = 0; i < emails.length; i++) {
                        output += "<div class='user-item'>" + emails[i] + "</div>";
                    }
                    document.getElementById("searchResults").innerHTML = output;
                }
            };
            xhttp.open("GET", "search_user.php?username=" + filter, true);
            xhttp.send();
        }

        document.getElementById("searchResults").addEventListener("click", function(e) {
            if (e.target.classList.contains("user-item")) {
                var selectedUsername = e.target.textContent;
                document.getElementById("search").value = selectedUsername;
                document.getElementById("hiddenInput").value = selectedUsername;
                submitForm();
                e.stopPropagation();
            }
        });

        function submitForm() {
            document.querySelector("form").submit();
        }

        // Function to set default values for the date fields
        function setDefaultDates() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById('tanggal_pinjam').value = today;

            var returnDate = new Date();
            returnDate.setDate(returnDate.getDate() + 7);
            var dd2 = String(returnDate.getDate()).padStart(2, '0');
            var mm2 = String(returnDate.getMonth() + 1).padStart(2, '0');
            var yyyy2 = returnDate.getFullYear();

            returnDate = yyyy2 + '-' + mm2 + '-' + dd2;
            document.getElementById('tanggal_kembali').value = returnDate;
        }

        // Call the function when the page loads
        window.onload = setDefaultDates;
    </script>
<script>
    document.getElementById("email_peminjam").addEventListener("input", function() {
        var filter = this.value.trim();
        var searchResults = document.getElementById("searchResults");

        if (filter.length === 0) {
            searchResults.innerHTML = "";
            return;
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var output = "";
                var emails = JSON.parse(this.responseText);
                for (var i = 0; i < emails.length; i++) {
                    output += "<div class='user-item'>" + emails[i] + "</div>";
                }
                searchResults.innerHTML = output;
            }
        };
        xhttp.open("GET", "search_user.php?username=" + filter, true);
        xhttp.send();
    });

    document.getElementById("searchResults").addEventListener("click", function(e) {
        if (e.target.classList.contains("user-item")) {
            document.getElementById("email_peminjam").value = e.target.textContent;
            this.innerHTML = "";
        }
    });
</script>
</body>

</html>