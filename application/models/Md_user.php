<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md_user extends CI_Model{

    // ========================================USER================================================ //

    public function cek_user($data){
        $query = $this->db->get_where('tb_user', $data);
        return $query;
    }
    
    function tampil_user(){
        return $this->db->get('tb_user');
    }

    function save_user($data){
        $this->db->insert('tb_user', $data);
    }

    //Validasi Username pada Database
    public function dup_username($post_username) {
        $this->db->where('username', $post_username);
        $query     = $this->db->get('tb_user');
        $count_row = $query->num_rows();
    
        if ($count_row > 0) { 
            return FALSE; 
         } else {
            return TRUE;
         }
    }

    function edit_user($id){
        return $this->db->get_where('tb_user', array('id' => $id))->result();
    }

    function update_user($id, $data){
        return $this->db->update('tb_user', $data, array('id' => $id));
    }

    function delete_user($id){
        return $this->db->delete('tb_user', array('id' => $id));
    }

    function get_by_username($user){
        return $this->db->get_where('tb_user', array('username' => $user))->result();
    }

    public function print(){
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }
}
