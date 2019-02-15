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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Karyawan</h2>
								<ul class="breadcrumb">                      
									<li class="breadcrumb-item">Karyawan</li>
									<li class="breadcrumb-item active">Detail Penilaian Karyawan</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h5><i class="fa fa-address-card"></i> <?php echo $judul; ?></h5>
                                </div>
                                <div class="body">
                                    <table class="table table-bordered" width="100%" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <?php foreach ($karyawan as $kry): ?>
                                            <tr>
                                                <td width="15%"> Kode Penilaian </td>
                                                <td><?= $kry->id_nl ?></td>
                                            </tr>
                                            <tr>
                                                <td width="15%"> Nama Karyawan </td>
                                                <td><?= $kry->nama_nl ?></td>
                                            </tr>
                                            <tr>
                                                <td> NIK </td>
                                                <td><?= $kry->nik_nl ?></td>
                                            </tr>
                                            <tr>
                                                <td> Departemen </td>
                                                <td><?= $kry->dep_nl ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Masuk </td>
                                                <td><?= $kry->tgl_masuk_nl ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan </td>
                                                <td><?= $kry->jabatan_nl ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama Penilai </td>
                                                <td><?= $kry->nama_penilai_nl ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan Penilai </td>
                                                <td><?= $kry->jabatan_penilai_nl ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?=base_url('report/form_penilaian_id/'.$kry->id_nl)?>" class="btn btn-xs btn-primary" role="button" title="Cetak" target="_blank">
                                    <i class="fa fa-print"></i><span> Print</span></a>
                                    <a href="<?php echo site_url();?>admin/penilaian" class="btn btn-xs btn-danger" role="button">
									<i class="fa fa-angle-double-left"></i><span> Back</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<!-- End Main Content -->
        </div>
    <?php include ('decorations/footer.php');?>
    </body>
</html>
