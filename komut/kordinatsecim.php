<?php 
session_start();
include("../config.php");
$oturumacan=$_SESSION["sira"];
$kulsira=$_POST["kullanici"];

$kordinatkomut=mysqli_query($baglan,"select * from hkordinat where gonderenkul=$kulsira and onay=3");

while($okukordinat=mysqli_fetch_object($kordinatkomut))
{
	$sira=$okukordinat->sira;
	if(isset($_POST["options".$sira]))
	{
		if($_POST["options".$sira]==1)
		{
			mysqli_query($baglan,"update hkordinat set onay=1,yapi=$oturumacan where sira=$sira");
		}
		else
		{
			$aciklama=$_POST["aciklama".$sira];
			mysqli_query($baglan,"update hkordinat set onay=0,yapi=$oturumacan,aciklama='$aciklama' where sira=$sira");
		}
	}
}
header("Location:../moderetor.php");
?>