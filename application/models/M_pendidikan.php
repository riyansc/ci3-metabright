<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendidikan extends CI_Model {
    public function AllData()
    {
      $this->db->select('*');
      $this->db->from('tbl_pendidikan');
      return $this->db->get()->result();    
      
    }
    public function Add($data)
    {
      $this->db->insert('tbl_pendidikan', $data);
      
    }

    public function Detail($id_pendidikan)
    {
      $this->db->select('*');
      $this->db->from('tbl_pendidikan');
      $this->db->where('id_pendidikan', $id_pendidikan);
      return $this->db->get()->row();
    }
    public function Edit($data)
    {
      $this->db->where('id_pendidikan', $data['id_pendidikan']);
      $this->db->update('tbl_pendidikan', $data);

    }
  public function Delete($data)
    {
      $this->db->where('id_pendidikan', $data['id_pendidikan']);
      $this->db->delete('tbl_pendidikan', $data);
      
    }

}

/* End of file M_pendidikan.php */
