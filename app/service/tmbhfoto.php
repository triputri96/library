<?php
include('../../config/koneksi.php');
session_start();

// if (isset($_POST['tambahfoto'])) {
//     $judul_foto = $_POST['judul_foto'];
//     $deskripsi_foto = $_POST['deskripsi_foto'];
//     $album_id = $_POST['album_id'];
//     $tgl_unggah = date("Y-m-d");
//     $user_id = $_SESSION['user_id'];

//     $rand = rand();
//     $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
//     $filename = $_FILES['lokasi_file']['name'];
//     $ukuran = $_FILES['lokasi_file']['size'];
//     $ext = pathinfo($filename, PATHINFO_EXTENSION);

//     if (!in_array($ext, $ekstensi)) {
//         header("location:../../pages/user/album.php");
//     } else {
//         if ($ukuran < 1044070) {
//             $xx = $rand . '_' . $filename;
//             move_uploaded_file($_FILES['lokasi_file']['tmp_name'], '../../dist/uploads/' . $rand . '_' . $filename);
//             mysqli_query($konek, "INSERT into foto values(NULL, '$judul_foto','$deskripsi_foto','$tgl_unggah','$xx','$album_id','$user_id)");
//             header("location:../../pages/user/album.php");
//         } else {
//             header("location:../../pages/user/album.php");
//         }
//     }
// }

if (isset($_POST['tambahfoto'])) {
    // print_r($_SESSION);
    $judul_foto = $_POST['judul_foto'];
    $deskripsi_foto = $_POST['deskripsi_foto'];
    $album_id = $_POST['album_id'];
    echo $album_id;
    $tgl_unggah = date("Y-m-d");
    // $lokasi_file = $_POST['lokasi_file'];
    $user_id = $_SESSION['user_id'];

    if (($_POST['tambahfoto'] == "tambah")) {
        $lokasi_file = $_FILES['lokasi_file']['name'];
        $dir = "../../dist/uploads/";
        $dirFile = $_FILES['lokasi_file']['tmp_name'];
        // echo $lokasi_file;
        move_uploaded_file($dirFile, $dir . $lokasi_file);

        $query = mysqli_query($konek, "INSERT INTO foto (judul_foto, deskripsi_foto, tgl_unggah, lokasi_file, album_id, user_id) VALUES ('$judul_foto','$deskripsi_foto','$tgl_unggah','$lokasi_file', '$album_id','$user_id')");

        if ($query) {
            header("location:../../pages/user/album.php?album_id=$album_id");
            exit();
        } elseif (($_POST['tambahfoto'] == "edit")) {
            # code...
        }
    } else {
        echo "Error: " . mysqli_error($konek);
    }
} elseif ($_GET['hapusfoto']) {
    $queryHapus = "SELECT lokasi_file from foto where foto_id='$_GET[hapusfoto]'";
    $query = "DELETE from foto where foto_id='$_GET[hapusfoto]'";
    $sql = mysqli_query($konek, $query);
    if ($sql) {
        header('location:../../pages/user/');
    }
}
