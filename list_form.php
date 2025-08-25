<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header("location: index.php");
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Reservasi - HealthyPaws</title>
    <link rel="icon" href="logo.png">
     <title>Daftar Janji Temu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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

      h2 {
        text-align: center;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border: 1px solid #ccc;
      }

      th, td {
        padding: 8px;
        text-align: center;
        border: 1px solid #ccc;
      }

      th {
        background-color: #eb455f;
      }

      form {
        margin-top: 20px;
        text-align: center;
      }

      .confirmation-popup {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
      }

      .confirmation-popup-inner {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: white;
        border-radius: 10px;
       text-align: center;
      }

      .confirmation-popup h3 {
        margin-top: 0;
      }

      .confirmation-popup button {
        margin-top: 10px;
      }

      button[type="submit"],
      [type="button"] {
        background-color: #2b3467;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
      }

      button[type="submit"]:hover,
      [type="button"]:hover {
        background-color: #bad7e9;
        color: #000;
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
  
      h2 {
        margin-bottom: 20px;
        margin-top: 20px;
        font-size:18px;
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
    </style>
    <script>
      var deleteID;

      function showConfirmationPopup(id) {
        deleteID = id;
        document.getElementById('confirmation-popup').style.display = 'block';
      }

      function hideConfirmationPopup() {
        document.getElementById('confirmation-popup').style.display = 'none';
      }

      function deleteData() {
        window.location.href = 'delete_form.php?deleteID=' + encodeURIComponent(deleteID);
      }

      function cancelForm() {
        window.location.href = 'welcome.php';
      }
    </script>
    </head>
      <body>
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
        <a href="welcome.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
        <div class="outer">
          <?php
            // Koneksi ke database MySQL
            include 'config.php';

            // Memeriksa apakah ID Appointment untuk dihapus telah diterima
            if (isset($_POST['deleteID'])) {
                $idAppointment = $_POST['deleteID'];

                // Menghapus data appointment berdasarkan ID
                $deleteSql = "DELETE FROM appointment WHERE id_appointment = $idAppointment";
                if ($conn->query($deleteSql) === TRUE) {
                    echo "Data dengan ID $idAppointment berhasil dihapus.";
                } else {
                    echo "Error: " . $deleteSql . "<br>" . $conn->error;
                }
            }

            // Mengambil data hewan, layanan, dan dokter berdasarkan ID yang ada di tabel appointment
            $sql = "SELECT a.id_appointment, a.tanggal_appointment, a.keluhan, h.nama_hewan, l.nama_layanan, d.nama_dokter
                    FROM appointment a
                    INNER JOIN hewan h ON a.id_hewan = h.id_hewan
                    INNER JOIN layanan l ON a.id_layanan = l.id_layanan
                    INNER JOIN dokter d ON a.id_dokter = d.id_dokter
                    WHERE a.id_customer = (SELECT id_customer FROM customer WHERE username = '$username')
                    ORDER BY a.id_appointment";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            ?>
          
            
            <h2>Daftar Janji Temu</h2>
            <table>
                <tr>
                    <th>Kode Reservasi</th>
                    <th>Tanggal Reservasi</th>
                    <th>Nama Hewan</th>
                    <th>Keluhan</th>
                    <th>Layanan</th>
                    <th>Dokter</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?php echo $row['id_appointment']; ?></td>
                    <td><?php echo $row['tanggal_appointment'];?></td>
                    <td><?php echo $row['nama_hewan']; ?></td>
                    <td><?php echo $row['keluhan']; ?></td>
                    <td><?php echo $row['nama_layanan'];?></td>
                    <td><?php echo $row['nama_dokter'];?></td>
                    <td>
                        <button type="button" onclick="showConfirmationPopup(<?php echo $row['id_appointment']; ?>)">BATALKAN</button>
                    </td>
                </tr>
                <?php } ?>
            </table>
            

            <div class="confirmation-popup" id="confirmation-popup">
                <div class="confirmation-popup-inner">
                    <h3>Apakah Anda yakin ingin membatalkan jadwal janji temu ini?</h3>
                    <button type="button" onclick="deleteData()">BATALKAN</button>
                    <button type="button" onclick="hideConfirmationPopup()">CANCEL</button>
                </div>
            </div>

            <?php
            } else {
                echo "Data appointment tidak ditemukan.";
            }

            // Menutup koneksi database
            $conn->close();
            ?>
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