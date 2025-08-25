<?php
// Koneksi ke database MySQL
include 'config.php';

// Mendapatkan ID layanan dari permintaan AJAX
$layanan_id = $_GET['layanan_id'];

// Query untuk mendapatkan data dokter berdasarkan ID layanan
$query = "SELECT id_dokter, nama_dokter FROM dokter WHERE id_layanan = $layanan_id";
$result = mysqli_query($conn, $query);

// Array untuk menyimpan data dokter
$dokter = array();

// Memeriksa apakah query berhasil dieksekusi
if ($result) {
    // Mendapatkan data dokter
    while ($row = mysqli_fetch_assoc($result)) {
        $dokter[] = $row;
    }
}

// Mengirimkan data dokter dalam format JSON
header('Content-Type: application/json');
echo json_encode($dokter);

// Menutup koneksi database
mysqli_close($conn);
?>