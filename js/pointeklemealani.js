function mahsuldeis()
{
var jmeslek=$("#meslek").val();
var jmahsul=$("#mahsul").val();
var jxcord=$("#xcord").val();
var jycord=$("#ycord").val();

  if (jmahsul == "Mahsül seçiniz.") 
  {

        $("#mahsul").removeClass("alert-success").addClass("alert-danger");
        $("#mahsul1").removeClass("alert-success").addClass("alert-danger");
  }
  else
  {
      
        $("#mahsul").removeClass("alert-danger").addClass("alert-success");
        $("#mahsul1").removeClass("alert-danger").addClass("alert-success");

      var mashul_icon = L.icon({
       iconUrl:'img/'+jmeslek+'/'+jmahsul+'.webp',
       iconSize:[20,30],
       iconAnchor:[10,10],
      });

      map.removeLayer(marker);
      marker =L.marker([jxcord,jycord],{
      draggable:true,
      icon:mashul_icon

}).addTo(map);
marker.bindPopup('<b style="color:blue;"><i>POİNTER</i></b><br>Kordinat almak için lütfen pointer i sürükleyip bırakınız.!').openPopup();
marker.on('dragend',function(e){
var coords = e.target.getLatLng();
var lat = coords.lat;
var lng = coords.lng;
document.getElementById("xcord").value =lat;
document.getElementById("ycord").value =lng;
document.getElementById("cords").className="input-group-text smaller alert-success"; 
marker.bindPopup('Kordinat alındı değiştirmek için tekrar sürükleyiniz.!').openPopup();

});
}
}



function pointekle() {
var jmeslek=$("#meslek").val();
var jmahsul=$("#mahsul").val();
var jxcord=$("#xcord").val();
var jycord=$("#ycord").val();
if (jmeslek == "Meslek seçiniz." || jmahsul == "Mahsül seçiniz." ||  jxcord == "" || jycord == "") 
{
  alert("Alanlardan hiçbirini boş bırakamazsınız.!");
}
else
{
var jmeslek=$("#meslek").val();
var jmahsul=$("#mahsul").val();
var jxcord=$("#xcord").val();
var jycord=$("#ycord").val();
$("#oke").append('<a class="list-group-item list-group-item-action"><div class="media"><img class="d-flex mr-3 rounded-circle" src="img/'+jmeslek+'/'+jmahsul+'.webp" alt=""><div class="media-body"><strong>'+jmahsul+'</strong> <br> <i id="cordpoint">'+jxcord+'<b>,</b>'+jycord+'</i><div class="text-muted smaller"><input type="button" class="btn btn-primary btn-sm alert-simple smaller" onclick="epharitadagoster()" value="Haritada Göster"><input type="button" class="btn btn-primary btn-sm alert-warning smaller" value="Bu iletiyi iptal et" onclick="epiletiiptal()"></div></div></div></a>');
jxcord="";
jycord="";
$("#cords").removeClass("alert-success").addClass("alert-danger");

var mashul_icon = L.icon({
iconUrl:'img/'+jmeslek+'/'+jmahsul+'.webp',
iconSize:[20,30],
iconAnchor:[10,10],
});

map.removeLayer(marker);
marker =L.marker([jxcord,jycord],{
draggable:true,
icon:mashul_icon

}).addTo(map);
marker.bindPopup('<b style="color:blue;"><i>POİNTER</i></b><br>Kordinat almak için lütfen pointer i sürükleyip bırakınız.!').openPopup();

marker.on('dragend',function(e){
 var coords = e.target.getLatLng();
 var lat = coords.lat;
 var lng = coords.lng;
document.getElementById("xcord").value =lat;
document.getElementById("ycord").value =lng;
document.getElementById("cords").className="input-group-text smaller alert-success"; 
marker.bindPopup('Kordinat alındı değiştirmek için tekrar sürükleyiniz.!').openPopup();
});
}
}