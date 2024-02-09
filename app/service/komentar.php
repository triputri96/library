<?php

include('../../config/koneksi.php');

session_start();

if (isset($_POST['tmbhcomment'])) {
    // Get form data
    $foto_id = $_POST['foto_id'];
    $isi_komentar = $_POST['isi_komentar'];
    $tgl_komentar = date("Y-m-d H:i:s");  // Use the current date and time
    $user_id = $_SESSION['user_id'];

    // Insert the comment into the database
    $sql = "INSERT INTO komentar (foto_id, isi_komentar, tgl_komentar, user_id) VALUES ('$foto_id', '$isi_komentar', '$tgl_komentar', '$user_id')";

    // Execute the query
    if (mysqli_query($konek, $sql)) {
        $redirect_url = "../../pages/user/foto.php?foto=" . urlencode($foto_id);
        header("Location: $redirect_url");
        exit();
    } else {
        echo "Error: " . mysqli_error($konek);
    }
}

// Close the database connection if needed
mysqli_close($konek);