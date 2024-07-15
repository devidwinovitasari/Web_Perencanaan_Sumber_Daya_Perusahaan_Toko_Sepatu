<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM orders WHERE id_orders=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
    header("Location: ../Tabel_Pemesanan.php");
    exit();
}
?>
