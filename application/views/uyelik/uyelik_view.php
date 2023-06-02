<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/uyelik/profil.php"){


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/anasayfa.css" />



	<title>MG-Üye giriş ekranı</title>
</head>
<body>
<div class="container-fluid">
<link rel='stylesheet' type="text/css" href="<?php echo base_url(); ?>assets/css/yazi.css" />
<?php
$data["usthaber"]=$haberler;
$this->load->view("header_view",$data);

?>

<div class="col-md-12 panel panel-default">
<div class="kl panel-heading"><h3 class="panel-title">Uye paneli</h3></div>
<div class="panel-body">
<?php
if($this->session->giris==true){
	echo "Zaten giriş yapmışsınız";
}else {
?>
<div id="uyebilgi" class="uyebilgi col-md-12 alert alert-info" style="display:none"></div>
<div class="col-md-6 panel panel-default">
<h3>Üye olun</h3>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryforms.js"></script>

<script type="text/javascript">
$(function(){


$("input#uyeol").click(function(){

$("#uyebilgi").show();


$("form#uyeolform").ajaxForm({
  target: '#uyebilgi'
}).submit();


});


 $("input#girisyap").click(function(){

   $("#girisbilgi").show();

   $("#girisform").ajaxForm({

   target: '#girisbilgi'

   }).submit();

   });

});

</script>
<a href='uyeol'>deneme</a>
<p style="font-size:15px">Üye olun ve sitemizde daha fonksiyonel gezinin</p>
<form action="uyeol" method="post" id="uyeolform">
<input type="text" name="kadi" placeholder="Kullanıcı adınız" class="form-control col-md-12"><br><br>
<input type="text" name="adsoyad" placeholder="Ad ve soyadınız" class="form-control col-md-12"><br><br>
<input type="text" name="email" placeholder="Email adresiniz" class="form-control col-md-12"><br><br>
<input type="password" name="sifre" placeholder="Şifreniz" class="form-control col-md-12"><br><br>
<input type="button" name="uyeolbuton" id="uyeol" value="Üye ol" class="btn btn-primary col-md-12"><br><br>
</form>
</div>
<div style="padding-bottom:80px" class="col-md-6 panel panel-default">
<h3>Giriş yapın</h3>
<div class="col-md-12 alert alert-info" id="girisbilgi" style="display:none"></div>
<p style="font-size:15px">Giriş yaparak yeni özelliklere erişin.</p>
<form action="girisyap" method="post" id="girisform">
<input type="text" name="kadi" placeholder="Kullanıcı adınız" class="form-control col-md-12"><br><br>
<input type="password" name="sifre" placeholder="şifreniz" class="form-control col-md-12"><br><br>
<input type="button" id="girisyap" name="girisyap" value="Giriş yap" class="btn btn-success col-md-12"><br><br>
</form>




<?php } ?>

</div>

</div>




<?php
$this->load->view("footer_view");
?>


</div>

<?php
}else {
	echo "Buraya giriş yasak";
}
?>
