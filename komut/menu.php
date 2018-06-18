

<?php 

include("config.php");

$menu=mysqli_query($baglan,"select * from map_menu");

while($menuoku=mysqli_fetch_object($menu))
{
	$s=0;
	$menusira=$menuoku->sira;
	$menus=mysqli_query($baglan,"SELECT * from hkordinat WHERE menu_sira=$menusira and onay=1");
	while($okukordinat=mysqli_fetch_object($menus))
	{
		
		$menuz[$menusira][$s]="KOR$okukordinat->sira";
		$s++;
	}	
}

$kontrol=mysqli_query($baglan,"select * from map_menu");
while($kontrolmenu=mysqli_fetch_object($kontrol))
{
	$menusi=$kontrolmenu->sira;
	if(isset($menuz[$menusi][0]))
	{
		$dizisayisi=count($menuz[$menusi]);
		echo "var menu$menusi = L.layerGroup([";
			for($i=0;$i<$dizisayisi;$i++)
			{
				
				echo $menuz[$menusi][$i];
				if($dizisayisi-1>$i)
				{
					echo ",";
				}
				
			}
		echo "]);"; echo "\n";
	}
}


$group=mysqli_query($baglan,"select * from map_group");

while($groupoku=mysqli_fetch_object($group))
{
	 $grid=$groupoku->sira;
	$kontrolva=mysqli_query($baglan,"select * from map_menu where groupid=$grid");
	if(mysqli_num_rows($kontrolva))
	{
	$g=0;
	$menugoster=mysqli_query($baglan,"select * from map_menu");
	$groupid=$groupoku->sira;
	echo "\nvar overlays$groupid ={ \n";
	while($menugosteroku=mysqli_fetch_object($menugoster))
	{
		
		$menusiw=$menugosteroku->sira;
		$bagligroup=$menugosteroku->groupid;
		if($bagligroup==$groupid)
		{
			$kordinat=mysqli_query($baglan,"select * from hkordinat where menu_sira=$menusiw and onay=1");
			if(mysqli_num_rows($kordinat))
			{
				$g=1;
			}
			
		if(isset($menuz[$menusiw][0]))
		{
		echo '"'.$menugosteroku->adi.'" : menu'.$menugosteroku->sira.','; echo "\n";
		}
		}
	}
	
	echo "}";
	if($g==1)
	{echo "\n \n"; echo "L.control.layers(null,overlays$groupid).addTo(map); \n";}
	
	}
}
?>


