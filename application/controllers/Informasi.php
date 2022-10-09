<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    // is_logged_in();
    $this->load->model('Informasi_model');
  }

  public function daftarinformasi()
  {
    $data = array (
      'title' => 'Informasi'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jumlah'] = $this->Informasi_model->jumlahArtikel();
    $this->load->library('pagination');

    // config
    $config['base_url'] = 'http://localhost/metabright:8888/informasi/daftarinformasi/';
    $config['total_rows'] = $this->Informasi_model->jumlahArtikel();
    $config['per_page'] = 5;
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
    $data['start'] = $this->uri->segment(3);

    // Menampilkan data informasi join
    $data['daftarInformasi'] = $this->Informasi_model->daftarInformasi($config['per_page'],$data['start']);

    $data['kategori'] = $this->db->get('tbl_informasi_kategori')->result_array();
    $data['status'] = $this->db->get('tbl_informasi_status')->result_array();

    // Cari Data
    if ($this->input->post('keyword')){
      $data['daftarInformasi'] = $this->Informasi_model->cariDataArtikel();
    }

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/daftar-informasi', $data);
    $this->load->view('user/template/user_footer');
  }
  public function tambahinformasi()
  {
    $data['title'] = 'Tambah Informasi';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $data['nama_kategori'] = $this->db->get('tbl_informasi_kategori')->result_array();
    $data['status'] = $this->db->get('tbl_informasi_status')->result_array();
    $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
    $this->form_validation->set_rules('ckeditor', 'Isi Konten', 'trim|required');
    
    if($this->form_validation->run()== FALSE){
      $this->load->view('user/template/user_header', $data);
      $this->load->view('user/template/user_sidebar', $data);
      $this->load->view('user/template/user_topbar', $data);
      $this->load->view('user/tambahinformasi', $data);
      $this->load->view('user/template/user_footer');
    } else {
      $judul = $this->input->post('judul');
      $Replace = array (' ','.','!','?','(',')','{','}');
      $slug = str_replace($Replace,'-',$judul);
      $data = [
        'judul' => $this->input->post('judul'),
        'kategori' => $this->input->post('kategori', true),
        'konten' => htmlspecialchars($this->input->post('ckeditor'), true),
        'slug' => $slug,
        'status' => $this->input->post('status', true),
        'creator' => $this->session->userdata('email'),
        'date_created' => time()
      ];

      $this->Informasi_model->insertInformasi($data);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Post added</div>');
    redirect('informasi/daftarinformasi');
    }
  }
  public function detailInformasi($id)
  {
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data_kategori = $this->Informasi_model->detailInformasi($id);
    $id_kategori = $data_kategori['kategori'];
    $data['kategori'] = $this->Informasi_model->getKategoriById($id_kategori);
    $data['detail'] = $this->Informasi_model->detailInformasi($id);
    
    $data['title'] = 'Detail Informasi';
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/detail-informasi', $data);
    $this->load->view('user/template/user_footer');
  }
  public function editInformasi($id)
  {
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['edit'] = $this->Informasi_model->detailInformasi($id);
    $data['kategori'] = $this->db->get('tbl_informasi_kategori')->result_array();
    $data['status'] = $this->db->get('tbl_informasi_status')->result_array();

    $data['title'] = 'Edit Informasi';
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/edit-informasi', $data);
    $this->load->view('user/template/user_footer');
  }
  public function editInformasiSimpan()
  {
      $judul = $this->input->post('judul');
      $slug = str_replace(' ','-',$judul);
      $id = $this->input->post('id');
      $data = [
        'judul' => $this->input->post('judul'),
        'kategori' => $this->input->post('kategori', true),
        'konten' => htmlspecialchars($this->input->post('ckeditor'), true),
        'slug' => $slug,
        'status' => $this->input->post('status', true),
        'creator' => $this->session->userdata('email'),
        'date_created' => time()
      ];

    $this->Informasi_model->editInformasi($data,$id);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Post Updated</div>');
    redirect('informasi/daftarinformasi');
  }
  public function hapusInformasi($id)
  {
    $data = $this->Informasi_model->detailInformasi($id);
    $nama = FCPATH . '/assets/img/informasi/' . $data['image'];
      if(is_readable($nama) && unlink($nama)) {
        $this->Informasi_model->hapusInformasi($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Post Deleted</div>');
        redirect('informasi/daftarinformasi');
      } else {
        echo "Gagal Hapus";
      }
  }
  public function kategori()
  {
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    // $this->load->model('dataKategori', 'kategori');
    $data['kategori'] = $this->db->get('tbl_informasi_kategori')->result_array();
    // $data['editKategori'] = $this->Informasi_model->getKategoriById($id);

    $data['title'] = 'Tambah Kategori';
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/kategori', $data);
    $this->load->view('user/template/user_footer');
  }
  public function tambahkategori()
  {
    $kategori = $this->input->post('kategori');
    if('submit') {
    $this->db->set('nama_kategori', $kategori);
    $this->db->insert('tbl_informasi_kategori');
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Kategori Added</div>');
    redirect('informasi/kategori');
    }
  }
  public function editkategori()
  {
    $data['title'] = 'Edit Kategori';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $id = $this->uri->segment(3);
    
    $data['editkategori'] = $this->Informasi_model->getKategoriById($id);
    // $data['kategori'] = $this->db->get('tbl_informasi_kategori')->result_array();
    $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
    if(!$id) {
      redirect('informasi/kategori');
    } else {
      if ($this->form_validation->run()==false) {
        $this->load->view('user/template/user_header', $data);
        $this->load->view('user/template/user_sidebar', $data);
        $this->load->view('user/template/user_topbar', $data);
        $this->load->view('user/edit-kategori', $data);
        $this->load->view('user/template/user_footer');    
      }
    }
  }
  public function editkategorisimpan()
  {
      $id = $this->input->post('id');
      $data = $this->input->post('nama_kategori');
      $this->Informasi_model->updateKategori($id, $data);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Kategori Updated</div>');
      redirect('informasi/kategori');
  }
  public function hapuskategori()
  {
    $id = $this->uri->segment(3);
    if(!$id){
      redirect('informasi/kategori');
    }else {
    // $data = $this->Informasi_model->getKategoriById($id);
    $this->Informasi_model->delete($id);
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Kategori Deleted</div>');
    redirect('informasi/kategori');
    }
  }
}