<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/hsagalan_view.php"){
?>
<style>
a {
	color:black;
}
a:hover {
	color:gray;
	text-decoration: none;
}
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sagalan.js"></script>

<script type="text/javascript">
$(function(){
	$("input#oyver").click(function(){

	$("#bilgi").show();

	$("form#anketform").ajaxForm({
		target: '#bilgi'
	}).submit();

	$("form#anketform").hide();
	$("#sonuclar").show();
});

$("#sonucgoster").click(function(){

$("form#anketform").toggle();
$("#sonuclar").toggle();

});

});</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sagalan.css" />
<div class="col-md-3 sagalan">
<div class="panel panel-default">
<div class="panel-heading">En çok tıklananlar</div>
<div class="panel-body">

<ul style="list-style:none" id="haberg">
<?php $i=0; foreach($shaber as $coktik){ $i++;?>
<li class="col-md-12" id="bs"><span id="sayi" class="col-md-2"><?php echo $i; ?></span><h4 class="col-md-10" id="habergoster"><?php echo $coktik["baslik"]; ?></h4></li>

<li id="hbr"><div class="saghaber1 panel panel-default col-md-12">

<img src='<?php echo $coktik["resimurl"]; ?>' id='saghresim' alt='resim'>
<div id="sagdetay">
<a href='<?php echo $coktik["hedef"]; ?>'><h4 id='saghb'><?php echo $coktik["baslik"]; ?></h4>
<p id='saciklama'><?php echo substr($coktik["aciklama"],0,80); ?></p>
<span id="zaman"><?php echo $coktik["tarih"]; ?></span>	</a>
</div>

</div></li>
<?php } ?>
</ul>

</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">En son yorumlananlar</div>
<div class="panel-body">


<?php foreach($yorumagore as $enson){ ?>

<div  class="saghaber2 panel panel-default col-md-12">
<img src='<?php echo $enson["resimurl"]; ?>' id='saghresim' alt='resim'>
<div id="sagdetay">
<a href='<?php echo $enson["hedef"]; ?>'><h4 id='saghb'><?php echo $enson["baslik"]; ?></h4>
<p id='saciklama'><?php echo $enson["aciklama"]; ?></p>
<span id="zaman"><?php echo $enson["tarih"]; ?></span>	</a>
</div>
</div>
<?php } ?>




</div>

</div>

<div class="panel panel-default">

	<div class="panel-heading">Anket&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;<a id="sonucgoster" class="btn btn-default" style="width:120px;height:34px">Sonucu göster</a></div>
<div class="panel-body">


<h5><?php echo $anket["soru"]; ?></h5>

<div class="alert alert-info col-md-12" id="bilgi" style="display:none">

</div>
<form id="anketform" action="<?php echo base_url(); ?>anasayfa/anket" method="post">
<input type="hidden" name="soruid" value="<?php echo $anket["id"]; ?>" />
<input type="radio" name="cevap" value="<?php echo $anket["cevap1"]; ?>"><?php echo $anket["cevap1"]; ?><br>
<input type="radio" name="cevap" value="<?php echo $anket["cevap2"]; ?>"><?php echo $anket["cevap2"]; ?><br>
<?php if(!empty($anket["cevap3"])){ ?>
<input type="radio" name="cevap" value="<?php echo $anket["cevap3"]; ?>"><?php echo $anket["cevap3"]; ?><br>
<?php } ?>
<?php if(!empty($anket["cevap4"])){ ?>
<input type="radio" name="cevap" value="<?php echo $anket["cevap4"]; ?>"><?php echo $anket["cevap4"]; ?><br>
<?php } ?>
<?php if(!empty($anket["cevap5"])){ ?>
<input type="radio" name="cevap" value="<?php echo $anket["cevap5"]; ?>"><?php echo $anket["cevap5"]; ?><br>
<?php } ?>
<?php if(!empty($anket["cevap6"])){ ?>
<input type="radio" name="cevap" value="<?php echo $anket["cevap6"]; ?>"><?php echo $anket["cevap6"]; ?><br>
<?php } ?>
<input type="button" class="col-md-12 btn btn-primary" name="oyver" value="Oyver" id="oyver" />
</form>
<div id='sonuclar' style="display:none">

<?php
error_reporting(0);
echo "Toplam".$toplam."kişi cevap verdi<br>";
?>


<?php

 $c1 = ceil(100/$toplam*$scevap1); ?>
<?php echo $anket["cevap1"]; ?>	<div class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
  aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $c1; ?>%">
    <span class="sr-only"><?php echo $c1; ?>%</span>
  </div>
  </div>
 <?php $c2 = ceil(100/$toplam*$scevap2); ?>
 <?php echo $anket["cevap2"]; ?>	<div class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
  aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $c2; ?>%">
    <span class="sr-only"><?php echo $c2; ?>%</span>
  </div>
  </div>
 <?php
 if(!empty($anket["cevap3"])){
 $c3 = ceil(100/$toplam*$scevap3); ?>
 <?php echo $anket["cevap3"]; ?>	<div class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
  aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $c3; ?>%">
    <span class="sr-only"><?php echo $c3; ?>%</span>
  </div>
  </div>
  <?php }
   if(!empty($anket["cevap4"])){
   $c4 = ceil(100/$toplam*$scevap4); ?>
 <?php echo $anket["cevap4"]; ?>	<div class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
  aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $c4; ?>%">
    <span class="sr-only"><?php echo $c4; ?>%</span>
  </div>
  </div>
 <?php }
 if(!empty($anket["cevap5"])){
  $c5 = ceil(100/$toplam*$scevap5); ?>
 <?php echo $anket["cevap5"]; ?>	<div class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
  aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $c5; ?>%">
    <span class="sr-only"><?php echo $c5; ?>%</span>
  </div>
  </div>
 <?php }
  if(!empty($anket["cevap6"])){
  $c6 = ceil(100/$toplam*$scevap6); ?>
<?php echo $anket["cevap6"]; ?>	<div class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
  aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $c6; ?>%">
    <span class="sr-only"><?php echo $c6; ?>%</span>
  </div>
</div>
<?php } ?>
</div>

</div>
</div>



</div>

<?php }else {echo "Buraya giriş yasak";} ?>
