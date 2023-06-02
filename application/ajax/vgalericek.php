<?php

	if(!$_POST){
	header("Location:../../index.php");
}

include "baglan.php";

$id = htmlspecialchars(strip_tags($_POST["gelenid"]));

$hcek = $db->query("Select * from videogaleri where id<$id order by id desc limit 8 ");
	

if($hcek->rowCount()!=0){	

	foreach($hcek as $galeri){

	?>
	<li id='<?php echo $galeri["id"]; ?>'><div class="ihaber col-md-4">
	<a target="_blank" href='/pro/v/<?php echo $galeri["id"]; ?>'>	<img src='<?php echo $galeri["resimurl"]; ?>' alt='resim' id="hbrresim"/>	
	</a>
	<div id="detay">
	<a target="_blank" href='/pro/v/<?php echo $galeri["id"]; ?>'>
	<h3 id="dbaslik"><?php echo $galeri["baslik"]; ?></h3></a>	
	<p id="daciklama"><?php echo $galeri["aciklama"]; ?></p></div>
	</div></li>

	<?php
			
	}
}else {
	?>
	<div class="alert alert-danger">Başka galeri bulamadık.</div>	
	<?php
}

if(!$hcek){
	?>
	<div class="alert alert-danger">Başka galeri bulamadık.</div>	
	<?php
}

?>