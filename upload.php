<?php
session_start();
include "koneksi.php";
$user = $_SESSION['username'];

if(is_array($_FILES)) 
{
    if(is_uploaded_file($_FILES['userImage']['tmp_name'])) 
    {
        //mengambil gambar dan ekstensinya
        $sourcePath = $_FILES['userImage']['tmp_name'];
        $x = explode('.', $_FILES['userImage']['name']);
        $ekstensi = strtolower(end($x));

        //mengambil nilai dari form di add.php
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $tanggal = date("Y-m-d h:i:sa");

        //memasukkan nilai ke database
        $sql = "INSERT INTO items VALUES ('', '$user', '$nama', '$tanggal' , $harga,'Open','$ekstensi')";
        $run = mysqli_query($db, $sql);

        //menyimpan gambar di folder 'gambar' dengan nama sesuai iditem jika insert berhasil
        if ($run)
        {
        $sql2 = "SELECT iditem FROM items WHERE iduser_owner = '$user' ORDER BY iditem DESC LIMIT 1";
        $image = mysqli_fetch_row(mysqli_query($db, $sql2));
        $targetPath = "gambar/".$image[0].'.'.$ekstensi;
        
        if(move_uploaded_file($sourcePath,$targetPath)) 
        {
?>
            <img src="<?php echo $targetPath; ?>" width="200px" height="200px" class="upload-preview" />
<?php 
        }
    }
    }
}
?>  