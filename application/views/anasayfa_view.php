<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/anasayfa_view.php"){
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
	<title>Ana sayfa</title>
</head>
<body>

<div class="container-fluid">


<?php

$data["usthaber"]=$haberler;

 		$this->load->view("header_view",$data);
 ?>

<!--Anasayfa başlangıç-->

<?php
	$data["hthaber"]=$haberler;
	$data["usth"]=$ustcek;

 		$this->load->view("headeralt_view",$data);
?>

<div class="row">


<div class="col-md-9 icerik1 panel panel-default">
<div class="panel-heading">En son haberler</div>
<div class="haberler1">
<?php foreach($haberler as $haber){ ?>
<div class="sonhaber panel panel-default  col-md-4">
<a target="_blank" href='<?php echo $haber["hedef"]; ?>'><img src='<?php echo $haber["resimurl"]; ?>' alt='resim' id="hbrresim"/>
<div id="sdetay">
<h3 id="sbaslik"><?php echo $haber["baslik"]; ?></h3></a>
<p id="saciklama"><?php echo substr($haber["aciklama"],0,80); ?></p>
</div>
</div>
<?php } ?>

</div>



</div>

<?php
$data["shaber"]=$encoktik;
$data["anket"]=$anket;
$this->load->view("hsagalan_view",$data);
 ?>
<div style="margin-top:50px" class="col-md-9 icerik2 panel panel-default">
<div class="panel-heading">Foto galeri</div>
<div class="haberler2">
<ul class="list-inline"><li id="gsol" class="col-md-1"><span class='glyphicon glyphicon-chevron-left'></span></li>
</ul>
<ul class="list-inline col-md-12" id="galeri">

<?php foreach($resimgaleri as $rge){?>
<li class="col-md-2">
<a id="rg" href='<?php echo $rge["hedef"]; ?>'>
<div style="display:none" id='kaplama'>
	<span id="gorunenicon" class="glyphicon glyphicon-picture"></span>
</div>

<img src='<?php echo $rge["resimurl"]; ?>' id='fteleman' title="<?php echo $rge["aciklama"]; ?>" alt='fotogaleri' />
</a></li>
<?php }  ?>
</ul>
<ul class="list-inline">
<li id="gsag" class="col-md-1">
<span class='glyphicon glyphicon-chevron-right'></span></li></ul>
</div>

</div>

<div style="margin-top:50px" class="col-md-9 icerik2 panel panel-default">
<div class="panel-heading">Video galeri</div>
<div class="haberler2">
<ul class="list-inline"><li id="gsol2" class="col-md-1"><span class='glyphicon glyphicon-chevron-left'></span></li>
</ul>
<ul class="list-inline col-md-12" id="galeri2">

<?php foreach($videogaleri as $video){ ?>

<li class="col-md-2">
<a id="vg" href="<?php echo $video["hedef"]; ?>>">
<div style="display:none" id='kaplama'>
	<span id="gorunenicon" class="glyphicon glyphicon-facetime-video"></span>
</div>

<img src='<?php echo $video["resimurl"]; ?>' id='vdeleman' title='<?php echo $video["aciklama"]; ?>' alt='videogaleri' />
</a>
</li>
<?php } ?>

</ul>
<ul class="list-inline">
<li id="gsag2" class="col-md-1">
<span class='glyphicon glyphicon-chevron-right'></span></li></ul>
</div>

</div>



</div>




<div class="row">
<div class="col-md-6 althbr panel panel-default">
<div class=" phe panel-heading">Gündem</div>

<?php foreach($katagori1 as $kt1){ ?>
<div class="ihaber col-md-6">
<a target="_blank" href='<?php echo $kt1["hedef"]; ?>'>
<img src='<?php echo $kt1["resimurl"]; ?>' alt='resim' id="hbrresim"/></a>
<div id="detay">
<a target="_blank" href='<?php echo $kt1["hedef"]; ?>'>
<h3 id="dbaslik"><?php echo $kt1["baslik"]; ?></h3></a>
<p id="daciklama"><?php echo substr($kt1["aciklama"],0,85); ?></p>
</div>
</div>
<?php } ?>
</div>

