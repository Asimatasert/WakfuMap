<?php
session_start();
if(isset($_SESSION["oturum"]))
{
	if($_SESSION["yetki"]==2||$_SESSION["yetki"]==3||$_SESSION["yetki"]==1)
	{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
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
			 else{ echo 'href="moderetor.php"'; }?>><b>WAKFU MAP</b></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Gösterim Paneli">
          <a class="nav-link" <?php if($_SESSION["yetki"]==3)
	{
		echo 'href="yazar.php"';
	}
	 else if($_SESSION["yetki"]==1)
	{
		echo 'href="admin.php"';
	}
			 else{ echo 'href="moderetor.php"'; }?>>
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
          <a class="nav-link" href="#">
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
          <div class="col-sm-8">
            <div class="card mb-3">
              <div class="card-header">Kullanıcı Bilgileri</div>
              <div class="card-body">
				  <form action="komut/kullanici_update.php" method="post">
                
<?php 
				  include("config.php");
	 $oturumacan=$_SESSION["sira"];
	 $kullanicioku=mysqli_fetch_object(mysqli_query($baglan,"select * from kullanici where sira=$oturumacan"));
				  
				  ?>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Adınız : </span>
                  </div>
                  <input type="text" name="ad" value="<?php echo $kullanicioku->ad; ?>" class="form-control">
					<input type="text" name="kulsira" style="display: none;" value="<?php echo $_SESSION["sira"]; ?>">
                </div>


                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Soyadınız : </span>
                  </div>
                  <input type="text" name="soyad" value="<?php echo $kullanicioku->soyad; ?>" class="form-control">
                </div>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Kullanıcı Adı : </span>
                  </div>
                  <input type="text"  value="<?php echo $kullanicioku->kul_adi; ?>" class="form-control" disabled="true">
                </div>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Toplam Kayıtlarınız. : </span>
                  </div>
                  <input type="text" value="<?php 
											$toplam=mysqli_fetch_object(mysqli_query($baglan,"select count(*) as toplam from hkordinat where gonderenkul=$oturumacan and onay=1"));
	 echo $toplam->toplam;
											?>" class="form-control" disabled="true">
                </div>

              </div>
				<input type="submit" class="btn btn-primary btn-block" value="Değişikleri kaydet">
				</form>
            </div>

            <div class="card mb-3">
				<form action="komut/kullanici_sifre_update.php" method="post">
              <div class="card-header">Şifremi değiştir</div>
              <div class="card-body">
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Eski Şifre : </span>
                  </div>
                  <input name="esifre" type="password" value="" class="form-control">
					<input type="text" name="kulsira" style="display: none;" value="<?php echo $_SESSION["sira"]; ?>">
                </div>
                <div class="input-group form-group">
                  <input type="password" name="ysifre" value="" class="form-control" placeholder="Şifre">
                  <input type="password" value="" name="ysifre2" class="form-control" placeholder="Şifre Tekrar">
                </div>
              </div>
              <input type="submit" class="btn btn-primary btn-block" value="Değişikleri kaydet">
					</form>
            </div>



          </div>
          <div class="col-sm-4">
            <div class="card mb-3">
              <div class="card-header">Kayıtlarım (BUNA GEREK YOK ONAYLANAN KAYITLARIM VAR ZATEN)</div>
                <div class="card-body">
                  <div class="list-group list-group-flush small">

              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Wholesome Zinc</strong> adında toplam <b><i>27</i></b> kayıdınız yayında.
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Wholesome Zinc</strong> adında toplam <b><i>27</i></b> kayıdınız yayında.
                  </div>
                </div>
              </a>

                </div>
              </div>
            </div>  
          </div>
        </div>


      
        
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->







    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © <a href="#">www.wakfumap.com</a> 2018</small>
        </div>
      </div>
    </footer>
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