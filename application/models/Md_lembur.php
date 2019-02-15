<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_lembur extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil_all(){
		$query = $this->db->get('tb_lembur');
        return $query->result();
    }

	public function tampil(){
		$ctt = $this->db->select("*")->from('tb_lembur')->where('id', $this->session->userdata('id'))->get()->result();
		return $ctt;
	}
	
	public function simpan(){
		$data = [
			    'id'           => $this->session->userdata('id'),
				'id_ot'        => $this->input->post('id_ot'),
				'tanggal_ot'   => $this->input->post('tanggal_ot'),
				'waktu_ot'     => $this->input->post('waktu_ot'),
				'nama_ot' 	   => $this->input->post('nama_ot'),
				'keterangan_ot'=> $this->input->post('keterangan_ot'),
				'status_ot'    => $this->input->post('status_ot')
		];

		$this->db->insert('tb_lembur', $data);
	}

	public function edit($id){
	    $query = $this->db->get_where('tb_lembur', ['id_ot' => $id]);
		return $query->row();
    }
    
    public function detail($id){
        return $this->db->get_where('tb_lembur', array('id_ot' => $id))->result();
	}

	public function update($id){
        $data = array(
			'id'           => $this->session->userdata('id'),
            'id_ot'        => $this->input->post('id_ot'),
			'tanggal_ot'   => $this->input->post('tanggal_ot'),
			'waktu_ot'     => $this->input->post('waktu_ot'),
			'nama_ot' 	   => $this->input->post('nama_ot'),
			'keterangan_ot'=> $this->input->post('keterangan_ot'),
			'status_ot'    => $this->input->post('status_ot')
		);
		
        if($id==1){
            return $this->db->insert('tb_lembur',$data);
		}
		else
		{
            $this->db->where('id_ot',$id);
            return $this->db->update('tb_lembur',$data);
		}        
		
		$this->db->update('tb_lembur', $data);
    }

	public function hapus($id){
		$this->db->delete('tb_lembur', ['id_ot' => $id]);
    }
        
    public function val_lembur(){
		$this->form_validation->set_message('required',"<p style='font-size:10px; 
		margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

		$config = [
			['field' => 'tanggal_ot',
			'label' => 'Tanggal Permohonan',
			'rules' => 'required'],

			['field' => 'waktu_ot',
			'label' => 'Waktu Permohonan',
			'rules' => 'required'],

			['field' => 'nama_ot',
			'label' => 'Nama Pemohon',
			'rules' => 'required'],

			['field' => 'keterangan_ot',
			'label' => 'Keterangan',
			'rules' => 'required'],

			['field' => 'status_ot',
			'label' => 'Status Permohonan',
			'rules' => 'required'],
		];

		$this->form_validation->set_rules($config);
	}
}

?>