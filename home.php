<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION)
    {
        echo "<script>window.location='login.php'</script>";
    }

    else {
        $user = $_SESSION['username'];
        $nama = $_SESSION['nama'];
        //Jumlah data dalam satu halaman
        $jumlahdata = 10;
        $halaman =isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai =($halaman>1) ? ($halaman * $jumlahdata) - $jumlahdata : 0;

        $hitung = mysqli_query($db, "SELECT * FROM items");
        $total = mysqli_num_rows($hitung);
        $pages = ceil($total/$jumlahdata);
        $sql = mysqli_query($db, "SELECT * FROM items ORDER BY iditem DESC LIMIT $mulai, $jumlahdata ");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <body>
        <div class="w3-row-padding">
            <h1>Selamat datang <?php echo $nama; ?> di halaman utama lelang</h1>
            
            <a href="add.php" class="w3-button w3-black">Add Item</a>
            <a href="logout.php" class="w3-button w3-black">Logout</a>

            <div class="w3-row-padding" style="padding: 20px">

            <!-- menampilkan isi tabel items -->
            <?php            
            while ($items = mysqli_fetch_array($sql)) {
                ?>

            <div class="w3-col s2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin: 20px;">
                <img src="gambar/<?php echo $items['iditem'].'.'.$items['image_extention'] ?>" style="height: 200px;width: 200px;">
                <h2><?php echo $items['name'] ?></h2>
            
            <?php 
                $idpenjual = $items['iduser_owner'];
                $cek = mysqli_query($db, "SELECT name FROM users WHERE iduser = '$idpenjual' ");
                $ceknama = mysqli_fetch_array($cek);
                $iditem = $items['iditem'];
                $namapenjual = $ceknama['name'];
                $ceksudahbeli = mysqli_query($db, "SELECT * FROM biddings a, items b WHERE a.iditem = b.iditem  AND a.iduser= '$user' AND a.iditem='$iditem'");
                $runceksudahbeli = mysqli_fetch_array($ceksudahbeli);
            ?>
                <p><?php echo $namapenjual ?></p>
                <p><?php echo $items['price_initial'] ?></p>
                <p><?php echo $items['status'] ?></p>

            <?php
            //jika barangnya sendiri maka tombol yg ditampilkan berbeda
                if ($user == $idpenjual && $items['status'] == 'Open') { ?>
                    <div class="w3-bar">
                <a class="w3-button w3-black" href="detail.php?iditem='<?php echo $items['iditem']?>'">Detail</a>
                <a class="w3-button w3-red" href="cancel.php?iditem='<?php echo $items['iditem']?>'">Cancel</a>
                </div>
            <?php }
                else if ($user == $idpenjual && $items['status'] != 'Open') {
                    ?>
                    <a class="w3-button w3-block w3-black" href="detail.php?iditem='<?php echo $items['iditem']?>'">Detail</a>
                    <?php
                }

                else {
                    if ($items['status'] == 'Open' && !$runceksudahbeli) {
            ?>
                <a class="w3-button w3-block w3-black" href="bidding.php?iditem='<?php echo $items['iditem']?>'">Bid Item</a>
            <?php } 
                else { ?>
                <button class="w3-button w3-block w3-black" disabled>Bid Item</button>
            <?php }
            }
                ?>
            </div>

        <?php } ?>
        </div>
        <div class="w3-center">
        <div class="w3-bar">
            <a href="home.php?halaman=1" class="w3-bar-item w3-button">&laquo;</a>
        <?php
            for ($i=1; $i<=$pages ; $i++){
                if ($halaman == $i) {
        ?>
            <a href="home.php?halaman=<?php echo $i; ?>" class="w3-button w3-black"><?php echo $i; ?></a>
        <?php }
                else { ?>
            <a href="home.php?halaman=<?php echo $i; ?>" class="w3-button"><?php echo $i; ?></a>
               <?php }
            }
        ?>
        <a href="home.php?halaman=<?php echo $pages; ?>" class="w3-button">&raquo;</a>
    </div></div>
</div>
    </body>
</html>
<?php } ?>