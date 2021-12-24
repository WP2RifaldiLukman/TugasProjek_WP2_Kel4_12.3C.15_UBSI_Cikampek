<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->library('form_validation');
    }

    public function index()
    
    {
            // jika form login disubmit
            if($this->input->post()){
                $this->login_model->doLogin();
                redirect(site_url('dashboard'));

                echo "<script> alert('Login Berhasil);
                windows.location='".redirect(site_url('dashboard'))."';
                </script>";
            } 

            $this->load->view('login/index');
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}