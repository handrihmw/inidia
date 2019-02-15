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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
								<i class="fa fa-angle-double-left"></i></a> Notification</h2>
								<ul class="breadcrumb">                            
									<li class="breadcrumb-item active">Notification</li>
									<li class="breadcrumb-item active">Karyawan Baru</li>
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
									<?php
									if($this->session->flashdata("message"))
									{
									echo "
									<div class='alert alert-success'>
										".$this->session->flashdata("message")."
									</div>
									";
									}
									?>

    								<form method="post" action="<?php echo base_url(); ?>admin/send" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-xl-10">
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label"></label>
												<div class="col-sm-6">
													<select class="form-control" id="kodeku_">
														<option disabled selected >--Pilih Karyawan--</option>
														<?php foreach($idn as $id_) { ?>
															<option value="<?php echo $id_->id_kry;?>"><?php echo $id_->nama_kry;?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Nama Karyawan</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="nama_" name="nama" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">NIK</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="nik_" name="nik" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Jabatan</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="jabatan_" name="jabatan" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
												<div class="col-sm-6">
													<input type="text" id="tgl_" class="form-control" name="tgl_lahir" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">No. Handphone</label>
												<div class="col-sm-6">
													<input id="hp_" type="text" class="form-control" id="dep_" name="hp" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Email</label>
												<div class="col-sm-6">
													<input id="email_" type="text" class="form-control" id="dep_" name="email" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-6">
													<textarea id="alamat_" name="alamat" class="form-control" required rows="8" readonly></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Foto</label>
												<div class="col-sm-6">
													<div class="file-upload">
														<div class="file-select">
															<div class="file-select-button" id="fileName">Choose File</div>
															<div class="file-select-name" id="noFile">No file chosen...</div> 
																<input type="file" name="resume" id="chooseFile">
															</div><br>
															<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i> Kirim</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								</div>							
							</div><!-- end card-->					
						</div>
					</div>
				</div>
				<!-- End Main Content -->
			</div>
			<?php include ('decorations/footer.php');?>
			<script src="<?php echo base_url() ?>assets/js/upload.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#kodeku_').on('input',function(){
						var id_kry = $(this).val();
						$.ajax({
							type : "POST",
							url  : "<?php echo base_url('admin/get_karyawan_notif')?>",
							dataType : "JSON",
							data : {id_kry: id_kry},
							cache:false,
							success: function(data){
								$.each(data,function(id_kry, nama_kry, nik_kry, jabatan_kry, tgl_lahir_kry, email_kry, alamat_kry){
									$('[id="nama_"]').val(data.nama_kry);
									$('[id="nik_"]').val(data.nik_kry);
									$('[id="jabatan_"]').val(data.jabatan_kry);
									$('[id="tgl_"]').val(data.tgl_lahir_kry);
									$('[id="email_"]').val(data.email_kry);
									$('[id="hp_"]').val(data.no_hp_kry);
									$('[id="alamat_"]').val(data.alamat_kry);
								});   
							}
						});
						return false;
					});
				});
			</script>
		</body>
	</html>

