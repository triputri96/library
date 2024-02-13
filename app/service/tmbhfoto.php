<?php
include('../../config/koneksi.php');
session_start();

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

        $query = mysqli_query($konek, "INSERT INTO `foto` (`judul_foto`, `deskripsi_foto`, `tgl_unggah`, `lokasi_file`, `album_id`, `user_id`) VALUES ('$judul_foto','$deskripsi_foto','$tgl_unggah','$lokasi_file', '$album_id','$user_id')");

        if ($query) {
            header("location:../../pages/user/album.php?album_id=$album_id");
            exit();
        } else {
            if ($_FILES['lokasi_file']['name'] != "") {
                # code...
            }
        }
    }
}
if (isset($_GET['hapusfoto'])) {
    $foto_id = $_GET['hapusfoto'];

    // Fetch related data from the `like` table
    $likeQuery = mysqli_query($konek, "DELETE FROM `likefoto` WHERE foto_id='$foto_id'");
    if (!$likeQuery) {
        echo "Error deleting like data: " . mysqli_error($konek);
        exit;
    }

    // Fetch related data from the `komentar` table
    $komentarQuery = mysqli_query($konek, "DELETE FROM `komentar` WHERE foto_id='$foto_id'");
    if (!$komentarQuery) {
        echo "Error deleting komentar data: " . mysqli_error($konek);
        exit;
    }

    // Fetch related data from the `foto` table
    $queryHapus = "SELECT lokasi_file, album_id FROM `foto` WHERE foto_id='$foto_id'";
    $sqlHapus = mysqli_query($konek, $queryHapus);
    $data = mysqli_fetch_array($sqlHapus);

    $fileToDelete = "../../dist/uploads/" . $data['lokasi_file'];
    if (file_exists($fileToDelete)) {
        unlink(realpath($fileToDelete));
    } else {
        echo "File not found: " . $fileToDelete;
    }

    // Delete the photo from the `foto` table
    $query = mysqli_query($konek, "DELETE FROM `foto` WHERE foto_id='$foto_id'");
    if ($query) {
        header("location:../../pages/user/album.php?album_id={$data['album_id']}");
    } else {
        echo "Error deleting foto data: " . mysqli_error($konek);
    }
}
