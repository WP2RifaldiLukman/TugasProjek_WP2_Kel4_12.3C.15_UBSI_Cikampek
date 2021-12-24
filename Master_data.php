<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->model("Kelas_kereta_model");
		$this->load->model("Rute_kereta_model");
		$this->load->library('form_validation');
    }


    // Kelas Kerete
	public function kelas_kereta()
	{
		$data["kelas_kereta"] = $this->Kelas_kereta_model->getAll();
		$this->load->view('admin/master_data/kelas_kereta/index',$data);
	}

	 public function create_kelas_kereta()
    {       
        //objek
        $kelas_kereta = $this->Kelas_kereta_model;
        $validation = $this->form_validation;
        $validation->set_rules($kelas_kereta->rules());

        if ($validation->run()) {
            $kelas_kereta->save();

            $this->session->set_flashdata('message', ' 
            <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-check"></i> Data Berhasil Ditambahkan
            </div>');

            redirect(site_url()."master_data/kelas_kereta");
        }
        $this->load->view('admin/master_data/kelas_kereta/create');
    }

    public function update_kelas_kereta($id = null)
    {
        $kelas_kereta = $this->Kelas_kereta_model;
        $validation = $this->form_validation;

        $validation->set_rules($kelas_kereta->rules());

        if ($validation->run()) {
            $kelas_kereta->update();

            $this->session->set_flashdata('message', ' 
            <div class="alert alert-info alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-check"></i> Data Berhasil Di Update
            </div>');
            
            redirect(site_url()."master_data/kelas_kereta");
        }
        
        $data["kelas_kereta"] = $kelas_kereta->getById($id);
        $this->load->view('admin/master_data/kelas_kereta/update',$data);
    }

    public function delete_kelas_kereta($id=null)
    {        
         if ($this->Kelas_kereta_model->delete($id)) {

            $this->session->set_flashdata('message', ' 
            <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-check"></i> Data Berhasil Di Hapus
            </div>');

           redirect(site_url()."master_data/kelas_kereta");
        }
    }
    // Akhir Kelas Kereta

    // Rute Kereta
    public function rute_kereta()
	{
		$data["rute_kereta"] = $this->Rute_kereta_model->getAll();
		$this->load->view('admin/master_data/rute_kereta/index',$data);
    }
    
    
    public function create_rute_kereta()
    {       
        //objek
        $rute_kereta = $this->Rute_kereta_model;
        $validation = $this->form_validation;

        $validation->set_rules($rute_kereta->rules());

        if ($validation->run()) {
            $rute_kereta->save();

            $this->session->set_flashdata('message', ' 
            <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-check"></i> Data Berhasil Ditambahkan
            </div>');

            redirect(site_url()."master_data/rute_kereta");
        }
        $data["kelas_kereta"] = $this->Kelas_kereta_model->getAll();
        $this->load->view('admin/master_data/rute_kereta/create',$data);


    }

      public function update_rute_kereta($id = null)
    {
        $rute_kereta = $this->Rute_kereta_model;
        $validation = $this->form_validation;

        $validation->set_rules($rute_kereta->rules());

        if ($validation->run()) {
            $rute_kereta->update();

            $this->session->set_flashdata('message', ' 
            <div class="alert alert-info alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-check"></i> Data Berhasil Di Update
            </div>');
            
            redirect(site_url()."master_data/rute_kereta");
        }

        $data["rute_kereta"] = $rute_kereta->getById($id);
        $data["kelas_kereta"] = $this->Kelas_kereta_model->getAll();
        // $data["kelas_kereta"] = $this->Rute_kereta_model->getAll();
        $this->load->view('admin/master_data/rute_kereta/update',$data);
    }

    public function delete_rute_kereta($id=null)
    {        
         if ($this->Rute_kereta_model->delete($id)) {

            $this->session->set_flashdata('message', ' 
            <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-check"></i> Data Berhasil Di Hapus
            </div>');

           redirect(site_url()."master_data/rute_kereta");
        }
    }



	
}
