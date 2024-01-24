<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../dist/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="wrapper">
        <form action="../../app/service/authService.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" id="email" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="text" id="namalengkap" name="namalengkap" placeholder="Nama Lengkap" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="text" id="alamat" name="alamat" placeholder="alamat" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <!-- <div class="remember-forgot">
            <label for="">
                <input type="checkbox"> Remember me
            </label>
            <a href="#">Forgot Password?</a>
        </div> -->
            <input type="submit" value="Login" name="btnDaftar" class="btn-input">
            <div class="register-link">
                <p>Already have an account? <a href="login.php">Log in</a></p>
            </div>
        </form>
    </div>
</body>

</html>