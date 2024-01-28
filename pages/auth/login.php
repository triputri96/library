<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location:../user/index.php');
    exit;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../dist/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <form action="../../app/service/auhtService.php" method="post">
            <?php
            if (isset($_GET['pesan'])) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Login Gagal </strong><?php echo $_GET['pesan']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <i class="fa-solid fa-lock"></i>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/login.js"></script>


</body>

</html>