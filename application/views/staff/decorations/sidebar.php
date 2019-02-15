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

            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane animated fadeIn active" id="hr_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li class="active"><a href="<?php echo base_url('staff/index');?>"><i class="icon-home"></i><span>Dashboard</span></a></li>
                            <li>
                                <a href="" class="has-arrow"><i class="icon-envelope-letter"></i><span>Permohonan</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url('staff/cuti');?>">Permohonan Cuti</a></li>
                                    <li><a href="<?php echo base_url('staff/izin');?>">Permohonan Izin</a></li>
                                    <li><a href="<?php echo base_url('staff/sakit');?>">Permohonan Sakit</a></li>
                                    <li><a href="<?php echo base_url('staff/lembur');?>">Permohonan Lembur</a></li>
                                    <li><a href="<?php echo base_url('staff/dinas');?>">Permohonan Dinas</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="has-arrow"><i class="icon-bell"></i><span>Notification</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url('staff/notifikasi');?>">Info Karyawan Baru</a></li>
                                    <li><a href="<?php echo base_url('staff/masa_kerja');?>">Info Masa Kerja</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="has-arrow"><i class="icon-bar-chart"></i><span>Struktur</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url('staff/struktur_pusat');?>"></i>Struktur Pusat</a></li>
                                    <li><a href="<?php echo base_url('staff/struktur_cabang');?>"></i>Struktur Cabang</a></li>                             
                                </ul>
                            </li>
                            <li><a href=""><i class="icon-info"></i>Help</a></li>
                            <li><a href="<?php echo site_url('staff/logout');?>"><i class="icon-logout"></i>Logout</a></li>
                        </ul>
                    </nav>
                </div>     
            </div>          
        </div>
    </div>