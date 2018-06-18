<?php 
include("config.php");

$group=mysqli_query($baglan,"select * from map_group");
$a=1;
while($okugroup=mysqli_fetch_object($group))
{
	$resimurl=$okugroup->resim_url;
	echo "
	.leaflet-bar a,
.leaflet-control-layers-toggle$a {
	background-position: 50% 50%;
	background-repeat: no-repeat;
	display: block;
	}
	.leaflet-control-layers-toggle$a {
	background-image: url($resimurl);
	width: 36px;
	height: 36px;
	}
.leaflet-retina .leaflet-control-layers-toggle$a {
	background-image: url($resimurl);
	background-size: 26px 26px;
	}
.leaflet-touch .leaflet-control-layers-toggle$a {
	width: 36px;
	height: 36px;
	}
.leaflet-control-layers .leaflet-control-layers-list,
.leaflet-control-layers-expanded .leaflet-control-layers-toggle$a {
	display: none;
	}";
	$a++;
}

?>