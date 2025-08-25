<?php
include("config.php");

// Memeriksa apakah pengguna telah login sebelum mengakses halaman ini
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

// Ambil data pelanggan yang login
$username = $_SESSION['username'];

$query = "SELECT nama, username, email, password, alamat, no_telp, jenis_kelamin, nama_file FROM customer WHERE username='$username' ORDER BY username ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($result);

// Mendapatkan nama file profil
$namaFileProfil = $data['nama_file'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">   
    <meta charset="UTF-8">

    <title>Profil - Healthy Paws</title>
    <link rel="icon" href="logo.png">
    <style type="text/css">

    *{
        font-family: "Poppins", sans-serif;
        box-sizing: border-box;
    }

    body{
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center top;
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;

    }

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
    .outer {
        margin:30px 0;
        width: 950px;
        min-height: 500px;
        padding: 10px 20px;
        background-color: none;
        border-radius: 30px;
        font-size: 10;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
    }

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
        margin-right: 0px;
    }

    .header .judul{
        font-family: Nunito;
        font-size: 20px;
        margin-right: 45%;
        color: #fcffe7;
        margin-left:0px;
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
    .nav-items a:hover {
        text-decoration: none;
        color: #2b3467;
        padding: 35px 20px;
    }

    .hover-effect1 {
        padding: 10px;
        transition: background-color 0.3s;
        color: inherit;
        text-decoration: none;
        margin-left: 2px;
    }

    .hover-effect1:hover {
        background-color: #BAD7E9;
        cursor: pointer;
        color: #2b3467;
        text-decoration: none;
      
    }

    .hover-effect3 {
        padding: 10px;
        transition: background-color 0.3s;
        color: inherit;
        text-decoration: none;
        margin-left: 2px;
    }

    .hover-effect3:hover {
        background-color: #2b3467;
        color: #2b3467;
        text-decoration: none;
      
    }
    
    .nav-items img{
        width: 34px;
        height: 34px; 
    }
 
    .password-circle {
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: black;
        border-radius: 50%;
        margin-right: 10px; 
    }
    .password-masked {
        font-family: '•'; 
        letter-spacing: 3px;
    }

    
    .profile-image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }

    .profile-image {
        width: 170px;
        height: 170px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ccc;
    }
    
    .empty-profile {
        width: 170px;
        height: 170px; 
        border-radius: 50%;
        margin: 0 auto; 
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .centered {
    text-align: center;
    }
    
    .left{
     text-align: left;
    }

    .container {
        max-width: 695px;
        height: 850px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
    }

    .form-buttons {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .form-buttons .button-wrapper {
        margin: 0 10px;
        margin-top: 20px;
        margin-bottom: 20px;

    }
                 
    .form-buttons input[type="submit"],
    .form-buttons input[type="reset"] {
        padding: 10px 20px;
        background-color: #eb455f;
        border: none;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 4px;
    }

    .form-buttons input[type="submit"]:hover,
    .form-buttons input[type="reset"]:hover {
        background-color: #bad7e9;
        color: #000;
        transition: background-color 0.3s ease;
    }
    
    .close-icon {
        top: 10px;
        right: 639px;
        font-size: 20px;
        color: #2b3467;
        cursor: pointer;
    }

    .close-icon:hover {
        color: #eb455f;
    }

    .delete-button-container{
        display: flex;
        justify-content: center;
    }

    </style>

    <script type="text/JavaScript">

    //Fungsi untuk menghapus foto profil
    function deleteProfile() {
    if (confirm("Apakah Anda yakin ingin menghapus foto profil?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "deletefoto.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                if (xhr.responseText === "success") {
                    location.reload();
                } else {
                }
            }
        };
        xhr.send("filename=<?php echo $namaFileProfil; ?>"); 
    }
}
    
    //Fungsi untuk mengarahkan user kembali ke halaman beranda
    document.addEventListener("DOMContentLoaded", function() {
        var closeIcon = document.querySelector(".close-icon");
        closeIcon.addEventListener("click", function() {
          window.location.href = "welcome.php";
        });
      });

    </script>
</head>

<body bgcolor= #fcffe7>
    <header class="header">
        <img img src="logo.png" class="logo" ></a>
        <h3 class="judul">
        <a class="hover-effect1" href="welcome.php" style="font-family: Nunito; margin-left: 2px;">Healthy Paws</a></h3>
        <nav class="nav-items">
            <div class="hover-effect1">
                <a href="tentang.html">Tentang Kami</a>
            </div>
            <div class="hover-effect1">
                <a href="layanan.html">Layanan</a>
            </div>
            <div class="hover-effect1">
                <a href="galeri.html">Galeri</a>
            </div>
            <div class="hover-effect3">
                <a href ="read.php"><img src="empty.png" class="smallprofile"></a>
            </div>
        </nav>
  </header>
   <main>
<div class="outer">
<div class="container">
     <div class="close-icon">
          <i class="fas fa-chevron-left"></i>
        </div>
        <h1><span  style="color:#2b3467; font-size: 35px; text-align: center; margin-left: 205px;">Profil Anda</span> </a></h1>
        <hr>


    <section>
       <div class="table-responsive">
        <table class="table table-striped mt-4">
            <tbody>
    
    <tr>
        <th colspan="2"  class="centered" style="color: white;" >Foto Profil</th>

        </tr>
        	<tr>
        <td colspan="2">
        
	<?php
        if (!empty($namaFileProfil)) {
        // Menampilkan foto profil jika sudah ada
        echo '<div class="profile-image-container">';
        echo '<img src="'.$namaFileProfil.'" class="profile-image" alt="Foto Profils">';
        echo '</div>';
        echo '<i class="fas fa-trash" onclick="deleteProfile()" style="cursor: pointer;     display: flex; justify-content: center; margin-left: 135px;"></i>'; // Ikon Trash dengan fungsi JavaScript
    } else {
        // Menampilkan bulatan kosong jika belum ada foto profil
        echo '<img src="empty.png" class="empty-profile">';
    }
    ?>
        </td>
    </tr>
    <tr>
        <th colspan="2"  class="centered" style="color: white; " >Foto Profil</th>

        </tr>
      <tr>
        <th  style="background-color: white; padding: 10px 150px 10px 5px;">Nama</th>
        <td  style="background-color: white; padding: 10px 150px 10px 10px;"><?php echo $data['nama']; ?></td>
    </tr>
    

    <tr>
        <th style="background-color: #eeeeee; padding: 10px 150px 10px 5px; ">Username:</th>
        <td style="background-color: #eeeeee; padding: 10px 150px 10px 10px;"><?php echo $data['username']; ?></td>
    </tr>

    <tr>
        <th style="background-color: white; padding: 10px 150px 10px 10px; ">Password:</th>
        <td style="background-color: white; padding: 10px 150px 10px 10px;">
            <?php
            $password = $data['password'];
            if (!is_null($password)) {
                $passwordLength = strlen($password);
                for ($i = 0; $i < $passwordLength; $i++) {
                echo '<span class="password-circle"></span>';
            }
        }
        ?>
        </td>
    </tr>
    <tr>
        <th style="background-color: #eeeeee; padding: 10px 150px 10px 5px; ">Email:</th>
        <td style="background-color: #eeeeee; padding: 10px 150px 10px 10px;"><?php echo $data['email']; ?></td>
    </tr>
    <tr>
        <th style="background-color: white; padding: 10px 150px 10px 10px;">Alamat:</th>
        <td style="background-color: white; padding: 10px 150px 10px 10px;"><?php echo $data['alamat']; ?></td>
    </tr>
    <tr>
        <th style="background-color: #EEEEEE; padding: 10px 150px 10px 10px; ">Nomor Telepon:</th>
        <td style="background-color: #eeeeee; padding: 10px 150px 10px 10px;"><?php echo $data['no_telp']; ?></td>
    </tr>
    <tr>
        <th style="background-color: white; padding: 10px 150px 10px 10px; ">Jenis Kelamin:</th>
        <td style="background-color: white; padding: 10px 150px 10px 10px;"><?php echo $data['jenis_kelamin']; ?></td>
    </tr>
</tbody>
</table>
    <div class="form-buttons">
                    <div class="button-wrapper">
                        <input type="submit" value="Ubah Profil" onclick="window.location.href='updateprofile.php';">
                    </div>
                    <div class="button-wrapper">
                        <input type="submit" value="Log Out" onclick="window.location.href='logout.php';">
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</main>
</body>
</html>
