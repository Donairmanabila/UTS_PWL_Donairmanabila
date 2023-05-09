<!DOCTYPE html>
<html>
<head>
    <title>Form Toko Laptop Donah </title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $merk=input($_POST["merk"]);
        $spesifikasi=input($_POST["spesifikasi"]);
        $harga=input($_POST["harga"]);
        $gambar=input($POST["gambar"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into laptop (merk,spesifikasi,harga,gambar) values
		('$merk','$spesifikasi','$harga'),'$gambar'";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data Laptop</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    
        <div class="form-group">
            <label>Merk Laptop:</label>
            <input type="text" name="merk" class="form-control" placeholder="Masukkan Merk" required/>

        </div>
        <div class="form-group">
            <label>Spesifikasi:</label>
            <textarea name="spesifikasi" class="form-control" rows="5"placeholder="Masukkan Spesifikasi" required></textarea>

        </div>
        <div class="form-group">
            <label>Harga Laptop:</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga" required/>
        </div>
        <div class="form-group">
            <label>Gambar:</label>
            <input type="file" name="gambar" class="form-control-file" placeholder="Masukkan Gambar" required/>
        </div>   
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>