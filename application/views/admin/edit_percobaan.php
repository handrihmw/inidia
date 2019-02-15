<!doctype html>
<html lang="en">

<?php include ('decorations/header.php');?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/datepicker/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/datepicker/css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/datepicker/css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/datepicker/css/bootstrap-datepicker3.min.css">
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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Karyawan</h2>
								<ul class="breadcrumb">                            
									<li class="breadcrumb-item active">Karyawan</li>
									<li class="breadcrumb-item active">Edit Karyawan Percobaan</li>
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
											<?php echo form_open('admin/update_percobaan/'.$karyawan->id_cb, ['class' => 'form-horizontal', 'method' => 'post']); ?>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">ID Karyawan</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="id_cb" readonly value="<?php echo set_value('id_cb', $karyawan->id_cb); ?>">
													<?php echo form_error('id_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="nama_cb" value="<?php echo set_value('nama_cb', $karyawan->nama_cb); ?>">
													<?php echo form_error('nama_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="nama_pemohon" class="col-sm-3 col-form-label">NIK</label>
												<div class="col-sm-6">
													<input type="number" class="form-control" name="nik_cb" value="<?php echo set_value('nik_cb', $karyawan->nik_cb); ?>">
													<?php echo form_error('nik_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Departemen</label>
												<div class="col-sm-6">
													<select class="form-control" name="dep_cb">
														<?php
															foreach ($dep as $dp_) {  ?>
																<option <?php if($dp_->departemen==$karyawan->dep_cb) { echo "selected"; }?> value="<?php echo $dp_->departemen;?>">
																<?php echo $dp_->departemen?></option>	
														<?php } ?>
													</select>
													<?php echo form_error('dep_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Jabatan</label>
												<div class="col-sm-6">
													<select class="form-control" name="jabatan_cb">
														<?php
															foreach ($jbt as $jb_) {  ?>
																<option <?php if($jb_->jabatan==$karyawan->jabatan_cb) { echo "selected"; }?> value="<?php echo $jb_->jabatan;?>">
																<?php echo $jb_->jabatan?></option><?php echo form_error('jabatan_cb'); ?>
														<?php } ?>
													</select>
													<?php echo form_error('jabatan_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Tanggal Masuk</label>
												<div class="col-sm-6">
													<input id="tgl_kerja" type="text" name="tgl_masuk_cb" class="form-control" value="<?php echo set_value('tgl_masuk_cb', $karyawan->tgl_masuk_cb); ?>">
													<?php echo form_error('tgl_masuk_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Jenis Pekerjaan</label>
												<div class="col-sm-6">
													<select class="form-control" name="jenis_cb" value="<?php echo set_value('jenis_cb', $karyawan->jenis_cb); ?>">
														<?php
															foreach ($krj as $kr_) {  ?>
																<option <?php if($kr_->status_kerja==$karyawan->jenis_cb) { echo "selected"; }?> value="<?php echo $kr_->status_kerja;?>">
																<?php echo $kr_->status_kerja?></option>	
														<?php } ?>
													</select>
													<?php echo form_error('jenis_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Tanggal Mulai</label>
												<div class="col-sm-6">
													<input id="tgl_mulai" type="text" name="tgl_mulai_cb" class="form-control" value="<?php echo set_value('tgl_mulai_cb', $karyawan->tgl_mulai_cb); ?>">
													<?php echo form_error('tgl_mulai_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Tanggal Selesai</label>
												<div class="col-sm-6">
													<input id="tgl_selesai" type="text" name="tgl_selesai_cb" class="form-control" value="<?php echo set_value('tgl_selesai_cb', $karyawan->tgl_selesai_cb); ?>">
													<?php echo form_error('tgl_selesai_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Percobaan Ke</label>
												<div class="col-sm-6">
													<input type="number" class="form-control" name="percobaan_cb" value="<?php echo set_value('percobaan_cb', $karyawan->percobaan_cb); ?>">
													<?php echo form_error('percobaan_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Catatan HR/GA</label>
												<div class="col-sm-6">
													<textarea class="form-control" value="<?php echo $karyawan->catatan_hr_cb; ?>" rows="5" cols="30" name="catatan_hr_cb"><?php echo $karyawan->catatan_hr_cb; ?></textarea>
													<?php echo form_error('catatan_hr_cb'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Catatan Atasan Langsung</label>
												<div class="col-sm-6">
													<textarea class="form-control" value="<?php echo $karyawan->catatan_atasan_cb; ?>" rows="5" cols="30" name="catatan_atasan_cb"><?php echo $karyawan->catatan_atasan_cb; ?></textarea>
													<?php echo form_error('catatan_atasan_cb'); ?>
												</div>
											</div>
											<br>
											<div class="form-group row">
												<div class="col-sm-6">
												<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
												<a href="<?php echo site_url();?>admin/percobaan" class="btn btn-xs btn-danger" role="button">
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
<script src="<?php echo base_url() ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
		$(document).ready(function () {
			$('#tgl_kerja').datepicker({
				locale:'id',
				format: "dd-mm-yyyy",
				autoclose: true
			});

			$('#tgl_mulai').datepicker({
				locale:'id',
				format: "dd-mm-yyyy",
				autoclose: true
			});

			$('#tgl_selesai').datepicker({
				locale:'id',
				format: "dd-mm-yyyy",
				autoclose: true
			});
		}); 
</script>

</body>
</html>

