<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_permohonan extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil(){
		$this->db->order_by('dep_pmhn', 'ASC');
                $query = $this->db->get('tb_karyawan_baru');
                return $query->result();
	}

	public function simpan(){
		$data = [
                                'id_pmhn'                => $this->input->post('id_pmhn'),
                                'dep_pmhn'               => $this->input->post('dep_pmhn'),
                                'nama_pemohon_pmhn'      => $this->input->post('nama_pemohon_pmhn'),
                                'jabatan_pemohon_pmhn'   => $this->input->post('jabatan_pemohon_pmhn'),
                                'jabatan_pmhn'           => $this->input->post('jabatan_pmhn'),
                                'lokasi_pmhn'            => $this->input->post('lokasi_pmhn'),
                                'waktu_pmhn'             => $this->input->post('waktu_pmhn'),
                                'status_kerja_pmhn'      => $this->input->post('status_kerja_pmhn'),
                                'jumlah_pmhn'            => $this->input->post('jumlah_pmhn'),
                                'tanggal_pmhn'           => $this->input->post('tanggal_pmhn'),
                                'dasar_permohonan_pmhn'  => $this->input->post('dasar_permohonan_pmhn'),
                                'sumber_rekrutmen_pmhn'  => $this->input->post('sumber_rekrutmen_pmhn'),
                                'ringkasan_tugas_pmhn'   => $this->input->post('ringkasan_tugas_pmhn'),
                                'gajih_pmhn'             => $this->input->post('gajih_pmhn'),
                                'jk_pmhn'                => $this->input->post('jk_pmhn'),
                                'usia_pmhn'              => $this->input->post('usia_pmhn'),
                                'pendidikan_pmhn'        => $this->input->post('pendidikan_pmhn'),
                                'jurusan_pmhn'           => $this->input->post('jurusan_pmhn'),
                                'pengalaman_kerja_pmhn'  => $this->input->post('pengalaman_kerja_pmhn'),
                                'bidang_pmhn'            => $this->input->post('bidang_pmhn'),
                                'syarat_lain_pmhn'       => $this->input->post('syarat_lain_pmhn'),
                                'keterampilan_pmhn'      => $this->input->post('keterampilan_pmhn'),
                                'tgl_bergabung_pmhn'     => $this->input->post('tgl_bergabung_pmhn'),
                                'office_equipment_pmhn'  => $this->input->post('office_equipment_pmhn')
		];
		$this->db->insert('tb_karyawan_baru', $data);
	}

	public function edit($id_pmhn){
	        $query = $this->db->get_where('tb_karyawan_baru', ['id_pmhn' => $id_pmhn]);
		return $query->row();
        }
    
        public function detail($id_pmhn){
                return $this->db->get_where('tb_karyawan_baru', array('id_pmhn' => $id_pmhn))->result();
	}

        public function update($id_pmhn){
		$data = array(
			'id_pmhn'                => $this->input->post('id_pmhn'),
                        'dep_pmhn'               => $this->input->post('dep_pmhn'),
                        'nama_pemohon_pmhn'      => $this->input->post('nama_pemohon_pmhn'),
                        'jabatan_pemohon_pmhn'   => $this->input->post('jabatan_pemohon_pmhn'),
                        'jabatan_pmhn'           => $this->input->post('jabatan_pmhn'),
                        'lokasi_pmhn'            => $this->input->post('lokasi_pmhn'),
                        'waktu_pmhn'             => $this->input->post('waktu_pmhn'),
                        'status_kerja_pmhn'      => $this->input->post('status_kerja_pmhn'),
                        'jumlah_pmhn'            => $this->input->post('jumlah_pmhn'),
                        'tanggal_pmhn'           => $this->input->post('tanggal_pmhn'),
                        'dasar_permohonan_pmhn'  => $this->input->post('dasar_permohonan_pmhn'),
                        'sumber_rekrutmen_pmhn'  => $this->input->post('sumber_rekrutmen_pmhn'),
                        'ringkasan_tugas_pmhn'   => $this->input->post('ringkasan_tugas_pmhn'),
                        'gajih_pmhn'             => $this->input->post('gajih_pmhn'),
                        'jk_pmhn'                => $this->input->post('jk_pmhn'),
                        'usia_pmhn'              => $this->input->post('usia_pmhn'),
                        'pendidikan_pmhn'        => $this->input->post('pendidikan_pmhn'),
                        'jurusan_pmhn'           => $this->input->post('jurusan_pmhn'),
                        'pengalaman_kerja_pmhn'  => $this->input->post('pengalaman_kerja_pmhn'),
                        'bidang_pmhn'            => $this->input->post('bidang_pmhn'),
                        'syarat_lain_pmhn'       => $this->input->post('syarat_lain_pmhn'),
                        'keterampilan_pmhn'      => $this->input->post('keterampilan_pmhn'),                                'tgl_bergabung_pmhn'     => $this->input->post('tgl_bergabung_pmhn'),
                        'office_equipment_pmhn'  => $this->input->post('office_equipment_pmhn')
		);
			
		if($id_pmhn==1){
		    return $this->db->insert('tb_karyawan_baru',$data);
			}
			else
			{
		    $this->db->where('id_pmhn',$id_pmhn);
		    return $this->db->update('tb_karyawan_baru',$data);
			}        
			
		$this->db->update('tb_karyawan_baru', $data);
	}
        
	public function hapus($id_pmhn){
		$this->db->delete('tb_karyawan_baru', ['id_pmhn' => $id_pmhn]);
        }

        public function print(){
                $query = $this->db->get('tb_karyawan_baru');
                return $query->result_array();
        }

        public function print_id($id_pmhn){
                $query = $this->db->get_where('tb_karyawan_baru', ['id_pmhn' => $id_pmhn]);
                return $query->result_array();
	}
        
        public function val_permohonan(){
                $this->form_validation->set_message('required',"<p style='font-size:10px; 
                margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");

                $config = [
                                ['field' => 'dep_pmhn',
                                'label' => 'Departemen',
                                'rules' => 'required'],

                                ['field' => 'nama_pemohon_pmhn',
                                'label' => 'Nama Pemohon',
                                'rules' => 'required'],

                                ['field' => 'jabatan_pemohon_pmhn',
                                'label' => 'Jabatan Pemohon',
                                'rules' => 'required'],

                                ['field' => 'jabatan_pmhn',
                                'label' => 'Jabatan Karyawan',
                                'rules' => 'required'],

                                ['field' => 'lokasi_pmhn',
                                'label' => 'Lokasi',
                                'rules' => 'required'],

                                ['field' => 'waktu_pmhn',
                                'label' => 'Waktu Kerja',
                                'rules' => 'required'],

                                ['field' => 'status_kerja_pmhn',
                                'label' => 'Status Pekerjaan',
                                'rules' => 'required'],

                                ['field' => 'jumlah_pmhn',
                                'label' => 'Jumlah',
                                'rules' => 'required|numeric'],

                                ['field' => 'tanggal_pmhn',
                                'label' => 'Tanggal Permohonan',
                                'rules' => 'required'],

                                ['field' => 'dasar_permohonan_pmhn',
                                'label' => 'Dasar Permohonan',
                                'rules' => 'required'],

                                ['field' => 'sumber_rekrutmen_pmhn',
                                'label' => 'Sumber Rekrutmen',
                                'rules' => 'required'],
                                
                                 ['field' => 'ringkasan_tugas_pmhn',
                                 'label' => 'Ringkasan Tugas',
                                 'rules' => 'required'],

                                ['field' => 'gajih_pmhn',
                                'label' => 'Rate Gajih',
                                'rules' => 'required'],

                                ['field' => 'jk_pmhn',
                                'label' => 'Jenis Kelamin',
                                'rules' => 'required'],

                                ['field' => 'usia_pmhn',
                                'label' => 'Usia',
                                'rules' => 'required|numeric'],
                                
                                ['field' => 'pendidikan_pmhn',
                                'label' => 'Pendidikan',
                                'rules' => 'required'],

                                ['field' => 'jurusan_pmhn',
                                'label' => 'Jurusan',
                                'rules' => 'required'],

                                ['field' => 'pengalaman_kerja_pmhn',
                                'label' => 'Pengalaman Kerja',
                                'rules' => 'required'],
                                
                                ['field' => 'bidang_pmhn',
                                'label' => 'Bidang',
                                'rules' => 'required'],

                                ['field' => 'syarat_lain_pmhn',
                                'label' => 'Syarat Lainnya',
                                'rules' => 'required'],

                                ['field' => 'keterampilan_pmhn',
                                'label' => 'Keterampilan',
                                'rules' => 'required'],
                                
                                ['field' => 'tgl_bergabung_pmhn',
                                'label' => 'Tanggal Bergabung',
                                'rules' => 'required'],

                                ['field' => 'office_equipment_pmhn',
                                'label' => 'Office Equipment',
                                'rules' => 'required']
                        ];

                $this->form_validation->set_rules($config);
        }
}
?>