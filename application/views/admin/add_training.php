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
									<li class="breadcrumb-item active">Tambah Karyawan Training</li>
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
									<?php echo form_open('admin/save_training', ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">DATA PEMOHON</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Training</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_tr" readonly value="<?= $kode; ?>"<?php echo set_value('id_tr'); ?>">
											<?php echo form_error('id_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label"></label>
										<div class="col-sm-6">
											<select class="form-control" id="kodeku_">
												<option disabled selected >--Pilih Karyawan--</option>
												<?php foreach($idk as $id_) { ?>
													<option value="<?php echo $id_->id_kry;?>"><?php echo $id_->nama_kry;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Karyawan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="nama_" name="nama_tr" value="<?php echo set_value('nama_tr'); ?>" readonly>
											<?php echo form_error('nama_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">NIK</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="nik_" name="nik_tr" value="<?php echo set_value('nik_tr'); ?>" readonly>
											<?php echo form_error('nik_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jabatan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="jabatan_" name="jabatan_tr" value="<?php echo set_value('jabatan_tr'); ?>" readonly>
											<?php echo form_error('jabatan_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Departemen</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="dep_" name="dep_tr" value="<?php echo set_value('dep_tr'); ?>" readonly>
											<?php echo form_error('dep_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Permohonan</label>
										<div class="col-sm-6">
											<input type="text" id="tgl_permohonan" class="form-control" name="tgl_pmhn_tr" value="<?php echo set_value('tgl_pmhn_tr'); ?>">
											<?php echo form_error('tgl_pmhn_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">DATA PERMINTAAN TRAINING</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Judul Training</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="judul_training_tr" value="<?php echo set_value('judul_training_tr'); ?>">
											<?php echo form_error('judul_training_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Penyelenggara</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="penyelenggara_tr" value="<?php echo set_value('penyelenggara_tr'); ?>">
											<?php echo form_error('penyelenggara_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Waktu Pelaksanaan</label>
										<div class="col-sm-6">
											<input id="tgl_pelaksanaan" type="text" class="form-control" name="tgl_pelaksanaan_tr" value="<?php echo set_value('tgl_pelaksanaan_tr'); ?>">
											<?php echo form_error('tgl_pelaksanaan_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tempat Pelaksanaan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="tempat_pelaksanaan_tr" value="<?php echo set_value('tempat_pelaksanaan_tr'); ?>">
											<?php echo form_error('tempat_pelaksanaan_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">BIAYA TRAINING</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Biaya</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" class="uang" name="biaya_tr" value="<?php echo set_value('biaya_tr'); ?>">
											<?php echo form_error('biaya_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Cara Pembayaran</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="pembayaran_tr" value="<?php echo set_value('pembayaran_tr'); ?>">
											<?php echo form_error('pembayaran_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-6 col-form-label">PROSES DI HRD</label>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Diterima</label>
										<div class="col-sm-6">
											<input id="tgl_terima" type="text" name="tgl_terima_tr" class="form-control" value="<?php echo set_value('tgl_terima_tr'); ?>">
											<?php echo form_error('tgl_terima_tr'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
										<div class="col-sm-6">
											<input id="date" type="text" name="tgl_bayar_tr" class="form-control" value="<?php echo set_value('tgl_bayar_tr'); ?>">
											<?php echo form_error('tgl_bayar_tr'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
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
		<script src="<?php echo base_url() ?>assets/js/jquery.mask.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
		<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$.fn.datepicker.dates['id'] = {
				days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
				daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
				daysMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
				months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
				today: "Hari Ini",
				clear: "Clear",
				format: "dd-mm-yyyy",
				titleFormat: "MM yyyy",
				weekStart: 0
			};
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#tgl_permohonan').datepicker({
					format: "dd-mm-yyyy",
					language: "id",
					endDate: "0d",
					autoclose: true
				});

				$('#tgl_pelaksanaan').datepicker({
					format: "dd-mm-yyyy",
					language: "id",
					endDate: "0d",
					autoclose: true
				});

				$('#tgl_terima').datepicker({
					format: "dd-mm-yyyy",
					language: "id",
					endDate: "0d",
					autoclose: true
				});

				$('#tgl_bayar').datepicker({
					format: "dd-mm-yyyy",
					language: "id",
					endDate: "0d",
					autoclose: true
				});

				$('#date').mask('00-00-0000',{placeholder:"dd-mm-yyyy"});

			});

			$(document).ready(function(){
				$('#kodeku_').on('input',function(){	
					var id_kry = $(this).val();
					$.ajax({
						type : "POST",
						url  : "<?php echo base_url('admin/get_karyawan')?>",
						dataType : "JSON",
						data : {id_kry: id_kry},
						cache:false,
						success: function(data){
							$.each(data,function(id_kry, nama_kry, nik_kry, jabatan_kry, dep_kry){
								$('[id="nama_"]').val(data.nama_kry);
								$('[id="nik_"]').val(data.nik_kry);
								$('[id="jabatan_"]').val(data.jabatan_kry);
								$('[id="dep_"]').val(data.dep_kry);
							});   
						}
					});
					return false;
				});
			}); 

			$(document).ready(function(){
				// Format mata uang.
				$( '.uang' ).mask('0.000.000.000', {reverse: true});
				// Format nomor HP.
				$( '.no_hp' ).mask('0000−0000−0000');
				// Format tahun pelajaran.
				$( '.tapel' ).mask('0000/0000');
			})
		</script>
	</body>
</html>

