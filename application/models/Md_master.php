<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Md_master extends CI_Model
{
    function get_karyawan_bykode($id_kry){
		$hsl = $this->db->query("SELECT * FROM tb_karyawan WHERE id_kry='$id_kry'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_kry' 		=> $data->id_kry,
					'nama_kry' 	    => $data->nama_kry,
					'nik_kry' 	    => $data->nik_kry,
					'dep_kry' 	    => $data->dep_kry,
					'pangkat_kry' 	=> $data->pangkat_kry,
                    'jabatan_kry' 	=> $data->jabatan_kry,
                    'tgl_masuk_kry' => $data->tgl_masuk_kry,
				);
			}
		}
		return $hasil;
    }

    function get_karyawan_notif_bykode($id_kry){
		$hsl = $this->db->query("SELECT * FROM tb_karyawan WHERE id_kry='$id_kry'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_kry' 		=> $data->id_kry,
					'nama_kry' 	    => $data->nama_kry,
					'nik_kry' 	    => $data->nik_kry,
                    'jabatan_kry' 	=> $data->jabatan_kry,
                    'tgl_lahir_kry' => $data->tgl_lahir_kry,
					'email_kry' 	=> $data->email_kry,
					'no_hp_kry' 	=> $data->no_hp_kry,
					'alamat_kry' 	=> $data->alamat_kry,
				);
			}
		}
		return $hasil;
    }

    function get_penilai_bykode($id_penilai){
		$hsl = $this->db->query("SELECT * FROM tb_penilai WHERE id_penilai='$id_penilai'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_penilai' 	  => $data->id_penilai,
                    'nama_penilai' 	  => $data->nama_penilai,
                    'nik_penilai' 	  => $data->nik_penilai,
					'jabatan_penilai' => $data->jabatan_penilai,
				);
			}
		}
		return $hasil;
    }

    function get_pemohon_bykode($id_pemohon){
		$hsl = $this->db->query("SELECT * FROM tb_pemohon WHERE id_pemohon='$id_pemohon'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_pemohon' 	  => $data->id_pemohon,
                    'nama_pemohon' 	  => $data->nama_pemohon,
                    'nik_pemohon' 	  => $data->nik_pemohon,
                    'jabatan_pemohon' => $data->jabatan_pemohon,
                    'dep_pemohon'     => $data->dep_pemohon,
				);
			}
		}
		return $hasil;
    }

    function get_pjs_bykode($id_kry){
		$hsl = $this->db->query("SELECT * FROM tb_karyawan WHERE id_kry='$id_kry'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_kry'     => $data->id_kry,
                    'nama_kry' 	 => $data->nama_kry,
                    'divisi_kry' => $data->divisi_kry,
				);
			}
		}
		return $hasil;
    }

    function get_cuti_bykode($id_kry){
		$hsl=$this->db->query("SELECT * FROM tb_karyawan WHERE id_kry='$id_kry'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_kry'     => $data->id_kry,
					'nama_kry'   => $data->nama_kry,
					'divisi_kry' => $data->divisi_kry,
				);
			}
		}
		return $hasil;
	}

    function get_pjs(){
        $this->db->where('pangkat_kry', 'MANAGER');
        $query = $this->db->get('tb_karyawan');
        return $query->result();
    }

    function search_nama($nama_kry){
		$this->db->like('nama_kry', $nama_kry , 'both');
		$this->db->order_by('nama_kry', 'ASC');
		$this->db->limit(10);
		return $this->db->get('tb_karyawan')->result();
	}
    
    function get_idk(){
        $this->db->where('pangkat_kry', 'STAFF');
        $this->db->or_where('pangkat_kry', 'OPERATOR');
        $query = $this->db->get('tb_karyawan');
        return $query->result();
    }

    function get_karyawan(){
        $query = $this->db->get('tb_karyawan');
        return $query->result();
    }

    function get_idk_karyawan(){
        $query = $this->db->get('tb_karyawan');
        return $query->result();
    }

    function get_idk_karyawan_baru(){
        $query = $this->db->get('tb_karyawan_baru');
        return $query->result();
    }

    function get_idk_penilai(){
        $this->db->where('pangkat_kry', 'MANAGER');
        $query = $this->db->get('tb_karyawan');
        return $query->result();
    }

    function get_idk_pemohon(){
        //$this->db->where('pangkat', 'MANAGER');
        $query = $this->db->get('tb_karyawan');
        return $query->result();
    }

    function get_idp(){
        // $this->db->where('jabatan_penilai', 'PRODUCT MANAGER');
        // $query = $this->db->get('tb_penilai');
        // return $query->result();
        return $this->db->from('tb_penilai')->get()->result();
    }

    public function get_dept(){
        return $this->db->from('tb_departemen')->get()->result();
    }

    public function get_jabatan(){
        return $this->db->from('tb_jabatan')->get()->result();
    }

    public function get_level(){
        return $this->db->from('tb_level')->get()->result();
    }

    public function get_divisi(){
        return $this->db->from('tb_divisi')->get()->result();
    }

    public function get_pangkat(){
        return $this->db->from('tb_pangkat')->get()->result();
    }

    public function get_unit(){
        return $this->db->from('tb_unit')->get()->result();
    }

    public function get_agama(){
        return $this->db->from('tb_agama')->get()->result();
    }

    public function get_jk(){
        return $this->db->from('tb_jk')->get()->result();
    }

    public function get_kerja(){
        return $this->db->from('tb_kerja')->get()->result();
    }

    public function get_nikah(){
        return $this->db->from('tb_nikah')->get()->result();
    }

    public function get_permohonan(){
        return $this->db->from('tb_permohonan')->get()->result();
    }

    public function get_rekrutmen(){
        return $this->db->from('tb_rekrutmen')->get()->result();
    }

    public function get_pendidikan(){
        return $this->db->from('tb_pendidikan')->get()->result();
    }

    // Total Row Data
    public function per_dep(){
        $query = $this->db->select('dep_kry, COUNT(dep_kry) as jumlah');
        $query = $this->db->group_by('dep_kry');  
        $query = $this->db->get('tb_karyawan', 10);
        return $query->result();
    }

    public function per_area(){
        $query = $this->db->select('lokasi_kry, COUNT(lokasi_kry) as jumlah');
        $query = $this->db->join('tb_unit', 'tb_karyawan.lokasi_kry = tb_unit.unit');
        $query = $this->db->group_by('lokasi_kry');  
        $query = $this->db->get('tb_karyawan', 10);
        return $query->result();
    }

    public function per_jenis(){
        $query = $this->db->select('dasar_permohonan_pmhn, COUNT(dasar_permohonan_pmhn) as jumlah');
        $query = $this->db->group_by('dasar_permohonan_pmhn');  
        $query = $this->db->get('tb_karyawan_baru', 10);
        return $query->result();
    }

    public function get_pie(){
        $query = $this->db->select('dep_kry, COUNT(dep_kry) as jumlah');
        $query = $this->db->group_by('dep_kry');  
        $query = $this->db->get('tb_karyawan', 10);
        return $query->result();;
    }

    public function get_column(){
        $query = $this->db->select('dep_kry, COUNT(dep_kry) as jumlah');
        $query = $this->db->group_by('dep_kry');  
        $query = $this->db->get('tb_karyawan', 10);
        return $query->result();;
    }

    function statistik_pengunjung()
    {
    
    // $sql = $this->db->query("select
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=1)AND (YEAR(date)=2018))),0) AS `Januari`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=2)AND (YEAR(date)=2018))),0) AS `Februari`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=3)AND (YEAR(date)=2018))),0) AS `Maret`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=4)AND (YEAR(date)=2018))),0) AS `April`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=5)AND (YEAR(date)=2018))),0) AS `Mei`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=6)AND (YEAR(date)=2018))),0) AS `Juni`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=7)AND (YEAR(date)=2018))),0) AS `Juli`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=8)AND (YEAR(date)=2018))),0) AS `Agustus`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=9)AND (YEAR(date)=2018))),0) AS `September`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=10)AND (YEAR(date)=2018))),0) AS `Oktober`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=11)AND (YEAR(date)=2018))),0) AS `November`,
    //                         ifnull((SELECT count(ip) FROM (tb_counter)WHERE((Month(date)=12)AND (YEAR(date)=2018))),0) AS `Desember`
    //                         from tb_counter GROUP BY YEAR(date) 
    // ");
    //     return $sql;
    $sql = $this->db->query("select
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=1)AND (YEAR(tgl_resign_rs)=2018))),0) AS `Januari`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=2)AND (YEAR(tgl_resign_rs)=2018))),0) AS `Februari`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=3)AND (YEAR(tgl_resign_rs)=2018))),0) AS `Maret`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=4)AND (YEAR(tgl_resign_rs)=2018))),0) AS `April`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=5)AND (YEAR(tgl_resign_rs)=2018))),0) AS `Mei`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=6)AND (YEAR(tgl_resign_rs)=2018))),0) AS `Juni`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=7)AND (YEAR(tgl_resign_rs)=2018))),0) AS `Juli`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=8)AND (YEAR(tgl_resign_rs)=2018))),0) AS `Agustus`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=9)AND (YEAR(tgl_resign_rs)=2018))),0) AS `September`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=10)AND (YEAR(tgl_resign_rs)=2018))),0) AS `Oktober`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=11)AND (YEAR(tgl_resign_rs)=2018))),0) AS `November`,
                            ifnull((SELECT count(nama_rs) FROM (tb_resign)WHERE((Month(tgl_resign_rs)=12)AND (YEAR(tgl_resign_rs)=2018))),0) AS `Desember`
                            from tb_resign GROUP BY YEAR(tgl_resign_rs) 
    ");
        return $sql;
    } 
}