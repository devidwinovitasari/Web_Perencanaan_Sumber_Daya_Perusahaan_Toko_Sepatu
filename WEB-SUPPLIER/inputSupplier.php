<?php
session_start();
include 'koneksi.php';  // Pastikan ini menghubungkan ke database dengan benar

// Proses form saat dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if required POST variables are set
    if (isset($_POST['nama_supplier'], $_POST['nama_barang'], $_POST['alamat_supplier'], $_POST['email_supplier'], $_POST['kode_pos'], $_POST['no_telp'], $_POST['no_rek'], $_POST['status'])) {
        $nama_supplier = $_POST['nama_supplier'];
        $nama_barang = $_POST['nama_barang'];
        $alamat_supplier = $_POST['alamat_supplier'];
        $email_supplier = $_POST['email_supplier'];
        $kode_pos = $_POST['kode_pos'];
        $no_telp = $_POST['no_telp'];
        $no_rek = $_POST['no_rek'];
        $status = $_POST['status']; 

        // Prevent SQL Injection
        $nama_supplier = mysqli_real_escape_string($conn, $nama_supplier);
        $nama_barang = mysqli_real_escape_string($conn, $nama_barang);
        $alamat_supplier = mysqli_real_escape_string($conn, $alamat_supplier);
        $email_supplier = mysqli_real_escape_string($conn, $email_supplier);
        $kode_pos = mysqli_real_escape_string($conn, $kode_pos);
        $no_telp = mysqli_real_escape_string($conn, $no_telp);
        $no_rek = mysqli_real_escape_string($conn, $no_rek);
        $status = mysqli_real_escape_string($conn, $status);

        // Simpan data supplier ke database
        $query = "INSERT INTO supplier (nama_supplier, nama_barang, alamat_supplier, email_supplier, kode_pos, no_telp, no_rek, status) 
                  VALUES ('$nama_supplier', '$nama_barang', '$alamat_supplier', '$email_supplier', '$kode_pos', '$no_telp', '$no_rek', '$status')";

        if (mysqli_query($conn, $query)) {
            // Tampilkan alert dan redirect dengan JavaScript
            echo '<script language="javascript">';
            echo 'alert("Data Supplier Berhasil Ditambahkan");';
            echo 'window.location.href = "tabelDataSupp.php";'; 
            echo '</script>';
            exit;
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Please fill in all required fields.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Supplier</title>
    <!-- Masukkan CSS Internal di sini -->
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', serif;
        }

        body {
            background-size: cover;
            background-color: #DBE9FA;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .form-box {
            height: fit-content;
            max-width: 600px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        h2 {
            font-size: 2em;
            color: black;
            text-align: center;
            margin-bottom: 30px;
        }

        .inputbox {
            margin-bottom: 20px;
            height: 45px;
            width: 95%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
            border-color: #9b59b6;
        }

        .inputbox label {
            color: black;
            font-size: 1em;
        }

        .inputbox input {
            height: 45px;
            width: 100%;
            border: none;
            outline: none;
            font-size: 1rem;
            padding: 0px;
            border-radius: 5px;
        }

        .inputbox ion-icon {
            position: absolute;
            right: 10px;
            color: black;
            font-size: 1.2em;
            top: 10px;
        }

        .tempo input {
            width: 20%;
            height: 40px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
            border-color: #9b59b6;
            border-radius: 5px;
            padding: 0 10px;
        }

        button {
            width: 100%;
            height: 40px;
            border-radius: 5px;
            border: none;
            color: #fff;
            margin-top: 20px;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        }

        button:hover {
            transform: scale(0.99);
            box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }
    </style>
</head>
<body>
<section>
    <div class="form-box">
        <div class="form-value">
            <form method="post" action="">
                <h2>Input Data Supplier</h2>

                <div class="inputbox">
                    <input type="text" name="nama_supplier" placeholder="Nama Supplier" required />
                </div>

                <div class="inputbox">
                    <input type="text" name="nama_barang" placeholder="Nama Barang" />
                </div>

                <div class="inputbox">
                    <input type="text" name="alamat_supplier" placeholder="Alamat Supplier" />
                </div>

                <div class="inputbox">
                    <input type="email" name="email_supplier" placeholder="Email Supplier" />
                </div>

                <div class="inputbox">
                    <input type="text" name="kode_pos" placeholder="Kode Pos" />
                </div>

                <div class="inputbox">
                    <input type="text" name="no_telp" placeholder="Nomor Telepon" />
                </div>

                <div class="inputbox">
                    <input type="text" name="no_rek" placeholder="Nomor Rekening" />
                </div>

                <div class="inputbox">
                    <select name="status" required>
                        <option value="">Pilih Status</option>
                        <option value="Belum melakukan pembelian">Belum Melakukan Pembelian</option>
                        <option value="Lunas">Pembayaran Lunas</option>
                        <option value="Belum lunas">Pembayaran Belum Lunas</option>
                    </select>
                </div>

                <button type="submit">Simpan</button>
                <button type="button" onclick="window.location.href = 'tabelDataSupp.php';">Lihat Data Supplier</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>
