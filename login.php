<?php 

session_start();

if(!isset($_SESSION["oturum"]))
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
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
		<script>

	function kulkontrol()
	{
		var mail=$("input[name=mail]").val();
		var sifre=$("input[name=sifre]").val();
		var degerler="mail="+mail+"&sifre="+sifre;
		$.ajax({
			type:"POST",
			url:"komut/kontrol.php",
			data:degerler,
			success: function(sonuc)
			{
				$("#durum").empty();
				$("#durum").append(sonuc).fadeIn();
			}
		   		})
	}

</script>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Giriş Yap</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label>Kullanıcı Adı</label>
            <input class="form-control" name="mail" type="email" placeholder="Kullanıcı Adı Veya Mail Adresi Girin">
          </div>
          <div class="form-group">
            <label>Şifre</label>
            <input class="form-control" name="sifre" type="password" placeholder="Şifre">
          </div>
          <div id="durum"></div>
          <a class="btn btn-primary btn-block" onClick="kulkontrol()">Giriş Yap</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Kayıt Ol</a>
          <a class="d-block small" href="forgot-password.php">Şifremi Unuttum</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
<?php 
}
else
{
	$yetki=$_SESSION["yetki"];
	if($yetki==1)
		{
			header("Location:admin.php");
		}
		else if($yetki==2)
		{
			header("Location:moderetor.php");
		}
		else if($yetki==3)
		{
			header("Location:yazar.php");
		}
	else{			header("Location:map.php");
}
}
?>
