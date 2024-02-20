<?php 
include('koneksi.php');

// Fetch all books from the database
$query = "SELECT * FROM `user`";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }

        h2 {
            color: #4e73df;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4e73df;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a.edit-button,
        a.add-button,
        a.delete-button {
            display: inline-block;
            margin: 5px;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        a.edit-button {
            background-color: #4e73df;
        }

        a.add-button {
            background-color: #28a745;

        }

        a.delete-button {
            background-color: #dc3545;
        }

        a.edit-button:hover,
        a.add-button:hover,
        a.delete-button:hover {
            background-color: #3b5b9b;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="row">
    <h2> User Registration History</h2>

    <!-- Tampilkan data -->
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Username</th>
            <th>Role</th>
            <th>Registration Date</th>
        </tr>

        <?php
        // Gantilah 'user_registration' dengan nama tabel yang sesuai di database Anda
        $fetch_user_query = "SELECT * FROM `user`";
        $result = $conn->query($fetch_user_query);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['user_id']}</td>";
            echo "<td>{$row['nama_lengkap']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['no_hp']}</td>";
            echo "<td>{$row['alamat']}</td>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['role']}</td>";
            echo "<td>{$row['created_at']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>