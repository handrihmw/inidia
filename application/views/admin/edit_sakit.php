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
								<i class="fa fa-angle-double-left"></i></a> Permohonan</h2>
								<ul class="breadcrumb">                            
									<li class="breadcrumb-item active">Permohonan Sakit</li>
									<li class="breadcrumb-item active">Sakit</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h5><i class="fa fa-pencil-square-o"></i> <?php echo $judul; ?></h5>
								</div>
								<div class="card-body">
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

									<?php echo form_open('admin/update_sakit/'.$sakit->id_skt, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Sakit</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_skt" value="<?php echo set_value('id_skt', $sakit->id_skt); ?>" readonly>
											<?php echo form_error('id_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_skt" value="<?php echo set_value('nama_skt', $sakit->nama_skt); ?>">
											<?php echo form_error('nama_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">NIK Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nik_skt" value="<?php echo set_value('nik_skt', $sakit->nik_skt); ?>">
											<?php echo form_error('nik_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_pemohon" class="col-sm-3 col-form-label">Jabatan Permohonan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="jabatan_skt" value="<?php echo set_value('jabatan_skt', $sakit->jabatan_skt); ?>">
											<?php echo form_error('jabatan_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Awal</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="tgl_awal_skt" value="<?php echo set_value('tgl_awal_skt', $sakit->tgl_awal_skt); ?>">
											<?php echo form_error('tgl_awal_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Akhir</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="tgl_akhir_skt" value="<?php echo set_value('tgl_akhir_skt', $sakit->tgl_akhir_skt); ?>">
											<?php echo form_error('tgl_akhir_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jumlah Hari</label>
										<div class="col-sm-6">
											<input type="text" name="jml_skt" class="form-control" value="<?php echo set_value('jml_skt', $sakit->jml_skt); ?>">
											<?php echo form_error('jml_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Penyakit</label>
										<div class="col-sm-6">
											<input type="text" name="penyakit_skt" class="form-control" value="<?php echo set_value('penyakit_skt', $sakit->penyakit_skt); ?>">
											<?php echo form_error('penyakit_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-6">
											<input type="text" name="keterangan_skt" class="form-control" value="<?php echo set_value('keterangan_skt', $sakit->keterangan_skt); ?>">
											<?php echo form_error('keterangan_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama PJS</label>
										<div class="col-sm-6">
											<input type="text" name="pjs_skt" class="form-control" value="<?php echo set_value('pjs_skt', $sakit->pjs_skt); ?>">
											<?php echo form_error('pjs_skt'); ?>
										</div>
									</div>
									<!-- <div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Lampiran</label>
										<div class="col-sm-6">
											<div class="file-upload">
												<div class="file-select">
													<div class="file-select-button" id="fileName" value="<?php echo set_value('lampiran_skt', $sakit->lampiran_skt); ?>">Choose File</div>
												<div class="file-select-name" id="noFile">No file chosen...</div> 
													<input type="file" name="lampiran_skt" id="chooseFile" value="<?php echo set_value('lampiran_skt', $sakit->lampiran_skt); ?>">
												</div>
											</div>
										</div>
									</div> -->
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Lampiran</label>
										<div class="col-sm-6">
											<input type="text" name="lampiran_skt" class="form-control" value="<?php echo set_value('lampiran_skt', $sakit->lampiran_skt); ?>">
											<?php echo form_error('lampiran_skt'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status Permohonan</label>
										<div class="col-sm-6">
											<select class="form-control" name="status_skt" value="<?php echo set_value('status_skt', $sakit->status_skt); ?>">
												<option value="Disetujui" <?php if($sakit->status_skt == "Disetujui") { echo "SELECTED"; } ?>>Disetujui</option>
												<option value="Pending" <?php if($sakit->status_skt == "Pending") { echo "SELECTED"; } ?>>Pending</option>
												<option value="Ditolak" <?php if($sakit->status_skt == "Ditolak") { echo "SELECTED"; } ?>>Ditolak</option>
											</select>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>admin/sakit" class="btn btn-xs btn-danger" role="button">
                                    		<i class="fa fa-angle-double-left"></i><span> Batal</span></a>
											</div>
										</div>
										<?php echo form_close(); ?>
									</div>							
								</div><!-- end card-->					
							</div>
						</div>
					</div>
				</div>
			<!-- End Main Content -->
			</div>
		<?php include ('decorations/footer.php');?>
	</body>
</html>
