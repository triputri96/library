<!DOCTYPE html>
<?php
include '../../config/koneksi.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../dist/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


</head>

<body>
    <div class="wrapper">
        <form action="../../app/service/auhtService.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="input-box">
                <input type="text" id="email" name="email" placeholder="Email" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-box">
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="text" id="alamat" name="alamat" placeholder="alamat" required>
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <!-- <div class="remember-forgot">
            <label for="">
                <input type="checkbox"> Remember me
            </label>
            <a href="#">Forgot Password?</a>
        </div> -->
            <input type="submit" value="Daftar" name="btnDaftar" class="btn-input">
            <div class="register-link">
                <p>Already have an account? <a href="login.php">Log in</a></p>
            </div>
        </form>
    </div>
</body>

</html>