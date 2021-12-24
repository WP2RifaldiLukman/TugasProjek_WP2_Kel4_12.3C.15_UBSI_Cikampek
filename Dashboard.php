<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
		if($this->login_model->isNotLogin()) redirect(site_url('login'));

		$this->load->model("Kelas_kereta_model");
		$this->load->model("Rute_kereta_model");
		$this->load->model("jadwal_kereta_model");

    }

	public function index()
	{
		$data["jml_kelas"] = $this->Kelas_kereta_model->hitungJumlah();
		$data["jml_rute"] = $this->Rute_kereta_model->hitungJumlah();
		$data["jml_jadwal"] = $this->jadwal_kereta_model->hitungJumlah();
		$this->load->view('admin/dashboard',$data);
	}

	
}
