<?php 
include("../config.php");
$kulsira=$_POST["kulsira"];
$sira=1;
$kordinatkomut=mysqli_query($baglan,"select * from hkordinat where gonderenkul=$kulsira and onay=3");
while($okukordinat=mysqli_fetch_object($kordinatkomut))
{
	$menusira=$okukordinat->menu_sira;
	$kordinatsira=$okukordinat->sira;
	$menuoku=mysqli_fetch_object(mysqli_query($baglan,"select * from map_menu where sira=$menusira"));
	$mahsuladi=$menuoku->adi;
	$x=$okukordinat->x;
	$y=$okukordinat->y;
	$groupadi=meslekkontrol($menuoku->groupid);
	echo '<div id="kutu'.$kordinatsira.'"><div class="input-group smaller">
  <div class="input-group-prepend smaller">
    <span class="input-group-text smaller alert-success" id="cords"> <a href="#" onclick="epharitadagoster('.$x.','.$y.',&#39;'.$groupadi.'&#39;,&#39;'.$mahsuladi.'&#39;)"><img class="d-flex mr-3 rounded-circle" src="img/'.$groupadi.'/'.$mahsuladi.'.webp" alt=""></a> '.$sira.'. Mahsül : </span>
  </div>
  <input type="text" value="'.$mahsuladi.'" class="form-control smaller" placeholder="" disabled="true">
</div>

<div class="input-group smaller">
  <div class="input-group-prepend smaller">
    <span class="input-group-text smaller alert-success" id="cords"> Kordinat : </span>
  </div>
  <input type="text" id="xc" value="'.$x.'" class="form-control smaller" placeholder="X" disabled="true">
  <input type="text" id="yc" value="'.$y.'" class="form-control smaller" placeholder="Y" disabled="true">
</div>
<div class="input-group smaller">
  <div class="input-group-prepend smaller">
    <span class="input-group-text smaller alert-success">Açıklama : </span>
  </div>
  <input type="text" value="" name="aciklama'.$kordinatsira.'" class="form-control smaller" placeholder="Onaylamıyorsanız açıklama giriniz.">
</div>


<div class="btn-group btn-group-toggle smaller  btn-block" >
  <input type="radio" name="options'.$kordinatsira.'" value="1"  autocomplete="off" checked>Onayla
  <input type="radio" name="options'.$kordinatsira.'" value="0" autocomplete="off" >Onaylama

</div></div>';
	$sira++;
}
echo '<button type="submit" class="btn btn-primary btn-lg btn-block smaller">Onaylamak için gönder</button>';
echo '  <input type="text" id="xcord" value="" class="form-control smaller" placeholder="X" disabled="true" style="display:none;">
<input type="text" name="kullanici" value="'.$kulsira.'" style="display:none;">
  <input type="text" id="ycord" value="" class="form-control smaller" placeholder="Y" disabled="true" style="display:none;">';
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