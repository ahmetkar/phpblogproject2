<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class iletisim extends CI_Controller {

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
		$data["encoktik"]=$this->anasayfa_model->encoktik();

		$this->load->view('iletisim_view',$data);
	}


	public function mesajgonder(){
		$adsoyad = $this->input->post("adsoyad",true);
		$email = $this->input->post("email",true);
		$mesaj = $this->input->post("mesaj",true);
		$katagori = $this->input->post("katagori",true);

		if(empty($adsoyad) && empty($mesaj) && empty($email) ){

			echo "Email,adsoyad ve mesaj zorunludur";

		}else {

		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){	

		echo "Lütfen geçerli bir email adresi giriniz";	

		}else {


		if(strlen($mesaj)<90){

		echo strlen($mesaj)." karakter mesaj yazdınız.Mesajınız çok kısa lütfen mesajınızı kontrol ediniz";	

		}else {

		$this->load->helper("malzeme_helper");	
		$ipadres = GetIP();
		$tarih = date("d.m.Y");
		$gonder = $this->anasayfa_model->mesajgonder($adsoyad,$email,$mesaj,$katagori,$ipadres,$tarih);

		if($gonder){
			echo "Mesajınız başarıyla gönderildi";
		}else {
			echo "Mesaj gönderilirken sorun oluştu";
		}

		}


		}
	}


}

}
?>