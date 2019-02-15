<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_jabatan extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil(){
		$query = $this->db->get('tb_jabatan');
                return $query->result();
        }

	public function simpan(){
		$data = [
                        'id'         => $this->input->post('id'),
                        'jabatan' => $this->input->post('jabatan')
		];

		$this->db->insert('tb_jabatan', $data);
	}

	public function edit($id){
	        $query = $this->db->get_where('tb_jabatan', ['id' => $id]);
		return $query->row();
        }
    
        public function detail($id){
                return $this->db->get_where('tb_jabatan', array('id' => $id))->result();
	}

	public function update($id){
		$data = array(
			'id'     => $this->input->post('id'),
                        'jabatan' => $this->input->post('jabatan')
		);
			
		if($id==1){
		    return $this->db->insert('tb_jabatan',$data);
			}
			else
			{
		    $this->db->where('id',$id);
		    return $this->db->update('tb_jabatan',$data);
			}        
			
		$this->db->update('tb_jabatan', $data);
	}

	public function hapus($id){
		$this->db->delete('tb_jabatan', ['id' => $id]);
        }
        
        public function val_jabatan(){
                $this->form_validation->set_message('required',"<p style='font-size:10px; 
                margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

                $config = [
                        ['field' => 'jabatan',
                        'label' => 'Nama Jabatan',
                        'rules' => 'required'],
                        ];

                $this->form_validation->set_rules($config);
        }
}

?>