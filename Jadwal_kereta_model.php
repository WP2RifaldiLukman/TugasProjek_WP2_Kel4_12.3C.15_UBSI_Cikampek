<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_kereta_model extends CI_Model
{
    private $_table = "jadwal_kereta";

    public function rules()
    {
        return [
            ['field' => 'tanggal_jadwal',
            'label' => 'tanggal_jadwal',
            'rules' => 'required'],     

            ['field' => 'rute_kereta',
            'label' => 'rute_kereta',
            'rules' => 'required'],     
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('jadwal_kereta');
        $this->db->join('rute_kereta','rute_kereta.id_rute = jadwal_kereta.id_rute');      
        $this->db->join('kelas_kereta','kelas_kereta.id_kelas = rute_kereta.kelas_kereta');      
        return $this->db->get()->result();
    }

     public function save()
    {
        $post = $this->input->post();

        $this->tanggal_jadwal = $post["tanggal_jadwal"];
        $this->id_rute = $post["rute_kereta"];
        
        return $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jadwal" => $id));
    }

    public function hitungJumlah()
    {   
        $query = $this->db->get('jadwal_kereta');
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