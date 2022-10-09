<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('User_model');
  }
  public function index() 
  {
    $data = array (
      'title' => 'My Profil'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('user/template/user_footer');
  }



  public function daftarUser()
  {
    $data = array ('title' => 'Daftar User',);
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jumlah'] = $this->User_model->jumlahUser();
    // Pagination
    $this->load->library('pagination');

    // config
    $config['base_url'] = 'http://localhost/metabright:8888/user/daftaruser/';
    $config['total_rows'] = $this->User_model->jumlahUser();
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
    $data['daftarUser'] = $this->User_model->userPage($config['per_page'],$data['start']);

    // Cari Data
    if ($this->input->post('keyword')){
      $data['daftarUser'] = $this->User_model->cariDataUser();
    }

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/daftaruser', $data);
    $this->load->view('user/template/user_footer');
  }

  public function tambahUser()
  {
    // Title
    $data = array ('title' => 'Add User',);

    // Data Session
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    //Mengambil data Role
    $data['daftarRole'] = $this->User_model->daftarUser();
    //Mengambil Data Role dari table role
    $data['role'] = $this->db->get('tbl_user_role')->result_array();

    // Validasi Error
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[tbl_user.email]',[
      'is_unique' => 'This emial has already registered!'
    ]);

    $this->form_validation->set_rules('password1', 'Password','required|trim|min_length[3]|matches[password2]',[
      'matches' => "password don't match!",
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password','required|trim|min_length[3]|matches[password1]');

    // Proses
    if($this->form_validation->run() == FALSE) {
      $this->load->view('user/template/user_header', $data);
      $this->load->view('user/template/user_sidebar', $data);
      $this->load->view('user/template/user_topbar', $data);
      $this->load->view('user/tambahuser', $data);
      $this->load->view('user/template/user_footer');
    } else {
      $data = array(
        'name'=>$this->input->post('name'),
        'email'=>$this->input->post('email'),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => $this->input->post('role_id', true),
        'is_active' => 1,
        'date_create' => time('Y-m-d')
      );

      $this->User_model->tambahUser($data);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New User Added!</div>');
      redirect('user/daftaruser');
    }
  }

  // Fungsi Update Masih belum bisa menghapus gambar lama perlu di perbaiki.
  public function updateUser()
  {
    // Title
    $data['title'] = 'Update User';
    // Session User Login
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    // Ambil Link di segment ke 3
    $id = $this->uri->segment(3);
    $edit['tbl_user'] = $this->User_model->getUserById($id);
    $data['role'] = $this->db->get('tbl_user_role')->result_array();

    // Form Validasi

    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/updateuser', $edit);
    $this->load->view('user/template/user_footer');
    }

  public function updateSimpan()
  {
    $id = $this->input->post('id');
    $data = [
      'name' => $this->input->post('name'),
      'role_id' => $this->input->post('role_id', true)
    ];
    $this->User_model->editUser($data,$id);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">User Updated</div>');
    redirect('user/daftaruser');
  }

  public function hapus($id){
    $data = $this->User_model->getUserById($id);
    $nama = FCPATH . '/assets/img/' . $data['image'];
    if($data['image'] == 'default.jpeg'){
      $this->User_model->delete($id);
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">User Has Been Deleted!</div>');
      redirect('user/daftaruser');
    }elseif($data['image'] != 'default.jpeg') {
      if(is_readable($nama) && unlink($nama)) {
        $this->User_model->delete($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">User Has Been Deleted!</div>');
        redirect('user/daftaruser');
      }
    }
  }


  // Edit Profil User pada Session
  public function edit()
  {
    $data['title'] = 'Edit Profile';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

    if($this->form_validation->run() == FALSE){
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/edit', $data);
    $this->load->view('user/template/user_footer');
    } else {
      $name = $this->input->post('name');
      $email = $this->input->post('email');

      // Cek Jika ada Gambar yang di upload
      $upload_image = $_FILES['image']['name'];
      
      if($upload_image) {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']	= '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload');
		    $this->upload->initialize($config); // Load konfigurasi uploadnya

        if($this->upload->do_upload('image')){
          $old_image = $data['user']['image'];
          if($old_image != 'default.png') {
            unlink(FCPATH . 'assets/img/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {

          echo $this->upload->display_errors();

        }
      }

      $this->db->set('name', $name);
      $this->db->where('email', $email);
      $this->db->update('tbl_user');
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Your Profile Has Been Updated</div>');
      redirect('user');
    }
  }
  public function changepassword() 
  {
    $data = array (
      'title' => 'Change Password'
    );
    	// Menampilkan user login ke halaman home
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
    $this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|required|min_length[3]|matches[new_password1]');
    

    if($this->form_validation->run()==false) {
    $this->load->view('user/template/user_header', $data);
    $this->load->view('user/template/user_sidebar', $data);
    $this->load->view('user/template/user_topbar', $data);
    $this->load->view('user/changepassword', $data);
    $this->load->view('user/template/user_footer');
    }else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
      if(!password_verify($current_password, $data['user']['password'])){
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
        redirect('user/changepassword');
      } else {
        if($current_password == $new_password){
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">New Password Cannot be the same as Current Password!</div>');
          redirect('user/changepassword');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('tbl_user');
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password Changed!</div>');
          redirect('user/changepassword');
        }
      }
    }
  }
} 