<?php 
include("../config.php");
if($_POST)
{
	$kulsira=$_POST["kulsira"];
	$yetki=$_POST["yetki"];
	mysqli_query($baglan,"update kullanici set yetki=$yetki where sira=$kulsira");
	header("Location:../admin.php");
}
else
{
		header("Location:../index.php");

}

?>