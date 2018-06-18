<?php 
include("../config.php");

$aciklama=$_POST["aciklama"];
$kordinatsira=$_POST["kordinatsira"];

$onaylama=mysqli_query($baglan,"update hkordinat set onay=0,aciklama='$aciklama' where sira=$kordinatsira");




?>