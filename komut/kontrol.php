<?php
session_start();
include("../config.php");
	$mail=$_POST["mail"];
	$sifre=$_POST["sifre"];

if($mail!=""&&$sifre!="")
{
	$kontrol=mysqli_query($baglan,"select * from kullanici where  mails='$mail' or kul_adi='$mail' and kul_sifre='$sifre'");
	if(mysqli_num_rows($kontrol))
	{
		$oku=mysqli_fetch_object($kontrol);
		$sira=$oku->sira;
		$yetki=$oku->yetki;
		$_SESSION["yetki"]=$yetki;
		$_SESSION["sira"]=$sira;
		$_SESSION["oturum"]=true;
		if($yetki==1)
		{
			echo "Giriş Yapılıyor";
			echo '<meta http-equiv="refresh" content="2;URL=admin.php">';
		}
		else if($yetki==2)
		{
			echo "Giriş Yapılıyor";
			echo '<meta http-equiv="refresh" content="2;URL=moderetor.php">';
		}
		else if($yetki==3)
		{
			echo "Giriş Yapılıyor";
			echo '<meta http-equiv="refresh" content="2;URL=yazar.php">';
		}
		else
		{
			echo "Giriş Yapılıyor";
			echo '<meta http-equiv="refresh" content="2;URL=map.php">';
		}
	}
	else
	{
		echo "Giriş Başarısız";
	}
}
else
{
	echo "Boş Bırakmayın";
}
?>