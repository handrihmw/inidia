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
									<?php echo form_open('admin/update_penilai/'.$kry->id_penilai, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Penilai</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_penilai" readonly value="<?php echo set_value('id_penilai', $kry->id_penilai); ?>">
											<?php echo form_error('id_penilai'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Penilai</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_penilai" value="<?php echo set_value('nama_penilai', $kry->nama_penilai); ?>">
											<?php echo form_error('nama_penilai'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">NIK</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nik_penilai" value="<?php echo set_value('nik_penilai', $kry->nik_penilai); ?>">
											<?php echo form_error('nik_penilai'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jabatan Penilai</label>
										<div class="col-sm-6">
											<select class="form-control" name="jabatan_penilai">
												<?php foreach ($jbt as $jbt) {  ?>
													<option <?php if($jbt->jabatan==$kry->jabatan_penilai) { echo "selected"; }?> value="<?php echo $jbt->jabatan;?>">
													<?php echo $jbt->jabatan?></option>	
												<?php } ?>
											</select>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>admin/penilai" class="btn btn-xs btn-danger" role="button">
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

