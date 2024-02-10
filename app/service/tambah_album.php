<?php
include('../../config/koneksi.php');
session_start();

// Fetch data from the database if 'edit' parameter is set
if (isset($_GET['edit'])) {
    $edit_album_id = $_GET['edit'];

    // Perform a database query to retrieve the existing data
    $query = mysqli_query($konek, "SELECT * FROM album WHERE album_id='$edit_album_id'");
    $data = mysqli_fetch_assoc($query);

    // Assign values to variables
    $nama_album_from_database = $data['nama_album'];
    $deskripsi_from_database = $data['deskripsi'];
}

// Check if the form is submitted for album addition or editing
if (isset($_POST['btntambah_album'])) {
    // Common data for both addition and editing
    $nama_album = $_POST['nama_album'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_dibuat = date("Y-m-d");
    $user_id = $_SESSION['user_id'];

    if ($_POST['btntambah_album'] == "tambah") {
        // Handle album addition logic
        $query = mysqli_query($konek, "INSERT INTO album (nama_album, deskripsi, tgl_dibuat, user_id) VALUES ('$nama_album', '$deskripsi', '$tgl_dibuat', '$user_id')");

        if ($query) {
            header("location:../../pages/user/index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($konek);
        }
    } elseif ($_POST['btntambah_album'] == "edit") {
        // Handle album editing logic
        $album_id = $_POST['album_id'];

        $editQuery = "UPDATE album SET nama_album='$nama_album', deskripsi='$deskripsi' WHERE album_id='$album_id'";
        $result = mysqli_query($konek, $editQuery);

        if ($result) {
            header("location:../../pages/user/album.php?album_id=$album_id");
            exit();
        } else {
            echo "Error: " . mysqli_error($konek);
        }
    } else {
        echo "Invalid operation";
    }
}

// Handle album deletion
if (isset($_GET['hapus'])) {
    $album_id = $_GET['hapus'];

    // Step 1: Delete comments associated with the photos in the album
    $deleteCommentsQuery = "DELETE komentar FROM komentar
                            INNER JOIN foto ON komentar.foto_id = foto.foto_id
                            WHERE foto.album_id = '$album_id'";
    mysqli_query($konek, $deleteCommentsQuery);

    // Step 2: Delete likes associated with the photos in the album
    $deleteLikesQuery = "DELETE likefoto FROM likefoto
                         INNER JOIN foto ON likefoto.foto_id = foto.foto_id
                         WHERE foto.album_id = '$album_id'";
    mysqli_query($konek, $deleteLikesQuery);

    // Step 3: Get the photo locations before deleting the photos
    $getPhotoLocationsQuery = "SELECT lokasi_file FROM foto WHERE album_id = '$album_id'";
    $photoLocationsResult = mysqli_query($konek, $getPhotoLocationsQuery);

    while ($row = mysqli_fetch_assoc($photoLocationsResult)) {
        // Step 3.1: Delete the photo file from the uploads directory
        $photoLocation = '../../dist/uploads/' . $row['lokasi_file'];
        unlink($photoLocation);
    }

    // Step 3.2: Delete photos in the album
    $deletePhotosQuery = "DELETE FROM foto WHERE album_id = '$album_id'";
    mysqli_query($konek, $deletePhotosQuery);

    // Step 4: Delete the album
    $deleteAlbumQuery = "DELETE FROM album WHERE album_id = '$album_id'";
    $result = mysqli_query($konek, $deleteAlbumQuery);

    if ($result) {
        header('location:../../pages/user/');
        exit();
    } else {
        echo "Error: " . mysqli_error($konek);
    }
}
