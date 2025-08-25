<?php
require_once __DIR__ . '/pdf-generator/vendor/autoload.php';
use Dompdf\Dompdf;
// Koneksi ke database MySQL
include 'config.php';

// Memeriksa apakah pengguna telah login dan mendapatkan ID Customer dari session
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Reservasi - Healthy Paws</title>
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
        /* CSS for header */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #2b3467;
      height : 90px;
    }

    .header .logo {
      width: 75px;
      height: 75px;
      margin-left: 30px;
    }

    .header .judul{
      font-family: Nunito;
      font-size: 20px;
      margin-right: 45%;
      color: #fcffe7
    }

    .nav-items {
      display: flex;
      justify-content: space-around;
      align-items: center;
      background-color: #2B3467;
      margin-right: 50px;
      font-family: Lato;
      font-size : 15px
    }

    .nav-items a {
      text-decoration: none;
      color: #FCFFE7;
      padding: 35px 20px;
    }

    .hover-effect1 {
      padding: 10px;
      transition: background-color 0.3s;
      color: inherit;
      text-decoration: none;
    }

    .hover-effect1:hover {
      background-color: #BAD7E9;
      cursor: pointer;
      color: #2b3467;
      text-decoration: none;
      
    }
    
    .hover-effect2 {
      color: #333;
      padding: 10px 20px;
      border: none;
      transition: background-color 0.3s, color 0.3s;
    }

    .hover-effect2:hover {
      background-color: #BAD7E9;
      color: #000;
      cursor: pointer;
    }
       
        .invoice-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 92vh;
            font-family: "Poppins", sans-serif;
               margin-top: 50px;
            margin-bottom: 50px;
        }

        .data-container {
            background-color: #ffffff;
            padding: 20px;
            height: 88vh;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            text-align: center;
              font-family: "Poppins", sans-serif;
        }

        .invoice-button {
            display: inline-block;
            background-color: #eb455f;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
                margin-top: 12px;
        }

        .invoice-button:hover {
            color: #eb455f;
            background-color: #23527c;
        }

 .back-button {
            display: inline-block;
            background-color: #eb455f;
            color: #ffffff;
            padding: 10px 27px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 12px;
        }

        .back-button:hover {
            color: #eb455f;
            background-color: #23527c;
        }


  /* CSS for footer */
    .footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #bad7e9;
      padding: 20px 40px;
    }

    .footer .copy {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 0 40px;
    }
     

    .bottom-links {
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 40px ;
    }

    .bottom-links .links {
       color: #2b3467;
    }

    .bottom-links .links span {
      font-size: 16px;
      color: #2b3467;
      margin: 10px 0;
    }

    .bottom-links .links img {
      width: 100px;
      height: 100px;
    }

    .bottom-links .links i {
      font-family: "Font Awesome";
      text-decoration: none;
      color: #2b3467;
      padding: 10px 20px;
    }

    ul {
  list-style-type: none;
  margin-left: 0;
  padding: 0;
}

.detail h2{
    margin-left: 80px;
    margin-right: 80px;
}
  </style>
    </style>
</head>
<body bgcolor=" fcffe7">
<?php
// CSS Style
echo "<style>
    .image-container {
        width: 180px;
        height: 180px;
        border-radius: 5px;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
         margin-top: 10px;
          margin-bottom: 10px;
    }

    .image-container img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 5px;
    }
     .back-icon img {
                height:30px;
width: 30px;
                  z-index: 9999;
      position: absolute;
      top: 117px;
      right: 989px;
      font-size: 20px;
      color: #2b3467;
      cursor: pointer;

    }

</style>";
// Mendapatkan data dari form
$id_hewan = isset($_POST['id_hewan']) ? $_POST['id_hewan'] : "";
$id_layanan = isset($_POST['id_layanan']) ? $_POST['id_layanan'] : "";
$id_dokter = isset($_POST['id_dokter']) ? $_POST['id_dokter'] : ""; // Menggunakan 'dokter_anda' sebagai nama atribut
$tanggal_appointment = isset($_POST['tanggal_appointment']) ? $_POST['tanggal_appointment'] : "";
$keluhan = isset($_POST['keluhan']) ? $_POST['keluhan'] : "";


