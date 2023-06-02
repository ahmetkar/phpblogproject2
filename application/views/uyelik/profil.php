<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/uyelik/profil.php"){

?>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryforms.js">
</script>
<script type="text/javascript">

$(function(){$(".usthaber").hide();$(".kayanhaber").hide();

$("span#ysil").click(function(){
$("#ybilgi").show();
$("form#ysilform").ajaxForm({
	target: '#ybilgi'
}).submit();
});

$("span#ysil2").click(function(){
$("#ybilgi").show();
$("form#ysilform2").ajaxForm({
	target: '#ybilgi'
}).submit();
});

$("span#ysil3").click(function(){
$("#ybilgi").show();
$("form#ysilform3").ajaxForm({
	target: '#ybilgi'
}).submit();
});

});

</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/profil.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/anasayfa.css" />

	<title><?php echo $uye["adsoyad"]; ?> adlı kişinin profili</title>
</head>
<body>
<div class="container-fluid">
<link rel='stylesheet' type="text/css" href="<?php echo base_url(); ?>assets/css/yazi.css" />
<?php
error_reporting(0);
$data["usthaber"]=array("haberyok");
$this->load->view("header_view",$data);

if($this->session->giris){
$id = $this->session->id;
$seg =$this->uri->segment(3,0);
}else {
	$id=0; $seg=1;
}
?>

<div class="col-md-12 panel panel-default">
<div class="kl panel-heading"><h3 class="panel-title"><?php echo $uye["adsoyad"]; ?> adlı kişinin profili</h3></div>
<div class="col-md-3"><br>
<?php if(!$uye["resimurl"]){
?>
<img src='<?php echo base_url(); ?>assets/resim/avatarnone.jpg' width="100%" height="200" />
<?php
	}else { ?>
<img src='<?php echo $uye["resimurl"]; ?>' width="100%" height="200" />
<?php } ?>
</div>
<div class="col-md-9 bilgi panel panel-default">
<div class="panel-body">
 <ul id="tabmenu" class="nav nav-pills" role="tablist">
  <li role="presentation"><a href="#"><span class="glyphicon glyphicon-globe icon "></span>Profil<span class="badge"><?php echo $hsay; ?></span></a></li>
  <li role="presentation"><a href="#"><span class="glyphicon glyphicon-comment icon "></span>Yorumlar<span class="badge"><?php echo $rsay; ?></span></a></li>
</ul><br><br>
<div class='uyebilgi tabview'>
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;<b>Ad soyad :</b><?php echo $uye["adsoyad"]; ?><br>
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;<b>Kullanıcı adı :</b><?php echo $uye["kadi"]; ?><br>
<form action="" method="post" id="duzenle">
<input type="hidden" name="uyeid" id="uyeid" value="<?php echo $uye["id"]; ?>" />
<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;<b>Yaşadığı yer : </b><i style="float:left"></i><a id='degisken'><?php
if(empty($uye["yasadigiyer"])){
	echo "Henüz belirtmemiş";
}else {
echo $uye["yasadigiyer"]; }
if($id==$seg){
echo '&nbsp;<a class="duzenle">[Düzenle]</a>';
}
?>
<br>
</a>
<input style="border:0;" placeholder="Yaşadığınız yer:" value="<?php echo $uye["yasadigiyer"]; ?>" type="text" name="yasadigiyer" class="deg" />
<div id="clear" style="clear:left"></div>
<span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;<b>Eğitim durumu : </b><a id='degisken2'><?php
if(empty($uye["egitim"])){
	echo "Henüz belirtmemiş";
}else {
echo $uye["egitim"];}
if($id==$seg){
	echo '&nbsp;<a class="duzenle2">[Düzenle]</a>';
}
?><br></a>
<input style="border:0;" placeholder="Eğitim durumunuz :" value="<?php echo $uye["egitim"]; ?>" type="text" name="egitim" class="deg2" />
</form>
<div id="clear" style="clear:left" />
<span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;<b>Email adresi : </b><?php echo $uye["email"]; ?><br>
<span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;<b>Kayıt tarihi : </b><?php echo $uye["tarih"]; ?><br>
<span class="glyphicon glyphicon-record"></span>&nbsp;&nbsp;<b>Online :
<?php if($uye["online"]=="0"){
	echo "<font color='red'>Çevrimdışı</font>";
	}else {
		echo "<font color='green'>Çevrimiçi</font>";
		} ?> </b><br>
</div>
</div>
<div class="yapilanyorumlar tabview">
<div class="col-md-12 alert alert-info" id="ybilgi" style="display:none"></div>
<h3><small>Haberlere yapılan yorumlar</small></h3><br>

<?php
include "baglan.php";
foreach($yorumlar as $yorum){
if(count($yorumlar)<5){
$hid =  $ryorum["haberid"];
$bulh = $db->query("Select * from haberler where id='$hid' ")->fetch();
?>
<a id='haberid' href='<?php echo $bulh["hedef"]; ?>'><b></a><?php echo $bulh["baslik"]; ?></b> haberi için
<?php echo $yorum["yorum"]; ?> dedi.<form style="float:left" action="ysil" id="ysilform" method="post">
<input type="hidden" name="yorumid" value="<?php echo $bulh["id"]; ?>" />
<input type="hidden" name="tur" value="1" />
<span title="Yorumu sil" id="ysil" class="glyphicon glyphicon-remove"></span>
</form>&nbsp;&nbsp;<br>
<?php
} } ?>
<br>
<h3><small>Resim galerilerine yapılan yorumlar</small></h3><br>
<?php foreach($ryorumlar as $ryorum){
if(count($ryorumlar)<5){
$rid =  $ryorum["rgaleriid"];
$bulr = $db->query("Select * from resimgaleri where id='$rid' ")->fetch();
?>
<a id='haberid' href='<?php echo $bulr["hedef"]; ?>'><b><?php echo $bulr["baslik"]; ?></b></a> galerisi için
<?php echo $vyorum["yorum"]; ?> dedi.<form style="float:left" action="ysil" id="ysilform2" method="post">
<input type="hidden" name="yorumid" value="<?php echo $bulr["id"]; ?>" />
<input type="hidden" name="tur" value="2" />
<span title="Yorumu sil" id="ysil2" class="glyphicon glyphicon-remove"></span>
</form>&nbsp;&nbsp;<br>
<?php
} } ?>
<br>

<h3><small>Videolara yapılan yorumlar</small></h3><br>
<?php foreach($vyorumlar as $vyorum){
if(count($vyorumlar)<5){
$vid =  $vyorum["vgaleriid"];
$bul = $db->query("Select * from videogaleri where id='$vid' ")->fetch();

?>
<a id='haberid' href='<?php echo $bul["hedef"]; ?>'><b><?php
echo $bul["baslik"]; ?> </b></a>videosu için "
<?php echo $vyorum["yorum"]; ?> " dedi.<form id="ysilform3" style="float:left" action="<?php echo base_url(); ?>uyelik/ysil" method="post">
<input type="hidden" name="yorumid" value="<?php echo $bul["id"]; ?>" />
<input type="hidden" name="tur" value="3" />
<span title="Yorumu sil" id="ysil3" class="glyphicon glyphicon-remove"></span>
</form>&nbsp;&nbsp;<br>
<?php
}  }?>

<br>


</div>

</div>

</div>


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
