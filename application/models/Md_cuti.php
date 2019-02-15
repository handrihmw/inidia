<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_cuti extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil_all(){
		$query = $this->db->get('tb_cuti');
        return $query->result();
    }

	public function tampil(){
		$ctt = $this->db->select("*")->from('tb_cuti')->where('id', $this->session->userdata('id'))->get()->result();
		return $ctt;
	}

	function tampil_index(){
		$this->db->where('status_ct', 'Disetujui');
		$this->db->order_by('tgl_ct', 'ASC');
        $query = $this->db->get('tb_cuti');
        return $query->result();
    }

	public function simpan(){
		$data = [
				'id'           => $this->session->userdata('id'),
				'id_ct'        => $this->input->post('id_ct'),
				'nama_ct'      => $this->input->post('nama_ct'),
				'divisi_ct'    => $this->input->post('divisi_ct'),
				'tgl_ct'       => $this->input->post('tgl_ct'),
				'jenis_ct'     => $this->input->post('jenis_ct'),
				'alasan_ct'    => $this->input->post('alasan_ct'),
				'informasi_ct' => $this->input->post('informasi_ct'),
				'pjs_ct'       => $this->input->post('pjs_ct'),
				'status_ct'    => $this->input->post('status_ct')
		];

		$this->db->insert('tb_cuti', $data);
	}

	public function edit($id){
	        $query = $this->db->get_where('tb_cuti', ['id_ct' => $id]);
		return $query->row();
        }
    
        public function detail($id){
                return $this->db->get_where('tb_cuti', array('id_ct' => $id))->result();
	}

	public function update($id){
        $data = array(
			'id'           => $this->session->userdata('id'),
            'id_ct'        => $this->input->post('id_ct'),
			'nama_ct'      => $this->input->post('nama_ct'),
			'divisi_ct'    => $this->input->post('divisi_ct'),
			'tgl_ct'       => $this->input->post('tgl_ct'),
			'jenis_ct'     => $this->input->post('jenis_ct'),
			'alasan_ct'    => $this->input->post('alasan_ct'),
			'informasi_ct' => $this->input->post('informasi_ct'),
			'pjs_ct'       => $this->input->post('pjs_ct'),
			'status_ct'    => $this->input->post('status_ct')
		);
		
        if($id==1){
            return $this->db->insert('tb_cuti',$data);
		}
		else
		{
            $this->db->where('id_ct',$id);
            return $this->db->update('tb_cuti',$data);
		}        
		
		$this->db->update('tb_cuti', $data);
    }

	public function hapus($id){
		$this->db->delete('tb_cuti', ['id_ct' => $id]);
    }
        
    public function val_cuti(){
		$this->form_validation->set_message('required',"<p style='font-size:10px; 
		margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

		$config = [
		['field' => 'nama_ct',
		'label' => 'Nama Pemohon',
		'rules' => 'required'],

		['field' => 'divisi_ct',
		'label' => 'Divisi Pemohon',
		'rules' => 'required'],

		['field' => 'tgl_ct',
		'label' => 'Tanggal Permohonan',
		'rules' => 'required'],

		['field' => 'jenis_ct',
		'label' => 'Jenis Cuti',
		'rules' => 'required'],

		['field' => 'alasan_ct',
		'label' => 'Alasan',
		'rules' => 'required'],

		['field' => 'informasi_ct',
		'label' => 'Informasi Lain',
		'rules' => 'required'],

		['field' => 'pjs_ct',
		'label' => 'Nama PJS',
		'rules' => 'required'],
				];

		$this->form_validation->set_rules($config);
	}
}

?>