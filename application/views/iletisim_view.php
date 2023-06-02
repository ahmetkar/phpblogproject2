<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/iletisim_view.php"){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/anasayfa.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/anasayfa.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/galeri.js"></script>
	<title>İletişim</title>
</head>
<body>
<div class="container-fluid">
<link rel='stylesheet' type="text/css" href="<?php echo base_url(); ?>assets/css/yazi.css" />

<?php
$data["usthaber"]=$haberler;

 		$this->load->view("header_view",$data);
 ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryforms.js"></script>
<script type="text/javascript">
$(function(){


$("input#gonder").click(function(){

$("#bilgi").show();

$("#iletisimform").ajaxForm({
  target: '#bilgi'
}).submit();

});
});
</script>

<div class="col-md-12 panel panel-default">
<div class="kl panel-heading"><h3 class="panel-title">İletişim</h3></div>
<div class="panel-body">
<p style="font-size:16px;font-family:Arial">
	Bize sitede yaşadığınız sorunlar ve uyarmak istediğiniz şeyler ile alakalı mesaj gönderin.
	Eğer bu kısımda göndermekte sorun yaşıyorsanız. yonetici@milligundem.pe.hu email adresine
	ulaşabilirsiniz.
</p>
<?php
$oturum = $this->session->giris;
$adsoyad = $this->session->adsoyad;
$email = $this->session->email;
$resim = $this->session->resimurl;
?>
<form id="iletisimform" method="post" action="<?php echo base_url(); ?>iletisim/mesajgonder">
<div class="alert alert-info col-md-12" id="bilgi" style="display:none"></div>
<?php if($oturum){
?>
<input type="hidden" name="adsoyad" class="col-md-12 form-control" value="<?php echo $adsoyad; ?>"><br><br>
<input type="hidden" name="email" class="col-md-12 form-control"  value="<?php echo $email; ?>"><br><br>
<?php echo "<img src='".$resim."' style='width:64px;height:64px;float:left;
margin-right:5px'><b>".$adsoyad."</b><br>".$email."<br>"; ?><br>
<?php
}else { ?>
<input name="adsoyad" type="text" class="col-md-12 form-control" placeholder="Ad ve soyadınız" /><br><br>
<input name="email" type="text" class="col-md-12 form-control" placeholder="Email adresiniz" /><br><br>
<?php } ?>
<input name="katagori" type="text" class="col-md-12 form-control" placeholder="Ne ile ilgili mesaj gönderiyorusunuz ?" /><br><br>
<textarea class="col-md-12 form-control" name="mesaj" placeholder="İmla kurallarına dikkat ederek
sorununuzu bildiren bir mesaj gönderiniz.."></textarea> <br><br><br>
<input id="gonder" name="gonder" type="button" class="col-md-12 btn btn-primary" value="Mesajı gönder" /><br>
</form>
<br>
<style>
	ol li{color:gray;}
</style><br>
<p>
<ol>
<li>Mesajlarınıza 24 saat içinde cevap gelir gelmemişse bile mesajınız mutlaka görülmüştür.</li>
<li>Mesajlardan çok kısa olanlar okunmaz otamatik olarak silinir.</li>
<li>Mesajlar en fazla 200 karakter içermelidir</li>
<li>Formda bir sorun oluşursa lütfen email adresimizden bize ulaşın.</li>
<li>Yasal ve teknik sorunları herhangi bir kişi ve kuruma ulaştırmadan ilkönce bize ulaştırırsanız
bu hatayı düzeltebiliriz.</li>
<li>Lütfen gereksiz mesajlardan uzak durun.</li>
</ol>

</p>


</div>





</div>





<?php
$this->load->view("footer_view");
?>


</div>

<?php }else {echo "Buraya giriş yasak";} ?>
