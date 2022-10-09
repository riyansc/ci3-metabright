<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Jourconfe extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Jourconfe_model','model');
  }
  public function index()
  {
    $data = array (
      'title' => 'Journal & Conference'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['journal'] = $this->model->getJournal();
    $data['conference'] = $this->model->getConference();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/jour-confe', $data);
    $this->load->view('user/template/user_footer');
  }
  public function tambahjournal()
  {
    $data = array (
      'title' => 'Add new journal'
    );
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['access'] = $this->model->getAccess();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/jour-tambah', $data);
    $this->load->view('user/template/user_footer');
  }
  public function simpanjournal()
  {
    $data = array (
      'judul' => $this->input->post('judul'),
      'link' => $this->input->post('link'),
      'access' => $this->input->post('access', true),
      'date' => $this->input->post('date')
    );
    $this->model->simpanJournal($data);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Journal Added</div>');
    redirect('jourconfe');
  }
  public function journalHapus($id)
  {
    $data = $this->model->getJournalById($id);
    $nama = FCPATH . '/assets/img/jourconfe/journal/' . $data['image'];
      if(is_readable($nama) && unlink($nama)) {
        $this->model->journalHapus($id); 
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Journal Deleted</div>');
        redirect('jourconfe');
      } else {
        echo "Gagal Hapus";
      }
  }
  public function tambahconf()
  {
    $data = array (
      'title' => 'Add new Conference'
    );
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/conf-tambah', $data);
    $this->load->view('user/template/user_footer');
  }
  public function simpanconf()
  {
    $data = array(
      'judul' => $this->input->post('judul'),
      'link' => $this->input->post('link'),
      'date' => $this->input->post('date'),
    );

    $this->model->simpanConf($data);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Conference Added</div>');
    redirect('jourconfe');
  }
  public function hapusconf($id)
  {
    $data = $this->model->getConferenceById($id);
    $nama = FCPATH . '/assets/img/jourconfe/conference/' . $data['image'];
      if(is_readable($nama) && unlink($nama)) {
        $this->model->hapusConf($id); 
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Conference Deleted</div>');
        redirect('jourconfe');
      } else {
        echo "Gagal Hapus";
      }
  }
}