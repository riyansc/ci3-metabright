<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_pendidikan');
    
  }
  
  public function index()
  {
    $data = array(
      'title' => 'Pendidikan',
      'pendidikan' => $this->m_pendidikan->AllData(),
      'isi' => 'back-end/pendidikan/v_index'
    );
    $this->load->view('back-end/layout/v_template', $data, false);
  }
  public function add()
  {

    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required',array(
      'required' => '%s Wajib Harus Disi!!'
    ));
    $this->form_validation->set_rules('tahun', 'Tahun', 'required',array(
      'required' => '%s wajib Harus Disi!!'
    ));
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $data = array(
        'title' => 'Add Data Pendidikan',
        'isi' => 'back-end/pendidikan/v_add'
      );
      $this->load->view('back-end/layout/v_template', $data, false);
    } else {
      # code...
      $data = array(
        'pendidikan' => $this->input->post('pendidikan'),
        'jurusan' => $this->input->post('jurusan'),
        'tahun' => $this->input->post('tahun')
      );
      $this->m_pendidikan->Add($data);
      $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
      redirect('pendidikan');
      
    }
    
    
  }

  public function edit($id_pendidikan)
  {
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required',array(
      'required' => '%s Wajib Harus Disi!!'
    ));
    $this->form_validation->set_rules('tahun', 'Tahun', 'required',array(
      'required' => '%s wajib Harus Disi!!'
    ));
    if ($this->form_validation->run() == FALSE) {
      # code...
      $data = array(
        'title' => 'Add Data Pendidikan',
        'pendidikan' => $this->m_pendidikan->Detail($id_pendidikan),
        'isi' => 'back-end/pendidikan/v_edit'
      );
      $this->load->view('back-end/layout/v_template', $data, false);
    } else {
      $data = array(
        'id_pendidikan' => $id_pendidikan,
        'pendidikan' => $this->input->post('pendidikan'),
        'jurusan' => $this->input->post('jurusan'),
        'tahun' => $this->input->post('tahun')
      );
      $this->m_pendidikan->Edit($data);
      $this->session->set_flashdata('pesan', 'Data Berhasil Update!');
      redirect('pendidikan');
    }
  }
  public function delete($id_pendidikan)
  {
    $data = array(
      'id_pendidikan' => $id_pendidikan
    );
    $this->m_pendidikan->Delete($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil diHapus!');
    redirect('pendidikan');
  }
}