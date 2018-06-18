<!DOCTYPE html>
<html>
<head>
	<title>Wakfu Map</title>

<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="special.css">
<script src="leaflet.js"></script>
<style>
	<?php include("komut/stil.php"); ?>
	</style>

</head>
<body>
<div id="map" ></div>


<script type="text/javascript">

var mapSW = [0,8192],
	mapNE = [8192,0];


var map=L.map('map').setView([0,0],1); 
L.tileLayer('maps/sadidakingdom/{z}/{x}/{y}.png',{
	minZoom:1,
	maxZoom:5,
	continuousWorld: false,
	noWrap:true,
	crs:L.CRS.Simple,
}).addTo(map);0

map.setMaxBounds(new L.LatLngBounds(
 map.unproject(mapSW, map.getMaxZoom()),
  map.unproject(mapNE, map.getMaxZoom())
	)); 


var myIcon = L.icon({
	iconUrl:'images/clock.png',
	iconSize:[38,95],
	iconAnchor:[22,94],
	popupAnchor:[3,76],
	shadowUrl:'images/clock.png',
	shadowSize:[68,95],
	shadowAnchor:[22,94]

});

<?php include("iconpointer.php"); ?>



var marker =L.marker([15,100],{
	draggable:true,

});
marker.bindPopup('').openPopup();

//CORD MARKER
<?php include("kordinat.php"); ?>
	



marker.on('dragend',function(e){
	alert(marker.getLatLng().toString());
	//marker.getPopup().setContent('Clicked' + marker.getLatLng().toString()).openOn(map);
	//marker.getPopup().setContent('Clicked ' + marker.getLatLng().toString() + ' <br/> ' + ' Pixels ' + map.project(marker.getLatLng(),map.getMaxZoom().toString())).openOn(map);

	
});
 

<?php include("menu.php"); ?>







</script>
</body>
</html>