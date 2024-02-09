<?php
include('../../config/koneksi.php');
session_start();

if (isset($_POST['btntambah_album'])) {
    print_r($_SESSION);
    $nama_album = $_POST['nama_album'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_dibuat = date("Y-m-d");
    $user_id = $_SESSION['user_id'];

    if (($_POST['btntambah_album'] == "tambah")) {
        // $foto = $_FILES['foto']['name'];
        // $dir = "../../dist/uploads/";
        // $dirFile = $_FILES['foto']['tmp_name'];
        // echo $foto;
        // move_uploaded_file($dirFile, $dir . $foto);

        $query = mysqli_query($konek, "INSERT INTO album (nama_album, deskripsi, tgl_dibuat, user_id) VALUES ('$nama_album', '$deskripsi', '$tgl_dibuat', '$user_id')");

        if ($query) {
            header("location:../../pages/user/index.php");
            exit();
        } elseif (($_POST['btntambah_album'] == "edit")) {
            # code...
        }
    } else {
        echo "Error: " . mysqli_error($konek);
    }
} elseif ($_GET['hapus']) {
    // $queryHapus = "SELECT foto from album where album_id='$_GET[hapus]'";
    $query = "DELETE from album where album_id='$_GET[hapus]'";
    $sql = mysqli_query($konek, $query);
    if ($sql) {
        header('location:../../pages/user/');
    }
}