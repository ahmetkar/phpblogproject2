<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/uyelik/profiliduzenle.php"){

if($this->session->giris==true){
?>
    <html>
    <head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/profil.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/anasayfa.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryforms.js"></script>
      <script type="text/javascript">
      $(function(){
        $(".usthaber").hide();
        $(".kayanhaber").hide();

      $("input#duzenle").click(function(){
        $("#bilgi").show();
      $("form#profilayar").ajaxForm({
        target: '#bilgi'
      }).submit();

      });

      $("input#guvgun").click(function(){
        $("#bilgi").show();
      $("form#guvenlikf").ajaxForm({
        target: '#bilgi'
      }).submit();

      });

        });
      </script>
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


     <ul id="tabmenu" class="nav nav-pills" role="tablist">
      <li role="presentation"><a href="#"><span class="glyphicon glyphicon-globe icon "></span>Profil ayarları</a></li>
      <li role="presentation"><a href="#"><span class="glyphicon glyphicon-flag icon "></span>Güvenlik</a></li>
    </ul>

  <div class="panel-body">
    <div id="bilgi" class="alert alert-info col-md-12" style="display:none"></div>
  <div class="profil tabview">
    <form  id="profilayar" action="<?php echo base_url(); ?>uyelik/duzenle" method="post">
      <label class="col-md-4">Yaşadığınız yer :</label><input value="<?php echo $uye["yasadigiyer"]; ?>" type="text" name="yasadigiyer" class="control col-md-8" placeholder="Yaşadığınız yer:" /><br><br>
      <label class="col-md-4">Eğitim durumunuz :</label><input value="<?php echo $uye["egitim"]; ?>" type="text" name="egitim" class="control col-md-8" placeholder="Eğitim Durumunuz :" /><br><br>
      <label class="col-md-4">Ad soyad :</label><input value="<?php echo $uye["adsoyad"]; ?>" type="text" name="adsoyad" class="control col-md-8" placeholder="Ad ve soyadınız" /><br><br><br>
      <?php if(empty($uye["resimurl"])){
      ?>
        <input type="hidden" name="eskiresim" value="<?php echo base_url(); ?>assets/resim/avatarnone.jpg" />
      <?php
      }else {
        ?>
          <input type="hidden" name="eskiresim" value="<?php echo $uye["resimurl"]; ?>" />
        <?php
      } ?>
      <input type="hidden" name="eskiresim" value="<?php echo base_url(); ?>assets/resim/avatarnone.jpg" />
      <img class="col-md-3" id="eskiresim" width="150px" height="150px" src='<?php
      if(empty($uye["resimurl"])){
      echo "<?php echo base_url(); ?>assets/resim/avatarnone.jpg";
      }else {
      echo $uye["resimurl"];} ?>' />
      <input type="file" name="resim" class="alert alert-warning col-md-5" value="eskiresim" /><br>
<br><br><br><br><br>
      <input id="duzenle" type="button" class="btn btn-primary col-md-4" value="Bilgileri düzenle" style="float:right" />
    </form>
  </div>

    <div class="guvenlik tabview">
      <form id="guvenlikf" action="<?php echo base_url(); ?>uyelik/guvenlik" method="post">
        <label class="col-md-4">Eski şifreniz :</label><input class="col-md-6 control" type="password" name="eskisifre" placeholder="Zorunludur" /><br>
        <label class="col-md-4">Yeni şifreniz :</label><input class="col-md-6 control" type="password" name="yenisifre" placeholder="İsteğe bağlı" /><br>
        <label class="col-md-4">Email adresiniz :</label><input class="col-md-6 control" type="text" name="email" placeholder="email adresiniz" value="<?php echo $uye["email"]; ?>"  />
        <br><br><br>
        <input type="button" value="Bilgileri güncelle" class="btn btn-primary col-md-4" style="float:right
        ;margin-top:15px" id="guvgun" />
      </form>
    </div>

  </div>

</div>


  <?php $this->load->view("footer_view"); ?>


</div>
<?php
}else {
	echo "lütfen giriş yapın";
}
}else {
	echo "Buraya giriş yasak";
}
 ?>
