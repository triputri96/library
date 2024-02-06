<?php
include('../../config/koneksi.php');

session_start();

if (!isset($_SESSION['user_id'])) {
    header("location:../../pages/user/index.php");
} else {
    // Pastikan $_GET['foto_id'] ada dan memiliki nilai
    if (isset($_GET['foto_id'])) {
        $foto_id = $_GET['foto_id'];
        $user_id = $_SESSION['user_id'];

        $sql = mysqli_query($konek, "SELECT * FROM likefoto WHERE foto_id='$foto_id' AND user_id='$user_id'");

        if (mysqli_num_rows($sql) == 1) {
            // User has already liked the photo, perform unlike action
            mysqli_query($konek, "DELETE FROM likefoto WHERE foto_id='$foto_id' AND user_id='$user_id'");
        } else {
            // User hasn't liked the photo, insert a new like
            $tgl_like = date("Y-m-d");
            mysqli_query($konek, "INSERT INTO likefoto (foto_id, user_id, tgl_like) VALUES ('$foto_id','$user_id','$tgl_like')");
        }

        // Redirect to the photo page
        header("location:../../pages/user/foto.php?foto_id=$foto_id");
    } else {
        // Jika parameter 'foto_id' tidak tersedia
        echo "Parameter 'foto_id' tidak tersedia.";
    }
}
