<?php

	if(!$_POST){
	header("Location:../../index.php");
}

include "baglan.php";

$id = htmlspecialchars(strip_tags($_POST["gelenid"]));

$hcek = $db->query("Select * from haberler where id<$id order by id desc limit 5 ");
	

if($hcek->rowCount()!=0){	

	foreach($hcek as $sonuc){

	?>
	<li id="<?php echo $sonuc["id"]; ?>"><div class="ihaber col-md-12">
	<a target="_blank" href='/pro/h/<?php echo $sonuc["id"]."_".$sonuc["perma"]; ?>'>	<img src='<?php echo $sonuc["resimurl"]; ?>' alt='resim' id="hbrresim"/>	
	</a>
	<div id="detay"><a target="_blank" href='/pro/h/<?php echo $sonuc["id"]."_".$sonuc["perma"]; ?>'>
	<h3 id="dbaslik"><?php echo $sonuc["baslik"]; ?></h3></a>	
	<p id="daciklama"><?php echo substr($sonuc["metin"],0,350); ?></p>
	<a href="/pro/h/<?php echo $sonuc["id"]."_".$sonuc["perma"]; ?>" class="btn btn-primary right">Haberi oku</a> 
	</div>
	</div></li>

	<?php
			
	}
}else {
	?>
	<div class="alert alert-danger">Başka sonuç bulamadık.</div>	
	<?php
}

if(!$hcek){
	?>
	<div class="alert alert-danger">Başka sonuç bulamadık.</div>	
	<?php
}

?>