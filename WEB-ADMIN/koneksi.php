<?php
// koneksi.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "psdp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
