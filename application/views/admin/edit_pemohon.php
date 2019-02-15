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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Master Data</h2>
								<ul class="breadcrumb">                          
									<li class="breadcrumb-item active">Master Data</li>
									<li class="breadcrumb-item active">Edit Peniai</li>
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
									<?php echo form_open('admin/update_pemohon/'.$kry->id_pemohon, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_pemohon" readonly value="<?php echo set_value('id_pemohon', $kry->id_pemohon); ?>">
											<?php echo form_error('id_pemohon'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_pemohon" value="<?php echo set_value('nama_pemohon', $kry->nama_pemohon); ?>">
											<?php echo form_error('nama_pemohon'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">NIK</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nik_pemohon" value="<?php echo set_value('nik_pemohon', $kry->nik_pemohon); ?>">
											<?php echo form_error('nik_pemohon'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jabatan pemohon</label>
										<div class="col-sm-6">
											<select class="form-control" name="jabatan_pemohon">
												<?php foreach ($jbt as $jbt) {  ?>
													<option <?php if($jbt->jabatan==$kry->jabatan_pemohon) { echo "selected"; }?> value="<?php echo $jbt->jabatan;?>">
													<?php echo $jbt->jabatan?></option>	
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Departemen</label>
										<div class="col-sm-6">
											<select class="form-control" name="dep_pemohon">
												<?php foreach ($dep as $dep) {  ?>
													<option <?php if($dep->departemen==$kry->dep_pemohon) { echo "selected"; }?> value="<?php echo $dep->departemen;?>">
													<?php echo $dep->departemen?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('dep_pemohon'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>admin/pemohon" class="btn btn-xs btn-danger" role="button">
											<i class="fa fa-angle-double-left"></i><span> Batal</span></a>
										</div>
									</div>
									<?php echo form_close(); ?>
								</div>							
							</div><!-- end card-->					
						</div>
					</div>
				</div>
				<!-- End Main Content -->
			</div>
		<?php include ('decorations/footer.php');?>
	</body>
</html>

