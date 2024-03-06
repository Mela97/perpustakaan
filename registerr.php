<?php
include('koneksi.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrasi</title>

    <!-- Custom fonts for this template-->
    <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <link href="dashboard/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-zFRrJegk5aCn5Q63VezGtq3GYkUdqVrqPxyfkcYO4hnn883hX+Y1CrzQt5uARaVr5Gb03tGq5m+eoc2Xn4a9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        body {
            background-color: #164863;
        }

        .container {
            /* Set the container height to fill the viewport */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card.o-hidden.border-0.shadow-lg.my-5 {
            border: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .card-body {
            padding: 2rem;
        }

        .bg-gradient-primary {
            background: linear-gradient(180deg, #164863 10%, #164863 100%);
        }

        .text-gray-900 {
            color: #ffffff;
            /* Set text color to white */
        }

        .btn-primary1 {
            background-color: #164863;
            border-color: #164863;
            transition: background-color 0.3s ease;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #164863;
            border-color: #164863;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0f314f;
            border-color: #0f314f;
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .text-center a {
            color: #164863;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            <div class="p-0">
                                <a href="index.php" style="color: #6c757d; "><i class="fa-solid fa-chevron-left" style="font-size: 24px; top: 10px;"></i></a>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
                                </div>
                            </div>

                            <form class="user" action="process_registrasi.php" method="post">
                                <!-- Form inputs -->
                                <div class="form-group mx-auto">
                                    <input type="text" class="form-control form-control-user" id="inputUsername" placeholder="Username" name="username" required>
                                </div>
                                <div class="form-group mx-auto">
                                    <input type="email" class="form-control form-control-user" id="inputEmail" placeholder="Email Address" name="email" required>
                                </div>
                                <div class="form-group mx-auto">
                                    <input type="password" class="form-control form-control-user" id="inputPassword" placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group mx-auto">
                                    <input type="text" class="form-control form-control-user" id="inputFullName" placeholder="Full Name" name="nama_lengkap" required>
                                </div>
                                <div class="form-group mx-auto">
                                    <textarea class="form-control form-control-user" id="inputAddress" placeholder="Address" name="alamat" required></textarea>
                                </div>
                                <input type="hidden" name="role" value="peminjam">
                                <button type="submit" class="btn btn-primary1 btn-user btn-block">Register</button>
                                <div class="text-center">
                                    <a class="small" href="login.php">Log-in</a>
                                </div>
                                <div class="text-center">
                                    <a class="small">Dengan melanjutkan, Anda menyetujui <span style="color: #6c757d;"> Syarat dan Ketentuan kami</span> dan juga <spanstyle="color: #6c757d;"> Privasi kami</spanstyle=></a>
                                </div>
                            </form>
                            <!-- Tombol Kembali -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

    <!-- JavaScript -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages -->
    <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>