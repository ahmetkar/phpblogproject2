<?php

function permalink($deger) {

$turkce=array("ş","Ş","ı","(",")","'","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü");

$duzgun=array("s","S","i","","","","u","U","o","O","c","C","-","-","-","","s","S","i","g","G","I","o","O","C","c","u","U");

$deger=str_replace($turkce,$duzgun,$deger);

$deger = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger);

return strtolower($deger);

}


function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
 		$ip = getenv("HTTP_CLIENT_IP");
 	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 		$ip = getenv("HTTP_X_FORWARDED_FOR");
 		if (strstr($ip, ',')) {
 			$tmp = explode (',', $ip);
 			$ip = trim($tmp[0]);
 		}
 	} else {
 	$ip = getenv("REMOTE_ADDR");
 	}
	return $ip;
}


?>