<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_model extends CI_Model {
  public function daftarInformasi($limit, $start)
  {
    $this->db->select('tbl_informasi.*,tbl_informasi_status.status, tbl_informasi_kategori.nama_kategori');
    $this->db->from('tbl_informasi');
    $this->db->order_by('id','desc');
    $this->db->limit($limit,$start);
    $this->db->join('tbl_informasi_status','tbl_informasi_status.id=tbl_informasi.status');
    $this->db->join('tbl_informasi_kategori','tbl_informasi_kategori.id=tbl_informasi.kategori');
    return $this->db->get()->result_array();
  }
  public function dataKategori()
  {
    // Mengambil semua data dalam table
    return $this->db->get('tbl_informasi_kategori')->result_array();
  }
  public function getKategoriById($id)
  {
    // Memanggil data berdasarkan baris id satu baris
    return $this->db->get_where('tbl_informasi_kategori',['id' => $id])->row_array();
  }

  public function updateKategori($id, $data)
  {
    $this->db->set('nama_kategori', $data);
    $this->db->where('id', $id);
    $this->db->update('tbl_informasi_kategori');
  }
  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('tbl_informasi_kategori');
  }
  public function insertInformasi($data)
  {
    $upload_image = $_FILES['image']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/informasi/';
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
    $this->db->insert('tbl_informasi', $data);
  }
  public function editInformasi($data,$id)
  {
    $upload_image = $_FILES['image']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/informasi/';
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
    $this->db->where('id', $id);
    $this->db->update('tbl_informasi', $data);
  }
  public function hapusInformasi($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('tbl_informasi');
  }
  public function detailInformasi($id)
  {
    return $this->db->get_where('tbl_informasi', ['id' => $id])->row_array();
  }
  public function jumlahArtikel()
  {
    return $this->db->get('tbl_informasi')->num_rows();
  }
  public function cariDataArtikel()
  {
    $keyword = $this->input->post('keyword', true);
    $this->db->like('judul', $keyword);
    $this->db->or_like('konten', $keyword);
    $this->db->or_like('nama_kategori', $keyword);
    $this->db->select('tbl_informasi.*,tbl_informasi_status.status, tbl_informasi_kategori.nama_kategori');
    $this->db->from('tbl_informasi');
    $this->db->join('tbl_informasi_status','tbl_informasi_status.id=tbl_informasi.status');
    $this->db->join('tbl_informasi_kategori','tbl_informasi_kategori.id=tbl_informasi.kategori');
    return $this->db->get()->result_array();
  }
}