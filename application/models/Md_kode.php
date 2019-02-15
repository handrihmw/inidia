<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Md_kode extends CI_Model 
    {
        function __construct(){
            parent:: __construct();
        }

        public function kode_departemen(){
            $this->db->select('RIGHT(tb_departemen.id,4) as kode', FALSE);
            $this->db->order_by('id','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_departemen');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "DPT-".$kodemax; 
            return $kodejadi;  
        }
        
        public function kode_divisi(){
            $this->db->select('RIGHT(tb_divisi.id,4) as kode', FALSE);
            $this->db->order_by('id','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_divisi');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "DVS-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_jabatan(){
            $this->db->select('RIGHT(tb_jabatan.id,4) as kode', FALSE);
            $this->db->order_by('id','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_jabatan');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "JBT-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_pangkat(){
            $this->db->select('RIGHT(tb_pangkat.id,4) as kode', FALSE);
            $this->db->order_by('id','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_pangkat');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "PGK-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_user(){
            $this->db->select('RIGHT(tb_user.id,4) as kode', FALSE);
            $this->db->order_by('id','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_user');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "USR-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_karyawan(){
            $this->db->select('RIGHT(tb_karyawan.id_kry,4) as kode', FALSE);
            $this->db->order_by('id_kry','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_karyawan');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "EMP-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_permohonan(){
            $this->db->select('RIGHT(tb_karyawan_baru.id_pmhn,4) as kode', FALSE);
            $this->db->order_by('id_pmhn','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_karyawan_baru');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "NEW-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_percobaan(){
            $this->db->select('RIGHT(tb_percobaan.id_cb,4) as kode', FALSE);
            $this->db->order_by('id_cb','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_percobaan');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "TRY-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_penilaian(){
            $this->db->select('RIGHT(tb_penilaian.id_nl,4) as kode', FALSE);
            $this->db->order_by('id_nl','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_penilaian');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "ASM-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_penilai(){
            $this->db->select('RIGHT(tb_penilai.id_penilai,4) as kode', FALSE);
            $this->db->order_by('id_penilai','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_penilai');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "VER-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_pemohon(){
            $this->db->select('RIGHT(tb_pemohon.id_pemohon,4) as kode', FALSE);
            $this->db->order_by('id_pemohon','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_pemohon');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "ADJ-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_training(){
            $this->db->select('RIGHT(tb_training.id_tr,4) as kode', FALSE);
            $this->db->order_by('id_tr','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_training');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "TRY-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_resign(){
            $this->db->select('RIGHT(tb_resign.id_rs,4) as kode', FALSE);
            $this->db->order_by('id_rs','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_resign');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "RSG-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_mpp(){
            $this->db->select('RIGHT(tb_mpp.id_pp,4) as kode', FALSE);
            $this->db->order_by('id_pp','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_mpp');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "MPP-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_cuti(){
            $this->db->select('RIGHT(tb_cuti.id_ct,4) as kode', FALSE);
            $this->db->order_by('id_ct','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_cuti');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "CT-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_izin(){
            $this->db->select('RIGHT(tb_izin.id_izn,4) as kode', FALSE);
            $this->db->order_by('id_izn','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_izin');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "IZN-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_sakit(){
            $this->db->select('RIGHT(tb_sakit.id_skt,4) as kode', FALSE);
            $this->db->order_by('id_skt','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_sakit');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "SKT-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_lembur(){
            $this->db->select('RIGHT(tb_lembur.id_ot,4) as kode', FALSE);
            $this->db->order_by('id_ot','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_lembur');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "OT-".$kodemax; 
            return $kodejadi;  
        }

        public function kode_dinas(){
            $this->db->select('RIGHT(tb_dinas.id_dns,4) as kode', FALSE);
            $this->db->order_by('id_dns','DESC');    
            $this->db->limit(1);    
            
            $query = $this->db->get('tb_dinas');   
            
            if($query->num_rows() <> 0){         
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
            else {          
                $kode = 1;    
            }
                $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
                $kodejadi = "DNS-".$kodemax; 
            return $kodejadi;  
        }
    }
?>