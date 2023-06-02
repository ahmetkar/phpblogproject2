<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/footer_view.php"){
?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/footer.js"></script>
<div class="row">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/footer.css" />

<div class="col-md-12 footer">
<div class="panel-body">
<div class="col-md-5 panel panel-default">
<div style="width:106%" class="kp panel-heading">Gazeteler</div>
<div class="panel-body">
	<ul style="float:left;margin-right:50px;">
		<li><a href="http://www.cumhuriyet.com.tr/">Cumhuriyet</a></li>
		<li><a href="http://www.zaman.com.tr/haber">Zaman</a></li>
		<li><a href="http://www.bugun.com.tr/">Bugün</a></li>
		<li><a href="http://www.taraf.com.tr/">Taraf</a></li>
		<li><a href="http://www.yurtgazetesi.com.tr/">Yurt</a></li>
		<li><a href="http://www.gazetevahdet.com/">Vahdet</a></li>
	</ul>
	<ul style="float:left;margin-right:50px;">
		<li><a href="http://www.milligazete.com.tr/">Milli gazete</a></li>
		<li><a href="http://www.milatgazetesi.com/">Milat</a></li>
		<li><a href="http://www.yeniakit.com.tr/">Akit</a></li>
		<li><a href="http://www.hurriyet.com.tr/">Hürriyet</a></li>
		<li><a href="http://www.milliyet.com.tr/">Milliyet</a></li>
		<li><a href="http://haberturk.com">Habertürk</a></li>
	</ul>
	<ul style="float:left;">
		<li><a href="http://star.com.tr">STAR</a></li>
		<li><a href="http://sozcu.com.tr">Sözcü</a></li>
		<li><a href="http://turkiyegazetesi.com.tr">Türkiye</a></li>
		<li><a href="http://yeniasya.com.tr">Yeni asya</a></li>
		<li><a href="http://aksam.com.tr">Akşam</a></li>
		<li><a href="http://sabah.com.tr">Sabah</a></li>

	</ul>
</div>
<div class="panel-heading">Site içi</div>
<div class="panel-body">

<ul style="float:left;margin-right:50px;">
		<li><a href="<?php echo base_url(); ?>bilgi/kunye">Künye</a></li>
		<li><a href="<?php echo base_url(); ?>bilgi/uyari">Uyarı</a></li>
		<li><a href="<?php echo base_url(); ?>resimgaleri">Resim galeri</a></li>
	</ul>
<ul style="float:left;margin-right:50px;">
		<li><a href="<?php echo base_url(); ?>uyelik/">Giriş yap</a></li>
		<li><a href="<?php echo base_url(); ?>uyelik/">Üye ol</a></li>
		<li><a href="<?php echo base_url(); ?>secimler/">Seçimler</a></li>
	</ul>
<ul style="float:left;">
		<li><a href="<?php echo base_url(); ?>iletisim/">İletişim</a></li>
		<li><a href="<?php echo base_url(); ?>">Ana sayfa</a></li>
		<li><a href="<?php echo base_url(); ?>iletisim/">Geri bildir</a></li>
	</ul>
</div>
</div>

<div class="col-md-7 panel panel-default">
<div width="105%" class="kp panel-heading">Gazetelerin 1.sayfaları</div>
<div class="panel-body">
<ul class="list-inline">
		<li class="col-md-2 hidden-sm hidden-xs" id="prev"><span class='glyphicon glyphicon-chevron-left'></span></li>
		<li class="col-md-2 hidden-md hidden-lg" id="prev"><span class='glyphicon glyphicon-chevron-up'></span></li>
</ul>
<?php
$this->load->helper("vericek_helper");

 ?>
<ul id="goruntule" class="col-md-12 list-inline goruntule">
	<li class="col-md-3"><?php gazetecek("http://www.ensonhaber.com/milligazete-gazetesi.htm"); ?></li>
	<li class="col-md-3"><?php gazetecek("http://www.ensonhaber.com/vahdet-gazetesi.htm"); ?></li>
	<li class="col-md-3"><?php gazetecek("http://www.ensonhaber.com/turkiye-gazetesi.htm"); ?></li>
	<li class="col-md-3"><?php gazetecek("http://www.ensonhaber.com/milliyet-gazetesi.htm"); ?></li>
	<li class="col-md-3"><?php gazetecek("http://www.ensonhaber.com/milat-gazetesi.htm"); ?></li>
	<li  class="col-md-3"><?php gazetecek("http://www.ensonhaber.com/sozcu-gazetesi.htm"); ?></li>
	<li class="col-md-3"><?php gazetecek("http://www.ensonhaber.com/hurriyet-gazetesi.htm"); ?></li>
	<li  class="col-md-3"><?php gazetecek("http://www.ensonhaber.com/akit-gazetesi.htm"); ?></li>
</ul>

<ul class="list-inline">
	<li class="col-md-2 hidden-sm hidden-xs" id="next"><span class='glyphicon glyphicon-chevron-right'></span></li>
	<li class="col-md-2 hidden-md hidden-lg" id="next"><span style="margin-top:-45px" class='glyphicon glyphicon-chevron-down'></span></li>
</ul>
</div>

</div>

</div>

<div style="width:102%" class="kp panel-footer">Copyright 2015 Eamm Tüm hakları saklıdır</div>
</div>


</div>



<?php
}else {
	echo "Buraya giriş yasak";
}
?>
