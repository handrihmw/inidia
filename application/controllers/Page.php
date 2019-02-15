<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function admin(){
      if($this->session->userdata('level')==='1'){
          $this->load->view('admin/index');
      }else{
          echo "Access Denied";
      }
  }
 
  function staff(){
    if($this->session->userdata('level')==='2'){
      $this->load->view('staff/inde');
    }else{
        echo "Access Denied";
    }
  }
 
  function manager(){
    if($this->session->userdata('level')==='3'){
      $this->load->view('manager/index');
    }else{
        echo "Access Denied";
    }
  }
 
}