// Validasi data

    // Query untuk mendapatkan ID Customer berdasarkan username
    $query = "SELECT id_customer FROM customer WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id_customer = $row['id_customer'];

        // Menyimpan data ke dalam tabel appointment
        $sql = "INSERT INTO appointment (id_hewan, id_customer, id_layanan, id_dokter, tanggal_appointment, keluhan) VALUES ('$id_hewan', '$id_customer', '$id_layanan', '$id_dokter', '$tanggal_appointment', '$keluhan')";

        if ($conn->query($sql) === TRUE) {
            // Mendapatkan ID Appointment yang baru saja diinput
            $id_appointment = $conn->insert_id;

            // Mendapatkan nama file jika ada
        if (!empty($_FILES['file']['name'])) {
            $nm_file = $_FILES['file']['name'];

            // Menentukan ekstensi file
            $ext = pathinfo($nm_file, PATHINFO_EXTENSION);

            // Menyimpan file ke dalam folder lokal dengan nama yang terdiri dari ID Appointment dan nama file asli
            $newFileName = $id_appointment . '_' . $nm_file;
            $folder = 'Keluhan/';
            $destination = $folder . $newFileName;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
                // File berhasil diunggah dan disimpan

                // Menyimpan nama file baru ke dalam tabel appointment
                $updateFileSql = "UPDATE appointment SET nama_file = '$newFileName' WHERE id_appointment = $id_appointment";
                $conn->query($updateFileSql);

                // Tampilkan pesan sukses
                echo " ";
            } else {
                echo "Gagal mengunggah file.";
            }
        }

// Mengambil data yang baru saja diinput
$newDataSql = "SELECT a.*, h.nama_hewan, h.jenis_hewan, h.tanggal_lahir, c.nama AS nama_customer, c.no_telp, d.nama_dokter, l.nama_layanan FROM appointment AS a
               INNER JOIN customer AS c ON a.id_customer = c.id_customer
               INNER JOIN hewan AS h ON a.id_hewan = h.id_hewan
               INNER JOIN dokter AS d ON a.id_dokter = d.id_dokter
               INNER JOIN layanan AS l ON a.id_layanan = l.id_layanan
               WHERE a.id_appointment = $id_appointment";

$newDataResult = $conn->query($newDataSql);

