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
        $gambar = $_FILES['gambar']['name'];
        $dir = "../../dist/uploads/";
        $dirFile = $_FILES['gambar']['tmp_name'];
        echo $gambar;
        move_uploaded_file($dirFile, $dir . $gambar);

        $query = mysqli_query($konek, "INSERT INTO album (nama_album, deskripsi, tgl_dibuat, user_id, gambar) VALUES ('$nama_album', '$deskripsi', '$tgl_dibuat', '$user_id','$gambar')");

        if ($query) {
            header("location:../../pages/user/index.php");
            exit();
        } elseif (($_POST['btntambah_album'] == "edit")) {
            # code...
        }
    } else {
        echo "Error: " . mysqli_error($konek);
    }
}
