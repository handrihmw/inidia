<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_pangkat extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil(){
		$query = $this->db->get('tb_pangkat');
                return $query->result();
        }

	public function simpan(){
		$data = [
                        'id'         => $this->input->post('id'),
                        'pangkat' => $this->input->post('pangkat')
		];

		$this->db->insert('tb_pangkat', $data);
	}

	public function edit($id){
	        $query = $this->db->get_where('tb_pangkat', ['id' => $id]);
		return $query->row();
        }
    
        public function detail($id){
                return $this->db->get_where('tb_pangkat', array('id' => $id))->result();
	}

	public function update($id){
		$data = array(
			'id'     => $this->input->post('id'),
			'pangkat' => $this->input->post('pangkat')
		);
			
		if($id==1){
		    return $this->db->insert('tb_pangkat',$data);
			}
			else
			{
		    $this->db->where('id',$id);
		    return $this->db->update('tb_pangkat',$data);
			}        
			
		$this->db->update('tb_pangkat', $data);
	}

	public function hapus($id){
		$this->db->delete('tb_pangkat', ['id' => $id]);
        }
        
        public function val_pangkat(){
                $this->form_validation->set_message('required',"<p style='font-size:10px; 
                margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

                $config = [
                        ['field' => 'pangkat',
                        'label' => 'Nama pangkat',
                        'rules' => 'required'],
                        ];

                $this->form_validation->set_rules($config);
        }
}

?>