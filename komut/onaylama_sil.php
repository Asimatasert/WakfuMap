<?php 
include("../config.php");
if($_POST)
{
$sira=$_POST["sira"];
	mysqli_query($baglan,"delete from hkordinat where sira=$sira");
	header("Location:onaylanmamis.php");
}
else
{
	header("Location:../index.php");
}



?>