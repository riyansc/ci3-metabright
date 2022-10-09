<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {
  public function getInformasi($limit, $start)
  {
    $this->db->select('tbl_informasi.*,tbl_informasi_kategori.nama_kategori');
    $this->db->from('tbl_informasi');
    $this->db->order_by('id','desc');
    $this->db->limit($limit,$start);
    $this->db->join('tbl_informasi_kategori','tbl_informasi_kategori.id=tbl_informasi.kategori');
    return $this->db->get()->result_array();
  }
  public function getBySlugInfo($slug)
  {
    $this->db->select('tbl_informasi.*,tbl_informasi_kategori.nama_kategori');
    $this->db->from('tbl_informasi');
    $this->db->join('tbl_informasi_kategori','tbl_informasi_kategori.id=tbl_informasi.kategori');
    $this->db->where('slug', $slug);
    return $this->db->get()->row_array();
  }
  public function getKategori()
  {
    return $this->db->get('tbl_informasi_kategori')->result_array();
  }
  public function getKategoriByName($namaktg)
  {
    return $this->db->get_where('tbl_informasi_kategori', ['nama_kategori' => $namaktg])->row_array();
  }
  public function getArtikel($id)
  {
    $this->db->select('tbl_informasi.*,tbl_informasi_kategori.nama_kategori');
    $this->db->from('tbl_informasi');
    $this->db->join('tbl_informasi_kategori','tbl_informasi_kategori.id=tbl_informasi.kategori');
    $this->db->where('kategori',$id);
    return $this->db->get()->result_array();
  }
  public function search($keyword)
  {
    $this->db->like('judul', $keyword);
    $this->db->or_like('konten', $keyword);
    $this->db->select('tbl_informasi.*,tbl_informasi_kategori.nama_kategori');
    $this->db->from('tbl_informasi');
    $this->db->join('tbl_informasi_kategori','tbl_informasi_kategori.id=tbl_informasi.kategori');
    return $this->db->get()->result_array(); 
  }
  public function jumlahData()
  {
    return $this->db->get('tbl_informasi')->num_rows();
  }
}