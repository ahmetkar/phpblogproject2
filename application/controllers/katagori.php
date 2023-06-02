<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class katagori extends CI_Controller {

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
		error_reporting(0);
		$this->load->helper("url");
		
		$haberliste = $this->anasayfa_model->habercek();

		$data["haberler"]=$haberliste;
		$data["encoktik"]=$this->anasayfa_model->encoktik();

		$data["deger"]=$this->uri->segment(2,0);
		$data["id"]=$this->uri->segment(1,0);

		$this->load->model("katagori_model");
		
		$data["gelen"]=$this->katagori_model->yazicek($data["id"]);
		$data["kbilgi"]=$this->katagori_model->kbilgi($data["deger"],$data["id"]);


		if(!$data["kbilgi"]){
			header("Location:/index.php");
		}	


	

		$this->load->view('katagori_view',$data);
		




	}


}
?>