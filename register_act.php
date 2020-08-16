<?php
    session_start();
    include "koneksi.php";

    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['pass'];
    $passenkrip = crypt($password, 'kuncienkripsi');

    $query_check = mysqli_query($db, "SELECT * FROM users WHERE iduser = '$username' ");
    $query_fetch = mysqli_fetch_array($query_check);

    if($username == $query_fetch['iduser'])
    {
        echo "<script>alert('Username Sudah Digunakan');location='register.php'</script>";
    }
    else
    {
        $sql = mysqli_query($db, "INSERT INTO users VALUES ('$username', '$nama','$passenkrip')");
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $nama;
        echo "<script>alert('Selamat Anda Sudah Terdaftar');location='home.php'</script>";
    }

?>