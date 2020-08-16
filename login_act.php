<?php
    session_start();
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['pass'];
    $passenkrip = crypt($password, 'kuncienkripsi');
    $query_check = mysqli_query($db, "SELECT * FROM users WHERE iduser = '$username' ");
    $query_fetch = mysqli_fetch_array($query_check);
    if(($username == $query_fetch['iduser']) && ($passenkrip == $query_fetch['password']))
    {
        $nama = $query_fetch['name'];
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $nama;

        //echo "<script>alert('Login Berhasil!');location='home.php'</script>";
        echo "<script>location='home.php'</script>";
    }
    else
    {
        echo "<script>location='login.php'</script>";
    }

?>