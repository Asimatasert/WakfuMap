<?php
$kuladi="root";
$sifre="";
$host="localhost";
$db="kordinat";

$baglan=mysqli_connect($host,$kuladi,$sifre)or die("Sunucuya Bağlanılmadı").mysqli_error();
$dbsec=mysqli_select_db($baglan,$db)or die("Veritabanına Bağlanılmadı").mysqli_error();

$baglan2=mysqli_connect($host,$kuladi,$sifre)or die("Sunucuya Bağlanılmadı").mysqli_error();
$dbsec2=mysqli_select_db($baglan2,$db)or die("Veritabanına Bağlanılmadı").mysqli_error();

mysqli_query($baglan,'SET NAMES UTF8');
?>