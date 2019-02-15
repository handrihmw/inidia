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
									<li class="breadcrumb-item active">Detail Karyawan Resign</li>
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
                                                <td> Kode Resign </td>
                                                <td><?= $kry->id_rs ?></td>
                                            </tr>
                                            <tr>
                                                <td> Bulan </td>
                                                <td><?= $kry->bulan_rs ?></td>
                                            </tr>
                                            <tr>
                                                <td width="20%"> Nama Lengkap </td>
                                                <td><?= $kry->nama_rs ?></td>
                                            </tr>
                                            <tr>
                                                <td> Pangkat </td>
                                                <td><?= $kry->pangkat_rs ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan </td>
                                                <td><?= $kry->jabatan_rs ?></td>
                                            </tr>
                                            <tr>
                                                <td> Departemen </td>
                                                <td><?= $kry->dep_rs ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Masuk </td>
                                                <td><?= $kry->tgl_masuk_rs ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Resign </td>
                                                <td><?= $kry->tgl_resign_rs ?></td>
                                            </tr>
                                            <tr>
                                                <td> Masa (Bulan) </td>
                                                <td><?= $kry->masa_bulan_rs ?> Bulan</td>
                                            </tr>
                                            <tr>
                                                <td> Masa (Tahun) </td>
                                                <td><?= $kry->masa_tahun_rs ?> Tahun</td>
                                            </tr>
                                            <tr>
                                                <td> Keterangan </td>
                                                <td><?= $kry->keterangan_rs ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?php echo base_url() ?>admin/cetak_" class="btn btn-xs btn-primary" role="button" title="Print Data">
                                    <i class="fa fa-print"></i><span> Print</span></a>
                                    <a href="<?php echo site_url();?>admin/resign" class="btn btn-xs btn-danger" role="button">
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
