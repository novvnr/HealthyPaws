<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login - HealthyPaws</title>
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
        display: flex;
        justify-content:center;
        align-items: center;
        min-height: 100vh;
      }

      .container {
        max-width: 400px;
        width: 100%;
        padding: 20px;
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
        margin-bottom: 10px;
      }

      .form-field label {
        display: block;
        color: black;
        font-weight: bold;
        margin-bottom: 5px;
      }

      .form-field input[type="text"],
      .form-field input[type="password"] {
        width: calc(100% - 2px);
        padding: 8px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        background-color: #ebebeb;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
      }

      .form-field input[type="text"]:focus,
      .form-field input[type="password"]:focus {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(255, 105, 180, 0.8); /* Warna pink */
        animation: none !important;
      }

      .form-buttons {
        display: flex;
        justify-content: center;
      }

      .form-buttons .button-wrapper {
        margin: 0 10px;
        margin-top: 10px;
        margin-bottom: 10px;
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
        right: 375px;
        font-size: 20px;
        color: #2b3467;
        cursor: pointer;
      }

      .close-icon:hover {
        color: #eb455f;
      }

      .error-message {
        color: #000;
        background-color: #ffcccc;
        padding: 10px;
        margin-bottom: 10px;
        text-align: center;
        border-radius: 10px;
      }
      .daftar a {
              color: #2b3467;
              text-decoration: none;
            }

            .daftar a:visited {
              color: #2b3467;
            }
            .daftar a:hover {
              color: #808080;
            }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Login</h2>
      <form method="post" action="login.php">
        <div class="close-icon">
          <i class="fas fa-chevron-left"></i>
        </div>
        <?php
        if (isset($_SESSION["message"])) {
          echo '<div class="error-message">' . $_SESSION["message"] . '</div>';
          unset($_SESSION["message"]);
        }
        ?>
        <div class="form-field">
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" placeholder="Masukan username" required><br>
        </div>
        <div class="form-field">
          <label for="password">Kata Sandi:</label>
          <input type="password" name="password" id="password" placeholder="Masukan kata sandi" required><br>
        </div>
        <h5 align="left" style="font-size: 12px; font-family: calibri; color:red;"><i>Belum memiliki akun? </i><span class="daftar"><a href="registrasi.php">Daftar di sini</a></span></h5>
        <div class="form-buttons">
          <div class="button-wrapper">
            <input type="submit" value="Submit"/><br><br>
          </div>
          <div class="button-wrapper">
            <input type="reset" value="Hapus"/>
          </div>
        </div>
        <?php
        if (isset($_COOKIE["message"])) {
          echo '<div class="alert-box" id="alertBox">';
          echo $_COOKIE["message"];
          echo '</div>';
        }
        ?>
      </form>
    </div>
    <script>
      function showAlert() {
        var alertBox = document.getElementById('alertBox');
        alertBox.style.display = 'block';
      }

      function hideAlert() {
        var alertBox = document.getElementById('alertBox');
        alertBox.style.display = 'none';
      }

      document.addEventListener("DOMContentLoaded", function() {
        var closeIcon = document.querySelector(".close-icon");
        closeIcon.addEventListener("click", function() {
          window.location.href = "index.php";
        });
      });
    </script>
  </body>
</html>