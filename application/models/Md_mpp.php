<?php

class Md_mpp extends CI_Model
{
	public function __construct(){
		$this->load->database();
        }

	public function tampil(){
        $this->db->order_by('jabatan_pp', 'ASC');
        $query = $this->db->get('tb_mpp');
        return $query->result();

	}

	public function simpan(){
		$data = [
                    'id_pp'             => $this->input->post('id_pp'),
                    'jabatan_pp'        => $this->input->post('jabatan_pp'),
                    'dep_pp'            => $this->input->post('dep_pp'),
                    'area_pp'           => $this->input->post('area_pp'),
                    'status_pp'         => $this->input->post('status_pp'),
                    'jml_butuh_pp'      => $this->input->post('jml_butuh_pp'),
                    'sisa_pp'           => $this->input->post('sisa_pp'),
                    'nama_pmh_pp'       => $this->input->post('nama_pmh_pp'),
                    'jabatan_pmh_pp'    => $this->input->post('jabatan_pmh_pp'),
                    'tgl_pmh_pp'        => $this->input->post('tgl_pmh_pp'),
                    'tgl_tempo_pp'      => $this->input->post('tgl_tempo_pp'),
                    'tgl_wawancara_pp'  => $this->input->post('tgl_wawancara_pp'),
                    'tgl_pmnh_pp'       => $this->input->post('tgl_pmnh_pp'),
                    'kcp_pmnh_pp'       => $this->input->post('kcp_pmnh_pp'),
                    'total_pp'          => $this->input->post('total_pp'),
                    'tgl_masuk_pp'      => $this->input->post('tgl_masuk_pp'),
                    'sumber_rek_pp'     => $this->input->post('sumber_rek_pp'),
                    'ket_pp'            => $this->input->post('ket_pp')
		];

		$this->db->insert('tb_mpp', $data);
	}

	public function edit($id_pp){
		$query = $this->db->get_where('tb_mpp', ['id_pp' => $id_pp]);
		return $query->row();
    }
    
    public function detail($id_pp){
        return $this->db->get_where('tb_mpp', array('id_pp' => $id_pp))->result();
	}
    
    public function update($id_pp){
		$data = array(
			'id_pp'             => $this->input->post('id_pp'),
            'jabatan_pp'        => $this->input->post('jabatan_pp'),
            'dep_pp'            => $this->input->post('dep_pp'),
            'area_pp'           => $this->input->post('area_pp'),
            'status_pp'         => $this->input->post('status_pp'),
            'jml_butuh_pp'      => $this->input->post('jml_butuh_pp'),
            'sisa_pp'           => $this->input->post('sisa_pp'),
            'nama_pmh_pp'       => $this->input->post('nama_pmh_pp'),
            'jabatan_pmh_pp'    => $this->input->post('jabatan_pmh_pp'),
            'tgl_pmh_pp'        => $this->input->post('tgl_pmh_pp'),
            'tgl_tempo_pp'      => $this->input->post('tgl_tempo_pp'),
            'tgl_wawancara_pp'  => $this->input->post('tgl_wawancara_pp'),
            'tgl_pmnh_pp'       => $this->input->post('tgl_pmnh_pp'),
            'kcp_pmnh_pp'       => $this->input->post('kcp_pmnh_pp'),
            'total_pp'          => $this->input->post('total_pp'),
            'tgl_masuk_pp'      => $this->input->post('tgl_masuk_pp'),
            'sumber_rek_pp'     => $this->input->post('sumber_rek_pp'),
            'ket_pp'            => $this->input->post('ket_pp')
		);
			
		if($id==1){
		    return $this->db->insert('tb_mpp',$data);
			}
			else
			{
		    $this->db->where('id_pp',$id_pp);
		    return $this->db->update('tb_mpp',$data);
			}        
			
		$this->db->update('tb_mpp', $data);
	}

	public function hapus($id_pp){
		$this->db->delete('tb_mpp', ['id_pp' => $id_pp]);
    }

    public function print($tabel,$id){
        $query = $this->db->select()->from($tabel)->where($id)->get();
        return $query->result();
    }

    public function print_id($id_pp){
        $query = $this->db->get_where('tb_mpp', ['id_pp' => $id_pp]);
        return $query->result_array();
    }
        
    public function val_mpp(){
        $this->form_validation->set_message('required',"<p style='font-size:10px; 
        margin-top: -10px;' class='text-danger'>". '{field} Tidak Boleh Kosong!'."</p>");
        $config = [
                    ['field' => 'jabatan_pp',
                    'label' => 'Jabatan',
                    'rules' => 'required'],

                    ['field' => 'dep_pp',
                    'label' => 'Departemen',
                    'rules' => 'required'],

                    ['field' => 'area_pp',
                    'label' => 'Area',
                    'rules' => 'required'],
                        
                    ['field' => 'status_pp',
                    'label' => 'Status',
                    'rules' => 'required'],

                    ['field' => 'jml_butuh_pp',
                    'label' => 'Jumlah yang dibutuhkan',
                    'rules' => 'required'],

                    ['field' => 'sisa_pp',
                    'label' => 'Sisa',
                    'rules' => 'required'],
                        
                    ['field' => 'nama_pmh_pp',
                    'label' => 'Nama Pemohon',
                    'rules' => 'required'],

                    ['field' => 'jabatan_pmh_pp',
                    'label' => 'Jabatan Pemohon',
                    'rules' => 'required'],

                    ['field' => 'tgl_pmh_pp',
                    'label' => 'Tanggal [Permohonan',
                    'rules' => 'required'],
                        
                    ['field' => 'tgl_tempo_pp',
                    'label' => 'Tanggal Jatuh Tempo',
                    'rules' => 'required'],

                    ['field' => 'tgl_wawancara_pp',
                    'label' => 'Wawancara GM',
                    'rules' => 'required'],

                    ['field' => 'tgl_pmnh_pp',
                    'label' => 'Tanggal Pemenuhan',
                    'rules' => 'required'],
                        
                    ['field' => 'kcp_pmnh_pp',
                    'label' => 'Kecepatan Pemenuhan (%)',
                    'rules' => 'required'],

                    ['field' => 'total_pp',
                    'label' => 'Total',
                    'rules' => 'required'],

                    ['field' => 'tgl_masuk_pp',
                    'label' => 'Tanggal Masuk Karyawan',
                    'rules' => 'required'],
                        
                    ['field' => 'sumber_rek_pp',
                    'label' => 'Sumber Rekrutmen',
                    'rules' => 'required'],

                    ['field' => 'ket_pp',
                    'label' => 'Keterangan',
                    'rules' => 'required']
                ];

            $this->form_validation->set_rules($config);
        }
}
?>