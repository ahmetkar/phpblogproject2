<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class resimgaleri extends CI_Controller {

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


		$data["encoktik"]=$this->anasayfa_model->encoktik();





		$this->load->model("rg_model");
		$galeri = $this->rg_model->resimcek();
		$haberliste = $this->rg_model->ustgcek();

		$data["haberler"]=$haberliste;
		$data["resimg"]=$galeri;

		$this->load->model("anket_model");
		$id = rand(1,4);
		$data["anket"]=$this->anket_model->anketcek($id);




		$this->load->view('rgaleri_view',$data);
	}


}
?>
