<?php
session_start();
if(isset($_SESSION["oturum"]))
{
	if($_SESSION["yetki"]==1)
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
    <a class="navbar-brand" href="admin.php"><b>WAKFU MAP</b> / <i>Admin Paneli</i></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Gösterim Paneli">
          <a class="nav-link" href="admin.php">
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
            <div class="col-lg-9">
              <div class="card mb-3">
                <div class="card-header">Kullanıcılar</div>
                 <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Adı</th>
                  <th>Soyadı</th>
                  <th>Kullanıcı Adı</th>
                  <th>Mail Adresi</th>
                  <th>Yetki</th>
                  <th>Aktiflik</th>
                </tr>
              </thead>
              <tbody>



<?php
				  include("config.php");
		$kullanicikontrol=mysqli_query($baglan,"select * from kullanici");
		if(mysqli_num_rows($kullanicikontrol))
		{
			while($kullanicioku=mysqli_fetch_object($kullanicikontrol))
			{
				?>
				  <tr>
                  <td><?php echo $kullanicioku->ad; ?></td>
                  <td><?php echo $kullanicioku->soyad; ?></td>
                  <td><?php echo $kullanicioku->kul_adi; ?></td>
                  <td><?php echo $kullanicioku->mails; ?></td>
                  <td><?php
				switch($kullanicioku->yetki)
				{
					case 1:echo "Admin";
						break;
					case 2:echo "Moderetör";
						break;
					case 3:echo "Yazar";
						break;
					default: echo "";
				}
					  ?></td>
                  <td>0</td>
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
            <div class="row">

              <div class="col-sm-4">
                  <div class="card mb-3">
                <div class="card-header"> Yetki Düzenle</div>
                <div class="card-body">
                  <form action="komut/yetki_update.php" method="post">
                 <div class="input-group form-group">
              <div class="input-group-prepend ">
                <span class="input-group-text" id="cords">Kullanıcı : </span>
              </div>
              <select class="form-control" required name="kulsira">
              <option value="">Kullanıcı Seçiniz.</option>
				  <?php $knt=mysqli_query($baglan,"select * from kullanici");
				  
				  if(mysqli_num_rows($knt))
				  {
					  while($okukul=mysqli_fetch_object($knt))
					  {
						  echo '<option value="'.$okukul->sira.'">'.$okukul->ad." ".$okukul->soyad.'</option>';
					  }
				  }
				  ?>
            </select>
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend ">
                <span class="input-group-text" id="cords">Yetki : </span>
              </div>
              <select class="form-control" name="yetki">
              <option value="3">Yazar</option>
              <option value="2">Moderötör</option>
              <option value="1">Admin (Moderötör & Yazar)</option>
            </select>
            </div>
                </div>
            <br>
            <button type="submit" class="btn btn-warning btn-block">Yekiyi Düzenle</button>
					</form>
              </div>
              </div>

            <div class="col-sm-4">
              <div class="card mb-3">
                <div class="card-header"> Kullanıcı Sil</div>
                <div class="card-body">
                  					 <form action="komut/kullanici_sil.php" method="post">

                 <div class="input-group form-group">
              <div class="input-group-prepend ">
                <span class="input-group-text" id="cords">Kullanıcı : </span>
              </div>
              <select class="form-control" required name="kulsira">
              <option value="">Kullanıcı Seçiniz.</option>
              				  <?php $knt=mysqli_query($baglan,"select * from kullanici");
				  
				  if(mysqli_num_rows($knt))
				  {
					  while($okukul=mysqli_fetch_object($knt))
					  {
						  echo '<option value="'.$okukul->sira.'">'.$okukul->ad." ".$okukul->soyad.'</option>';
					  }
				  }
				  ?>
            </select>
            </div>

                </div>
            <br>
            <button type="submit" class="btn btn-warning btn-block">Kullanıcıyı ve verilerini sil</button>
					</form>
              </div>
            </div>



            </div>



            </div>
            <div class="col-lg-3">
              <div class="card mb-3">
                <div class="card-header"><i class="fa fa-fw fa-bell-o"></i>Uyarılar</div>
              <blockquote class="blockquote text-center">
              <p class="mb-0">asimatasert@outlook.com</p>
              <footer class="blockquote-footer">asimatasert<cite title="Source Title"> adlı kullanıcının şifresini unuttuğunu söylüyor.</cite></footer>
              <button class="btn btn-primary">İletişime geçtim.</button>
              <button class="btn btn-danger">Spam sil.</button>
            </blockquote>
              <blockquote class="blockquote text-center">
              <p class="mb-0">asimatasert@outlook.com</p>
              <footer class="blockquote-footer">asimatasert<cite title="Source Title"> adlı kullanıcının şifresini unuttuğunu söylüyor.</cite></footer>
              <button class="btn btn-primary">İletişime geçtim.</button>
              <button class="btn btn-danger">Spam sil.</button>
            </blockquote>
              <blockquote class="blockquote text-center">
              <p class="mb-0">asimatasert@outlook.com</p>
              <footer class="blockquote-footer">asimatasert<cite title="Source Title"> adlı kullanıcının şifresini unuttuğunu söylüyor.</cite></footer>
              <button class="btn btn-primary">İletişime geçtim.</button>
              <button class="btn btn-danger">Spam sil.</button>
            </blockquote>
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
