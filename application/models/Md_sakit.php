<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_sakit extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil_all(){
		$query = $this->db->get('tb_sakit');
        return $query->result();
    }

	public function tampil(){
		$ctt = $this->db->select("*")->from('tb_sakit')->where('id', $this->session->userdata('id'))->get()->result();
		return $ctt;
	}

	public function upload(){
		$config['upload_path']   = './uploads/images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	     = '2048';
		$config['remove_space']  = TRUE;
	
		$this->load->library('upload', $config);
		if($this->upload->do_upload('lampiran_skt')){
			$return = array('result'=>'success','file'=>$this->upload->data(),'error'=>'');
			return $return;
		}
        else
        {
			$return = array('result'=>'failed','file'=>'','error'=>$this->upload->display_errors());
			return $return;
		}
	}

	public function simpan(){
		$upload = $this->upload();
		$data = array(
				'id'           => $this->session->userdata('id'),
				'id_skt'         => $this->input->post('id_skt'),
				'nama_skt'       => $this->input->post('nama_skt'),
				'nik_skt'    	 => $this->input->post('nik_skt'),
				'jabatan_skt'    => $this->input->post('jabatan_skt'),
				'tgl_awal_skt'   => $this->input->post('tgl_awal_skt'),				
				'tgl_akhir_skt'  => $this->input->post('tgl_akhir_skt'),
				'jml_skt' 		 => $this->input->post('jml_skt'),
				'penyakit_skt'   => $this->input->post('penyakit_skt'),
				'keterangan_skt' => $this->input->post('keterangan_skt'),
				'pjs_skt'        => $this->input->post('pjs_skt'),
				'status_skt'     => $this->input->post('status_skt'),
				'lampiran_skt'   => $upload['file']['file_name']
		);
		
		$this->db->insert('tb_sakit', $data);
	}

	public function edit($id){
	    $query = $this->db->get_where('tb_sakit', ['id_skt' => $id]);
		return $query->row();
    }
    
    public function detail($id){
        return $this->db->get_where('tb_sakit', array('id_skt' => $id))->result();
	}

	public function update($id){
		$upload = $this->upload();
        $data = array(
			'id'             => $this->session->userdata('id'),
			'id_skt'         => $this->input->post('id_skt'),
			'nama_skt'       => $this->input->post('nama_skt'),
			'nik_skt'    	 => $this->input->post('nik_skt'),
			'jabatan_skt'    => $this->input->post('jabatan_skt'),
			'tgl_awal_skt'   => $this->input->post('tgl_awal_skt'),				
			'tgl_akhir_skt'  => $this->input->post('tgl_akhir_skt'),
			'jml_skt' 		 => $this->input->post('jml_skt'),
			'penyakit_skt'   => $this->input->post('penyakit_skt'),
			'keterangan_skt' => $this->input->post('keterangan_skt'),
			'pjs_skt'        => $this->input->post('pjs_skt'),
			'status_skt'     => $this->input->post('status_skt'),
			'lampiran_skt'   => $upload['file']['file_name']
		);
		
        if($id==1){
            return $this->db->insert('tb_sakit',$data);
		}
		else
		{
            $this->db->where('id_skt',$id);
            return $this->db->update('tb_sakit',$data);
		}        
		
		$this->db->update('tb_sakit', $data);
    }

	public function hapus($id){
		$this->db->delete('tb_sakit', ['id_skt' => $id]);
    }
        
    public function val_sakit(){
		$this->form_validation->set_message('required',"<p style='font-size:10px; 
		margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

		$config = [
			['field' => 'nama_skt',
			'label' => 'Nama Pemohon',
			'rules' => 'required'],

			['field' => 'nik_skt',
			'label' => 'NIK Pemohon',
			'rules' => 'required'],

			['field' => 'jabatan_skt',
			'label' => 'Jabatan Pemohon',
			'rules' => 'required'],

			['field' => 'tgl_awal_skt',
			'label' => 'Tanggal Awal',
			'rules' => 'required'],

			['field' => 'tgl_akhir_skt',
			'label' => 'Tanggal Akhir',
			'rules' => 'required'],

			['field' => 'jml_skt',
			'label' => 'Jumlah Hari',
			'rules' => 'required'],

			['field' => 'penyakit_skt',
			'label' => 'Nama Penyakit',
			'rules' => 'required'],

			['field' => 'keterangan_skt',
			'label' => 'Keterangan',
			'rules' => 'required'],

			['field' => 'pjs_skt',
			'label' => 'Nama PJS',
			'rules' => 'required'],

			['field' => 'status_skt',
			'label' => 'Status Permohonan',
			'rules' => 'required'],

		];

		$this->form_validation->set_rules($config);
	}
}

?>