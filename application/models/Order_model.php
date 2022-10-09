<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
  public function getCheckout()
  {
    $this->db->select('tbl_checkout.*,tbl_checkout_status.status_name,tbl_checkout_tagihan.tagihan_status');
    $this->db->from('tbl_checkout');
    $this->db->join('tbl_checkout_status','tbl_checkout_status.id=tbl_checkout.status');
    $this->db->join('tbl_checkout_tagihan','tbl_checkout_tagihan.id=tbl_checkout.tagihan');
    return $this->db->get()->result_array();
  }
  public function getPembayaranById()
  {
    $this->db->select('tbl_checkout.*,tbl_checkout_tagihan.tagihan_status,tbl_kursus.harga');
    $this->db->from('tbl_checkout');
    $this->db->join('tbl_checkout_tagihan','tbl_checkout_tagihan.id=tbl_checkout.tagihan');
    $this->db->join('tbl_kursus','tbl_kursus.id=tbl_checkout.id_kursus');
    return $this->db->get()->result_array();
  }
  public function getCheckoutById($id)
  {
    return $this->db->get_where('tbl_checkout',['id' => $id])->row_array();
  }
  public function editStatus($id)
  {
    $this->db->set('status',2);
    $this->db->where('id',$id);
    $this->db->update('tbl_checkout');
  }
  public function editStatusDis($id)
  {
    $this->db->set('status',3);
    $this->db->where('id',$id);
    $this->db->update('tbl_checkout');
  }
  public function updateBuktiBayar($data,$id)
  {
    $upload_image = $_FILES['image']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/checkout/Bukti/';
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
    $this->db->update('tbl_checkout', $data);
  }
}