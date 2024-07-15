<?php
include 'koneksi.php';

// Query untuk mengambil data pembelian barang dari supplier
$sql = "SELECT id_beli, tanggal_beli, nama_produk, jumlah_produk, harga_produk, total, nama_supplier, status FROM pembelian";
$result = $conn->query($sql);

// Inisialisasi variabel untuk menyimpan hasil query
$products = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style2.css">
    <title>Data Pembelian Barang</title>
</head>
<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Data Pembelian Barang</h1>
            <!-- Your search and export file elements here -->
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Id Pembelian <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Tgl Pembelian <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nama Produk <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Jumlah Produk <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Harga Produk<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Total<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nama Supplier<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Status<span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through rows and output data
                    if (!empty($products)) {
                        foreach ($products as $row) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["id_beli"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["tanggal_beli"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["nama_produk"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["jumlah_produk"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["harga_produk"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["total"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["nama_supplier"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
                <td>
                    <a href="halamanutama.php"><button>Back</button></a>
                </td>
            </table>
        </section>
    </main>
</body>
</html>
