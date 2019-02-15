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
									<li class="breadcrumb-item active">Man Power Planning</li>
									<li class="breadcrumb-item active">Tambah Man Power Planning</li>
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
								<?php echo form_open('admin/save_mpp', ['class' => 'form-horizontal', 'method' => 'post']); ?>
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Kode MPP</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="id_pp" readonly value="<?php echo set_value('id_pp'); ?><?= $kode; ?>">
										<?php echo form_error('id_pp'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="jbt" class="col-sm-3 col-form-label">Jabatan</label>
									<div class="col-sm-6">
										<select class="form-control" name="jabatan_pp" value="<?php echo set_value('jabatan_pp'); ?>">
											<option value="disabled selected">--Pilih Jabatan--</option>                   
											<?php foreach($jbt as $jbt_) { ?>
												<option value="<?php echo $jbt_->jabatan;?>"><?php echo $jbt_->jabatan;?></option>
											<?php } ?>
										</select>
										<?php echo form_error('jabatan_pp'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Departemen</label>
									<div class="col-sm-6">
										<select class="form-control" name="dep_pp" value="<?php echo set_value('dep_pp'); ?>">
											<option value="disabled selected">--Pilih Departemen--</option>
											<?php foreach($dep as $dep_) { ?>
												<option value="<?php echo $dep_->departemen;?>"><?php echo $dep_->departemen;?></option>
											<?php } ?>
										</select>
										<?php echo form_error('dep_pp'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Area</label>
									<div class="col-sm-6">
										<select class="form-control" name="area_pp" value="<?php echo set_value('area_pp'); ?>">
											<option disabled selected >-Pilih Area-</option>
											<?php foreach($area as $unt_) { ?>
												<option value="<?php echo $unt_->kode;?>"><?php echo $unt_->kode;?> - <?php echo $unt_->unit;?></option>
											<?php } ?>
										</select>
										<?php echo form_error('area_pp'); ?>
									</div>
								</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Status</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="status_pp" value="<?php echo set_value('status_pp'); ?>">
									<?php echo form_error('status_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Jumlah dibutuhkan</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" name="jml_butuh_pp" value="<?php echo set_value('jml_butuh_pp'); ?>">
									<?php echo form_error('jml_butuh_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Sisa</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" name="sisa_pp" value="<?php echo set_value('sisa_pp'); ?>">
									<?php echo form_error('sisa_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
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
								<label for="" class="col-sm-3 col-form-label"></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="nama_" name="nama_pmh_pp" value="<?php echo set_value('nama_pmh_pp'); ?>" readonly>
									<?php echo form_error('nama_pmh_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Jabatan Pemohon</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="jabatan_" name="jabatan_pmh_pp" value="<?php echo set_value('jabatan_pmh_pp'); ?>">
									<?php echo form_error('jabatan_pmh_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Tanggal Permohonan</label>
								<div class="col-sm-6">
									<input type="text" id="tgl_permohonan" class="form-control" name="tgl_pmh_pp" value="<?php echo set_value('tgl_pmh_pp'); ?>">
									<?php echo form_error('tgl_pmh_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Tanggal Jatuh Tempo</label>
								<div class="col-sm-6">
									<input type="text" id="tgl_tempo" class="form-control" name="tgl_tempo_pp" value="<?php echo set_value('tgl_tempo_pp'); ?>">
									<?php echo form_error('tgl_tempo_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Wawancara GM</label>
								<div class="col-sm-6">
									<input type="text" id="tgl_wawancara" class="form-control" name="tgl_wawancara_pp" value="<?php echo set_value('tgl_wawancara_pp'); ?>">
									<?php echo form_error('tgl_wawancara_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Tanggal Pemenuhan</label>
								<div class="col-sm-6">
									<input type="text" id="tgl_pemenuhan" class="form-control" name="tgl_pmnh_pp" value="<?php echo set_value('tgl_pmnh_pp'); ?>">
									<?php echo form_error('tgl_pmnh_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Kecepatan Pemenuhan (%)</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="kcp_pmnh_pp" value="<?php echo set_value('kcp_pmnh_pp'); ?>">
									<?php echo form_error('kcp_pmnh_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Total Pemenuhan</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" name="total_pp" value="<?php echo set_value('total_pp'); ?>">
									<?php echo form_error('total_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Tanggal Masuk Karyawan</label>
								<div class="col-sm-6">
									<input type="text" id="tgl_masuk" class="form-control" name="tgl_masuk_pp" value="<?php echo set_value('tgl_masuk_pp'); ?>">
									<?php echo form_error('tgl_masuk_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Sumber Rekrutmen</label>
								<div class="col-sm-6">
									<select class="form-control" name="sumber_rek_pp" value="<?php echo set_value('sumber_rek_pp'); ?>">
										<option disabled selected >--Pilih Sumber Rekrutmen--</option>                   
										<?php foreach($rek as $row) { ?>
											<option value="<?php echo $row->rekrutmen;?>"><?php echo $row->rekrutmen;?></option>
										<?php } ?>
									</select>
									<?php echo form_error('sumber_rek_pp'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Keterangan</label>
								<div class="col-sm-6">
									<textarea class="form-control" rows="5" cols="30" name="ket_pp" ></textarea>
									<?php echo form_error('ket_pp'); ?>
								</div>
							</div>
							<br>
							<div class="form-group row">
								<div class="col-sm-6">
									<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
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
			titleFormat: "MM yyyy", /* Leverages same syntax as ‘format’ */
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

