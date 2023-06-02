<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class galeri extends CI_Controller {

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

		$data["id"]=$this->uri->segment(2,0);

		$this->load->model("rg_model");

		$haberliste = $this->rg_model->ustgcek();

		$data["haberler"]=$haberliste;

		$data["gelen"]=$this->rg_model->tekilresim($data["id"]);
		$data["gbilgi"]=$this->rg_model->tekilgaleri($data["id"]);


		if(!$data["gbilgi"]){
			header("Location:/index.php");
		}

		$galeri = $this->rg_model->tekilgaleri($data["id"]);

		$baslik = $galeri["baslik"];

		$aciklama = $galeri["aciklama"];

		$data["benzercek"] = $this->rg_model->benzercek($baslik,$aciklama);

		$this->load->helper("malzeme_helper");
		$oturum= $this->session->giris;
		if($oturum){
		$ipadres = $this->session->id;
		}else {
		$ipadres = GetIP();
		}
		$data["islemkontrol"]=$this->rg_model->islemkontrol($data["id"],$ipadres);


		$data["iyisayi"]=$this->rg_model->iyisay($data["id"]);
		$data["kotusayi"]=$this->rg_model->kotusay($data["id"]);

		$data["yorumcek"] = $this->rg_model->yorumcek($data["id"]);

		$yorum = $this->rg_model->yorumcek($data["id"]);

		foreach($yorum as $yor){
			if($yor["ses"]=="1"){
			$data["yorumyapan"] = $this->vg_model->yorumyapancek($yor["ip"]);
			}
		}



		$data["encoktik"]=$this->rg_model->encoktik();

		$this->load->view('resimview',$data);


	}


	public function gislem(){

	$durum =  $this->input->post("durum",true);
	$haberid = $this->input->post("galeriid",true);

	$this->load->helper("malzeme_helper");
	$this->load->model("rg_model");

	$oturum= $this->session->giris;
	if($oturum){
	$ipadres = $this->session->id;
	}else {
	$ipadres = GetIP();
	}

	if($_POST){
	$tamamla = $this->rg_model->gislem($haberid,$durum,$ipadres);

	if($tamamla){
	if($durum=="1"){
		echo "Bu galeriyi iyi buldunuz";
	}else if($durum=="0") {
		echo "Bu galeriyi kötü buldunuz";
	}
	}


	}


	}

	public function yorumyap(){

	$this->load->model("rg_model");
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
	$yorum = $this->rg_model->yorumyap($yaziid,$adsoyad,$email,$yorum,$ipadres,$ses);
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
