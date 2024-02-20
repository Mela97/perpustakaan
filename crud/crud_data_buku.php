<?php 
include('koneksi.php');

// Fetch all books from the database
$query = "SELECT * FROM `buku`";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Data</title>
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
    <h2>Data Buku</h2>

    <!-- Display data -->
    <table border="1">
        <tr>
            <th>Buku ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Kategori ID</th>
            <th>Created At</th>
        </tr>

        <?php
        $fetch_buku_query = "SELECT * FROM `buku`";
        $result = $conn->query($fetch_buku_query);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['buku_id']}</td>";
            echo "<td>{$row['judul']}</td>";
            echo "<td>{$row['penulis']}</td>";
            echo "<td>{$row['penerbit']}</td>";
            echo "<td>{$row['tahun_terbit']}</td>";
            echo "<td>{$row['kategori_id']}</td>";
            echo "<td>{$row['created_at']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
