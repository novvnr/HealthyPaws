<?php
include("config.php");

// Memeriksa apakah pengguna telah login sebelum mengakses halaman ini
session_start();
if (!isset($_SESSION['username'])) {
    header("location: form_login.php");
    exit();
}

// Ambil data pelanggan yang login
$username = $_SESSION['username'];

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data yang diubah dari form
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Validasi data PHP
    $isValid = true;
    if (!preg_match('/^[a-zA-Z\s]+$/', $nama)) {
        echo "Isian nama belum sesuai.";
        $isValid = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Isian email belum sesuai.";
        $isValid = false;
    }

    if (!preg_match('/^[0-9]+$/', $no_telp)) {
        echo "Isian nomor telepon belum sesuai.";
        $isValid = false;
    }

    if (!$isValid) {
        exit;
    }

    // Upload foto
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fupload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fupload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fupload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" &&
        $imageFileType != "png" &&
        $imageFileType != "jpeg" &&
        $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        exit;
    }

    // if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["fupload"]["tmp_name"], $targetFile)) {
        echo "The file " . basename($_FILES["fupload"]["name"]) . " has been uploaded.";

        // Update data pelanggan
        $query = "UPDATE customer SET nama='$nama', password='$password',email='$email', alamat='$alamat', no_telp='$no_telp', jenis_kelamin='$jenis_kelamin', nama_file='$targetFile' WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect ke halaman profil dengan pesan sukses
         header("location: read.php");
            exit();
        } else {
            // Redirect ke halaman profil dengan pesan error
            header("location: read.php?message=Gagal memperbarui data");
            exit();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }
}

// Ambil data pelanggan dari database
$query = "SELECT username, nama, password, email, alamat, no_telp, jenis_kelamin, nama_file FROM customer WHERE username='$username' ORDER BY username ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title> Edit Profil - Healthy Paws </title>
    <meta charset="UTF-8">
    <title>Update Profil Pelanggan</title>
    <link rel="stylesheet" href="path_to_folder/updateprofile.css">
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" type="text/css" href="registrasistyle.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- CSS Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var nama = document.getElementById('nama').value;
            var email = document.getElementById('email').value;
            var no_telp = document.getElementById('no_telp').value;

            var alphabetRegex = /^[a-zA-Z\s]+$/;
            var emailRegex = /^\S+@\S+\.\S+$/;
            var numericRegex = /^[0-9]{12}$/;

            if (!alphabetRegex.test(nama)) {
                alert("Isian nama belum sesuai.");
                return false;
            }

            if (!emailRegex.test(email)) {
                alert("Isian email belum sesuai.");
                return false;
            }

            if (!numericRegex.test(no_telp)) {
                alert("Isian nomor telepon belum sesuai (harus 12 digit).");
                return false;
            }

            return true;
        }
    </script>
    <style>
        *{
                   font-family: "Poppins", sans-serif;
                  color:  #2b3467;
        }
        body {
  background-color: #f8f9fa;
}

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
.container {
        width: 600px ;
  margin-top: 5rem;
  border: 1px solid #dee2e6;
  border-radius: 0.5rem;
  background-color: #fff;
  padding: 1.5rem;
  margin-bottom: 5rem;

}

.header-title h1 {
  margin-bottom: 1rem;
}

.header-title hr {
  margin-top: 0;
  border-top: 2px solid #343a40;
}

.update-form .mb-3 {
  margin-bottom: 1.5rem;
}

.update-form label {
  font-weight: bold;
}

.update-form textarea {
  resize: none;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}

.form-control:focus {
  box-shadow: none;
}

.form-select {
  width: 100%;
  height: calc(2.25rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control {
  width: 96%;
 height: calc(2rem + 0.5px); 
padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
}

@media (min-width: 992px) {
  .container {
    max-width: 960px;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px;
  }
}
body{
    background-color: #fcffe7;
}


                 .btnsimpan  {
                padding: 10px 20px;
                background-color: #eb455f;
                border: none;
                color: #fff;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                border-radius: 4px;
            }
            button {
      background-color: #eb455f;
      color: #fcffe7;
      padding: 10px 25px;
      border: none;
      border-radius: 5px;
   font-family: "Poppins", sans-serif;
      margin-bottom: 10px;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.9);
    }
button:hover {
     background-color: #BAD7E9;
      cursor: pointer;
      color:#2b3467;
}
a:hover {
     background-color: #BAD7E9;
      cursor: pointer;
      color:#2b3467;
   
}


    </style>
</head>

<body>
<main>
    <div class="container" style="max-width: 680px;">
        <header class="header-title mb-4">
            <h1><span class="fw-normal text-dark">Edit Profil Anda</span></h1>
            <hr>
        </header>
        <section>
            <form class="update-form" method="POST" action="updateprofile.php" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                      <br>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                      <br>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $data['password']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <br>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                      <br>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $data['alamat']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                      <br>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $data['no_telp']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" <?php if ($data['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fupload" class="form-label">Foto profile</label>
                    <br>
                    <input name="fupload" type="file" id="fupload">
                </div>
                <button type="submit" class="btnsimpan">Simpan</button>
                <a href="read.php" style="text-decoration: none;" class="btnsimpan">Kembali</a>


            </form>
        </section>
    </div>
 </main>
</body>

</html>