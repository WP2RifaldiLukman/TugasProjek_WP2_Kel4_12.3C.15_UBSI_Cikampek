<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_kereta_model extends CI_Model
{
    private $_table = "kelas_kereta";

    // public $id_kelas;
    // public $kls_kereta;
    // public $tarif_kls;

    public function rules()
    {
        return [ 

            ['field' => 'kelas_kereta',
            'label' => 'kelas_kereta',
            'rules' => 'required'],     

            ['field' => 'tarif',
            'label' => 'tarif',
            'rules' => 'required']  
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kelas" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->kls_kereta = $post["kelas_kereta"];
        $this->tarif_kls = $post["tarif"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->id_kelas = $post["id"];
         $this->kls_kereta = $post["kelas_kereta"];
        $this->tarif_kls = $post["tarif"];

        return $this->db->update($this->_table, $this, array('id_kelas' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kelas" => $id));
    }

    public function hitungJumlah()
    {   
        $query = $this->db->get('kelas_kereta');
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }
}