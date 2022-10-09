<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Jourconfe_model extends CI_Model {
  public function getJournal()
  {
    $this->db->select('tbl_journal.*, tbl_journal_access.access_name');
    $this->db->from('tbl_journal');
    $this->db->join('tbl_journal_access','tbl_journal.access = tbl_journal_access.id');
    $data = $this->db->get()->result_array();
    return $data;
    // return $this->db->get('tbl_journal')->result_array();
  }
  public function getAccess()
  {
    return $this->db->get('tbl_journal_access')->result_array();
  }
  public function simpanJournal($data)
  {
    $upload_image = $_FILES['image']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/jourconfe/journal/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']	= '5120';
          $config['remove_space'] = TRUE;

          $this->load->library('upload');
          $this->upload->initialize($config); // Load konfigurasi uploadnya
          if($this->upload->do_upload('image')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('image', $new_image);
            } else {
              echo $this->upload->display_errors();
            }
      }
    $this->db->insert('tbl_journal', $data);
  }
  public function getJournalById($id)
  {
    return $this->db->get_where('tbl_journal',['id' => $id])->row_array();
  }
  public function journalHapus($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('tbl_journal');
  }

  // Conference
  public function getConference()
  {
    return $this->db->get('tbl_conference')->result_array();
  }
  public function simpanConf($data)
  {
    $upload_image = $_FILES['image']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/jourconfe/conference/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']	= '5120';
          $config['remove_space'] = TRUE;

          $this->load->library('upload');
          $this->upload->initialize($config); // Load konfigurasi uploadnya
          if($this->upload->do_upload('image')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('image', $new_image);
            } else {
              echo $this->upload->display_errors();
            }
      }
    $this->db->insert('tbl_conference', $data);
  }
  public function getConferenceById($id)
  {
    return $this->db->get_where('tbl_conference', ['id' => $id])->row_array();
  }
  public function hapusConf($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('tbl_conference');
  }

  // View Tampilan Journal Conference
  
}