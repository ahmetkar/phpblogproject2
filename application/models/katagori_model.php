<?php


class katagori_model extends CI_Model {

public function yazicek($kid){

$this->db->select("*");
$this->db->from("haberler");
$this->db->where("katagoriid",$kid);
$this->db->order_by("id","desc");
$this->db->limit(3);

$getir = $this->db->get();
if($getir->num_rows()){
return $getir->result_array(); 
}else {
return false;
}

}

public function kbilgi($perma,$id){


$this->db->select("*");
$sorgu = array("perma"=>$perma,"id"=>$id);
$this->db->where($sorgu);
$this->db->from("katagoriler");
$query = $this->db->get();
$query = $query->row_array(); 
return $query;



}







}



?>