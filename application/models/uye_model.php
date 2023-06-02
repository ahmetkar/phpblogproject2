<?php

class uye_model extends CI_Model {


	public function uyeol($kadi,$email,$adsoyad,$sifre,$tarih){

	$data = array("kadi"=>$kadi,"email"=>$email,"adsoyad"=>$adsoyad,"sifre"=>$sifre,"tarih"=>$tarih);

	$ekle = $this->db->insert("uyeler",$data);

	if($ekle){
		return true;
	}else {
		return false;
	}

	}

	function giriskontrol($kadi,$sifre){

	$this->db->select("*");
	$this->db->from("uyeler");
	$data = array("kadi"=>$kadi,"sifre"=>$sifre);
	$this->db->where($data);

	$al = $this->db->get();

	if($al){
		return $al->row_array();
		return true;
	}else {
		return false;
	}

	}

	function uyebilgi($id){
		$this->db->select("*");
	$this->db->from("uyeler");
	$data = array("id"=>$id);
	$this->db->where($data);

	$al = $this->db->get();

	if($al){
		return $al->row_array();
		return true;
	}else {
		return false;
	}

	}

	function online($id){

	$data = array("online"=>"1");

	$this->db->where("id",$id);
	$this->db->update("uyeler",$data);

	}

	function offline($id){

	$data = array("online"=>"0");

	$this->db->where("id",$id);
	$this->db->update("uyeler",$data);

	}

	function yorumlar($id){

	$this->db->select("*");
	$this->db->from("haberyorum");
	$data = array("ip"=>$id);
	$this->db->where($data);
	$this->db->order_by("id","desc");

	$al = $this->db->get();

	if($al){
		return $al->result_array();
		return true;
	}else {
		return false;
	}


	}

	function vyorumlar($id){

	$this->db->select("*");
	$this->db->from("vgyorum");
	$data = array("ip"=>$id);
	$this->db->order_by("id","desc");
	$this->db->where($data);

	$al = $this->db->get();

	if($al){
		return $al->result_array();
		return true;
	}else {
		return false;
	}


	}

	function ryorumlar($id){

	$this->db->select("*");
	$this->db->from("rgyorum");
	$data = array("ip"=>$id);
	$this->db->order_by("id","desc");
	$this->db->where($data);

	$al = $this->db->get();

	if($al){
		return $al->result_array();
		return true;
	}else {
		return false;
	}


	}

function bguncelle($adsoyad,$yasadigiyer,$egitim,$id){

$data = array("adsoyad"=>$adsoyad,"yasadigiyer"=>$yasadigiyer,"egitim"=>$egitim);

$this->db->where("id",$id);
$guncelle = $this->db->update("uyeler",$data);

if($guncelle){
	return true;
}else {
	return false;
}

}

function guvenlik($eskisifre,$id){

$this->db->select("*");
$data = array("sifre"=>$eskisifre,"id"=>$id);
$this->db->where($data);
$this->db->from("uyeler");

$get = $this->db->get();

if($get->num_rows()>0){
	return true;
}else {
	return false;
}

}

function guvgun($yenisifre,$email,$id){

$data = array("sifre"=>$yenisifre,"email"=>$email);
$this->db->where("id",$id);
$gun = $this->db->update("uyeler",$data);

if($gun){
	return true;
}else {return false;}

}

function ysil($id,$tur){
if($tur=="1"){
$this->db->where("id",$id);
$del = $this->db->delete("haberyorum");
}else if($tur=="2"){
	$this->db->where("id",$id);
	$del = $this->db->delete("rgyorum");
}else if($tur=="3"){
	$this->db->where("id",$id);
	$del = $this->db->delete("vgyorum");
}

}


}


?>
