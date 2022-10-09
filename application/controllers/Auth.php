<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }
  // Method Login
  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('user');
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == False) {
      # code...
      $data['title'] = 'Login';
      $this->load->view('auth/template/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('auth/template/auth_footer');
    } else {
      // Validasi suksses dan login
      $this->_login();
    }
  }

  private function _login() 
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
    
    // Jika Usernya ada
    if( $user) {
      // Jika Usernya Aktif
      if($user['is_active'] == 1) {
        // Cek Password
        if (password_verify($password, $user['password'])) {
          # code...
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            # code...
            redirect('home');
          } else {
            redirect('home');
          }

        } else {
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Password!</div>');

          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email has not activated</div>');

        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered</div>');

      redirect('auth');
    }
  }

  // Method Registration
  public function registration()
  {
    if ($this->session->userdata('email')) {
      redirect('user');
    }
    // Validasi Registrasi
    $this->form_validation->set_rules('name', 'Name','required|trim');
    $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[tbl_user.email]',[
      'is_unique' => 'This emial has already registered!'
    ]);
    $this->form_validation->set_rules('password1', 'Password','required|trim|min_length[3]|matches[password2]',[
      'matches' => "password don't match!",
      'min_length' => 'Password too short!'
    ]);
    // Repeat password (password 2)
    $this->form_validation->set_rules('password2', 'Password','required|trim|min_length[3]|matches[password1]');
    

    if ($this->form_validation->run() == FALSE) {
      // Jika Salah maka akan di kembalikan ke tampilan awal
      $data['title'] = 'Registrasi User';
      $this->load->view('auth/template/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('auth/template/auth_footer');
    } else {
      // Jika Berhasil maka data akan ditambahkan
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpeg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_create' => time('Y-m-d')
      ];

      // Siapkan Token
      $token = base64_encode(random_bytes(32));
      // var_dump($token);
      // die;
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];

      // Insert Data
      $this->db->insert('tbl_user', $data);
      $this->db->insert('tbl_user_token', $user_token);
      // Kirim Email Aktivasi
      $this->_sendEmail($token, 'verify');
      // Pesan Success 
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Activate Your Account!</div>');
      // Pindah ke halaman login
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type) 
  {
    // Cara Berhasil

    $this->load->library('mailer');

		$email = $this->input->post('email');

    if($type == 'verify'){
		  $subjek = 'Account Verification';
		  $pesan = 'Click This Link to verify your account : <a href="' .base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) .'">Activate</a>';
		  $attachment = $_FILES['attachment'];
		  $content = $this->load->view('auth/content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
    } else if($type == 'forgot') {
      $subjek = 'Reset Password';
		  $pesan = 'Click This Link to reset your password : <a href="' .base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) .'">Reset Password</a>';
		  $attachment = $_FILES['attachment'];
		  $content = $this->load->view('auth/content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
    }
		$sendmail = array(
			'email'=>$email,
			'subjek'=>$subjek,
			'content'=>$content,
			'attachment'=>$attachment
		);

		if(empty($attachment['name'])){ // Jika tanpa attachment
			$this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
		}else{ // Jika dengan attachment
			$this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
		}
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    // var_dump($email, $token);
    // die;

    $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
    
    if($user['email']) {
      $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();

      // var_dump($user_token);
      // die;
      if($user_token){
        if(time() - $user_token['date_created'] < (60*60*24)){
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('tbl_user');

          $this->db->delete('tbl_user_token', ['email'=> $email]);
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'. $email .' Has been activated!, Please Login.</div>');
          redirect('auth');
        } else {
          $this->db->delete('tbl_user', ['email' => $email]);
          $this->db->delete('tbl_user_token', ['email' => $email]);

          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account Activation Failed! Token expired.</div>');
          redirect('auth');
        }
      } else {
        // var_dump($user_token);
        // die;
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account Activation Failed! Wrong Token.</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account Activation Failed! Wrong email.</div>');
      redirect('auth');
      // $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
      // // Pindah ke halaman login
      // redirect('auth');
    }
  }

  public function forgotpassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if($this->form_validation->run() == false) {
      $data['title'] = 'Forgot Password';
        $this->load->view('auth/template/auth_header', $data);
        $this->load->view('auth/forgot-password');
        $this->load->view('auth/template/auth_footer');
      
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('tbl_user', ['email' => $email, 'is_active' => 1 ])->row_array();

      if($user){
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('tbl_user_token', $user_token);

        $this->_sendEmail($token, 'forgot');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Please check your email to reset password!</div>');
        redirect('auth/forgotpassword');
      }else {
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
        redirect('auth/forgotpassword');
      }
    }
  }

  public function resetpassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

    if($user){
      $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();

      if($user_token) {
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword();
      }else{
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset Password Failed! Wrong Token.</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset Password Failed! Wrong email.</div>');
        redirect('auth');
    }
  }

  public function changePassword()
  {
    if(!$this->session->userdata('reset_email')) {
      redirect('auth');
    }
    $this->form_validation->set_rules('password1', 'Password','required|trim|min_length[3]|matches[password2]',[
      'matches' => "password don't match!",
      'min_length' => 'Password too short!'
    ]);
    // Repeat password (password 2)
    $this->form_validation->set_rules('password2', 'Password','required|trim|min_length[3]|matches[password1]');
    
    if($this->form_validation->run()==false){
    $data['title'] = 'Change Password';
    $this->load->view('auth/template/auth_header', $data);
    $this->load->view('auth/change-password');
    $this->load->view('auth/template/auth_footer');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('tbl_user');

      $this->session->unset_userdata('reset_email');
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password has been changed! Please Login.</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been logged out!</div>');
    redirect('auth');
  }
  public function blocked()
  {
    $this->load->view('auth/blocked');
  }
}