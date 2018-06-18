<?php 
include("../config.php");

#-----------------------Değişkenler--------------------
if($_POST)
{
$x= $_POST["x"];
$y= $_POST["y"];
$group= $_POST["group"];
$menu= $_POST["menu"];

#------------------------------------------------------

$kontrolekle=mysqli_query($baglan,"select * from map_menu where adi='$menu' and groupid='$group'");;
if(!mysqli_num_rows($kontrolekle))
{
	$ekle=mysqli_query($baglan,"insert into map_menu(adi,groupid)values('$menu','$group')");
	$oku=mysqli_fetch_object(mysqli_query($baglan,"select * from map_menu group by sira DESC LIMIT 0,1"));
$menusira=$oku->sira;
}
else
{
  $okumenu=mysqli_fetch_object($kontrolekle);
	$menusira=$okumenu->sira;
}
$kordinat=mysqli_query($baglan,"insert into hkordinat(x,y,menu_sira)values('$x','$y','$menusira')");

header("Location:../admin.php");
}
else
{
	header("Location:../index.php");
}
?>