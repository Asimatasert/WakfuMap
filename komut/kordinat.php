<?php
include("config.php");

$kordinat=mysqli_query($baglan,"select * from hkordinat where onay=1");
while($okukordinat=mysqli_fetch_object($kordinat))
{
	$menusira=$okukordinat->menu_sira;
	$menuokus=mysqli_fetch_object(mysqli_query($baglan,"select * from map_menu where sira=$menusira"));
	$menuadis=$menuokus->adi;
	$menuadis=str_replace(" ","",$menuadis);
	$s=$okukordinat->sira;
	$x=$okukordinat->x;
	$y=$okukordinat->y;
	echo "var KOR$s = L.marker([$x,$y],{icon:".$menuadis."});";echo "\n";
}

?>