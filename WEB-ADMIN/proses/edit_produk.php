<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $stok = $_POST['stok'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "UPDATE products SET name='$name', stok='$stok', price='$price', image='$image' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    header("Location: ../Tabel_Produk.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
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
            <form method="post" action="edit_produk.php">
                <h2>Edit Produk</h2>
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

                <div class="inputbox">
                    <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" placeholder="Nama Produk" required />
                </div>

                <div class="inputbox">
                    <input type="number" name="stok" value="<?php echo htmlspecialchars($product['stok']); ?>" placeholder="Stok" required />
                </div>

                <div class="inputbox">
                    <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" placeholder="Harga" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="image" value="<?php echo htmlspecialchars($product['image']); ?>" placeholder="Deskripsi" required />
                </div>

                <button type="submit">Update</button>
                <button type="button" onclick="window.location.href = '../Tabel_Produk.php'">Cancel</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>
