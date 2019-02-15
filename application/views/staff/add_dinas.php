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
									<li class="breadcrumb-item active">Tambah Perjalanan Dinas</li>
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
									<?php echo form_open('staff/save_dinas', ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kode Dinas</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_dns" readonly value="<?php echo set_value('id_dns'); ?><?= $kode; ?>">
											<?php echo form_error('id_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jenis Tujuan</label>
										<div class="col-sm-6">
											<select class="form-control" name="jenis_dns">
												<option value="">--Pilih Tujuan--</option>
												<option value="Domestik">Domestik</option>
												<option value="Manca Negara">Manca Negara</option>
											</select>
											<?php echo form_error('jenis_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Kepentingan Dinas</label>
										<div class="col-sm-6">
											<select class="form-control" name="kepentingan_dns">
												<option value="">--Pilih Kepentingan--</option>
												<option value="Perjalanan Dinas">Perjalanan Dinas</option>
												<option value="Perjalanan Non Dinas">Perjalanan Non Dinas</option>
											</select>
											<?php echo form_error('kepentingan_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="nama_dns"  value="<?= $this->session->userdata('name') ?>">
											<?php echo form_error('nama_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jumlah Tujuan</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="total_dns"  value="<?php echo set_value('total_dns'); ?>">
											<?php echo form_error('total_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Awal</label>
										<div class="col-sm-6">
											<input id="tgl_awal" type="text" class="form-control" name="tgl_awal_dns"  value="<?php echo set_value('tgl_awal_dns'); ?>">
											<?php echo form_error('tgl_awal_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Akhir</label>
										<div class="col-sm-6">
											<input id="tgl_akhir" type="text" class="form-control" name="tgl_akhir_dns"  value="<?php echo set_value('tgl_akhir_dns'); ?>">
											<?php echo form_error('tgl_akhir_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tujuan</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="tujuan_dns" value="<?php echo set_value('tujuan_dns'); ?>"><?php echo set_value('tujuan_dns'); ?></textarea>
											<?php echo form_error('tujuan_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Pembayaran Awal</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" name="pembayaran_dns"  value="<?php echo set_value('pembayaran_dns'); ?>">
											<?php echo form_error('pembayaran_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
										<div class="col-sm-6">
											<input id="tgl_bayar" type="text" class="form-control" name="tgl_bayar_dns"  value="<?php echo set_value('tgl_bayar_dns'); ?>">
											<?php echo form_error('tgl_bayar_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="keterangan_dns" value="<?php echo set_value('keterangan_dns'); ?>"><?php echo set_value('keterangan_dns'); ?></textarea>
											<?php echo form_error('keterangan_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
									<label class="col-sm-3 col-form-label">Nama PJS</label>
										<div class="col-sm-6">
											<select class="form-control" name="pjs_dns" value="<?php echo set_value('pjs_dns'); ?>">
												<option selected>--Pilih PJS--</option>
            									<?php foreach($pjs as $row)
													{ echo '<option value="'.$row->nama_kry.'">'.$row->nama_kry.'</option>';}
												?>
											</select>
											<?php echo form_error('pjs_dns'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="status_dns"  value="Pending" readonly>
											<?php echo form_error('status_dns'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
											<a href="<?php echo site_url();?>staff/dinas" class="btn btn-xs btn-danger" role="button">
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
				$('#tgl_awal').mask('00-00-0000',{placeholder:"dd-mm-yyyy"});
				$('#tgl_akhir').mask('00-00-0000',{placeholder:"dd-mm-yyyy"});
				$('#tgl_bayar').mask('00-00-0000',{placeholder:"dd-mm-yyyy"});

				$('#kode').on('input',function(){
					var id_kry = $(this).val();
					$.ajax({
						type : "POST",
						url  : "<?php echo base_url('staff/get_dinas')?>",
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

