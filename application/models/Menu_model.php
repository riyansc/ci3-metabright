<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

  public function getSubMenu()
  {
    $query = "SELECT tbl_user_sub_menu.*, tbl_user_menu.menu
              FROM tbl_user_sub_menu JOIN tbl_user_menu
              ON tbl_user_sub_menu.menu_id = tbl_user_menu.id ";
    return $this->db->query($query)->result_array(); 
  }

}
