<?php
session_start();

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
} else {
    $message = '';
    $message_type = '';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/login.css" />

    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', serif;
    }

    body {
        background-size: cover;
        background: linear-gradient(135deg, #a0e7e5, #d4a5a5, #e5a0e7);;
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
        position: relative;
        width: 400px;
        height: auto;
        background: #E0E5E5;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .form-box:hover {
        transform: translateY(-10px);
        box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.7);
    }

    h2 {
        font-size: 2em;
        color: black;
        text-align: center;
        margin-bottom: 30px;
    }

    .inputbox {
        position: relative;
        margin-bottom: 20px;
        padding-right: 20px;
    }

    .inputbox label {
        color: black;
        font-size: 1em;
    }

    .inputbox input {
        width: 100%;
        height: 40px;
        background: #f5f5f5;
        border: none;
        outline: none;
        font-size: 1rem;
        padding: 0 10px;
        border-radius: 5px;
        transition: background 0.3s, box-shadow 0.3s;
    }

    .inputbox input:focus {
        background: #e0e0e0;
        box-shadow: 0px 0px 10px 3px rgba(0, 123, 255, 0.5); 
    }

    .inputbox input:hover {
        background: #e0e0e0;
        box-shadow: 0px 0px 10px 3px rgba(0, 123, 255, 0.5); 
    }

    .inputbox ion-icon {
        position: absolute;
        right: 10px;
        color: black;
        font-size: 1.2em;
        top: 10px;
    }

    .forget {
        margin-bottom: 20px;
        text-align: center;
    }

    .forget a {
        color: rgb(48, 5, 201);
        text-decoration: none;
    }

    .forget a:hover {
        text-decoration: underline;
    }

    button {
        width: 100%;
        height: 40px;
        border-radius: 5px;
        background: rgb(90, 45, 252);
        border: none;
        outline: none;
        cursor: pointer;
        font-size: 1em;
        font-weight: 600;
        color: #fff;
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
    }

    button:hover {
        background: rgb(48, 5, 201);
        transform: scale(1.05);
        box-shadow: 0px 0px 15px 5px rgba(48, 5, 201, 0.7); /* Hover glow effect */
    }

    .register {
        font-size: .9em;
        color: black;
        text-align: center;
    }

    .register p a {
        color: rgb(48, 5, 201);
        text-decoration: none;
        font-weight: 600;
    }

    .register p a:hover {
        text-decoration: underline;
    }

    /* Popup Box Styles */
    .popup {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        visibility: hidden;
    }

    .popup-content {
        width: 300px;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    .popup-content h3 {
        margin-bottom: 20px;
    }

    .popup-content button {
        padding: 10px 20px;
        background: rgb(90, 45, 252);
        border: none;
        outline: none;
        cursor: pointer;
        color: #fff;
        border-radius: 5px;
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
    }

    .popup-content button:hover {
        background: rgb(48, 5, 201);
        transform: scale(1.05);
        box-shadow: 0px 0px 15px 5px rgba(48, 5, 201, 0.7);
    }

    .popup.show {
        visibility: visible;
    }
    </style>

  </head>
  </head>
  
<body>
        <?php if ($message != ''): ?>
            <div class="alert <?php echo $message_type; ?>">
                <p><?php echo $message; ?></p>
                <button onclick="this.parentElement.style.display='none'">OK</button>
            </div>
            <?php endif; ?>

    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="function.php" method="post">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="mail"></ion-icon>
                        <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="inputbox">
                        <ion-icon name="user"></ion-icon>
                        <input type="text" name="username" placeholder="Username" required />
                    </div>
                    <div class="inputbox">
                        <ion-icon name="phone"></ion-icon>
                        <input type="text" name="notlp" placeholder="No. Handphone" required />
                    </div>
                    <div class="inputbox">
                        <ion-icon name="home"></ion-icon>
                        <input type="text" name="alamat" placeholder="Alamat" required />
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock"></ion-icon>
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock"></ion-icon>
                        <input type="password" name="konfirmasi_password" placeholder="Confirm Password" required />
                    </div>
                    <button type="submit" name="register">Register</button>
                    <div class="register">
                        <p>Have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>