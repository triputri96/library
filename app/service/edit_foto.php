<?php
include('../../config/koneksi.php');
session_start();

if (isset($_POST['editfoto'])) {
    $foto_id = $_POST['foto_id'];
    $judul_foto = $_POST['judul_foto'];
    $deskripsi_foto = $_POST['deskripsi_foto'];

    // Check if a new file is uploaded
    if ($_FILES['lokasi_file']['name'] != "") {
        $lokasi_file = $_FILES['lokasi_file']['name'];
        $dir = "../../dist/uploads/";
        $dirFile = $_FILES['lokasi_file']['tmp_name'];
        move_uploaded_file($dirFile, $dir . $lokasi_file);

        // Delete the old file
        $queryHapus = "SELECT lokasi_file FROM `foto` WHERE foto_id='$foto_id'";
        $sqlHapus = mysqli_query($konek, $queryHapus);
        $data = mysqli_fetch_array($sqlHapus);

        $fileToDelete = "../../dist/uploads/" . $data['lokasi_file'];
        if (file_exists($fileToDelete)) {
            unlink(realpath($fileToDelete));
        } else {
            echo "File not found: " . $fileToDelete;
        }

        // Update the photo with the new file
        $updateQuery = "UPDATE `foto` SET `judul_foto`='$judul_foto', `deskripsi_foto`='$deskripsi_foto', `lokasi_file`='$lokasi_file' WHERE `foto_id`='$foto_id'";
    } else {
        // Update the photo without changing the file
        $updateQuery = "UPDATE `foto` SET `judul_foto`='$judul_foto', `deskripsi_foto`='$deskripsi_foto' WHERE `foto_id`='$foto_id'";
    }

    $query = mysqli_query($konek, $updateQuery);

    if ($query) {
        header("location:../../pages/user/foto.php?foto={$foto_id}");
        exit();
    } else {
        echo "Error updating photo data: " . mysqli_error($konek);
    }
} else {
    echo "Error: 'editfoto' is not set.";
}
