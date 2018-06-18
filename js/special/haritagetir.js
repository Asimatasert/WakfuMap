 //HARİTAYI FİXLEME KORDİNATLARI
 var mapSW = [1000,7192],
  mapNE = [7192,1000];

//HARİTAYOLU TANIPLAMA VE .addTo(map) İLE ALANA DAHİL ETME
var map=L.map('map').setView([0,0],1);             
L.tileLayer('maps/sadidakingdom/{z}/{x}/{y}.png',{
  minZoom:3,
  maxZoom:5,
  continuousWorld: false,
  noWrap:true,
  crs:L.CRS.Simple
}).addTo(map);0

//HARİTAYI FİXLE
map.setMaxBounds(new L.LatLngBounds(          
 map.unproject(mapSW, map.getMaxZoom()),
 map.unproject(mapNE, map.getMaxZoom())
  ));

//ÖZEL MARKER İCONU OLUŞTURMA
var m_pointer = L.icon({
  iconUrl:'images/pointer.png',
  iconSize:[20,30],
  iconAnchor:[10,10],
});

//MARKER OLUŞTURMA
var marker =L.marker([0,0],{
  draggable:true,
  icon:m_pointer

}).addTo(map);
marker.bindPopup('<b style="color:blue;"><i>POİNTER</i></b><br>Kordinat almak için lütfen pointer i sürükleyip bırakınız.!').openPopup();

//MARKER DRAGEND OLAYINDA YAPILACAKLAR


  
marker.on('dragend',function(e){
 var coords = e.target.getLatLng();
 var lat = coords.lat;
 var lng = coords.lng;
document.getElementById("xcord").value =lat;
document.getElementById("ycord").value =lng;
document.getElementById("cords").className="input-group-text smaller alert-success"; 
marker.bindPopup('Kordinat alındı değiştirmek için tekrar sürükleyiniz.!').openPopup();


});