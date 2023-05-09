<?php

$host="localhost";
$user="root";
$password="";
$db="uts_2021320055_donairmanabila";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>