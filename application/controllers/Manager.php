<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller { 
    function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model(array('Md_user','Md_excel','Md_master','Md_karyawan','Md_divisi','Md_kode',
                                 'Md_cuti','Md_dinas','Md_sakit','Md_percobaan','Md_mpp','Md_izin','Md_lembur'));
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

	public function index(){  
        $data['jml']      = $this->Md_karyawan->get_total_karyawan(); 
        $data['jmlb']     = $this->Md_karyawan->get_total_baru();
        $data['coba']     = $this->Md_percobaan->tampil();
        $data['mpp']      = $this->Md_mpp->tampil();
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
        
        $this->load->view('manager/index',$data);
    }

    // ====================================================== IZIN START ============================= //

    public function izin(){
        $data['izin']  = $this->Md_izin->tampil();
        $data['judul'] = "Permohonan Izin";

        $this->load->view('manager/data_izin', $data);
    }

    public function edit_izin($id){
        $data['judul']  = 'Edit Permohonan Izin';
        $data['kode']   = $this->Md_kode->kode_izin();
        $data['name']   = $this->session->userdata('name');
        $data['izin']   = $this->Md_izin->edit($id);

        $this->load->view('manager/edit_izin', $data);
    }

    public function update_izin($id){
        $this->Md_izin->val_izin();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_izin($id);
        }
        else
        {
            $this->Md_izin->update($id);
            $this->session->set_flashdata('update_sukses', 'Data Izin berhasil diperbaharui');
            redirect('manager/izin');
        }
    }

    function detail_izin($id){
        $data['judul']  = 'Detail Permohonan Izin';
        $data['izin']   = $this->Md_izin->detail($id);
        $where = array('id_izn' => $id);

        $this->load->view('manager/detail_izin',$data);
    }

    // ====================================================== IZIN END ============================= //

    // ====================================================== CUTI START ============================= //

    public function cuti(){
        $data['cuti']   = $this->Md_cuti->tampil_all();
        $data['judul']  = "Permohonan Cuti";

        $this->load->view('manager/data_cuti', $data);
    } 

    public function delete_cuti($id){
        $this->Md_cuti->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Cuti berhasil di hapus');
        redirect('manager/cuti');
    }

    public function edit_cuti($id){
        $data['judul']  = 'Edit Data Cuti';
        $data['kode']   = $this->Md_kode->kode_cuti();
        $data['name']   = $this->session->userdata('name');
        $data['cuti']  = $this->Md_cuti->edit($id);

        $this->load->view('manager/edit_cuti', $data);
    }

    public function update_cuti($id){
        $this->Md_cuti->val_cuti();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_cuti($id);
        }
        else
        {
            $this->Md_cuti->update($id);
            $this->session->set_flashdata('update sukses', 'Data Cuti berhasil diperbaharui');
            redirect('manager/cuti');
        }
    }

    function detail_cuti($id){
        $data['judul']  = 'Detail Permohonan Cuti';
        $data['cuti']   = $this->Md_cuti->detail($id);
        $where = array('id_ct' => $id);

        $this->load->view('manager/detail_cuti',$data);
    }
    
    // ====================================================== CUTI END ============================= //

    // ====================================================== SAKIT START ============================= //

    public function sakit(){
        $data['sakit']  = $this->Md_sakit->tampil();
        $data['judul']  = "Permohonan Sakit";

        $this->load->view('manager/data_sakit', $data);
    } 

    public function edit_sakit($id){
        $data['judul']  = 'Edit Permohonan Sakit';
        $data['kode']   = $this->Md_kode->kode_sakit();
        $data['name']   = $this->session->userdata('name');
        $data['sakit']  = $this->Md_sakit->edit($id);

        $this->load->view('manager/edit_sakit', $data);
    }

    public function update_sakit($id){
        $this->Md_sakit->val_sakit();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_sakit($id);
        }
        else
        {
            $this->Md_sakit->update($id);
            $this->session->set_flashdata('update_sukses', 'Data Sakit berhasil diperbaharui');
            redirect('manager/sakit');
        }
    }

    function detail_sakit($id){
        $data['judul']  = 'Detail Permohonan Sakit';
        $data['sakit']   = $this->Md_sakit->detail($id);
        $where = array('id_skt' => $id);

        $this->load->view('manager/detail_sakit',$data);
    }

    // ====================================================== SAKIT END ============================= //

    // ====================================================== LEMBUR START ============================= //

    public function lembur(){
        $data['lembur'] = $this->Md_lembur->tampil();
        $data['judul']  = "Permohonan Lembur";

        $this->load->view('manager/data_lembur', $data);
    } 

    public function edit_lembur($id){
        $data['judul']  = 'Edit Permohonan Lembur';
        $data['kode']   = $this->Md_kode->kode_lembur();
        $data['name']   = $this->session->userdata('name');
        $data['lembur']  = $this->Md_lembur->edit($id);

        $this->load->view('manager/edit_lembur', $data);
    }

    public function update_lembur($id){
        $this->Md_lembur->val_lembur();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_lembur($id);
        }
        else
        {
            $this->Md_lembur->update($id);
            $this->session->set_flashdata('update_sukses', 'Data Lembur berhasil diperbaharui');
            redirect('manager/lembur');
        }
    }

    // public function update($id)
	// {
	// 	 $rules = $this->Md_lembur->rules;
	//    	 $this->form_validation->set_rules($rules);
	//      if($this->form_validation->run() == TRUE)
	//  	 {
	// 		$input = $this->input->post();
	// 		$this->company_model->save($input, $id);
	// 		$this->session->set_flashdata('message', 'Company Update Successfully..!');
	// 		redirect('company');
    //      } 
    //      else 
    //      {
	// 		$this->session->set_flashdata('message', validation_errors());
	// 		redirect('company/edit'.$id);
	// 	 }
	// }

    function detail_lembur($id){
        $data['judul']  = 'Detail Permohonan Lembur';
        $data['lembur']  = $this->Md_lembur->detail($id);
        $where = array('id_ot' => $id);

        $this->load->view('manager/detail_lembur',$data);
    }

    // ====================================================== LEMBUR END ============================= //

    // ====================================================== DINAS START ============================= //

    public function dinas(){
        $data['dinas']  = $this->Md_dinas->tampil();
        $data['judul']  = "Permohonan Perjalanan Dinas";

        $this->load->view('manager/data_dinas', $data);
    } 

    public function edit_dinas($id){
        $data['judul']  = 'Edit Permohonan Perjalanan Dinas';
        $data['kode']   = $this->Md_kode->kode_dinas();
        $data['name']   = $this->session->userdata('name');
        $data['dinas']  = $this->Md_dinas->edit($id);

        $this->load->view('manager/edit_dinas', $data);
    }

    public function update_dinas($id){
        $this->Md_dinas->val_dinas();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_dinas($id);
        }
        else
        {
            $this->Md_dinas->update($id);
            $this->session->set_flashdata('update_sukses', 'Data Perjalanan Dinas berhasil diperbaharui');
            redirect('manager/dinas');
        }
    }

    function detail_dinas($id){
        $data['judul']  = 'Detail Permohonan Perjalanan Dinas';
        $data['dinas']  = $this->Md_dinas->detail($id);
        $where = array('id_dns' => $id);

        $this->load->view('manager/detail_dinas',$data);
    }

    // ====================================================== DINAS END ============================= //
}