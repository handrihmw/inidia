<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller { 
    function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model(array('Md_user','Md_excel','Md_master','Md_departemen','Md_divisi',
                                 'Md_jabatan','Md_pangkat','Md_percobaan',
                                 'Md_karyawan','Md_permohonan','Md_kode', 'Md_resign',
                                 'Md_penilaian','Md_training','Md_get','Md_penilai',
                                 'Md_pemohon','Md_mpp','Md_cuti','Md_dinas','Md_sakit',
                                 'Md_mpp','Md_izin','Md_lembur'));
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

    public function status_kerja(){
		$status = $this->Md_master->get_kerja();
		switch ($status) {
	        case 'TETAP':
	            $color = "#D9534F";
	            break;
	        case 'KONTRAK':
	            $color = "#5CB85C";
	            break;
	        case 'MAGANG':
	            $color = "#5CB85C";
	            break;
	        default:
	            $color = "#D9534F";
	            break;
        }
    }

    // ============================== HELPER ============================= //

    public function tanggal(){
        echo shortdate_indo('2017-09-5');
        echo "<br/>";
        echo date_indo('2017-09-5');
        echo "<br/>";
        echo mediuMdate_indo('2017-09-5');
        echo "<br/>";
        echo longdate_indo('2017-09-5');
    }

    public function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
     
    }

    //Mengecek Duplikasi Data Username
    public function dup_username($post_username) {
        return $this->Md_user->dup_username($post_username);
    }

    public function dup_nik($post_nik){
        return $this->Md_user->dup_nik($post_nik);
    }

    // ============================== HELPER ============================= //

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

        // $datagrafik = $this->Md_master->statistik_pengunjung();
        // $data = array ( 
        //     'datagrafik' => $datagrafik, 
        // );
        
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
        
        $this->load->view('admin/index',$data);
    }

    public function get_pie(){ 
        $data = $this->Md_master->get_pie();
        $responce->cols[] = array( 
            "id"      => "", 
            "label"   => "Departemen", 
            "pattern" => "", 
            "type"    => "string" 
        ); 
        $responce->cols[] = array( 
            "id"      => "", 
            "label"   => "Jumlah", 
            "pattern" => "", 
            "type"    => "number" 
        ); 
        foreach($data as $gp) 
            { 
                $responce->rows[]["c"] = array( 
                    array( 
                        "v" => "$gp->dep_kry", 
                        "f" => null 
                    ) , 
                    array( 
                        "v" => (int)$gp->jumlah, 
                        "f" => null 
                    ) 
                ); 
            } 
        echo json_encode($responce); 
    }
    // ===================================GET BY ID START=================================== //

    function get_karyawan(){
		$id_kry  = $this->input->post('id_kry');
		$data    = $this->Md_master->get_karyawan_bykode($id_kry);
		echo json_encode($data);
    }

    function get_karyawan_notif(){
		$id_kry  = $this->input->post('id_kry');
		$data    = $this->Md_master->get_karyawan_notif_bykode($id_kry);
		echo json_encode($data);
    }

    function get_penilai(){
		$id_penilai  = $this->input->post('id_penilai');
		$data 		 = $this->Md_master->get_penilai_bykode($id_penilai);
		echo json_encode($data);
    }

    function get_pemohon(){
		$id_pemohon  = $this->input->post('id_pemohon');
		$data 		 = $this->Md_master->get_pemohon_bykode($id_pemohon);
		echo json_encode($data);
    }

    // ===================================GET BY ID END=================================== //

    // ===================================CRUD MASTER DATA START=================================== //
    
    function departemen(){
        $data['departemen'] = $this->Md_departemen->tampil();
        $data['judul']      = "Master Data Departemen";

        $this->load->view('admin/data_departemen', $data);
    }

    function add_departemen(){
        $data['judul']   = 'Tambah Data Departemen';
        $data['kode']    = $this->Md_kode->kode_departemen();
        $data['name']    = $this->session->userdata('name');

        $this->load->view('admin/add_departemen',$data);
    }

    function save_departemen(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id', 'Kode Departemen', ['required', 'is_unique[tb_departemen.id]']);

        $this->Md_departemen->val_departemen();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_departemen();
        }
        else
        {
            $this->Md_departemen->simpan();
            $this->session->set_flashdata('input_sukses','Data Departemen berhasil di input');
            redirect('admin/departemen');
        }
    }

    public function delete_departemen($id){
        $this->Md_departemen->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Departemen berhasil di hapus');
        redirect('admin/departemen');
    }

    public function edit_departemen($id){
        $data['judul']  = 'Edit Data Departemen';
        $data['kode']   = $this->Md_kode->kode_departemen();
        $data['name']   = $this->session->userdata('name');
        $data['dep_']   = $this->Md_departemen->edit($id);

        $this->load->view('admin/edit_departemen', $data);
    }

    public function update_departemen($id){
        $this->Md_departemen->val_departemen();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_departemen($id);
        }
        else
        {
            $this->Md_departemen->update($id);
            $this->session->set_flashdata('update_sukses', 'Data Departemen berhasil diperbaharui');
            redirect('admin/departemen');
        }
    }

    public function divisi(){
        $data['divisi'] = $this->Md_divisi->tampil();
        $data['judul']  = "Master Data Divisi";

        $this->load->view('admin/data_divisi', $data);
    }

    public function add_divisi(){
        $data['judul']   = 'Tambah Data Divisi';
        $data['kode']    = $this->Md_kode->kode_divisi();
        $data['name']    = $this->session->userdata('name');

        $this->load->view('admin/add_divisi',$data);
    }

    public function save_divisi(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id', 'Kode divisi', ['required', 'is_unique[tb_divisi.id]']);

        $this->Md_divisi->val_divisi();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_divisi();
        }
        else
        {
            $this->Md_divisi->simpan();
            $this->session->set_flashdata('input_sukses','Data Divisi berhasil di input');
            redirect('admin/divisi');
        }
    }

    public function delete_divisi($id){
        $this->Md_divisi->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Divisi berhasil di hapus');
        redirect('admin/divisi');
    }

    public function edit_divisi($id){
        $data['judul']  = 'Edit Data divisi';
        $data['kode']   = $this->Md_kode->kode_divisi();
        $data['name']   = $this->session->userdata('name');
        $data['dvs_']   = $this->Md_divisi->edit($id);

        $this->load->view('admin/edit_divisi', $data);
    }

    public function update_divisi($id){
        $this->Md_divisi->val_divisi();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_divisi($id);
        }
        else
        {
            $this->Md_divisi->update($id);
            $this->session->set_flashdata('update_sukses', 'Data Divisi berhasil diperbaharui');
            redirect('admin/divisi');
        }
    }

    public function jabatan(){
        $data['jabatan'] = $this->Md_jabatan->tampil();
        $data['judul']  = "Master Data jabatan";

        $this->load->view('admin/data_jabatan', $data);
    }

    public function add_jabatan(){
        $data['judul']   = 'Tambah Data jabatan';
        $data['kode']    = $this->Md_kode->kode_jabatan();
        $data['name']    = $this->session->userdata('name');

        $this->load->view('admin/add_jabatan',$data);
    }

    public function save_jabatan(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id', 'Kode jabatan', ['required', 'is_unique[tb_jabatan.id]']);
        $this->Md_jabatan->val_jabatan();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_jabatan();
        }
        else
        {
            $this->Md_jabatan->simpan();
            $this->session->set_flashdata('input_sukses','Data jabatan berhasil di input');
            redirect('admin/jabatan');
        }
    }

    public function delete_jabatan($id){
        $this->Md_jabatan->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data jabatan berhasil di hapus');
        redirect('admin/jabatan');
    }

    public function edit_jabatan($id)
    {
        $data['judul']  = 'Edit Data jabatan';
        $data['kode']   = $this->Md_kode->kode_jabatan();
        $data['name']   = $this->session->userdata('name');
        $data['jbt_']   = $this->Md_jabatan->edit($id);

        $this->load->view('admin/edit_jabatan', $data);
    }

    public function update_jabatan($id){
        $this->Md_jabatan->val_jabatan();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_jabatan($id);
        }
        else
        {
            $this->Md_jabatan->update($id);
            $this->session->set_flashdata('update_sukses', 'Data jabatan berhasil diperbaharui');
            redirect('admin/jabatan');
        }
    }

    public function pangkat(){
        $data['pangkat'] = $this->Md_pangkat->tampil();
        $data['judul']  = "Master Data pangkat";

        $this->load->view('admin/data_pangkat', $data);
    }

    public function add_pangkat(){
        $data['judul']   = 'Tambah Data pangkat';
        $data['kode']    = $this->Md_kode->kode_pangkat();
        $data['name']    = $this->session->userdata('name');

        $this->load->view('admin/add_pangkat',$data);
    }

    public function save_pangkat(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id', 'Kode pangkat', ['required', 'is_unique[tb_pangkat.id]']);
        $this->Md_pangkat->val_pangkat();
        
        if($this->form_validation->run() === FALSE)
        {
            $this->add_pangkat();
        }
        else
        {
            $this->Md_pangkat->simpan();
            $this->session->set_flashdata('input_sukses','Data pangkat berhasil di input');
            redirect('admin/pangkat');
        }
    }

    public function delete_pangkat($id){
        $this->Md_pangkat->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data pangkat berhasil di hapus');
        redirect('admin/pangkat');
    }

    public function edit_pangkat($id){
        $data['judul']  = 'Edit Data pangkat';
        $data['kode']   = $this->Md_kode->kode_pangkat();
        $data['name']   = $this->session->userdata('name');
        $data['pgk_']   = $this->Md_pangkat->edit($id);

        $this->load->view('admin/edit_pangkat', $data);
    }

    public function update_pangkat($id){
        $this->Md_pangkat->val_pangkat();
        if($this->form_validation->run() === FALSE)
        {
            $this->edit_pangkat($id);
        }
        else
        {
            $this->Md_pangkat->update($id);
            $this->session->set_flashdata('update_sukses', 'Data pangkat berhasil diperbaharui');
            redirect('admin/pangkat');
        }
    }

    public function penilai(){
        $data['karyawan'] = $this->Md_penilai->tampil();
        $data['judul']    = "Data Penilai";

        $this->load->view('admin/data_penilai', $data);
    }

    public function add_penilai(){
        $data['judul']   = 'Tambah Data Penilai';
        $data['idk']     = $this->Md_master->get_idk_penilai();
        $data['kode']    = $this->Md_kode->kode_penilai();
        $data['name']    = $this->session->userdata('name');

        $this->load->view('admin/add_penilai',$data);
    }

    public function save_penilai(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_penilai', 'Kode Karyawan', ['required', 'is_unique[tb_penilai.id_penilai]']);
        $this->Md_penilai->val_penilai();
        
        if($this->form_validation->run() === FALSE)
        {
            $this->add_penilai();
        }
        else
        {
            $this->Md_penilai->simpan();
            $this->session->set_flashdata('input_sukses','Data Penilai berhasil di input');
            redirect('admin/penilai');
        }
    }

    public function delete_penilai($id){
        $this->Md_penilai->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Penilai berhasil di hapus');
        redirect('admin/penilai');
    }

    public function edit_penilai($id){
        $data['judul']      = 'Edit Data Penilai';
        $data['idp']        = $this->Md_master->get_idp();
        $data['jbt']        = $this->Md_master->get_jabatan();
        $data['kode']       = $this->Md_kode->kode_penilai();
        $data['name']       = $this->session->userdata('name');
        $data['kry']        = $this->Md_penilai->edit($id);

        $this->load->view('admin/edit_penilai', $data);
    }

    public function update_penilai($id){
        $this->Md_penilai->val_penilai();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_penilai($id);
        }
        else
        {
            $this->Md_penilai->update($id);
            $this->session->set_flashdata('update_sukses', 'Data Penilai berhasil diperbaharui');
            redirect('admin/penilai');
        }
    }

    public function pemohon(){
        $data['karyawan'] = $this->Md_pemohon->tampil();
        $data['judul']    = "Data Pemohon";

        $this->load->view('admin/data_pemohon', $data);
    }

    public function add_pemohon(){
        $data['judul']   = 'Tambah Data Pemohon';
        $data['idk']     = $this->Md_master->get_idk_pemohon();
        $data['kode']    = $this->Md_kode->kode_pemohon();
        $data['name']    = $this->session->userdata('name');

        $this->load->view('admin/add_pemohon',$data);
    }

    public function save_pemohon(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_pemohon', 'Kode Karyawan', ['required', 'is_unique[tb_pemohon.id_pemohon]']);
        $this->Md_pemohon->val_pemohon();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_pemohon();
        }
        else
        {
            $this->Md_pemohon->simpan();
            $this->session->set_flashdata('input_sukses','Data Pemohon berhasil di simpan');
            redirect('admin/pemohon');
        }
    }

    public function delete_pemohon($id){
        $this->Md_pemohon->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Peohon berhasil di hapus');
        redirect('admin/pemohon');
    }

    public function edit_pemohon($id){
        $data['judul']   = 'Edit Data Pemohon';
        $data['idp']     = $this->Md_master->get_idp();
        $data['jbt']     = $this->Md_master->get_jabatan();
        $data['dep']     = $this->Md_master->get_dept();
        $data['kode']    = $this->Md_kode->kode_pemohon();
        $data['name']    = $this->session->userdata('name');
        $data['kry']     = $this->Md_pemohon->edit($id);

        $this->load->view('admin/edit_pemohon', $data);
    }

    public function update_pemohon($id){
        $this->Md_pemohon->val_pemohon();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_pemohon($id);
        }
        else
        {
            $this->Md_pemohon->update($id);
            $this->session->set_flashdata('update_sukses', 'Data Pemohon berhasil diperbaharui');
            redirect('admin/pemohon');
        }
    }

    // ===================================CRUD MASTER DATA END==================================== //

    // ===================================CRUD USER START======================================== //

    public function pengguna(){
        $data['judul']     = 'Data Pengguna';
		$data['users']     = $this->Md_user->tampil_user()->result();
        $data['user']      = $this->session->userdata('name');

		$this->load->view('admin/data_user', $data);
    }
    
    public function add_user(){
        $data['judul']     = 'Tambah Data Pengguna';
        $data['name']      = $this->session->userdata('name');
        $data['kode']      = $this->Md_kode->kode_user();
        
        $this->load->view('admin/add_user',$data);
    }

	public function edit_user($id){
        $data['judul']     = 'Edit Data Pengguna';
        $data['warning']   = '';
        $data['name']      = $this->session->userdata('name');
		$data['user']      = $this->Md_user->edit_user($id);
        $data['kode']      = $this->Md_kode->kode_user();
        
		$this->load->view('admin/edit_user', $data);
    }
    
    public function save_user(){
        $this->form_validation->set_rules('username','Username','required|min_length[2]|max_length[10]|callback_dup_username');
        $this->form_validation->set_rules('name','Nama Lengkap','required|min_length[2]');
        $this->form_validation->set_rules('email','Email','required|valid_email'); 
        $this->form_validation->set_rules('password','Password','required|min_length[5]');
        $this->form_validation->set_rules('level','Level','required');
        $this->form_validation->set_message('dup_username', 'Username sudah digunakan, silahkan gunakan username lain.');
   
        if($this->form_validation->run() == FALSE) {
        $this->add_user();
        } else {

        $data = array(
                    'id'           => $this->input->post('id'),
                    'username'     => $this->input->post('username'),
                    'name'         => $this->input->post('name'),
                    'email'        => $this->input->post('email'),
                    'password'     => Md5($this->input->post('password')),
                    'level'        => $this->input->post('level')
                );

        $this->Md_user->save_user($data);
        redirect('admin/pengguna');
        }
    }
    
	public function update_user($id){
		$data = array(
            'id'           => $this->input->post('id'),
            'username'     => $this->input->post('username'),
            'name'         => $this->input->post('name'),
            'email'        => $this->input->post('email'),
            'password'     => Md5($this->input->post('password')),
            'level'        => $this->input->post('level')
            );
            
        $this->Md_user->update_user($id, $data);
        $this->session->set_flashdata('update','information');
		redirect('admin/pengguna');
    }

	public function delete_user($id){
		$this->Md_user->delete_user($id);
		$this->session->set_flashdata('delete','information');
		redirect('admin/pengguna');
    }

    // ===================================CRUD USER END ======================================== //

    // ===================================CRUD KARYAWAN START======================================== //

    public function karyawan(){
        $data['karyawan'] = $this->Md_karyawan->tampil();
        $data['judul']    = "Data Karayawan";

        $this->load->view('admin/data_karyawan', $data);
    }

    public function add_karyawan(){
        $data['judul']      = "Tambah Data Karayawan";
        $data['dep']        = $this->Md_master->get_dept();
        $data['ag']         = $this->Md_master->get_agama();
        $data['jbt']        = $this->Md_master->get_jabatan();
        $data['dvs']        = $this->Md_master->get_divisi();
        $data['pgk']        = $this->Md_master->get_pangkat();
        $data['unt']        = $this->Md_master->get_unit();
        $data['jkl']        = $this->Md_master->get_jk();
        $data['krj']        = $this->Md_master->get_kerja();
        $data['nkh']        = $this->Md_master->get_nikah();
        $data['name']       = $this->session->userdata('name');
        $data['kode']       = $this->Md_kode->kode_karyawan();

        $this->load->view('admin/add_karyawan',$data);
    }

    public function save_karyawan(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_kry', 'ID Karyawan', ['required', 'is_unique[tb_karyawan.id_kry]']);
        $this->Md_karyawan->val_karyawan();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_karyawan();
        }
        else
        {
            $this->Md_karyawan->simpan();
            $this->session->set_flashdata('input_sukses','Data Karyawan berhasil di simpan');
            redirect('admin/karyawan');
        }
    }

    public function delete_karyawan($id_kry){
        $this->Md_karyawan->hapus($id_kry);
        $this->session->set_flashdata('hapus_sukses','Data Karyawan berhasil di hapus');
        redirect('admin/karyawan');
    }

    public function edit_karyawan($id_kry){
        $data['judul']      = 'Edit Data Karayawan';
        $data['dep']        = $this->Md_master->get_dept();
        $data['ag']         = $this->Md_master->get_agama();
        $data['jbt']        = $this->Md_master->get_jabatan();
        $data['dvs']        = $this->Md_master->get_divisi();
        $data['pgk']        = $this->Md_master->get_pangkat();
        $data['unt']        = $this->Md_master->get_unit();
        $data['jkl']        = $this->Md_master->get_jk();
        $data['krj']        = $this->Md_master->get_kerja();
        $data['nkh']        = $this->Md_master->get_nikah();
        $data['name']       = $this->session->userdata('name');
        $data['kode']       = $this->Md_kode->kode_karyawan();
        $data['kry']        = $this->Md_karyawan->edit($id_kry);

        $this->load->view('admin/edit_karyawan', $data);
    }

    public function update_karyawan($id_kry){
        $this->Md_karyawan->val_karyawan();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_karyawan($id_kry);
        }
        else
        {
            $this->Md_karyawan->update($id_kry);
            $this->session->set_flashdata('update_sukses', 'Data karyawan berhasil diperbaharui');
            redirect('admin/karyawan');
        }
    }

    function detail_karyawan($id_kry){
        $data['judul']      = 'Detail Data Karayawan';
        $data['karyawan']   = $this->Md_karyawan->detail($id_kry);
        $where = array('id_kry' => $id_kry);

        $this->load->view('admin/detail_karyawan',$data);
    }

    // ===================================CRUD KARYAWAN END======================================== //

    // ===================================CRUD KARYAWAN BARU START================================== //
    
    public function permohonan(){
        $data['karyawan'] = $this->Md_permohonan->tampil();
        $data['judul']    = "Data Permohonan Karayawan";

        $this->load->view('admin/data_permohonan', $data);
    }

    public function add_permohonan(){
        $data['judul']   = 'Tambah Permohonan Karayawan';
        $data['idk']     = $this->Md_master->get_idk_pemohon();
        $data['dep']     = $this->Md_master->get_dept();
        $data['unt']     = $this->Md_master->get_unit();
        $data['jbt']     = $this->Md_master->get_jabatan();
        $data['jkl']     = $this->Md_master->get_jk();
        $data['krj']     = $this->Md_master->get_kerja();
        $data['pmh']     = $this->Md_master->get_permohonan();
        $data['rek']     = $this->Md_master->get_rekrutmen();
        $data['pdd']     = $this->Md_master->get_pendidikan();
        $data['name']    = $this->session->userdata('name');
        $data['kode']    = $this->Md_kode->kode_permohonan();

        $this->load->view('admin/add_permohonan',$data);
    }

    public function save_permohonan(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_pmhn', 'Kode Karyawan', ['required', 'is_unique[tb_karyawan_baru.id_pmhn]']);
        $this->Md_permohonan->val_permohonan();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_permohonan();
        }
        else
        {
            $this->Md_permohonan->simpan();
            $this->session->set_flashdata('input_sukses','Data Karyawan berhasil di input');
            redirect('admin/permohonan');
        }

    }

    public function delete_permohonan($id_pmhn){
        $this->Md_permohonan->hapus($id_pmhn);
        $this->session->set_flashdata('hapus_sukses','Data Karyawan berhasil di hapus');
        redirect('admin/permohonan');
    }

    public function edit_permohonan($id_pmhn){
        $data['judul']      = 'Edit Permohonan Karayawan';
        $data['dep']        = $this->Md_master->get_dept();
        $data['ag']         = $this->Md_master->get_agama();
        $data['unt']        = $this->Md_master->get_unit();
        $data['jbt']        = $this->Md_master->get_jabatan();
        $data['jbt2']       = $this->Md_master->get_jabatan();
        $data['jkl']        = $this->Md_master->get_jk();
        $data['krj']        = $this->Md_master->get_kerja();
        $data['pmh']        = $this->Md_master->get_permohonan();
        $data['rek']        = $this->Md_master->get_rekrutmen();
        $data['pdd']        = $this->Md_master->get_pendidikan();
        $data['name']       = $this->session->userdata('name');
        $data['kry_']       = $this->Md_permohonan->edit($id_pmhn);

        $this->load->view('admin/edit_permohonan', $data);
    }

    public function update_permohonan($id_pmhn){
        $this->Md_permohonan->val_permohonan();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_permohonan($id_pmhn);
        }
        else
        {
            $this->Md_permohonan->update($id_pmhn);
            $this->session->set_flashdata('update_sukses', 'Data karyawan berhasil diperbaharui');
            redirect('admin/permohonan');
        }
    }

    function detail_permohonan($id_pmhn){
        $data['judul']      = 'Detail Permohonan Karayawan';
        $data['karyawan']   = $this->Md_permohonan->detail($id_pmhn);
        $where = array('id_pmhn' => $id_pmhn);

        $this->load->view('admin/detail_permohonan',$data);
    }

    // ===================================CRUD KARYAWAN BARU END================================== //

    // ===================================CRUD PERCOBAAN START=================================== //
    
    public function percobaan(){
        $data['karyawan'] = $this->Md_percobaan->tampil();
        $data['judul']    = "Data Karyawan Percobaan";
 
        $this->load->view('admin/data_percobaan', $data);
    }
 
    function detail_percobaan($id_cb){
        $data['judul']      = 'DETAIL DATA KARYAWAN';
        $data['karyawan']   = $this->Md_percobaan->detail($id_cb);
        $where = array('id_cb' => $id_cb);
 
        $this->load->view('admin/detail_percobaan',$data);
    }
 
    public function add_percobaan(){
        $data['judul']   = 'Tambah Karyawan Percobaan';
        $data['idk']     = $this->Md_master->get_idk_karyawan_baru();
        $data['dep']     = $this->Md_master->get_dept();
        $data['jbt']     = $this->Md_master->get_jabatan();
        $data['krj']     = $this->Md_master->get_kerja();
        $data['name']    = $this->session->userdata('name');
        $data['kode']    = $this->Md_kode->kode_percobaan();
 
        $this->load->view('admin/add_percobaan',$data);
    }
 
    public function save_percobaan(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_cb', 'Kode Karyawan', ['required', 'is_unique[tb_percobaan.id_cb]']);
        $this->Md_percobaan->val_percobaan();
 
        if($this->form_validation->run() === FALSE)
        {
            $this->add_percobaan();
        }
        else
        {
            $this->Md_percobaan->simpan();
            $this->session->set_flashdata('input_sukses','Data Karyawan berhasil di input');
            redirect('admin/percobaan');
        }
    }
 
    public function delete_percobaan($id_cb){
        $this->Md_percobaan->hapus($id_cb);
        $this->session->set_flashdata('hapus_sukses','Data Karyawan berhasil di hapus');
        redirect('admin/percobaan');
    }
 
    public function edit_percobaan($id_cb){
        $data['judul']     = 'Edit Karyawan Percobaan';
        $data['dep']       = $this->Md_master->get_dept();
        $data['jbt']       = $this->Md_master->get_jabatan();
        $data['krj']       = $this->Md_master->get_kerja();
        $data['name']      = $this->session->userdata('name');;
        $data['karyawan']  = $this->Md_percobaan->edit($id_cb);
 
        $this->load->view('admin/edit_percobaan', $data);
    }
 
    public function update_percobaan($id_cb){
        $this->Md_percobaan->val_percobaan();
 
        if($this->form_validation->run() === FALSE)
        {
            $this->edit_percobaan($id_cb);
        }
        else
        {
            $this->Md_percobaan->update($id_cb);
            $this->session->set_flashdata('update_sukses', 'Data karyawan berhasil diperbaharui');
            redirect('admin/percobaan');
        }
    }
    
    // ===================================CRUD PERCOBAAN END=================================== //

    // ==================================CRUD PENILAIAN START================================= //
    
    public function penilaian(){
        $data['karyawan'] = $this->Md_penilaian->tampil();
        $data['judul']    = "Data Penilaian Karyawan";

        $this->load->view('admin/data_penilaian', $data);
    }

    function detail_penilaian($id){
        $data['judul']      = 'Detail Penilaian Karyawan';
        $data['karyawan']   = $this->Md_penilaian->detail($id);
        $where = array('id_nl' => $id);

        $this->load->view('admin/detail_penilaian',$data);
    }

    public function add_penilaian(){
        $data['judul']   = 'Tambah Penilaian Karyawan';
        $data['idk']     = $this->Md_master->get_idk_karyawan();
        $data['idp']     = $this->Md_master->get_idp();
        $data['kode']    = $this->Md_kode->kode_penilaian();
        $data['name']    = $this->session->userdata('name');

        $this->load->view('admin/add_penilaian',$data);
    }

    public function save_penilaian(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_nl', 'Kode Karyawan', ['required', 'is_unique[tb_penilaian.id_nl]']);
        $this->Md_penilaian->val_penilaian();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_penilaian();
        }
        else
        {
            $this->Md_penilaian->simpan();
            $this->session->set_flashdata('input_sukses','Data Karyawan berhasil di input');
            redirect('admin/penilaian');
        }
    }

    public function delete_penilaian($id){
        $this->Md_penilaian->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Karyawan berhasil di hapus');
        redirect('admin/penilaian');
    }

    public function edit_penilaian($id){
        $data['judul']      = 'Edit Penilaian Karyawan';
        $data['dep']        = $this->Md_master->get_dept();
        $data['jbt']        = $this->Md_master->get_jabatan();
        $data['jbt2']       = $this->Md_master->get_jabatan();
        $data['kode']       = $this->Md_kode->kode_penilaian();
        $data['name']       = $this->session->userdata('name');
        $data['karyawan']   = $this->Md_penilaian->edit($id);

        $this->load->view('admin/edit_penilaian', $data);
    }

    public function update_penilaian($id){
        $this->Md_penilaian->val_penilaian();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_penilaian($id);
        }
        else
        {
            $this->Md_penilaian->update($id);
            $this->session->set_flashdata('update_sukses', 'Data karyawan berhasil diperbaharui');
            redirect('admin/penilaian');
        }
    }

    // ===================================CRUD PENILAI END================================== //

    // ==================================CRUD TRAINING START================================= //
    
    public function training(){
        $data['karyawan'] = $this->Md_training->tampil();
        $data['judul']    = "Data Training Karyawan";
 
        $this->load->view('admin/data_training', $data);
    }
 
    function detail_training($id){
        $this->load->helper('nominal');
        $data['judul']      = 'Detail Training Karyawan';
        $data['karyawan']   = $this->Md_training->detail($id);
        $where = array('id_tr' => $id);
 
        $this->load->view('admin/detail_training',$data);
    }
 
    public function add_training(){
        $data['judul']   = 'Tambah Training Karyawan';
        $data['idk']     = $this->Md_master->get_idk_karyawan();
        $data['kode']    = $this->Md_kode->kode_training();
        $data['name']    = $this->session->userdata('name');
 
         $this->load->view('admin/add_training',$data);
     }
 
    public function save_training(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_tr', 'Kode Karyawan', ['required', 'is_unique[tb_training.id_tr]']);
 
        $this->Md_training->val_training();
 
        if($this->form_validation->run() === FALSE)
        {
            $this->add_training();
        }
        else
        {
            $this->Md_training->simpan();
            $this->session->set_flashdata('input_sukses','Data Karyawan berhasil di input');
            redirect('admin/training');
        }
    }
 
    public function delete_training($id){
        $this->Md_training->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Karyawan berhasil di hapus');
        redirect('admin/training');
    }
 
    public function edit_training($id){
        $data['judul']     = 'Edit Training Karyawan';
        $data['dep']       = $this->Md_master->get_dept();
        $data['jbt']       = $this->Md_master->get_jabatan();
        $data['kode']      = $this->Md_kode->kode_training();
        $data['name']      = $this->session->userdata('name');
        $data['kry']       = $this->Md_training->edit($id);
 
        $this->load->view('admin/edit_training', $data);
    }
 
    public function update_training($id_tr){
        $this->Md_training->val_training();
 
        if($this->form_validation->run() === FALSE)
        {
            $this->edit_training($id_tr);
        }
        else
        {
            $this->Md_training->update($id_tr);
            $this->session->set_flashdata('update_sukses', 'Data karyawan berhasil diperbaharui');
            redirect('admin/training');
        }
    }

     // ===================================CRUD TRAINING END================================== //

     // ==================================CRUD RESIGN START================================= //
    
    public function resign(){
        $data['karyawan'] = $this->Md_resign->tampil();
        $data['judul']    = "Data Karyawan Resign";
 
        $this->load->view('admin/data_resign', $data);
    }
 
    function detail_resign($id)
    {
        $data['judul']      = 'Detail Karyawan Resign';
        $data['karyawan']   = $this->Md_resign->detail($id);
        $where = array('id_rs' => $id);
 
        $this->load->view('admin/detail_resign',$data);
    }
 
    public function add_resign()
    {
        $data['judul']   = 'Tambah Karyawan Resign';
        $data['idk']     = $this->Md_master->get_idk_karyawan();
        $data['dep']     = $this->Md_master->get_dept();
        $data['jbt']     = $this->Md_master->get_jabatan();
        $data['pgk']     = $this->Md_master->get_pangkat();
        $data['kode']    = $this->Md_kode->kode_resign();
        $data['name']    = $this->session->userdata('name');
 
        $this->load->view('admin/add_resign',$data);
    }
 
    public function save_resign(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_rs', 'Kode Karyawan', ['required', 'is_unique[tb_resign.id_rs]']);
 
        $this->Md_resign->val_resign();
 
        if($this->form_validation->run() === FALSE)
        {
            $this->add_resign();
        }
        else
        {
            $this->Md_resign->simpan();
            $this->session->set_flashdata('input_sukses','Data Karyawan berhasil di input');
            redirect('admin/resign');
        }
    }
 
    public function delete_resign($id){
        $this->Md_resign->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Karyawan berhasil di hapus');
        redirect('admin/resign');
    }
 
    public function edit_resign($id){
        $data['judul']     = 'Edit Karyawan Resign';
        $data['idk']       = $this->Md_master->get_idk_karyawan();
        $data['dep']       = $this->Md_master->get_dept();
        $data['jbt']       = $this->Md_master->get_jabatan();
        $data['pgk']       = $this->Md_master->get_pangkat();
        $data['kode']      = $this->Md_kode->kode_resign();
        $data['name']      = $this->session->userdata('name');
        $data['kry']       = $this->Md_resign->edit($id);
 
        $this->load->view('admin/edit_resign', $data);
    }
 
    public function update_resign($id_rs){
        $this->Md_resign->val_resign();
 
        if($this->form_validation->run() === FALSE)
        {
            $this->edit_resign($id_rs);
        }
        else
        {
            $this->Md_resign->update($id_rs);
            $this->session->set_flashdata('update_sukses', 'Data karyawan berhasil diperbaharui');
            redirect('admin/resign');
        }
    }
 
    // ===================================CRUD RESIGN END================================== //
    // ===================================CRUD MAN POWER PLANNING START======================================== //

    public function mpp(){
        $data['kry']   = $this->Md_mpp->tampil();
        $data['judul'] = "Data Man Power Planning";

        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Success!!';
        }
        $data['_alert'] = $alert;

        $this->load->view('admin/data_mpp', $data);
    }

    public function add_mpp(){
        $data['judul']   = "Tambah Data Man Power Planning";
        $data['idk']     = $this->Md_master->get_idk_pemohon();
        $data['dep']     = $this->Md_master->get_dept();
        $data['area']    = $this->Md_master->get_unit();
        $data['jbt']     = $this->Md_master->get_jabatan();
        $data['jbt2']    = $this->Md_master->get_jabatan();
        $data['rek']     = $this->Md_master->get_rekrutmen();
        $data['name']    = $this->session->userdata('name');
        $data['kode']    = $this->Md_kode->kode_mpp();

        $this->load->view('admin/add_mpp',$data);
    }

    public function save_mpp(){
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_rules('id_pp', 'Kode MPP', ['required', 'is_unique[tb_mpp.id_pp]']);

        $this->Md_mpp->val_mpp();

        if($this->form_validation->run() === FALSE)
        {
            $this->add_mpp();
        }
        else
        {
            $this->Md_mpp->simpan();
            $this->session->set_flashdata('input_sukses','Data MPP berhasil di simpan');
            redirect('admin/mpp');
        }
    }

    public function delete_mpp($id_pp){
        $this->Md_mpp->hapus($id_pp);
        $this->session->set_flashdata('hapus_sukses','Data MPP berhasil di hapus');
        redirect('admin/mpp');
    }

    public function edit_mpp($id_pp){
        $data['judul']   = 'Edit Data Man Power Planning';
        $data['idk']     = $this->Md_master->get_idk_pemohon();
        $data['dep']     = $this->Md_master->get_dept();
        $data['area']    = $this->Md_master->get_unit();
        $data['jbt']     = $this->Md_master->get_jabatan();
        $data['jbt2']    = $this->Md_master->get_jabatan();
        $data['rek']     = $this->Md_master->get_rekrutmen();
        $data['pie_data']= $this->Md_master->get_pie();
        $data['name']    = $this->session->userdata('name');
        $data['kode']    = $this->Md_kode->kode_mpp();
        $data['kry']     = $this->Md_mpp->edit($id_pp);

        $this->load->view('admin/edit_mpp', $data);
    }

    public function update_mpp($id_pp){
        $this->Md_mpp->val_mpp();

        if($this->form_validation->run() === FALSE)
        {
            $this->edit_mpp($id_pp);
        }
        else
        {
            $this->Md_mpp->update($id_pp);
            $this->session->set_flashdata('update_sukses', 'Data MPP berhasil diperbaharui');
            redirect('admin/mpp');
        }
    }

    function detail_mpp($id_pp){
        $data['judul']  = 'Detail Data Man Power Planning';
        $data['kry']    = $this->Md_mpp->detail($id_pp);
        $where = array('id_pp' => $id_pp);

        $this->load->view('admin/detail_mpp',$data);
    }

    // ===================================CRUD MAN POWER PLANNING END======================================== //


	public function struktur_pusat(){
        $data['judul']     = 'Struktur Organisasi Pusat';
		$this->load->view('admin/struktur_pusat',$data);
	}

	public function struktur_cabang(){
        $data['judul']     = 'Struktur Organisasi Cabang';
		$this->load->view('admin/struktur_cabang',$data);
    }

    public function grafik_karyawan(){
        $data['judul']     = 'Pie Chart Karyawan';
		$data['graph']     = $this->Md_master->get_pie();
		$this->load->view('admin/grafik_karyawan', $data);
    }
    
    public function grafik_dep(){
        $data['judul']     = 'Grafik Permintaan per Departemen';
		$data['graph']     = $this->Md_master->get_column();
		$this->load->view('admin/grafik_dep', $data);
    }
    // -------------------------------------START UPLOAD DATA-------------------------------------//

    public function upload_karyawan(){
        $fileName = $this->input->post('file', TRUE);
      
        $config['upload_path']   = './uploads/excel/'; 
        $config['file_name']     = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size']      = 10000;
      
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
            redirect('admin/karyawan'); 
        } 
        
        else {
            $media = $this->upload->data();
            $inputFileName = 'uploads/excel/'.$media['file_name'];
         
        try {
            $inputFileType  = IOFactory::identify($inputFileName);
            $objReader      = IOFactory::createReader($inputFileType);
            $objPHPExcel    = $objReader->load($inputFileName);
        }  
         
        catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
      
            $sheet          = $objPHPExcel->getSheet(0);
            $highestRow     = $sheet->getHighestRow();
            $highestColumn  = $sheet->getHighestColumn();
      
        for ($row = 2; $row <= $highestRow; $row++){  
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
            $data = array(
                "id_kry"            => $rowData[0][0],
                "nama_kry"          => $rowData[0][1],
                "nik_kry"           => $rowData[0][2],
                "jabatan_kry"       => $rowData[0][3],
                "pangkat_kry"       => $rowData[0][4],
                "divisi_kry"        => $rowData[0][5],
                "dep_kry"           => $rowData[0][6],
                "lokasi_kry"        => $rowData[0][7],
                "panggilan_kry"     => $rowData[0][8],
                "identitas_kry"     => $rowData[0][9],
                "jk_kry"            => $rowData[0][10],
                "tempat_lahir_kry"  => $rowData[0][11],
                "tgl_lahir_kry"     => $rowData[0][12],
                "negara_kry"        => $rowData[0][13],
                "agama_kry"         => $rowData[0][14],
                "npwp_kry"          => $rowData[0][15],
                "alamat_kry"        => $rowData[0][16],
                "tlp_rumah_kry"     => $rowData[0][17],
                "no_hp_kry"         => $rowData[0][18],
                "tgl_masuk_kry"     => $rowData[0][19],
                "status_kerja_kry"  => $rowData[0][20],
                "status_nikah_kry"  => $rowData[0][21],
                "email_kry"         => $rowData[0][22]
            );
            $this->db->insert("tb_karyawan",$data);
        } 
            $this->session->set_flashdata('msg','Data Berhasil Diupload ...!!'); 
            redirect('admin/karyawan');
        }  
    }

    public function upload_permohonan(){
        $fileName = $this->input->post('file', TRUE);
      
        $config['upload_path']   = './uploads/excel/'; 
        $config['file_name']     = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size']      = 10000;
      
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
            redirect('admin/permohonan'); 
        } 
        
        else {
            $media = $this->upload->data();
            $inputFileName = 'uploads/excel/'.$media['file_name'];
         
        try {
            $inputFileType  = IOFactory::identify($inputFileName);
            $objReader      = IOFactory::createReader($inputFileType);
            $objPHPExcel    = $objReader->load($inputFileName);
        }  
         
        catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
      
            $sheet          = $objPHPExcel->getSheet(0);
            $highestRow     = $sheet->getHighestRow();
            $highestColumn  = $sheet->getHighestColumn();
      
        for ($row = 2; $row <= $highestRow; $row++){  
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
            $data = array(
                "id_pmhn"               => $rowData[0][0],
                "dep_pmhn"              => $rowData[0][1],
                "nama_pemohon_pmhn"     => $rowData[0][2],
                "jabatan_pemohon_pmhn"  => $rowData[0][3],
                "jabatan_pmhn"          => $rowData[0][4],
                "lokasi_pmhn"           => $rowData[0][5],
                "waktu_pmhn"            => $rowData[0][6],
                "status_kerja_pmhn"     => $rowData[0][7],
                "jumlah_pmhn"           => $rowData[0][8],
                "tanggal_pmhn"          => $rowData[0][9],
                "dasar_permohonan_pmhn" => $rowData[0][10],
                "sumber_rekrutmen_pmhn" => $rowData[0][11],
                "ringkasan_tugas_pmhn"  => $rowData[0][12],
                "gajih_pmhn"            => $rowData[0][13],
                "jk_pmhn"               => $rowData[0][14],
                "usia_pmhn"             => $rowData[0][15],
                "pendidikan_pmhn"       => $rowData[0][16],
                "jurusan_pmhn"          => $rowData[0][17],
                "pengalaman_kerja_pmhn" => $rowData[0][18],
                "bidang_pmhn"           => $rowData[0][19],
                "syarat_lain_pmhn"      => $rowData[0][20],
                "keterampilan_pmhn"     => $rowData[0][21],
                "tgl_bergabung_pmhn"    => $rowData[0][22],
                "office_equipment_pmhn" => $rowData[0][23]
            );
            $this->db->insert("tb_karyawan_baru",$data);
        } 
            $this->session->set_flashdata('msg','Data Berhasil Diupload ...!!'); 
            redirect('admin/permohonan');
        }  
    }

    public function upload_percobaan(){
        $fileName = $this->input->post('file', TRUE);
      
        $config['upload_path']   = './uploads/excel/'; 
        $config['file_name']     = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size']      = 10000;;
      
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
            redirect('admin/percobaan'); 
        } 
        
        else {
            $media = $this->upload->data();
            $inputFileName = 'uploads/excel/'.$media['file_name'];
         
        try {
            $inputFileType  = IOFactory::identify($inputFileName);
            $objReader      = IOFactory::createReader($inputFileType);
            $objPHPExcel    = $objReader->load($inputFileName);
        }  
         
        catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
      
            $sheet          = $objPHPExcel->getSheet(0);
            $highestRow     = $sheet->getHighestRow();
            $highestColumn  = $sheet->getHighestColumn();
      
        for ($row = 2; $row <= $highestRow; $row++){  
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
            $data = array(
                "id_cb"             => $rowData[0][0],
                "nama_cb"           => $rowData[0][1],
                "nik_cb"            => $rowData[0][2],
                "dep_cb"            => $rowData[0][3],
                "jabatan_cb"        => $rowData[0][4],
                "tgl_masuk_cb"      => $rowData[0][5],
                "jenis_cb"          => $rowData[0][6],
                "tgl_mulai_cb"      => $rowData[0][7],
                "tgl_selesai_cb"    => $rowData[0][8],
                "percobaan_cb"      => $rowData[0][9],
                "catatan_hr_cb"     => $rowData[0][10],
                "catatan_atasan_cb" => $rowData[0][11]
            );
            $this->db->insert("tb_percobaan",$data);
        } 
            $this->session->set_flashdata('msg','Data Berhasil Diupload ...!!'); 
            redirect('admin/percobaan');
        }  
    }

    public function upload_penilaian(){
        $fileName = $this->input->post('file', TRUE);
      
        $config['upload_path']   = './uploads/excel/'; 
        $config['file_name']     = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size']      = 10000;;
      
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
            redirect('admin/penilaian'); 
        } 
        
        else {
            $media = $this->upload->data();
            $inputFileName = 'uploads/excel/'.$media['file_name'];
         
        try {
            $inputFileType  = IOFactory::identify($inputFileName);
            $objReader      = IOFactory::createReader($inputFileType);
            $objPHPExcel    = $objReader->load($inputFileName);
        }  
         
        catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
      
            $sheet          = $objPHPExcel->getSheet(0);
            $highestRow     = $sheet->getHighestRow();
            $highestColumn  = $sheet->getHighestColumn();
      
        for ($row = 2; $row <= $highestRow; $row++){  
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
            $data = array(
                "id_nl"               => $rowData[0][0],
                "nama_nl"             => $rowData[0][1],
                "nik_nl"              => $rowData[0][2],
                "dep_nl"              => $rowData[0][3],
                "tgl_masuk_nl"        => $rowData[0][4],
                "jabatan_nl"          => $rowData[0][5],
                "nama_penilai_nl"     => $rowData[0][6],
                "jabatan_penilai_nl"  => $rowData[0][7]
        );
            $this->db->insert("tb_penilaian",$data);
        } 
            $this->session->set_flashdata('msg','Data Berhasil Diupload ...!!'); 
            redirect('admin/penilaian');
        }  
    }

    public function upload_training(){
        $fileName = $this->input->post('file', TRUE);
      
        $config['upload_path']   = './uploads/excel/'; 
        $config['file_name']     = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size']      = 10000;
      
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
            redirect('admin/training'); 
        } 
        
        else {
            $media = $this->upload->data();
            $inputFileName = 'uploads/excel/'.$media['file_name'];
         
        try {
            $inputFileType  = IOFactory::identify($inputFileName);
            $objReader      = IOFactory::createReader($inputFileType);
            $objPHPExcel    = $objReader->load($inputFileName);
        }  
         
        catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
      
            $sheet          = $objPHPExcel->getSheet(0);
            $highestRow     = $sheet->getHighestRow();
            $highestColumn  = $sheet->getHighestColumn();
      
        for ($row = 2; $row <= $highestRow; $row++){  
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
            $data = array(
                "id_tr"                  => $rowData[0][0],
                "nama_pemohon_tr"        => $rowData[0][1],
                "jabatan_pemohon_tr"     => $rowData[0][2],
                "dep_pemohon_tr"         => $rowData[0][3],
                "tgl_permohonan_tr"      => $rowData[0][4],
                "judul_training_tr"      => $rowData[0][5],
                "penyelenggara_tr"       => $rowData[0][6],
                "tgl_pelaksanaan_tr"     => $rowData[0][7],
                "tempat_pelaksanaan_tr"  => $rowData[0][8],
                "biaya_tr"               => $rowData[0][9],
                "pembayaran_tr"          => $rowData[0][10],
                "tgl_terima"             => $rowData[0][11],
                "tgl_bayar_tr"           => $rowData[0][12]
            );
            $this->db->insert("tb_training",$data);
        } 
            $this->session->set_flashdata('msg','Data Berhasil Diupload ...!!'); 
            redirect('admin/training');
        }  
    }

    public function upload_resign(){
        $fileName = $this->input->post('file', TRUE);
      
        $config['upload_path']   = './uploads/excel/'; 
        $config['file_name']     = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size']      = 10000;
      
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
            redirect('admin/resign'); 
        } 
        
        else {
            $media = $this->upload->data();
            $inputFileName = 'uploads/excel/'.$media['file_name'];
         
        try {
            $inputFileType  = IOFactory::identify($inputFileName);
            $objReader      = IOFactory::createReader($inputFileType);
            $objPHPExcel    = $objReader->load($inputFileName);
        }  
         
        catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
      
            $sheet          = $objPHPExcel->getSheet(0);
            $highestRow     = $sheet->getHighestRow();
            $highestColumn  = $sheet->getHighestColumn();
      
        for ($row = 2; $row <= $highestRow; $row++){  
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
            $data = array(
                "id_rs"          => $rowData[0][0],
                "bulan_rs"       => $rowData[0][1],
                "nama_rs"        => $rowData[0][2],
                "pangkat_rs"     => $rowData[0][3],
                "jabatan_rs"     => $rowData[0][4],
                "dep_rs"         => $rowData[0][5],
                "tgl_masuk_rs"   => $rowData[0][6],
                "tgl_resign_rs"  => $rowData[0][7],
                "masa_bulan_rs"  => $rowData[0][8],
                "masa_tahun_rs"  => $rowData[0][9],
                "keterangan_rs"  => $rowData[0][10]
            );
            $this->db->insert("tb_resign",$data);
        } 
            $this->session->set_flashdata('msg','Data Berhasil Diupload ...!!'); 
            redirect('admin/resign');
        }  
    }

    public function upload_mpp(){
        $fileName = $this->input->post('file', TRUE);
      
        $config['upload_path']   = './uploads/excel/'; 
        $config['file_name']     = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size']      = 10000;
      
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
            redirect('admin/mpp'); 
        } 
        
        else {
            $media = $this->upload->data();
            $inputFileName = 'uploads/excel/'.$media['file_name'];
         
        try {
            $inputFileType  = IOFactory::identify($inputFileName);
            $objReader      = IOFactory::createReader($inputFileType);
            $objPHPExcel    = $objReader->load($inputFileName);
        }  
         
        catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
      
            $sheet          = $objPHPExcel->getSheet(0);
            $highestRow     = $sheet->getHighestRow();
            $highestColumn  = $sheet->getHighestColumn();
      
        for ($row = 2; $row <= $highestRow; $row++){  
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
            $data = array(
                "id_pp"             => $rowData[0][0],
                "jabatan_pp"        => $rowData[0][1],
                "dep_pp"            => $rowData[0][2],
                "status_pp"         => $rowData[0][3],
                "jml_butuh_pp"      => $rowData[0][4],
                "sisa_pp"           => $rowData[0][5],
                "nama_pmh_pp"       => $rowData[0][6],
                "jabatan_pmh_pp"    => $rowData[0][7],
                "tgl_pmh_pp"        => $rowData[0][8],
                "tgl_tempo_pp"      => $rowData[0][9],
                "tgl_wawancara_pp"  => $rowData[0][10],
                "tgl_pmnh_pp"       => $rowData[0][11],
                "kcp_pmnh_pp"       => $rowData[0][12],
                "total_pp"          => $rowData[0][13],
                "sumber_rek_pp"     => $rowData[0][14],
                "ket_pp"            => $rowData[0][15]
            );
            $this->db->insert("tb_mpp",$data);
        } 
            $this->session->set_flashdata('msg','Data Berhasil Diupload ...!!'); 
            redirect('admin/mpp');
        }  
    }

    // -------------------------------------END UPLOAD DATA-------------------------------------//

    // ------------------------------------- xxPERMOHONANxx--------------------------------------//
    
    // ======================================= CUTI START ============================= //
   
    public function cuti(){
        $data['cuti']   = $this->Md_cuti->tampil_all();
        $data['judul']  = "Permohonan Cuti";

        $this->load->view('admin/data_cuti', $data);
    } 

    public function add_cuti(){
        $data['judul']  = 'Tambah Data Cuti';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['divisi'] = $this->Md_master->get_divisi();
        $data['kode']   = $this->Md_kode->kode_cuti();
        $data['name']   = $this->session->userdata('name');

        $this->load->view('admin/add_cuti', $data);
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
            redirect('admin/cuti');
        }
    }

    public function edit_cuti($id){
        $data['judul']  = 'Edit Data Cuti';
        $data['kode']   = $this->Md_kode->kode_cuti();
        $data['name']   = $this->session->userdata('name');
        $data['cuti']   = $this->Md_cuti->edit($id);

        $this->load->view('admin/edit_cuti', $data);
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
            redirect('admin/cuti');
        }
    }

    function detail_cuti($id){
        $data['judul']  = 'Detail Permohonan Cuti';
        $data['cuti']   = $this->Md_cuti->detail($id);
        $where = array('id_ct' => $id);

        $this->load->view('admin/detail_cuti',$data);
    }

    public function delete_cuti($id){
        $this->Md_cuti->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Cuti berhasil di hapus');
        redirect('admin/cuti');
    }

    // ====================================================== CUTI END ============================= //

    // ====================================================== IZIN START ============================= //

    public function izin(){
        $data['izin']  = $this->Md_izin->tampil_all();
        $data['judul'] = "Permohonan Izin";

        $this->load->view('admin/data_izin', $data);
    }

    public function add_izin(){
        $data['judul']  = 'Tambah Data Izin';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['kode']   = $this->Md_kode->kode_izin();
        $data['name']   = $this->session->userdata('name');

        $this->load->view('admin/add_izin', $data);
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
            redirect('admin/izin');
        }
    }

    public function edit_izin($id){
        $data['judul']  = 'Edit Permohonan Izin';
        $data['kode']   = $this->Md_kode->kode_izin();
        $data['name']   = $this->session->userdata('name');
        $data['izin']   = $this->Md_izin->edit($id);

        $this->load->view('admin/edit_izin', $data);
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
            redirect('admin/izin');
        }
    }

    function detail_izin($id){
        $data['judul']  = 'Detail Permohonan Izin';
        $data['izin']   = $this->Md_izin->detail($id);
        $where = array('id_izn' => $id);

        $this->load->view('admin/detail_izin',$data);
    }

    public function delete_izin($id){
        $this->Md_izin->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Izin berhasil di hapus');
        redirect('admin/izin');
    }

    // ====================================================== IZIN END ============================= //

    // ====================================================== SAKIT START ============================= //

    public function sakit(){
        $data['sakit']  = $this->Md_sakit->tampil_all();
        $data['judul']  = "Permohonan Sakit";

        $this->load->view('admin/data_sakit', $data);
    }

    public function add_sakit(){
		$data['judul']  = 'Tambah Data Sakit';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['kode']   = $this->Md_kode->kode_sakit();
        $data['name']   = $this->session->userdata('name');
		
		$this->load->view('admin/add_sakit', $data);
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
	
				redirect('admin/sakit'); 
				$data['message'] = $upload['error'];
			}
        }
        else{
            $this->Md_sakit->simpan($upload);
            $this->session->set_flashdata('input_sukses','Data jabatan berhasil di input');
            redirect('admin/sakit');
        }
    }

    public function detail_sakit($id){
        $data['judul']  = 'Detail Permohonan Sakit';
        $data['sakit']   = $this->Md_sakit->detail($id);
        $where = array('id_skt' => $id);

        $this->load->view('admin/detail_sakit',$data);
    }

    public function delete_sakit($id){
        $this->Md_sakit->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Sakit berhasil di hapus');
        redirect('admin/sakit');
    }

    // ====================================================== SAKIT END ============================= //

    // ====================================================== RESIGN START ============================= //

    // public function add_resign(){
    //     $data['judul']  = 'Tambah Data resign';
    //     $data['rsg']    = $this->Md_master->get_karyawan();
    //     $data['kode']   = $this->Md_kode->kode_resign();
    //     $data['name']   = $this->session->userdata('name');

    //     $this->load->view('admin/add_resign', $data);
    // }

    // public function save_resign(){
    //     $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
    //     $this->form_validation->set_rules('id_rsg', 'Kode resign', ['required', 'is_unique[tb_resign.id_rsg]']);
    //     $this->Md_resign->val_resign();

    //     if($this->form_validation->run() === FALSE)
    //     {
    //         $this->add_resign();
    //     }
    //     else
    //     {
    //         $this->Md_resign->simpan();
    //         $this->session->set_flashdata('input_sukses','Data Resign berhasil di input');
    //         redirect('admin/resign');
    //     }
    // }

    // function detail_resign($id){
    //     $data['judul']  = 'Detail Permohonan Resign';
    //     $data['resign']   = $this->Md_resign->detail($id);
    //     $where = array('id_rsg' => $id);

    //     $this->load->view('admin/detail_resign',$data);
    // }

    // ====================================================== RESIGN START ============================= //
    // ====================================================== LEMBUR START ============================= //
   
    public function lembur(){
        $data['lembur'] = $this->Md_lembur->tampil_all();
        $data['judul']  = "Permohonan Lembur";

        $this->load->view('admin/data_lembur', $data);
    } 

    public function add_lembur(){
        $data['judul']  = 'Tambah Data Lembur';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['kode']   = $this->Md_kode->kode_lembur();
        $data['name']   = $this->session->userdata('name');

        $this->load->view('admin/add_lembur', $data);
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
            redirect('admin/lembur');
        }
    }

    public function edit_lembur($id){
        $data['judul']  = 'Edit Permohonan Lembur';
        $data['kode']   = $this->Md_kode->kode_lembur();
        $data['name']   = $this->session->userdata('name');
        $data['lembur']  = $this->Md_lembur->edit($id);

        $this->load->view('admin/edit_lembur', $data);
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
            redirect('admin/lembur');
        }
    }

    function detail_lembur($id){
        $data['judul']  = 'Detail Permohonan Lembur';
        $data['lembur'] = $this->Md_lembur->detail($id);
        $where = array('id_ot' => $id);

        $this->load->view('admin/detail_lembur',$data);
    }

    public function delete_lembur($id){
        $this->Md_lembur->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Lembur berhasil di hapus');
        redirect('admin/lembur');
    }
    
    // ====================================================== LEMBUR END ============================= //

    // ====================================================== DINAS START ============================= //
   
    public function dinas(){
        $data['dinas'] = $this->Md_dinas->tampil_all();
        $data['judul'] = "Permohonan Perjalanan Dinas";

        $this->load->view('admin/data_dinas', $data);
    } 

    public function add_dinas(){
        $data['judul']  = 'Tambah Data Perjalanan Dinas';
        $data['pjs']    = $this->Md_master->get_pjs();
        $data['kode']   = $this->Md_kode->kode_dinas();
        $data['name']   = $this->session->userdata('name');

        $this->load->view('admin/add_dinas', $data);
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
            redirect('admin/dinas');
        }
    }

    public function edit_dinas($id){
        $data['judul']  = 'Edit Permohonan Perjalanan Dinas';
        $data['kode']   = $this->Md_kode->kode_dinas();
        $data['name']   = $this->session->userdata('name');
        $data['dinas']  = $this->Md_dinas->edit($id);

        $this->load->view('admin/edit_dinas', $data);
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
            redirect('admin/dinas');
        }
    }

    function detail_dinas($id){
        $data['judul']  = 'Detail Permohonan Perjalanan Dinas';
        $data['dinas'] = $this->Md_dinas->detail($id);
        $where = array('id_dns' => $id);

        $this->load->view('admin/detail_dinas',$data);
    }

    public function delete_dinas($id){
        $this->Md_dinas->hapus($id);
        $this->session->set_flashdata('hapus_sukses','Data Perjalanan Dinas berhasil di hapus');
        redirect('admin/dinas');
    }
    
    // ====================================== LEMBUR END ============================= //

    // ------------------------------------- xxPERMOHONANxx--------------------------------------//


    // -------------------------------------START NOTIFIKASI-------------------------------------//
    public function notifikasi(){
        $data['judul'] = 'Info Data Karyawan Baru';
        $data['jbt']   = $this->Md_master->get_jabatan();
        $data['idn']   = $this->Md_master->get_idk_karyawan();
        $data['name']  = $this->session->userdata('name');
 
        $this->load->view('admin/inf_notifikasi',$data);
    }

    public function send(){
		$subject   = 'Data Karyawan Baru - ' . $this->input->post("nama");
		$file_data = $this->upload_file();
		if(is_array($file_data))
		{
			$message = '
			<h3 align="center">INFO KARYAWAN BARU</h3>
				<table border="1" width="100%" cellpadding="5">
					<tr>
						<td width="30%">Nama Karyawan</td>
						<td width="70%">'.$this->input->post("nama").'</td>
                    </tr>
                    <tr>
						<td width="30%">NIK</td>
						<td width="70%">'.$this->input->post("nik").'</td>
                    </tr>
                    <tr>
						<td width="30%">Jabatan</td>
						<td width="70%">'.$this->input->post("jabatan").'</td>
					</tr>
                    <tr>
						<td width="30%">Tanggal Lahir</td>
						<td width="70%">'.$this->input->post("tgl_lahir").'</td>
                    </tr>
                    <tr>
						<td width="30%">No. Handphone</td>
						<td width="70%">'.$this->input->post("hp").'</td>
					</tr>
					<tr>
						<td width="30%">Email</td>
						<td width="70%">'.$this->input->post("email").'</td>
                    </tr>
					<tr>
						<td width="30%">Alamat</td>
						<td width="70%">'.$this->input->post("alamat").'</td>
					</tr>
                </table>
			';

			$config = Array(
		      	'protocol' 	=> 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
		      	'smtp_port' => 465,
		      	'smtp_user' => 'handrihmw@gmail.com', 
		      	'smtp_pass' => 'PASSWORD', 
		      	'mailtype' 	=> 'html',
		      	'charset' 	=> 'iso-8859-1',
		      	'wordwrap' 	=> TRUE
            );
            
		    $this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from($this->input->post("email"));
		    $this->email->to('handrihmw@gmail.com');
		    $this->email->subject($subject);
	        $this->email->message($message);
	        $this->email->attach($file_data['full_path']);
	        if($this->email->send())
	        {
	        	if(delete_files($file_data['file_path']))
	        	{
	        		$this->session->set_flashdata('message', 'Email notifikasi berhasil terkirim.');
	        		redirect('admin/notifikasi');
	        	}
	        }
	        else
	        {
	        	if(delete_files($file_data['file_path']))
	        	{
	        		$this->session->set_flashdata('message', 'Email notifikasi gagal dikirim!');
	        		redirect('admin/notifikasi');
	        	}
	        }
	    }
	    else
	    {
	    	$this->session->set_flashdata('message', 'Gagal upload data!');
	        redirect('admin/notifikasi');
	    }
	}

	function upload_file(){
		$config['upload_path']   = 'uploads/';
		$config['allowed_types'] = 'jpg|jpeg|doc|docx|pdf';
		$this->load->library('upload', $config);
		if($this->upload->do_upload('resume'))
		{
			return $this->upload->data();			
		}
		else
		{
			return $this->upload->display_errors();
		}
    }

    public function masa_kerja(){
         $data['judul'] = 'Info Masa Kerja Karyawan';
         $data['karyawan'] = $this->Md_percobaan->tampil_bulan();
         $data['name']  = $this->session->userdata('name');
 
         $this->load->view('admin/inf_masa_kerja',$data);
    }

    public function send_masa_kerja(){
        $karyawan = $this->Md_percobaan->tampil_bulan();
        $no = 1; foreach ($karyawan as $kry);
		$subject  = 'Info Masa Habis Kontrak - ' .bulan();
		{
			$message = '
			<h3 align="center">INFO MASA KERJA KARYAWAN</h3>        
                <table border="1" width="100%" cellpadding="2">
                    <thead style="background-color:#e9ecef;">
                        <tr style="text-align:center;">
                            <th>No.</th>
                            <th>Nama Karyawan</th>
                            <th>NIK</th>     
                            <th>Jabatan</th> 
                            <th>Jenis Percobaan</th> 
                            <th>Tanggal Mulai</th> 
							<th>Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="text-align:center;">
                            <td>'.$no.'</td>
                            <td>'.$kry->nama_cb.'</td>
                            <td>'.$kry->nik_cb.'</td>
                            <td>'.$kry->jabatan_cb.'</td>
                            <td>'.$kry->jenis_cb.'</td>
                            <td>'.$kry->tgl_mulai_cb.'</td>
							<td>'.$kry->tgl_selesai_cb.'</td>
                        </tr>
                    </tbody>
                </table>
            ';
            $no++;

			$config = Array(
		      	'protocol' 	=> 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
		      	'smtp_port' => 465,
		      	'smtp_user' => 'handrihmw@gmail.com', 
		      	'smtp_pass' => 'PASSWORD', 
		      	'mailtype' 	=> 'html',
		      	'charset' 	=> 'iso-8859-1',
		      	'wordwrap' 	=> TRUE
            );
            
		    $this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from($this->input->post("email"));
		    $this->email->to('handrihmw@gmail.com');
		    $this->email->subject($subject, $data);
	        $this->email->message($message, $data);
	        if($this->email->send())
	        {
	        	{
	        		$this->session->set_flashdata('message', 'Email notifikasi berhasil terkirim.');
	        		redirect('admin/masa_kerja');
	        	}
	        }
	        else
	        {
	        	{
	        		$this->session->set_flashdata('message', 'Email notifikasi gagal dikirim!');
	        		redirect('admin/masa_kerja');
	        	}
	        }
	    }
    }
    // -------------------------------------END NOTIFIKASI-------------------------------------//
}

// Created By: Handri Hermawan (@handrihmw)
// 'Semoga bisa memahami alur coding yang saya tulis.'
