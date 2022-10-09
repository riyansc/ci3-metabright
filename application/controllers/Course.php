<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Course_model','model');
  }

  // Course
  public function index()
  {
    $data = array (
      'title' => 'Course'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jumlah'] = $this->model->jumlahData();
    // Pagination
    $this->load->library('pagination');

    // config
    $config['base_url'] = 'http://localhost/metabright:8888/course/index/';
    $config['total_rows'] = $this->model->jumlahData();
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
    $data['kursus'] = $this->model->getCourseByLimit($config['per_page'], $data['start']);

        // Cari Data
        if ($this->input->post('keyword')){
          $data['kursus'] = $this->model->cariDataCourse();
        }

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/course-list', $data);
    $this->load->view('user/template/user_footer');
  }

  public function coursetambah()
  {
    $data = array (
      'title' => 'New Course'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kategori'] = $this->model->getKategori();
    $data['level'] = $this->model->getLevel();
    $data['pengajar'] = $this->model->getPengajar();
    $data['status'] = $this->model->getStatus();
    $this->form_validation->set_rules('judul','Course','trim|required');
    $this->form_validation->set_rules('kategori','Category','trim|required');
    $this->form_validation->set_rules('level','Level','trim|required');
    $this->form_validation->set_rules('deskripsi','Descrption','trim|required');
    $this->form_validation->set_rules('pengajar','Instructor','trim|required');
    $this->form_validation->set_rules('harga','Price','trim|required');
    $this->form_validation->set_rules('status','Status','trim|required');
    if($this->form_validation->run()==false){
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/course-tambah', $data);
    $this->load->view('user/template/user_footer');
    } else {
      $judul = $this->input->post('judul');
      $slug = str_replace(' ','-',$judul);
      $data = array (
        'judul' => $this->input->post('judul'),
        'kategori' => $this->input->post('kategori', true),
        'level' => $this->input->post('level', true),
        'deskripsi' => $this->input->post('deskripsi'),
        'slug' => $slug,
        'pengajar' => $this->input->post('pengajar',true),
        'harga' => $this->input->post('harga'),
        'status' => $this->input->post('status',true),
        'akses' => 2,
        'date' => time()
      );
      $this->model->courseTambah($data);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Course Added!</div>');
      redirect('course');
    }
  }
  public function courseEdit($id)
  {
    $data = array (
      'title' => 'Level'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kursus'] = $this->model->getKursusById($id);
    $data['kategori'] = $this->model->getKategori();
    $data['level'] = $this->model->getLevel();
    $data['pengajar'] = $this->model->getPengajar();
    $data['status'] = $this->model->getStatus();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/course-edit', $data);
    $this->load->view('user/template/user_footer');
  }
  public function courseEditSimpan()
  {
    $judul = $this->input->post('judul');
    $Awal = array (' ','.','(',')','#','*','?','!','{','}','$');
    $Akhir = array('-');
    $slug = str_replace($Awal,$Akhir,$judul);
    $id = $this->input->post('id');
    $data =array(
      'judul' => $this->input->post('judul'),
      'level' => $this->input->post('level', true),
      'deskripsi' => $this->input->post('deskripsi'),
      'kategori' => $this->input->post('kategori', true),
      'slug' => $slug,
      'pengajar' => $this->input->post('pengajar', true),
      'harga' => $this->input->post('harga'),
      'status' => $this->input->post('status'),
    );
    $this->model->SimpanEdit($id,$data);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Course Updated!</div>');
    redirect('course');
  }
  public function coursehapus($id)
  {
    $data = $this->model->getKursusById($id);
    $nama = FCPATH . '/assets/img/course/' . $data['logo'];
      if(is_readable($nama) && unlink($nama)) {
        $this->model->hapusCourse($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Course Deleted</div>');
        redirect('course');
      } else {
        echo "Gagal Hapus";
      }
  }
  // Level
  public function level()
  {
    $data = array (
      'title' => 'Level'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['level'] = $this->model->getLevel();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/level-list', $data);
    $this->load->view('user/template/user_footer');
  }
  public function leveltambah()
  {
    $data = array (
      'title' => 'New Level'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('level','Level','trim|required');

    if($this->form_validation->run()==false) {
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/level-tambah', $data);
    $this->load->view('user/template/user_footer');
    }else {
      $data = array (
        'level_name' => $this->input->post('level')
      );

      $this->model->levelTambah($data);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Level Added!</div>');
      redirect('course/level');
    }
  }
  public function leveledit($id)
  {
    $data = array (
      'title' => 'Edit Level'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['level'] = $this->model->getLevelById($id);

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/level-edit', $data);
    $this->load->view('user/template/user_footer');
  }
  public function levelEditSimpan()
  {
    $id = $this->input->post('id');
    $level = array (
      'level_name' => $this->input->post('level')
    );
    $this->model->editLevel($id,$level);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Level Updated</div>');
    redirect('course/level');
  }
  public function levelhapus($id)
  {
    $this->model->hapusLevel($id);
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Level Deleted</div>');
      redirect('course/level');
  }


  // Kategori course
  public function kategori()
  {
    $data = array (
      'title' => 'Category'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kategori'] = $this->model->getKategori();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/kategori-list', $data);
    $this->load->view('user/template/user_footer');
  }
  public function kategoritambah()
  {
    $data = array (
      'title' => 'New Category'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('kategori','Category','trim|required');

    if($this->form_validation->run()==false) {
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/kategori-tambah', $data);
    $this->load->view('user/template/user_footer');
    } else {
      $data = array (
        'nama_kategori' => $this->input->post('kategori')
      );

      $this->model->kategoriTambah($data);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Category Added!</div>');
      redirect('course/kategori');
    }
  }
  public function kategoriEdit($id)
  {
    $data = array (
      'title' => 'Edit Kategori'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kategori'] = $this->model->getKategoriById($id);

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/kategori-edit', $data);
    $this->load->view('user/template/user_footer');
  }
  public function kategoriEditSimpan()
  {
    $id = $this->input->post('id');
    $kategori = array (
      'nama_kategori' => $this->input->post('kategori')
    );
    $this->model->editKategori($id,$kategori);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Kategori Updated</div>');
    redirect('course/kategori');
  }
  public function kategorihapus($id)
  {
    $this->model->kategoriHapus($id);
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Category Deleted</div>');
      redirect('course/kategori');
  }



  // Materi
  public function materi($id)
  {
    $data = array (
      'title' => 'Materi'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    // $id = $this->uri->segment(2);
    $data['id_kursus'] = $this->model->getKursusById($id); 
    $data['materi'] = $this->model->getMateri();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/materi/materi-list', $data);
    $this->load->view('user/template/user_footer');
  }
  public function materitambah()
  {
    $data = array (
      'title' => 'Tambah Materi'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $id = $this->uri->segment(3); 
    $data['id_kursus'] = $this->model->getKursusById($id); 
    $this->form_validation->set_rules('judul','Judul','trim|required');

    if($this->form_validation->run()==False) {
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('course/materi/materi-tambah', $data);
    $this->load->view('user/template/user_footer');
    } else {
    $judul = $this->input->post('judul');
    $slug = str_replace(' ','-',$judul);
    $data = array (
      'id_kursus' => $this->input->post('id_kursus'),
      'judul' => $this->input->post('judul'),
      'deskripsi' => $this->input->post('deskripsi'),
      'media' => $this->input->post('media', true),
      'slug' => $slug,
      'date' => time()
    );
    $this->model->materiTambah($data);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Materi Baru ditambahkan!</div>');
    redirect('course');
    }
  }
  public function hapusMateri($id)
  {
    $data = $this->model->getMateriById($id);
    $nama = FCPATH . '/assets/img/course/materi/' . $data['file'];
      if(is_readable($nama) && unlink($nama)) {
        $this->model->hapusMateri($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Materi Deleted</div>');
        redirect('course');
      } else {
        echo "Gagal Hapus";
      }
  }
}