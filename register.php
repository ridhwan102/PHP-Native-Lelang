<?php
    session_start();
    include "koneksi.php";
?>

<!DOCTYPE html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <header class="w3-container w3-black">
            <h1>Register</h1>
        </header>

        <div class="w3-container w3-display-middle w3-half w3-margin-top">
        <form method="POST" action="register_act.php" class="w3-container w3-card-4"><br>
            <p>
            <input type="text" name="username" placeholder="Username" required="" class="w3-input">
            </p><br>

            <p>
            <input type="text" name="nama" placeholder="Nama anda" required="" class="w3-input">
            </p><br>

            <p>
            <input type="password" name="pass" placeholder="Password" required="" class="w3-input">
            </p><br>

            <div class="w3-bar">
            <input type="submit" name="register" value="Register" class="w3-button w3-black">
        </form>
        <a class="w3-button w3-black" href="login.php">Login</a>
        </div></div>
        </body>
</head>
