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
if (isset($_POST['btnupdate'])) {
    session_start();
    $user_id = $_SESSION['user_id'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    // Upload profile picture if provided
    if ($_FILES['picture']['name'] != "") {
        $target_dir = "../../dist/profile/";
        $picture_name = basename($_FILES['picture']['name']);
        $target_file = $target_dir . $picture_name;
        move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);

        $queryHapus = "SELECT picture FROM user WHERE user_id='$user_id'";
        $sqlHapus = mysqli_query($konek, $queryHapus);
        $data = mysqli_fetch_array($sqlHapus);

        $fileToDelete = "../../dist/profile/" . $data['picture'];
        if (file_exists($fileToDelete)) {
            unlink(realpath($fileToDelete));
        } else {
            echo "File not found: " . $fileToDelete;
        }

        // Update user with profile picture
        $query = mysqli_query($konek, "UPDATE user SET username='$username', nama='$nama', alamat='$alamat', picture='$picture_name' WHERE user_id='$user_id'");
    } else {
        // Update user without profile picture
        $query = mysqli_query($konek, "UPDATE user SET username='$username', nama='$nama', alamat='$alamat' WHERE user_id='$user_id'");
    }

    if ($query) {
        echo "<script>window.location.href='../../pages/user/profile.php'</script>";
    } else {
        echo "<script>alert('Error updating profile.');";
    }
}
