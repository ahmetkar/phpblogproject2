<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class video extends CI_Controller {

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

		$this->load->model("vg_model");
		$data["gelen"]=$this->vg_model->tekilvideo($data["id"]);
		$haberliste = $this->vg_model->ustvcek();

		$data["haberler"]=$haberliste;

		$galeri = $this->vg_model->tekilvideo($data["id"]);

		if(!$data["gelen"]){
			header("Location:/index.php");
		}

		$baslik = $galeri["baslik"];

		$aciklama = $galeri["aciklama"];

		$data["benzercek"] = $this->vg_model->benzercek($baslik,$aciklama);

		$this->load->helper("malzeme_helper");
		$oturum= $this->session->giris;
		if($oturum){
		$ipadres = $this->session->id;
		}else {
		$ipadres = GetIP();
		}
		$data["islemkontrol"]=$this->vg_model->islemkontrol($data["id"],$ipadres);


		$data["iyisayi"]=$this->vg_model->iyisay($data["id"]);
		$data["kotusayi"]=$this->vg_model->kotusay($data["id"]);

		$data["yorumcek"] = $this->vg_model->yorumcek($data["id"]);

		$yorum = $this->vg_model->yorumcek($data["id"]);

		foreach($yorum as $yor){
			if($yor["ses"]=="1"){
			$data["yorumyapan"] = $this->vg_model->yorumyapancek($yor["ip"]);
			}
		}


		$data["encoktik"]=$this->vg_model->encoktik();

		$this->load->view('videoview',$data);







	}


	public function vgislem(){

	$durum =  $this->input->post("durum",true);
	$haberid = $this->input->post("galeriid",true);

	$this->load->helper("malzeme_helper");
	$this->load->model("vg_model");
	$oturum= $this->session->giris;
	if($oturum){
	$ipadres = $this->session->id;
	}else {
	$ipadres = GetIP();
	}

	if($_POST){
	$tamamla = $this->vg_model->vgislem($haberid,$durum,$ipadres);

	if($tamamla){
	if($durum=="1"){
		echo "Bu videoyu iyi buldunuz";
	}else if($durum=="0") {
		echo "Bu videoyu kötü buldunuz";
	}
	}


	}


	}

	public function yorumyap(){

	$this->load->model("vg_model");
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
	$yorum = $this->vg_model->yorumyap($yaziid,$adsoyad,$email,$yorum,$ipadres,$ses);
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
