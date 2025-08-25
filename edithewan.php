<?php
include 'config.php';

if (!isset($_GET['id_hewan'])) {
    header('Location: create_formhewan.php');
    exit;
}
$hewanId = $_GET['id_hewan'];

$sql = "SELECT * FROM hewan WHERE id_hewan = $hewanId";
$result = $conn->query($sql);
$hewan = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_hewan = $_POST['nama_hewan'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $ras_hewan = $_POST['ras_hewan'];
    $warna = $_POST['warna'];
    // Proses unggah foto
    $fotoName = $_FILES['file']['name'];
    $fotoTmp = $_FILES['file']['tmp_name'];
    $fotoPath = 'hewan/' . $fotoName;
    if (!empty($fotoName)) {
        // Jika ada file yang diunggah, pindahkan dan simpan file baru
        $fotoPath = 'hewan/' . $fotoName;
        move_uploaded_file($fotoTmp, $fotoPath);
    } else {
        // Jika tidak ada file yang diunggah, gunakan foto yang ada sebelumnya
        $fotoPath = $hewan['nama_file'];
    }
    // Query untuk memperbarui data hewan
     $sql = "UPDATE hewan SET nama_hewan='$nama_hewan', jenis_hewan='$jenis_hewan', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', ras_hewan='$ras_hewan', warna='$warna', nama_file='$fotoPath' WHERE id_hewan='$hewanId'";
    if ($conn->query($sql) === TRUE) {
        header('Location: listhewan.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Hewan - HealthyPaws</title>
    <link rel="stylesheet" type="text/css" href="formhewan.css">
    <link rel="icon" href="logo.png">
    <!-- Import -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">    
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

            function validateForm() {
                var namaHewan = document.getElementById('nama_hewan').value;
                var jenisHewan = document.querySelector('input[name="jenis_hewan"]:checked');
                var rasHewan = document.getElementById('ras_hewan').value;
                var jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
                var warnaHewan = document.getElementById('warna').value;
                var file = document.getElementById('file').value;

                var alphabetRegex = /^[a-zA-Z\s]+$/;

                var isValid = true;


                if (jenisHewan === null) {
                    showPopup("Pilih salah satu jenis hewan");
                    isValid = false;
                }

                 if (jenisKelamin === null) {
                    showPopup("Pilih salah satu jenis kelamin");
                    isValid = false;
                }

                  if (!alphabetRegex.test(warnaHewan)) {
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
                        window.location.href = "listhewan.php";
                });
            });
        </script>
        <style>
            .container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background-color: white;
                border-radius: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                position: relative;
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
            }

            .form-field input[type="text"]:focus,
            .form-field input[type="tel"]:focus {
                background-color: #fff;
                box-shadow: 0 0 10px rgba(255, 105, 180, 0.8); /* Warna pink */
                animation: none !important;
            }

            .form-field input[type="radio"],
            .form-field input[type="checkbox"] {
                margin-right: 5px;
                color: black;
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

            .radio-button-wrapper input[type="radio"]:checked::before {
                border-color: black;
                background-color: black;
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

            .file-input-label {
                background-color: #2b3467;
                transition: background-color 0.3s ease;
                display: inline-block;
                padding: 10px 20px;
                color: #fff;
                font-size: 16px;
                font-weight: bold;
                border-radius: 4px;
                cursor: pointer;
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

            .fa-cat {
                color: #eb455f;
            }

            .fa-dog {
                color: #eb455f;
            }
            .fa-mars {
                color: #1f45fc;
            }
            .fa-venus {
                color: #ff007f;
            }

            .close-icon {
                position: absolute;
                top: 17px;
                right: 575px;
                font-size: 20px;
                color: #2b3467;
                cursor: pointer;
            }

            .close-icon:hover {
                color: #eb455f;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="form-title">Edit Data Hewan</h2>
            <form method="post" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="close-icon">
          <i class="fas fa-chevron-left"></i>
        </div>
                <div class="form-field">
                    <label for="nama_hewan">Nama Hewan:</label>
                    <input type="text" name="nama_hewan" id="nama_hewan" value="<?php echo $hewan['nama_hewan']; ?>" required>
                </div>
                <div class="form-field" >
                    <label>Jenis Hewan:</label>
                </div>
                <div class="form-field-jenis">
                    <div class="radio-button-wrapper">
                        <input type="radio" name="jenis_hewan" id="jenis_hewan_kucing" value="kucing" <?php echo ($hewan['jenis_hewan'] == 'kucing') ? 'checked' : ''; ?> required>
                        <label for="jenis_hewan_kucing">Kucing <i class="fa-sharp fa-solid fa-cat"></i></label>
                    </div>
                    <div class="radio-button-wrapper">
                        <input type="radio" name="jenis_hewan" id="jenis_hewan_anjing" value="anjing" <?php echo ($hewan['jenis_hewan'] == 'anjing') ? 'checked' : ''; ?> required>
                        <label for="jenis_hewan_anjing">Anjing <i class="fa-solid fa-dog"></i></label>
                    </div>
                </div>
                <div class="form-field">
                    <label for="ras_hewan">Ras Hewan:</label>
                    <input type="text" name="ras_hewan" id="ras_hewan" value="<?php echo $hewan['ras_hewan']; ?>" required>
                        <h5 align="left" style="font-size: 10px; font-family: calibri; color:red;"><i>contoh : persia, ragdoll, buldog, golden retriever</i></h5>
                </div>
                <div class="form-field">
                    <label for="tanggal">Tanggal Lahir:</label>
                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="datepicker" value="<?php echo $hewan['tanggal_lahir']; ?>" required>
                </div>
                <div class="form-field">
                    <label>Jenis Kelamin:</label>
                </div>
                <div class="form-field-jenis">
                    <div class="radio-button-wrapper">
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin_jantan" value="jantan" <?php echo ($hewan['jenis_kelamin'] == 'jantan') ? 'checked' : ''; ?> required>
                        <label for="jenis_kelamin_jantan">Jantan <i class="fa-solid fa-mars"></i></label>
                    </div>
                    <div class="radio-button-wrapper">
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin_betina" value="betina" <?php echo ($hewan['jenis_kelamin'] == 'betina') ? 'checked' : ''; ?> required>
                        <label for="jenis_kelamin_betina">Betina <i class="fa-solid fa-venus"></i></label>
                    </div>
                </div>
                <div class="form-field">
                    <label for="warna">Warna Hewan:</label>
                    <input type="text" name="warna" id="warna" value="<?php echo $hewan['nama_hewan']; ?>" required>
                </div>
                <div class="form-field">
                    <label for="file">Lampirkan Foto Hewan:</label>
                    <input type="file" name="file" id="file">
                    <?php if (!empty($hewan['nama_file'])) { ?>
                        <p>Foto saat ini: <a href="<?php echo $hewan['nama_file']; ?>" download><?php echo $hewan['nama_file']; ?></a></p>
                    <?php } else { ?>
                        <p> </p>
                    <?php } ?>
                </div>
                <div class="form-buttons">
                    <div class="button-wrapper">
                        <input type="submit" value="SIMPAN">
                    </div>
                </div>
            </form>
            <div id="popup" class="popup"></div>
        </div>
    </body>
</html>