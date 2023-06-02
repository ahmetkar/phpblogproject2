<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/videoview.php"){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/yorum.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/anasayfa.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/anasayfa.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/galeri.js"></script>
	<title><?php echo $gelen["baslik"]; ?></title>
</head>
<body>
<div class="container-fluid">
<link rel='stylesheet' type="text/css" href="<?php echo base_url(); ?>assets/css/yazi.css" />
<?php
  $data["usthaber"]=$haberler;

    $this->load->view("header_view",$data);
 ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/video.css" />
<div class="col-md-9 panel panel-default">
<div class="kl panel-heading"><h3 class="panel-title"><?php echo $gelen["baslik"]; ?></h3></div>
<div class="panel-body">
<div class="col-md-12 panel panel-default video">
<iframe width="100%" height="400" src="<?php echo $gelen["videourl"]; ?>" frameborder="0" allowfullscreen></iframe>
</div>
<div class="col-md-12 panel panel-default videoalt">
<div class="col-md-6 aciklama">
<?php echo $gelen["aciklama"]; ?>
</div>
<div class="col-md-6 goruntulenme">
  <p id='gor'><span class="glyphicon glyphicon-play-circle"></span><?php echo $gelen["tik"]; ?> Görüntülenme</p>
</div>

</div>


<div class="panel panel-default col-md-6">

<div class="gns panel-heading"><?php echo $gelen["baslik"]; ?> adlı videoyu nasıl buldunuz ?</div>
<div class="panel-body">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryforms.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/islemyap.js"></script>
<?php
if($islemkontrol){
  echo "Daha önce bu videoyu oyladınız";
  echo "<div class='col-md-12 alert alert-warning'>Bu videoyu daha önce".$iyisayi." kişi iyi ve ".$kotusayi." kişi kötü buldu</div>";
  if($islemkontrol["iyi"]=="1"){
    echo "(Bu videoyu iyi buldunuz)";
  }else if($islemkontrol["kotu"]=="1"){
    echo "(Bu videoyu kötü buldunuz)";
  }
  }else { ?>
<div class="alert alert-info col-md-12" id="bilgi" style="display:none"></div><br>
<form action="vgislem" method="post" id="islemform">
<input type="hidden" name="galeriid" value="<?php echo $gelen["id"]; ?>" />
<input type="hidden" name="durum" value="1" />
<input id="islem"  type="button" class="col-md-6 btn btn-success" name="iyi" value="İyi buldum" />
</form>
<form action="vgislem" method="post" id="islemform2">
<input type="hidden" name="galeriid" value="<?php echo $gelen["id"]; ?>" />
<input type="hidden" name="durum" value="0" />
<input id="islem2" type="button" class="col-md-6 btn btn-danger" name="kotu" value="Kötü buldum" />
</form>
<?php } ?>
</div>
</div>
<div class="panel panel-default col-md-6">

<?php $mevcuturl = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; ?>
<div class="gns panel-heading">Bu videoyu paylaş</div>
<div class="panel-body">
<a class='blur' href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $mevcuturl; ?>" onClick="return popup(this, 'notes')" rel='nofollow' target='_blank'><img title='facebook' border='0' height='35' src='<?php echo base_url(); ?>assets/resim/ficon.png' width='35'/></a>
<a class='blur' href="https://twitter.com/intent/tweet?url=<?php echo $mevcuturl; ?>&text=<?php echo $gelen["aciklama"]; ?>" onClick="return popup(this, 'notes')" rel='nofollow' target='_blank'><img title='twitter' border='0' height='36' src='<?php echo base_url(); ?>assets/resim/ticon.png' width='35'/></a>
<a class='blur' href="https://plus.google.com/share?url=<?php echo $mevcuturl; ?>" onClick="return popup(this, 'notes')" rel='nofollow' target='_blank'><img title='Google' border='0' height='35' src='<?php echo base_url(); ?>assets/resim/gicon.png' width='35'/></a>
<a class='blur' href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $mevcuturl; ?>title=<?php echo $gelen["baslik"]; ?>" onClick="return popup(this, 'notes')"  rel='nofollow' target='_blank'><img title='linkenldn' border='0' height='35' src='<?php echo base_url(); ?>assets/resim/lind.png' width='35'/></a>
<a class='blur' href="https://plus.google.com/share?url=<?php echo $mevcuturl; ?>" onClick="return popup(this, 'notes')" rel='nofollow' target='_blank'><img title='Blogger' border='0' height='35' src='<?php echo base_url(); ?>assets/resim/blicon.png' width='35'/></a>
</div>
</div>


<div class="panel panel-default col-md-12">

<div class="kl panel-heading">Video hakkında yorum yap</div>
<div class="panel-body">
<div class="yorumyap">
<form action="yorumyap" method="post" id="yorumform">
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
margin-right:5px'><b>".$adsoyad."</b><br>".$email."<br>"; ?><br><br>
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
<?php foreach($yorumcek as $yorum){  ?>
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
<a class="vdigerleri col-md-12 btn btn-default">Diğer yorumları gör</a>
<?php
}

 ?>


</div>
</div>



</div>


</div>
<div class="col-md-3 panel panel-default">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/kapla.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/kapla.js"></script>
<div class="kl panel-heading">Benzer videolar</div>
<div class="panel-body">
<?php foreach($benzercek as $benzer){ ?>
  <div class="usteleman col-lg-12 col-md-12 col-sm-12">
<a href='<?php echo $benzer["hedef"]; ?>'><div style="display:none" id="kapla">
<span class="glyphicon glyphicon-facetime-video kicon"></span>
</div></a>
<div id="bnbox">
  <img src='<?php echo $benzer["resimurl"]; ?>' id="benzerresim" alt="resim"/>
<h3 id="bnbaslik"><?php echo $benzer["baslik"]; ?></h3>
</div>
</div>
<?php } ?>
</div>


</div>
<div class="col-md-3 panel panel-default">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/kapla.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/kapla.js"></script>
<div class="kl panel-heading">En çok seyredilenler</div>
<div class="panel-body">
<?php foreach($encoktik as $encok){ ?>
  <div class="usteleman col-lg-12 col-md-12 col-sm-12">
<a href='<?php echo $encok["hedef"]; ?>'><div style="display:none" id="kapla">
<span class="glyphicon glyphicon-picture kicon"></span>
</div></a>
<div id="bnbox">
 <a href='<?php echo base_url(); ?>galeri/<?php echo $encok["id"]; ?>'> <img src='<?php echo $encok["resimurl"]; ?>' id="benzerresim" alt="resim"/>
<h3 id="bnbaslik"><?php echo $encok["baslik"]; ?></h3></a>
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
