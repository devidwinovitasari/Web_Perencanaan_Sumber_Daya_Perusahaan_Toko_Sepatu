<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "psdp");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

function register_akun() {
    global $koneksi;

    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);
    $notlp = htmlspecialchars($_POST["notlp"]);
    $password = htmlspecialchars($_POST["password"]);
    $konfirmasi_password = htmlspecialchars($_POST["konfirmasi_password"]);
    $alamat = htmlspecialchars($_POST["alamat"]);

    if ($password !== $konfirmasi_password) {
        $_SESSION['message'] = "Password Tidak Sesuai!";
        $_SESSION['message_type'] = "error";
        return -1;
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Gunakan prepared statement untuk insert data
    $stmt = $koneksi->prepare("INSERT INTO pelanggan (email, username, notlp, alamat, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $email, $username, $notlp, $alamat, $password_hash);

    if (!$stmt->execute()) {
        $_SESSION['message'] = "Registrasi Gagal: " . $stmt->error;
        $_SESSION['message_type'] = "error";
        return -1;
    }

    $_SESSION['message'] = "Registrasi berhasil!";
    $_SESSION['message_type'] = "success";
    
    // Redirect ke halaman registrasi setelah berhasil registrasi
    header("Location: register.php");
    exit;
}

function login_akun() {
    global $koneksi;

    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    // Gunakan prepared statement untuk mencari user berdasarkan email
    $stmt = $koneksi->prepare("SELECT * FROM pelanggan WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $_SESSION['show_popup'] = true;
        return false;
    }

    $user = $result->fetch_assoc();

    // Verifikasi password menggunakan password_verify
    if (!password_verify($password, $user['password'])) {
        $_SESSION['show_popup'] = true;
        return false;
    }

    $_SESSION["akun-user"] = [
        "email" => $email
    ];
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        register_akun();
    } else if (isset($_POST['login'])) {
        login_akun();
    }
}

function tambahkanKeKeranjang($id_produk) {
    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = array();
    }
    if (!isset($_SESSION['keranjang'][$id_produk])) {
        $_SESSION['keranjang'][$id_produk] = 0;
    }
    $_SESSION['keranjang'][$id_produk]++;
}

function kurangiDariKeranjang($id_produk) {
    if (isset($_SESSION['keranjang'][$id_produk])) {
        $_SESSION['keranjang'][$id_produk]--;
        if ($_SESSION['keranjang'][$id_produk] <= 0) {
            unset($_SESSION['keranjang'][$id_produk]);
        }
    }
}

function hapusDariKeranjang($id_produk) {
    if (isset($_SESSION['keranjang'][$id_produk])) {
        unset($_SESSION['keranjang'][$id_produk]);
    }
}
?>
