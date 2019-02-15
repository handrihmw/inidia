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
									<li class="breadcrumb-item active">Permohonan Karyawan</li>
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
									<?php echo form_open('admin/save_permohonan', ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="dep" class="col-sm-3 col-form-label">DATA PEMOHON</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Permohonan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_pmhn" readonly value="<?= $kode; ?>"<?php echo set_value('id_pmhn'); ?>">
											<?php echo form_error('id_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Departemen</label>
										<div class="col-sm-6">
											<select class="form-control" name="dep_pmhn" value="<?php echo set_value('dep_pmhn'); ?>">
												<option disabled selected>-Pilih Departemen-</option>
												<?php foreach($dep as $dep_) { ?>
													<option value="<?php echo $dep_->departemen;?>"><?php echo $dep_->departemen;?></option>
												<?php } ?>
											</select>
											<?php echo form_error('dep_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label"></label>
										<div class="col-sm-6">
											<select class="form-control" id="idk_">
												<option disabled selected >--Pilih Pemohon--</option>
													<?php foreach($idk as $id_) { ?>
														<option value="<?php echo $id_->id_kry;?>"><?php echo $id_->nama_kry;?></option>
													<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="nama_" name="nama_pemohon_pmhn" value="<?php echo set_value('nama_pemohon_pmhn'); ?>" readonly>
											<?php echo form_error('nama_pemohon_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jabatan Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="jabatan_" name="jabatan_pemohon_pmhn" value="<?php echo set_value('jabatan_pemohon_pmhn'); ?>" readonly>
											<?php echo form_error('jabatan_pemohon_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">KLASIFIKASI KEBUTUHAN</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jabatan</label>
										<div class="col-sm-6">
											<select class="form-control" name="jabatan_pmhn" value="<?php echo set_value('jabatan_pmhn'); ?>">
												<option disabled selected >-Pilih Jabatan-</option>                   
												<?php foreach($jbt as $jbt_) { ?>
													<option value="<?php echo $jbt_->jabatan;?>"><?php echo $jbt_->jabatan;?></option>
												<?php } ?>
											</select>
											<?php echo form_error('jabatan_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Lokasi</label>
										<div class="col-sm-6">
											<select class="form-control" name="lokasi_pmhn" value="<?php echo set_value('lokasi_pmhn'); ?>">
												<option disabled selected >-Pilih Lokasi-</option>
												<?php foreach($unt as $unt_) { ?>
													<option value="<?php echo $unt_->unit;?>"><?php echo $unt_->unit;?></option>
												<?php } ?>
											</select>
											<?php echo form_error('lokasi_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Waktu Kerja</label>
										<div class="col-sm-6">
											<input id="tgl_kerja" type="text" class="form-control" name="waktu_pmhn" value="<?php echo set_value('waktu_pmhn'); ?>">
											<?php echo form_error('waktu_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status Pekerjaan</label>
										<div class="col-sm-6">
											<select class="form-control" name="status_kerja_pmhn" value="<?php echo set_value('status_kerja_pmhn'); ?>">
												<option disabled selected >--Pilih Status Pekerjaan--</option>
												<?php foreach($krj as $krj_) { ?>
													<option value="<?php echo $krj_->status_kerja;?>"><?php echo $krj_->status_kerja;?></option>
												<?php } ?>
											</select>
											<?php echo form_error('status_kerja_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jumlah</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="jumlah_pmhn" value="<?php echo set_value('jumlah_pmhn'); ?>">
											<?php echo form_error('jumlah_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal</label>
										<div class="col-sm-6">
											<input id="tgl_masuk" type="text" class="form-control" name="tanggal_pmhn" value="<?php echo set_value('tanggal_pmhn'); ?>">
											<?php echo form_error('tanggal_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Dasar Permohonan</label>
										<div class="col-sm-6">
											<select class="form-control" name="dasar_permohonan_pmhn" value="<?php echo set_value('dasar_permohonan_pmhn'); ?>">
												<option disabled selected >-Pilih Dasar Permohonan-</option>                   
												<?php foreach($pmh as $pmh_) { ?>
													<option value="<?php echo $pmh_->permohonan;?>"><?php echo $pmh_->permohonan;?></option>
												<?php } ?>
											</select>
											<?php echo form_error('dasar_permohonan_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Sumber Rekrutmen</label>
										<div class="col-sm-6">
											<select class="form-control" name="sumber_rekrutmen_pmhn" value="<?php echo set_value('sumber_rekrutmen_pmhn'); ?>">
												<option disabled selected >--Pilih Sumber Rekrutmen--</option>                   
												<?php foreach($rek as $rek_) { ?>
													<option value="<?php echo $rek_->rekrutmen;?>"><?php echo $rek_->rekrutmen;?></option>
												<?php } ?>
											</select>
											<?php echo form_error('sumber_rekrutmen_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Ringkasan Tugas & Tanggung Jawab</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="ringkasan_tugas_pmhn" value="<?php echo set_value('ringkasan_tugas_pmhn'); ?>"><?php echo set_value('ringkasan_tugas_pmhn'); ?></textarea>
											<?php echo form_error('ringkasan_tugas_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">PERSYARATAN</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Rate Gajih</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="gajih_pmhn" value="<?php echo set_value('gajih_pmhn'); ?>">
											<?php echo form_error('gajih_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>
										<div class="col-sm-6">
											<select class="form-control" name="jk_pmhn" value="<?php echo set_value('jk_pmhn'); ?>">
												<option disabled selected >--Pilih Jenis Kelamin--</option>
												<?php foreach($jkl as $jk_) { ?>
													<option value="<?php echo $jk_->jk;?>"><?php echo $jk_->jk;?></option>
												<?php } ?>
											</select>
											<?php echo form_error('jk_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Usia</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="usia_pmhn" value="<?php echo set_value('usia_pmhn'); ?>">
											<?php echo form_error('usia_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Pendidikan</label>
										<div class="col-sm-6">
											<select class="form-control" name="pendidikan_pmhn" value="<?php echo set_value('pendidikan_pmhn'); ?>">
												<option disabled selected >--Pilih Pendidikan--</option>
												<?php foreach($pdd as $pdd_) { ?>
													<option value="<?php echo $pdd_->pendidikan;?>"><?php echo $pdd_->pendidikan;?></option>
												<?php } ?>
											</select>
											<?php echo form_error('pendidikan_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jurusan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="jurusan_pmhn" value="<?php echo set_value('jurusan_pmhn'); ?>">
											<?php echo form_error('jurusan_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Pengalaman Kerja</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="pengalaman_kerja_pmhn"></textarea>
											<?php echo form_error('pengalaman_kerja_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Bidang</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="bidang_pmhn" value="<?php echo set_value('bidang_pmhn'); ?>">
											<?php echo form_error('bidang_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Syarat Lainnya</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="syarat_lain_pmhn"></textarea>
											<?php echo form_error('syarat_lain_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Keterampilan/ Keahlian khusus yang wajib dimiliki</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="keterampilan_pmhn"></textarea>
											<?php echo form_error('keterampilan_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">TANGGAL BERGABUNG</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Bergabung</label>
										<div class="col-sm-6">
											<input id="tgl_gabung" type="text" class="form-control" name="tgl_bergabung_pmhn" value="<?php echo set_value('tgl_bergabung_pmhn'); ?>">
											<?php echo form_error('tgl_bergabung_pmhn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">LAMPIRAN</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Office Equipment</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="office_equipment_pmhn"  value="<?php echo set_value('office_equipment_pmhn'); ?>"><?php echo set_value('office_equipment_pmhn'); ?></textarea>
											<?php echo form_error('office_equipment_pmhn'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
											<a href="<?php echo site_url();?>admin/permohonan" class="btn btn-xs btn-danger" role="button">
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
	$.fn.datepicker.dates['id'] = {
		days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
		daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
		daysMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
		months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
		monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
		today: "Hari Ini",
		clear: "Clear",
		format: "yyyy-mm-dd",
		titleFormat: "MM yyyy",
		weekStart: 0
	};
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#tgl_kerja').datepicker({
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

		$('#tgl_gabung').datepicker({
			format: "dd-mm-yyyy",
			language: "id",
			endDate: "0d",
			autoclose: true
		});

		$('#validasi').parsley();
	}); 

	$(document).ready(function(){
		$('#idk_').on('input',function(){
            var idk = $(this).val();
            $.ajax({
                type : "POST",
				url  : "<?php echo base_url('admin/get_karyawan')?>",
                dataType : "JSON",
                data : {id_kry: idk},
                cache:false,
                success: function(data){
                    $.each(data,function(id_kry, nama_kry, jabatan_kry){
                        $('[id="nama_"]').val(data.nama_kry);
                        $('[id="jabatan_"]').val(data.jabatan_kry);
                    });   
                }
            });
            return false;
        });
	});
</script>

</body>
</html>

