<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {
  public function getCourse($limit, $start)
  {
    $this->db->select('tbl_kursus.*,tbl_kursus_akses.access_name,tbl_kursus_level.level_name,tbl_kursus_kategori.nama_kategori,tbl_pengajar.pengajar,tbl_kursus_status.status_name');
    $this->db->from('tbl_kursus');
    $this->db->order_by('id','desc');
    $this->db->limit($limit,$start);
    $this->db->join('tbl_kursus_akses','tbl_kursus_akses.id = tbl_kursus.akses');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id=tbl_kursus.level');
    $this->db->join('tbl_kursus_kategori','tbl_kursus_kategori.id=tbl_kursus.kategori');
    $this->db->join('tbl_pengajar','tbl_pengajar.id=tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_status','tbl_kursus_status.id=tbl_kursus.status');
    return $this->db->get()->result_array();
  }
  public function getCourseByLimit($limit,$start)
  {
    $this->db->select('tbl_kursus.*,tbl_kursus_akses.access_name,tbl_kursus_level.level_name,tbl_kursus_kategori.nama_kategori,tbl_pengajar.pengajar,tbl_kursus_status.status_name');
    $this->db->from('tbl_kursus');
    $this->db->order_by('id','desc');
    $this->db->limit($limit,$start);
    $this->db->join('tbl_kursus_akses','tbl_kursus_akses.id = tbl_kursus.akses');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id=tbl_kursus.level');
    $this->db->join('tbl_kursus_kategori','tbl_kursus_kategori.id=tbl_kursus.kategori');
    $this->db->join('tbl_pengajar','tbl_pengajar.id=tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_status','tbl_kursus_status.id=tbl_kursus.status');
    return $this->db->get()->result_array();
  }
  public function getCourseByKategori($ktg)
  {
    $this->db->select('tbl_kursus.*,tbl_kursus_akses.access_name,tbl_kursus_level.level_name,tbl_kursus_kategori.nama_kategori,tbl_pengajar.pengajar,tbl_kursus_status.status_name');
    $this->db->from('tbl_kursus');
    $this->db->join('tbl_kursus_akses','tbl_kursus_akses.id = tbl_kursus.akses');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id=tbl_kursus.level');
    $this->db->join('tbl_kursus_kategori','tbl_kursus_kategori.id=tbl_kursus.kategori');
    $this->db->join('tbl_pengajar','tbl_pengajar.id=tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_status','tbl_kursus_status.id=tbl_kursus.status');
    $this->db->where('kategori', $ktg);
    return $this->db->get()->result_array();
  }

  public function getCoursee($id)
  {
    $this->db->select('tbl_kursus.*, tbl_pengajar.pengajar, tbl_kursus_level.level_name');
    $this->db->from('tbl_kursus');
    $this->db->join('tbl_pengajar','tbl_pengajar.id = tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id = tbl_kursus.level');
    $this->db->where('id', $id);
    return $this->db->get()->result_array();
  }
  public function getKursusById($id)
  {
    return $this->db->get_where('tbl_kursus',['id' => $id])->row_array();
  }
  public function courseTambah($data)
  {
    $upload_image = $_FILES['logo']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/course/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']	= '2048';
          $config['remove_space'] = TRUE;

          $this->load->library('upload');
          $this->upload->initialize($config); // Load konfigurasi uploadnya
          if($this->upload->do_upload('logo')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('logo', $new_image);
            } else {
              echo $this->upload->display_errors();
            }
        }
    $this->db->insert('tbl_kursus', $data);
  }
  public function SimpanEdit($id,$data)
  {
    $upload_image = $_FILES['logo']['name'];
        if($upload_image) {
          $config['upload_path'] = './assets/img/course/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']	= '2048';
          $config['remove_space'] = TRUE;

          $this->load->library('upload');
          $this->upload->initialize($config); // Load konfigurasi uploadnya
          if($this->upload->do_upload('logo')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('logo', $new_image);
            } else {
              echo $this->upload->display_errors();
            }
        }
        $this->db->where('id', $id);
    $this->db->update('tbl_kursus', $data);
  }
  public function hapusCourse($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('tbl_kursus');
  }
  public function search($keyword)
  {
    $this->db->like('judul', $keyword);
    // $this->db->or_like('deskripsi', $keyword);

    // Data Join
    $this->db->select('tbl_kursus.*,tbl_kursus_akses.access_name,tbl_kursus_level.level_name,tbl_kursus_kategori.nama_kategori,tbl_pengajar.pengajar,tbl_kursus_status.status_name');
    $this->db->from('tbl_kursus');
    $this->db->join('tbl_kursus_akses','tbl_kursus_akses.id = tbl_kursus.akses');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id=tbl_kursus.level');
    $this->db->join('tbl_kursus_kategori','tbl_kursus_kategori.id=tbl_kursus.kategori');
    $this->db->join('tbl_pengajar','tbl_pengajar.id=tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_status','tbl_kursus_status.id=tbl_kursus.status');
    return $this->db->get()->result_array();
    // End Data Join
  }
  public function cariDataCourse()
  {
    $keyword = $this->input->post('keyword', true);
    $this->db->like('judul', $keyword);
    $this->db->select('tbl_kursus.*,tbl_kursus_akses.access_name,tbl_kursus_level.level_name,tbl_kursus_kategori.nama_kategori,tbl_pengajar.pengajar,tbl_kursus_status.status_name');
    $this->db->from('tbl_kursus');
    $this->db->join('tbl_kursus_akses','tbl_kursus_akses.id = tbl_kursus.akses');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id=tbl_kursus.level');
    $this->db->join('tbl_kursus_kategori','tbl_kursus_kategori.id=tbl_kursus.kategori');
    $this->db->join('tbl_pengajar','tbl_pengajar.id=tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_status','tbl_kursus_status.id=tbl_kursus.status');
    return $this->db->get()->result_array();
  }
  public function jumlahData()
  {
    return $this->db->get('tbl_kursus')->num_rows();
  }
  public function getBySlug($slug)
  {
    $this->db->select('tbl_kursus.*,tbl_kursus_akses.access_name,tbl_kursus_level.level_name,tbl_kursus_kategori.nama_kategori,tbl_pengajar.pengajar,tbl_pengajar.image,tbl_pengajar.sertifikasi,tbl_kursus_status.status_name');
    $this->db->from('tbl_kursus');
    $this->db->join('tbl_kursus_akses','tbl_kursus_akses.id = tbl_kursus.akses');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id=tbl_kursus.level');
    $this->db->join('tbl_kursus_kategori','tbl_kursus_kategori.id=tbl_kursus.kategori');
    $this->db->join('tbl_pengajar','tbl_pengajar.id=tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_status','tbl_kursus_status.id=tbl_kursus.status');
    $this->db->where('slug', $slug);
    return $this->db->get()->row_array();
    // return $this->db->get_where('tbl_kursus', ['slug' => $slug])->row_array();
  }
  public function getCourseById($id)
  {
    $this->db->select('tbl_kursus.*,tbl_kursus_akses.access_name,tbl_kursus_level.level_name,tbl_kursus_kategori.nama_kategori,tbl_pengajar.pengajar,tbl_pengajar.image,tbl_pengajar.sertifikasi,tbl_kursus_status.status_name');
    $this->db->from('tbl_kursus');
    $this->db->join('tbl_kursus_akses','tbl_kursus_akses.id = tbl_kursus.akses');
    $this->db->join('tbl_kursus_level','tbl_kursus_level.id=tbl_kursus.level');
    $this->db->join('tbl_kursus_kategori','tbl_kursus_kategori.id=tbl_kursus.kategori');
    $this->db->join('tbl_pengajar','tbl_pengajar.id=tbl_kursus.pengajar');
    $this->db->join('tbl_kursus_status','tbl_kursus_status.id=tbl_kursus.status');
    $this->db->where('id', $id);
    return $this->db->get()->row_array();
  }
  public function getCourseByIdd($id)
  {
    return $this->db->get_where('tbl_kursus', ['id' => $id])->row_array();
  }


  // Level
  public function getLevel()
  {
    return $this->db->get('tbl_kursus_level')->result_array();
  }
  public function levelTambah($data)
  {
    $this->db->insert('tbl_kursus_level', $data);
  }
  public function editLevel($id, $level)
  {
    $this->db->where('id',$id);
    $this->db->update('tbl_kursus_level',$level);
  }
  public function getLevelById($id)
  {
    return $this->db->get_where('tbl_kursus_level', ['id' => $id])->row_array();
  }
  public function hapusLevel($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('tbl_kursus_level');
  }


  // Kategori
  public function getKategori()
  {
    return $this->db->get('tbl_kursus_kategori')->result_array();
  }
  public function kategoriTambah($data)
  {
    $this->db->insert('tbl_kursus_kategori', $data);
  }
  public function editKategori($id, $kategori)
  {
    $this->db->where('id' , $id);
    $this->db->update('tbl_kursus_kategori', $kategori);
  }
  public function getKategoriById($id)
  {
    return $this->db->get_where('tbl_kursus_kategori', ['id' => $id])->row_array();
  }
  public function kategoriHapus($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('tbl_kursus_kategori');
  }
  public function getKategoriByName($namaktg)
  {
    return $this->db->get_where('tbl_kursus_kategori', ['nama_kategori' => $namaktg])->row_array();
  }

  // Pengajar
  public function getPengajar()
  {
    return $this->db->get('tbl_pengajar')->result_array();
  }
  public function getPengajarById($id)
  {
    return $this->db->get_where('tbl_pengajar',['id'=>$id])->row_array();
  }

  // Status
  public function getStatus()
  {
    return $this->db->get('tbl_kursus_status')->result_array();
  }

  // Materi
  public function materiTambah($data)
  {
    $upload_image = $_FILES['file']['name'];
      if($upload_image) {
          $config['upload_path'] = './assets/img/course/materi/';
          $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|mp4';
          $config['max_size']	='0';
          $config['remove_space'] = TRUE;

          $this->load->library('upload');
          $this->upload->initialize($config); // Load konfigurasi uploadnya
          if($this->upload->do_upload('file')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('file', $new_image);
            } else {
              echo $this->upload->display_errors();
            }
      }
    $this->db->insert('tbl_materi', $data);
  }
  public function getMateri()
  {
    return $this->db->get('tbl_materi')->result_array();
  }
  public function getMateriById($id)
  {
    return $this->db->get_where('tbl_materi',['id' => $id])->row_array();
  }
  public function getMateriBySlug($slug)
  {
    return $this->db->get_where('tbl_materi',['slug' => $slug])->row_array();
  }
  public function hapusMateri($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('tbl_materi');
  }

  // Checkout
  public function inputCheckout($data)
  {
    $this->db->insert('tbl_checkout' , $data);
  }
}