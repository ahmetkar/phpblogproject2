<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sonuclar extends CI_Controller {

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

	$this->load->model("sonuc_model");

	$haberliste = $this->anasayfa_model->habercek();

		$data["haberler"]=$haberliste;
		$data["encoktik"]=$this->anasayfa_model->encoktik();	

	$ara = $this->input->get("ara",true);




	$data["gelen"]=$this->sonuc_model->sonuclar($ara);	
	$data["rgelen"]=$this->sonuc_model->rsonuclar($ara);	
	$data["vgelen"]=$this->sonuc_model->vsonuclar($ara);	

	$data["hsay"]=$this->sonuc_model->sonuclarsay($ara);
	$data["vsay"]=$this->sonuc_model->vsonuclarsay($ara);
	$data["rsay"]=$this->sonuc_model->rsonuclarsay($ara);			

	$data["aranan"]=$ara;



	$this->load->view("sonuclar_view",$data);

	}


	
}		