<?php
include("../conig.php");
if($_POST)
{
	$kulsira=$_POST["kulsira"];
	$ad=$_POST["ad"];
	$soyad=$_POST["soyad"];
	
	mysqli_query($baglan,"update kullanici set ad=$ad,soyad=$soyad where sira=$kulsira");
	header("Location:../kullaniciayarlari.php");
}
else
{
	header("Location:../index.php");
}

?>