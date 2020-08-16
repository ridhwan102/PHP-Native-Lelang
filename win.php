<?php
include "koneksi.php";
session_start();
$iditem = $_GET['iditem'];
$stritem = trim($iditem,"'");
echo $stritem;
$pembeli = $_GET['pembeli'];

$sql = mysqli_query($db, "UPDATE items SET status = 'Sold' WHERE iditem = $stritem ");
$sql2 = mysqli_query($db, "UPDATE biddings SET is_winner = 1 WHERE iditem = $stritem AND iduser = $pembeli");

if ($sql && $sql2) {
    echo "<script>location='detail.php?iditem=$stritem';alert('Update Berhasil')</script>";
}
else {
     echo "<script>location='detail.php?iditem=$stritem';alert('Update Gagal')</script>";
}
?>