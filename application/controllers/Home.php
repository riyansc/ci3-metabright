<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model','model');
		$this->load->helper('text');
	}

	public function index()
	{
		$data = array (
			'title' => 'Metabright.id'
		);
		// Menampilkan user login ke halaman
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['artikel'] = $this->model->getDataInfromasi();
		$data['teacher'] = $this->model->getTeacher();
		$data['course'] = $this->model->getCourseByLimit();

		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_home', $data);
		$this->load->view('front-end/layout/v_footer');
	}
}