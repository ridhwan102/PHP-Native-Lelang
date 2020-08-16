<?php
session_start();
include "koneksi.php";
    if (!$_SESSION)
    {
        echo "<script>window.location='login.php'</script>";
    }

    else {
        $user = $_SESSION['username'];
        $nama = $_SESSION['nama'];
        $iditem = $_GET['iditem'];;
        $sql = mysqli_query($db, "SELECT * FROM items WHERE iditem = $iditem ");
        $item = mysqli_fetch_array($sql);
        $idpenjual = $item['iduser_owner'];
        $cek = mysqli_query($db, "SELECT name FROM users WHERE iduser = '$idpenjual' ");
        $ceknama = mysqli_fetch_array($cek);
        $namapenjual = $ceknama['name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bid Item</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-row-padding">
    <h1>Selamat datang <?php echo $nama; ?> di halaman Bidding</h1>
    <a href="home.php" class="w3-button w3-black">Home</a>
    <a href="logout.php" class="w3-button w3-black">Logout</a>
</div>
<br>
<div class="w3-container">
<div class="w3-row">
    <div class="w3-third w3-container">
        <img src="gambar/<?php echo $item['iditem'].'.'.$item['image_extention'] ?>" style="width: 300px">
    </div>
    <div class="w3-twothird w3-container">
        <h2><?php echo $item['name'] ?></h2>
        <table>
          <tr>
            <td>Nama Penjual</td>
            <td>:</td>
            <td><?php echo $namapenjual ?></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td>:</td>
            <td>Rp. <?php echo $item['price_initial'] ?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td>:</td>
            <td><?php echo $item['status'] ?></td>
          </tr>
        </table>
        <form action="biditem.php" method="post">
            <label>Masukkan Harga Penawaranmu</label>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width: 30px;margin-top: -8px;">
                    <h4>Rp.</h4>
                </div>
                <div class="w3-rest">
                    <input name="harga" class="w3-input" type="number" min="<?php echo $item['price_initial']+100 ?>" step="100" value="<?php echo $item['price_initial']+100 ?>" required>
                </div>
                <input type="hidden" name="iditem" value="<?php echo $item['iditem']?>">
            </div>
            <input type="submit" name="submit" value="Bid Item" class="w3-button w3-block w3-black">
        </form>
    </div>
</div>
</div>
</body>
</html>
<?php } ?>