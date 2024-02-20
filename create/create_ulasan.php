<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ulasan</title>
    <!-- Tautan ke file CSS dan JavaScript yang diperlukan -->
</head>
<body>
    <h1>Form Ulasan</h1>
    <form action="proses_tambah_ulasan.php" method="post">
        <label for="rating">Rating:</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>
        
        <label for="comment">Komentar:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br>
        
        <button type="submit">Kirim Ulasan</button>
    </form>
</body>
</html>
