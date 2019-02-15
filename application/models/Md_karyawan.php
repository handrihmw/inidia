<?php
class Md_karyawan extends CI_Model
{
	public function __construct(){
		$this->load->database();
        }

        public function get_total_karyawan(){
                $query = $this->db->get('tb_karyawan')->result_array();
                $query = $this->db->get('tb_karyawan')->num_rows();    
                return $query;   
        }

        public function get_total_cabang(){
                $query = $this->db->get('tb_unit')->result_array();
                $query = $this->db->get('tb_unit')->num_rows();    
                return $query;   
        }

        public function get_total_dep(){
                $query = $this->db->get('tb_departemen')->result_array();
                $query = $this->db->get('tb_departemen')->num_rows();    
                return $query;   
        }

        public function get_total_baru(){
                $query = $this->db->get('tb_karyawan_baru')->result_array();
                $query = $this->db->get('tb_karyawan_baru')->num_rows();    
                return $query;   
        }

        public function get_total_resign(){
                $query = $this->db->get('tb_resign')->result_array();
                $query = $this->db->get('tb_resign')->num_rows();    
                return $query;   
        }

        public function get_total_call(){
                $query = $this->db->get('tb_karyawan_baru')->result_array();
                $query = $this->db->get('tb_karyawan_baru')->num_rows();    
                return $query;   
        }

