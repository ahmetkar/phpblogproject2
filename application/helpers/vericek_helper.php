
<?php
function gazetecek($site)
{
 
$ch = curl_init();

$hc = "YahooSeeker-Testing/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; Yahoo! Search - Web Search)";

curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');

curl_setopt($ch, CURLOPT_URL, $site);

curl_setopt($ch, CURLOPT_USERAGENT, $hc);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$site = curl_exec($ch);

curl_close($ch);


@preg_match_all('@<div class="gazte">(.*?)</div>@si',$site,$veri);

echo $veri[0][0];




}

?>