<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Teacher_model','model');
  }

  // Pengajar
  public function index()
  {
    $data = array (
      'title' => 'Teacher'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $data['pengajar'] = $this->model->getPengajar();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/teacher/teacher', $data);
    $this->load->view('user/template/user_footer');
  }
  public function teachertambah()
  {
    $data = array (
      'title' => 'New Teacher'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['level'] = $this->model->getLevel();
    $this->form_validation->set_rules('pengajar', 'Pengajar', 'trim|required');
    
    if($this->form_validation->run()==False) {
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/teacher/teacher-tambah', $data);
    $this->load->view('user/template/user_footer');
    } else {
      $data = array (
        'pengajar' => $this->input->post('pengajar'),
        'deskripsi' => $this->input->post('deskripsi'),
        'level' => $this->input->post('level', true)
      );
      $this->model->teacherTambah($data);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Teacher Added!</div>');
      redirect('teacher');
    }
  }
  public function tambahSertifikasi($id)
  {
    $data = array (
      'title' => 'Teacher'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['teacher'] = $this->model->getTeacherId($id);

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/teacher/tambah-sertifikasi', $data);
    $this->load->view('user/template/user_footer');
  }
  public function TambahEditSertifikasi()
  {
    $id = $this->input->post('id');
    $this->model->Tambah_Edit_Sertifikasi($id);
    redirect('teacher');
  }
  public function detailTeacher($id)
  {
    $data = array (
			'title' => 'Metabright.id'
		);
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['teacher'] = $this->model->getTeacherId($id);

    $this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_teacher', $data);
		$this->load->view('front-end/layout/v_footer');
  }
  public function editTeacher($id)
  {
    $data = array (
      'title' => 'Edit Teacher'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['teacher'] = $this->model->getTeacherId($id);
    $data['level'] = $this->model->getLevel();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/teacher/edit-teacher', $data);
    $this->load->view('user/template/user_footer');
  }
  public function editTeacherSimpan()
  {
    $id = $this->input->post('id');
    $data = array(
      'pengajar' => $this->input->post('pengajar'),
      'deskripsi' => $this->input->post('deskripsi'),
      'level' => $this->input->post('level', true),
    );
    $this->model->editTeacher($id, $data);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Teacher Updated!</div>');
    redirect('teacher');
  }
  public function teacherHapus($id)
  {
    $data = $this->model->getTeacherById($id);
    $nama = FCPATH . '/assets/img/pengajar/' . $data['image'];
    $sertifikasi = FCPATH . '/assets/img/pengajar/' . $data['sertifikasi'];
    if($data['image'] === null){
      $this->model->teacherHapus($id);
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Teacher Deleted</div>');
      redirect('teacher');
    } else {
      if(is_readable($nama) && unlink($nama)) {
        $this->model->teacherHapus($id);
        if(is_readable($sertifikasi) && unlink($sertifikasi)) {
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Teacher Deleted</div>');
        }
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Teacher Deleted</div>');
        redirect('teacher');
      } else {
        echo "Gagal Hapus";
      }
    }
  }

  // Level Pengajar
  public function level()
  {
    $data = array (
      'title' => 'Level'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['level'] = $this->model->getLevel();
    // $data['id'] = $this->model->getLevelById();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/teacher/level', $data);
    $this->load->view('user/template/user_footer');
  }
  public function leveltambah()
  {
    $data = array (
      'title' => 'New Level'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/teacher/level-tambah', $data);
    $this->load->view('user/template/user_footer');
  }
  public function leveltambahsimpan()
  {
    $data = array (
      'level_name' => $this->input->post('level')
    );
    $this->model->simpanLevel($data);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Level Added!</div>');
    redirect('teacher/level');
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
    $this->load->view('user/teacher/level-edit', $data);
    $this->load->view('user/template/user_footer');
  }
  public function levelEditSimpan()
  {
    $id = $this->input->post('id');
    $data = array (
      'level_name' => $this->input->post('level')
    );
    $this->model->editLevel($id, $data);
    redirect('teacher/level');
  }
  public function levelhapus($id)
  {
    $this->model->levelHapus($id );
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Level Deleted!</div>');
    redirect('teacher/level');
  }
}