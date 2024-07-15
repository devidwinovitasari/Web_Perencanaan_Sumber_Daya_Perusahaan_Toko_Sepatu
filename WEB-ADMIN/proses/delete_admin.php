<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM admin WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location: ../Tabel_Admin.php");
exit();
?>
