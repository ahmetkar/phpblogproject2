<?php

	if(!$_POST){
	header("Location:../../index.php");
}

include "baglan.php";


$id = htmlspecialchars(strip_tags($_POST["gelenid"]));
$kid = htmlspecialchars(strip_tags($_POST["kid"]));
$hcek = $db->query("Select * from haberler where id<$id && katagoriid=$kid order by id desc limit 5 ");
	

if($hcek->rowCount()!=0){	

	foreach($hcek as $katagori){

	?>
	<li class="<?php echo $katagori["katagoriid"]; ?>" id='<?php echo $katagori["id"]; ?>'><div class="ihaber col-md-12">
<a target="_blank" href='/pro/h/<?php echo $katagori["id"]."_".$katagori["perma"]; ?>'>	<img src='<?php echo $katagori["resimurl"]; ?>' alt='resim' id="hbrresim"/>	
</a>
<div id="detay">
<a target="_blank" href='/pro/h/<?php echo $katagori["id"]."_".$katagori["perma"]; ?>'><h3 id="dbaslik"><?php echo $katagori["baslik"]; ?></h3></a>	
<p id="daciklama"><?php echo substr($katagori["metin"],0,350); ?></p>
<a href="/pro/h/<?php echo $katagori["id"]."_".$katagori["perma"]; ?>" class="btn btn-primary right">Haberi oku</a> 
</div>
</div></li>

	<?php
			
	}
}else {
	?>
	<div class="alert alert-danger">Başka haber bulamadık.</div>	
	<?php
}

if(!$hcek){
	?>
	<div class="alert alert-danger">Başka haber bulamadık.</div>	
	<?php
}

?>