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
        <title>Daftar Hewan - Healthy Paws</title>

        <!-- buat import style css-->
        <link rel="stylesheet" type="text/css" href="formhewan.css">

        <!-- buat tab ikon-->
        <link rel="icon" href="logo.png">
        <!-- buat icon anjing kucing-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- buat header-->
        <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
    
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
    .hover-effect3 {s
      padding: 10px;
      transition: background-color 0.3s;
      color: inherit;
      text-decoration: none;
      margin-left: 2px;
    }

    .hover-effect3:hover {
      background-color: #2b3467;
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
    .nav-items img{
      width: 34px;
      height: 34px; 
    }
            .footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #1f254b;
  padding: 20px 10px;
  font-family: Lato, sans-serif;
  color:#fff;
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
     font-family: Lato, sans-serif;
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

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
    
      .close-icon {
        position: absolute;
        top: 10px;s
        right: 575px;
        font-size: 20px;
        color: #2b3467;
        cursor: pointer;
      }

      .close-icon:hover {
        color: #eb455f;
      }

        </style>
        <!-- JAVASCRIPT -->
        <script>
            $(document).ready(function() {
                $(".datepicker").datepicker({
                    dateFormat: "yy-mm-dd", 
                    showAnim: "fadeIn", 
                    showButtonPanel: true, 
                    buttonText: "Pilih Tanggal", 
                    beforeShow: function(input, inst) {
                        var inputOffset = $(input).offset();
                        setTimeout(function() {
                            inst.dpDiv.css({
                                top: inputOffset.top + $(input).outerHeight(),
                                left: inputOffset.left,
                                display: "none"
                            }).fadeIn(200);
                        }, 0);
                    }
                });
            });

            function cancelForm() {
            // Redirect ke appointment.html
            window.location.href = 'appointment.html';
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


            //fungsi untuk memvalidasi input identitas hewan
            function validateForm() {
                var namaHewan = document.getElementById('nama_hewan').value;
                var jenisHewan = document.querySelector('input[name="jenis_hewan"]:checked');
                var rasHewan = document.getElementById('ras_hewan').value;
                var jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
                var warnaHewan = document.getElementById('warna').value;
                var file = document.getElementById('file').value;

                var alphabetRegex = /^[a-zA-Z\s]+$/;
                var colorRegex = /^[a-zA-Z\s\-,&]+$/;

                var isValid = true;


                if (jenisHewan === null) {
                    showPopup("Pilih salah satu jenis hewan");
                    isValid = false;
                }

                 if (jenisKelamin === null) {
                    showPopup("Pilih salah satu jenis kelamin");
                    isValid = false;
                }
                
                if (!colorRegex.test(warnaHewan)) {
                showPopup("Isian warna hewan belum sesuai");
                isValid = false;
                }
                
                 if (!alphabetRegex.test(rasHewan)) {
                    showPopup("Isian ras hewan belum sesuai");
                    isValid = false;
                }
               
                   if (!alphabetRegex.test(namaHewan)) {
                    showPopup("Isian nama hewan belum sesuai");
                    isValid = false;
                }

if (file !== "") {
    var fileExtension = file.split('.').pop().toLowerCase();
    var allowedExtensions = ['jpg', 'jpeg', 'png'];
    
    if (!allowedExtensions.includes(fileExtension)) {
        showPopup("Tipe file tidak valid. Harap unggah file dalam format JPG, JPEG, atau PNG.");
        isValid = false;
    }
}

                return isValid;
            }

         document.addEventListener("DOMContentLoaded", function() {
        var closeIcon = document.querySelector(".close-icon");
        closeIcon.addEventListener("click", function() {
          window.location.href = "appointment.php";
        });
      });
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
        <div class="container">
            <div class="close-icon">
          <i class="fas fa-chevron-left"></i>
        </div>
            <h2 class="form-title">Form Pendaftaran Hewan</h2>
            <form method="post" action="save_datahewan.php" enctype="multipart/form-data" onsubmit="return validateForm()">

                  <div class="form-field">
                    <label for="nama_hewan">Nama Hewan:</label>
                    <input type="text" name="nama_hewan" id="nama_hewan" placeholder="Masukkan nama hewan peliharaan Anda" required>
                </div>

                <div class="form-field">
                    <label>Jenis Hewan:</label>
                </div>
                <div class="form-field-jenis">
                    <div class=" radio-button-wrapper">
                        <input type="radio" name="jenis_hewan" id="jenis_hewan_kucing" value="kucing" required>
                        <label for="jenis_hewan_kucing">Kucing <i class="fa-sharp fa-solid fa-cat"></i></label>
                    </div>
                    <div class="radio-button-wrapper">
                        <input type="radio" name="jenis_hewan" id="jenis_hewan_anjing" value="anjing" required>
                        <label for="jenis_hewan_anjing">Anjing <i class="fa-solid fa-dog"></i></label>
                    </div>
                </div>

                <div class="form-field">
                    <label for="ras_hewan">Ras Hewan:</label>
                    <input type="text" name="ras_hewan" id="ras_hewan" placeholder="Masukkan ras hewan peliharaan Anda" required>
                      <h5 align="left" style="font-size: 10px; font-family: calibri; color:red;"><i>contoh : persia, ragdoll, buldog, golden retriever</i></h5>
                </div>

                   <div class="form-field">
                    <label for="tanggal">Tanggal Lahir:</label>
                    <input type="text" name="tanggal" id="tanggal" class="datepicker" required>
                </div>

                <div class="form-field">
                    <label>Jenis Kelamin:</label>
                </div>
                <div class="form-field-jenis">
                    <div class=" radio-button-wrapper">
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin_jantan" value="jantan" required>
                        <label for="jenis_hewan_kucing">Jantan <i class="fa-solid fa-mars"></i></label>
                    </div>
                    <div class="radio-button-wrapper">
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin_betina" value="betina" required>
                        <label for="jenis_hewan_anjing">Betina <i class="fa-solid fa-venus"></i></label>
                    </div>
                </div>

                 <div class="form-field">
                    <label for="warna">Warna Hewan:</label>
                    <input type="text" name="warna" id="warna" placeholder="Masukkan warna hewan peliharaan Anda" required>
                </div>


                 <div class="form-field">
                    <label for="file">Lampirkan Foto Hewan:</label>
                    <input type="file" name="file" id="file">
                </div>
              
                <div class="form-buttons">
                    <div class="button-wrapper">
                        <input type="submit" value="Daftar">
                    </div>
                    <div class="button-wrapper">
                        <input type="reset" value="Hapus">
                    </div>
                </div>
            </form>
            <div id="popup" class="popup"></div>
        </div>
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