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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Resign</h2>
								<ul class="breadcrumb">                            
									<li class="breadcrumb-item">Karyawan</li>
									<li class="breadcrumb-item active">Karyawan Resign</li>
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
									<?php echo form_open('admin/update_resign/'.$kry->id_rs, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Resign</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_rs" readonly value="<?php echo set_value('id_rs', $kry->id_rs); ?>">
											<?php echo form_error('id_rs'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_pemohon" class="col-sm-3 col-form-label">Bulan</label>
										<div class="col-sm-6">
											<input type="text" id="tgl_bln" class="form-control" name="bulan_rs" value="<?php echo set_value('bulan_rs', $kry->bulan_rs); ?>">
											<?php echo form_error('bulan_rs'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Lengkap</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_rs" value="<?php echo set_value('nama_rs', $kry->nama_rs); ?>">
											<?php echo form_error('nama_rs'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="row" class="col-sm-3 col-form-label">Pangkat</label>
										<div class="col-sm-6">
											<select class="form-control" id="pangkat" name="pangkat_rs">
												<?php foreach ($pgk as $row) {  ?>
													<option <?php if($row->pangkat==$kry->pangkat_rs) { echo "selected"; }?> value="<?php echo $row->pangkat;?>">
													<?php echo $row->pangkat?></option>	
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jabatan</label>
										<div class="col-sm-6">
											<select class="form-control" id="jabatan" name="jabatan_rs">
												<?php foreach ($jbt as $row) {  ?>
												<option <?php if($row->jabatan==$kry->jabatan_rs) { echo "selected"; }?> value="<?php echo $row->jabatan;?>">
													<?php echo $row->jabatan?></option>	
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Departemen</label>
										<div class="col-sm-6">
											<select class="form-control" id="departemen" name="dep_rs">
												<?php foreach ($dep as $row) {  ?>
													<option <?php if($row->departemen==$kry->dep_rs) { echo "selected"; }?> value="<?php echo $row->departemen;?>">
													<?php echo $row->departemen?></option>	
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Masuk</label>
										<div class="col-sm-6">
											<input type="text" id="tgl_masuk" class="form-control" name="tgl_masuk_rs" value="<?php echo set_value('tgl_masuk_rs', $kry->tgl_masuk_rs); ?>">
											<?php echo form_error('tgl_masuk_rs'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Resign</label>
										<div class="col-sm-6">
											<input type="text" id="tgl_resign" class="form-control" name="tgl_resign_rs" value="<?php echo set_value('tgl_resign_rs', $kry->tgl_resign_rs); ?>">
											<?php echo form_error('tgl_resign_rs'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Masa Kerja (Bulan)</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="masa_bulan_rs" value="<?php echo set_value('masa_bulan_rs', $kry->masa_bulan_rs); ?>">
											<?php echo form_error('masa_bulan_rs'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Masa Kerja (Tahun)</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="masa_tahun_rs" value="<?php echo set_value('masa_tahun_rs', $kry->masa_tahun_rs); ?>">
											<?php echo form_error('masa_tahun_rs'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-6">
											<textarea class="form-control" value="<?php echo $kry->keterangan_rs; ?>" rows="5" cols="30" name="keterangan_rs"><?php echo $kry->keterangan_rs; ?></textarea>
											<?php echo form_error('keterangan_rs'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>admin/resign" class="btn btn-xs btn-danger" role="button">
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
		<script src="<?php echo base_url() ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url() ?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#tgl_bln').datepicker({
					locale:'id',
					format: "dd-mm-yyyy",
					autoclose: true
				});

				$('#tgl_masuk').datepicker({
					locale:'id',
					format: "dd-mm-yyyy",
					autoclose: true
				});

				$('#tgl_resign').datepicker({
					locale:'id',
					format: "dd-mm-yyyy",
					autoclose: true
				});
			}); 
		</script>

	</body>
</html>

