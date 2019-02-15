<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_penilaian extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil(){
		$query = $this->db->get('tb_penilaian');
                return $query->result();
        }

	public function simpan(){
		$data = [
                    'id_nl'                => $this->input->post('id_nl'),
                    'nama_nl'              => $this->input->post('nama_nl'),
                    'nik_nl'               => $this->input->post('nik_nl'),
                    'dep_nl'               => $this->input->post('dep_nl'),
                    'tgl_masuk_nl'         => $this->input->post('tgl_masuk_nl'),
                    'jabatan_nl'           => $this->input->post('jabatan_nl'),
                    'nama_penilai_nl'      => $this->input->post('nama_penilai_nl'),
                    'jabatan_penilai_nl'   => $this->input->post('jabatan_penilai_nl'),
		];

		$this->db->insert('tb_penilaian', $data);
	}

	public function edit($id_nl){
	        $query = $this->db->get_where('tb_penilaian', ['id_nl' => $id_nl]);
		return $query->row();
        }
    
        public function detail($id_nl){
                return $this->db->get_where('tb_penilaian', array('id_nl' => $id_nl))->result();
	}
        
        public function update($id){
		$data = array(
			'id_nl'                => $this->input->post('id_nl'),
                        'nama_nl'              => $this->input->post('nama_nl'),
                        'nik_nl'               => $this->input->post('nik_nl'),
                        'dep_nl'               => $this->input->post('dep_nl'),
                        'tgl_masuk_nl'         => $this->input->post('tgl_masuk_nl'),
                        'jabatan_nl'           => $this->input->post('jabatan_nl'),
                        'nama_penilai_nl'      => $this->input->post('nama_penilai_nl'),
                        'jabatan_penilai_nl'   => $this->input->post('jabatan_penilai_nl')
		);
			
		if($id==1){
		    return $this->db->insert('tb_penilaian',$data);
			}
			else
			{
		    $this->db->where('id_nl',$id);
		    return $this->db->update('tb_penilaian',$data);
			}        
			
		$this->db->update('tb_penilaian', $data);
	}

	public function hapus($id_nl){
		$this->db->delete('tb_penilaian', ['id_nl' => $id_nl]);
        }

        public function print(){
                $query = $this->db->get('tb_penilaian');
                return $query->result_array();
        }

        public function print_id($id_nl){
                $query = $this->db->get_where('tb_penilaian', ['id_nl' => $id_nl]);
                return $query->result_array();
	}
        
        public function val_penilaian(){
                $this->form_validation->set_message('required',"<p style='font-size:10px; 
                margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

                $config = [
                        ['field' => 'nama_nl',
                        'label' => 'Nama Lengkap',
                        'rules' => 'required'],

                        ['field' => 'nik_nl',
                        'label' => 'NIK',
                        'rules' => 'required'],

                        ['field' => 'dep_nl',
                        'label' => 'Departemen',
                        'rules' => 'required'],

                        ['field' => 'tgl_masuk_nl',
                        'label' => 'Tanggal Mulai',
                        'rules' => 'required'],

                        ['field' => 'jabatan_nl',
                        'label' => 'Jabatan Karyawan',
                        'rules' => 'required'],

                        ['field' => 'nama_penilai_nl',
                        'label' => 'Penilai',
                        'rules' => 'required'],

                        ['field' => 'jabatan_penilai_nl',
                        'label' => 'Jabatan Penilai',
                        'rules' => 'required']
                        ];

                $this->form_validation->set_rules($config);
        }
}
?>