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
									<li class="breadcrumb-item active">Tambah Izin</li>
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
									<?php echo form_open('admin/save_izin', ['class' => 'form-horizontal', 'method' => 'post']); ?>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Kode Izin</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="id_izn" readonly value="<?php echo set_value('id_izn'); ?><?= $kode; ?>">
											<?php echo form_error('id_izn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Tanggal Permintaan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="tgl_minta" name="tgl_minta_izn"  value="<?php echo set_value('tgl_minta_izn'); ?>">
											<?php echo form_error('tgl_minta_izn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Tanggal Akhir</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="tgl_akhir" name="tgl_akhir_izn"  value="<?php echo set_value('tgl_akhir_izn'); ?>">
											<?php echo form_error('tgl_akhir_izn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Nama Pemohon</label>
										<div class="col-sm-6">
											<input id="date" type="text" class="form-control" name="nama_izn"  value="<?php echo set_value('nama_izn'); ?>">
											<?php echo form_error('nama_izn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Jenis Cuti</label>
										<div class="col-sm-6">
											<select class="form-control" name="jenis_izn">
												<option value="">--Pilih Alasan--</option>
												<option value="Ayah Ibu Mertua Saudara Meninggal Dunia [2 Hari] - Sisa 1 Hari">Ayah Ibu Mertua Saudara Meninggal Dunia [2 Hari] - Sisa 1 Hari</option>
												<option value="Bencana Alam [2 Hari] - Sisa 1 Hari">Bencana Alam [2 Hari] - Sisa 1 Hari</option>
												<option value="Baptisan Anak Karyawan [1 Hari] - Sisa 1 Hari">Baptisan Anak Karyawan [1 Hari] - Sisa 1 Hari</option>
												<option value="Deceased of Spouse Husband Child [2 Hari] - Sisa 1 Hari">Deceased of Spouse Husband Child [2 Hari] - Sisa 1 Hari</option>
												<option value="Istri Karyawan Melahirkan [2 Hari] - Sisa 1 Hari">Istri Karyawan Melahirkan [2 Hari] - Sisa 1 Hari</option>
												<option value="Izin Setengah Hari [2 Hari] - Sisa 1 Hari">Izin Setengah Hari [2 Hari] - Sisa 1 Hari</option>
												<option value="Karyawan Menikah [2 Hari] - Sisa 1 Hari">Karyawan Menikah [2 Hari] - Sisa 1 Hari</option>
												<option value="Pernikahan Saudara Kandung [2 Hari] - Sisa 1 Hari">Pernikahan Saudara Kandung [2 Hari] - Sisa 1 Hari</option>
												<option value="Pernikahan Anak Karyawan [2 Hari] - Sisa 1 Hari">Pernikahan Anak Karyawan [2 Hari] - Sisa 1 Hari</option>
												<option value="Tanggungan Karyawan Meninggal Dunia [2 Hari] - Sisa 1 Hari">Tanggungan Karyawan Meninggal Dunia [2 Hari] - Sisa 1 Hari</option>
											</select>
											<?php echo form_error('jenis_izn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Alasan Izin</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="30" name="alasan_izn" value="<?php echo set_value('alasan_izn'); ?>"><?php echo set_value('alasan_izn'); ?></textarea>
											<?php echo form_error('alasan_izn'); ?>
										</div>
									</div>
									<div class="form-group row">
									<label class="col-sm-3 col-form-label">Nama PJS</label>
										<div class="col-sm-6">
											<select class="form-control" name="pjs_izn" value="<?php echo set_value('pjs_izn'); ?>">
												<option selected>--Pilih PJS--</option>
            									<?php foreach($pjs as $row)
													{ echo '<option value="'.$row->nama_kry.'">'.$row->nama_kry.'</option>';}
												?>
											</select>
											<?php echo form_error('pjs_izn'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="status_izn"  value="Pending" readonly>
											<?php echo form_error('status_izn'); ?>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
											<a href="<?php echo site_url();?>admin/izin" class="btn btn-xs btn-danger" role="button">
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
				$('#tgl_minta').mask('00-00-0000',{placeholder:"dd-mm-yyyy"});	
				$('#tgl_akhir').mask('00-00-0000',{placeholder:"dd-mm-yyyy"});
			});
		</script>
	</body>
</html>

