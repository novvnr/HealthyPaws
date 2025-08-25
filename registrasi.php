<!DOCTYPE html>
<html>
  <head>
    <title>Registrasi - Healthy Paws</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
      * {
        font-family: "Poppins", sans-serif;
        box-sizing: border-box;
      }

      body {
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fcffe7;
      }

      .container {
        max-width: 550px;
        margin: 20px auto;
        padding: 10px 20px;
        position: relative;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

      .container h2 {
        text-align: center;
        color: black;
        font-family: "Poppins", sans-serif;
       }

      .form-field {
        margin-bottom: 20px;
      }

      .form-field label {
        display: block;
        color: black;
        font-weight: bold;
        margin-bottom: 5px;
      }

      .form-field input[type="text"],
      .form-field input[type="tel"],
      .form-field input[type="password"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        background-color: #ebebeb;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
      }

      .form-field input[type="text"]:focus,
      .form-field input[type="tel"]:focus,
      .form-field input[type="password"]:focus {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(255, 105, 180, 0.8); /* Warna pink */
        animation: none !important;
      }

      .form-field input[type="radio"] {
        margin-right: 5px;
      }

      .form-field-jenis {
        display: flex;
        color: black;
        align-items: center;
        margin-bottom: 20px;
      }

      .radio-button-wrapper {
        display: flex;
        align-items: center;
        margin-right: 10px;
      }

      .radio-button-wrapper input[type="radio"] {
        margin-right: 5px;
      }

      .form-buttons {
        display: flex;
        justify-content: center;
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
        position: absolute;
        top: 10px;
        right: 525px;
        font-size: 20px;
        color: #2b3467;
        cursor: pointer;
      }

      .close-icon:hover {
        color: #eb455f;
      }

      .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #eb455f;
        color: #fff;
        font-size: 18px;
        font-weight: bold;
        border-radius: 10px;
        text-align: center;
        display: none;
      }
    </style>
    <script>
      function cancelForm() {
        window.location.href = 'index.php';
      }

      function validateForm() {
      var nama = document.getElementById('nama').value;
      var username = document.getElementById('username').value;
      var telepon = document.getElementById('no_telp').value;
      var email = document.getElementById('email').value;

      var alphabetRegex = /^[a-zA-Z\s]+$/;
      var numericRegex = /^\d{12}$/; // 12 digit
      var emailRegex = /^\S+@\S+\.\S+$/;

      var isValid = true;

      if (!numericRegex.test(telepon)) {
        showPopup("Isian nomor telepon belum sesuai (harus 12 digit)");
        isValid = false;
      }

      if (!emailRegex.test(email)) {
        showPopup("Isian email belum sesuai");
        isValid = false;
      }

      if (!alphabetRegex.test(username)) {
        showPopup("Isian username belum sesuai");
        isValid = false;
      }

      if (!alphabetRegex.test(nama)) {
        showPopup("Isian nama belum sesuai");
        isValid = false;
      }

      return isValid;
      }

      function showPopup(message) {
        var popup = document.getElementById('popup');
        popup.textContent = message;
        popup.style.display = 'block';

        setTimeout(function() {
          hidePopup();
        }, 3000);
      }

      function hidePopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'none';
      }

      document.addEventListener("DOMContentLoaded", function() {
        var closeIcon = document.querySelector(".close-icon");
        closeIcon.addEventListener("click", function() {
          window.location.href = "index.php";
        });
      });
    </script>
  </head>
  <body>
    <div class="container">
      <h2>Registrasi</h2>
      <form method="post" action="dataregistrasi.php" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="close-icon">
          <i class="fas fa-chevron-left"></i>
        </div>
        <div class="form-field">
          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="nama" placeholder="Masukan nama" required><br>
        </div>
        <div class="form-field">
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" placeholder="Masukan username" required><br>
        </div>
        <div class="form-field">
          <label for="password">Kata Sandi:</label>
          <input type="password" name="password" id="password" placeholder="Masukan kata sandi" required><br>
        </div>
        <div class="form-field">
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" placeholder="Masukan email" required><br>
        </div>
        <div class="form-field">
          <label for="alamat">Alamat:</label>
          <input type="text" name="alamat" id="alamat" placeholder="Masukan alamat" required><br>
        </div>
        <div class="form-field">
          <label for="no_telp">Nomor Telepon:</label>
          <input type="tel" name="no_telp" id="no_telp" placeholder="Masukkan nomor telepon Anda (12 digit)" required><br>
        </div>
        <div class="form-field">
          <label for="jenis_kelamin">Jenis Kelamin:</label>
        </div>
        <div class="form-field-jenis">
          <div class=" radio-button-wrapper">
            <input type="radio" name="jenis_kelamin" id="jenis_kelamin_perempuan" value="perempuan" required>
            <label for="jenis_kelamin_perempuan">Perempuan</label>
          </div>
          <div class=" radio-button-wrapper">
            <input type="radio" name="jenis_kelamin" id="jenis_kelamin_lakilaki" value="laki-laki" required>
            <label for="jenis_kelamin_lakilaki">Laki-Laki</label>
          </div>
        </div>
        <div class="form-buttons">
          <div class="button-wrapper">
            <input type="submit" value="Submit"/><br><br>
          </div>
          <div class="button-wrapper">
            <input type="reset" value="Hapus"/>
          </div>
        </div>
      </form>
      <div id="popup" class="popup"></div> 
    </div>
  </body>
</html>