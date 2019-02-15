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
									<li class="breadcrumb-item active">Man Power Planning</li>
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
                                            <?php foreach ($kry as $row): ?>
                                            <tr>
                                                <td width="20%"> Kode MPP </td>
                                                <td><?= $row->id_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan </td>
                                                <td><?= $row->jabatan_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Departemen </td>
                                                <td><?= $row->dep_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Area </td>
                                                <td><?= $row->area_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Status </td>
                                                <td><?= $row->status_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jumlah Dibutuhkan </td>
                                                <td><?= $row->jml_butuh_pp ?> Orang</td>
                                            </tr>
                                            <tr>
                                                <td> Sisa </td>
                                                <td><?= $row->sisa_pp ?> Orang</td>
                                            </tr>
                                            <tr>
                                                <td> Nama Pemohon </td>
                                                <td><?= $row->nama_pmh_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan Pemohon </td>
                                                <td><?= $row->jabatan_pmh_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Permohonan </td>
                                                <td><?= $row->tgl_pmh_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Jatuh Tempo </td>
                                                <td><?= $row->tgl_tempo_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Wawancara GM </td>
                                                <td><?= $row->tgl_wawancara_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Pemenuhan </td>
                                                <td><?= $row->tgl_pmnh_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Kecepatan Pemenuhan Kandidat </td>
                                                <td><?= $row->kcp_pmnh_pp ?>%</td>
                                            </tr>
                                            <tr>
                                                <td> Total Pemenuhan </td>
                                                <td><?= $row->total_pp ?> Orang</td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Masuk Karyawan </td>
                                                <td><?= $row->tgl_masuk_pp?></td>
                                            </tr>
                                            <tr>
                                                <td> Sumber Rekrutmen </td>
                                                <td><?= $row->sumber_rek_pp ?></td>
                                            </tr>
                                            <tr>
                                                <td> Keterangan </td>
                                                <td><?= $row->ket_pp ?></td>
                                            </tr>
                                            <!-- <?php endforeach; ?> -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?php echo base_url() ?>admin/cetak_" class="btn btn-xs btn-primary" role="button" title="Print Data">
                                    <i class="fa fa-print"></i><span> Print</span></a>
                                    <a href="<?php echo site_url();?>admin/mpp" class="btn btn-xs btn-danger" role="button">
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
<!-- Mirrored from thememakker.com/templates/lucid/hr/html/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Aug 2018 03:23:51 GMT -->
</html>
