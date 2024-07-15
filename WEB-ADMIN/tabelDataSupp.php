<?php
include 'koneksi.php';

// Query untuk mengambil data supplier
$sql = "SELECT * FROM supplier";
$result = $conn->query($sql);

// Inisialisasi variabel untuk menyimpan hasil query
$suppliers = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $suppliers[] = $row;
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
    <title>Data Supplier</title>
</head>
<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Data Supplier</h1>
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
                        <th>Id Supplier <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nama Supplier <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nama Barang <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Alamat <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Kode pos <span class="icon-arrow">&UpArrow;</span></th>
                        <th>No telp <span class="icon-arrow">&UpArrow;</span></th>
                        <th>No rek <span class="icon-arrow">&UpArrow;</span></th>
                        <!-- <th>Status <span class="icon-arrow">&UpArrow;</span></th> -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $supplier): ?>
                        <tr>
                            <td><?php echo $supplier['id_supplier']; ?></td>
                            <td><?php echo $supplier['nama_supplier']; ?></td>
                            <td><?php echo $supplier['nama_barang']; ?></td>
                            <td><?php echo $supplier['alamat_supplier']; ?></td>
                            <td><?php echo $supplier['email_supplier']; ?></td>
                            <td><?php echo $supplier['kode_pos']; ?></td>
                            <td><?php echo $supplier['no_telp']; ?></td>
                            <td><?php echo $supplier['no_rek']; ?></td>
                            <!-- <td><?php echo $supplier['status']; ?></td> -->
                            <td>
                                <button onclick="editRow(<?php echo $supplier['id_supplier']; ?>)">Edit</button>
                                <button onclick="deleteRow(<?php echo $supplier['id_supplier']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="halamanutama.php"><button id="backButton" onclick="goBack()">Back</button></a>
        </section>
    </main>
    <script>
        function editRow(id) {
            window.location.href = 'proses/edit_supp.php?id=' + id;
        }

        function deleteRow(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = 'proses/delete_supp.php?id=' + id;
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
