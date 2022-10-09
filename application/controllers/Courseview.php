<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Courseview extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Course_model','model');
		if (!$this->session->userdata('email')){
			redirect('auth');
		}
  }
  public function index()
  {
    $data = array (
			'title' => 'Metabright.id'
		);
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jumlah'] = $this->model->jumlahData();
    // Pagination
    $this->load->library('pagination');

    // config
    $config['base_url'] = 'http://localhost/metabright:8888/courseview/index/';
    $config['total_rows'] = $this->model->jumlahData();
    $config['per_page'] = 6;
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
    $data['course'] = $this->model->getCourseByLimit($config['per_page'], $data['start']);
    $data['kategori'] = $this->model->getKategori();

    $this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_course', $data);
		$this->load->view('front-end/layout/v_footer');
  }
  public function kategori()
	{
		$data = array (
			'title' => 'Metabright.id'
		);
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		
		$nama_kategori = $this->input->get('filter');
		$kategori = $this->model->getKategoriByName($nama_kategori);

		$data['course'] = $this->model->getCourseByKategori($kategori['id']);
		$data['kategori'] = $this->model->getKategori();
		
		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_course', $data);
		$this->load->view('front-end/layout/v_footer');
	}
	public function cari()
	{
		$data = array (
			'title' => 'Metabright.id'
		);
		// Menampilkan user login ke halaman
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$keyword = $this->input->get('keyword');
		$data['course'] = $this->model->search($keyword);
		$data['kategori'] = $this->model->getKategori();

		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/v_course', $data);
		$this->load->view('front-end/layout/v_footer');
	}
	public function read($slug)
	{
		$data = array (
			'title' => 'Metabright.id'
		);
		// Menampilkan user login ke halaman
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['course'] = $this->model->getBySlug($slug);
		$data['materi'] = $this->model->getMateri();
 		
		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/course/v_read', $data);
		$this->load->view('front-end/layout/v_footer');
	}

	// Checkout
	public function checkout($slug)
	{
		$data = array (
			'title' => 'Checkout'
		);
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kursus'] = $this->model->getBySlug($slug);

    $this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/order/checkout', $data);
		$this->load->view('front-end/layout/v_footer');

	}
	public function checkoutsimpan()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

		$data = array (
			'id_user' => $this->input->post('id_user'),
			'nama' => $this->input->post('name'),
			'nomor' => $this->input->post('no'),
			'pesan' => $this->input->post('pesan'),
			'tagihan' => '1',
			'id_kursus' => $this->input->post('id_kursus'),
			'kursus' => $this->input->post('kursus'),
			'status' => '1',
			'date' => time()
		);

		// Insert Data
		$this->model->inputCheckout($data);

		// Kirim Email Aktivasi
		$this->_sendEmail('order');

		redirect('courseview');
	}
	public function order()
	{
		
	}

	private function _sendEmail() 
  {

    	$this->load->library('mailer');

			$email = $this->input->post('email');


		  $subjek = 'Order Confirmation';
		  $pesan = '
			<div style="background-color:#2f4858; padding-right:30px; padding-left:30px; padding-top:5px; padding-bottom:5px; border-radius:5px">
			<h1 style="color:white">Payment For ' . $this->input->post('kursus') . '</h1></div>
			<div>
				<p>Hi, '.$this->input->post('name').'</p>
				<p>Thank you for your order. Status is still on hold until we confirm that payment has been received. Meanwhile, here is a reminder for your order : <br> <br>
					Send payment confirmation to Dashboard menu in bill payment and upload your proof of payment<br> or your send proof of payment via WA +62-895-4227-20524 or email info@metabright.id</p>

					<h2>Our bank details</h2>
					<p>
					Bank : BNI
					Account Number : 0005331573
					</p>
					<table style="border-collapse: collapse; text-align:left;">
						<thead style="background-color:#ffdb43;">
							<tr>
								<th style="border: 1px solid #999; padding: 8px 5px;">Course</th>
								<th style="border: 1px solid #999; padding: 8px 5px;">Price</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="border: 1px solid #999; padding: 8px 5px;">'.$this->input->post('kursus').'</td>
								<td style="border: 1px solid #999; padding: 8px 5px;">'.$this->input->post('harga').'</td>
							</tr>
							<tr>
								<td style="border: 1px solid #999; padding: 8px 5px;">Payment Method</td>
								<td style="border: 1px solid #999; padding: 8px 5px;">Transfer Bank</td>
							</tr>
						</tbody>
					</table>
					<hr>
					<h2>Billing address</h2>
					<p>'.$this->input->post('name').'</p>
					<p>'.$this->input->post('no').'</p>
					<p>'.$this->input->post('email').'</p>
			</div>';
		  $attachment = $_FILES['attachment'];
		  $content = $this->load->view('course/order/checkout', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content

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

	// View materi belajar
	public function mycourse_view($slug)
	{
		$data = array (
			'title' => 'Metabright.id'
		);
		// Menampilkan user login ke halaman
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['course'] = $this->model->getBySlug($slug);
		$data['materi'] = $this->model->getMateri();
 		
		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/course/mycourse-learn', $data);
		$this->load->view('front-end/layout/v_footer');
	}

	public function mycourse_theory($id)
	{
		$data = array (
			'title' => 'Metabright.id'
		);
		// Menampilkan user login ke halaman
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['materi'] = $this->model->getMateri();
		$data['materi_id'] = $this->model->getMateriById($id);
		$data['course'] = $this->model->getCourseByIdd($data['materi_id']['id_kursus']);
		$data['pengajar'] = $this->model->getPengajarById($data['course']['pengajar']);
		$data['level'] = $this->model->getLevelById($data['course']['level']);
		$data['kategori'] = $this->model->getKategoriById($data['course']['kategori']);
 		
		$this->load->view('front-end/layout/v_header', $data);
		$this->load->view('front-end/layout/v_nav', $data);
		$this->load->view('front-end/course/mycourse-theory', $data);
		$this->load->view('front-end/layout/v_footer');
	}
	

}