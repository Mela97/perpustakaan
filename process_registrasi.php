<?php
if (isset($_POST['username'])) { 
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "perpustakaan_digital";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $nama_lengkap = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $alamat = $conn->real_escape_string($_POST['address']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT); 
    $role = "peminjam"; 

    $check_query = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar. Silakan gunakan email lain.');</script>";
    }
    
    } else {
        $insert_query = "INSERT INTO `user` (`perpus_id`, `nama_lengkap`,`email`,`alamat`,`username`, `password`, `role`, `created_at`)
                        VALUES (1, '$nama_lengkap','$email','$alamat','$username', '$password', '$role', current_timestamp())";

        if ($conn->query($insert_query) === TRUE) {
            echo "Registration successful. <a href='login.php'>Login</a>";
            header("Location: login.php"); 
            exit();
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    $conn->close();

?>
