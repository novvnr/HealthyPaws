<?php
session_start();
include 'config.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    // Ambil id_customer berdasarkan username
    $queryCustomer = "SELECT id_customer FROM customer WHERE username = '$username'";
    $resultCustomer = mysqli_query($conn, $queryCustomer);
    $rowCustomer = mysqli_fetch_assoc($resultCustomer);
    $idCustomer = $rowCustomer['id_customer'];
    // Ambil data hewan berdasarkan id_customer
    $queryHewan = "SELECT id_hewan, nama_hewan FROM hewan WHERE id_customer = '$idCustomer'";
    $resultHewan = mysqli_query($conn, $queryHewan);
    // Buat array untuk menyimpan data hewan
    $hewanArray = array();

    while ($rowHewan = mysqli_fetch_assoc($resultHewan)) {
        $hewanArray[] = array(
            'id' => $rowHewan['id_hewan'],
            'nama' => $rowHewan['nama_hewan']
        );
    }
    // Mengembalikan data hewan dalam format JSON
    echo json_encode($hewanArray);
} else {
    echo "Username tidak ditemukan.";
}
?>