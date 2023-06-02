<?php

if(!$_POST){
	header("Location:../../index.php");
}

include "baglan.php";

$veri = htmlspecialchars(strip_tags($_POST["veri"]));
	

$ara = $db->query("Select distinct baslik,etiketler from haberler where baslik like '$veri%' || etiketler like '$veri%' limit 4 ");
$ara2 = $db->query("Select distinct baslik,etiketler from resimgaleri where baslik like '$veri%' || etiketler like '$veri%' limit 4 ");
$ara3 = $db->query("Select distinct baslik,etiketler from videogaleri where baslik like '$veri%' || etiketler like '$veri%' limit 4 ");
if($ara->rowCount()!=0 || $ara2->rowCount()!=0 || $ara3->rowCount()!=0){

foreach($ara as $a){

echo "<li><a href='#'>".$a["baslik"]."</a></li>";

}

foreach($ara2 as $a2){
	echo "<li><a href='#'>".$a2["baslik"]."</a></li>";
}

foreach($ara3 as $a3){
	echo "<li><a href='#'>".$a3["baslik"]."</a></li>";
}

}else {
	echo "<li><a><b>".$veri."</b>  ile ilgili sonuç bulunamadı</a></li>";
}

if(!$ara || !$ara2 || !$ara3){

echo "<li><a><b>".$veri."</b>  ile ilgili sonuç bulunamadı</a></li>";

}


?>