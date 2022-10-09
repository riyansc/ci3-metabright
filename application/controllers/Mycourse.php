<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Mycourse extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mycourse_model','model');
  }
  public function index()
  {
    $data = array (
      'title' => 'My Course'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['checkout'] = $this->model->getCheckoutById($data['user']['id']);
    $data['course'] = $this->model->getCourse(); 

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/course/mycourse-list.php', $data);
    $this->load->view('user/template/user_footer');
  }
}