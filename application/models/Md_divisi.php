<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_divisi extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil(){
		$query = $this->db->get('tb_divisi');
                return $query->result();
        }

	public function simpan(){
		$data = [
			'id'     => $this->input->post('id'),
			'unik'   => $this->input->post('unik'),
                        'divisi' => $this->input->post('divisi')
		];

		$this->db->insert('tb_divisi', $data);
	}

	public function edit($id){
	        $query = $this->db->get_where('tb_divisi', ['id' => $id]);
		return $query->row();
        }
    
        public function detail($id){
                return $this->db->get_where('tb_divisi', array('id' => $id))->result();
	}

	public function update($id){
		$data = array(
			'id'     => $this->input->post('id'),
			'unik'   => $this->input->post('unik'),
                        'divisi' => $this->input->post('divisi')
		);
			
		if($id==1){
		    return $this->db->insert('tb_divisi',$data);
			}
			else
			{
		    $this->db->where('id',$id);
		    return $this->db->update('tb_divisi',$data);
			}        
			
		$this->db->update('tb_divisi', $data);
	}

	public function hapus($id){
		$this->db->delete('tb_divisi', ['id' => $id]);
        }
        
        public function val_divisi(){
                $this->form_validation->set_message('required',"<p style='font-size:10px; 
                margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

                $config = [
                        ['field' => 'divisi',
                        'label' => 'Nama Divisi',
			'rules' => 'required'],
			
			['field' => 'unik',
                        'label' => 'Kode Unik Divisi',
                        'rules' => 'required']
                        ];

                $this->form_validation->set_rules($config);
        }
}

?>