<div class="col-md-6 althbr panel panel-default">
<div class=" phe panel-heading">Spor</div>

<?php foreach($katagori2 as $kt2){ ?>
<div class="ihaber col-md-6">
<a target="_blank" href='<?php echo $kt2["hedef"]; ?>'>	<img src='<?php echo $kt2["resimurl"]; ?>' alt='resim' id="hbrresim"/>
</a>
<div id="detay">
<a target="_blank" href='<?php echo $kt2["hedef"]; ?>'>
<h3 id="dbaslik"><?php echo $kt2["baslik"]; ?></h3></a>
<p id="daciklama"><?php echo substr($kt2["aciklama"],0,85); ?></p>
</div>
</div>
<?php } ?>


</div>

<div class="col-md-6 althbr panel panel-default">
<div class=" phe panel-heading">Siyaset</div>

<?php foreach($katagori3 as $kt3){ ?>
<div class="ihaber col-md-6">
<a target="_blank" href='<?php echo $kt3["hedef"]; ?>'>	<img src='<?php echo $kt3["resimurl"]; ?>' alt='resim' id="hbrresim"/>
</a>
<div id="detay">
<a target="_blank" href='<?php echo $kt3["hedef"]; ?>'>
<h3 id="dbaslik"><?php echo $kt3["baslik"]; ?></h3></a>
<p id="daciklama"><?php echo substr($kt3["aciklama"],0,85); ?></p>
</div>
</div>
<?php } ?>


</div>

<div class="col-md-6 althbr panel panel-default">
<div class=" phe panel-heading">Ekonomi</div>
<?php foreach($katagori4 as $kt4){ ?>
<div class="ihaber col-md-6">
<a target="_blank" href='<?php echo $kt4["hedef"]; ?>'>	<img src='<?php echo $kt4["resimurl"]; ?>' alt='resim' id="hbrresim"/>
</a>
<div id="detay">
<a target="_blank" href='<?php echo $kt4["hedef"]; ?>>'>
<h3 id="dbaslik"><?php echo $kt4["baslik"]; ?></h3></a>
<p id="daciklama"><?php echo substr($kt4["aciklama"],0,85); ?></p>
</div>
</div>
<?php } ?>


</div>

<div class="col-md-6 althbr panel panel-default">
<div class=" phe panel-heading">Dünya</div>
<?php foreach($katagori5 as $kt5){ ?><div class="ihaber col-md-6">
<a target="_blank" href='<?php echo $kt5["hedef"]; ?>'>	<img src='<?php echo $kt5["resimurl"]; ?>' alt='resim' id="hbrresim"/>
</a>
<div id="detay">
<a target="_blank" href='<?php echo $kt5["hedef"]; ?>'>
<h3 id="dbaslik"><?php echo $kt5["baslik"]; ?></h3></a>
<p id="daciklama"><?php echo substr($kt5["aciklama"],0,85); ?></p></div></div>

<?php } ?>

</div>

<div class="col-md-6 althbr panel panel-default">
<div class=" phe panel-heading">Teknoloji</div>
<ul id="katagori"  class="list-inline">
<?php foreach($katagori6 as $kt6){ ?>
<li><div class="ihaber col-md-6">
<a target="_blank" href='<?php echo $kt6["hedef"]; ?>'>	<img src='<?php echo $kt6["resimurl"]; ?>' alt='resim' id="hbrresim"/>
</a>
<div id="detay">
<a target="_blank" href='<?php echo $kt6["hedef"]; ?>'>
<h3 id="dbaslik"><?php echo $kt6["baslik"]; ?></h3></a>
<p id="daciklama"><?php echo substr($kt6["aciklama"],0,85); ?></p>
</div>
</div></li>
<?php } ?>
</ul>

</div>


</div>

<!--Ana sayfa bitiş-->

<?php $this->load->view("footer_view"); ?>


</div>

</body>
</html>

<?php }else {echo "Buraya giriş yasak";} ?>
