<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Beranda - HealthyPaws</title>
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
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fcffe7;
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
        background-image: url(pet.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center top -90px;
        width: 100%;
        height: 700px;
        padding: 40px 20px;
        font-size: 10;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
      }
      
      .outer h1{
        color: #2b3467;
        font-size: 27px;
        align-items: center;
        position:relative;
        margin: 0;
      }
  
      .container {
        background-color: rgba(250, 250, 242, 0.3);
        display: flex;
        width: 900px;
        border-radius: 2px;
        justify-content: center;
        align-items: center;
        height: 45vh;
        margin: 5px;
        margin-top: 5px;
        overflow: hidden;
        margin-top: 42px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

      .left-div, .right-div {
        width: 50%;
        height: 100%;
        transition: background-color 0.3s;
      }
      .left-div:hover {
      background-color: rgba(252, 255, 231, 0.4);

      }

      h2 {
        margin-bottom: 20px;
        margin-top: 20px;
        font-size:19px;
      }

      .right-div:hover {
      background-color: rgba(252, 255, 231, 0.4);

      }

      .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .image {
        width: 250px;
        height: auto;
        margin-bottom: 10px;
      }

      .glowing-text {
        animation: glowing 2s infinite;
      }

      @keyframes glowing {
        0% {
          opacity: 1;
          text-shadow: 0 0 10px #eb455f;
        }
        50% {
          opacity: 1;
          text-shadow: none;
        }
        100% {
          opacity: 1;
          text-shadow: 0 0 10px #eb455f;
        }
      }
    </style>
  </head>
  <body>
    <header class="header">
      <img img src="logo.png" class="logo">
      <h3 class="judul">
        <a class="hover-effect1" href="welcome.php" style="font-family: Nunito; margin-left: 2px;">Healthy Paws</a>
      </h3>
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
        <h1 align="center" class="glowing-text">Selamat datang, <?php echo $_SESSION['username']; ?>!</h1><br>
        <h1 class="glowing-text" style="white-space: nowrap;">Jadwalkan Pertemuan Anda dengan Tim Medis <span style="color: #eb455f;">Healthy Paws</span></h1>
        <div class="container">
          <div class="left-div">
            <div class="content">
              <h2 style="color: #2b3467;">Buat Janji Baru</h2>
              <a href="appointment.php">
                <img class="image" src="appointment_left.png" alt="Gambar Kiri">
              </a>
            </div>
          </div>
          <div class="right-div">
            <div class="content">
              <h2 style="color: #2b3467;">Lihat Daftar Janji</span></h2>
              <a href="list_form.php">
                <img class="image" src="appointment_right.png" alt="Gambar Kanan">
              </a>
            </div>
          </div>
        </div>
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