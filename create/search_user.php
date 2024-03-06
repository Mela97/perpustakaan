<?php
include('koneksi.php');

$username = $_GET['username'];

$query = "SELECT * FROM user WHERE username LIKE '%$username%'";
$result = mysqli_query($conn, $query);

$emails = array();

while ($row = mysqli_fetch_assoc($result)) {
    $emails[] = $row['email'];
}

echo json_encode($emails);
?>
