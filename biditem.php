<?php
session_start();
include "koneksi.php";

$user = $_SESSION['username'];
$iditem = $_POST['iditem'];
$harga = $_POST['harga'];

$sql = mysqli_query($db, "INSERT INTO biddings VALUES ('$user', '$iditem', $harga, 0)");

if ($sql) {
    echo "<script>location='home.php';alert('Bid Berhasil')</script>";
}
else {
     echo "<script>alert('Bid Gagal');location='bidding.php?iditem=$iditem'</script>";
}
?>