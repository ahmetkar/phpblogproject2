<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anasayfa extends CI_Controller {

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

		$this->load->model("anasayfa_model");
		$haberliste = $this->anasayfa_model->habercek();

		$data["haberler"]=$haberliste;

		$data["ustcek"]=$this->anasayfa_model->ustcek();

		$data["katagori1"]=$this->anasayfa_model->tekilcek("1");
		$data["katagori2"]=$this->anasayfa_model->tekilcek("2");
		$data["katagori3"]=$this->anasayfa_model->tekilcek("3");
		$data["katagori4"]=$this->anasayfa_model->tekilcek("4");
		$data["katagori5"]=$this->anasayfa_model->tekilcek("5");
		$data["katagori6"]=$this->anasayfa_model->tekilcek("6");

		$data["encoktik"]=$this->anasayfa_model->encoktik();

		$data["resimgaleri"]=$this->anasayfa_model->galericek();
		$data["videogaleri"]=$this->anasayfa_model->vgalericek();

		$this->load->model("anket_model");
		$this->load->helper("malzeme_helper");
		$id = 2;
		$data["anket"]=$this->anket_model->anketcek($id);

		$cek = $this->anasayfa_model->enson();

		$array = array();
		foreach($cek as $c){
		array_push($array,$c["haberid"]);
		}


		$yorumagore = $this->anasayfa_model->hbrcek($array);

		$data["yorumagore"]=$yorumagore;

		$data["toplam"]=$this->anket_model->toplamsay($id);

		$anke = $this->anket_model->anketcek($id);

		$cevap1 = $anke["cevap1"];
		$data["scevap1"]=$this->anket_model->cevapsay($id,$cevap1);

		$cevap2 = $anke["cevap2"];
		$data["scevap2"]=$this->anket_model->cevapsay($id,$cevap2);

		$cevap3 = $anke["cevap3"];
		$data["scevap3"]=$this->anket_model->cevapsay($id,$cevap3);

		$cevap4 = $anke["cevap4"];
		$data["scevap4"]=$this->anket_model->cevapsay($id,$cevap4);

		$cevap5 = $anke["cevap5"];
		$data["scevap5"]=$this->anket_model->cevapsay($id,$cevap5);

		$cevap6 = $anke["cevap6"];
		$data["scevap6"]=$this->anket_model->cevapsay($id,$cevap6);


		$this->load->view('anasayfa_view',$data);


	}

	public function anket(){

		$this->load->model("anket_model");

		$this->load->helper("malzeme_helper");

		$al = permalink($this->input->post("cevap"));
		$soruid = $this->input->post("soruid");
		$ipadres = GetIP();

		$kontrol = $this->anket_model->kontrol($soruid,$ipadres);

		if($kontrol){

		echo "Daha önce bu soruya cevap verdiniz";
		}else {
		$cevap = $this->anket_model->cevapekle($al,$soruid,$ipadres);
		if($cevap){
		echo $this->input->post("cevap")."  adlı cevabı verdiniz.";
		}else {
			echo "Tekrar deneyin";
		}
		}

	}


}
?>
