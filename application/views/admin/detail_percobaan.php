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
									<li class="breadcrumb-item active">Detail Karyawan Percobaan</li>
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
                                    <table class=" table table-bordered width="100%" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <?php foreach ($karyawan as $kry): ?>
                                            <tr>
                                                <td width="15%"> Kode Percobaan </td>
                                                <td><?= $kry->id_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama Karyawan </td>
                                                <td><?= $kry->nama_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> NIK </td>
                                                <td><?= $kry->nik_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> Departemen </td>
                                                <td><?= $kry->dep_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan </td>
                                                <td><?= $kry->jabatan_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jenis Percobaan</td>
                                                <td><?= $kry->jenis_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Mulai </td>
                                                <td><?= $kry->tgl_mulai_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Selesai </td>
                                                <td><?= $kry->tgl_selesai_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> Percobaan Ke </td>
                                                <td><?= $kry->percobaan_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> Catatan HR/GA </td>
                                                <td><?= $kry->catatan_hr_cb ?></td>
                                            </tr>
                                            <tr>
                                                <td> Catatan Atasaan Langsung </td>
                                                <td><?= $kry->catatan_atasan_cb ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?php echo site_url();?>report/form_percobaan_id/<?php echo $kry->id_cb;?>" class="btn btn-xs btn-primary" role="button" title="Cetak">
                                    <i class="fa fa-print"></i><span> Print</span></a>
                                    <a href="<?php echo site_url();?>admin/percobaan" class="btn btn-xs btn-danger" role="button">
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
