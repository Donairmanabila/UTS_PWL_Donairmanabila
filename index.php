<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <br>
    <h4>Selamat Datang di Toko Laptop Donah</h4>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama id_jam
    if (isset($_GET['id_laptop'])) {
        $id_laptop=htmlspecialchars($_GET["id_laptop"]);

        $sql="delete from laptop where id_laptop='$id_laptop' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>Id Laptop</th>
            <th>Merk Laptop</th>
            <th>Spesifikasi</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from laptop order by id_laptop desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["merk"];   ?></td>
                <td><?php echo $data["spesifikasi"];   ?></td>
                <td><?php echo $data["harga"];   ?></td>
                 <td><?php echo $data["gambar"];   ?></td>
                
                <td>
                    <a href="update.php?id_laptop=<?php echo htmlspecialchars($data['id_laptop']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_laptop=<?php echo $data['id_laptop']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>
</body>
</html>