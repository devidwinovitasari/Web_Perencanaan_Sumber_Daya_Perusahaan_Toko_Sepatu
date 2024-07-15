<?php
include 'koneksi.php';

// Query untuk mengambil data orders
$sql = "SELECT id_orders, nama, tanggal_pembayaran, total_harga, metode_pembayaran, metode_pengiriman, alamat FROM orders";
$result = $conn->query($sql);

// Inisialisasi variabel untuk menyimpan hasil query
$orders = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orders[] = $row;
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
    <title>Data Pemesanan</title>
    <script>
        function deleteOrder(id) {
            if (confirm("Apakah Anda yakin ingin menghapus pesanan ini?")) {
                window.location.href = 'proses/delete_pemesanan.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Data Pemesanan</h1>
            <div class="input-group">
                <input type="search" placeholder="Cari Data...">
                <img src="gambar/search-removebg-preview.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label></label>
                    <label>PDF <img src="images/pdf.png" alt=""></label>
                    <label>JSON <img src="images/json.png" alt=""></label>
                    <label>CSV <img src="images/csv.png" alt=""></label>
                    <label>EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Id Pembayaran <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nama Pembeli <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Tgl Pembayaran <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Total Harga <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Metode Pembayaran <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Metode Pengiriman <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Alamat <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Aksi</th> <!-- Kolom untuk aksi: Edit dan Hapus -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['id_orders']; ?></td>
                            <td><?php echo $order['nama']; ?></td>
                            <td><?php echo $order['tanggal_pembayaran']; ?></td>
                            <td><?php echo $order['total_harga']; ?></td>
                            <td><?php echo $order['metode_pembayaran']; ?></td>
                            <td><?php echo $order['metode_pengiriman']; ?></td>
                            <td><?php echo $order['alamat']; ?></td>
                            <td>
                                <button onclick="deleteOrder(<?php echo $order['id_orders']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="halamanutama.php"><button onclick="goBack()">Back</button></a>
        </section>
    </main>
</body>
</html>
