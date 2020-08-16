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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <style type="text/css">
        #targetOuter
        {
            position:relative;
            text-align: center;
            background-color: #F0E8E0;
            margin: 20px auto;
            width: 302px;
            height: 302px;
            border-radius: 4px;
        }

        .inputFile 
        {
            padding: 5px 0px;
            margin-top:8px; 
            background-color: #FFFFFF;
            overflow: hidden;
            opacity: 0;
            cursor:pointer;
        }

        .icon-choose-image {
            position: absolute;
            opacity: 0.5;
            top: 50%;
            left: 50%;
            margin-top: -24px;
            margin-left: -24px;
            width: 48px;
            height: 48px;
        }

        .upload-preview 
        {
            border-radius:4px;
            width: 300px;
            height: 300px;
        }
    </style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script type="text/javascript" src="jquery-3.5.0.min.js"></script>
</head>
<body>
<div class="w3-row-padding">
    <h1>Selamat datang <?php echo $nama; ?> di halaman penambahan</h1>
    <a href="home.php" class="w3-button w3-black">Home</a>
    <a href="logout.php" class="w3-button w3-black">Logout</a>
</div>
<br>
<div class="w3-container">
<div class="w3-row">
    <div class="w3-third w3-container">        
        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
        <div id="targetOuter">
            <div id="targetLayer"></div>
            <img src="photo.png"  class="icon-choose-image">
            <div class="icon-choose-image">
                <input name="userImage" id="userImage" type="file" class="inputFile" onChange="showPreview(this);">
            </div>
        </div>
    </div>
    <div class="w3-twothird w3-container">
            <br><br>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width: 200px;margin-top: -8px;">
                    <h4>Nama Barang :</h4>
                </div>
                <div class="w3-rest">
                    <input name="nama" id="nama" type="text" class="w3-input" required="" />
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width: 200px;margin-top: -8px;">
                    <h4>Harga Awal :</h4>
                </div>
                <div class="w3-rest">
                    <input name="harga" id="harga" type="number" min="100" step="100" class="w3-input" required="" />
                </div>
            </div>
            <br><br><br>
            <input type="submit" class="w3-button w3-block w3-black" value="Upload">
        </form>
    </div>
</div>
</div>

<!-- Script -->
<script type="text/javascript">
function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $("#targetLayer").html('<img src="'+e.target.result+'" width="200px" height="200px" class="upload-preview" />');
            $("#targetLayer").css('opacity','1');
            $(".icon-choose-image").css('opacity','0.1');
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
    }
}

$(document).ready(function (e) {
    $("#uploadForm").on('submit',(function(e) {
       
        e.preventDefault();

        $.ajax({
            url: "upload.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData:false,
            success: function(data)
            {
            $("#targetLayer").html(data);
            alert("Barang Berhasil Ditambahkan!");
            $(".icon-choose-image").css('opacity','0.7');
            $("#targetLayer").css('opacity','0.1');
            },
            error: function() 
            {
            }           
       });
    }));
});
</script>

</body>
</html>
<?php } ?>