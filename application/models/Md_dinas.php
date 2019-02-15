<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_dinas extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil_all(){
		$query = $this->db->get('tb_dinas');
        return $query->result();
    }

	public function tampil(){
		$ctt = $this->db->select("*")->from('tb_dinas')->where('id', $this->session->userdata('id'))->get()->result();
		return $ctt;
	}
	
	public function simpan(){
		$data = [
				'id'                => $this->session->userdata('id'),
				'id_dns'        	=> $this->input->post('id_dns'),
				'jenis_dns'   		=> $this->input->post('jenis_dns'),
				'kepentingan_dns'   => $this->input->post('kepentingan_dns'),
				'nama_dns' 	        => $this->input->post('nama_dns'),
				'total_dns'         => $this->input->post('total_dns'),
				'tgl_awal_dns'      => $this->input->post('tgl_awal_dns'),
				'tgl_akhir_dns'     => $this->input->post('tgl_akhir_dns'),
				'tujuan_dns' 	    => $this->input->post('tujuan_dns'),
				'pembayaran_dns'    => $this->input->post('pembayaran_dns'),
				'tgl_bayar_dns' 	=> $this->input->post('tgl_bayar_dns'),
				'keterangan_dns'	=> $this->input->post('keterangan_dns'),
				'pjs_dns'			=> $this->input->post('pjs_dns'),
				'status_dns'    	=> $this->input->post('status_dns')
		];

		$this->db->insert('tb_dinas', $data);
	}

	public function edit($id){
	    $query = $this->db->get_where('tb_dinas', ['id_dns' => $id]);
		return $query->row();
    }
    
    public function detail($id){
        return $this->db->get_where('tb_dinas', array('id_dns' => $id))->result();
	}

	public function update($id){
        $data = array(
			'id'                => $this->session->userdata('id'),
            'id_dns'        	=> $this->input->post('id_dns'),
			'jenis_dns'   		=> $this->input->post('jenis_dns'),
			'kepentingan_dns'   => $this->input->post('kepentingan_dns'),
			'nama_dns' 	        => $this->input->post('nama_dns'),
			'total_dns'         => $this->input->post('total_dns'),
			'tgl_awal_dns'      => $this->input->post('tgl_awal_dns'),
			'tgl_akhir_dns'     => $this->input->post('tgl_akhir_dns'),
			'tujuan_dns' 	    => $this->input->post('tujuan_dns'),
			'pembayaran_dns'    => $this->input->post('pembayaran_dns'),
			'tgl_bayar_dns' 	=> $this->input->post('tgl_bayar_dns'),
			'keterangan_dns'	=> $this->input->post('keterangan_dns'),
			'pjs_dns'			=> $this->input->post('pjs_dns'),
			'status_dns'    	=> $this->input->post('status_dns')
		);
		
        if($id==1){
            return $this->db->insert('tb_dinas',$data);
		}
		else
		{
            $this->db->where('id_dns',$id);
            return $this->db->update('tb_dinas',$data);
		}        
		
		$this->db->update('tb_dinas', $data);
    }

	public function hapus($id){
		$this->db->delete('tb_dinas', ['id_dns' => $id]);
    }
        
    public function val_dinas(){
		$this->form_validation->set_message('required',"<p style='font-size:10px; 
		margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

		$config = [
			['field' => 'jenis_dns',
			'label' => 'Jenis Tujuan',
			'rules' => 'required'],

			['field' => 'kepentingan_dns',
			'label' => 'Kepentingan Dinas',
			'rules' => 'required'],

			['field' => 'nama_dns',
			'label' => 'Nama Pemohon',
			'rules' => 'required'],

			['field' => 'total_dns',
			'label' => 'Total Tujuan',
			'rules' => 'required'],

			['field' => 'tgl_awal_dns',
			'label' => 'Tanggal Mulai',
			'rules' => 'required'],

			['field' => 'tgl_akhir_dns',
			'label' => 'Tanggal Akhir',
			'rules' => 'required'],

			['field' => 'tujuan_dns',
			'label' => 'Tujuan',
			'rules' => 'required'],

			['field' => 'pembayaran_dns',
			'label' => 'Keterangan',
			'rules' => 'required'],

			['field' => 'tgl_bayar_dns',
			'label' => 'Tanggal Pembayaran Awal',
			'rules' => 'required'],

			['field' => 'keterangan_dns',
			'label' => 'Keterangan',
			'rules' => 'required'],

			['field' => 'pjs_dns',
			'label' => 'Nama PJS',
			'rules' => 'required'],

			['field' => 'status_dns',
			'label' => 'Status Permohonan',
			'rules' => 'required'],
		];

		$this->form_validation->set_rules($config);
	}
}

?>