<?php

class Login_model extends CI_Model
{
    private $_admin = "admin";

    public function doLogin(){
        $post = $this->input->post();

        $username = htmlspecialchars($post["username"], true);
        $password = $post["password"];

        // cari db user berdasarkan username dan password
        $this->db->where('username', $username)
                ->or_where('password', $password);
                
        $cek_user = $this->db->get($this->_admin)->row();

        // jika user terdaftar di db
        if($cek_user != NULL){
            // periksa password-nya
            $isPasswordTrue = password_verify($password, $cek_user->password);
            // periksa role-nya
            $isAdmin = $cek_user->role == "admin";

            // jika password benar dan dia admin
            if($isPasswordTrue && $isAdmin){ 
                // login sukses !
                $this->session->set_userdata(['user_logged' => $cek_user]);
                return true;
            }

        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"> Username atau Password Salah ! </div');
            redirect('login');
        }
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }


}