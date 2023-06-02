<?php

class anket_model extends CI_Model {

public function anketcek($id){

$this->db->select("*");
$this->db->where("id",$id);
$this->db->from("anketler");

$getir = $this->db->get();
if($getir->num_rows()){
return $getir->row_array(); 
}else {
return false;
}

}

public function cevapekle($cevap,$soruid,$ipadres){

$data = array("secilencevap"=>$cevap,"anketid"=>$soruid,"ip"=>$ipadres);

$ekle = $this->db->insert("anketcevap",$data);


if($ekle){return true;}else {return false;}

}

public function kontrol($soruid,$ip){

$this->db->select("*");
$data = array("anketid"=>$soruid,"ip"=>$ip);
$this->db->where($data);
$this->db->from("anketcevap");

$getir = $this->db->get();
if($getir->num_rows()>0){
return true;
}else {
return false;
}

}


function toplamsay($id){

$this->db->select("*");
$data = array("anketid"=>$id);
$this->db->where($data);
$this->db->from("anketcevap");

$getir = $this->db->get();
if($getir){
return $getir->num_rows();
}else {
return false;
}

}


function cevapsay($id,$cevap){

$this->db->select("*");
$data = array("anketid"=>$id,"secilencevap"=>$cevap);
$this->db->where($data);
$this->db->from("anketcevap");

$getir = $this->db->get();
if($getir){
return $getir->num_rows();
}else {
return false;
}

}


}




?>