<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/sonuclar_view.php"){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sonuclar.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/katagori.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/galeri.js"></script>
	<title><?php echo $aranan." hakkında sonuçlar"; ?></title>
</head>
<body>

<div class="container-fluid">


<?php
		$data["usthaber"]=$haberler;

 		$this->load->view("header_view",$data);
 ?>

<!--Anasayfa başlangıç-->
<div class="panel panel-default col-md-12">
<div class="kpla panel-heading"><?php echo $aranan." hakkında sonuçlar"; ?></div>
 <ul id="tabmenu" class="nav nav-pills" role="tablist">
  <li role="presentation"><a href="#"><span class="glyphicon glyphicon-globe icon "></span>Haberler<span class="badge"><?php echo $hsay; ?></span></a></li>
  <li role="presentation"><a href="#"><span class="glyphicon glyphicon-facetime-video icon "></span>Videolar<span class="badge"><?php echo $vsay; ?></span></a></li>
  <li role="presentation"><a href="#"><span class="glyphicon glyphicon-picture icon "></span>Resimler<span class="badge"><?php echo $rsay; ?></span></a></li>
</ul>
<?php

if($aranan=="[removed]"){

	echo "Geçersiz bir arama işlemi yaptınız tekrarladığınız taktirde ip adresiniz engellenecektir";
}
?>
<div id="tabview" class="tab_view col-md-12 panel panel-default">
<ul class="hul list-inline">

<?php
foreach($gelen as $sonuc){

	?>

<li id="<?php echo $sonuc["id"]; ?>"><div class="ihaber col-md-12">
<a target="_blank" href='<?php echo $sonuc["hedef"]; ?>'>	<img src='<?php echo $sonuc["resimurl"]; ?>' alt='resim' id="hbrresim"/>
</a>
<div id="detay"><a target="_blank" href='<?php echo $sonuc["hedef"]; ?>'>
<h3 id="dbaslik"><?php echo $sonuc["baslik"]; ?></h3></a>
<p id="daciklama"><?php echo substr($sonuc["metin"],0,350); ?></p>
<a href="<?php echo base_url(); ?>h/<?php echo $sonuc["id"]."_".$sonuc["perma"]; ?>" class="btn btn-primary right">Haberi oku</a>
</div>
</div></li>
<?php } ?>
</ul>
<?php
if(!@$gelen){
	echo "<div class='alert alert-danger'>".$aranan." ile ilgili sonuç haberlerde bulunamadı.</div>";
}

if($hsay!=0){
?>
<a id="sonuclarcek" class="col-md-12 btn btn-default">Diğer sonuçları gör</a>
<?php
}

?>


</div>

<div id="tabview" class="tab_view col-md-12 panel panel-default">
<ul class="vul list-inline">
<?php
foreach($vgelen as $sonuc){

	?>

<li id="<?php echo $sonuc["id"]; ?>"><div class="ihaber col-md-3">
<a target="_blank" href='<?php echo $sonuc["hedef"]; ?>'>	<img src='<?php echo $sonuc["resimurl"]; ?>' alt='resim' id="rhbrresim"/>
</a>
<div id="rdetay"><a target="_blank" href='<?php echo $sonuc["hedef"]; ?>'>
<h3 id="rbaslik"><?php echo $sonuc["baslik"]; ?></h3></a>
<p id="raciklama"><?php echo substr($sonuc["aciklama"],0,100); ?></p>
</div>
</div></li>
<?php } ?>
</ul>
<?php
if(!@$vgelen){
	echo "<div class='alert alert-danger'>".$aranan." ile ilgili sonuç videolarda bulunamadı.</div>";
}

if($vsay!=0){
?>
<a id="vsonuclarcek" class="col-md-12 btn btn-default">Diğer sonuçları gör</a>
<?php
}

?>
</div>

<div id="tabview" class="tab_view col-md-12 panel panel-default">
<ul class="rul list-inline">
<?php
foreach($rgelen as $sonuc){

	?>

<li id="<?php echo $sonuc["id"]; ?>"><div class="ihaber col-md-3">
<a target="_blank" href='<?php echo base_url(); ?>galeri/<?php echo $sonuc["id"]; ?>'>	<img src='<?php echo $sonuc["resimurl"]; ?>' alt='resim' id="rhbrresim"/>
</a>
<div id="rdetay"><a target="_blank" href='<?php echo $sonuc["hedef"]; ?>'>
<h3 id="rbaslik"><?php echo $sonuc["baslik"]; ?></h3></a>
<p id="raciklama"><?php echo substr($sonuc["aciklama"],0,100); ?></p>
</div>
</div></li>
<?php } ?>
</ul>
<?php
if(!@$rgelen){
	echo "<div class='alert alert-danger'>".$aranan." ile ilgili sonuç resimlerde bulunamadı.</div>";
}
if($rsay!=0){
?>
<a id="rsonuclarcek" class="col-md-12 btn btn-default">Diğer sonuçları gör</a>
<?php
}
?>
</div>


</div>
<!--Ana sayfa bitiş-->

<?php $this->load->view("footer_view"); ?>


</body>
</html>

<?php }else {echo "Buraya giriş yasak";} ?>
