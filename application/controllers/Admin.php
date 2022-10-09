<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function index() 
  {
    $data = array (
      'title' => 'Dashboard'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('user/template/user_footer');
  }
  public function role() 
  {
    $data = array (
      'title' => 'Role'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get('tbl_user_role')->result_array();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('user/template/user_footer');
  }

  public function roleAccess($role_id) 
  {
    $data = array (
      'title' => 'Role Access'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get_where('tbl_user_role', ['id' => $role_id])->row_array();

    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

 
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('user/template/user_footer');
  }

  public function changeaccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('tbl_user_access_menu', $data);

    if($result->num_rows()<1) {
      $this->db->insert('tbl_user_access_menu', $data);
    } else {
      $this->db->delete('tbl_user_access_menu', $data);
    }
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Acccess changed..</div>');
  }
}