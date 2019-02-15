<?php
class Md_login extends CI_Model{

  function validate($email,$password){
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $result = $this->db->get('tb_user',1);
    return $result;
  }
}
