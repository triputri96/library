<!DOCTYPE html>
<?php
include '../../config/koneksi.php'
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../dist/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <form action="../../app/auhtService.php" method="post">
            <?php
            if (isset($_GET['pesan'])) {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Login Gagal</strong><?php echo $_GET['pesan']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <!-- <div class="remember-forgot">
            <label for="">
                <input type="checkbox"> Remember me
            </label>
            <a href="#">Forgot Password?</a>
        </div> -->
            <input type="submit" value="Login" name="btnLogin" class="btn-input">
            <div class="register-link">
                <p>Don't have an account? <a href="daftar.php">Sign Up</a></p>
            </div>
        </form>
    </div>
</body>

</html>