<?php
    include 'config.php';
    // Memeriksa apakah ID hewan untuk dihapus telah diterima
    if (isset($_GET['deleteID'])) {
        $idHewan = $_GET['deleteID'];
        // Menghapus data hewan berdasarkan ID
        $deleteSql = "DELETE FROM hewan WHERE id_hewan = $idHewan";
        if ($conn->query($deleteSql) === TRUE) {
            header('Location: listhewan.php');
        } else {
            echo "Error: " . $deleteSql . "<br>" . $conn->error;
        }

        if ($conn->query($deleteSql) === TRUE) {
            echo " ";
        } else {
            echo "Error: " . $deleteSql . "<br>" . $conn->error;
        }
    } else {
        echo "ID Hewan tidak ditemukan.";
    }
    // Menutup koneksi database
    $conn->close();
?>