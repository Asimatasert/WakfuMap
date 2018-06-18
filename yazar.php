<?php
session_start();
if(isset($_SESSION["oturum"]))
{
	if($_SESSION["yetki"]==3||$_SESSION["yetki"]==1)
	{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="ASIM ATASERT">
  <title></title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">




  <!-- BOOTSTRAP CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!-- BOOTSTRAP JS -->
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
  <!-- LEAFLET CSS -->
<link rel="stylesheet" type="text/css" href="css/leaflet.css">
  <!-- LEAFLET JS -->
<script src="js/leaflet.js"></script>
  <!-- SPECİAL CONTENT CSS AND JS -->
<link rel="stylesheet" type="text/css" href="css/special.css">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<link href="css/sb-admin.css" rel="stylesheet">
<script src="js/jquery2.0.js"></script>
<script src="js/jquery-latest.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" <?php if($_SESSION["yetki"]==3)
	{
		echo 'href="yazar.php"';
	}else if($_SESSION["yetki"]==1)
	{
		echo 'href="admin.php"';
	}
			 else{ echo 'href="moderetor.php"'; }?>><b>WAKFU MAP</b> / <i>Yazar Paneli</i></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Gösterim Paneli">
          <a class="nav-link" href="yazar.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Gösterim Paneli</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Onaylanılan Kayıtlarım">
          <a class="nav-link" href="onay.php">
            <i class="fa fa-fw fa-bell-o"></i>
            <span class="nav-link-text">Onaylanılan Kayıtlarım</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Onaylanmayan Kayıtlarım">
          <a class="nav-link" href="onaylanmamis.php">
            <i class="fa fa-fw fa-bell-o"></i>
            <span class="nav-link-text">Onaylanmayan Kayıtlarım</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Kullanıcı Ayarları">
          <a class="nav-link" href="kullaniciayarlari.php">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Kullanıcı Ayarları</span>
          </a>
        </li>

        <?php
		  if($_SESSION["yetki"]==1)
		  {
			  ?>
		  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Moderetöre Geçiş Yap">
          <a class="nav-link" href="moderetor.php">
            <i class="fa fa-fw fa-support"></i>
            <span class="nav-link-text">Moderetöre Geçiş Yap</span>
          </a>
        </li>
		  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Yazara Geçiş Yap">
          <a class="nav-link" href="yazar.php">
            <i class="fa fa-fw fa-support"></i>
            <span class="nav-link-text">Yazara Geçiş Yap</span>
          </a>
        </li>
		  <?php
		  }
		  ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <b>ÇIKIŞ YAP</b><i class="fa fa-fw fa-sign-out"></i></a>
        </li>
      </ul>
    </div>
  </nav>



  <!-- CONTENT -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8">


          <div class="card mb-3"> <!-- HARİTA TAM DİV -->
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Harita</div>
            <div class="card-body" id="map" style="height: 400px;" >
              
            </div>
          </div> <!-- HARİTA TAM DİV BİTİŞ -->
          


       <div class="card mb-3  alert-dark"><!--YAYINDA OLAN POİNTLER DİV TÜM -->
            <div class="card-header">
              <i class="fa fa-support"></i> Yayında olan pointler <B>BAKIMDA</B></div>
            <div class="list-group list-group-flush small">



              

              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Wholesome Zinc</strong> adında toplam <b><i>27</i></b> kayıdınız yayında.
                  </div>
                </div>
              </a>

            </div>
            
          </div> <!--YAYINDA OLAN POİNTLER DİV TÜM BİTİŞ -->

        </div>










        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header alert-info">
              <i class="fa fa-pie-chart"></i> Point Ekleme Alanı</div>
            <div class="card-body">
              


<div class="input-group smaller" >
  <div class="input-group-prepend smaller">
    <span class="input-group-text smaller alert-danger" id="meslek1">Meslek  : </span>
  </div>
  <select class="form-control form-control-sm smaller alert-danger" id="meslek" onchange="mahsulgoster()">
  <option>Meslek seçiniz.</option>
  <option>Farmer</option>
  <option>Fisherman</option>
  <option>Herbalist</option>
  <option>Lumberjack</option>
  <option>Miner</option>
  <option>Trapper</option>
</select>
</div>



<div id="MAHSULLERIAL">
  
</div>






















<div class="input-group smaller">
  <div class="input-group-prepend smaller">
    <span class="input-group-text smaller alert-danger" id="cords">Kordinat : </span>
  </div>
  <input type="text" id="xcord" value="" class="form-control smaller" placeholder="X" disabled="true">
  <input type="text" id="ycord" value="" class="form-control smaller" placeholder="Y" disabled="true">
</div>




























            </div>
            
<button type="button" class="btn btn-primary btn-lg btn-block smaller" onclick="pointekle()">Point Ekle</button>
          </div>
          <!-- Example Notifications Card-->
          <div class="card mb-3">
            <div class="card-header alert-info">
              <i class="fa fa-bell-o"></i> Eklenilen Pointler </div>
			  <form action="komut/onay_kontrol.php" method="post">
            <div class="list-group list-group-flush small">

			<input type="text" name="toplam" value="0" style="display: none;">

              <div id="oke">
                
              </div>



            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block smaller">Onaylamak için gönder</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        
        
        
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->







    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Çıkış yapıyorsunuz !</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Çıkmak istediğinizden eminmisiniz.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
			  <a href="cikis.php" class="btn btn-primary">Çıkış Yap</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->




    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>

    <script src="js/special/haritagetir.js"></script>
    <!-- HARİTA ÜSTÜNDE DEĞİŞİKLİK YAPMAK İÇİN BU AÇIKLAMA SATIRI ALTINA JS DOSYALARINIZI ÇAĞIRTINIZ!! -->
    <script src="js/special/pointeklemealani.js"></script>
    <script src="js/special/eklenilenpointler.js"></script>
	  <script src="js/special/epiletiiptal.js"></script>
    
      <div class="container">
        <div class="text-center">
          <small>Copyright © <a href="#">www.wakfumap.com</a> 2018</small>
        </div>
      </div>
  </div>






</body>

</html>
<?php
			}
}
else
{
	header("Location:index.php");
}
		?>