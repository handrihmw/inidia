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
									<li class="breadcrumb-item active">Permohonan Lembur</li>
									<li class="breadcrumb-item active">Lembur</li>
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

									<?php echo form_open('admin/update_lembur/'.$lembur->id_ot, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Lembur</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_ot" value="<?php echo set_value('id_ot', $lembur->id_ot); ?>" readonly>
											<?php echo form_error('id_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Permohonan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="tanggal_ot" value="<?php echo set_value('tanggal_ot', $lembur->tanggal_ot); ?>">
											<?php echo form_error('tanggal_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_pemohon" class="col-sm-3 col-form-label">Waktu</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="waktu_ot" value="<?php echo set_value('waktu_ot', $lembur->waktu_ot); ?>">
											<?php echo form_error('waktu_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">nama</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_ot" value="<?php echo set_value('nama_ot', $lembur->nama_ot); ?>">
											<?php echo form_error('nama_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="keterangan_ot" value="<?php echo set_value('keterangan_ot', $lembur->keterangan_ot); ?>">
											<?php echo form_error('keterangan_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status Permohonan</label>
										<div class="col-sm-6">
											<select class="form-control" name="status_ot" value="<?php echo set_value('status_ot', $lembur->status_ot); ?>">
												<option value="Disetujui" <?php if($lembur->status_ot == "Disetujui") { echo "SELECTED"; } ?>>Disetujui</option>
												<option value="Pending" <?php if($lembur->status_ot == "Pending") { echo "SELECTED"; } ?>>Pending</option>
												<option value="Ditolak" <?php if($lembur->status_ot == "Ditolak") { echo "SELECTED"; } ?>>Ditolak</option>
											</select>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>admin/lembur" class="btn btn-xs btn-danger" role="button">
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
