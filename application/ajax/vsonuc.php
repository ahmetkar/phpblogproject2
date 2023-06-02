<?php

	if(!$_POST){
	header("Location:../../index.php");
}

include "baglan.php";

$id = htmlspecialchars(strip_tags($_POST["gelenid"]));

$hcek = $db->query("Select * from videogaleri where id<$id order by id desc limit 5 ");
	

if($hcek->rowCount()!=0){	

	foreach($hcek as $sonuc){

	?>
	<li id="<?php echo $sonuc["id"]; ?>"><div class="ihaber col-md-3">
	<a target="_blank" href='/pro/v/<?php echo $sonuc["id"]; ?>'>	<img src='<?php echo $sonuc["resimurl"]; ?>' alt='resim' id="rhbrresim"/>	
	</a>
	<div id="rdetay"><a target="_blank" href='/pro/v/<?php echo $sonuc["id"]; ?>'>
	<h3 id="rbaslik"><?php echo $sonuc["baslik"]; ?></h3></a>	
	<p id="raciklama"><?php echo substr($sonuc["aciklama"],0,100); ?></p>
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