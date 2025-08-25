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
    <title>Daftar Hewan - HealthyPaws</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Import -->
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

      button [type="submit"],
      [type="button"] {
        background-color: #2b3467;
        color: white;
        border: none;
        font-size: 16px;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
      }

      button[type="submit"]:hover,
      [type="button"]:hover {
        background-color: #bad7e9;
        color: #000;
        font-size: 16px;
      }

      .button-link {
        display: inline-block;
        padding: 8px 16px;
        background-color: #2b3467;
        color: white;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        cursor: pointer;
      }

      .button-link:hover {
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

      h2 {
        text-align:center;
        margin-bottom: 20px;
        margin-top: 20px;
        font-size:18px;
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
        window.location.href = 'deletehewan.php?deleteID=' + encodeURIComponent(deleteID);
      }

      function cancelForm() {
        window.location.href = 'appointment.php';
      }
    </script>
  </head>
  <body>
    <header class="header">
      <img img src="logo.png" class="logo" >
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
      <a href="appointment.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
      <div class="outer">
        <?php
        include 'config.php';
        // Memeriksa apakah ID hewan untuk dihapus telah diterima
        if (isset($_POST['deleteID'])) {
          $idHewan = $_POST['deleteID'];
          // Menghapus data hewan berdasarkan ID
          $deleteSql = "DELETE FROM hewan WHERE id_hewan = $idHewan";
          if ($conn->query($deleteSql) === TRUE) {
            echo "Data dengan ID $idHewan berhasil dihapus.";
          } else {
              echo "Error: " . $deleteSql . "<br>" . $conn->error;
            }
        }
        // Mengambil data hewan berdasarkan username pelanggan
        $sql = "SELECT h.* FROM hewan h
        INNER JOIN customer c ON h.id_customer = c.id_customer
        WHERE c.username = '$username'
        ORDER BY h.id_hewan";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $data = array();
          while ($row = $result->fetch_assoc()) {
          $data[] = $row;
        }
        ?>
          
        <h2>Daftar Hewan</h2>
        <table>
          <tr>                                   
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Ras</th>
            <th>Warna</th>
            <th colspan="2">Aksi</th>
          </tr>
          <?php foreach ($data as $row) { ?>
          <tr>                    
            <td>
              <?php if ($row['nama_file']) { ?>
              <img src="<?php echo $row['nama_file']; ?>" width="100" height="100" alt="Tidak Ada Foto">
              <?php } else { ?>
                (Tidak ada foto)
              <?php } ?>               
            </td>
            <td><?php echo $row['nama_hewan']; ?></td>
            <td><?php echo $row['jenis_hewan']; ?></td>
            <td><?php echo $row['tanggal_lahir']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['ras_hewan']; ?></td>
            <td><?php echo $row['warna']; ?></td>
            <td>            
              <a class="button-link" href="edithewan.php?id_hewan=<?php echo $row['id_hewan']; ?>">EDIT</a>
            </td>
            <td>
              <button type="button" onclick="showConfirmationPopup(<?php echo $row['id_hewan']; ?>)">DELETE</button>
            </td>
          </tr>
          <?php } ?>
        </table>
        <div class="confirmation-popup" id="confirmation-popup">
          <div class="confirmation-popup-inner">
            <h3>Apakah Anda yakin ingin menghapus data hewan?</h3>
            <button type="button" onclick="deleteData()">DELETE</button>
            <button type="button" onclick="hideConfirmationPopup()">CANCEL</button>
          </div>
        </div>
        <?php
        } else {
          echo "Data hewan tidak ditemukan.";
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