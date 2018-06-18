function  mahsulgoster()
{
var jmeslek=$("#meslek").val();
//var jmahsul=$("#mahsul").val();

    $("#meslek").removeClass("alert-danger").addClass("alert-success");
    $("#meslek1").removeClass("alert-danger").addClass("alert-success");
    $("#MAHSULLERIAL").empty();

    if (jmeslek=="Meslek seçiniz.")
     {
        $("#meslek").removeClass("alert-success").addClass("alert-danger");
        $("#meslek1").removeClass("alert-success").addClass("alert-danger");
     }
     else if (jmeslek=="Farmer") 
     {
       $("#MAHSULLERIAL").append('<div class="input-group smaller" >  <div class="input-group-prepend smaller">    <span class="input-group-text smaller alert-danger" id="mahsul1">Mahsül  : </span>  </div>  <select class="form-control form-control-sm smaller alert-danger" id="mahsul" onchange="mahsuldeis()"><option>Mahsül seçiniz.</option><option>Wheat</option><option>Artichoke</option><option>Tuberbulb</option><option>Barley</option><option>Cawwot Plant</option><option>Babbage Plant</option><option>Oats</option><option>Melon</option><option>Rye</option><option>Mottled Mushroom</option><option>Vanilla Rice</option><option>Golden Makoffee</option><option>Watermelon</option><option>Corn</option><option>Beans</option><option>Desert Truffle</option><option>Mushray</option><option>Black Cawwot Plant</option><option>Jollyflower</option><option>Sunflower</option><option>Strawberry</option><option>Pumpkin</option><option>Maniok</option><option>Palm Rod</option><option>Sweat Jute</option><option>Chili</option></select></div>');
     }
     else if (jmeslek=="Fisherman") 
     {
       $("#MAHSULLERIAL").append('<div class="input-group smaller" >  <div class="input-group-prepend smaller">    <span class="input-group-text smaller alert-danger" id="mahsul1">Mahsül  : </span>  </div>  <select class="form-control form-control-sm smaller alert-danger" id="mahsul" onchange="mahsuldeis()"><option>Mahsül seçiniz.</option><option> Shoal of Breaded Fish </option><option> Tiny Sea Fish </option><option> Shoal of Bow Meow Fish </option><option> Shoal of Sturgeon </option><option> Shoal of Crabby Anchovies </option><option> Shoal of Grawns </option><option> Shoal of Loots </option><option> Shoal of Hairy Rays </option><option> Shoal of Salamon </option><option> Shoal of Moonfish </option><option> Shoal of Perch </option><option> Shoal of Dragocarp </option><option> Shoal of Maskerel </option><option> Little Fish </option><option> Shoal of Grawfish </option><option> Shoal of Chehorses </option><option> Shoal of Eels </option><option> Shoal of Scincus </option><option> Shoal of Hydawheys </option><option> Shoal of Piri Pirhianas </option><option> Shoal of Troutuna </option><option> Kamasandre </option><option> Seacod </option><option> Shoal of Sea Boowolves </option><option> Shoal of Knemo </option><option> Troubled Waters </option><option> Fish Bone </option><option> Salamander </option></select></div>');
     }
     else if (jmeslek=="Herbalist") 
     {
       $("#MAHSULLERIAL").append('<div class="input-group smaller" >  <div class="input-group-prepend smaller">    <span class="input-group-text smaller alert-danger" id="mahsul1">Mahsül  : </span>  </div>  <select class="form-control form-control-sm smaller alert-danger" id="mahsul" onchange="mahsuldeis()"><option>Mahsül seçiniz.</option><option> Crowned Thistle </option><option> Crozolily </option><option> Plain Flax </option><option> Ditsy Flower </option><option> Wild Mint </option><option> Scented Clover </option><option> Orchid </option><option> Fuzzy Fern </option><option> Dendron </option><option> Gorsegoyle </option><option> Reed Stem </option><option> Nostril Algae </option><option> Funkus </option><option> Ayawilsea </option><option> Cotton </option><option> Edelweiss </option><option> Puffball </option><option> Aloa Vera </option><option> Venutian </option><option> Nodincludid </option><option> Kamamile </option><option> Eterny </option><option> Volcanic Plant </option><option> Death Cap </option><option> Tahitiare </option><option> Grace </option><option> Nettles </option><option> Momoss </option><option> Saintly Cotton </option></select></div>');
     }
     else if (jmeslek=="Lumberjack") 
     {
       $("#MAHSULLERIAL").append('<div class="input-group smaller" >  <div class="input-group-prepend smaller">    <span class="input-group-text smaller alert-danger" id="mahsul1">Mahsül  : </span>  </div>  <select class="form-control form-control-sm smaller alert-danger" id="mahsul" onchange="mahsuldeis()"><option>Mahsül seçiniz.</option><option> Ash</option><option> Cedar </option><option> Hazel Tree </option><option> Chestnut Tree </option><option> Api Tree </option><option> Birch </option><option> Boabob </option><option> Weeping Willow </option><option> Charm </option><option> Ancestral Pine </option><option> Baby Redwood </option><option> Pooplar </option><option> Citronana Tree </option><option> Tadbole </option><option> Creeping Vine </option><option> Frozen Wood </option><option> Yew </option><option> Cactus </option><option> Mosscandel </option><option> Marmalot </option><option> Cherry Tree </option><option> Sylvan Pine </option><option> Dry Pine </option><option> Blood Elderberry </option><option> Divi Divi </option><option> Kokonut </option><option> Mahogany </option><option> Bramble </option></select></div>');
     }
     else if (jmeslek=="Miner") 
     {
       $("#MAHSULLERIAL").append('<div class="input-group smaller" >  <div class="input-group-prepend smaller">    <span class="input-group-text smaller alert-danger" id="mahsul1">Mahsül  : </span>  </div>  <select class="form-control form-control-sm smaller alert-danger" id="mahsul" onchange="mahsuldeis()"><option>Mahsül seçiniz.</option><option> Primitive Iron </option><option> Finest Sea Salt </option><option> Classic Coal </option><option> Bright Copper </option><option> Shadowy Cobalt </option><option> Bronze Nugget </option><option> Precious Stones </option><option> Shard of Flint </option><option> Rugged Quartz </option><option> Grievous Kroomium </option><option> Wholesome Zinc </option><option> Koral </option><option> Blood Red Amethyst </option><option> Double Carat Sapphire </option><option> Taroudium </option><option> Hazy Lead </option><option> Sandy Ore </option><option> Black Gold Ore </option><option> Mythwil </option><option> Royal Bauxite Ore </option><option> Sovereign Titanium Ore </option><option> Sryanide Ore </option><option> Dark Carbon </option><option> Amber </option><option> Mercury </option><option> Silver </option><option> Obsidian </option></select></div>');
     }
     else if (jmeslek=="Trapper") 
     {
       $("#MAHSULLERIAL").append('<div class="input-group smaller" >  <div class="input-group-prepend smaller">    <span class="input-group-text smaller alert-danger" id="mahsul1">Mahsül  : </span>  </div>  <select class="form-control form-control-sm smaller alert-danger" id="mahsul" onchange="mahsuldeis()"><option>Mahsül seçiniz.</option><option>THİS PROFFESİON CROPS NOT AVAIBLE JUST FOR NOW!</option></select></div>');
     }

}

