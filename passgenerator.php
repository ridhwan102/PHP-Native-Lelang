<?php

$password = 'pass';


$passenkrip = crypt($password, 'kuncienkripsi');
echo 'password asli :  '.$password .'<br>'. 'hasil enkripsi :  '.$passenkrip;
?>