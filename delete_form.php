<?php
    // Koneksi ke database MySQL
    include 'config.php';

    // Memeriksa apakah ID Appointment untuk dihapus telah diterima
    if (isset($_GET['deleteID'])) {
        $idAppointment = $_GET['deleteID'];
        // Menghapus data appointment berdasarkan ID
        $deleteSql = "DELETE FROM appointment WHERE id_appointment = $idAppointment";
        if ($conn->query($deleteSql) === TRUE) {
            header('Location: list_form.php');
        } else {
        echo "Error: " . $deleteSql . "<br>" . $conn->error;
        }

        if ($conn->query($deleteSql) === TRUE) {
            echo " ";
        } else {
            echo "Error: " . $deleteSql . "<br>" . $conn->error;
        }
    } else {
        echo "ID Appointment tidak ditemukan.";
    }
    // Menutup koneksi database
    $conn->close();
?>