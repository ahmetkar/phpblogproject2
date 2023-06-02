<?php
if(!$_POST){header("Location:/index.php");}
include "baglan.php";
error_reporting(0);
$post1 = htmlspecialchars(strip_tags(trim($_POST["val"])));
$post2 = htmlspecialchars(strip_tags(trim($_POST["val2"])));

$al = $post1;
$al2 = $post2;

$id = $_POST["id"];

if($post1){
$guncelle = $db->prepare("update uyeler set yasadigiyer=? where id=? ");
$tamamla = $guncelle->execute(array($post1,$id));
if($tamamla){echo $al;}else {echo "Sorun var";}
}

if($post2){
  $guncelle2 = $db->prepare("update uyeler set egitim=? where id=? ");
  $tamamla2 = $guncelle2->execute(array($post2,$id));
  if($tamamla2){echo $al2;}else {echo "Sorun var";}
}


 ?>
