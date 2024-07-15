<?php
include '../koneksi.php';

// Periksa apakah parameter ID telah diterima
if (isset($_GET['id'])) {
    $id_supplier = $_GET['id'];

    // Query untuk menghapus data supplier berdasarkan ID
    $sql = "DELETE FROM supplier WHERE id_supplier = $id_supplier";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID tidak ditemukan";
}

// Redirect kembali ke halaman tabel supplier setelah menghapus
header("Location: ../tabelDataSupp.php");
exit();
?>
