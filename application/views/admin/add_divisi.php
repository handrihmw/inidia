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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Master Data</h2>
								<ul class="breadcrumb">                          
									<li class="breadcrumb-item active">Master Data</li>
									<li class="breadcrumb-item active">Tambah Divisi</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h5><i class="fa fa-plus-square"></i> <?php echo $judul; ?></h5>
								</div>
								<div class="card-body">
									<?php echo form_open('admin/save_divisi', ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Divisi</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id" readonly value="<?php echo set_value('id'); ?><?= $kode; ?>">
											<?php echo form_error('id'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Unik Divisi</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="unik"  value="<?php echo set_value('unik'); ?>">
											<?php echo form_error('unik'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Divisi</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="divisi"  value="<?php echo set_value('divisi'); ?>">
											<?php echo form_error('divisi'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
											<a href="<?php echo site_url();?>admin/divisi" class="btn btn-xs btn-danger" role="button">
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

