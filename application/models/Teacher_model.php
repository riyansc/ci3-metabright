<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_model extends CI_Model {
  public function getPengajar()
  {
    $this->db->select('tbl_pengajar.*, tbl_pengajar_level.level_name');
    $this->db->from('tbl_pengajar');
    $this->db->join('tbl_pengajar_level','tbl_pengajar_level.id_level=tbl_pengajar.level');
    $data = $this->db->get()->result_array();
    return $data;
  }
  public function teacherTambah($data)
  {
    $upload_image = $_FILES['image']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/pengajar/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']	= '2048';
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
    $this->db->insert('tbl_pengajar', $data);
  }
  public function Tambah_Edit_Sertifikasi($id)
  {
    $upload_image = $_FILES['sertifikasi']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/pengajar/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']	= '5128';
          $config['remove_space'] = TRUE;

          $this->load->library('upload');
          $this->upload->initialize($config); // Load konfigurasi uploadnya
          if($this->upload->do_upload('sertifikasi')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('sertifikasi', $new_image);
            } else {
              echo $this->upload->display_errors();
            }
      }
    $this->db->where('id',$id);
    $this->db->update('tbl_pengajar');
  }
  public function getTeacherById($id)
  {
    return $this->db->get_where('tbl_pengajar', ['id' => $id])->row_array();
  }
  public function getTeacherId($id)
  {
    $this->db->select('tbl_pengajar.*,tbl_pengajar_level.level_name');
    $this->db->from('tbl_pengajar');
    $this->db->join('tbl_pengajar_level','tbl_pengajar_level.id_level=tbl_pengajar.level');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function teacherHapus($id)
  {
    $this->db->where('id' , $id);
    return $this->db->delete('tbl_pengajar');
  }
  public function editTeacher($id,$data)
  {
    $upload_image = $_FILES['image']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/pengajar/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']	= '5128';
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
    $this->db->where('id',$id);
    $this->db->update('tbl_pengajar',$data);
  }
  // Level Pengajar
  public function getLevel()
  {
    return $this->db->get('tbl_pengajar_level')->result_array();
  }
  public function simpanLevel($data)
  {
    $this->db->insert('tbl_pengajar_level', $data);
  }
  public function getLevelById($id)
  {
    return $this->db->get_where('tbl_pengajar_level', ['id_level' => $id])->row_array();
  }
  public function editLevel($id, $data)
  {
    $this->db->where('id_level',$id);
    $this->db->update('tbl_pengajar_level',$data);
  }
  public function levelHapus($id)
  {
    $this->db->where('id_level', $id);
    return $this->db->delete('tbl_pengajar_level');
  }
}