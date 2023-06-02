<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uyelik extends CI_Controller {

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
		$haberliste = $this->anasayfa_model->habercek();

		$data["haberler"]=$haberliste;

		$this->load->view('uyelik/uyelik_view',$data);
	}


	public function profil()
	{

		$this->load->helper("url");

		$uyeid = $this->uri->segment(3,0);

		if(!empty($uyeid)){

		$this->load->model("uye_model");

		$data["uye"] = $this->uye_model->uyebilgi($uyeid);

		$data["yorumlar"]=$this->uye_model->yorumlar($uyeid);
		$data["ryorumlar"]=$this->uye_model->ryorumlar($uyeid);
		$data["vyorumlar"]=$this->uye_model->vyorumlar($uyeid);


		}else {
			header("Location:../index.php");
		}

		$this->load->view('uyelik/profil',$data);
	}

	public function uyeol(){

	if(!$_POST){
		echo "<meta http-equiv='refresh' content='0;URL=".base_url()."' /> ";
	}else {

	$this->load->model("uye_model");

	$kadi = $this->input->post("kadi",true);
	$adsoyad = $this->input->post("adsoyad",true);
	$email = $this->input->post("email",true);
	$sifre = $this->input->post("sifre",true);

	if(empty($kadi) || empty($email) || empty($adsoyad) || empty($sifre)){

		echo "Boş yer bırakmayın";
	}else {

	if(strlen($kadi)<5 || strlen($email)<10 || strlen($adsoyad)<6 || strlen($sifre)<7){

	echo "Şifreniz 7 , ad ve soyadınız 6 karakterden fazla olmalıdır";

	}else {

	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

	echo "Geçerli bir email giriniz";

	}else {


	$tarih = date("d.m.Y");

	$uyeekle = $this->uye_model->uyeol($kadi,$email,$adsoyad,$sifre,$tarih);

	if($uyeekle){
		echo "Merhaba ".$adsoyad." başarıyla üye oldunuz yönlendiriliyorsunuz..";
		echo "<meta http-equiv='refresh' content='2;URL=".base_url()."/uyelik/profil' /> ";
	}else {
		echo "Üyelik işlemleri başarısız daha sonra tekrar deneyin.";
	}



	}



	}


	}
}
}

	public function girisyap(){
	if(!$_POST){
		echo "<meta http-equiv='refresh' content='0;URL=/pro/' /> ";
	}else {

	$this->load->model("uye_model");

	$kadi = $this->input->post("kadi",true);
	$sifre = $this->input->post("sifre",true);

	$kontrol = $this->uye_model->giriskontrol($kadi,$sifre);


	if($kontrol){
		$newdata = array(
		'id'=> $kontrol["id"],
		'kadi'  => $kontrol["kadi"],
        'email' => $kontrol["email"],
        'adsoyad'=>$kontrol["adsoyad"],
        'sifre'=>$kontrol["sifre"],
        'yasadigiyer'=>$kontrol["yasadigiyer"],
        'egitim'=>$kontrol["egitim"],
        'resimurl'=>$kontrol["resimurl"],
        'giris' => TRUE
		);

	$uyeol = $this->session->set_userdata($newdata);

	echo "Başarıyla giriş yaptınız";

	$id = $kontrol["id"];

	$this->uye_model->online($id);

	echo "<meta http-equiv='refresh' content='1;URL=".$_SERVER["HTTP_REFERER"]."' /> ";

	}else {

	echo "Giriş yaparken sorun oluştu";

	}
	}
	}

	public function profiliduzenle(){

			$uyeid = $this->session->id;

		if(!empty($uyeid)){

		$this->load->model("uye_model");

		$data["uye"] = $this->uye_model->uyebilgi($uyeid);

		$data["yorumlar"]=$this->uye_model->yorumlar($uyeid);
		$data["ryorumlar"]=$this->uye_model->ryorumlar($uyeid);
		$data["vyorumlar"]=$this->uye_model->vyorumlar($uyeid);


		}else {
			header("Location:../index.php");
		}

	$this->load->view("uyelik/profiliduzenle",$data);

	}



	public function duzenle(){
		$this->load->model("uye_model");

	$adsoyad = $this->input->post("adsoyad",true);
	$yasadigiyer = $this->input->post("yasadigiyer",true);
	$egitim = $this->input->post("egitim",true);

	$id = $this->session->id;
	if(!empty($adsoyad) || !empty($yasadigiyer) || !empty($egitim)){

		if(strlen($adsoyad)<5 || strlen($adsoyad)>50 || strlen($yasadigiyer)<3 || strlen($yasadigiyer)>50
		|| strlen($egitim)<4 || strlen($egitim)>50 ){
			echo "Lütfen geçerli değerler girin en fazla 50 karakter..!";
		}else {

		$guncel = $this->uye_model->bguncelle($adsoyad,$yasadigiyer,$egitim,$id);
		if($guncel){
			echo "Başarıyla güncellendi";
		}else {
			echo "Bir sorun var";
		}

		}

	}else {
		echo "Boş yer bırakmayın";
	}

	}

	public function guvenlik(){

		$this->load->model("uye_model");
		$eskisifre = $this->input->post("eskisifre",true);
		$id = $this->session->id;

		$kontrol = $this->uye_model->guvenlik($eskisifre,$id);

		if($kontrol){

		$yenisifre = $this->input->post("yenisifre",true);
		$email = $this->input->post("email",true);

		$guncelle = $this->uye_model->guvgun($yenisifre,$email,$id);

		}else {
			echo "Eski şifreniz yanlış";
		}


	}

	public function ysil(){
		$this->load->model("uye_model");
	$id = $this->input->post("yorumid");
	$tur = $this->input->post("tur");

	if(!empty($id) && is_int($id) && is_int($tur)){
	$sil = 	$this->uye_model->yorumsil($id,$tur);
	if($sil){
		echo "Yorumunuz başarıyla silindi";
	}else {
		echo "Silinirken sorun oluştu";
	}
	}

	}


	public function cikis(){

	$this->load->model("uye_model");

	$oturum = $this->session->giris;

	if($oturum){

	$id = $this->session->id;

	$this->session->unset_userdata("giris");

	$this->uye_model->offline($id);

	echo "yönlendiriliyorsunuz..";
}else {
echo "Buraya giriş yasak";
}
	echo "<meta http-equiv='refresh' content='0;URL=/pro/' /> ";


	}

	}

?>
