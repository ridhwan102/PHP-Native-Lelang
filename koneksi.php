<?php

// konfigurasi database
$hostdb     =   "localhost";
$userdb     =   "root";
$passworddb =   "";
$database   =   "lelangdb";
// perintah php untuk akses ke database
$db = mysqli_connect($hostdb, $userdb, $passworddb, $database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>