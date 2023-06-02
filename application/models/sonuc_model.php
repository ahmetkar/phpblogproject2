<?php 
class sonuc_model extends CI_Model {

function sonuclar($veri){

$this->db->select("*");
$this->db->from("haberler");
$find = array("baslik"=>$veri,"etiketler"=>$veri);
$this->db->like($find);
$this->db->limit(5);
$this->db->order_by("id","desc")

$al = $this->db->get();

return $al->result_array();

}

function rsonuclar($veri){

$this->db->select("*");
$this->db->from("resimgaleri");
$find = array("baslik"=>$veri,"etiketler"=>$veri);
$this->db->like($find);
$this->db->limit(5);
$this->db->order_by("id","desc")
$al = $this->db->get();

return $al->result_array();

}

function vsonuclar($veri){

$this->db->select("*");
$this->db->from("videogaleri");
$find = array("baslik"=>$veri,"etiketler"=>$veri);
$this->db->like($find);
$this->db->limit(5);
$this->db->order_by("id","desc")
$al = $this->db->get();

return $al->result_array();

}

function sonuclarsay($veri){

$this->db->select("*");
$this->db->from("haberler");
$find = array("baslik"=>$veri,"etiketler"=>$veri);
$this->db->like($find);

$al = $this->db->get();

return $al->num_rows();

}

function rsonuclarsay($veri){

$this->db->select("*");
$this->db->from("resimgaleri");
$find = array("baslik"=>$veri,"etiketler"=>$veri);
$this->db->like($find);

$al = $this->db->get();

return $al->num_rows();

}

function vsonuclarsay($veri){

$this->db->select("*");
$this->db->from("videogaleri");
$find = array("baslik"=>$veri,"etiketler"=>$veri);
$this->db->like($find);

$al = $this->db->get();

return $al->num_rows();

}





}

?>