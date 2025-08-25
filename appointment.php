<?php
session_start(); 
if (!isset($_SESSION['username'])) { 
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Janji Temu - HealthyPaws</title>
    <link rel="icon" href="logo.png">
    <!-- Import -->
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
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

      /* Header */
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
        font-size : 15px;
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
  
      /* Footer */
      .footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #1f254b;
        padding: 20px 10px;
        font-family: Lato, sans-serif;
        color: #fff;
      }

      .footer .copy {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding: 0 40px;
        text-align: left;
      }

      .footer .copy p {
        font-family: Lato, sans-serif;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .footer .copy .p-last {
        margin-top: 3px;
      }

      .footer .copy ul {
        margin: 0;
        padding: 0;
      }

      .footer .copy li {
        font-family: Lato, sans-serif;
        list-style-type: none;
      }

      .bottom-links {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 40px;
        width: 75%;
      }

      .bottom-links .links {
        color: #1f254b;
        font-family: Lato, sans-serif;
      }

      .bottom-links .links span {
        font-size: 12px;
        color: #1f254b;
        margin: 10px 0;
        font-family: Lato, sans-serif;
      }

      .bottom-links .links img {
        width: 180px;
        height: auto;
      }

      .bottom-links .links i {
        text-decoration: none;
        color: #1f254b;
        padding: 10px 20px;
        font-family: Lato, sans-serif;
      }

      ul,
      li {
        font-family: 'Lato', sans-serif;
      }

      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
      }

      /* Main Element */  
      .outer {
      width: 100%;
        height: 700px;
        padding: 40px 20px;
        font-size: 10;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
          background-image: url(pet.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center top -90px;
      }
    
      .outer h1{
        color: #2b3467;
        font-size: 35px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position:relative;
        margin-top: 10px;
      }

      .container {
        background-color: none;
        display: flex;
        width: 701px;
        border-radius: 0px;
        justify-content: center;
        align-items: center;
        height: 52vh;
        margin: 5px;
        margin-top: 5px;
        overflow: hidden;
      }

      .container2 {
        background-color: rgba(250, 250, 242, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
        width: 700px;
        align-items: center;
        height: 30vh;
        margin: 5px;
        padding: 5px;
        border-radius: 0px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        flex-direction: column;
        text-align: center;
      }

      .left-div, .right-div {
        width: 50%;
        height: 100%;
        transition: background-color 0.3s;
      }

      .left-div:hover {
        background-color: #bad7e9;
      }

      h2 {
        margin-bottom: 20px;
        margin-top: 20px;
        font-size:18px;
      }

      .right-div:hover {
        background-color: #bad7e9;
      }

      .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .container2:hover {
        background-color: #bad7e9;
        cursor: pointer;
      }

      .image {
        width: 350px;
        height: auto;
        margin-bottom: 10px;
      }

      .image2 {
        width: 250px;
        height: auto;
        margin:0;
      } 

      .back-arrow {
        position: absolute;
        top: 110px;
        left: 30px;
        color: #eb455f;
        font-size: 50px;
        text-decoration: none;
      }

      .back-arrow:hover {
        position: absolute;
        top: 110px;
        left: 30px;
        color: #2b3467;
        font-size: 50px;
        text-decoration: none;
      }

      .glowing-text {
        animation: glowing 2s infinite;
      }

      @keyframes glowing {
        0% {
          opacity: 1;
          text-shadow: 0 0 10px #BAD7E9;
        }
        50% {
          opacity: 1;
          text-shadow: none;
        }
        100% {
          opacity: 1;
          text-shadow: 0 0 10px #BAD7E9;
        }
      }
    </style>
  </head>
  <body>
    <header class="header">
      <img img src="logo.png" class="logo">
      <h3 class="judul"><a class="hover-effect1" href="welcome.php" style="font-family: Nunito; margin-left: 2px;">Healthy Paws</a></h3>
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
      <a href="welcome.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
      <div class="outer">
        <h1 class="glowing-text">Jadwalkan Pertemuan Anda Sekarang!</h1>
        <div class="container">
          <div class="left-div">
            <div class="content">
              <h2 style="color: #2b3467;">Masukan <span style="color: #eb455f;">Data Hewan</span></h2>
              <a href="create_formhewan.php">
                <img class="image" src="create_formhewan.png" alt="Gambar Kiri">
              </a>
            </div>
          </div>
          <div class="right-div">
            <div class="content">
              <h2 style="color: #2b3467;">Lihat <span style="color: #eb455f;">Daftar Hewan</span></h2>
              <a href="listhewan.php">
                <img class="image" src="listhewan.png" alt="Gambar Kanan">
              </a>
            </div>
          </div>
        </div>
          <a href="createform.php" style="text-decoration: none;">
            <div class="container2">
              <img class="image2" src="createform.png">
            </div>
          </a>
      </div>
    </main>
  </body>
  <footer class="footer">
    <div class="copy">
      <ul>
        <li><i class="fas fa-map-marker-alt"></i> <span style="font-family: Lato;">Jl. Kesehatan Raya No.28</span></li>
        <li><i class="fas fa-phone"> </i><span style="font-family: Lato;">+622172111447</span></li>
        <li><i class="fas fa-comments"></i> <span style="font-family: Lato;">+62 812-4111-241</span></li>
        <li ><i class="fas fa-envelope-open"></i><span style="font-family: Lato;"> vet@healthypaws.com</span></li>
      </ul>
      <p>2023 | HealthyPaws VetCare Clinic</p>
    </div>
    <div class="bottom-links">
      <div class="links">
        <img src="imagelogo.png">
      </div>
    </div>
  </footer>
</html>