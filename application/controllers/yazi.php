<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class yazi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper("url");	
		$haberliste = $this->anasayfa_model->habercek();

		$data["haberler"]=$haberliste;
		$data["encoktik"]=$this->anasayfa_model->encoktik();

		$cek = $this->anasayfa_model->enson();

		$array = array();
		foreach($cek as $c){
		array_push($array,$c["haberid"]);	
		}

		$yorumagore = $this->anasayfa_model->hbrcek($array);
		
		$data["yorumagore"]=$yorumagore;



		$data["url"]=$this->uri->segment(1,0);

		$d = $data["url"];
		$parca= explode("_",$d);

		$data["baslik"]=$parca[0];
		$data["id"]=$parca[1];



		$this->load->model("haber_model");

		$yazi = $this->haber_model->yazicek($data["id"],$data["baslik"]);


		if(!$yazi){
			header("Location:404.php");
		}

		$baslik = $yazi["baslik"];

		$aciklama = $yazi["aciklama"];

		$data["benzercek"] = $this->haber_model->benzercek($baslik,$aciklama);
		


		$data["gelen"]=$this->haber_model->yazicek($data["id"],$data["baslik"]);
		$this->load->model("anket_model");
		$id = rand(1,4);
		$data["anket"]=$this->anket_model->anketcek($id);

	
		$this->load->helper("malzeme_helper");
		$oturum= $this->session->giris;
		if($oturum){
		$ipadres = $this->session->id;	
		}else {
		$ipadres = GetIP();
		}
		$data["islemkontrol"]=$this->haber_model->islemkontrol($data["id"],$ipadres);


		$data["iyisayi"]=$this->haber_model->iyisay($data["id"]);
		$data["kotusayi"]=$this->haber_model->kotusay($data["id"]);	

		$data["yorumcek"] = $this->haber_model->yorumcek($data["id"]);

		$yorum = $this->haber_model->yorumcek($data["id"]);

		foreach($yorum as $yor){
			if($yor["ses"]=="1"){
			$data["yorumyapan"] = $this->vg_model->yorumyapancek($yor["ip"]);	
			}
		}

		$this->load->view('tekilview',$data);

	

		
	
		
	}


	public function yaziislem(){
	
	$this->load->helper("malzeme_helper");
	$this->load->model("haber_model");	

	$durum =  $this->input->post("durum",true);	
	$haberid = $this->input->post("haberid",true);

	$oturum= $this->session->giris;
	if($oturum==true){
	$ipadres = $this->session->id;	
	}else {
	$ipadres = GetIP();
	}
	if($_POST){

	$tamamla = $this->haber_model->haberislem($haberid,$durum,$ipadres);

	if($tamamla){		
	if($durum=="1"){
		echo "Bu haberi iyi buldunuz";
	}else if($durum=="0") {
		echo "Bu haberi kötü buldunuz";
	}
	}else {
		echo "İşlem başarısız";
	}


	}else {
		echo "post etmediniz";
	}


	}


	public function yorumyap(){

	$this->load->model("haber_model");	
	$this->load->helper("malzeme_helper");

	$yaziid = $this->input->post("yaziid",true);	
	$adsoyad = $this->input->post("adsoyad",true);
	$email = $this->input->post("email",true);
	$yorum = $this->input->post("yorum",true);

	$oturum= $this->session->giris;
	if($oturum){
	$ipadres = $this->session->id;
	$ses = "1";	
	}else {
	$ipadres = GetIP();
	$ses = "0";	
	}

	if($_POST){

	if(!empty($adsoyad) && !empty($yorum)){	

	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "Email adresinizi kontrol edin";
	}else {
	$yorum = $this->haber_model->yorumyap($yaziid,$adsoyad,$email,$yorum,$ipadres,$ses);
	if($yorum){
		echo "Başarıyla yorum yaptınız";
	}else {
		echo "Yorum yaparken sorun oluştu";
	}
	}

	}else {
		echo "Boş yer bırakmayın";
	}
	
	


	}


	}


}	
?>