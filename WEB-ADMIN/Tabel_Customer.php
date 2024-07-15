<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style2.css" />
    <title>Data Customer</title>
</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Data Customer</h1>
            <div class="input-group">
                <input type="search" placeholder="Cari Data..." />
                <img src="gambar/search-removebg-preview.png" alt="" />
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file" />
                <div class="export__file-options">
                    <label></label>
                    <label>PDF <img src="images/pdf.png" alt="" /></label>
                    <label>JSON <img src="images/json.png" alt="" /></label>
                    <label>CSV <img src="images/csv.png" alt="" /></label>
                    <label>EXCEL <img src="images/excel.png" alt="" /></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Id Pelanggan <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nama <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th>No.Telp <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Alamat <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include file koneksi.php untuk menghubungkan ke database
                    include 'koneksi.php';

                    // Query untuk mengambil data dari view customer_data
                    $query = "SELECT * FROM pelanggan";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['notlp']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Data tidak ditemukan</td></tr>";
                    }

                    // Membebaskan hasil query
                    mysqli_free_result($result);

                    // Menutup koneksi
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            <td>
                <a href="halamanutama.php"><button onclick="goBack()">Back</button></a>
            </td>
        </section>
    </main>
</body>
</html>