if ($newDataResult->num_rows > 0) {
    while ($newDataRow = $newDataResult->fetch_assoc()) {
        echo '<div class="invoice-container">';
                echo '<div class="data-container">';
        echo '<div class="detail">';
        echo "<h2>Detail Reservasi</h2>";
          echo "<h2>    Healthy Paws VetCare Clinic    </h2>";
                echo '</div>';
                 echo "<br>";
        echo "<p>Kode Reservasi: " . $newDataRow["id_appointment"] . "</p>";
        echo "<p>Nama Customer: " . $newDataRow["nama_customer"] . "</p>";
        echo "<p>No. Telepon: " . $newDataRow["no_telp"] . "</p>";
        echo "<p>Nama Hewan: " . $newDataRow["nama_hewan"] . "</p>";
        echo "<p>Jenis Hewan: " . $newDataRow["jenis_hewan"] . "</p>";
        echo "<p>Tanggal Lahir Hewan: " . $newDataRow["tanggal_lahir"] . "</p>";
        echo "<p>Jenis Layanan: " . $newDataRow["nama_layanan"] . "</p>";
        echo "<p>Nama Dokter: " . $newDataRow["nama_dokter"] . "</p>";
        echo "<p>Tanggal Periksa: " . $newDataRow["tanggal_appointment"] . "</p>";
        echo "<p>Keluhan: " . $newDataRow["keluhan"] . "</p>";

  
          // Membuat objek Dompdf
            $dompdf = new Dompdf();
// Menampilkan foto
if (!empty($newDataRow["nama_file"])) {
    $folder = 'Keluhan/';
    $fotoPath = $folder . $newDataRow["nama_file"];
    echo "<div class='image-container'><img src='$fotoPath' alt='Foto Keluhan'></div>";
} else {
      echo "<br>";
    echo "Tidak ada foto keluhan.";
     echo "<br>";
       echo "<br>";
}

// Mengenerate HTML menjadi PDF
$html = '
<div class="invoice-container" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 3px double #2b3467; font-family: "Poppins", sans-serif;">
  <h2 class="invoice-heading" style="text-align: center; color: #2b3467; font-family: sans-serif;font-size: 24px; margin-bottom: 20px;">Reservation Details</h2>
  <h2 class="invoice-heading" style="text-align: center; color: #2b3467; font-family: sans-serif;font-size: 18px; margin-bottom: 20px;"><i>Detail Reservasi</i></h2>
  
  <div class="invoice-details" style="display: flex; font-family: "Poppins", sans-serif; justify-content: space-between; margin-bottom: 20px;">
    <div class="left" style="width: 50%;">
      <p style="font-family: sans-serif;"> Kode Reservasi: ' . $newDataRow["id_appointment"] . '</p>
      <p style="font-family: sans-serif;"> Nama: ' . $newDataRow["nama_customer"] . '</p>
      <p style="font-family: sans-serif;"> Nomor Telepon: ' . $newDataRow["no_telp"] . '</p>
      <p style="font-family: sans-serif;"> Nama Hewan: ' . $newDataRow["nama_hewan"] . '</p>
      <p style="font-family: sans-serif;"> Jenis Hewan: ' . $newDataRow["jenis_hewan"] . '</p>
      <p style="font-family: sans-serif;"> Tanggal Lahir Hewan: ' . $newDataRow["tanggal_lahir"] . '</p>
      <p style="font-family: sans-serif;"> Jenis Layanan: ' . $newDataRow["nama_layanan"] . '</p>
      <p style="font-family: sans-serif;"> Nama Dokter: ' . $newDataRow["nama_dokter"] . '</p>
      <p style="font-family: sans-serif;"> Tanggal Reservasi: ' . $newDataRow["tanggal_appointment"] . '</p>
      <p style="font-family: sans-serif;"> Keluhan: ' . $newDataRow["keluhan"] . '</p>
    </div>
    
    <div class="invoice-items" style="margin-bottom: 20px;">
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <td style="border: 1px solid #ccc; font-size: 11px; font-family: sans-serif; padding: 8px; background-color: #bad7e9; text-align: center;">Harap Perhatikan Poin-Poin Berikut</td>
        </tr>
        <tr>
          <td style="border: 1px solid #ccc; font-size: 11px; font-family: sans-serif; padding: 8px; background-color: #bad7e9; text-align: left;">1. Harap datang pada hari yang sudah ditetapkan.</td>
        </tr>
        <tr>
          <td style="border: 1px solid #ccc; font-size: 11px; font-family: sans-serif; padding: 8px; background-color: #bad7e9; text-align: left;">2. Bawalah invoice dalam bentuk kertas maupun PDF.</td>
        </tr>
        <tr>
          <td style="border: 1px solid #ccc; font-size: 11px; font-family: sans-serif; padding: 8px; background-color: #bad7e9; text-align: left;">3. Jika hewan peliharaan Anda telah menerima perawatan sebelumnya atau memiliki masalah kesehatan yang spesifik, bawalah riwayat medis, hasil tes, atau catatan lain yang relevan. </td>
        </tr>
        <tr>
          <td style="border: 1px solid #ccc; font-size: 11px; font-family: sans-serif; padding: 8px; background-color: #bad7e9; text-align: left;">4. Pastikan hewan peliharaan Anda dalam keadaan aman saat di perjalanan menuju dokter hewan. Gunakan kendali seperti peti pengangkut atau tali pengikat yang sesuai agar hewan tidak melarikan diri atau berbahaya bagi dirinya sendiri atau orang lain.</td>
        </tr>
      </table>
    </div>
  
  </div>
  
  <p style="text-align: center; font-family: sans-serif;">&copy; 2023 Kelompok 3 | HealthyPaws VetCare Clinic</p>
</div>';




                 $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Simpan file PDF
          $customerName = $newDataRow["nama_customer"]; // Mengambil nama pelanggan dari data
$pdfFileName = $id_appointment . '_' . $customerName . '.pdf'; // Menggabungkan ID Appointment dan Nama Customer sebagai nama file PDF

                $output = $dompdf->output();
                file_put_contents($pdfFileName, $output);

                // Tampilkan tombol "Download Invoice"
                echo '<a href="' . $pdfFileName . '" class="invoice-button" download>Download</a>';
                echo"<br>";
                echo '<a href="list_form.php" class="back-button">Lihat Daftar Janji</a>';
                   echo '</div>';
                echo '</div>';
                }
            } else {
                echo "Tidak dapat mengambil data yang baru diinput.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Menutup koneksi database
    $conn->close();
} else {
    echo "Pengguna belum login.";
}
?>

</body>
</html>