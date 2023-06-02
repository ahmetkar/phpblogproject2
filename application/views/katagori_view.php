<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/katagori_view.php"){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/katagori.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/katagori.css" />

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/galeri.js"></script>
	<title><?php echo $kbilgi["katagoriad"]; ?></title>
</head>
<body>

<div class="container-fluid">


<?php
$data["usthaber"]=$haberler;

 		$this->load->view("header_view",$data);
 ?>

<!--Anasayfa başlangıç-->
<div class="panel panel-default col-md-12">
<div class="kpla panel-heading"><?php echo $kbilgi["katagoriad"]; ?></div>
<ul class="list-inline" id="katagorul">
<?php
if(empty($gelen)){

		echo "Bu katagoride hiç yazı yok";

	}

foreach($gelen as $katagori){

	?>

<li class="<?php echo $katagori["katagoriid"]; ?>" id='<?php echo $katagori["id"]; ?>'><div class="ihaber col-md-12">
<a target="_blank" href='<?php echo $katagori["hedef"]; ?>'>	<img src='<?php echo $katagori["resimurl"]; ?>' alt='resim' id="hbrresim"/>
</a>
<div id="detay">
<a target="_blank" href='<?php echo $katagori["hedef"]; ?>'><h3 id="dbaslik"><?php echo $katagori["baslik"]; ?></h3></a>
<p id="daciklama"><?php echo substr($katagori["metin"],0,350); ?></p>
<a href="<?php echo base_url(); ?>h/<?php echo $katagori["id"]."_".$katagori["perma"]; ?>" class="btn btn-primary right">Haberi oku</a>
</div>
</div></li>
<?php } ?>
</ul>
<?php
	if(!empty($gelen)){
		?><br>
<a id="katagoricek" class="col-md-12 btn btn-default">Diğer haberleri göster</a>
<?php
	}


 ?>


</div>
<!--Ana sayfa bitiş-->

<?php $this->load->view("footer_view"); ?>


</body>
</html>

<?php }else {echo "Buraya giriş yasak";} ?>
