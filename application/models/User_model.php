<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
  // Listing User
  public function daftarUser()
  {
    $this->db->select('tbl_user.*,tbl_user_role.role');
    $this->db->from('tbl_user');
    $this->db->join('tbl_user_role','tbl_user_role.id=tbl_user.role_id');
    return $this->db->get()->result_array();
  }
  public function userPage($limit, $start){
    $this->db->select('tbl_user.*,tbl_user_role.role');
    $this->db->from('tbl_user');
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit,$start);
    $this->db->join('tbl_user_role','tbl_user_role.id=tbl_user.role_id');
    return $this->db->get()->result_array();
  }
  public function tambahUser($data)
  {
      $default = 'default.jpeg';
      $upload_image = $_FILES['image']['name'];
      if(empty($upload_image['image'])) {
        $this->db->set('image', $default);
      }if($upload_image['image']) {
          $config['upload_path'] = './assets/img/';
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
    $this->db->insert('tbl_user', $data);
  }

  public function editUser($data, $id) 
  {
    $upload_image = $_FILES['image']['name'];
      
      if($upload_image) {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']	= '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload');
		    $this->upload->initialize($config); // Load konfigurasi uploadnya

          if($this->upload->do_upload('image')){
            $new_image = $this->upload->data('file_name');
            $this->db->set('image', $new_image);
          } else {
            echo $this->upload->display_errors();
          }
    }
    $this->db->where('id',$id);
    $this->db->update('tbl_user', $data);
  }

  public function delete($id){
    $this->db->where('id', $id);
    return $this->db->delete('tbl_user');
  }

  
  // Insert Data
  public function upload(){
    $config['upload_path'] = './assets/img/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']	= '2048';
    $config['remove_space'] = TRUE;
    // $config['file_name'] = 'profil.png';
    $this->load->library('upload');
		$this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('image')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      print_r ($return);
    }
  }

  public function save($upload){
    $data = array(
      'name'=>$this->input->post('name'),
      'email'=>$this->input->post('email'),
      'image' => $upload['file']['file_name'],
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'role_id' => $this->input->post('role_id', true),
      'is_active' => 1,
      'date_create' => time('Y-m-d')
    );
    
    $this->db->insert('tbl_user', $data);
  }
  public function getUserById($id)
  {
    return $this->db->get_where('tbl_user', ['id' => $id ])->row_array();
  }


  public function edit($upload)
  {
    $data = array(
      "name" => $this->input->post('name'),
      "email" => $this->input->post('email'),
      'image' => $upload['file']['file_name'],
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'role_id' => $this->input->post('role_id', true),
      'is_active' => 1,
      'date_create' => time('Y-m-d')
    );
    if($this->input->post('image') != null) {
      $data = array ('image' => $this->input->post('image'));
    } 
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tbl_user', $data); // Untuk mengeksekusi perintah update data
    redirect('user/daftaruser');
  }

  public function cariDataUser()
  {
    $keyword = $this->input->post('keyword', true);
    $this->db->like('name', $keyword);
    $this->db->or_like('role', $keyword);
    $this->db->or_like('email', $keyword);
    $this->db->select('tbl_user.*,tbl_user_role.role');
    $this->db->from('tbl_user');
    $this->db->join('tbl_user_role','tbl_user_role.id=tbl_user.role_id');
    return $this->db->get()->result_array();
  }
  public function jumlahUser()
  {
    return $this->db->get('tbl_user')->num_rows();
  }
}