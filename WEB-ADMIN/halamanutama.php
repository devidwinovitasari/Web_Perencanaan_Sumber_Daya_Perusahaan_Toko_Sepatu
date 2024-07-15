<?php
// Koneksi ke database
include 'koneksi.php';

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk menghitung jumlah produk
$sql_produk = "SELECT COUNT(id) AS total_produk FROM products";
$result_produk = $conn->query($sql_produk);
$row_produk = $result_produk->fetch_assoc();
$total_produk = $row_produk['total_produk'];

// Query untuk menghitung jumlah pesanan dan total pendapatan
$sql_pesanan = "SELECT COUNT(id_orders) AS total_pesanan, SUM(total_harga) AS total_pendapatan FROM orders";
$result_pesanan = $conn->query($sql_pesanan);
$row_pesanan = $result_pesanan->fetch_assoc();
$total_pesanan = $row_pesanan['total_pesanan'];
$total_pendapatan = $row_pesanan['total_pendapatan'];

// Query untuk menghitung jumlah pelanggan
$sql_pelanggan = "SELECT COUNT(id) AS total_pelanggan FROM pelanggan";
$result_pelanggan = $conn->query($sql_pelanggan);
$row_pelanggan = $result_pelanggan->fetch_assoc();
$total_pelanggan = $row_pelanggan['total_pelanggan'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
           @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

            :root {
                --main-color: #DD2F6E;
                --color-dark: #1D2231;
                --text-grey: #8390A2;
                --bg-color: #f4f7f6;
                --card-bg: #fff;
            }

            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                list-style-type: none;
                text-decoration: none;
                font-family: 'Poppins', sans-serif;
            }

            body {
                background: var(--bg-color);
            }

            .sidebar {
                width: 250px;
                position: fixed;
                left: 0;
                top: 0;
                height: 100%;
                background: var(--color-dark);
                z-index: 100;
                padding-top: 20px; /* Menambahkan padding atas untuk menurunkan sidebar */
                transition: all 0.3s;
            }

            .sidebar-brand {
                height: 90px;
                padding: 1rem 2rem;
                color: #fff;
                font-size: 1.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                background: var(--main-color);
            }

            .sidebar-menu {
                margin-top: 1rem;
            }

            .sidebar-menu ul {
                padding: 0;
            }

            .sidebar-menu li {
                width: 100%;
                margin-bottom: 1.7rem;
            }

            .sidebar-menu a {
                padding: 1rem 2rem;
                display: block;
                color: #fff;
                font-size: 1rem;
                transition: background 0.3s;
            }

            .sidebar-menu a:hover,
            .sidebar-menu a.active {
                background: var(--main-color);
                color: #fff;
                border-radius: 30px 0 0 30px;
            }

            .sidebar-menu a span:first-child {
                font-size: 1.5rem;
                padding-right: 1rem;
            }

            .main-content {
                margin-left: 250px;
                background: url(b\ copy.jpg) no-repeat center center/cover;
                min-height: calc(113vh - 90px);
                padding: 2rem 1.5rem;
                color: var(--color-dark);
                transition: margin-left 0.3s;
            }

            header {
                display: flex;
                justify-content: space-between;
                padding: 1.5rem;
                background: #fff;
                box-shadow: 0 3px 10px rgba(0,0,0,0.1);
                position: fixed;
                left: 250px;
                width: calc(100% - 250px);
                top: 0;
                z-index: 100;
                align-items: center;
                transition: left 0.3s, width 0.3s;
            }

            .header h2 {
                color: var(--color-dark);
                font-size: 1.5rem;
            }

            .search-wrapper {
                border: 1px solid #f0f0f0;
                border-radius: 30px;
                height: 50px;
                display: flex;
                align-items: center;
                overflow: hidden;
                background: #fff;
            }

            .search-wrapper span {
                display: inline-block;
                padding: 0 1rem;
                font-size: 1.5rem;
                color: var(--text-grey);
            }

            .search-wrapper input {
                height: 100%;
                padding: 0.5rem;
                border: none;
                outline: none;
                flex: 1;
            }

            .user-wrapper {
                display: flex;
                align-items: center;
            }

            .user-wrapper img {
                border-radius: 50%;
                margin-right: 1rem;
            }

            .user-wrapper div {
                color: var(--text-grey);
            }

            .cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                grid-gap: 2rem;
                margin-top: 5rem; /* Menambahkan margin atas untuk menurunkan posisi kartu */
                padding: 0 1rem;
            }

            .card-single {
                background: var(--card-bg);
                padding: 1.5rem;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                display: flex;
                align-items: center;
                justify-content: space-between;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .card-single:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            }

            .card-single div:first-child h1 {
                margin-bottom: 0.5rem;
                font-size: 2rem;
                color: var(--main-color);
            }

            .card-single div:first-child span {
                color: var(--text-grey);
                font-weight: 600;
            }

            .card-single div:last-child span {
                font-size: 2.5rem;
                color: var(--main-color);
            }
    </style>
