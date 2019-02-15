<div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="<?php echo base_url() ?>assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span>Selamat Datang,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name"><strong><?php echo $this->session->userdata('name');?></strong></a>  
                    <span style="font-size: 12px;"><?php echo tanggal() ?></span>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h6 style="text-align:center;"><?php echo $this->Md_karyawan->get_total_dep(); ?>+</h6>
                        <small>Departement</small>                        
                    </div>
                    <div class="col-4">
                        <h6 style="text-align:center;"><?php echo $this->Md_karyawan->get_total_karyawan(); ?>+</h6>
                        <small>Karyawan</small>                        
                    </div>
                    <div class="col-4">                        
                        <h6 style="text-align:center;"><?php echo $this->Md_karyawan->get_total_cabang(); ?>+</h6>
                        <small>Cabang</small>
                    </div>
                </div>
            </div>
            <!-- Nav tabs -->
            <!-- <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#hr_menu">HR</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#project_menu">Project</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sub_menu"><i class="icon-grid"></i></a></li>                
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
            </ul> -->
                
            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane animated fadeIn active" id="hr_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li class="active"><a href="<?php echo base_url('admin/index');?>"><i class="icon-home"></i><span>Dashboard</span></a></li>
                            <li>
                                <a href="#Employees" class="has-arrow"><i class="icon-users"></i><span>Karyawan</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url('admin/karyawan');?>">Data Karyawan</a></li>
                                    <li><a href="<?php echo base_url('admin/permohonan');?>">Permohonan Karyawan</a></li>
                                    <li><a href="<?php echo base_url('admin/percobaan');?>">Karyawan Percobaan</a></li>
                                    <li><a href="<?php echo base_url('admin/penilaian');?>">Penilaian Karayawan</a></li>
                                    <li><a href="<?php echo base_url('admin/training');?>">Training Karyawan</a></li>
                                    <li><a href="<?php echo base_url('admin/resign');?>">Karyawan Resign</a></li>
                                    <li><a href="<?php echo base_url('admin/mpp');?>">Man Power Planning</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Master" class="has-arrow"><i class="icon-bag"></i><span>Master Data</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url('admin/departemen');?>">Master Departmen</a></li>
                                    <li><a href="<?php echo base_url('admin/divisi');?>">Master Divisi</a></li>
                                    <li><a href="<?php echo base_url('admin/jabatan');?>">Master Jabatan</a></li>
                                    <li><a href="<?php echo base_url('admin/pangkat');?>">Master Pangkat</a></li>
                                    <li><a href="<?php echo base_url('admin/pemohon');?>">Master Pemohon</a></li>
                                    <li><a href="<?php echo base_url('admin/penilai');?>">Master Penilai</a></li>
                                    <li><a href="<?php echo base_url('admin/pengguna');?>">Master Pengguna</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="has-arrow"><i class="icon-envelope-letter"></i><span>Permohonan</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url('admin/cuti');?>">Permohonan Cuti</a></li>
                                    <li><a href="<?php echo base_url('admin/izin');?>">Permohonan Izin</a></li>
                                    <li><a href="<?php echo base_url('admin/sakit');?>">Permohonan Sakit</a></li>
                                    <li><a href="<?php echo base_url('admin/lembur');?>">Permohonan Lembur</a></li>
                                    <li><a href="<?php echo base_url('admin/dinas');?>">Permohonan Dinas</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Report" class="has-arrow"><i class="icon-book-open"></i><span>Report</span></a>
                                <ul>
                                    <li><a href="<?=base_url('report/print_penilaian')?>" target="_blank"<span> Report Penilaian</span></a></li>
                                    <li><a href="<?=base_url('report/print_percobaan')?>" target="_blank"<span> Report Percobaan</span></a></li>
                                    <li><a href="<?=base_url('report/print_training')?>" target="_blank"<span> Report Training</span></a></li> 
                                    <li><a href="<?=base_url('report/print_resign')?>" target="_blank"<span> Report Resign</span></a></li>
                                    <li><a href="<?=base_url('report/print_mpp')?>" target="_blank"<span> Report Man Power Planning</span></a></li>                                
                                </ul>
                            </li>
                            <li>
                                <a href="#Authentication" class="has-arrow"><i class="icon-bell"></i><span>Notification</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url('admin/notifikasi');?>">Info Karyawan Baru</a></li>
                                    <li><a href="<?php echo base_url('admin/masa_kerja');?>">Info Masa Kerja</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Struktur" class="has-arrow"><i class="icon-bar-chart"></i><span>Struktur</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url('admin/struktur_pusat');?>"></i>Struktur Pusat</a></li>
                                    <li><a href="<?php echo base_url('admin/struktur_cabang');?>"></i>Struktur Cabang</a></li>     
                                    <li><a href="<?php echo base_url('admin/grafik_dep');?>"></i>Grafik per Departemen</a></li>
                                    <li><a href="<?php echo base_url('admin/grafik_month');?>"></i>Grafik per Month</a></li> 
                                    <li><a href="<?php echo base_url('admin/grafik_karyawan');?>"></i>Pie Chart Karyawan</a></li>                              
                                </ul>
                            </li>
                            <li><a href=""><i class="icon-info"></i>Help</a></li>
                            <li><a href="<?php echo site_url('admin/logout');?>"><i class="icon-logout"></i>Logout</a></li>
                        </ul>
                    </nav>
                </div>     
            </div>          
        </div>
    </div>