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
						<div class="row">
							<div class="col-lg-6 col-md-8 col-sm-12">
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
								<i class="fa fa-angle-double-left"></i></a> Notification</h2>
								<ul class="breadcrumb">                            
									<li class="breadcrumb-item active">Notification</li>
									<li class="breadcrumb-item active">Masa Kerja Karyawan</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h5><i class="fa fa-users"></i> <?php echo $judul; ?></h5><br>
									<div class="alert alert-info alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-info-circle"></i> <b>INFORMASI</b> <br>
										<p>Data karyawan dibawah ini adalah data masa kerja berdasarkan tanggal selesai masa percobaan pada bulan <i class="fa fa-calendar"></i> <b><?php echo bulan() ?></b>.</p>
									</div>
									<a href="<?php echo base_url();?>admin/send_masa_kerja" class="btn btn-xs btn-primary" role="button" title="Kirim Email">
                                    <i class="icon-paper-plane"></i><span> Kirim</span></a>&nbsp;<br>
										<?php
											if($this->session->flashdata("message"))
										{
											echo "
											<div class='alert alert-success'>
												".$this->session->flashdata("message")."
											</div>
											";
										}
										?>
								</div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered dataTable" cellspacing="0" id="examples">
                                            <thead style="background-color:#e9ecef;">
                                                <tr style="text-align:center;">
                                                    <th>No.</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>NIK</th>     
                                                    <th>Jabatan</th> 
                                                    <th>Jenis Percobaan</th> 
                                                    <th>Tanggal Mulai</th> 
													<th>Tanggal Selesai</th>
													<th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; foreach ($karyawan as $kry): ?>
                                                <tr>
                                                    <td style="text-align:center;"><?= $no; ?></td>
                                                    <td><?= $kry->nama_cb ?></td>
                                                    <td style="text-align:center;"><?= $kry->nik_cb ?></td>
                                                    <td><?= $kry->jabatan_cb ?></td>
                                                    <td><?= $kry->jenis_cb ?></td>
                                                    <td style="text-align:center;"><?= $kry->tgl_mulai_cb ?></td>
													<td style="text-align:center;"><?= $kry->tgl_selesai_cb ?></td>
													<td style="text-align: center;">
                                                        <a href="<?php echo base_url();?>admin/send_masa_kerja/" class="btn btn-xs btn-primary m-r-5" role="button" title="Kirim Email">
                                                        <i class="icon-envelope"></i>
                                                    </td>
                                                </tr>
                                                <?php $no++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
					    </div>
				    </div>
			    </div>
			<!-- End Main Content -->
            </div>
            <?php include ('decorations/footer.php');?>
    </body>
</html>
