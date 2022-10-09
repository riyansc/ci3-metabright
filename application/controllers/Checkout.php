<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
  public function index()
  {
    $data = array (
			'title' => 'Checkout'
		);
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/order/checkout', $data);
		$this->load->view('front-end/layout/v_footer');
  }
}