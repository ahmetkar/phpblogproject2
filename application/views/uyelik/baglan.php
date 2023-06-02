<?php

try {
	
	$baglanti = "mysql:host=127.0.0.1;dbname=habervt;charset=utf8;";
	
	$db =new PDO($baglanti,"root","");
	$db->query("SET CHARACTER SET ISO-8859-9");

	
}catch(PDOException $e){
	
	print $e->getMessage();
	
	
}

?>