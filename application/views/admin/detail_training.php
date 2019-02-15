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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Dashboard</h2>
								<ul class="breadcrumb">                            
									<li class="breadcrumb-item">Karyawan</li>
									<li class="breadcrumb-item active">Detail Karyawan Training</li>
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
                                            <?php foreach ($karyawan as $karyawan): ?>
                                            <tr>
                                                <td width="18%"> Kode Training </td>
                                                <td><?= $karyawan->id_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama Pemohon </td>
                                                <td><?= $karyawan->nama_pemohon_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> NIK Pemohon </td>
                                                <td><?= $karyawan->nik_pemohon_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan Pemohon </td>
                                                <td><?= $karyawan->jabatan_pemohon_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Departemen Pemohon </td>
                                                <td><?= $karyawan->dep_pemohon_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Permohonan </td>
                                                <td><?= $karyawan->tgl_permohonan_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Judul Training </td>
                                                <td><?= $karyawan->judul_training_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Penyelenggara</td>
                                                <td><?= $karyawan->penyelenggara_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Waktu Pelaksanaan </td>
                                                <td><?= $karyawan->tgl_pelaksanaan_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tempat Pelaksanan </td>
                                                <td><?= $karyawan->tempat_pelaksanaan_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Biaya </td>
                                                <td>Rp.<?php echo nominal($karyawan->biaya_tr) ?>,-</td>
                                            </tr>
                                            <tr>
                                                <td> Cara Pembayaran </td>
                                                <td><?= $karyawan->pembayaran_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Diterima </td>
                                                <td><?= $karyawan->tgl_terima_tr ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Pembayaran </td>
                                                <td><?= $karyawan->tgl_bayar_tr ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?=base_url('report/form_training_id/'.$karyawan->id_tr)?>" class="btn btn-xs btn-primary" role="button" title="Cetak" target="_blank">
                                    <i class="fa fa-print"></i><span> Print</span></a>
                                    <a href="<?php echo site_url();?>admin/training" class="btn btn-xs btn-danger" role="button">
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
