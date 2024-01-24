<?php
if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin") {
        if ($password == "admin") {
            // login valid
            header('location:../pages/user/index.php');
        } else {
            // password salah;
            header('location:../pages/auth/login.php?pesan= Password Salah');
        }
    } else {
        // Username salah;
        header('location:../pages/auth/login.php?pesan= Username Salah');
    }
}