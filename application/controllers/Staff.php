<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends CI_Controller { 
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model(array('Md_user','Md_excel','Md_master','Md_karyawan','Md_divisi','Md_kode',
                                 'Md_cuti','Md_percobaan','Md_sakit','Md_izin','Md_lembur','Md_dinas'));
        $this->load->library(array('form_validation','session','Pdf'));
        $this->load->helper(array('url','html','form','text','nominal','tanggal','tgl_indo'));
        if($this->session->userdata('username')=="") {
            redirect('login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login');
    }

    function get_pjs(){
		$id_kry  = $this->input->post('id_kry');
		$data    = $this->Md_master->get_pjs_bykode($id_kry);
		echo json_encode($data);
    }

    function get_cuti(){
		$id_kry  = $this->input->post('id_kry');
		$data    = $this->m_pos->get_cuti_bykode($id_kry);
		echo json_encode($data);
	}

	public function index(){  
        $data['jml']      = $this->Md_karyawan->get_total_karyawan(); 
        $data['jmlb']     = $this->Md_karyawan->get_total_baru();
        $data['coba']     = $this->Md_percobaan->tampil();
        $data['cuti']     = $this->Md_cuti->tampil_index();
        $data['izin']     = $this->Md_izin->tampil_index();
        $data['bdy']      = $this->Md_karyawan->birthday();
        $data['karyawan'] = $this->Md_karyawan->tampil();
        $data['perdep']   = $this->Md_master->per_dep();
        $data['perarea']  = $this->Md_master->per_area();
        $data['perjns']   = $this->Md_master->per_jenis();

        
        foreach($this->Md_master->statistik_pengunjung()->result_array() as $gf)
        {
         $data['grafik'][]=(float)$gf['Januari'];
         $data['grafik'][]=(float)$gf['Februari'];
         $data['grafik'][]=(float)$gf['Maret'];
         $data['grafik'][]=(float)$gf['April'];
         $data['grafik'][]=(float)$gf['Mei'];
         $data['grafik'][]=(float)$gf['Juni'];
         $data['grafik'][]=(float)$gf['Juli'];
         $data['grafik'][]=(float)$gf['Agustus'];
         $data['grafik'][]=(float)$gf['September'];
         $data['grafik'][]=(float)$gf['Oktober'];
         $data['grafik'][]=(float)$gf['November'];
         $data['grafik'][]=(float)$gf['Desember'];
        } 
        
        $this->load->view('staff/index',$data);
    }

    public function struktur_pusat(){
        $data['judul']     = 'Struktur Organisasi Pusat';
		$this->load->view('staff/struktur_pusat',$data);
	}

	public function struktur_cabang(){
        $data['judul']     = 'Struktur Organisasi Cabang';
		$this->load->view('staff/struktur_cabang',$data);
    }

    // ====================================================== CUTI START ============================= //
   
    public function cuti(){
        $data['cuti']   = $this->Md_cuti->tampil();
        $data['judul']  = "Permohonan Cuti";

        $this->load->view('staff/data_cuti', $data);
    } 

    public function add_cuti(){
        $data['judul']  = 'Tambah Data Cuti';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['divisi'] = $this->Md_master->get_divisi();
        $data['kode']   = $this->Md_kode->kode_cuti();
        $data['name']   = $this->session->userdata('name');

        $this->load->view('staff/add_cuti', $data);
    }

    public function save_cuti(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_ct', 'Kode Cuti', ['required', 'is_unique[tb_cuti.id_ct]']);
        $this->Md_cuti->val_cuti();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_cuti();
        }
        else
        {
            $this->Md_cuti->simpan();
            $this->session->set_flashdata('input_sukses','Data jabatan berhasil di input');
            redirect('staff/cuti');
        }
    }

    function detail_cuti($id){
        $data['judul']  = 'Detail Permohonan Cuti';
        $data['cuti']   = $this->Md_cuti->detail($id);
        $where = array('id_ct' => $id);

        $this->load->view('staff/detail_cuti',$data);
    }

    function get_autocomplete(){
		if (isset($_GET['term'])) {
		  	$result = $this->Md_master->search_nama($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					'nama_kry'	=> $row->nama_kry,
				);
		     	echo json_encode($arr_result);
		   	}
		}
    }
    
    // ====================================================== CUTI END ============================= //

    // ====================================================== IZIN START ============================= //

    public function izin(){
        $data['izin']  = $this->Md_izin->tampil();
        $data['judul'] = "Permohonan Izin";

        $this->load->view('staff/data_izin', $data);
    }

    public function add_izin(){
        $data['judul']  = 'Tambah Data Izin';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['kode']   = $this->Md_kode->kode_izin();
        $data['name']   = $this->session->userdata('name');

        $this->load->view('staff/add_izin', $data);
    }

    public function save_izin(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_izn', 'Kode Izin', ['required', 'is_unique[tb_izin.id_izn]']);
        $this->Md_izin->val_izin();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_izin();
        }
        else
        {
            $this->Md_izin->simpan();
            $this->session->set_flashdata('input_sukses','Data jabatan berhasil di input');
            redirect('staff/izin');
        }
    }

    function detail_izin($id){
        $data['judul']  = 'Detail Permohonan Izin';
        $data['izin']   = $this->Md_izin->detail($id);
        $where = array('id_izn' => $id);

        $this->load->view('staff/detail_izin',$data);
    }

    // ====================================================== IZIN END ============================= //

    // ====================================================== SAKIT START ============================= //

    public function sakit(){
        $data['sakit']  = $this->Md_sakit->tampil();
        $data['judul']  = "Permohonan Sakit";

        $this->load->view('staff/data_sakit', $data);
    }

    public function add_sakit(){
		$data['judul']  = 'Tambah Data Sakit';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['kode']   = $this->Md_kode->kode_sakit();
        $data['name']   = $this->session->userdata('name');
		
		$this->load->view('staff/add_sakit', $data);
    }
    
	public function save_sakit(){
        $data = array();
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_skt', 'Kode Sakit', ['required', 'is_unique[tb_sakit.id_skt]']);
        $this->Md_sakit->val_sakit();

        if($this->form_validation->run() === FALSE){
            $this->add_sakit();
        }
		if($this->input->post('submit')){ 
			$upload = $this->Md_sakit->upload();
			if($upload['result'] == "success"){
				$this->Md_sakit->simpan($upload);
	
				redirect('staff/sakit'); 
				$data['message'] = $upload['error'];
			}
        }
        else{
            $this->Md_sakit->simpan($upload);
            $this->session->set_flashdata('input_sukses','Data jabatan berhasil di input');
            redirect('staff/sakit');
        }
    }

    public function detail_sakit($id){
        $data['judul']  = 'Detail Permohonan Sakit';
        $data['sakit']   = $this->Md_sakit->detail($id);
        $where = array('id_skt' => $id);

        $this->load->view('staff/detail_sakit',$data);
    }

    // ====================================================== SAKIT END ============================= //

    // ====================================================== RESIGN START ============================= //

    public function add_resign(){
        $data['judul']  = 'Tambah Data resign';
        $data['rsg']    = $this->Md_master->get_karyawan();
        $data['kode']   = $this->Md_kode->kode_resign();
        $data['name']   = $this->session->userdata('name');

        $this->load->view('staff/add_resign', $data);
    }

    public function save_resign(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_rsg', 'Kode resign', ['required', 'is_unique[tb_resign.id_rsg]']);
        $this->Md_resign->val_resign();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_resign();
        }
        else
        {
            $this->Md_resign->simpan();
            $this->session->set_flashdata('input_sukses','Data Resign berhasil di input');
            redirect('staff/resign');
        }
    }

    function detail_resign($id){
        $data['judul']  = 'Detail Permohonan Resign';
        $data['resign']   = $this->Md_resign->detail($id);
        $where = array('id_rsg' => $id);

        $this->load->view('staff/detail_resign',$data);
    }

    // ====================================================== RESIGN START ============================= //
    // ====================================================== LEMBUR START ============================= //
   
    public function lembur(){
        $data['lembur'] = $this->Md_lembur->tampil();
        $data['judul']  = "Permohonan Lembur";

        $this->load->view('staff/data_lembur', $data);
    } 

    public function add_lembur(){
        $data['judul']  = 'Tambah Data Lembur';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['kode']   = $this->Md_kode->kode_lembur();
        $data['name']   = $this->session->userdata('name');

        $this->load->view('staff/add_lembur', $data);
    }

    public function save_lembur(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_ot', 'Kode Lembur', ['required', 'is_unique[tb_lembur.id_ot]']);
        $this->Md_lembur->val_lembur();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_lembur();
        }
        else
        {
            $this->Md_lembur->simpan();
            $this->session->set_flashdata('input_sukses','Data Lembur berhasil di input');
            redirect('staff/lembur');
        }
    }

    function detail_lembur($id){
        $data['judul']  = 'Detail Permohonan Lembur';
        $data['lembur'] = $this->Md_lembur->detail($id);
        $where = array('id_ot' => $id);

        $this->load->view('staff/detail_lembur',$data);
    }
    
    // ====================================================== LEMBUR END ============================= //

    // ====================================================== DINAS START ============================= //
   
    public function dinas(){
        $data['dinas'] = $this->Md_dinas->tampil();
        $data['judul'] = "Permohonan Perjalanan Dinas";

        $this->load->view('staff/data_dinas', $data);
    } 

    public function add_dinas(){
        $data['judul']  = 'Tambah Data Perjalanan Dinas';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['kode']   = $this->Md_kode->kode_dinas();
        $data['name']   = $this->session->userdata('name');

        $this->load->view('staff/add_dinas', $data);
    }

    public function save_dinas(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_dns', 'Kode Dinas', ['required', 'is_unique[tb_dinas.id_dns]']);
        $this->Md_dinas->val_dinas();


        if($this->form_validation->run() === FALSE)
        {
            $this->add_dinas();
        }
        else
        {
            $this->Md_dinas->simpan();
            $this->session->set_flashdata('input_sukses','Data Lembur berhasil di input');
            redirect('staff/dinas');
        }
    }

    function detail_dinas($id){
        $data['judul']  = 'Detail Permohonan Perjalanan Dinas';
        $data['dinas'] = $this->Md_dinas->detail($id);
        $where = array('id_dns' => $id);

        $this->load->view('staff/detail_dinas',$data);
    }
    
    // ====================================================== LEMBUR END ============================= //

}