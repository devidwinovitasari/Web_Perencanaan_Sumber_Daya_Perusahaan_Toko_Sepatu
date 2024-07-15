<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: ../Tabel_Produk.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
