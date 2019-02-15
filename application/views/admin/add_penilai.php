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
									<li class="breadcrumb-item active">Tambah Penilai</li>
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
									<?php echo form_open('admin/save_penilai', ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Penilai</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_penilai" readonly value="<?php echo set_value('id_penilai'); ?><?= $kode; ?>">
											<?php echo form_error('id_penilai'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label"></label>
										<div class="col-sm-6">
											<select class="form-control" name="id" id="kodeku_">
												<option disabled selected>-Pilih Nama Penilai-</option>
												<?php foreach($idk as $row) { ?>
													<option value="<?php echo $row->id_kry;?>"><?php echo $row->nama_kry;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Penilai</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="nama_" name="nama_penilai"  value="<?php echo set_value('nama_penilai'); ?>" readonly>
											<?php echo form_error('nama_penilai'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">NIK</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="nik_" name="nik_penilai"  value="<?php echo set_value('nik_penilai'); ?>" readonly>
											<?php echo form_error('nik_penilai'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jabatan Penilai</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="jabatan_" name="jabatan_penilai"  value="<?php echo set_value('jabatan_penilai'); ?>" readonly>
											<?php echo form_error('jabatan_penilai'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
											<a href="<?php echo site_url();?>admin/penilai" class="btn btn-xs btn-danger" role="button">
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
		<script type="text/javascript">
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
							$.each(data,function(id_kry, nama_kry, nik_kry, jabatan_kry){
								$('[id="nama_"]').val(data.nama_kry);
								$('[id="nik_"]').val(data.nik_kry);
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

