<?php
include 'function.php'; 
include 'koneksi.php';


// Inisialisasi keranjang jika belum ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

// Menangani POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_produk'])) {
        $id_produk = $_POST['id_produk'];
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'add':
                    tambahkanKeKeranjang($id_produk);
                    break;
                case 'subtract':
                    kurangiDariKeranjang($id_produk);
                    break;
                case 'remove':
                    hapusDariKeranjang($id_produk);
                    break;
            }
        } else {
            // Tambahkan produk ke keranjang jika tidak ada aksi spesifik
            if (!isset($_SESSION['keranjang'][$id_produk])) {
                $_SESSION['keranjang'][$id_produk] = 1;
            } else {
                $_SESSION['keranjang'][$id_produk]++;
            }
        }
        header('Location: keranjang.php');
        exit;
    }
}

// Menghitung total harga
$total_harga = 0;
if (!empty($_SESSION['keranjang'])) {
    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $query = "SELECT price FROM products WHERE id = $id_produk";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $produk = mysqli_fetch_assoc($result);
            $total_harga += $produk['price'] * $jumlah;
        }
    }
}

$_SESSION['total_harga'] = $total_harga;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/keranjang.css">
    <style>
        a {
            text-decoration: none;
        }
        .iconbs {
            font-size: 3rem;
            color: black;
        }
        .total {
            text-align: center;
            font-size: 2rem;
            font-weight: bolder;
            color: #000000;
            padding: 1rem;
            margin: 3rem 0;
            background: rgba(227, 194, 9, 0.994);
        }
        .product-container {
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
        .product-container .product-name {
            font-size: 18px;
        }
        .product-container .price,
        .product-container .text-muted {
            font-size: 16px;
        }
    </style>
</head>
<body>
<header>
    <input type="checkbox" id="toggler">
    <a href="index.php" class="bi bi-arrow-left-circle-fill iconbs"></a>
    <a href="index.php" class="logo">AeroStreet<span>.</span></a>
    <div class="icons">
        <a href="#" class="bi bi-heart-fill"></a>
        <a href="keranjang.html">Keranjang Saya</a>
    </div>
</header>

<!-- cart + summary -->
<section class="bg-light my-5">
    <div class="container">
        <div class="row">
            <!-- cart -->
            <?php if (!empty($_SESSION['keranjang'])): ?>
            <div class="row gy-3 mb-4">
                <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                <!-- Tampilkan detail produk berdasarkan id_produk -->
                <?php
                $query = "SELECT * FROM products WHERE id = $id_produk";
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $produk = mysqli_fetch_assoc($result);
                } else {
                    $produk = null;
                }
                ?>
                <?php if ($produk): ?>
                <div class="col-lg-5">
                    <div class="me-lg-5 product-container">
                        <div class="d-flex align-items-center">
                            <form method="post" action="keranjang.php">
                                <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                                <input type="checkbox" class="form-check-input me-3 product-checkbox" style="width: 25px; height: 25px;" name="selected[]" value="<?php echo $id_produk; ?>" data-price="<?php echo $produk['price']; ?>" checked disabled>
                            </form>
                            <img src="gambar/<?php echo $produk['image']; ?>" class="border rounded me-3" style="width: 110px; height: 110px;">
                            <div>
                                <a class="nav-link product-name"><?php echo $produk['name']; ?></a>
                                <p class="card-text">Rp. <span class="price"><?php echo number_format($produk['price'], 0, ',', '.'); ?></span></p>
                                <small class="text-muted">Rp. <?php echo number_format($produk['price'], 0, ',', '.'); ?> / per item</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-6">
                    <div class="input-group">
                        <form method="post" action="keranjang.php">
                            <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                            <input type="hidden" name="action" value="subtract">
                            <button type="submit" class="btn btn-danger">-</button>
                        </form>
                        <input type="text" class="jml form-control text-center quantity" value="<?php echo $jumlah; ?>" readonly>
                        <form method="post" action="keranjang.php">
                            <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                            <input type="hidden" name="action" value="add">
                            <button type="submit" class="btn btn-success">+</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                    <div>
                        <a href="#!" class="btn btn-light border icon-hover-primary"><i class="bi bi-heart-fill"></i></a>
                        <form method="post" action="keranjang.php" style="display:inline;">
                            <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                            <input type="hidden" name="action" value="remove">
                            <button type="submit" class="btn btn-light border text-danger icon-hover-danger">Remove</button>
                        </form>
                    </div>
                </div>
                <?php else: ?>
                <p>Produk dengan ID <?php echo $id_produk; ?> tidak ditemukan.</p>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <p>Keranjang kosong.</p>
            <?php endif; ?>

            <div class="card shadow-0 border">
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a class="total">Total Harga = Rp. <span id="total"><?php echo number_format($total_harga, 0, ',', '.'); ?></span></a>
                        </div>
                    </div>
                    <div class="mt-3">
                    <form action="bayar.php" method="post">
                        <input type="hidden" name="total_harga" value="<?php echo $total_harga; ?>">
                        <button type="submit" class="btn btn-outline-primary w-100 shadow-0 mb-2">Bayar Pesanan</button>
                    </form>



                        <a href="index.php" class="btn btn-light w-100 border mt-2">Kembali Ke Halaman Utama</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- summary -->
    </div>
