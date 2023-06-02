<?php


class haber_model extends CI_Model {

public function yazicek($id,$deger){

$this->db->select("*");
$sorgu = array("id"=>$id,"perma"=>$deger);
$this->db->where($sorgu);
$this->db->from("haberler");
$query = $this->db->get();
$query = $query->row_array(); 
return $query;


}

function benzercek($baslik,$aciklama){

$this->db->select("*");
$this->db->from("haberler");
$find = array("baslik"=>$baslik,"aciklama"=>$aciklama);
$this->db->like($find);
$this->db->limit(4);
$this->db->order_by("id","desc");

$getir = $this->db->get();

return $getir->result_array();

}

function islemkontrol($haberid,$ip){

$this->db->select("*");
$data = array("haberid"=>$haberid,"ip"=>$ip);
$this->db->where($data);
$this->db->from("haberislem");


$getir = $this->db->get();

return $getir->row_array();

}


function haberislem($haberid,$durum,$ip){

if($durum=="0"){
	$data = array("haberid"=>$haberid,"kotu"=>"1","ip"=>$ip);

$ekle = $this->db->insert("haberislem",$data);

if($ekle){return true;}else {return false;}
}else if($durum=="1") {

$data = array("haberid"=>$haberid,"iyi"=>"1","ip"=>$ip);

$ekle = $this->db->insert("haberislem",$data);

}

}

function iyisay($haberid){
$this->db->select("*");
$data = array("haberid"=>$haberid,"iyi"=>"1");
$this->db->where($data);
$this->db->from("haberislem");


$getir = $this->db->get();

return $getir->num_rows();

}
function kotusay($haberid){
$this->db->select("*");
$data = array("haberid"=>$haberid,"kotu"=>"1");
$this->db->where($data);
$this->db->from("haberislem");


$getir = $this->db->get();

return $getir->num_rows();

}


function yorumyap($yaziid,$adsoyad,$email,$yorum,$ip,$ses){

$data = array("haberid"=>$yaziid,"adsoyad"=>$adsoyad,"email"=>$email,"yorum"=>$yorum,
	"ip"=>$ip,"ses"=>$ses);

$ekle = $this->db->insert("haberyorum",$data);

if($ekle){
	return true;
}else {
	return false;
}



}

function yorumcek($id){

$this->db->select("*");
$this->db->from("haberyorum");
$find = array("haberid"=>$id,"onay"=>"1");
$this->db->where($find);
$this->db->limit(5);
$this->db->order_by("id","desc");

$getir = $this->db->get();

return $getir->result_array();


}



}



?>