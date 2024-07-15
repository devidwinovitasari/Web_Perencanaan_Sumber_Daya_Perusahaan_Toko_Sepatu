<?php
include 'koneksi.php';

// Query untuk mengambil data produk
$sql = "SELECT id, NAME, stok, price FROM products";
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
    <title>Data Produk</title>
</head>
<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Data Produk</h1>
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
            <!-- Tambahkan tombol Input Produk di sini -->
            <button onclick="location.href='proses/input_produk.php'">Input Produk</button>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Id Produk <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nama <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Stok <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Harga <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Deskripsi <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Aksi</th> <!-- Kolom untuk aksi: Edit dan Hapus -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['NAME']; ?></td>
                            <td><?php echo $product['stok']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td>AeroStreet</td>
                            <td>
                                <button onclick="location.href='proses/edit_produk.php?id=<?php echo $product['id']; ?>'">Edit</button>
                                <button onclick="deleteProduct(<?php echo $product['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="halamanutama.php"><button onclick="goBack()">Back</button></a>
        </section>
    </main>

    <script>
        function deleteProduct(id) {
            if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
                window.location.href = 'proses/delete_produk.php?id=' + id;
            }
        }
    </script>
</body>
</html>