        public function birthday(){
                $query = $this->db->order_by('jabatan_kry', 'ASC');
                $query = $this->db->query("SELECT nama_kry, jabatan_kry, tgl_lahir_kry FROM tb_karyawan 
                                           WHERE date_format(str_to_date(tgl_lahir_kry, '%d-%m-%Y'), '%m') = MONTH(NOW())");
                return $query->result();
	}

	public function tampil(){
                $this->db->order_by('pangkat_kry', 'ASC');
                $query = $this->db->get('tb_karyawan');
                return $query->result();
        }
    
	public function simpan(){
		$data = [
                                'id_kry'                => $this->input->post('id_kry'),
                                'nama_kry'              => $this->input->post('nama_kry'),
                                'nik_kry'               => $this->input->post('nik_kry'),
                                'jabatan_kry'           => $this->input->post('jabatan_kry'),
                                'pangkat_kry'           => $this->input->post('pangkat_kry'),
                                'divisi_kry'            => $this->input->post('divisi_kry'),
                                'dep_kry'               => $this->input->post('dep_kry'),
                                'lokasi_kry'            => $this->input->post('lokasi_kry'),
                                'panggilan_kry'         => $this->input->post('panggilan_kry'),
                                'identitas_kry'         => $this->input->post('identitas_kry'),
                                'jk_kry'                => $this->input->post('jk_kry'),
                                'tempat_lahir_kry'      => $this->input->post('tempat_lahir_kry'),
                                'tgl_lahir_kry'         => $this->input->post('tgl_lahir_kry'),
                                'negara_kry'            => $this->input->post('negara_kry'),
                                'agama_kry'             => $this->input->post('agama_kry'),
                                'npwp_kry'              => $this->input->post('npwp_kry'),
                                'alamat_kry'            => $this->input->post('alamat_kry'),
                                'tlp_rumah_kry'         => $this->input->post('tlp_rumah_kry'),
                                'no_hp_kry'             => $this->input->post('no_hp_kry'),
                                'tgl_masuk_kry'         => $this->input->post('tgl_masuk_kry'),
                                'status_kerja_kry'      => $this->input->post('status_kerja_kry'),
                                'status_nikah_kry'      => $this->input->post('status_nikah_kry'),
                                'email_kry'             => $this->input->post('email_kry')
			];

		$this->db->insert('tb_karyawan', $data);
	}

	public function edit($id_kry){
		$query = $this->db->get_where('tb_karyawan', ['id_kry' => $id_kry]);
		return $query->row();
        }
    
        public function detail($id_kry){
                return $this->db->get_where('tb_karyawan', array('id_kry' => $id_kry))->result();
	}
        
        public function update($id_kry){
		$data = array(
			'id_kry'                => $this->input->post('id_kry'),
                        'nama_kry'              => $this->input->post('nama_kry'),
                        'nik_kry'               => $this->input->post('nik_kry'),
                        'jabatan_kry'           => $this->input->post('jabatan_kry'),
                        'pangkat_kry'           => $this->input->post('pangkat_kry'),
                        'divisi_kry'            => $this->input->post('divisi_kry'),
                        'dep_kry'               => $this->input->post('dep_kry'),
                        'lokasi_kry'            => $this->input->post('lokasi_kry'),
                        'panggilan_kry'         => $this->input->post('panggilan_kry'),
                        'identitas_kry'         => $this->input->post('identitas_kry'),
                        'jk_kry'                => $this->input->post('jk_kry'),
                        'tempat_lahir_kry'      => $this->input->post('tempat_lahir_kry'),
                        'tgl_lahir_kry'         => $this->input->post('tgl_lahir_kry'),
                        'negara_kry'            => $this->input->post('negara_kry'),
                        'agama_kry'             => $this->input->post('agama_kry'),
                        'npwp_kry'              => $this->input->post('npwp_kry'),
                        'alamat_kry'            => $this->input->post('alamat_kry'),
                        'tlp_rumah_kry'         => $this->input->post('tlp_rumah_kry'),
                        'no_hp_kry'             => $this->input->post('no_hp_kry'),
                        'tgl_masuk_kry'         => $this->input->post('tgl_masuk_kry'),
                        'status_kerja_kry'      => $this->input->post('status_kerja_kry'),
                        'status_nikah_kry'      => $this->input->post('status_nikah_kry'),
                        'email_kry'             => $this->input->post('email_kry')
		);
			
		if($id==1){
		    return $this->db->insert('tb_karyawan',$data);
			}
			else
			{
		    $this->db->where('id_kry',$id_kry);
		    return $this->db->update('tb_karyawan',$data);
			}        
			
		$this->db->update('tb_karyawan', $data);
	}

	public function hapus($id_kry){
		$this->db->delete('tb_karyawan', ['id_kry' => $id_kry]);
        }

        public function print(){
                $query = $this->db->get('tb_karyawan');
                return $query->result_array();
        }

        public function print_id($id_kry){
                $query = $this->db->get_where('tb_karyawan', ['id_kry' => $id_kry]);
                return $query->result_array();
	}
        
        public function val_karyawan(){
                $this->form_validation->set_message('required',"<p style='font-size:10px; 
                margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");
                $config = [
                        ['field' => 'nama_kry',
                        'label' => 'Nama Lengkap',
                        'rules' => 'required'],

                        ['field' => 'nik_kry',
                        'label' => 'NIK',
                        'rules' => 'required'],
                        
                        ['field' => 'jabatan_kry',
                        'label' => 'Jabatan',
                        'rules' => 'required'],

                        ['field' => 'pangkat_kry',
                        'label' => 'Pangkat',
                        'rules' => 'required'],

                        ['field' => 'divisi_kry',
                        'label' => 'Divisi',
                        'rules' => 'required'],
                        
                        ['field' => 'dep_kry',
                        'label' => 'Departemen',
                        'rules' => 'required'],

                        ['field' => 'lokasi_kry',
                        'label' => 'Unit / Cabang',
                        'rules' => 'required'],

                        ['field' => 'panggilan_kry',
                        'label' => 'Nama Panggilan',
                        'rules' => 'required'],
                        
                        ['field' => 'identitas_kry',
                        'label' => 'Identitas',
                        'rules' => 'required'],

                        ['field' => 'jk_kry',
                        'label' => 'Jenis Kelamin',
                        'rules' => 'required'],

                        ['field' => 'tempat_lahir_kry',
                        'label' => 'Tempat Lahir',
                        'rules' => 'required'],
                        
                        ['field' => 'tgl_lahir_kry',
                        'label' => 'Tanggal Lahir',
                        'rules' => 'required'],

                        ['field' => 'negara_kry',
                        'label' => 'Kewarganegaraan',
                        'rules' => 'required'],

                        ['field' => 'agama_kry',
                        'label' => 'Agama',
                        'rules' => 'required'],
                        
                        ['field' => 'npwp_kry',
                        'label' => 'NPWP',
                        'rules' => 'required'],

                        ['field' => 'alamat_kry',
                        'label' => 'Alamat',
                        'rules' => 'required'],

                        ['field' => 'tlp_rumah_kry',
                        'label' => 'Telepon Rumah',
                        'rules' => 'required'],
                        
                        ['field' => 'no_hp_kry',
                        'label' => 'No. Handphone',
                        'rules' => 'required'],

                        ['field' => 'tgl_masuk_kry',
                        'label' => 'Tanggal Masuk',
                        'rules' => 'required'],

                        ['field' => 'status_kerja_kry',
                        'label' => 'Status Pekerjaan',
                        'rules' => 'required'],
                        
                        ['field' => 'status_nikah_kry',
                        'label' => 'Status Pernikahan',
                        'rules' => 'required'],

                        ['field' => 'email_kry',
                        'label' => 'Email',
                        'rules' => 'required']
                        ];

                $this->form_validation->set_rules($config);
        }
}

?>