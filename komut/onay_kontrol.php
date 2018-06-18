<?php 
session_start();
include("../config.php");
$kortoplam=$_POST["toplam"];

for($a=0;$a<$kortoplam;$a++)
{
	if(isset($_POST["x".$a]))
	{
		$x=$_POST["x".$a];
		$y=$_POST["y".$a];
		$gonderen=$_SESSION["sira"];
		$menu=$_POST["menu".$a];
		$grup=meslekkontrol($_POST["group".$a]);
		$menukontrol=mysqli_query($baglan,"select * from map_menu where adi='$menu'");
		 if(mysqli_num_rows($menukontrol))
		{
			$okumenu=mysqli_fetch_object($menukontrol);
			$menusira=$okumenu->sira;
			$kordinatekle=mysqli_query($baglan,"insert into hkordinat(x,y,menu_sira,onay,aciklama,gonderenkul,yapi)values('$x','$y','$menusira','3','','$gonderen','0')");
		}
		else
		{
			$menuekle=mysqli_query($baglan,"insert into map_menu(adi,groupid)values('$menu','$grup')");
			$menuoku=mysqli_fetch_object(mysqli_query($baglan,"select * from map_menu where adi='$menu'"));
			$menusira=$menuoku->sira;
			$kordinatekle=mysqli_query($baglan,"insert into hkordinat(x,y,menu_sira,onay,aciklama,gonderenkul,yapi)values('$x','$y','$menusira','3','','$gonderen','0')");
		} 
	}
}
header("Location:../yazar.php");
function meslekkontrol($meslek)
{
	$sira=0;
	switch($meslek)
	{
		case "Farmer": $sira=1;
		break;
			case "Fisherman": $sira=2;
		break;
			case "Herbalist": $sira=3;
		break;
			case "Lumberjack": $sira=4;
		break;
			case "Miner": $sira=5;
		break;
			case "Trapper": $sira=6;
		break;
		default:$sira=0;
	}
	return $sira;
}
?>