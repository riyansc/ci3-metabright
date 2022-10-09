<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {
  public function index()
  {
    $data = array (
			'title' => 'Metabright.id'
		);
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_aboutus', $data);
		$this->load->view('front-end/layout/v_footer');
  }
}