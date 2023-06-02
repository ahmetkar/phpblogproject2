<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/vgaleri_view.php"){
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/rgaleri.css">

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/galeri.js"></script>
	<title>Video galeri</title>
</head>
<body>

<div class="container-fluid">


<?php
$data["usthaber"]=$haberler;

    $this->load->view("header_view",$data);
 ?>
<!--Anasayfa başlangıç-->

<div class="panel panel-default col-md-12">
<div class="kpla panel-heading">Video galeri</div>
<ul class="list-inline vgaleri">
<?php foreach($videog as $galeri){ ?>
<li id='<?php echo $galeri["id"]; ?>'><div class="ihaber col-md-3">
<a target="_blank" href='<?php echo $galeri["hedef"]; ?>'>	<img src='<?php echo $galeri["resimurl"]; ?>' alt='resim' id="hbrresim"/>
</a>
<div id="detay">
<a target="_blank" href='<?php echo $galeri["hedef"]; ?>'>
<h3 id="dbaslik"><?php echo $galeri["baslik"]; ?></h3></a>
<p id="daciklama"><?php echo $galeri["aciklama"]; ?></p></div>
</div></li>
<?php } ?>
</ul>
<a class="vcek btn btn-default col-md-12">Diğerlerini gör</a>
</div>

</div>
<!--Ana sayfa bitiş-->

<?php $this->load->view("footer_view"); ?>


</body>
</html>

<?php }else {echo "Buraya giriş yasak";} ?>
