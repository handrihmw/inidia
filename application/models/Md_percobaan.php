<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_percobaan extends CI_Model
{
	public function __construct(){
	        $this->load->database();
        }
        
        public function get_percobaan(){
                $query = $this->db->get('tb_percobaan');
                return $query->result_array();
        }

	public function tampil(){
		$query = $this->db->get('tb_percobaan');
		return $query->result();
        }
        
        public function tampil_bulan(){
                $query = $this->db->query("SELECT nama_cb, nik_cb, jabatan_cb, tgl_mulai_cb, jenis_cb, tgl_selesai_cb FROM tb_percobaan 
                                           WHERE date_format(str_to_date(tgl_selesai_cb, '%d-%m-%Y'), '%m') = MONTH(NOW())");
                return $query->result();
        }

	public function simpan(){
		$data = [
                        'id_cb'                => $this->input->post('id_cb'),
                        'nama_cb'              => $this->input->post('nama_cb'),
                        'nik_cb'               => $this->input->post('nik_cb'),
                        'dep_cb'               => $this->input->post('dep_cb'),
                        'jabatan_cb'           => $this->input->post('jabatan_cb'),
                        'tgl_masuk_cb'         => $this->input->post('tgl_masuk_cb'),
                        'jenis_cb'             => $this->input->post('jenis_cb'),
                        'tgl_mulai_cb'         => $this->input->post('tgl_mulai_cb'),
                        'tgl_selesai_cb'       => $this->input->post('tgl_selesai_cb'),
                        'percobaan_cb'         => $this->input->post('percobaan_cb'),
                        'catatan_hr_cb'        => $this->input->post('catatan_hr_cb'),
                        'catatan_atasan_cb'    => $this->input->post('catatan_atasan_cb')
		];

		$this->db->insert('tb_percobaan', $data);
	}

	public function edit($id_cb){
	        $query = $this->db->get_where('tb_percobaan', ['id_cb' => $id_cb]);
		return $query->row();
        }
    
        public function detail($id_cb){
                return $this->db->get_where('tb_percobaan', array('id_cb' => $id_cb))->result();
	}

        public function update($id_cb){
		$data = array(
			'id_cb'                => $this->input->post('id_cb'),
                        'nama_cb'              => $this->input->post('nama_cb'),
                        'nik_cb'               => $this->input->post('nik_cb'),
                        'dep_cb'               => $this->input->post('dep_cb'),
                        'jabatan_cb'           => $this->input->post('jabatan_cb'),
                        'tgl_masuk_cb'         => $this->input->post('tgl_masuk_cb'),
                        'jenis_cb'             => $this->input->post('jenis_cb'),
                        'tgl_mulai_cb'         => $this->input->post('tgl_mulai_cb'),
                        'tgl_selesai_cb'       => $this->input->post('tgl_selesai_cb'),
                        'percobaan_cb'         => $this->input->post('percobaan_cb'),
                        'catatan_hr_cb'        => $this->input->post('catatan_hr_cb'),
                        'catatan_atasan_cb'    => $this->input->post('catatan_atasan_cb')
		);
			
		if($id_cb==1){
		    return $this->db->insert('tb_percobaan',$data);
			}
			else
			{
		    $this->db->where('id_cb',$id_cb);
		    return $this->db->update('tb_percobaan',$data);
			}        
			
		$this->db->update('tb_percobaan', $data);
	}

	public function hapus($id_cb){
		$this->db->delete('tb_percobaan', ['id_cb' => $id_cb]);
        }

        public function print(){
                $query = $this->db->get('tb_percobaan');
                return $query->result_array();
        }

        public function print_id($id_cb){
                $query = $this->db->get_where('tb_percobaan', ['id_cb' => $id_cb]);
                return $query->result_array();
	}
        
        public function val_percobaan(){
                $this->form_validation->set_message('required',"<p style='font-size:10px; 
                margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

                $config = [ 

                        ['field' => 'nama_cb',
                        'label' => 'Nama Lengkap',
                        'rules' => 'required'],

                        ['field' => 'nik_cb',
                        'label' => 'NIK',
                        'rules' => 'required'],

                        ['field' => 'dep_cb',
                        'label' => 'Departemen',
                        'rules' => 'required'],

                        ['field' => 'jabatan_cb',
                        'label' => 'Jabatan Karyawan',
                        'rules' => 'required'],

                        ['field' => 'tgl_masuk_cb',
                        'label' => 'Tanggal Masuk',
                        'rules' => 'required'],

                        ['field' => 'jenis_cb',
                        'label' => 'Jenis Percobaan',
                        'rules' => 'required'],

                        ['field' => 'tgl_mulai_cb',
                        'label' => 'Tanggal Mulai',
                        'rules' => 'required'],

                        ['field' => 'tgl_selesai_cb',
                        'label' => 'Tanggal Selesai',
                        'rules' => 'required'],

                        ['field' => 'percobaan_cb',
                        'label' => 'Percobaan',
                        'rules' => 'required'],

                        ['field' => 'catatan_hr_cb',
                        'label' => 'Catatan HR/GA',
                        'rules' => 'required'],
                        
                        ['field' => 'catatan_atasan_cb',
                        'label' => 'Catatan Atasan Langsung',
                        'rules' => 'required']
                        ];

                $this->form_validation->set_rules($config);
        }
        
}

?>