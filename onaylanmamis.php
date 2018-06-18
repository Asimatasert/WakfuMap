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
	}else if($_SESSION["yetki"]==1)
	{
		echo 'href="admin.php"';
	}
			 else{ echo 'href="moderetor.php"'; }?> >
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



  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!-- Example DataTables Card-->
 <?php 
		include("config.php");
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
		if($_SESSION["yetki"]==2||$_SESSION["yetki"]==1)
		{
			?>
		<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Onaylamadığım kayıtlar</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Meslek</th>
                  <th>Mahsül</th>
                  <th>Cordinat</th>
                  <th>Onaylamadığım Yazar</th>
				<th>Açıklama</th>
                </tr>
              </thead>
              <tbody>
<?php 
			
			$oturumacan=$_SESSION["sira"];
			$onaykontrol=mysqli_query($baglan,"select * from hkordinat where yapi=$oturumacan and onay=0");	  
			if(mysqli_num_rows($onaykontrol))
			{
				while($onayoku=mysqli_fetch_object($onaykontrol))
				{
					?>
				  <tr>
                  <td><?php 
					  $menusira=$onayoku->menu_sira;
					$menuoku=mysqli_fetch_object(mysqli_query($baglan,"select * from map_menu where sira=$menusira"));
					$menuadi=$menuoku->adi;
					echo meslekkontrol($menuoku->groupid);
					  ?></td>
                  <td><?php 
					  echo $menuadi;
					  ?></td>
                  <td><?php echo $onayoku->x." , ".$onayoku->y; ?></td>
                  <td><?php $gonderen=$onayoku->gonderenkul;
					  $kullanicioku=mysqli_fetch_object(mysqli_query($baglan,"select * from kullanici where sira=$gonderen"));
					echo $kullanicioku->ad." ".$kullanicioku->soyad;
					  ?></td>
					  <td><?php echo $onayoku->aciklama; ?></td>
                </tr>
				  <?php
				}
			}
				  ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
		<?php
		}
		else if($_SESSION["yetki"]==3)
		{
			?>
		<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Onaylanmayan kayıtlarım</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Meslek</th>
                  <th>Mahsül</th>
                  <th>Cordinat</th>
                  <th>Onaylamayan Moderatör</th>
					<th>Açıklama</th>
					<th></th>
                </tr>
              </thead>
              <tbody>




<?php $oturumacan=$_SESSION["sira"];
			$onaykontrol=mysqli_query($baglan,"select * from hkordinat where gonderenkul=$oturumacan and onay=0");	  
			if(mysqli_num_rows($onaykontrol))
			{
				while($onayoku=mysqli_fetch_object($onaykontrol))
				{
					?>
				  <tr>
                  <td><?php 
					  $menusira=$onayoku->menu_sira;
					$menuoku=mysqli_fetch_object(mysqli_query($baglan,"select * from map_menu where sira=$menusira"));
					$menuadi=$menuoku->adi;
					echo meslekkontrol($menuoku->groupid);
					  ?></td>
                  <td><?php 
					  echo $menuadi;
					  ?></td>
                  <td><?php echo $onayoku->x." , ".$onayoku->y; ?></td>
                  <td><?php $gonderen=$onayoku->yapi;
					  $kullanicioku=mysqli_fetch_object(mysqli_query($baglan,"select * from kullanici where sira=$gonderen"));
					echo $kullanicioku->ad." ".$kullanicioku->soyad;
					  ?></td>
					  <td><?php echo $onayoku->aciklama; ?></td>
					  <td><form action="komut/onaylama_sil.php" method="post"><input value="<?php echo $onayoku->sira; ?>" type="text" name="sira" style="display: none;"><button type="submit" class="btn btn-danger btn-block">Veriyi Sil</button></form></td>
                </tr>
				  <?php
				}
			}
				  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
		<?php
		}
		?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
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