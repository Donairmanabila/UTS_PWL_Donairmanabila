<!DOCTYPE html>
<html>
<head>
    <title>Form Update Data Laptop</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_laptop'])) {
        $id_laptop=input($_GET["id_laptop"]);

        $sql="select * from laptop where id_laptop=$id_laptop";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_laptop=htmlspecialchars($_POST["id_laptop"]);
        $merk=input($_POST["merk"]);
        $spesifikasi=input($_POST["spesifikasi"]);
        $harga=input($_POST["harga"]);
        $gambar=input($_POST["gambar"]);
       

        //Query update data pada tabel anggota
        $sql="update laptop set merk='$merk', spesifikasi='$spesifikasi', harga='$harga', gambar='$gambar', where id_laptop=;$id_laptop";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data Laptop</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    
        <div class="form-group">
            <label>Merk Laptop:</label>
            <input type="text" name="merk" class="form-control" value="<?php echo $data['merk']; ?>" placeholder="Masukkan Merk" required/>

        </div>
        <div class="form-group">
            <label>Spesifikasi:</label>
            <textarea name="spesifikasi" class="form-control" rows="5" placeholder="Masukkan Spesifikasi" required><?php echo $data['spesifikasi']; ?></textarea>

        </div>
        <div class="form-group">
            <label>Harga :</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" placeholder="Masukkan Harga" required/>
        </div>
        </div>
        <div class="form-group">
            <label>Gambar :</label>
            <input type="file" name="gambar" class="form-control-file"
            

        <input type="hidden" name="id_laptop" value="<?php echo $data['id_laptop']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>