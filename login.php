<?php
    session_start();
    include "koneksi.php";
?>

<!DOCTYPE html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <body>
        <header class="w3-container w3-black">
            <h1>Login</h1>
        </header>

        <div class="w3-container w3-display-middle w3-half w3-margin-top">
        <form method="POST" action="login_act.php" class="w3-container w3-card-4"><br/>
            <p>
            <input type="text" name="username" placeholder="Username" required="" class="w3-input">
            </p></br>
            <p>
            <input type="password" name="pass" placeholder="Password" required="" class="w3-input">
            </p></br>
            <div class="w3-bar">
            <input type="submit" name="login" value="Login" class="w3-button w3-black">
        </form>
        <a class="w3-button w3-black" href="register.php">Register</a>
        </div>
        </div>
        </body>
</head>
