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
									<li class="breadcrumb-item active">Man Power Planning</li>
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

									<?php echo form_open('admin/update_mpp/'.$kry->id_pp, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode MPP</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_pp" readonly value="<?php echo set_value('id_pp', $kry->id_pp); ?>">
											<?php echo form_error('id_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jabatan</label>
										<div class="col-sm-6">
											<select class="form-control" name="jabatan_pp" value="<?php echo set_value('jabatan_pp', $kry->jabatan_pp); ?>">
												<?php foreach ($jbt as $jb_) {  ?>
													<option <?php if($jb_->jabatan==$kry->jabatan_pp) { echo "selected"; }?> value="<?php echo $jb_->jabatan;?>">
													<?php echo $jb_->jabatan?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('jabatan_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Departemen</label>
										<div class="col-sm-6">
											<select class="form-control" name="dep_pp" value="<?php echo set_value('dep_pp', $kry->dep_pp); ?>">
												<?php foreach ($dep as $dp_) {  ?>
													<option <?php if($dp_->departemen==$kry->dep_pp) { echo "selected"; }?> value="<?php echo $dp_->departemen;?>">
													<?php echo $dp_->departemen?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('dep_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Area</label>
										<div class="col-sm-6">
											<select class="form-control" name="area_pp" value="<?php echo set_value('area_pp', $kry->area_pp); ?>">
												<?php foreach ($area as $unt_) {  ?>
													<option <?php if($unt_->kode==$kry->area_pp) { echo "selected"; }?> value="<?php echo $unt_->kode;?>">
													<?php echo $unt_->kode?> - <?php echo $unt_->unit?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('area_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="status_pp" value="<?php echo set_value('status_pp', $kry->status_pp); ?>">
											<?php echo form_error('status_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_pemohon" class="col-sm-3 col-form-label">Jumlah Dibutuhkan</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="jml_butuh_pp" value="<?php echo set_value('jml_butuh_pp', $kry->jml_butuh_pp); ?>">
											<?php echo form_error('jml_butuh_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Sisa</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="sisa_pp" value="<?php echo set_value('sisa_pp', $kry->sisa_pp); ?>">
											<?php echo form_error('sisa_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_pmh_pp" value="<?php echo set_value('nama_pmh_pp', $kry->nama_pmh_pp); ?>">
											<?php echo form_error('nama_pmh_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jabatan Pemohon</label>
										<div class="col-sm-6">
											<select class="form-control" name="jabatan_pmh_pp" value="<?php echo set_value('jabatan_pmh_pp', $kry->jabatan_pmh_pp); ?>">
												<?php foreach ($jbt2 as $jb2_) {  ?>
													<option <?php if($jb2_->jabatan==$kry->jabatan_pmh_pp) { echo "selected"; }?> value="<?php echo $jb2_->jabatan;?>">
													<?php echo $jb2_->jabatan?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('jabatan_pmh_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Permohonan</label>
										<div class="col-sm-6">
											<input id="tgl_permohonan" type="text" name="tgl_pmh_pp" class="form-control" value="<?php echo set_value('tgl_pmh_pp', $kry->tgl_pmh_pp); ?>">
											<?php echo form_error('tgl_pmh_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Jatuh Tempo</label>
										<div class="col-sm-6">
											<input id="tgl_tempo" type="text" name="tgl_tempo_pp" class="form-control" value="<?php echo set_value('tgl_tempo_pp', $kry->tgl_tempo_pp); ?>">
											<?php echo form_error('tgl_tempo_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Wawancara GM</label>
										<div class="col-sm-6">
											<input id="tgl_wawancara" type="text" name="tgl_wawancara_pp" class="form-control" value="<?php echo set_value('tgl_wawancara_pp', $kry->tgl_wawancara_pp); ?>">
											<?php echo form_error('tgl_wawancara_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Pemenuhan</label>
										<div class="col-sm-6">
											<input id="tgl_pemenuhan" type="text" name="tgl_pmnh_pp" class="form-control" value="<?php echo set_value('tgl_pmnh_pp', $kry->tgl_pmnh_pp); ?>">
											<?php echo form_error('tgl_pmnh_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kecepatan Pemohonan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="kcp_pmnh_pp" value="<?php echo set_value('kcp_pmnh_pp', $kry->kcp_pmnh_pp); ?>">
											<?php echo form_error('kcp_pmnh_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Total Pemenuhan</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="total_pp" value="<?php echo set_value('total_pp', $kry->total_pp); ?>">
											<?php echo form_error('total_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Masuk Karyawan</label>
										<div class="col-sm-6">
											<input id="tgl_masuk" type="text" name="tgl_masuk_pp" class="form-control" value="<?php echo set_value('tgl_masuk_pp', $kry->tgl_masuk_pp); ?>">
											<?php echo form_error('tgl_masuk_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Sumber Rekrutmen</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="sumber_rek_pp" value="<?php echo set_value('sumber_rek_pp', $kry->sumber_rek_pp); ?>">
											<?php echo form_error('sumber_rek_pp'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-6">
											<textarea value="<?php echo $kry->ket_pp; ?>" class="form-control" rows="5" cols="30" name="ket_pp"><?php echo $kry->ket_pp; ?></textarea>
											<?php echo form_error('ket_pp'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>admin/mpp" class="btn btn-xs btn-danger" role="button">
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
<script src="<?php echo base_url() ?>assets/datepicker/js/bootstrap-datepicker.id.js"></script>
<script src="<?php echo base_url() ?>assets/datepicker/js/bootstrap-datepicker.id.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tgl_permohonan').datepicker({
			format: "dd-mm-yyyy",
			language: "id",
			endDate: "0d",
			autoclose: true
        });

		$('#tgl_tempo').datepicker({
			format: "dd-mm-yyyy",
			language: "id",
			endDate: "0d",
			autoclose: true
        });

		$('#tgl_wawancara').datepicker({
			format: "dd-mm-yyyy",
			language: "id",
			endDate: "0d",
			autoclose: true
        });

		$('#tgl_pemenuhan').datepicker({
			format: "dd-mm-yyyy",
			language: "id",
			endDate: "0d",
			autoclose: true
        });

		$('#tgl_masuk').datepicker({
			format: "dd-mm-yyyy",
			language: "id",
			endDate: "0d",
			autoclose: true
		});
    });
</script>
</body>
</html>
