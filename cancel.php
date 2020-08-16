<?php
include "koneksi.php";
session_start();
$iditem = $_GET['iditem'];
$sql = mysqli_query($db, "UPDATE items SET status = 'Cancel' WHERE iditem = $iditem ");

if ($sql) {
    echo "<script>location='home.php';alert('Cancel Berhasil')</script>";
}
else {
     echo "<script>alert('Cancel Gagal');location='home.php'</script>";
}
?>