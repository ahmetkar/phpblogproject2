<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/kunye_view.php"){
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
	<title>Künye</title>
</head>
<body>
<div class="container-fluid">
<link rel='stylesheet' type="text/css" href="<?php echo base_url(); ?>assets/css/yazi.css" />
<?php
$data["usthaber"]=$haberler;

    $this->load->view("header_view",$data);
 ?>

<div class="col-md-12 panel panel-default">
<div class="kl panel-heading"><h3 class="panel-title">Künye</h3></div>
<div class="panel-body">

<p id="metin">
  Sitemizde bulunan içerikler ziyaretçilerimize gündem hakkında bilgi vermektedir.Sitemizde yayınlanan haberlerin kaynakları
  belirtilmekle sabit olup kaynak belirtilmeden hiçbir haber eklenmeyecektir.
  <br><br>
  Sitemizde kaynağı belirtilen haberlerden site sahipleri sorumlu sayılamaz.Belirtilen kaynaklar ajanslardan alınan haberler ve
  bilgiler doğrultusunda içerikler yayınlanmaktadır
  <br>
  Sitemizde mahremiyeti ihlal eden hiçbir içerik bulunmamaktadır ve içeriklerimizde zararlı fikirler veya ideolojiler yoktur.
  <br>
  Amacımız sadece olanları metin halinde ziyaretçilerimize aktarmak ve haberdar etmektir.<br>
  Herhangi bir kurum,kuruluşu öne çıkarma övme gibi amacımız yoktur.<br>
  Haberlerimizin doğruluğu yazarlarmız ve editörlerimiz tarafından dikkat edilerek eklenmektedir.<br>
  Yasal sıkıntı veya uyarılarınızı yada şikayetlerinizi üst menümüzde bulunan geri bildir butonuyla bize bildirebilirsiniz.
  <br>

  Teşekkürler,Site yönetimi

</p>

</div>





</div>





<?php
$this->load->view("footer_view");
?>


</div>
<?php }else {echo "Buraya giriş yasak";} ?>
