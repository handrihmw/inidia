<!doctype html>
<html lang="en">

<?php include ('decorations/header.php');?>
<body class="theme-cyan">
<div id="wrapper">
    <?php include ('decorations/navbar.php');?>
    	<?php include ('decorations/sidebar.php');?>
			<!-- Start Main Content -->
			<div id="main-content">
				<div class="container-fluid">
					<div class="block-header">
						<div class="kry">
							<div class="col-lg-6 col-md-8 col-sm-12">
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Karyawan</h2>
								<ul class="breadcrumb">                           
									<li class="breadcrumb-item">Man Power Planning</li>
									<li class="breadcrumb-item active">Data Man Power Planning</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="kry clearfix">
						<div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <?php
                                        if(isset($_SESSION['hapus_sukses']) || isset($_SESSION['update_sukses'])) :
                                            $notif = '';
                                            isset($_SESSION['hapus_sukses']) ? $notif .= $_SESSION['hapus_sukses'] : '';
                                            isset($_SESSION['update_sukses']) ? $notif .= $_SESSION['update_sukses'] : '';
                                        ?>
                                        <div class="alert alert-success">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Sukses!</strong> <?php echo $notif; ?>
                                        </div>
                                    <?php endif;?>
                                    <h5><i class="fa fa-users"></i> <?php echo $judul; ?></h5><br>
                                    <a href="<?php echo base_url();?>admin/add_mpp" class="btn btn-xs btn-default" role="button" title="Tambah MPP">
                                    <i class="icon-plus"></i><span> Tambah</span></a>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModalCenter" title="Import Data">
                                    <i class="fa fa-upload"></i> Import</button>
                                    
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" 
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i><span> Print</span></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?=base_url('report_mpp/print_mpp')?>" target="_blank">Lap. Jabatan</a>
                                        <a class="dropdown-item" href="<?=base_url('report_mpp_dep/print_mpp')?>" target="_blank">Lap. Departemen</a>
                                        <a class="dropdown-item" href="<?=base_url('report_mpp_area/print_mpp')?>" target="_blank">Lap. Area</a>
                                        <a class="dropdown-item" href="<?=base_url('report_mpp_tat/print_mpp')?>" target="_blank">Lap. TAT</a>
                                    </div>
                                    
                                  
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered dataTable" cellspacing="0" id="examples">
                                            <thead style="background-color:#e9ecef;">
                                                <tr style="text-align:center;">
                                                    <th>No.</th>
                                                    <th>Jabatan</th>
                                                    <th>Departemen</th>                            
                                                    <th>Pemohon</th>                                    
                                                    <th>Jumlah</th>
                                                    <th>Sisa</th> 
                                                    <th style="text-align:center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; foreach ($kry as $kry): ?>
                                                <tr>
                                                    <td style="text-align:center;"><?= $no; ?></td>
                                                    <td><?= $kry->jabatan_pp ?></td>
                                                    <td><?= $kry->dep_pp ?></td>
                                                    <td><?= $kry->nama_pmh_pp ?></td>
                                                    <td style="text-align:center;"><?= $kry->jml_butuh_pp?> Orang</td>
                                                    <td style="text-align:center;"><?= $kry->sisa_pp ?> Orang</td>
                                                    <td style="text-align: center;">
                                                        <a href="<?php echo base_url();?>admin/detail_mpp/<?php echo $kry->id_pp;?>" class="btn btn-xs btn-success m-r-5" role="button" title="Detail">
                                                        <i class="icon-magnifier"></i>&nbsp;
                                                        <a href="<?php echo base_url();?>admin/edit_mpp/<?php echo $kry->id_pp;?>" class="btn btn-xs btn-primary m-r-5" role="button" title="Edit">
                                                        <i class="icon-pencil"></i>&nbsp;
                                                        <a href="<?=base_url('report_mpp/print_mpp/'.$kry->id_pp)?>" class="btn btn-xs btn-dark m-r-5" role="button" title="Cetak" target="_blank">
                                                        <i class="fa fa-file-text"></i></a>
                                                        <a href="<?php echo base_url();?>admin/delete_mpp/<?php echo $kry->id_pp;?>" onclick="return confirm('Apakah Anda Yakin?');" 
                                                        class="btn btn-xs btn-danger m-r-5" role="button" title="Hapus">
                                                        <i class="icon-trash"></i></a> 
                                                    </td>
                                                </tr>
                                                <?php $no++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </button>
                                </div>
                            </div>
                        </div>

					</div>
				</div>
			</div>
			<!-- End Main Content -->

            <!-- MODAL UPLOAD -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-file-excel-o"></i> Upload Data Excel Anda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url();?>admin/upload_percobaan/" enctype="multipart/form-data" method="post">
                                        <div class="file-upload">
                                            <div class="file-select">
                                                <div class="file-select-button" id="fileName">Choose File</div>
                                                <div class="file-select-name" id="noFile">No file chosen...</div> 
                                                    <input type="file" name="file" id="chooseFile">
                                                </div><br>
                                                    <input type="submit" name="import" value="Import" class="btn btn-xs btn-primary" role="button">
                                            </div>
                                        </div>
                                    </form>
                                <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include ('decorations/footer.php');?>
        <script src="<?php echo base_url() ?>assets/js/upload.js"></script> 
    </body>
</html>
