<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mycourse_model extends CI_Model {
  public function getCheckout()
  {
    return $this->db->get('tbl_checkout')->result_array();
  }
  public function getCheckoutById($id)
  {
    return $this->db->get_where('tbl_checkout', ['id_user' => $id])->result_array();
  }
  public function getCourse()
  {
    $this->db->select('tbl_kursus.*,tbl_kursus_akses.access_name,tbl_kursus_level.level_name,tbl_kursus_kategori.nama_kategori,tbl_pengajar.pengajar,tbl_kursus_status.status_name');
    $this->db->from('tbl_kursus');
    $this->db->join('tbl_kursus_akses','tbl_kursus_akses.id = tbl_kursus.akses');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id=tbl_kursus.level');
    $this->db->join('tbl_kursus_kategori','tbl_kursus_kategori.id=tbl_kursus.kategori');
    $this->db->join('tbl_pengajar','tbl_pengajar.id=tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_status','tbl_kursus_status.id=tbl_kursus.status');
    return $this->db->get()->result_array();
  }
}