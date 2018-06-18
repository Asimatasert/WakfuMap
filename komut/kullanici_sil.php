<?php 
include("../config.php");
if($_POST)
{
	$kulsira=$_POST["kulsira"];

	mysqli_query($baglan,"delete from kullanici where sira=$kulsira");
	mysqli_query($baglan,"delete from hkordinat where gonderenkul=$kulsira");
	
	header("Location:../admin.php");
}
else
{
		header("Location:../index.php");

}

?>