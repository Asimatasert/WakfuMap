<?php 
include("config.php");
$menu_komut=mysqli_query($baglan,"select * from map_menu");
while($menu_oku=mysqli_fetch_object($menu_komut))
{
	$menuadi=$menu_oku->adi;
	$group=meslekkontrol($menu_oku->groupid);
	echo 'var '.str_replace(" ","",$menuadi).' = L.icon({
	iconUrl:"img/'.$group.'/'.$menuadi.'.webp",
	iconSize:[20,20],
	iconAnchor:[10,10],
});
';
	echo "\n";
}
function meslekkontrol($meslek)
{
	$sira="";
	switch($meslek)
	{
		case 1: $sira="Farmer";
		break;
			case 2: $sira="Fisherman";
		break;
			case 3: $sira="Herbalist";
		break;
			case 4: $sira="Lumberjack";
		break;
			case 5: $sira="Miner";
		break;
			case 6: $sira="Trapper";
		break;
		default:$sira="";
	}
	return $sira;
}
?>