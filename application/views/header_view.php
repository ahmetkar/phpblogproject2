<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/header_view.php"){
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryforms.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/header.css" />
<div class="row header">

<div class="col-md-5 wd">
<h3 id="logo">Haber Sitesi</h3>
</div>

<div style="padding-top:20px" class="arama col-md-7">

<form action="sonuclar" method="get">
	<input autocomplete="off" style="float:left;width:80%;margin-right:10px" type="text" class="form-control" name="ara" placeholder="Haberlerde arayın.." />
	<input style="float:left" type="submit" id="arabuton" class="btn btn-danger" value="Arama" />
</form>
<div  style="display:none"  class="col-md-10 hizlisonuc">
<ul style="list-style:none"></ul>

</div>

</div>
<nav class="ustmenu col-md-12 navbar navbar-default">
  <div id="ustmenu" class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul id="ustul" class="nav navbar-nav">
        <li>
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>"> <span class="glyphicon glyphicon-home" style="font-size:20px"></span></a>
    </div>
</li>
        <li>
<a href='<?php echo base_url(); ?>2_spor'>Spor</a>
</li>
<li>
<a href='<?php echo base_url(); ?>3_siyaset'>Siyaset</a>
</li>
<li>
<a href='<?php echo base_url(); ?>7_kultur-sanat'>Kültür-sanat</a>
</li>
<li>
<a href='<?php echo base_url(); ?>4_ekonomi'>Ekonomi</a>
</li>
<li>
<a href='<?php echo base_url(); ?>1_gundem'>Gündem</a>
</li>
<li>
<a href='<?php echo base_url(); ?>5_dunya'>Dünya</a>
</li>
<li>
<a href='<?php echo base_url(); ?>6_teknoloji'>Teknoloji</a>
</li>
<li>
<a href='<?php echo base_url(); ?>iletisim'>Geri bildir</a>
</li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Diğer <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a style="color:black" href="#">Seçimler</a></li>
            <li><a style="color:black" href="<?php echo base_url(); ?>videogaleri/">Video galeri</a></li>
            <li><a style="color:black" href="<?php echo base_url(); ?>resimgaleri/">Resim galeri</a></li>
             <li role="separator" class="divider"></li>
            <li><a style="color:black" href="<?php echo base_url(); ?>iletisim">İletişim</a></li>
            <li><a style="color:black" href="<?php echo base_url(); ?>bilgi/kunye">Künye</a></li>
            <li><a style="color:black" href="<?php echo base_url(); ?>uyelik/">Giriş yapın</a></li>
            <li><a style="color:black" href="<?php echo base_url(); ?>uyelik/">Üye olun</a></li>
            <li><a style="color:black" href="<?php echo base_url(); ?>bilgi/uyari">Uyarı</a></li>
          </ul>
        </li>
  <li><span id="down" style="font-size:18px;margin-top:15px" class="glyphicon glyphicon-chevron-down"></span>
      <span style="font-size:18px;margin-top:15px;display:none" id="up" class="glyphicon glyphicon-chevron-up"></span></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
  $giris = $this->session->giris;
  $resim = $this->session->resimurl;

 if($giris){
?>
<div class="uyepanel col-md-12 panel panel-default">
<?php
 }else {
?>
<div style="display:none" class="uyepanel col-md-12 panel panel-default">
<?php } ?>
  <div class="panel-body">

  <?php


  if(!$giris){

  ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/giris.js"></script>
  <div class="col-md-12 girisyapmayan">
  <div class="col-md-5">
  <div id="girisbilgi" class="girisbilgi col-md-12 alert alert-info" style="display:none"></div>
  <form action='<?php echo base_url(); ?>uyelik/girisyap' method='post' id='girisform'>
  <input type="text" name="kadi" placeholder="Kullanıcı adı " class="control col-md-6" />
  <input type="password" name="sifre" placeholder="Şifrenizi girin." class="control col-md-6" />
  </div>
  <div class="col-md-5">
  <input type="button" class="col-md-3 btn btn-danger"  value="Giriş yap" id="girisyap" />
  </form>
  <div class="col-md-1"></div>
  <div class="col-md-3">
   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">Ve ya <span class="caret"></span></button>
     <ul class="dropdown-menu">
          <li><a href="#"><span class="label label-primary">Facebookla giriş yap</span></a></li>
          <li><a href="#"><span class="label label-info">Twitterle giriş yap</span></a></li>
          <li role="separator" class="divider"></li>
          <li><a href="<?php echo base_url(); ?>uyelik/">Üye ol</a></li>
        </ul>
       </div>

  </div>
</div>
<?php }else { ?>
  <div class="girisyapan">
  <ul class="nav nav-pills" role="tablist">
  <li role="presentation" class="active"><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home icon "></span>Ana sayfa</a></li>
  <li role="presentation"><a href="<?php echo base_url(); ?>uyelik/profil/<?php echo $this->session->id; ?>"><span class="glyphicon glyphicon-user icon "></span>Profil</a></li>
  <ul class="nav navbar-nav navbar-right">
        <li class="drp dropdown">
        <a href="<?php echo base_url(); ?>uyelik/profil/<?php echo $this->session->id; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span id="img">
          <?php
           if(!empty($resim)){ ?>
          <img class="resimtrue" id="uyeprofil" src='<?php echo $resim; ?>' width="28" style="margin-right:4px" height="28">
          <?php }else {
            ?>
            <img class="resimfalse" id="uyeprofil" src='<?php echo base_url(); ?>assets/resim/avatarnone.jpg' width="28" style="margin-right:4px" height="28">
            <?php
            } ?>
          </span><?php echo $this->session->kadi; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>uyelik/cikis">Çıkış yap</a></li>
            <li><a href="<?php echo base_url(); ?>uyelik/profiliduzenle">Profilini düzenle</a></li>
          </ul>
        </li>
      </ul>
</ul>
  </div>
<?php } ?>
  </div>
  </div>
</div>
<div class="col-md-12 panel panel-default usthaber">
<?php foreach($usthaber as $ust){
if($ust["ust"]=="1"){ ?>
<div class="usteleman col-md-2">
<div id="imgbox">
	<a href='<?php echo base_url(); ?>h/<?php echo $ust["id"]."_".$ust["perma"]; ?>'>
  <img src='<?php echo $ust["resimurl"]; ?>' id="usthaberresim" alt="resim"/>
<h3 id="usthbslk"><?php echo $ust["baslik"]; ?></h3>
</a>
</div>
</div><?php } ?>
<?php } ?>
</div>

<div class="col-md-12 panel panel-default kayanhaber">
<marquee>
<ul class="list-inline">
<?php foreach($usthaber as $kayan){
  if($kayan["ust"]=="3"){
  ?>
<li><span class="nw glyphicon glyphicon-paperclip"></span><a href='<?php echo $kayan["hedef"]; ?>'><?php echo $kayan["baslik"]; ?></a></li>
<?php } } ?>
</ul>
</marquee>
</div>
<?php }else {echo "Buraya giriş yasak";} ?>
