<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_izin extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil_all(){
		$query = $this->db->get('tb_izin');
        return $query->result();
    }

	public function tampil(){
		$ctt = $this->db->select("*")->from('tb_izin')->where('id', $this->session->userdata('id'))->get()->result();
		return $ctt;
	}

	function tampil_index(){
		$this->db->where('status_izn', 'Disetujui');
        $query = $this->db->get('tb_izin');
        return $query->result();
    }
	
	public function simpan(){
		$data = [
				'id'             => $this->session->userdata('id'),
				'id_izn'        => $this->input->post('id_izn'),
				'jenis_izn'     => $this->input->post('jenis_izn'),
				'tgl_minta_izn' => $this->input->post('tgl_minta_izn'),
				'tgl_akhir_izn' => $this->input->post('tgl_akhir_izn'),
				'nama_izn'      => $this->input->post('nama_izn'),
				'alasan_izn'    => $this->input->post('alasan_izn'),
				'pjs_izn'       => $this->input->post('pjs_izn'),
				'status_izn'    => $this->input->post('status_izn')
		];

		$this->db->insert('tb_izin', $data);
	}

	public function edit($id){
	        $query = $this->db->get_where('tb_izin', ['id_izn' => $id]);
		return $query->row();
        }
    
        public function detail($id){
                return $this->db->get_where('tb_izin', array('id_izn' => $id))->result();
	}

	public function update($id){
        $data = array(
			'id'            => $this->session->userdata('id'),
            'id_izn'        => $this->input->post('id_izn'),
			'jenis_izn'     => $this->input->post('jenis_izn'),
			'tgl_minta_izn' => $this->input->post('tgl_minta_izn'),
			'tgl_akhir_izn' => $this->input->post('tgl_akhir_izn'),
			'nama_izn'      => $this->input->post('nama_izn'),
			'alasan_izn'    => $this->input->post('alasan_izn'),
			'pjs_izn'       => $this->input->post('pjs_izn'),
			'status_izn'    => $this->input->post('status_izn')
		);
		
        if($id==1){
            return $this->db->insert('tb_izin',$data);
		}
		else
		{
            $this->db->where('id_izn',$id);
            return $this->db->update('tb_izin',$data);
		}        
		
		$this->db->update('tb_izin', $data);
    }

	public function hapus($id){
		$this->db->delete('tb_izin', ['id_izn' => $id]);
    }
        
    public function val_izin(){
		$this->form_validation->set_message('required',"<p style='font-size:10px; 
		margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

		$config = [
			['field' => 'jenis_izn',
			'label' => 'Jenis Izin',
			'rules' => 'required'],

			['field' => 'tgl_minta_izn',
			'label' => 'Tanggal Permintaan',
			'rules' => 'required'],

			['field' => 'tgl_akhir_izn',
			'label' => 'Tanggal Selesai',
			'rules' => 'required'],

			['field' => 'nama_izn',
			'label' => 'Nama Pemohon',
			'rules' => 'required'],

			['field' => 'alasan_izn',
			'label' => 'Alasan',
			'rules' => 'required'],

			['field' => 'pjs_izn',
			'label' => 'Nama PJS',
			'rules' => 'required'],
		];

		$this->form_validation->set_rules($config);
	}
}

?>