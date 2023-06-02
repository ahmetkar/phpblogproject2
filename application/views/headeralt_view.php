<?php
if($_SERVER['PHP_SELF']!="".base_url()."application/views/headeralt_view.php"){
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
<div class="col-md-7 slider">

<div style="height:280px;width:100%;padding:0px;margin:0px" id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php
  $i=0;
  foreach($hthaber as $slid){
   if($slid["slider"]=="1"){
    $i++;
    if($i=="1"){
    ?><li data-target="#" data-slide-to="<?php echo $i; ?>" class="active"></li><?php
    }else {
   ?>
    <li data-target="#" data-slide-to="<?php echo $i; ?>"></li> <?php } ?>
    <?php } } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div style="height:100%" class="carousel-inner" role="listbox">
  <?php $j=0; foreach($hthaber as $slider){

    if($slider["slider"]=="1"){
      $j++;
    if($j=="1"){
    ?>
    <div style="height:100%" class="item active">
    <?php }else {
      ?>
      <div style="height:100%" class="item">
     <?php } ?>
     <a href='<?php echo $slider["hedef"]; ?>'>
      <img width="100%" height="100%" src="<?php echo $slider["resimurl"]; ?>" title="<?php echo $slider["baslik"]; ?>">
    </a>
    </div><?php } ?>
<?php } ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Geri</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">İleri</span>
  </a>
</div>
<br>
</div>
<div class="panel panel-default col-md-5 col-xs-12 col-sm-12 sagh">
<?php foreach($usth as $ht){
if($ht["ust"]=="2"){
 ?>
<div class="col-md-6 col-xs-12 col-sm-6 saghaber">
<div id="imgkutu">
 <a href='<?php echo $ht["hedef"]; ?>'><img src="<?php echo $ht["resimurl"]; ?>" id="sresim" alt="resim" />
<h3 id="sgbaslik"><?php echo $ht["baslik"]; ?></h3></a>
</div>
</div><?php } } ?>

</div>
</div>

<?php }else {echo "Buraya giriş yasak";} ?>
