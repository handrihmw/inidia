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
									<li class="breadcrumb-item active">Permohonan Cuti</li>
									<li class="breadcrumb-item active">Cuti</li>
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

									<?php echo form_open('manager/update_cuti/'.$cuti->id_ct, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Cuti</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_ct" readonly value="<?php echo set_value('id_ct', $cuti->id_ct); ?>" readonly>
											<?php echo form_error('id_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_ct" readonly value="<?php echo set_value('nama_ct', $cuti->nama_ct); ?>" readonly>
											<?php echo form_error('nama_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Divisi Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="divisi_ct" value="<?php echo set_value('divisi_ct', $cuti->divisi_ct); ?>" readonly>
											<?php echo form_error('divisi_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_pemohon" class="col-sm-3 col-form-label">Tanggal Permohonan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="tgl_ct" value="<?php echo set_value('tgl_ct', $cuti->tgl_ct); ?>" readonly>
											<?php echo form_error('tgl_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jenis</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="jenis_ct" value="<?php echo set_value('jenis_ct', $cuti->jenis_ct); ?>" readonly>
											<?php echo form_error('jenis_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Alasan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="alasan_ct" value="<?php echo set_value('alasan_ct', $cuti->alasan_ct); ?>" readonly>
											<?php echo form_error('alasan_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Informasi Lain</label>
										<div class="col-sm-6">
											<input type="text" name="informasi_ct" class="form-control" value="<?php echo set_value('informasi_ct', $cuti->informasi_ct); ?>" readonly>
											<?php echo form_error('informasi_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama PJS</label>
										<div class="col-sm-6">
											<input type="text" name="pjs_ct" class="form-control" value="<?php echo set_value('pjs_ct', $cuti->pjs_ct); ?>" readonly>
											<?php echo form_error('pjs_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status Permohonan</label>
										<div class="col-sm-6">
											<select class="form-control" name="status_ct">
												<option value="Disetujui" <?php if($cuti->status_ct == "Disetujui") { echo "SELECTED"; } ?>>Disetujui</option>
												<option value="Pending" <?php if($cuti->status_ct == "Pending") { echo "SELECTED"; } ?>>Pending</option>
												<option value="Ditolak" <?php if($cuti->status_ct == "Ditolak") { echo "SELECTED"; } ?>>Ditolak</option>
											</select>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>manager/cuti" class="btn btn-xs btn-danger" role="button">
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
