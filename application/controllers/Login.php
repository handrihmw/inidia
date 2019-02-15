<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Md_user');
    }

    public function index() {
        $this->load->view('login');
    }
    
    public function cek_login() {

        $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => md5($this->input->post('password', TRUE))
            );

        $hasil = $this->Md_user->cek_user($data);
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id']        = $sess->id;
                $sess_data['username']  = $sess->username;
                $sess_data['name']      = $sess->name;
                $sess_data['email']     = $sess->email;
                $sess_data['level']     = $sess->level;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level')=='admin') {
                redirect('admin/index');
            }
            elseif ($this->session->userdata('level')=='manager') {
                redirect('manager/index');
            }
            elseif ($this->session->userdata('level')=='staff') {
                redirect('staff/index');
            }        
        }
        else {
            $this->session->set_flashdata('message', 'Username or Password not Valid!');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login');
    }
}