<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Md_penilai extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil(){
		$query = $this->db->get('tb_penilai');
                return $query->result();
        }

	public function simpan(){
		$data = [
                        'id_penilai'        => $this->input->post('id_penilai'),
                        'nama_penilai'      => $this->input->post('nama_penilai'),
                        'nik_penilai'       => $this->input->post('nik_penilai'),
                        'jabatan_penilai'   => $this->input->post('jabatan_penilai'),
		];

		$this->db->insert('tb_penilai', $data);
	}

	public function edit($id){
	        $query = $this->db->get_where('tb_penilai', ['id_penilai' => $id]);
		return $query->row();
        }
    
        public function detail($id){
                return $this->db->get_where('tb_penilai', array('id_penilai' => $id))->result();
	}

        public function update($id){
		$data = array(
			'id_penilai'        => $this->input->post('id_penilai'),
                        'nama_penilai'      => $this->input->post('nama_penilai'),
                        'nik_penilai'       => $this->input->post('nik_penilai'),
                        'jabatan_penilai'   => $this->input->post('jabatan_penilai')
		);
			
		if($id==1){
		    return $this->db->insert('tb_penilai',$data);
			}
			else
			{
		    $this->db->where('id_penilai',$id);
		    return $this->db->update('tb_penilai',$data);
			}        
			
		$this->db->update('tb_penilai', $data);
	}

	public function hapus($id){
		$this->db->delete('tb_penilai', ['id_penilai' => $id]);
        }
        
        public function val_penilai(){
                $this->form_validation->set_message('required',"<p style='font-size:10px; 
                margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

                $config = [
                        ['field' => 'nama_penilai',
                        'label' => 'Nama Penilai',
                        'rules' => 'required'],

                        ['field' => 'jabatan_penilai',
                        'label' => 'Jabatan Penilai',
                        'rules' => 'required'],
                        ];

                $this->form_validation->set_rules($config);
        }
}

?>