<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bilgi extends CI_Controller {

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
		$heading = "Hata 404";
		$message = "&nbsp;&nbsp;Bu sayfa bulunamadı.Lütfen daha sonra tekrar deneyin<br><br>
		";
		$this->load->view("errors/html/error_404",array("heading"=>$heading,"message"=>$message));
	}

	public function kunye(){
		$haberliste = $this->anasayfa_model->habercek();

		$data["haberler"]=$haberliste;
		$data["encoktik"]=$this->anasayfa_model->encoktik();

		$this->load->view("kunye_view",$data);

	}
	public function uyari(){

		$haberliste = $this->anasayfa_model->habercek();

		$data["haberler"]=$haberliste;
		$data["encoktik"]=$this->anasayfa_model->encoktik();

		$this->load->view("uyari",$data);

	}


}
?>