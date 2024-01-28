<?php
include('../../config/koneksi.php');

if (isset($_POST['btnLogin'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($konek, "SELECT * FROM user WHERE username='$username'");
    $data = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) >= 1) {
        if (password_verify($password, $data['password'])) {
            // login valid
            session_start();
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];
            header('location:../../pages/user');
        } else {
            // password salah;
            header('location:../../pages/auth/login.php?pesan=Password Salah');
        }
    } else {
        // Username salah;
        header('location:../../pages/auth/login.php?pesan=Username Salah');
    }
}

if (isset($_POST['btnDaftar'])) {

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($konek, "INSERT INTO user (username, password, email, nama, alamat) VALUES ('$username', '$password', '$email', '$nama', '$alamat')");

    if ($query) {
        echo "<script>alert('Sukses'); window.location.href='../../pages/auth/login.php'</script>";
    }
}
