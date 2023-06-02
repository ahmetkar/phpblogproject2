<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/tekilview.php"){
?>
<!DOCTYPE html>
<html>
<head>
<SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=500,height=450,scrollbars=yes');
return false;
}
//-->
</SCRIPT>

<meta charset="UTF-8">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryforms.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/anasayfa.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/anasayfa.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/galeri.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/yorum.js"></script>

	<title><?php echo $gelen["baslik"]; ?></title>
</head>
<body>
<div class="container-fluid">
<link rel='stylesheet' type="text/css" href="<?php echo base_url(); ?>assets/css/yazi.css" />

<?php
    $data["usthaber"]=$haberler;

    $this->load->view("header_view",$data);


 ?>

<div class="col-md-9 panel panel-default">
<div class="kl panel-heading"><h3 class="panel-title"><?php echo $gelen["baslik"]; ?></h3></div>
<div class="panel-body">
<div class="ust">
<ol class="breadcrumb genislet">
  <li>Ana sayfa</li>
  <li><?php echo $gelen["katagoriid"]; ?></li>
  <li><?php echo $gelen["baslik"]; ?></li>
</ol>
<br>
</div>
<img class="col-md-4" id="haberresim" src='<?php echo $gelen["resimurl"]; ?>'>
<div class="col-md-8" id="imgyan">
<p id="aciklama" class="lead"><?php echo $gelen["aciklama"]; ?></p>
</div>
<p id="metin">
  <?php echo $gelen["metin"]; ?>
</p>



<div class="panel panel-default col-md-6">

<div class="gns panel-heading"><?php echo $gelen["baslik"]; ?> adlı haberi nasıl buldunuz ?</div>
<div class="panel-body">

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/islemyap.js"></script>
<?php
if($islemkontrol){
  echo "Daha önce bu haberi oyladınız";
  echo "<div class='col-md-12 alert alert-warning'>Bu yazıyı daha önce".$iyisayi." kişi iyi ve ".$kotusayi." kişi kötü buldu</div>";
  if($islemkontrol["iyi"]=="1"){
    echo "(Bu haberi iyi buldunuz)";
  }else if($islemkontrol["kotu"]=="1"){
    echo "(Bu haberi kötü buldunuz)";
  }
  }else { ?>
<div class="alert alert-info col-md-12" id="bilgi" style="display:none"></div><br>
<form action="yazi/yaziislem" method="post" id="islemform">
<input type="hidden" name="haberid" value="<?php echo $gelen["id"]; ?>" />
<input type="hidden" name="durum" value="1" />
<input id="islem"  type="button" class="col-md-6 btn btn-success" name="iyi" value="İyi buldum" />
</form>
<form action="yazi/yaziislem" method="post" id="islemform2">
<input type="hidden" name="haberid" value="<?php echo $gelen["id"]; ?>" />
<input type="hidden" name="durum" value="0" />
<input id="islem2" type="button" class="col-md-6 btn btn-danger" name="kotu" value="Kötü buldum" />
</form>
<?php } ?>
</div>
</div>
<div class="panel panel-default col-md-6">

<?php $mevcuturl = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; ?>
<div class="gns panel-heading">Bu haberi paylaş</div>
<div class="panel-body">
<a class='blur' href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $mevcuturl; ?>" onClick="return popup(this, 'notes')" rel='nofollow' target='_blank'><img title='facebook' border='0' height='35' src='<?php echo base_url(); ?>assets/resim/ficon.png' width='35'/></a>
<a class='blur' href="https://twitter.com/intent/tweet?url=<?php echo $mevcuturl; ?>&text=<?php echo $gelen["aciklama"]; ?>" onClick="return popup(this, 'notes')" rel='nofollow' target='_blank'><img title='twitter' border='0' height='36' src='<?php echo base_url(); ?>assets/resim/ticon.png' width='35'/></a>
<a class='blur' href="https://plus.google.com/share?url=<?php echo $mevcuturl; ?>" onClick="return popup(this, 'notes')" rel='nofollow' target='_blank'><img title='Google' border='0' height='35' src='<?php echo base_url(); ?>assets/resim/gicon.png' width='35'/></a>
<a class='blur' href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $mevcuturl; ?>title=<?php echo $gelen["baslik"]; ?>" onClick="return popup(this, 'notes')"  rel='nofollow' target='_blank'><img title='linkenldn' border='0' height='35' src='<?php echo base_url(); ?>assets/resim/lind.png' width='35'/></a>
<a class='blur' href="https://plus.google.com/share?url=<?php echo $mevcuturl; ?>" onClick="return popup(this, 'notes')" rel='nofollow' target='_blank'><img title='Blogger' border='0' height='35' src='<?php echo base_url(); ?>assets/resim/blicon.png' width='35'/></a>
</div>
</div>

