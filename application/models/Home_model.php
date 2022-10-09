<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
  public function getDataInfromasi()
  {
    $this->db->select('tbl_informasi.*');
    $this->db->from('tbl_informasi');
    $this->db->order_by('id', 'desc');
    $this->db->limit(3);
    return $this->db->get()->result_array();
  }
  public function getTeacher()
  {
    $this->db->select('tbl_pengajar.*,tbl_pengajar_level.level_name');
    $this->db->from('tbl_pengajar', 4);
    $this->db->join('tbl_pengajar_level','tbl_pengajar_level.id_level = tbl_pengajar.level');
    $data = $this->db->get()->result_array();
    return $data;
  }
  public function getCourseByLimit()
  {
    $this->db->select('tbl_kursus.*,tbl_kursus_akses.access_name,tbl_kursus_level.level_name,tbl_kursus_kategori.nama_kategori,tbl_pengajar.pengajar,tbl_kursus_status.status_name');
    $this->db->from('tbl_kursus');
    $this->db->order_by('id','desc');
    $this->db->limit(6);
    $this->db->join('tbl_kursus_akses','tbl_kursus_akses.id = tbl_kursus.akses');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id=tbl_kursus.level');
    $this->db->join('tbl_kursus_kategori','tbl_kursus_kategori.id=tbl_kursus.kategori');
    $this->db->join('tbl_pengajar','tbl_pengajar.id=tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_status','tbl_kursus_status.id=tbl_kursus.status');
    return $this->db->get()->result_array();
  }
  public function getTeacherId($id)
  {
    $this->db->select('tbl_pengajar.*,tbl_pengajar_level.level_name');
    $this->db->from('tbl_pengajar');
    $this->db->join('tbl_pengajar_level','tbl_pengajar_level.id_level=tbl_pengajar.level');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
}