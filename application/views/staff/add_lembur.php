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
									<li class="breadcrumb-item active">Tambah Lembur</li>
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
									<?php echo form_open('staff/save_lembur', ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Lembur</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_ot" readonly value="<?php echo set_value('id_ot'); ?><?= $kode; ?>">
											<?php echo form_error('id_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Tanggal Permohonan</label>
										<div class="col-sm-6">
											<input id="date" type="text" class="form-control" name="tanggal_ot"  value="<?php echo set_value('tanggal_ot'); ?>">
											<?php echo form_error('tanggal_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Waktu (24 Jam)</label>
										<div class="col-sm-6">
											<form>
												<label class="radio-inline"><input type="radio" name="rad" id="rad1" value="1" class="rad"> Static Hour</label>&nbsp&nbsp
												<label class="radio-inline"><input type="radio" name="rad" id="rad2" value="2" class="rad"> Relative Hour</label>
												<div id="stt" style="display:none">
													<div class="form-group row">
														<table class="table table-responsive">
															<tbody>
																<tr>
																	<td><input type="checkbox" value=""> Sebelum Jadwal Kerja</label></td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>minutes</td>
																</tr>
																<tr>
																	<td><input type="checkbox" value=""> Istirahat</label></td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>minutes</td>
																</tr>
																<tr>
																	<td><input type="checkbox" value=""> Sesudah Jadwal Kerja</label></td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>minutes</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div id="rlt" style="display:none">
													<div class="form-group row">
														<table class="table">
															<tbody>
																<tr>
																	<td><input type="checkbox" value=""> Sebelum Jadwal Kerja</label></td>
																	<td>From</td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>to</td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>for</td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>minutes</td>
																</tr>
																<tr>
																	<td><input type="checkbox" value=""> Istirahat</label></td>
																	<td>From</td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>to</td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>for</td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>minutes</td>
																</tr>
																<tr>
																	<td><input type="checkbox" value=""> Sesudah Jadwal Kerja</label></td>
																	<td>From</td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>to</td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>for</td>
																	<td><input type="text" class="form-control" name="x_ot" placeholder="24:00" value="<?php echo set_value('x_ot'); ?>"></td>
																	<td>minutes</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</form>
											<!-- tambahkan jquery-->
											<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
											<script type="text/javascript">
												$(function(){
													$(":radio.rad").click(function(){
														$("#stt, #rlt").hide()
														if($(this).val() == "1"){
															$("#stt").show();
														}else{
															$("#rlt").show();
														}
													});
												});
											</script>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Waktu Permohonan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="waktu_" name="waktu_ot"  value="<?php echo set_value('waktu_ot'); ?>">
											<?php echo form_error('waktu_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="namanya" name="nama_ot"  value="<?= $this->session->userdata('name') ?>">
											<?php echo form_error('nama_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="keterangan_ot" value="<?php echo set_value('keterangan_ot'); ?>"><?php echo set_value('keterangan_ot'); ?></textarea>
											<?php echo form_error('keterangan_ot'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="status_ot"  value="Pending" readonly>
											<?php echo form_error('status_ot'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
											<a href="<?php echo site_url();?>staff/lembur" class="btn btn-xs btn-danger" role="button">
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
						url  : "<?php echo base_url('staff/get_lembur')?>",
						dataType : "JSON",
						data : {id_kry: id_kry},
						cache:false,
						success: function(data){
							$.each(data,function(id_kry, nama_kry, waktu_kry){
								$('[id="nama_"]').val(data.nama_kry);
								$('[id="waktu_"]').val(data.waktu_kry); 
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
                source: "<?php echo site_url('staff/get_autocomplete');?>",
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $("#form_search").submit(); 
                	}
            	});
			});
		</script>
	</body>
</html>

