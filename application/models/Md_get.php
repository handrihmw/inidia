<?php
class Md_get extends CI_Model{

    public function funcname($id){
        $this->db->select('*');
        $this->db->from('tb_karyawan a'); 
        $this->db->join('tb_unit b', 'b.id_kry=a.id_kry', 'left');
        $this->db->join('tb_unit c', 'c.id_unit=a.id_unit', 'left');
        $this->db->where('c.id_kry',$id);
        $this->db->order_by('c.nama_kry','asc');         
        $query = $this->db->get(); 
            if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
            else
        {
            return false;
        }
    }
}