<div class="panel panel-default col-md-12">
<div class="kl panel-heading">Hakkında yorum yap</div>
<div class="panel-body">
<div class="yorumyap">
<form action="yazi/yaziislem" method="post" id="yorumform">
<div class="alert alert-info col-md-12" id="ybilgi" style="display:none"></div>
<input type="hidden" name="yaziid" value="<?php echo $gelen["id"]; ?>" />
<?php
$oturum = $this->session->giris;
$adsoyad = $this->session->adsoyad;
$email = $this->session->email;
$resim = $this->session->resimurl;
?>
<?php if($oturum){
?>
<input type="hidden" name="adsoyad" class="col-md-12 form-control" value="<?php echo $adsoyad; ?>"><br><br>
<input type="hidden" name="email" class="col-md-12 form-control"  value="<?php echo $email; ?>"><br><br>
<?php echo "<img src='".$resim."' style='width:64px;height:64px;float:left;
margin-right:5px'><b>".$adsoyad."</b><br>".$email."<br>"; ?><br>
<?php
}else { ?>
<input type="text" name="adsoyad" class="col-md-12 form-control" placeholder="Ad soyad"><br><br>
<input type="text" name="email" class="col-md-12 form-control" placeholder="Email"><br><br>
<?php } ?>
<textarea name="yorum" class="col-md-12 form-control" placeholder="Yorum"></textarea>
<input id="yorumyap" type="button" class="btn btn-primary" value="Yorum yap" />
</form>
</div>
<ul class="list-inline yorumlar">
<?php foreach($yorumcek as $yorum){ ?>
<li id='<?php echo $yorum["id"]; ?>' class="<?php echo $gelen["id"]; ?>"><div class="media col-md-12 yorum">
 <?php if($yorum["ses"]=="0"){ ?>
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="<?php echo base_url(); ?>assets/resim/avatarnone.jpg" width="64" height="70" alt="...">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $yorum["adsoyad"]; ?></h4>
    <?php }else {
      ?>
      <div class="media-left">
    <a href="#">
      <img class="media-object" src="<?php echo $yorumyapan["resimurl"]; ?>" width="64" height="70" alt="...">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $yorumyapan["adsoyad"]; ?></h4>
      <?php
      } ?>
    <div id='yorum'><?php echo $yorum["yorum"]; ?>
  </div>
  &nbsp;<span id="yorumbegen" class="glyphicon glyphicon-thumbs-up"></span>0&nbsp;&nbsp;<span id="yorumdiss" class="glyphicon glyphicon-thumbs-down"></span>0
  </div>
</div></li>
<?php } ?>
</ul>
<?php
if(!empty($yorumcek)){
?>
<a class="digerleri col-md-12 btn btn-default">Diğer yorumları gör</a>
<?php
}

 ?>

</div>
</div>



</div>


</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sagalan.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sagalan.js"></script>
<div class="col-md-3 panel panel-default">
<div class="sg panel-heading">En çok tıklananlar</div>
<div class="panel-body">

<ul style="list-style:none" id="haberg">
<?php $i=0; foreach($encoktik as $coktik){$i++; ?>
<li class="col-md-12" id="bs"><span id="sayi" class="col-md-2"><?php echo $i; ?></span><h4 class="col-md-10" id="habergoster"><?php echo $coktik["baslik"]; ?></h4></li>

<li id="hbr"><div class="saghaber1 panel panel-default col-md-12">

<img src='<?php echo $coktik["resimurl"]; ?>' id='saghresim' alt='resim'>
<div id="sagdetay">
<a href='<?php echo $coktik["hedef"]; ?>'><h4 id='saghb'><?php echo $coktik["baslik"]; ?></h4>
<p id='saciklama'><?php echo substr($coktik["aciklama"],0,80); ?></p>
<span id="zaman"><?php echo $coktik["tarih"]; ?></span> </a>
</div>

</div></li>
<?php } ?>
</ul>

</div>
</div>
<div class="panel panel-default col-md-3">
<div class="sg panel-heading">Benzer haberler</div>
<div class="panel-body">
<?php

foreach($benzercek as $benzer)
  {

 ?>
  <div class="usteleman col-lg-12 col-md-12 col-sm-12">
<div id="bnbox">
<a href='<?php echo $benzer["hedef"]; ?>'>
  <img src='<?php echo $benzer["resimurl"]; ?>' id="usthaberresim" alt="resim"/>
<h3 id="bnbaslik"><?php echo $benzer["baslik"]; ?></h3>
</a>
</div>
</div>
<?php } ?>


</div>
</div>
<?php
$this->load->view("footer_view");
?>


</div>

<?php }else {echo "Buraya giriş yasak";} ?>
