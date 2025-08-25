<?php
session_start();

include("config.php");

$username = $_POST['username'];
$password = $_POST['password'];

if ($username != '' && $password != '') {
    $sql = "SELECT * FROM customer WHERE username='$username' AND password='$password'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) < 1) {
        $_SESSION['message'] = "Maaf, Username atau Kata Sandi salah";
        header("location: form_login.php");
        exit();
    } else {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        setcookie("message", "", time() - 60);
        header("location: welcome.php");
        exit();
    }
} else {
    $_SESSION['message'] = "Username atau Kata Sandi kosong";
    header("location: form_login.php");
    exit();
}
?>