<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/uyari.php"){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/anasayfa.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/anasayfa.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/galeri.js"></script>
	<title>Uyarı</title>
</head>
<body>
<div class="container-fluid">
<link rel='stylesheet' type="text/css" href="<?php echo base_url(); ?>assets/css/yazi.css" />
<?php
$data["usthaber"]=$haberler;

    $this->load->view("header_view",$data);
 ?>
<div class="col-md-12 panel panel-default">
<div class="kl panel-heading"><h3 class="panel-title">Yasal uyari</h3></div>
<div class="panel-body">

<p id="metin">
Sitemiz yasal prosedüre uygun ve her yaşa uygun içerikler barındırmakta yasaya aykırı,özel hayatı ve mahremiyeti
ihlal eden içeriklerden uzak durmaktadır..<br>
Sitemizde haberlerin doğruluğu editörlerimiz ve yazarlarmız tarafından kontrol edilmekte haberlerin yanlışlığının
sorumululuğu bizde değil eğer belirtilmişse kaynağındadır.
<br>
Yapılan yorumlarda her kullanıcının ip adresi alınmakta ve bilgi tabanımızda işlenmektedir.
Kullanıcılarımız eğer yorum yapacaksa ipadresinin alındığının kabul etmiştir<br>
İpadresler sayesinde üye olmayanlar içinde özel muamele gerçekleştirilmektedir.
<br>
Sitemizde yaşadığınız sorunları geri bildir sayfamız aracılığıyla bize bildirebilirsiniz..<br>
</p>

</div>





</div>





<?php
$this->load->view("footer_view");
?>


</div>

<?php }else {echo "Buraya giriş yasak";} ?>
