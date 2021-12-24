<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rute_kereta_model extends CI_Model
{
    private $_table = "rute_kereta";

    // public $rute_asal;
    // public $rute_tujuan;
    // public $kode_asal;
    // public $kode_tujuan;
    // public $kelas_kereta;
    // public $tarif;

    public function rules()
    {
        return [
            ['field' => 'rute_asal',
            'label' => 'rute_asal',
            'rules' => 'required'],     

            ['field' => 'rute_tujuan',
            'label' => 'rute_tujuan',
            'rules' => 'required'],   

            ['field' => 'kode_asal',
            'label' => 'kode_asal',
            'rules' => 'required'],     

            ['field' => 'kode_tujuan',
            'label' => 'kode_tujuan',
            'rules' => 'required'],   

            ['field' => 'kelas_kereta',
            'label' => 'kelas_kereta',
            'rules' => 'required'],  

            ['field' => 'tarif',
            'label' => 'tarif',
            'rules' => 'required'],     
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('rute_kereta'); 
        $this->db->join('kelas_kereta','kelas_kereta.id_kelas = rute_kereta.kelas_kereta');      
        return $this->db->get()->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_rute" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->rute_asal = $post["rute_asal"];
        $this->rute_tujuan = $post["rute_tujuan"];
        $this->kode_asal = $post["kode_asal"];
        $this->kode_tujuan = $post["kode_tujuan"];
        $this->kelas_kereta = $post["kelas_kereta"];
        $this->tarif_rute = $post["tarif"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->id_rute = $post["id"];
        $this->rute_asal = $post["rute_asal"];
        $this->rute_tujuan = $post["rute_tujuan"];
        $this->kode_asal = $post["kode_asal"];
        $this->kode_tujuan = $post["kode_tujuan"];
        $this->kelas_kereta = $post["kelas_kereta"];
        $this->tarif_rute = $post["tarif"];


        return $this->db->update($this->_table, $this, array('id_rute' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_rute" => $id));
    }

    public function hitungJumlah()
    {   
        $query = $this->db->get('rute_kereta');
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