</head>
<body>
        
<div class="sidebar">
    <div class="sidebar-brand">
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="" class="active"><span class="las la-igloo"></span> <span>Dashboard</span></a>
            </li>

            <li>
                <a href="Tabel_Produk.php" class="customer-link"><span class="las la-box"></span> <span>Gudang</span></a>
            </li>

            <li>
                <a href="Tabel_Pemesanan.php" class="customer-link"><span class="las la-receipt"></span> <span>Pemesanan</span></a>
            </li>

            <li>
                <a href="Tabel_PembelianBarang.php" class="customer-link"><span class="las la-shopping-bag"></span> <span>Pembelian</span></a>
            </li>

            <li>
                <a href="inputPembelian.php" class="customer-link"><span class="las la-truck"></span> <span>Input Pembelian</span></a>
            </li>

            <li>
                <a href="Tabel_Customer.php" class="customer-link"><span class="las la-users"></span> <span>Customer</span></a>
            </li>                    

            <li>
                <a href="tabelDataSupp.php" class="customer-link"><span class="las la-female"></span> <span>Supplier</span></a>
            </li>

            <li>
                <a href="inputSupplier.php" class="customer-link"><span class="las la-pen"></span> <span>Input Supplier</span></a>
            </li>
        </ul>
    </div>
</div>

<div class="main-content">
    <header>
        <h2>Dashboard</h2>
        <div class="search-wrapper">
            <span class="las la-search"></span>
            <input type="search" placeholder="search Here">
        </div>
        <div class="user-wrapper">
            <img src="cust2.jpg" width="40px" height="40px">
            <div>
                <h4>Admin</h4>
                <small>Super admin</small>
            </div>
        </div>
    </header>

    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <h1><?php echo $total_produk; ?></h1>
                    <span>Produk</span>
                </div>
                <div>
                    <span class="las la-box"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1><?php echo $total_pesanan; ?></h1>
                    <span>Pesanan</span>
                </div>
                <div>
                    <span class="las la-shopping-bag"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1><?php echo $total_pelanggan; ?></h1>
                    <span>Pelanggan</span>
                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>Rp<?php echo number_format($total_pendapatan, 2); ?></h1>
                    <span>Pendapatan</span>
                </div>
                <div>
                    <span class="las la-wallet"></span>
                </div>
            </div>

        </div>
    </main>
</div>

<script>
$(document).ready(function() {
    // Tangani klik pada semua tautan menu kecuali "Customer"
    $(".sidebar-menu ul li a:not(.customer-link)").click(function(e) {
        e.preventDefault(); // Cegah aksi default (menghubungkan ke halaman)

        // Simulasi fungsi dasar (ganti dengan pemuatan konten sebenarnya)
        alert("Menu diklik: " + $(this).text());
    });

    // Tangani klik khusus pada tautan "Customer"
    $(".customer-link").click(function() {
        // Muat halaman customer.html ke dalam elemen main-content
        $(".main-content").load("customer.html");
    });
});
</script>

</body>
</html>