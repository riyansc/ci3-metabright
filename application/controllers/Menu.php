<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function index()
  {
    $data = array (
      'title' => 'Menu Management'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if($this->form_validation->run() == false) {

      $this->load->view('user/template/user_header', $data);
      $this->load->view('user/template/user_sidebar', $data);
      $this->load->view('user/template/user_topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('user/template/user_footer');
    } else {
      $this->db->insert('tbl_user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Menu Added</div>');
      redirect('menu');
    }
  }
  public function subMenu()
  {
    $data = array (
      'title' => 'SubMenu Management'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Menu_model', 'menu');
    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

      if($this->form_validation->run()==false){
      $this->load->view('user/template/user_header', $data);
      $this->load->view('user/template/user_sidebar', $data);
      $this->load->view('user/template/user_topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('user/template/user_footer');
      }else {
        $data = [
          'title' => $this->input->post('title'),
          'menu_id' => $this->input->post('menu_id'),
          'url' => $this->input->post('url'),
          'icon' => $this->input->post('icon'),
          'is_active' => $this->input->post('is_active'),
        ];
        $this->db->insert('tbl_user_sub_menu', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New SubMenu Added</div>');
        redirect('menu/submenu');
      }
  }
}