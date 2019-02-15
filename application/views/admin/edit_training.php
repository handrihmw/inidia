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
							<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
							<i class="fa fa-angle-double-left"></i></a> Karyawan</h2>
								<ul class="breadcrumb">                           
									<li class="breadcrumb-item active">Karyawan</li>
									<li class="breadcrumb-item active">Edit Karyawan Training</li>
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
								<?php echo form_open('admin/update_training/'.$kry->id_tr, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="dep" class="col-sm-3 col-form-label">DATA PEMOHON</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Permohonan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_tr" readonly value="<?php echo set_value('id_tr', $kry->id_tr); ?>">
											<?php echo form_error('id_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_pemohon_tr" value="<?php echo set_value('nama_pemohon_tr', $kry->nama_pemohon_tr); ?>">
											<?php echo form_error('nama_pemohon_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_pemohon" class="col-sm-3 col-form-label">NIK</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="nik_pemohon_tr" value="<?php echo set_value('nik_pemohon_tr', $kry->nik_pemohon_tr); ?>">
											<?php echo form_error('nik_pemohon_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="jbt" class="col-sm-3 col-form-label">Jabatan Pemohon</label>
										<div class="col-sm-6">
											<select class="form-control" id="jabatan" name="jabatan_pemohon_tr">
												<?php foreach ($jbt as $row) {  ?>
													<option <?php if($row->jabatan==$kry->jabatan_pemohon_tr) { echo "selected"; }?> value="<?php echo $row->jabatan;?>">
													<?php echo $row->jabatan?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('jabatan_pemohon_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Departemen Pemohon</label>
										<div class="col-sm-6">
											<select class="form-control" id="departemen" name="dep_pemohon_tr">
												<?php foreach ($dep as $row) {  ?>
													<option <?php if($row->departemen==$kry->dep_pemohon_tr) { echo "selected"; }?> value="<?php echo $row->departemen;?>">
													<?php echo $row->departemen?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('dep_pemohon_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Permohonan</label>
										<div class="col-sm-6">
											<input id="tgl_permohonan" type="text" name="tgl_permohonan_tr" class="form-control" value="<?php echo set_value('tgl_permohonan_tr', $kry->tgl_permohonan_tr); ?>">
											<?php echo form_error('tgl_permohonan_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">DATA PERMINTAAN TRAINING</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Judul Training</label>
										<div class="col-sm-6">
											<input type="text" name="judul_training_tr" class="form-control" value="<?php echo set_value('judul_training_tr', $kry->judul_training_tr); ?>">
											<?php echo form_error('judul_training_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Penyelenggara</label>
										<div class="col-sm-6">
											<input type="text" name="penyelenggara_tr" class="form-control" value="<?php echo set_value('penyelenggara_tr', $kry->penyelenggara_tr); ?>">
											<?php echo form_error('penyelenggara_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Waktu Pelaksanaan</label>
										<div class="col-sm-6">
											<input id="tgl_pelaksanaan" type="text" name="tgl_pelaksanaan_tr" class="form-control" value="<?php echo set_value('tgl_pelaksanaan_tr', $kry->tgl_pelaksanaan_tr); ?>">
											<?php echo form_error('tgl_pelaksanaan_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tempat Pelaksanaan</label>
										<div class="col-sm-6">
											<input type="text" name="tempat_pelaksanaan_tr" class="form-control" value="<?php echo set_value('tempat_pelaksanaan_tr', $kry->tempat_pelaksanaan_tr); ?>">
											<?php echo form_error('tempat_pelaksanaan_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">BIAYA TRAINING</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Biaya</label>
										<div class="col-sm-6">
											<input type="number" name="biaya_tr" class="form-control" value="<?php echo set_value('biaya_tr', $kry->biaya_tr); ?>">
											<?php echo form_error('biaya_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Cara Pembayaran</label>
										<div class="col-sm-6">
											<input type="text" name="pembayaran_tr" class="form-control" value="<?php echo set_value('pembayaran', $kry->pembayaran_tr); ?>">
											<?php echo form_error('pembayaran_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">PROSES DI HRD</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Diterima</label>
										<div class="col-sm-6">
											<input id="tgl_terima" type="text" name="tgl_terima_tr" class="form-control" value="<?php echo set_value('tgl_terima_tr', $kry->tgl_terima_tr); ?>">
											<?php echo form_error('tgl_terima_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
										<div class="col-sm-6">
											<input id="tgl_bayar" type="text" name="tgl_bayar_tr" class="form-control" value="<?php echo set_value('tgl_bayar_tr', $kry->tgl_bayar_tr); ?>">
											<?php echo form_error('tgl_bayar_tr'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>admin/training" class="btn btn-xs btn-danger" role="button">
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
        $('#tgl_permohonan').datepicker({
			locale:'id',
            format: "dd-mm-yyyy",
            autoclose: true
        });

		$('#tgl_pelaksanaan').datepicker({
			locale:'id',
            format: "dd-mm-yyyy",
            autoclose: true
		});

		 $('#tgl_terima').datepicker({
			locale:'id',
            format: "dd-mm-yyyy",
            autoclose: true
        });

		$('#tgl_bayar').datepicker({
			locale:'id',
            format: "dd-mm-yyyy",
            autoclose: true
		});
	}); 
</script>

</body>
</html>

