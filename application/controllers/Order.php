<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Order_model','model');
  }
  public function index()
  {
    $data = array (
      'title' => 'Order'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['checkout'] = $this->model->getCheckout();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/order/order-list.php', $data);
    $this->load->view('user/template/user_footer');
  }
  public function approved($id)
  {
    $this->model->editStatus($id);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Transaction Course Approved</div>');
    redirect('order');
  }
  public function disapproved($id)
  {
    $this->model->editStatusDis($id);
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Transaction Course Disapproved</div>');
    redirect('order');
  }
  public function pembayaran()
  {
    $data = array (
      'title' => 'Bill Payment'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['checkout'] = $this->model->getPembayaranById();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/order/order-pembayaran.php', $data);
    $this->load->view('user/template/user_footer');
  }
  public function upload($id)
  {
    $data = array (
      'title' => 'Upload Payment'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['checkout'] = $this->model->getCheckoutById($id);

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/order/order-upload.php', $data);
    $this->load->view('user/template/user_footer');
  }
  public function uploadBukti()
  {
    $id = $this->input->post('id');
    $data = array (
      'tagihan' => '2',
    );
    $this->model->updateBuktiBayar($data, $id);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Upload Payment Success</div>');
    redirect('order/pembayaran');
  }
}