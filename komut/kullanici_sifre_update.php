<?php
include("../config.php");
if($_POST)
{
	$kulsira=$_POST["kulsira"];
	$esifre=$_POST["esifre"];
	$ysifre=$_POST["ysifre"];
	$ysifre2=$_POST["ysifre2"];
	
	
	if($esifre!=""&&$ysifre!=""&&$ysifre2!="")
	{
		if($ysifre==$ysifre2)
		{
			$esifrekontrol=mysqli_query($baglan,"select * from kullanici where sira=$kulsira and kul_sifre=$esifre");
			if(mysqli_num_rows($esifrekontrol))
			{
				mysqli_query($baglan,"update kullanici set kul_sifre=$ysifre where sira=$kulsira");
				header("Location:../kullaniciayarlari.php");
			}
			else
			{
								header("Location:../kullaniciayarlari.php");
			}
		}
		else
		{
							header("Location:../kullaniciayarlari.php");
		}
	}
	else
	{
						header("Location:../kullaniciayarlari.php");
	}
}
else
{
	header("Location:../index.php");
}

?>