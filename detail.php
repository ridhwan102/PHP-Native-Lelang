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
        $iditem = $_GET['iditem'];
        
        $sql = mysqli_query($db, "SELECT * FROM items WHERE iditem = $iditem ");
        $item = mysqli_fetch_array($sql);
        
        $sql2 = mysqli_query($db, "SELECT u.iduser, u.name, b.price_offer, b.is_winner, i.status FROM users u, biddings b, items i WHERE u.iduser = b.iduser AND b.iditem = i.iditem AND b.iditem=$iditem");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Item</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <div class="w3-row-padding">
    <h1>Selamat datang <?php echo $nama; ?> di halaman Detail</h1>
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
            <td>Harga Awal</td>
            <td>:</td>
            <td>Rp. <?php echo $item['price_initial'] ?></td>
          </tr>
          <tr>
            <td>Waktu Upload</td>
            <td>:</td>
            <td><?php echo $item['date_posting'] ?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td>:</td>
            <td><?php echo $item['status'] ?></td>
          </tr>
        </table>
    </div>
</div>

<h2>Daftar Bids</h2>
<table class="w3-table-all w3-centered">
    <tr>
      <th>Nama User</th>
      <th>Harga Penawaran</th>
      <th>Menang</th>
    </tr>

<?php 
  while ($users = mysqli_fetch_array($sql2)) { 
?>
    <tr>
      <td><?php echo $users['name'] ?></td>
      <td>Rp.<?php echo $users['price_offer'] ?></td>
<?php 
  if ($users['is_winner'] == 0 && $users['status'] == 'Open' ) {
?>
      <td><a class="w3-button w3-white" href="win.php?iditem='<?php echo $iditem ?>'&pembeli='<?php echo $users['iduser']?>'">Menangkan?</a></td>
<?php }
  else if ($users['is_winner'] == 1){ ?>
      <td><a class="w3-button w3-green">Menang</a></td>
<?php  } 
  else
  {?>
    <td>Barang Tidak Dapat di Bid</td>
<?php  }
}?>
</tr>
</table>
</div>
</body>
</html>
<?php } ?>