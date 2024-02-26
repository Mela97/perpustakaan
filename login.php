<?php
include('koneksi.php');


session_start();



if (isset($_POST['login'])) {
    // Database connection parameters
    $host = "localhost";
    $email = "root";
    $password = "";
    $database = "perpustakaan_digital";

    // Create a database connection
    $conn = new mysqli($host, $email, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize input to prevent SQL injection
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query to check user credentials
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($query);


    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // User found, start a session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Redirect to the appropriate dashboard based on the user's role
            switch ($user['role']) {
                case 'admin':
                    header("Location:admin/home.php");
                    break;
                case 'petugas':
                    header("Location:admin/home.php");
                    break;
                case 'peminjam':
                    header("Location:user/home.php");
                    break;
                default:
                    // Handle any other roles or situations
                    break;
            }

            exit();
        } else {
            // Invalid credentials, display an error message or redirect to login page
            $error_message = "Email or password is invalid";
        }
    } else {
        // User not found, display an error message or redirect to login page
        $error_message = "Email or password is invalid";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-gradient-primary {
            background-color: #164863;
            background-image: linear-gradient(180deg, #164863 10%, #164863 100%);
            background-size: cover;
        }

        .card {
            border: 0;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            border-radius: 10px;
        }

        .btn-primary1 {
            background-color: #164863;
            border-color: #164863;
            transition: background-color 0.3s ease;
            color: #ffffff;
        }

        .btn-primary1:hover {
            background-color: #04364A;
            border-color: #04364A;
        }

        .alert-danger {
            border-radius: 10px;
        }

        .text-center a {
            color: #164863;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-8 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <?php if (isset($error_message)) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $error_message ?>
                                        </div>
                                    <?php endif; ?>
                                    <form class="user" action="login.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="email" aria-describedby="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button class="btn btn-primary1 btn-user btn-block" type="submit" name="login">
                                            Login
                                        </button>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="index.php">Kembali ke Halaman Sebelumnya?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="registerr.php">Buat Akun!</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=dashboard/vendor/jquery/jquery.min.js"></script>
    <script src=dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src=dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>