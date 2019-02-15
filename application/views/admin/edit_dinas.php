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
									<li class="breadcrumb-item active">Permohonan Perjalanan Dinas</li>
									<li class="breadcrumb-item active">Perjalanan Dinas</li>
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

									<?php echo form_open('admin/update_dinas/'.$dinas->id_dns, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Dinas</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_dns" value="<?php echo set_value('id_dns', $dinas->id_dns); ?>" readonly>
											<?php echo form_error('id_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jenis Dinas</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="jenis_dns" value="<?php echo set_value('jenis_dns', $dinas->jenis_dns); ?>">
											<?php echo form_error('jenis_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kepentingan Dinas</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="kepentingan_dns" value="<?php echo set_value('kepentingan_dns', $dinas->kepentingan_dns); ?>">
											<?php echo form_error('kepentingan_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_dns" value="<?php echo set_value('nama_dns', $dinas->nama_dns); ?>">
											<?php echo form_error('nama_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_pemohon" class="col-sm-3 col-form-label">Total Tujuan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="total_dns" value="<?php echo set_value('total_dns', $dinas->total_dns); ?>">
											<?php echo form_error('total_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Awal</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="tgl_awal_dns" value="<?php echo set_value('tgl_awal_dns', $dinas->tgl_awal_dns); ?>">
											<?php echo form_error('tgl_awal_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Akhir</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="tgl_akhir_dns" value="<?php echo set_value('tgl_akhir_dns', $dinas->tgl_akhir_dns); ?>">
											<?php echo form_error('tgl_akhir_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tujuan Dinas</label>
										<div class="col-sm-6">
											<input type="text" name="tujuan_dns" class="form-control" value="<?php echo set_value('tujuan_dns', $dinas->tujuan_dns); ?>">
											<?php echo form_error('tujuan_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Pembayaran Awal</label>
										<div class="col-sm-6">
											<input type="text" name="pembayaran_dns" class="form-control" value="<?php echo set_value('pembayaran_dns', $dinas->pembayaran_dns); ?>">
											<?php echo form_error('pembayaran_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Bayar</label>
										<div class="col-sm-6">
											<input type="text" name="tgl_bayar_dns" class="form-control" value="<?php echo set_value('tgl_bayar_dns', $dinas->tgl_bayar_dns); ?>">
											<?php echo form_error('tgl_bayar_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-6">
											<input type="text" name="keterangan_dns" class="form-control" value="<?php echo set_value('keterangan_dns', $dinas->keterangan_dns); ?>">
											<?php echo form_error('keterangan_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama PJS</label>
										<div class="col-sm-6">
											<input type="text" name="pjs_dns" class="form-control" value="<?php echo set_value('pjs_dns', $dinas->pjs_dns); ?>">
											<?php echo form_error('pjs_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status Permohonan</label>
										<div class="col-sm-6">
											<select class="form-control" name="status_dns" value="<?php echo set_value('status_dns', $dinas->status_dns); ?>">
												<option value="Disetujui" <?php if($dinas->status_dns == "Disetujui") { echo "SELECTED"; } ?>>Disetujui</option>
												<option value="Pending" <?php if($dinas->status_dns == "Pending") { echo "SELECTED"; } ?>>Pending</option>
												<option value="Ditolak" <?php if($dinas->status_dns == "Ditolak") { echo "SELECTED"; } ?>>Ditolak</option>
											</select>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>admin/dinas" class="btn btn-xs btn-danger" role="button">
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
