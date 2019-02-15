<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_resign extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil(){
		$query = $this->db->get('tb_resign');
		return $query->result();
	}

	public function simpan(){
		$data = [
                        'id_rs'            => $this->input->post('id_rs'),
                        'bulan_rs'         => $this->input->post('bulan_rs'),
                        'nama_rs'          => $this->input->post('nama_rs'),
                        'pangkat_rs'       => $this->input->post('pangkat_rs'),
                        'jabatan_rs'       => $this->input->post('jabatan_rs'),
                        'dep_rs'           => $this->input->post('dep_rs'),
                        'tgl_masuk_rs'     => $this->input->post('tgl_masuk_rs'),
                        'tgl_resign_rs'    => $this->input->post('tgl_resign_rs'),
                        'masa_bulan_rs'    => $this->input->post('masa_bulan_rs'),
                        'masa_tahun_rs'    => $this->input->post('masa_tahun_rs'),
                        'keterangan_rs'    => $this->input->post('keterangan_rs')
		];

		$this->db->insert('tb_resign', $data);
	}

	public function edit($id_rs){
	        $query = $this->db->get_where('tb_resign', ['id_rs' => $id_rs]);
		return $query->row();
        }
    
        public function detail($id_rs){
                return $this->db->get_where('tb_resign', array('id_rs' => $id_rs))->result();
	}
        
        public function update($id_rs){
		$data = array(
			'id_rs'            => $this->input->post('id_rs'),
                        'bulan_rs'         => $this->input->post('bulan_rs'),
                        'nama_rs'          => $this->input->post('nama_rs'),
                        'pangkat_rs'       => $this->input->post('pangkat_rs'),
                        'jabatan_rs'       => $this->input->post('jabatan_rs'),
                        'dep_rs'           => $this->input->post('dep_rs'),
                        'tgl_masuk_rs'     => $this->input->post('tgl_masuk_rs'),
                        'tgl_resign_rs'    => $this->input->post('tgl_resign_rs'),
                        'masa_bulan_rs'    => $this->input->post('masa_bulan_rs'),
                        'masa_tahun_rs'    => $this->input->post('masa_tahun_rs'),
                        'keterangan_rs'    => $this->input->post('keterangan_rs')
		);
			
		if($id==1){
		    return $this->db->insert('tb_resign',$data);
			}
			else
			{
		    $this->db->where('id_rs',$id_rs);
		    return $this->db->update('tb_resign',$data);
			}        
			
		$this->db->update('tb_resign', $data);
	}

	public function hapus($id_rs){
		$this->db->delete('tb_resign', ['id_rs' => $id_rs]);
        }

        public function print(){
                $query = $this->db->get('tb_resign');
                return $query->result_array();
        }

        public function print_id($id_rs){
                $query = $this->db->get_where('tb_resign', ['id_rs' => $id_rs]);
                return $query->result_array();
	}
        
        public function val_resign(){
                $this->form_validation->set_message('required',"<p style='font-size:10px; 
                margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

                $config = [
                        
                        ['field' => 'bulan_rs',
                        'label' => 'Bulan Resign',
                        'rules' => 'required'],

                        ['field' => 'nama_rs',
                        'label' => 'Nama Lengkap',
                        'rules' => 'required'],

                        ['field' => 'pangkat_rs',
                        'label' => 'Pangkat Karyawan',
                        'rules' => 'required'],

                        ['field' => 'jabatan_rs',
                        'label' => 'Jabatan Karyawan',
                        'rules' => 'required'],

                        ['field' => 'dep_rs',
                        'label' => 'Departemen',
                        'rules' => 'required'],

                        ['field' => 'tgl_masuk_rs',
                        'label' => 'Tanggal Masuk',
                        'rules' => 'required'],

                        ['field' => 'tgl_resign_rs',
                        'label' => 'Tanggal Resign',
                        'rules' => 'required'],

                        ['field' => 'masa_bulan_rs',
                        'label' => 'Masa Kerja Bulan',
                        'rules' => 'required'],

                        ['field' => 'masa_tahun_rs',
                        'label' => 'Masa Kerja Tahun',
                        'rules' => 'required'],
                        
                        ['field' => 'keterangan_rs',
                        'label' => 'Keterangan',
                        'rules' => 'required'],
                        ];

                $this->form_validation->set_rules($config);
        }
}
?>