</div>
</section>
<!-- cart + summary -->
<section>
    <div class="container my-5">
        <header class="mb-4">
            <h3>Recommended items</h3>
        </header>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                    <div class="mask px-2" style="height: 50px;">
                        <div class="d-flex justify-content-between">
                            <h6><span class="badge bg-danger pt-1 mt-3 ms-2">-10%</span></h6>
                            <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                        </div>
                    </div>
                    <a href="#">
                        <img src="gambar/aero9.jpg" class="card-img-top rounded-2">
                    </a>
                    <div class="card-body d-flex flex-column pt-3 border-top">
                        <a href="#" class="nav-link">aurora lilac putih</a>
                        <div class="price-wrap mb-2">
                            <strong class="price">Rp. 154.900</strong>
                            <del class="price-old">Rp. 175.900</del>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                    <div class="mask px-2" style="height: 50px;">
                        <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                    </div>
                    <a href="#">
                        <img src="gambar/aero10.jpg" class="card-img-top rounded-2">
                    </a>
                    <div class="card-body d-flex flex-column pt-3 border-top">
                        <a href="#" class="nav-link">Jennie Hitam Putih Emas</a>
                        <div class="price-wrap mb-2">
                            <strong class="">Rp. 154.900</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                    <div class="mask px-2" style="height: 50px;">
                        <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                    </div>
                    <a href="#">
                        <img src="gambar/aero8.jpg" class="card-img-top rounded-2">
                    </a>
                    <div class="card-body d-flex flex-column pt-3 border-top">
                        <a href="#" class="nav-link">Jennie Putih Abu Muda</a>
                        <div class="price-wrap mb-2">
                            <strong class="">Rp. 154.900</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                    <div class="mask px-2" style="height: 50px;">
                        <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                    </div>
                    <a href="#">
                        <img src="gambar/aero6.jpg" class="card-img-top rounded-2">
                    </a>
                    <div class="card-body d-flex flex-column pt-3 border-top">
                        <a href="#" class="nav-link">Comfy Hitam Sepatu Slip On Slop Casual</a>
                        <div class="price-wrap mb-2">
                            <strong class="">Rp. 149.900</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Recommended -->

<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#review">Review</a>
            <a href="#contact">Contact</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">my account</a>
            <a href="#">my order</a>
            <a href="#">my favorite</a>
        </div>

        <div class="box">
            <h3>Lokasi</h3>
            <a href="#">Surabaya</a>
            <a href="#">Malang</a>
            <a href="#">Solo</a>
            <a href="#">Jakarta</a>
            <a href="#">Manado</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+62-890-0879-456</a>
            <a href="#">aerostreetshoes@gmail.com</a>
            <a href="#">Indonesia,Jawa Tengah</a>
        </div>
    </div>
</section>
</body>
</html>