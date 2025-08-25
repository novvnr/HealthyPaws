<!DOCTYPE html>
<html>
    <head>
        <title>Registrasi Berhasil - HealthyPaws</title>
        <link rel="icon" href="logo.png">
        <style>
            * {
                font-family: "Poppins", sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: "Poppins", sans-serif;
                background-color: #fcffe7;
                display: flex;
                justify-content:center;
                align-items: center;
                min-height: 100vh;
            }

            .container {
                width: 100%;
                max-width: 380px;
                margin: 100px auto;
                background-color: #fff;
                padding: 20px 40px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                text-align: center;
            }

            .button {
                padding: 10px 20px;
                background-color: #eb455f;
                border: none;
                color: #fff;
                font-size: 16px;
                font-weight: bold;
                margin-top: 15px;
                cursor: pointer;
                border-radius: 4px;
            }

            .button:hover{
                background-color: #bad7e9;
                color: #000;
                transition: background-color 0.3s ease;
            }
        </style>
    </head>
    <body>
        <?php
        // Mengambil data dari formulir registrasi
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        // Validasi data
        $isValid = true;
        if (!preg_match('/^[a-zA-Z\s]+$/', $nama)) {
            echo "Isian nama belum sesuai.";
            $isValid = false;
        }

        if (!preg_match('/^[a-zA-Z\s]+$/', $username)) {
            echo "Isian username belum sesuai.";
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

        // Koneksi ke database MySQL
        $conn = new mysqli("localhost", "root", "", "db_healthypaws");

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Query SQL untuk menyimpan data ke dalam tabel customer
        $sql = "INSERT INTO customer (nama, username, password, email, alamat, no_telp, jenis_kelamin) VALUES ('$nama', '$username', '$password', '$email', '$alamat', '$no_telp', '$jenis_kelamin')";

        echo '<div class="container">';
        if ($conn->query($sql) === TRUE) {
            echo "<h2>Registrasi berhasil! Silakan Login</h2>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>

        <button onclick="goToProject()" class="button">KEMBALI</button>
        <script>
            function goToProject() {
                window.location.href = 'index.php';
            }
        </script>
    </body>
</html>