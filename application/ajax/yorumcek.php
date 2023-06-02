<?php

	if(!$_POST){
	header("Location:../../index.php");
}

include "baglan.php";

$id = htmlspecialchars(strip_tags($_POST["gelenid"]));
$hid = htmlspecialchars(strip_tags($_POST["yaziid"]));

$hcek = $db->query("Select * from haberyorum where id<$id && haberid=$hid && onay=1 order by id desc limit 5 ");
	

if($hcek->rowCount()!=0){	

	foreach($hcek as $yorum){

	?>
	<li id='<?php echo $yorum["id"]; ?>' class="<?php echo $yorum["haberid"]; ?>"><div class="media col-md-12 yorum">
	  <div class="media-left">
	    <a href="#">
	      <img class="media-object" src="/pro/assets/resim/hd1.jpg" width="64" height="70" alt="...">
	    </a>
	  </div>
	  <div class="media-body">
	    <h4 class="media-heading"><?php echo $yorum["adsoyad"]; ?></h4>
	    <div id='yorum'><?php echo $yorum["yorum"]; ?>
	  </div>
	  &nbsp;<span id="yorumbegen" class="glyphicon glyphicon-thumbs-up"></span>0&nbsp;&nbsp;<span id="yorumdiss" class="glyphicon glyphicon-thumbs-down"></span>0
	  </div>
	</div></li>

	<?php
			
	}
}else {
	?>
	<div class="alert alert-danger">Başka yorum bulamadık.</div>	
	<?php
}

if(!$hcek){
	?>
	<div class="alert alert-danger">Başka yorum bulamadık.</div>	
	<?php
}

?>