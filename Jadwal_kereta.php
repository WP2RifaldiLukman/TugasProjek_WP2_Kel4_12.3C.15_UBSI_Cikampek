<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_kereta extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model("Jadwal_kereta_model");
		$this->load->model("Rute_kereta_model");
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data["jadwal_kereta"] = $this->Jadwal_kereta_model->getAll();
		$this->load->view('admin/jadwal_kereta/index',$data);
    }
    
	public function create_jadwal_kereta()
	{
	    //objek
        $jadwal_kereta = $this->Jadwal_kereta_model;
        $validation = $this->form_validation;

        $validation->set_rules($jadwal_kereta->rules());

        if ($validation->run()) {
            $jadwal_kereta->save();

            $this->session->set_flashdata('message', ' 
            <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-check"></i> Data Berhasil Ditambahkan
            </div>');

            redirect(site_url()."Jadwal_kereta");
        }

        $data["rute_kereta"] = $this->Rute_kereta_model->getAll();
        $this->load->view('admin/jadwal_kereta/create',$data);
    }
    
       public function delete_jadwal_kereta($id=null)
    {        
         if ($this->Jadwal_kereta_model->delete($id)) {

            $this->session->set_flashdata('message', ' 
            <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-check"></i> Data Berhasil Di Hapus
            </div>');

            redirect(site_url()."Jadwal_kereta");
        }
    }

	
}
