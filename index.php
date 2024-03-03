<?php
include 'koneksi.php';
?>

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

        .btn-primary1 {
            background-color: #176B87;
            border-color: #176B87;
            transition: background-color 0.3s ease;
            color: #ffffff;
        }

        .btn-primary2 {
            background-color: #176B87;
            border-color: #176B87;
            transition: background-color 0.3s ease;
            color: #ffffff;
            border-radius: 19px;
            padding: 6px 20px;
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
            box-shadow: 0 5px 9px rgba(0, 0, 0, 0.1);
        }


        .small {
            font-size: 12px;
        }

        .card-text {
            font-size: 12px;
        }

        footer {
            background-color: #f7f7f7;
            padding: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }


        .footer-description {
            margin-bottom: 15px;
        }

        .footer-contact-info {
            list-style: none;
            padding: 0;
        }

        .footer-contact-info li {
            margin-bottom: 10px;
        }

        .footer-contact-info a {
            color: #777;
            text-decoration: none;
        }

        .footer-contact-info a:hover {
            color: #333;
        }

        @media (max-width: 768px) {
            .footer {
                padding: 15px 0;
            }

            .footer-logo {
                max-width: 150px;
            }

            .footer-description {
                margin-bottom: 10px;
            }

            .footer-contact-info li {
                margin-bottom: 5px;
            }
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
       
        <!-- End of Sidebar -->


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="padding-top: 80px;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed-top">

                    <!-- Logo -->
                    <a class="navbar-brand" href="#">
                        <img src="logo.png" width="50" height="55" class="d-inline-block align-top" alt="Your Logo">
                    </a>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 navbar-search" style="max-width: 300px;">
                        <div class="input-group">
                            <input id="searchInput" type="text" class="form-control bg-light border-0 small" placeholder="Cari Buku, Penulis" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </form>

                    <!-- Navbar Authentication Options -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <h6 class="nav-link font-weight-bold">
                                <a href="login.php" style="color: #176B87; border: 2px solid #176B87; padding: 6px 20px; border-radius: 19px; text-decoration: none;">
                                    Masuk
                                </a>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <h6 class="nav-link font-weight-bold">
                                <a href="registerr.php" class="btn btn-primary2">
                                    Daftar
                                </a>
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
                            <div class="card" style="width: 210px; height: 320px;">
                                <img src="proses/uploads/<?php echo $row['cover']; ?>" class="card-img-top" alt="Cover Image" style="width: 100%; height: 210px; object-fit: cover;">
                                <div class="card-body" style="padding: 10px;">
                                    <h5 class="card-title judul" style="font-size: 20px; color: black;"><?php echo $row['judul']; ?></h5>
                                    <p class="card-text penulis" style="font-size: 16px;"><?php echo isset($row['penulis']) ? $row['penulis'] : 'Unknown'; ?></p>
                                    <!-- Tampilkan ulasan -->
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
    <footer class="sticky-footer" style="background-color: #176B87; border-top: 1px solid #176B87; padding: 2px 0; margin-bottom: -20px;">
        <div class="container text-center">
            <h5 style="font-weight: bold;color: white; display: inline-block; font-size: 14px;">Jam Operasional Perpus Smea:</h5>
            <p style="display: inline-block; margin-bottom: 0; color: white; font-size: 14px;">Senin-Jumat 08.00 - 16.00 WIB</p>
        </div>
    </footer>

    <footer class="sticky-footer" style="padding-top: 20px; padding-bottom: 20px; margin-top: 20px; border-top: 2px solid #e9ecef; box-shadow: none;">
        <div class="container">
            <div class="row">
                <div class="col-md-2" style="margin-top: 20px; display: flex; flex-direction: column; align-items: flex-start;">
                    <img src="logo.png" alt="Logo Perpustakaan Digital" class="footer-logo" style="width: 80px; height: auto;">
                    <p style="font-weight: bold; color: black; text-align: center; margin-top: 5px; margin-left: 15px;">SMEA</p>
                </div>

                <div class="col-md-5" style="margin-top: 5px;">
                    <h5 style=" font-weight: bold;color: #191919;">Tentang Kami</h5>
                    <p>Perpustakaan Digital Smea adalah sebuah platform yang menyediakan akses ke berbagai macam buku elektronik dan sumber daya belajar lainnya. Platform ini dirancang untuk memudahkan pengguna dalam menemukan dan membaca buku yang mereka inginkan.</p>
                </div>
                <div class="col-md-3">
                    <ul class="footer-contact-info" style="margin-top: 10px;">
                        <h5 style=" font-weight: bold;color: #191919;">Alamat</h5>
                        <li><a href="#">Jl. KH. Mustofa Lingk. Parunglesang, RT.05/RW.10, Banjar, Kec. Banjar, Kota Banjar, Jawa Barat 46311</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer-contact-info" style="margin-top: 10px; list-style: none; padding-left: 0;">
                        <h5 style=" font-weight: bold;color: #191919;">Kontak</h5>
                        <li style="display: inline-block; margin-right: 10px;"><a href="#">Telepon:(0265)-741722</a></li>
                        <li style="display: inline-block; margin-right: 10px;"><a href="https://www.instagram.com/smknegeri1banjar/"><i class="fab fa-instagram"></i></a></li>
                        <li style="display: inline-block; margin-right: 10px;"><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <footer class="sticky-footer" style="background-color: #176B87; border-top: 1px solid #176B87; padding: 6px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p style="color: white; font-size: 14px; margin-bottom: 0;">&copy; Perpustakaan Digital Smea 2024</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

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

    <script>
        $(document).ready(function() {
            // Simpan nilai offset top dari navbar
            var navbarOffset = $(".navbar").offset().top;

            // Tambahkan event listener saat halaman di-scroll
            $(window).scroll(function() {
                // Periksa posisi scroll halaman
                if ($(window).scrollTop() >= navbarOffset) {
                    // Jika sudah mencapai atau melebihi offset top dari navbar, tambahkan kelas 'fixed-top' pada navbar
                    $(".navbar").addClass("fixed-top");
                } else {
                    // Jika belum mencapai offset top dari navbar, hapus kelas 'fixed-top' dari navbar
                    $(".navbar").removeClass("fixed-top");
                }
            });
        });
    </script>

</body>

</html>