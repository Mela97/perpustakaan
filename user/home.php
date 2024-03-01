<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}


// Menggunakan koneksi database
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

// Query SQL untuk mendapatkan daftar buku dengan informasi yang diperlukan
$sql = "SELECT b.*, k.nama_kategori FROM buku b JOIN buku_kategori k ON b.kategori_id = k.kategori_id";
$result = $conn->query($sql);

$user = $_SESSION["user_id"];


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wL3PXdkxVnxEy4zTmqSHINB5pO8z1u/ZB/Z3yvGezz1w+oYWiOou9DooBCKNp9erCvhidYZOZgRzM+nr+9M6eA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
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
            margin-bottom: 25px;
            margin-left: 25px;
        }

        .judul {
            color: #191919;
        }

        .penulis {
            color: #7077A1;
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
                            <input id="searchInput" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                <div class="col-xl-12 col-md-6 mb-4 mx-auto">
                    <?php
                    $peminjamanresult = mysqli_query($conn, "SELECT * FROM peminjaman WHERE user_id = $user");

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $buku_id = $row['buku_id'];
                            $status_query = "SELECT status_peminjam FROM peminjaman WHERE buku_id = $buku_id";
                            $status_result = $conn->query($status_query);

                            // Display the card only if the book is available
                            if ($row['ketersediaan'] > 0) {
                    ?>
                                <div class="searchable card" style="width: 210px; height: 390px;">
                                    <img src="../proses/uploads/<?php echo $row['cover']; ?>" class="card-img-top" alt="Cover Image" style="width: 100%; height: 210px; object-fit: cover;">
                                    <div class="card-body" style="padding: 10px;">
                                        <h5 class="card-title judul" style="font-size: 20px; margin-top: 5px; margin-bottom: 5px;"><?php echo $row['judul']; ?></h5>
                                        <!-- Check if $row['penulis'] is set before echoing -->
                                        <p class="card-text penulis" style="font-size: 15px; margin-top: 0; margin-bottom: 5px;"><?php echo isset($row['penulis']) ? $row['penulis'] : 'Unknown'; ?></p>
                                        <!-- Show stock -->
                                        <p style="color: #808080; font-size: 12px; margin-top: 0; margin-bottom: 5px;">Stok: <?php echo $row['ketersediaan']; ?></p>
                                        <!-- Add the rest of your card content and buttons here -->
                                        <?php
                                        $bukuterpinjam = mysqli_query($conn, "SELECT * FROM peminjaman WHERE user_id ='$user' AND status_peminjam='dipinjam'");
                                        if (mysqli_num_rows($bukuterpinjam) >= 3) {
                                        ?>
                                            <button type="button" class="btn btn-primary2 btn-sm">Buku sudah dalam batas</button>
                                        <?php } else { ?>
                                            <a href='pinjam.php?id_buku=<?php echo $row['buku_id']; ?>'>
                                                <button id='pinjam-btn' data-buku-id='<?php echo $row['buku_id']; ?>' type="button" class="btn btn-primary2 btn-sm">Pinjam</button>
                                            </a>
                                        <?php } ?>
                                        <button type="button" class="btn btn-secondary1 btn-sm bookmark-btn" data-buku-id="<?php echo $row['buku_id']; ?>">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <form action="ulasan.php" method="GET">
                                            <input type="hidden" value="<?php echo $row['buku_id']; ?>" name="buku_id">
                                            <button type="submit" class="btn btn-sm btn-primary1" name="ulasan_btn">
                                                <i class="fas fa-comment-alt fa-fw"></i> Ulasan
                                            </button>
                                        </form>
                                    </div>
                                </div>


                    <?php
                            }
                        }
                    }
                    $conn->close();
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
                    <a class="btn btn-primary" href="../index.php">Logout</a>
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
    <script>
        $(document).ready(function() {
            $('.pinjam-btn').click(function() {
                var bukuId = $(this).data('buku-id');

                $.ajax({
                    type: 'GET',
                    url: 'pinjam.php',
                    data: {
                        buku_id: bukuId
                    },
                    success: function(response) {
                        alert('Buku berhasil dipinjam!');
                    },
                    error: function(xhr, status, error) {
                        alert('Gagal meminjam buku. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.bookmark-btn').click(function() {
                var bukuId = $(this).data('buku-id');

                $.ajax({
                    type: 'POST',
                    url: '../proses/proses_bookmark.php',
                    data: {
                        buku_id: bukuId
                    },
                    success: function(response) {
                        alert('Favorite berhasil diperbarui!');
                    },
                    error: function(xhr, status, error) {
                        alert('Gagal memperbarui favorite. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.detail-btn').click(function() {
                var bukuId = $(this).data('buku-id');

                $.ajax({
                    type: 'POST',
                    url: 'get_deskripsi_buku.php',
                    data: {
                        buku_id: bukuId
                    },
                    success: function(response) {
                        $('#detailBukuContent').html(response);
                        $('#detailModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        alert('Gagal mendapatkan detail buku. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>

    <script>
        // Tangkap tombol review
        var reviewButtons = document.querySelectorAll('.review-btn');

        // Loop melalui setiap tombol dan tambahkan event listener
        reviewButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var bookId = this.getAttribute('data-buku-id');
                document.getElementById('bookId').value = bookId;
                $('#reviewModal').modal('show');
            });
        });

        // Tangkap form review
        var reviewForm = document.getElementById('reviewForm');

        // Tambahkan event listener untuk form
        reviewForm.addEventListener('submit', function(event) {
            event.preventDefault();
            var bookId = document.getElementById('bookId').value;
            var reviewText = document.getElementById('reviewText').value;
            var rating = document.getElementById('rating').value;

            // Kirim data ulasan menggunakan AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'proses_ulasan.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Ulasan berhasil dikirim, lakukan sesuatu jika perlu
                    console.log(xhr.responseText);
                    $('#reviewModal').modal('hide');
                    // Tambahkan logika lain jika diperlukan, misalnya memperbarui tampilan ulasan secara dinamis
                }
            };
            xhr.send('book_id=' + bookId + '&review=' + reviewText + '&rating=' + rating);
        });
    </script>

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
<?php if (isset($_SESSION['notif'])) {
    $notif = $_SESSION['notif'];
    echo "<script>alert('$notif')</script>";
    unset($_SESSION['notif']);
} ?>