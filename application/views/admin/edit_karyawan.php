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
									<li class="breadcrumb-item active">Edit Karyawan</li>
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

									<?php echo form_open('admin/update_karyawan/'.$kry->id_kry, ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Karyawan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_kry" readonly value="<?php echo set_value('id_kry', $kry->id_kry); ?>">
											<?php echo form_error('id_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Lengkap</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_kry" value="<?php echo set_value('nama_kry', $kry->nama_kry); ?>">
											<?php echo form_error('nama_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_pemohon" class="col-sm-3 col-form-label">NIK</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nik_kry" value="<?php echo set_value('nik_kry', $kry->nik_kry); ?>">
											<?php echo form_error('nik_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="jbt" class="col-sm-3 col-form-label">Jabatan</label>
										<div class="col-sm-6">
											<select class="form-control" id="jabatan" name="jabatan_kry">
												<?php foreach ($jbt as $jbt) {  ?>
													<option <?php if($jbt->jabatan==$kry->jabatan_kry) { echo "selected"; }?> value="<?php echo $jbt->jabatan;?>">
													<?php echo $jbt->jabatan?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('jabatan_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Pangkat</label>
										<div class="col-sm-6">
											<select class="form-control" id="pangkat" name="pangkat_kry">
												<?php foreach ($pgk as $pgk) {  ?>
													<option <?php if($pgk->pangkat==$kry->pangkat_kry) { echo "selected"; }?> value="<?php echo $pgk->pangkat;?>">
													<?php echo $pgk->pangkat?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('pangkat_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Divisi</label>
										<div class="col-sm-6">
											<select class="form-control" id="divisi" name="divisi_kry">
												<?php foreach ($dvs as $dvs) {  ?>
													<option <?php if($dvs->divisi==$kry->divisi_kry) { echo "selected"; }?> value="<?php echo $dvs->divisi;?>">
													<?php echo $dvs->divisi?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('divisi_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Departemen</label>
										<div class="col-sm-6">
											<select class="form-control" id="departemen" name="dep_kry">
												<?php foreach ($dep as $dep) {  ?>
													<option <?php if($dep->departemen==$kry->dep_kry) { echo "selected"; }?> value="<?php echo $dep->departemen;?>">
													<?php echo $dep->departemen?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('dep_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Unit / Cabang</label>
										<div class="col-sm-6">
											<select class="form-control" id="unit" name="lokasi_kry">
												<?php foreach ($unt as $unt) {  ?>
													<option <?php if($unt->unit==$kry->lokasi_kry) { echo "selected"; }?> value="<?php echo $unt->unit;?>">
													<?php echo $unt->unit?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('lokasi_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Panggilan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="panggilan_kry" value="<?php echo set_value('panggilan_kry', $kry->panggilan_kry); ?>">
											<?php echo form_error('panggilan_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Identitas</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="identitas_kry" value="<?php echo set_value('identitas_kry', $kry->identitas_kry); ?>">
											<?php echo form_error('identitas_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>
										<div class="col-sm-6">
											<select class="form-control" id="jk" name="jk_kry">
												<?php foreach ($jkl as $jkl) {  ?>
													<option <?php if($jkl->jk==$kry->jk_kry) { echo "selected"; }?> value="<?php echo $jkl->jk;?>">
													<?php echo $jkl->jk?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('jk_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="tempat_lahir_kry" value="<?php echo set_value('tempat_lahir_kry', $kry->tempat_lahir_kry); ?>">
											<?php echo form_error('tempat_lahir_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
										<div class="col-sm-6">
											<input id="tgl_lahir" type="text" name="tgl_lahir_kry" class="form-control" value="<?php echo set_value('tgl_lahir_kry', $kry->tgl_lahir_kry); ?>">
											<?php echo form_error('tgl_lahir_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kewarganegaraan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control"  name="negara_kry" value="<?php echo set_value('negara_kry', $kry->negara_kry); ?>">
											<?php echo form_error('negara_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Agama</label>
										<div class="col-sm-6">
											<select class="form-control" id="agama" name="agama_kry">
												<?php foreach ($ag as $ag) {  ?>
													<option <?php if($ag->agama==$kry->agama_kry) { echo "selected"; }?> value="<?php echo $ag->agama;?>">
													<?php echo $ag->agama?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('agama_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">NPWP</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="npwp_kry" value="<?php echo set_value('npwp_kry', $kry->npwp_kry); ?>">
											<?php echo form_error('npwp_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Alamat</label>
										<div class="col-sm-6">
											<textarea class="form-control" value="<?php echo $kry->alamat_kry; ?>" rows="5" cols="30" name="alamat_kry"><?php echo $kry->alamat_kry; ?></textarea>
											<?php echo form_error('alamat_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Telpon Rumah</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="tlp_rumah_kry" value="<?php echo set_value('tlp_rumah_kry', $kry->tlp_rumah_kry); ?>">
											<?php echo form_error('tlp_rumah_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nomor Handphone</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="no_hp" name="no_hp_kry" value="<?php echo set_value('no_hp_kry', $kry->no_hp_kry); ?>">
											<?php echo form_error('no_hp_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Masuk</label>
										<div class="col-sm-6">
											<input id="tgl_masuk" type="text" name="tgl_masuk_kry" class="form-control" value="<?php echo set_value('tgl_masuk_kry', $kry->tgl_masuk_kry); ?>">
											<?php echo form_error('tgl_masuk_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status Pekerjaan</label>
										<div class="col-sm-6">
											<select class="form-control" name="status_kerja_kry">
												<?php foreach ($krj as $krj) {  ?>
													<option <?php if($krj->status_kerja==$kry->status_kerja_kry) { echo "selected"; }?> value="<?php echo $krj->status_kerja;?>">
													<?php echo $krj->status_kerja?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('status_kerja_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status Pernikahan</label>
										<div class="col-sm-6">
											<select class="form-control" id="status_nikah" name="status_nikah_kry">
												<?php foreach ($nkh as $nkh) {  ?>
													<option <?php if($nkh->status_nikah==$kry->status_nikah_kry) { echo "selected"; }?> value="<?php echo $nkh->status_nikah;?>">
													<?php echo $nkh->status_nikah?></option>	
												<?php } ?>
											</select>
											<?php echo form_error('status_nikah_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Email</label>
										<div class="col-sm-6">
											<input type="email" class="form-control" name="email_kry" value="<?php echo set_value('email_kry', $kry->email_kry); ?>">
											<?php echo form_error('email_kry'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
											<a href="<?php echo site_url();?>admin/karyawan" class="btn btn-xs btn-danger" role="button">
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
        $('#tgl_lahir').datepicker({
			locale:'id',
            format: "dd-mm-yyyy",
            autoclose: true
        });

		$('#tgl_masuk').datepicker({
			locale:'id',
            format: "dd-mm-yyyy",
            autoclose: true
        });
    });
</script>
</body>
</html>

