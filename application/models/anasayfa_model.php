<?php

class anasayfa_model extends CI_Model {

public function habercek(){

$this->db->select("*");
$this->db->from("haberler");
$this->db->order_by("id","desc");
$this->db->limit("9");

$getir = $this->db->get();
if($getir->num_rows()){
return $getir->result_array(); 
}else {
return false;
}

}

public function ustcek(){

$this->db->select("*");
$this->db->from("haberler");
$this->db->where("ust","2");
$this->db->order_by("id","desc");
$this->db->limit("4");

$getir = $this->db->get();
if($getir->num_rows()){
return $getir->result_array(); 
}else {
return false;
}

}

public function tekilcek($id) //Anasayfadaki katagori (forever)
{

$this->db->select("*");
$this->db->from("haberler");
$this->db->where("katagoriid",$id);
$this->db->order_by("id","desc");
$this->db->limit("10");

$getir = $this->db->get();
if($getir->num_rows()){
return $getir->result_array(); 
}else {
return false;
}

}

public function encoktik()
{

$this->db->select("*");
$this->db->from("haberler");
$this->db->order_by("tik","desc");
$this->db->limit("5");

$getir = $this->db->get();
if($getir->num_rows()){
return $getir->result_array(); 
}else {
return false;
}

}


public function galericek(){


$this->db->select("*");
$this->db->from("resimgaleri");
$this->db->order_by("id","desc");
$this->db->limit("8");

$getir = $this->db->get();
if($getir->num_rows()){
return $getir->result_array(); 
}else {
return false;
}

}

public function vgalericek(){


$this->db->select("*");
$this->db->from("videogaleri");
$this->db->order_by("id","desc");
$this->db->limit("8");

$getir = $this->db->get();
if($getir->num_rows()){
return $getir->result_array(); 
}else {
return false;
}

}


public function yorumal(){

$this->db->select("*");
$this->db->from("haberyorum");


$getir = $this->db->get();

return $getir->result_array();


}


public function enson(){

$this->db->select("*");
$this->db->from("haberyorum");
$this->db->order_by("id","desc");

$al = $this->db->get();

return $al->result_array();

}

public function hbrcek($array){

$this->db->select("*");
$this->db->from("haberler");
$this->db->where_in("id",$array);
$this->db->limit(5);
$cek = $this->db->get();

return $cek->result_array();

}


public function mesajgonder($adsoyad,$email,$mesaj,$katagori,$ipadres,$tarih){

$data = array("ip"=>$ipadres,"tarih"=>$tarih,"adsoyad"=>$adsoyad,"email"=>$email,"mesaj"=>$mesaj,"katagori"=>$katagori);

$ekle = $this->db->insert("gelenmesajlar",$data);

if($ekle){return true;}else {return false;}

}

}

?>