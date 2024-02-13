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
} elseif (isset($_GET['hapuskomentar'])) {
    // Handle comment deletion
    $komentar_id = $_GET['hapuskomentar'];

    // Fetch the foto_id before deletion
    $fotoSql = mysqli_query($konek, "SELECT foto_id FROM komentar WHERE komentar_id = '$komentar_id'");
    $fotoData = mysqli_fetch_assoc($fotoSql);
    $foto_id = $fotoData['foto_id'];

    $deleteSql = "DELETE FROM komentar WHERE komentar_id = '$komentar_id'";

    if (mysqli_query($konek, $deleteSql)) {
        // Redirect back to foto.php with the corresponding foto_id
        $redirect_url = "../../pages/user/foto.php?foto=" . urlencode($foto_id);
        header("Location: $redirect_url");
        exit();
    } else {
        echo "Error deleting comment: " . mysqli_error($konek);
    }
}