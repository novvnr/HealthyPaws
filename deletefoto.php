<?php
include("config.php");

// Ambil username dari sesi saat ini
session_start();
$username = $_SESSION['username'];

// Ambil nilai kolom nama_file berdasarkan username
$query = "SELECT nama_file FROM customer WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $filename = $row['nama_file'];

    // Hapus nilai kolom nama_file dari tabel customer berdasarkan username
    $query = "UPDATE customer SET nama_file = NULL WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Hapus file dari direktori jika ada
        if (!empty($filename) && file_exists($filename)) {
            if (unlink($filename)) {
                echo "success"; // Menampilkan tanggapan "success" ke permintaan AJAX
                exit;
            } else {
                echo "error"; // Menampilkan tanggapan "error" ke permintaan AJAX
                exit;
            }
        } else {
            echo "success"; // Menampilkan tanggapan "success" ke permintaan AJAX jika file tidak ada dalam folder
            exit;
        }
    } else {
        echo "error"; // Menampilkan tanggapan "error" ke permintaan AJAX jika gagal memperbarui nilai kolom nama_file
        exit;
    }
} else {
    echo "error"; // Menampilkan tanggapan "error" ke permintaan AJAX jika gagal mengambil nilai kolom nama_file
    exit;
}
?>
