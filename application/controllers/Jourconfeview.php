<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Jourconfeview extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jourconfe_model', 'model');
		$this->load->helper('text');
	}
  public function index()
  {
    $data = array (
			'title' => 'Metabright.id'
		);
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['journal'] = $this->model->getJournal();
		$data['conference'] = $this->model->getConference();

    $this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_jourconfe', $data);
		$this->load->view('front-end/layout/v_footer');
  }
}