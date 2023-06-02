<?php


class vg_model extends CI_Model {

public function vgcek(){

$this->db->select("*");
$this->db->from("videogaleri");
$this->db->order_by("id","desc");
$this->db->limit("12");

$getir = $this->db->get();
if($getir->num_rows()){
return $getir->result_array();
}else {
return false;
}



}


public function tekilvideo($id){

$this->db->select("*");
$sorgu = array("id"=>$id);
$this->db->where($sorgu);
$this->db->from("videogaleri");
$query = $this->db->get();
$query = $query->row_array();
return $query;



}

function benzercek($baslik,$aciklama){

$this->db->select("*");
$this->db->from("videogaleri");
$find = array("baslik"=>$baslik,"aciklama"=>$aciklama);
$this->db->like($find);
$this->db->limit(6);
$this->db->order_by("id","desc");

$getir = $this->db->get();

return $getir->result_array();

}

function encoktik(){
$this->db->select("*");
$this->db->from("videogaleri");
$this->db->order_by("tik","desc");
$this->db->limit(4);
$al = $this->db->get();

return $al->result_array();

}
function islemkontrol($gid,$ip){

$this->db->select("*");
$data = array("galeriid"=>$gid,"ip"=>$ip);
$this->db->where($data);
$this->db->from("vgislem");


$getir = $this->db->get();

return $getir->row_array();

}


function vgislem($gid,$durum,$ip){

if($durum=="0"){
	$data = array("galeriid"=>$gid,"kotu"=>"1","ip"=>$ip);

$ekle = $this->db->insert("vgislem",$data);

if($ekle){return true;}else {return false;}
}else if($durum=="1") {

$data = array("galeriid"=>$gid,"iyi"=>"1","ip"=>$ip);

$ekle = $this->db->insert("vgislem",$data);

}

}

function iyisay($gid){
$this->db->select("*");
$data = array("galeriid"=>$gid,"iyi"=>"1");
$this->db->where($data);
$this->db->from("vgislem");


$getir = $this->db->get();

return $getir->num_rows();

}

function kotusay($gid){
$this->db->select("*");
$data = array("galeriid"=>$gid,"kotu"=>"1");
$this->db->where($data);
$this->db->from("vgislem");


$getir = $this->db->get();

return $getir->num_rows();

}

function yorumyap($yaziid,$adsoyad,$email,$yorum,$ip,$ses){

$data = array("vgaleriid"=>$yaziid,"adsoyad"=>$adsoyad,"email"=>$email,"yorum"=>$yorum,
	"ip"=>$ip,"ses"=>$ses);

$ekle = $this->db->insert("vgyorum",$data);

if($ekle){
	return true;
}else {
	return false;
}



}

function yorumcek($id){

$this->db->select("*");
$this->db->from("vgyorum");
$find = array("vgaleriid"=>$id,"onay"=>"1");
$this->db->where($find);
$this->db->limit(6);
$this->db->order_by("id","desc");

$getir = $this->db->get();

return $getir->result_array();


}

function yorumyapancek($id){

$this->db->select("*");
$this->db->from("uyeler");
$find = array("id"=>$id);
$this->db->where($find);

$getir = $this->db->get();

return $getir->row_array();


}

function ustvcek(){
	$this->db->select("*");
	$this->db->from("videogaleri");
	$this->db->limit(6);
	$this->db->order_by("id","desc");

	$getir = $this->db->get();

	return $getir->result_array();


}



}



?>
