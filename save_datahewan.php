<!DOCTYPE html>
<html>
<head>
    <title>Data Hewan - Healthy Paws</title>
     <link rel="icon" type="image/png" href="cropped_hp.png">
  <!-- Font Awesome CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <!-- Stylesheet -->
  <link rel="stylesheet" href="styleservice.css" />
<link rel="stylesheet" type="text/css" href="style1.css">
  <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="icon" type="image/png" href="logo.png">
    <style>
        body {
  background-color: #fcffe7;
  height: 100vh;
}
        .invoice-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
            font-family: "Poppins", sans-serif;
            margin-top: 0px;
        }

        .data-container {
            background-color: #ffffff;
            padding: 20px;
            height: 88vh;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            text-align: center;
              font-family: "Poppins", sans-serif;
              margin-top: 0px;
        }
        .button {
  display: inline-block;
  padding: 10px 20px;
  background-color:  #eb455f;
  color: white;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
  margin-top: 15px;
}

.button:hover {
        color : black;
  background-color: #bad7e9;
}
}

    </style>
</head>
<body bgcolor=" fcffe7">

<?php
session_start();

// Include file config.php
include 'config.php';
// CSS Style
echo "<style>
    .image-container {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background-color: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
         margin-top: 10px;
          margin-bottom: 10px;
    }

    .image-container img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 50%;
    }

</style>";


// Memeriksa apakah pengguna telah login dan mendapatkan ID Customer dari session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Query untuk mendapatkan ID Customer berdasarkan username
    $query = "SELECT id_customer FROM customer WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $idCustomer = $row['id_customer'];

        // Mendapatkan data hewan dari form
        $namaHewan = $_POST['nama_hewan'];
        $jenisHewan = $_POST['jenis_hewan'];
        $rasHewan = $_POST['ras_hewan'];
        $tanggal = $_POST['tanggal'];
        $jenisKelamin = $_POST['jenis_kelamin'];
        $warnaHewan = $_POST['warna'];
        $file = $_FILES['file']; // Mengambil data file yang diunggah

        //Validasi data nama hewan, warna hewan, dan ras hewan
        $isValid = true;
        if (!preg_match('/^[a-zA-Z\s]+$/', $namaHewan)) {
            echo "Isian nama hewan belum sesuai.";
            $isValid = false;
        }

       if (!preg_match('/^[a-zA-Z\s\-,]+$/', $warnaHewan)) {
    echo "Isian warna hewan belum sesuai.";
    $isValid = false;
}

        if (!in_array($jenisHewan, ['kucing', 'anjing'])) {
        echo "Pilih salah satu jenis hewan.";
        $isValid = false;
    }

// Memeriksa apakah file telah diunggah
if (!empty($file['name'])) {
    // Validasi tipe file
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Tipe file yang diunggah tidak valid. Harap unggah file dengan tipe jpg, jpeg, atau png";
        $isValid = false;
    }
    // ...
}


        if (!$isValid) {
            exit;
        }
        

        // Mendapatkan informasi file yang diunggah
        $namaFile = $_FILES['file']['name'];
        $lokasiSementara = $_FILES['file']['tmp_name'];
        $lokasiTujuan = 'hewan/' . $namaFile;

        
        // Pindahkan file upload ke folder "hewan"
        move_uploaded_file($lokasiSementara, $lokasiTujuan);

        // Query untuk menyimpan data hewan ke dalam tabel "hewan"
        $query = "INSERT INTO hewan (id_customer, nama_hewan, jenis_hewan, ras_hewan, tanggal_lahir, jenis_kelamin, warna, nama_file) VALUES ('$idCustomer', '$namaHewan', '$jenisHewan', '$rasHewan', '$tanggal', '$jenisKelamin', '$warnaHewan' , '$lokasiTujuan')";

        // Memeriksa apakah query berhasil dieksekusi
        if (mysqli_query($conn, $query)) {
        // Tampilkan ulang seluruh data yang sudah diinput
        echo '<div class="invoice-container">';
         echo '<div class="data-container">';
                 echo '<h2 style="color:#2b3467;"><pre>               Healthy Paws VetCare Clinic           </pre></h2>';
                 echo'<h2 style="color:#2b3467;">Data Hewan</h2>';
                 // Tampilkan foto jika ada foto yang diinput, jika tidak tampilkan bulatan warna abu
  if (!empty($namaFile)) {
    echo "<div class='image-container'><img src='hewan/" . $namaFile . "' alt='Foto Hewan'></div>";
} else {
    echo "<br> <div class='image-container'><img src='emptypet.png'></div>";
}



        } else {
            echo "Terjadi kesalahan saat menyimpan data hewan: " . mysqli_error($conn);
        }
    } else {
        echo "Terjadi kesalahan saat mengambil ID Customer: " . mysqli_error($conn);
    }
} else {
    echo "Anda belum login. Silakan login terlebih dahulu.";
}
echo '<table style="margin-left: 0px;margin-top:35px; background-color: #f2f2f2;max-width:padding-right: 10px;">';
echo "<br><pre>Nama Hewan: " . $namaHewan;
    echo "<br>Jenis Hewan: " . $jenisHewan;
    echo "<br>Ras Hewan: " . $rasHewan;
    echo "<br>Tanggal Lahir: " . $tanggal;
    echo "<br>Jenis Kelamin: " . $jenisKelamin;
    echo "<br>Warna Hewan: " . $warnaHewan;

echo '</table>';
echo'<a href="listhewan.php" class="button">Lihat Daftar Hewan</a>';
echo'<br>';
echo'<a href="createform.php" class="button">Buat Janji</a>';
  echo '</div>';
                echo '</div>';
?>
</body>
</html>