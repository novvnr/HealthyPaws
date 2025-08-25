<?php
// memulai session 
session_start();
// cek session untuk memeriksa user telah melakukan login atau belum 
if (!isset($_SESSION['username'])) { // jika tidak ada session username
  header("location: index.php"); // redirect ke halaman index.php
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Formulir Janji Temu</title>
        <link rel="icon" href="logo.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <style>   
            .container {
                max-width: 500px;
                margin: 20px auto;
                padding: 10px 20px;
                background-color: white;
                border-radius: 10px;
                position: relative;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            body {
                font-family: "Poppins", sans-serif;
                margin: 0;
                padding: 0;
                background-color: #fcffe7;
            }

            .form-title {
                text-align: center;
                color: black;
                font-family: "Poppins", sans-serif;
            }

            * {
                font-family: "Poppins", sans-serif;
                box-sizing: border-box;
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
            .form-field input[type="tel"] {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                background-color: #ebebeb;
                transition: background-color 0.3s ease, box-shadow 0.3s ease;
                cursor: pointer;
            }

            .form-field input[type="text"]:focus,
            .form-field input[type="tel"]:focus {
                background-color: #fff;
                box-shadow: 0 0 10px rgba(255, 105, 180, 0.8); 
                animation: none !important;
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

            /* elemen dropdown */
            .drop-field {
              position: relative;
              margin-bottom: 20px;
            }

            .drop-field label {
                display: block;
                color: black;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .drop-field select {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                background-color: #ebebeb;
                transition: background-color 0.3s ease, box-shadow 0.3s ease;
                cursor: pointer;
            }

            .drop-field select:focus {
                background-color: #fff;
                box-shadow: 0 0 10px rgba(255, 105, 180, 0.8);
                animation: none !important;
            }

            /* panah dropdown */
            .drop-field::after {
                content: "\25BE";
                position: absolute;
                top: 50%;
                right: 10px;
                transform: translateY(-50%);
                color: #2b3467;
                pointer-events: none;
            }

            /* button close */
            .close-icon {
                position: absolute;
                top: 10px;
                right: 475px;
                font-size: 20px;
                color: #2b3467;
                cursor: pointer;
            }

            .close-icon:hover {
                color: #eb455f;

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
        <script>
            $(document).ready(function() {
                $(".datepicker").datepicker({
                    dateFormat: "yy-mm-dd",
                    showAnim: "fadeIn",
                    showButtonPanel: true,
                    buttonText: "Pilih Tanggal",
                    minDate: 1, // Memulai dari hari esok
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

            //pop up
            function showPopup(message) {
                var popup = document.getElementById('popup');
                popup.textContent = message;
                popup.style.display = 'block';

                setTimeout(function() {
                    hidePopup();
                }, 3000); // Mengatur waktu muncul popup selama 3 detik (3000 milidetik)
            }

            function hidePopup() {
                var popup = document.getElementById('popup');
                popup.style.display = 'none';
            }

            function validateForm() {
                var file = document.getElementById('file').value;

                if (file !== "") {
                    var fileExtension = file.split('.').pop().toLowerCase();
                    if (!['jpg', 'jpeg', 'png', 'pdf'].includes(fileExtension)) {
                        showPopup("Tipe file tidak valid. Harap unggah file dalam format JPG, JPEG, PNG, atau PDF");
                        isValid = false;
                    }
                }
            return isValid;
            }

            //dropdown hewan
            $(document).ready(function() {
                var username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";

                $.ajax({
                    url: "get_hewan.php",
                    type: "GET",
                    data: { username: username },
                    success: function(response) {
                        var hewanDropdown = $("#hewan_anda");
                        // Kosongkan dropdown sebelum menambahkan opsi
                        hewanDropdown.empty();
                        // Tambahkan opsi hewan berdasarkan data yang diterima dari server
                        var hewanData = JSON.parse(response);
                        for (var i = 0; i < hewanData.length; i++) {
                            var hewanOption = $("<option></option>")
                            .attr("value", hewanData[i].id)
                            .text(hewanData[i].nama);
                            hewanDropdown.append(hewanOption);
                        }
                    },
                    error: function() {
                        console.log("Terjadi kesalahan saat memuat data hewan.");
                    }
                });
            });

            //dropdown dokter
            $(document).ready(function() {
                // Mendapatkan elemen dropdown layanan
                var layananDropdown = document.getElementById('layanan_anda');
                // Mendapatkan elemen dropdown dokter
                var dokterDropdown = document.getElementById('dokter_anda');
                // Menyimpan opsi dokter awal
                var initialDokterOptions = dokterDropdown.innerHTML;
                // Mendaftarkan event listener saat layanan dipilih
                layananDropdown.addEventListener('change', function() {
                    // Mendapatkan nilai layanan yang dipilih
                    var selectedLayanan = layananDropdown.value;
                    // Menghapus opsi dokter sebelumnya
                    dokterDropdown.innerHTML = '';
                    // Membuat opsi default
                    var defaultOption = document.createElement('option');
                    defaultOption.text = 'Pilih dokter';
                    defaultOption.disabled = true;
                    defaultOption.selected = true;
                    dokterDropdown.appendChild(defaultOption);
                    // Nonaktifkan opsi dokter saat layanan belum dipilih
                    if (selectedLayanan === "") {
                        dokterDropdown.disabled = true;
                        return;
                    }
                    // Mengaktifkan opsi dokter saat layanan dipilih
                    dokterDropdown.disabled = false;
                    // Mendapatkan data dokter dari server berdasarkan layanan yang dipilih
                    $.ajax({
                        url: 'get_dokter.php', // Ganti dengan URL yang sesuai untuk mengambil data dokter
                        type: 'GET',
                        data: { layanan_id: selectedLayanan }, // Mengirim ID layanan ke server
                        success: function(response) {
                            // Menambahkan opsi dokter berdasarkan data yang diterima dari server
                            var dokterData = JSON.parse(response);
                            for (var i = 0; i < dokterData.length; i++) {
                                var dokterOption = document.createElement('option');
                                dokterOption.value = dokterData[i].id_dokter;
                                dokterOption.text = dokterData[i].nama_dokter;
                                dokterDropdown.appendChild(dokterOption);
                            }
                        },
                        error: function() {
                            console.log('Terjadi kesalahan saat mengambil data dokter.');
                        }
                    });
                });
                // Memulai dengan opsi dokter awal yang dinonaktifkan
                dokterDropdown.innerHTML = initialDokterOptions;
                dokterDropdown.disabled = true;
            });

            //dropdown dokter
            $(document).ready(function() {
                $(".datepicker").datepicker({
                    // Konfigurasi datepicker
                });
                // Mendengarkan perubahan pada dropdown layanan
                $("#layanan_anda").on("change", function() {
                    var layananId = $(this).val();
                    // Mengecek jika layanan telah dipilih
                    if (layananId !== "") {
                        // Mengambil data dokter menggunakan AJAX
                        $.ajax({
                            url: "get_dokter.php",
                            type: "GET",
                            data: { layanan_id: layananId },
                            success: function(response) {
                                // Menghapus opsi dokter sebelumnya
                                $("#dokter_anda").empty();
                                // Menambahkan opsi dokter baru berdasarkan respons
                                response.forEach(function(dokter) {
                                    $("#dokter_anda").append('<option value="' + dokter.id_dokter + '">' + dokter.nama_dokter + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                            }
                        });
                    } else {
                        // Menghapus opsi dokter jika tidak ada layanan yang dipilih
                        $("#dokter_anda").empty();
                    }
                });
            });

            //close button
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
            <h2 class="form-title">Formulir Janji Temu</h2>
            <h5 align="center" style="font-size: 11px; font-family: calibri;"><i>Anda dapat membuat janji dengan dokter hewan kami sebelum datang ke Healthy Paws VetCare Clinic. Janji temu dapat dilakukan minimal 1 hari sebelum tanggal kunjungan yang direncanakan.</i></h5>

            <?php
            // Koneksi ke database MySQL
            include 'config.php';
            // Query untuk mendapatkan data nama hewan
            $query = "SELECT id_hewan, nama_hewan FROM hewan";
            $result = mysqli_query($conn, $query);
            // Array untuk menyimpan nama hewan
            $hewanArray = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Menyimpan nama hewan dalam array
                    $hewanArray[$row['id_hewan']] = $row['nama_hewan'];
                }
            }
            // Query untuk mendapatkan data layanan
            $query = "SELECT id_layanan, nama_layanan FROM layanan";
            $result = mysqli_query($conn, $query);
            // Array untuk menyimpan nama layanan
            $layananArray = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Menyimpan nama hewan dalam array
                    $layananArray[$row['id_layanan']] = $row['nama_layanan'];
                }
            }
            // Query untuk mendapatkan data layanan
            $query = "SELECT id_dokter, nama_dokter FROM dokter";
            $result = mysqli_query($conn, $query);
            // Array untuk menyimpan nama layanan
            $dokterArray = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Menyimpan nama hewan dalam array
                    $dokterArray[$row['id_dokter']] = $row['nama_dokter'];
                }
            }
            // Menutup koneksi database
            $conn->close();
            ?>
            <form method="POST" action="savedata.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="close-icon">
                  <i class="fas fa-chevron-left"></i>
                </div>
                <div class="drop-field">
                    <label for="hewan_anda">Pilih Hewan Anda:</label>
                    <select name="id_hewan" id="hewan_anda" required>
                        <option value="" disabled selected>Pilih hewan Anda</option>
                        <?php
                        // Menampilkan opsi nama hewan dalam dropdown
                        foreach ($hewanArray as $id_hewan => $nama_hewan) {
                            echo "<option value='$id_hewan'>$nama_hewan</option>";
                        }
                        ?>
                    </select>
                </div>
                <h5 align="left" style="font-size: 10px; font-family: calibri; color:red;"><i>Belum mendaftarkan hewan anda? </i><span class="daftar"><a href="create_formhewan.php">Klik di sini</a></span></h5>
                <div class="drop-field">
                    <label for="layanan_anda">Pilih Layanan:</label>
                    <select name="id_layanan" id="layanan_anda" required>
                        <option value="" disabled selected>Pilih layanan</option>
                        <?php
                        // Menampilkan opsi nama layanan dalam dropdown
                        foreach ($layananArray as $id_layanan => $nama_layanan) {
                            echo "<option value='$id_layanan'>$nama_layanan</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="drop-field">
                    <label for="dokter_anda">Pilih Dokter:</label>
                    <select name="id_dokter" id="dokter_anda" required>
                        <option value="" disabled selected>Pilih layanan terlebih dahulu</option>
                        <?php
                        // Menampilkan opsi nama layanan dalam dropdown
                        foreach ($dokterArray as $id_dokter => $nama_dokter) {
                            echo "<option value='$id_dokter'>$nama_dokter</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-field">
                    <label for="tanggal">Tanggal Periksa:</label>
                    <input type="text" name="tanggal_appointment" id="tanggal_appointment" class="datepicker" required>
                </div>
                <div class="form-field">
                    <label for="keluhan">Keluhan:</label>
                    <input type="text" name="keluhan" id="keluhan" placeholder="Masukkan keluhan hewan peliharaan Anda" required>
                </div>
                <div class="form-field">
                    <label for="file">Lampirkan Foto Pendukung Kondisi Hewan:</label>
                    <input type="file" name="file" id="file">
                </div>
                <div class="form-buttons">
                    <div class="button-wrapper">
                        <input type="submit" value="Buat Janji">
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