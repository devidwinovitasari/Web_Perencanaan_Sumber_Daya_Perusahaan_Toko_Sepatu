<?php
include 'koneksi.php';

// Query untuk mengambil data admin
$sql = "SELECT id, username, password, email FROM admin";
$result = $conn->query($sql);

// Inisialisasi variabel untuk menyimpan hasil query
$admins = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $admins[] = $row;
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
    <title>Data Admin</title>
</head>
<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Data Admin</h1>
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
                        <th>Id Admin <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Username <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Password <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td><?php echo $admin['id']; ?></td>
                            <td><?php echo $admin['username']; ?></td>
                            <td><?php echo $admin['password']; ?></td>
                            <td><?php echo $admin['email']; ?></td>
                            <td>
                                <button onclick="editRow(<?php echo $admin['id']; ?>)">Edit</button>
                                <button onclick="deleteRow(<?php echo $admin['id']; ?>)">Delete</button>
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
            window.location.href = 'proses/edit_admin.php?id=' + id;
        }

        function deleteRow(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = 'proses/delete_admin.php?id=' + id;
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
