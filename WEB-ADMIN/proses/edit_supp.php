<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $nama_barang = $_POST['nama_barang'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $email_supplier = $_POST['email_supplier'];
    $kode_pos = $_POST['kode_pos'];
    $no_telp = $_POST['no_telp'];
    $no_rek = $_POST['no_rek'];
    $status = $_POST['status'];

    $sql = "UPDATE supplier SET 
            nama_supplier='$nama_supplier', 
            nama_barang='$nama_barang', 
            alamat_supplier='$alamat_supplier', 
            email_supplier='$email_supplier', 
            kode_pos='$kode_pos', 
            no_telp='$no_telp', 
            no_rek='$no_rek', 
            status='$status' 
            WHERE id_supplier=$id_supplier";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    header("Location: ../tabelDataSupp.php");
    exit();
}

$id_supplier = $_GET['id'];
$sql = "SELECT * FROM supplier WHERE id_supplier=$id_supplier";
$result = $conn->query($sql);
$supplier = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
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
            <form method="post" action="edit_supp.php">
                <h2>Edit Supplier</h2>
                <input type="hidden" name="id_supplier" value="<?php echo $supplier['id_supplier']; ?>">

                <div class="inputbox">
                    <input type="text" name="nama_supplier" value="<?php echo htmlspecialchars($supplier['nama_supplier']); ?>" placeholder="Nama Supplier" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="nama_barang" value="<?php echo htmlspecialchars($supplier['nama_barang']); ?>" placeholder="Nama Barang" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="alamat_supplier" value="<?php echo htmlspecialchars($supplier['alamat_supplier']); ?>" placeholder="Alamat Supplier" required />
                </div>

                <div class="inputbox">
                    <input type="email" name="email_supplier" value="<?php echo htmlspecialchars($supplier['email_supplier']); ?>" placeholder="Email Supplier" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="kode_pos" value="<?php echo htmlspecialchars($supplier['kode_pos']); ?>" placeholder="Kode Pos" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="no_telp" value="<?php echo htmlspecialchars($supplier['no_telp']); ?>" placeholder="Nomor Telepon" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="no_rek" value="<?php echo htmlspecialchars($supplier['no_rek']); ?>" placeholder="Nomor Rekening" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="status" value="<?php echo htmlspecialchars($supplier['status']); ?>" placeholder="Status" required />
                </div>

                <button type="submit">Update</button>
                <button type="button" onclick="window.location.href = '../tabelDataSupp.php';">Cancel</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>
