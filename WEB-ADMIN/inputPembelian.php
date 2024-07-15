<?php
session_start();
include 'koneksi.php';  // Pastikan ini menghubungkan ke database dengan benar

// Initialize variables
$tanggal_beli = '';
$nama_produk = '';
$jumlah_produk = '';
$harga_produk = '';
$total = '';
$nama_supplier = '';
$status = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $tanggal_beli = $_POST['tanggal_beli'];
    $nama_produk = $_POST['nama_produk'];
    $jumlah_produk = $_POST['jumlah_produk'];
    $harga_produk = $_POST['harga_produk'];
    $nama_supplier = $_POST['nama_supplier'];
    $status = $_POST['status'];

    // Calculate total
    if (!empty($jumlah_produk) && !empty($harga_produk)) {
        $total = $jumlah_produk * $harga_produk;
    }

    // Save data to database
    if (isset($tanggal_beli, $nama_produk, $jumlah_produk, $harga_produk, $nama_supplier, $status)) {
        $tanggal_beli = mysqli_real_escape_string($conn, $tanggal_beli);
        $nama_produk = mysqli_real_escape_string($conn, $nama_produk);
        $jumlah_produk = mysqli_real_escape_string($conn, $jumlah_produk);
        $harga_produk = mysqli_real_escape_string($conn, $harga_produk);
        $total = mysqli_real_escape_string($conn, $total);
        $nama_supplier = mysqli_real_escape_string($conn, $nama_supplier);
        $status = mysqli_real_escape_string($conn, $status);

        // Simpan data ke database
        $query = "INSERT INTO pembelian (tanggal_beli, nama_produk, jumlah_produk, harga_produk, total, nama_supplier, status) 
                  VALUES ('$tanggal_beli', '$nama_produk', '$jumlah_produk', '$harga_produk', '$total', '$nama_supplier', '$status')";

        if (mysqli_query($conn, $query)) {
            echo '<script language="javascript">';
            echo 'alert("Produk berhasil dibeli");';
            echo 'window.location.href = "Tabel_PembelianBarang.php";'; 
            echo '</script>';
            exit;
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pembelian</title>
    <style>
        * { margin: 0; padding: 0; font-family: 'Poppins', serif; }
        body { background-size: cover; background-color: #DBE9FA; }
        section { display: flex; justify-content: center; align-items: center; min-height: 100vh; width: 100%; background-repeat: no-repeat; background-size: cover; background-position: center; }
        .form-box { height: fit-content; max-width: 600px; width: 100%; background-color: #fff; padding: 25px 30px; border-radius: 15px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15); }
        h2 { font-size: 2em; color: black; text-align: center; margin-bottom: 30px; }
        .inputbox { margin-bottom: 20px; height: 45px; width: 95%; outline: none; font-size: 16px; border-radius: 5px; padding-left: 15px; border: 1px solid #ccc; border-bottom-width: 2px; transition: all 0.3s ease; border-color: #9b59b6; }
        .inputbox input, .inputbox select { height: 45px; width: 100%; border: none; outline: none; font-size: 1rem; padding: 0px; border-radius: 5px; }
        button { width: 100%; height: 40px; border-radius: 5px; border: none; color: #fff; margin-top: 20px; font-size: 18px; font-weight: 500; letter-spacing: 1px; cursor: pointer; transition: all 0.3s ease; background: linear-gradient(135deg, #71b7e6, #9b59b6); box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px; }
        button:hover { transform: scale(0.99); box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; background: linear-gradient(-135deg, #71b7e6, #9b59b6); }
    </style>
</head>
<body>
<section>
    <div class="form-box">
        <div class="form-value">
            <form method="post" action="">
                <h2>Input Pembelian</h2>

                <div class="inputbox">
                    <input type="date" name="tanggal_beli" value="<?php echo htmlspecialchars($tanggal_beli); ?>" placeholder="Tanggal Beli" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="nama_produk" value="<?php echo htmlspecialchars($nama_produk); ?>" placeholder="Nama produk" />
                </div>

                <div class="inputbox">
                    <input type="number" name="jumlah_produk" id="jumlah_produk" value="<?php echo htmlspecialchars($jumlah_produk); ?>" placeholder="Jumlah Produk" />
                </div>

                <div class="inputbox">
                    <input type="number" name="harga_produk" id="harga_produk" value="<?php echo htmlspecialchars($harga_produk); ?>" placeholder="Harga/pcs" />
                </div>

                <div class="inputbox">
                    <input type="text" name="total" id="total" value="<?php echo htmlspecialchars($total); ?>" placeholder="Total" readonly />
                </div>

                <div class="inputbox">
                    <input type="text" name="nama_supplier" value="<?php echo htmlspecialchars($nama_supplier); ?>" placeholder="Nama Supplier" />
                </div>

                <div class="inputbox">
                    <select name="status" required>
                        <option value="">Pilih Status</option>
                        <option value="Lunas" <?php echo ($status == 'Lunas') ? 'selected' : ''; ?>>Pembayaran Lunas</option>
                        <option value="Belum lunas" <?php echo ($status == 'Belum lunas') ? 'selected' : ''; ?>>Pembayaran Belum Lunas</option>
                    </select>
                </div>

                <button type="submit">Simpan</button>
                <button type="button" onclick="window.location.href = 'Tabel_PembelianBarang.php';">Lihat Data Pembelian</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>