function mahsuldeis()
{
var jmeslek=$("#meslek").val();
var jmahsul=$("#mahsul").val();
var jxcord=$("#xcord").val();
var jycord=$("#ycord").val();

  if (document.getElementById("mahsul").value == "Mahsül seçiniz.") 
  {
      document.getElementById("mahsul").className="form-control form-control-sm smaller alert-danger"; 
      document.getElementById("mahsul1").className="input-group-text smaller alert-danger"; 
  }
  else
  {
      document.getElementById("mahsul").className="form-control form-control-sm smaller alert-success";
      document.getElementById("mahsul1").className="input-group-text smaller alert-success";

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


var deger =0;

function pointekle() {

if (document.getElementById("meslek").value == "Meslek seçiniz." || document.getElementById("mahsul").value == "Mahsül seçiniz." ||  document.getElementById("xcord").value == "" || document.getElementById("ycord").value == "") 
{
  alert("Alanlardan hiçbirini boş bırakamazsınız.!");
}
else
{
var jmeslek=$("#meslek").val();
var jmahsul=$("#mahsul").val();
var jxcord=$("#xcord").val();
var jycord=$("#ycord").val();
	var totals=$('input[name=toplam]').val();
	var totaly=parseInt(totals)+1;
	$('input[name=toplam]').val(totaly);
$("#oke").prepend('<a class="list-group-item list-group-item-action" id="kacincieklenilenpoint'+deger+'"><input type="text" name="x'+deger+'" value="'+jxcord+'" style="display:none;"><input type="text" name="y'+deger+'" value="'+jycord+'" style="display:none;"><input type="text" name="menu'+deger+'" value="'+jmahsul+'" style="display:none;"><input type="text" name="group'+deger+'" value="'+jmeslek+'" style="display:none;"><div class="media"><img class="d-flex mr-3 rounded-circle" src="img/'+jmeslek+'/'+jmahsul+'.webp" alt=""><div class="media-body"><strong>'+jmahsul+'</strong> <br> <i id="cordpoint">'+jxcord+'<b>,</b>'+jycord+'</i><div class="text-muted smaller"><input type="button" class="btn btn-primary btn-sm alert-simple smaller" onclick="epharitadagoster('+jxcord+','+jycord+',&#39;'+jmeslek+'&#39;,&#39;'+jmahsul+'&#39;)" value="Haritada Göster"><input type="button" class="btn btn-primary btn-sm alert-warning smaller" value="Bu iletiyi iptal et" onclick="epiletiiptal('+deger+')"></div></div></div></a>');
deger=deger+1;
document.getElementById("xcord").value = "";
document.getElementById("ycord").value = "";
document.getElementById("cords").className="input-group-text smaller alert-danger"; 
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