function epharitadagoster(xpos,ypos,ymeslek,ymahsul)
{
	var mashulsuliconyeni = L.icon({
iconUrl:'img/'+ymeslek+'/'+ymahsul+'.webp',
iconSize:[20,30],
iconAnchor:[10,10],
	});	 	
  map.removeLayer(marker);
  marker =L.marker([xpos,ypos],{
  draggable:true,
  icon:mashulsuliconyeni

}).addTo(map);

marker.bindPopup('Eklemiş olduğunuz'+' buraya kayıtlı.').openPopup();
marker.on('dragend',function(e){
 var coords = e.target.getLatLng();
 var lat = coords.lat;
 var lng = coords.lng;
document.getElementById("xcord").value =lat;
document.getElementById("ycord").value =lng;
marker.bindPopup('Kordinat alındı değiştirmek için tekrar sürükleyiniz.!').openPopup();


});
}

function epiletiiptal(div)
{
	//var total1=$('input[name=toplam]').val();
	//var yenitotal=parseInt(total1)-1;
	//$('input[name=toplam]').val(yenitotal);
	var divs="#kacincieklenilenpoint"+div;
	$(divs).remove();
}