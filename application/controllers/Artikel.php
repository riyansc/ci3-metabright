<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Artikel_model', 'artikel');
		$this->load->helper('text');
	}

	public function index()
	{
    $data = array (
			'title' => 'Metabright.id'
		);
		// Menampilkan user login ke halaman
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jumlah'] = $this->artikel->jumlahData();
		// pagination
		$this->load->library('pagination');

		$config['base_url'] = 'http://localhost:8888/metabright/artikel/index';
		$config['total_rows'] = $this->artikel->jumlahData();
		$config['per_page'] = 5;
		// Costumize tampilan
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_link'] ='First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);

		//End pagination
		$data['start'] = $this->uri->segment(3);
		
		$data['artikel'] = $this->artikel->getInformasi($config['per_page'],$data['start']);
		$data['kategori'] = $this->artikel->getKategori();

		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_artikel', $data);
		$this->load->view('front-end/layout/v_footer');
	}
	public function read($slug)
	{
		$data = array (
			'title' => 'Metabright.id'
		);
		// Menampilkan user login ke halaman
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['artikel'] = $this->artikel->getBySlugInfo($slug);
		$data['kategori'] = $this->artikel->getKategori();
		
		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/artikel/v_read', $data);
		$this->load->view('front-end/layout/v_footer');
	}
	public function kategori()
	{
		$data = array (
			'title' => 'Metabright.id'
		);
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jumlah'] = $this->artikel->jumlahData();
		// pagination
		$this->load->library('pagination');

		$config['base_url'] = 'http://localhost:8888/metabright/artikel/index';
		$config['total_rows'] = $this->artikel->jumlahData();
		$config['per_page'] = 5;
		// Costumize tampilan
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_link'] ='First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);

		//End pagination
		$data['start'] = $this->uri->segment(3);
		
		$data['artikel'] = $this->artikel->getInformasi($config['per_page'],$data['start']);
		$nama_kategori = $this->input->get('filter');
		$kategori = $this->artikel->getKategoriByName($nama_kategori);
		$data['artikel'] = $this->artikel->getArtikel($kategori['id']);
		$data['kategori'] = $this->artikel->getKategori();
		
		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_artikel', $data);
		$this->load->view('front-end/layout/v_footer');
	}
	public function cari()
	{	
		$data = array (
			'title' => 'Metabright.id'
		);
		// Menampilkan user login ke halaman
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jumlah'] = $this->artikel->jumlahData();
		// pagination
		$this->load->library('pagination');

		$config['base_url'] = 'http://localhost:8888/metabright/artikel/index';
		$config['total_rows'] = $this->artikel->jumlahData();
		$config['per_page'] = 5;
		// Costumize tampilan
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_link'] ='First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);

		//End pagination
		$data['start'] = $this->uri->segment(3);
		
		$data['artikel'] = $this->artikel->getInformasi($config['per_page'],$data['start']);
		$keyword = $this->input->get('keyword');
		$data['artikel'] = $this->artikel->search($keyword);
		$data['kategori'] = $this->artikel->getKategori();

		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_artikel', $data);
		$this->load->view('front-end/layout/v_footer');
	}
}