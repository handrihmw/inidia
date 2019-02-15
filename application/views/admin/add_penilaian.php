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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Dashboard</h2>
								<ul class="breadcrumb">                          
									<li class="breadcrumb-item active">Karyawan</li>
									<li class="breadcrumb-item active">Tambah Penilaian Karyawan</li>
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
								<div class="alert alert-info alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<i class="fa fa-info-circle"></i> <b>PETUNJUK PENILAIAN</b> <br>
									<p>Nilai dibawah ini digunakan untuk penilaian karyawan:</p>
									<p><b>4 Sangat Baik :</b> Secara keseluruhan kinerja Karyawan istimewa dan melampaui standar/target yang diberikan. 
									Berjasa memberi nilai tambah suatu hasil  ilai kerja, menghasilkan karya yang meningkatkan produktifitas/kualitas secara nyata.</p>
									<p><b>3 Baik :</b> Kinerja Karyawan sesuai/sedikit diatas standar/target yang ditetapkan. Target terlampaui. Bisa diandalkan dan diberi tanggung jawab lebih.</p>
									<p><b>2 Cukup :</b> Kinerja Karyawan sedkit dibawah standar. Beberapa target tidak tercapai. Masih memerlukan bantuan/arahan/bimbingan.</p>
									<p><b>1 Sangat Kurang :</b> Kinerja Karyawan dibawah standar. Hampir tidak memenuhi semua standar/target kerja. Membutuhkan bantuan/arahan/bimbingan yang sangat intensif.</p>
									<p><b>-1 Buruk :</b> Kinerja Karyawan jauh dibawah standar, tidak memenuhi semua standar/target kerja. Kerja Karyawan perlu ditinjau kembali.</p>
								</div>

								<?php echo form_open('admin/save_penilaian', ['class' => 'form-horizontal', 'method' => 'post']); ?>
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Kode Penilaian</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="id_nl" readonly value="<?php echo set_value('id_nl'); ?><?= $kode; ?>">
										<?php echo form_error('id_nl'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label"></label>
									<div class="col-sm-6">
										<select class="form-control" id="kodeku_" >
											<option disabled selected >--Pilih Karyawan--</option>
											<?php foreach($idk as $row) { ?>
												<option value="<?php echo $row->id_kry;?>"><?php echo $row->nama_kry;?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="dep" class="col-sm-3 col-form-label">Nama Lengkap</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="nama_" name="nama_nl"  value="<?php echo set_value('nama_nl'); ?>" readonly>
										<?php echo form_error('nama_nl'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_pemohon" class="col-sm-3 col-form-label">NIK</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="nik_" name="nik_nl"  value="<?php echo set_value('nik_nl'); ?>" readonly>
										<?php echo form_error('nik_nl'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="jbt" class="col-sm-3 col-form-label">Departemen</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="dep_" name="dep_nl"  value="<?php echo set_value('dep_nl'); ?>" readonly>
										<?php echo form_error('dep_nl'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Tanggal Masuk</label>
									<div class="col-sm-6">
										<input type="text" id="tgl_"  name="tgl_masuk_nl" class="form-control" readonly>
										<?php echo form_error('tgl_masuk_nl'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Jabatan Karyawan</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="jabatan_" name="jabatan_nl"  value="<?php echo set_value('jabatan_nl'); ?>" readonly>
										<?php echo form_error('jabatan_nl'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label"></label>
									<div class="col-sm-6">
										<select class="form-control" id="penilai_">
											<option disabled selected>--Pilih Penilai--</option>
											<?php foreach($idp as $row) { ?>
												<option value="<?php echo $row->id_penilai;?>"><?php echo $row->nama_penilai;?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="dep" class="col-sm-3 col-form-label">Nama Penilai</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="namapn_" name="nama_penilai_nl"  value="<?php echo set_value('nama_penilai_nl'); ?>" readonly>
										<?php echo form_error('nama_penilai_nl'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Jabatan Penilai</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="jabatanpn_" name="jabatan_penilai_nl"  value="<?php echo set_value('jabatan_penilai_nl'); ?>" readonly>
										<?php echo form_error('jabatan_penilai_nl'); ?>
									</div>
								</div>
								<br>
								<div class="form-group row">
									<div class="col-sm-6">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
										<a href="<?php echo site_url();?>admin/penilaian" class="btn btn-xs btn-danger" role="button">
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
	$.fn.datepicker.dates['id'] = {
				days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
				daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
				daysMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
				months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
				today: "Hari Ini",
				clear: "Clear",
				format: "dd-mm-yyyy",
				weekStart: 0
	};
</script>
<script type="text/javascript">
    $(document).ready(function () {
		$('#tgl_masuk').datepicker({
			format: "dd-mm-yyyy",
			language: "id",
			endDate: "0d",
			autoclose: true
        });
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
                    $.each(data,function(id_kry, nama_kry, nik_kry, dep_kry, tgl_masuk_kry, jabatan_kry){
                        $('[id="nama_"]').val(data.nama_kry);
                        $('[id="nik_"]').val(data.nik_kry);
                        $('[id="dep_"]').val(data.dep_kry);
						$('[id="jabatan_"]').val(data.jabatan_kry);
                        $('[id="tgl_"]').val(data.tgl_masuk_kry);
                    });   
                }
            });
            return false;
        });
	});

	$(document).ready(function(){
		$('#penilai_').on('input',function(){
                
            var id_penilai = $(this).val();
            $.ajax({
                type : "POST",
				url  : "<?php echo base_url('admin/get_penilai')?>",
                dataType : "JSON",
                data : {id_penilai: id_penilai},
                cache:false,
                success: function(data){
                    $.each(data,function(id_penilai, nama_penilai, jabatan_penilai){
                        $('[id="namapn_"]').val(data.nama_penilai);
                        $('[id="jabatanpn_"]').val(data.jabatan_penilai);
                    });   
                }
            });
            return false;
        });

	});
</script>

</body>
</html>

