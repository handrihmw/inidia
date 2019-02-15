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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Permohonan</h2>
								<ul class="breadcrumb">                          
									<li class="breadcrumb-item active">Permohonan</li>
									<li class="breadcrumb-item active">Tambah Cuti</li>
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
									<?php echo form_open('admin/save_cuti', ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode User</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_user" readonly value="<?php echo set_value('id_user'); ?>">
											<?php echo form_error('id_user'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Cuti</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_ct" readonly value="<?php echo set_value('id_ct'); ?><?= $kode; ?>">
											<?php echo form_error('id_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="namanya" name="nama_ct"  value="<?php echo set_value('nama_ct'); ?>">
											<?php echo form_error('nama_ct'); ?>
										</div>
									</div>
									<!-- <div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Divisi Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="divisi_" name="divisi_ct"  value="<?php echo set_value('divisi_ct'); ?>">
											<?php echo form_error('divisi_ct'); ?>
										</div>
									</div> -->
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Divisi Pemohon</label>
										<div class="col-sm-6">
											<select type="text" class="form-control" name="divisi_ct" value="<?php echo set_value('divisi_ct'); ?>">
												<option value="disabled selected">--Pilih Divisi--</option>
												<?php foreach($divisi as $dvs) { ?>
													<option value="<?php echo $dvs->divisi;?>"><?php echo $dvs->divisi;?></option>
												<?php } ?>
											</select>
											<?php echo form_error('divisi_kry'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal</label>
										<div class="col-sm-6">
											<input id="date" type="text" class="form-control" name="tgl_ct"  value="<?php echo set_value('tgl_ct'); ?>">
											<?php echo form_error('tgl_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jenis Cuti</label>
										<div class="col-sm-6">
											<select class="form-control" name="jenis_ct">
												<option value="">--Pilih Alasan--</option>
												<option value="SCK. Cuti Sakit - 365 Hari">SCK. Cuti Sakit - 365 Hari</option>
												<option value="UPL. Tidak Dibayar - 3 Hari">UPL. Tidak Dibayar - 3 Hari</option>
												<option value="Lainnya">Lainnya</option>
											</select>
											<?php echo form_error('jenis_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Alasan Cuti</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="alasan_ct" value="<?php echo set_value('alasan_ct'); ?>"><?php echo set_value('alasan_ct'); ?></textarea>
											<?php echo form_error('alasan_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Informasi Lain</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="informasi_ct" value="<?php echo set_value('informasi_ct'); ?>"><?php echo set_value('informasi_ct'); ?></textarea>
											<?php echo form_error('informasi_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
									<label class="col-sm-3 col-form-label">Nama PJS</label>
										<div class="col-sm-6">
											<select class="form-control" name="pjs_ct" value="<?php echo set_value('pjs_ct'); ?>">
												<option selected>--Pilih PJS--</option>
            									<?php foreach($pjs as $row)
													{ echo '<option value="'.$row->nama_kry.'">'.$row->nama_kry.'</option>';}
												?>
											</select>
											<?php echo form_error('pjs_ct'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="status_ct"  value="Pending" readonly>
											<?php echo form_error('status_ct'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
											<a href="<?php echo site_url();?>admin/cuti" class="btn btn-xs btn-danger" role="button">
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
		<script src="<?php echo base_url() ?>assets/js/jquery.mask.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#date').mask('00-00-0000',{placeholder:"dd-mm-yyyy"});
				$('#kode').on('input',function(){
					var id_kry = $(this).val();
					$.ajax({
						type : "POST",
						url  : "<?php echo base_url('admin/get_cuti')?>",
						dataType : "JSON",
						data : {id_kry: id_kry},
						cache:false,
						success: function(data){
							$.each(data,function(id_kry, nama_kry, divisi_kry){
								$('[id="nama_"]').val(data.nama_kry);
								$('[id="divisi_"]').val(data.divisi_kry); 
							});
						}
					});
                return false;
           		});
			});
		</script>
		<script type="text/javascript">
		$(document).ready(function(){
		    $('#namanya').autocomplete({
                source: "<?php echo site_url('admin/get_autocomplete');?>",
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $("#form_search").submit(); 
                	}
            	});
			});
		</script>
	</body>
</html>

