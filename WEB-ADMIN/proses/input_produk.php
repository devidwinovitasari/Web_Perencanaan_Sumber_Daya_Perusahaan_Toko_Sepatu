<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $stok = $_POST['stok'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "INSERT INTO products (name, stok, price, image) VALUES ('$name', '$stok', '$price', '$image')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../Tabel_Produk.php");
        exit();
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Produk</title>
    <style>
        * { margin: 0; padding: 0; font-family: 'Poppins', serif; }
        body { background-size: cover; background-color: #DBE9FA; }
        section { display: flex; justify-content: center; align-items: center; min-height: 100vh; width: 100%; background-repeat: no-repeat; background-size: cover; background-position: center; }
        .form-box { height: fit-content; max-width: 600px; width: 100%; background-color: #fff; padding: 25px 30px; border-radius: 15px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15); }
        h2 { font-size: 2em; color: black; text-align: center; margin-bottom: 30px; }
        .inputbox { margin-bottom: 20px; height: 45px; width: 95%; outline: none; font-size: 16px; border-radius: 5px; padding-left: 15px; border: 1px solid #ccc; border-bottom-width: 2px; transition: all 0.3s ease; border-color: #9b59b6; }
        .inputbox input { height: 45px; width: 100%; border: none; outline: none; font-size: 1rem; padding: 0px; border-radius: 5px; }
        button { width: 100%; height: 40px; border-radius: 5px; border: none; color: #fff; margin-top: 20px; font-size: 18px; font-weight: 500; letter-spacing: 1px; cursor: pointer; transition: all 0.3s ease; background: linear-gradient(135deg, #71b7e6, #9b59b6); box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px; }
        button:hover { transform: scale(0.99); box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; background: linear-gradient(-135deg, #71b7e6, #9b59b6); }
    </style>
</head>
<body>
<section>
    <div class="form-box">
        <div class="form-value">
            <form method="post" action="input_produk.php">
                <h2>Input Produk</h2>

                <div class="inputbox">
                    <input type="text" name="name" placeholder="Nama Produk" required />
                </div>

                <div class="inputbox">
                    <input type="number" name="stok" placeholder="Stok" required />
                </div>

                <div class="inputbox">
                    <input type="number" step="0.01" name="price" placeholder="Harga" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="image" placeholder="Deskripsi" required />
                </div>

                <button type="submit">Tambah</button>
                <button type="button" onclick="window.location.href = '../Tabel_Produk.php';">Cancel</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>
