<?php
session_start();
include 'koneksi.php';  

// Pastikan data total_harga dan keranjang ada di sesi
if (!isset($_SESSION['total_harga']) || !isset($_SESSION['keranjang'])) {
    header('Location: keranjang.php');
    exit;
}

// Ambil nilai total_harga dan keranjang dari sesi
$total_harga = $_SESSION['total_harga'];
$keranjang = $_SESSION['keranjang'];

// Ambil nama barang dari keranjang
$nama_barang = [];
foreach ($keranjang as $id_produk => $jumlah) {
    $query = "SELECT name FROM products WHERE id = $id_produk";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $produk = mysqli_fetch_assoc($result);
        $nama_barang[] = $produk['name'] . " (x" . $jumlah . ")";
    }
}

$nama_barang = implode(", ", $nama_barang);

// Proses form saat dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if required POST variables are set
    if (isset($_POST['nama'], $_POST['tanggal_pembayaran'], $_POST['alamat'], $_POST['metode_pembayaran'], $_POST['metode_pengiriman'])) {
        $nama = $_POST['nama'];
        $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
        $alamat = $_POST['alamat'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $metode_pengiriman = $_POST['metode_pengiriman'];

        // Prevent SQL Injection
        $nama = mysqli_real_escape_string($conn, $nama);
        $tanggal_pembayaran = mysqli_real_escape_string($conn, $tanggal_pembayaran);
        $alamat = mysqli_real_escape_string($conn, $alamat);
        $metode_pembayaran = mysqli_real_escape_string($conn, $metode_pembayaran);
        $metode_pengiriman = mysqli_real_escape_string($conn, $metode_pengiriman);

        // Simpan data pesanan ke database
        $query = "INSERT INTO orders (nama, tanggal_pembayaran, nama_barang, total_harga, metode_pembayaran, metode_pengiriman, alamat) 
                  VALUES ('$nama', '$tanggal_pembayaran', '$nama_barang', '$total_harga', '$metode_pembayaran', '$metode_pengiriman', '$alamat')";

        if (mysqli_query($conn, $query)) {
            // Pesanan berhasil disimpan, arahkan ke halaman sukses
            unset($_SESSION['keranjang']);
            unset($_SESSION['total_harga']);

            // Tampilkan alert dan redirect dengan JavaScript
            echo '<script language="javascript">';
            echo 'alert("Pesanan berhasil! Terima kasih telah berbelanja.");';
            echo 'window.location.href = "index.php";'; // Ganti index.php dengan halaman utama Anda
            echo '</script>';
            exit;
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    // Jika tidak ada data POST, set $nama sebagai string kosong
    $nama = '';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bayar.css" />
    <style> 
        a {
            text-decoration: none;
        }
        .iconbs {
            font-size: 3rem; /* Atur ukuran sesuai kebutuhan */
            color: black;
        }
    </style>
</head>
<header>
    <input type="checkbox" name="" id="toggler" />
    <a href="keranjang.php" class="bi bi-arrow-left-circle-fill iconbs"></a>
    <a class="logo">AeroStreet<span>.</span></a>
    <div class="icons">
        <a href="#" class="bi bi-heart-fill"></a>
        <a href="keranjang.php" class="bi bi-cart-fill"></a> 
    </div>
</header>
<body>
    <div class="container d-lg-flex">
        <div class="box-2">
            <div class="box-inner-2">
                <div>
                    <h1 class="fw-bold" style="text-align: center;">Form Pembayaran</h1>
                    <p class="dis mb-3">Complete your purchase by providing your payment</p>
                </div>
                <form action="sukses.php" method="post">
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Nama</p>
                        <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama Pemesan" value="<?php echo $nama; ?>">
                    </div>
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Tanggal Pembayaran</p>
                        <input class="form-control" type="date" id="tanggalPembayaran" name="tanggal_pembayaran" placeholder="Tanggal Pemesanan" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Nama Barang</p>
                        <input id="namaBarangInput" class="form-control" type="text" name="nama_barang" value=" <?php echo $produk['name']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Total Harga</p>
                        <input id="totalPriceInput" class="form-control" type="text" name="total_harga" value="Rp <?php echo number_format($total_harga, 0, ',', '.'); ?>" readonly>
                    </div>


                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Diskon</p>
                        <?php
                        $diskon = 'Tidak Ada Diskon';
                        if ($total_harga > 350000) {
                            $diskon = 'Diskon Tas Sekolah dan Merchandise';
                        } elseif ($total_harga > 300000) {
                            $diskon = 'Diskon Totebag dan Tas Sekolah';
                        }
                        ?>
                        <input id="diskonInput" class="form-control" type="text" name="diskon" value="<?php echo $diskon; ?>" readonly>
                    </div>

                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Metode Pembayaran</p>
                        <select class="form-select" name="metode_pembayaran" aria-label="Default select example">
                            <option selected hidden>BRI</option>
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                            <option value="DANA">DANA</option>
                            <option value="COD">COD</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Metode Pengiriman</p>
                        <select class="form-select" name="metode_pengiriman" aria-label="Default select example">
                            <option selected hidden>J&T Express</option>
                            <option value="Pos Indonesia">Pos Indonesia</option>
                            <option value="JNE Express">JNE Express</option>
                            <option value="Antareja">Antareja</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Alamat</p>
                        <input class="form-control" type="text" name="alamat" placeholder="Alamat" required>
                    </div>
                        <div class="d-flex flex-column dis">                                                             
                            <button type="submit" class="btn btn-primary mt-2">Pesan</button>
                            <span class="fas fa-dollar-sign px-1"></span>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
