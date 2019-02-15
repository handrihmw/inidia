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
									<li class="breadcrumb-item active">Detail Karyawan Baru</li>
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
                                    <table class="table table-bordered" border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <?php foreach ($karyawan as $kry): ?>
                                            <tr>
                                                <th colspan="2" class="text-nowrap" width="150">A. DATA PEMOHON</th>
                                            </tr>
                                            <tr>
                                                <td width="20%"> Departemen </td>
                                                <td><?= $kry->dep_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama Pemohon </td>
                                                <td><?= $kry->nama_pemohon_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan Pemohon </td>
                                                <td><?= $kry->jabatan_pemohon_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-nowrap" width="150">B. KLASIFIKASI KEBUTUHAN</th>
                                            </tr>
                                            <tr>
                                                <td> Jabatan </td>
                                                <td><?= $kry->jabatan_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Lokasi </td>
                                                <td><?= $kry->lokasi_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Waktu </td>
                                                <td><?= $kry->waktu_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Status </td>
                                                <td><?= $kry->status_kerja_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jumlah </td>
                                                <td><?= $kry->jumlah_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal </td>
                                                <td><?= $kry->tanggal_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Dasar Permohonan </td>
                                                <td><?= $kry->dasar_permohonan_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Sumber Rekrutmen </td>
                                                <td><?= $kry->sumber_rekrutmen_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Ringkasan Tugas </td>
                                                <td><?= $kry->ringkasan_tugas_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-nowrap" width="150">C. PERSYARATAN</th>
                                            </tr>
                                            <tr>
                                                <td> Gajih </td>
                                                <td><?= $kry->gajih_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jenis Kelamin </td>
                                                <td><?= $kry->jk_pmhn?></td>
                                            </tr>
                                            <tr>
                                                <td> Pendidikan </td>
                                                <td><?= $kry->pendidikan_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jurusan </td>
                                                <td><?= $kry->jurusan_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Pengalaman Kerja </td>
                                                <td><?= $kry->pengalaman_kerja_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Bidang </td>
                                                <td><?= $kry->bidang_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Syarat Lainnya </td>
                                                <td><?= $kry->syarat_lain_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Keterampilan </td>
                                                <td><?= $kry->keterampilan_pmhn ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-nowrap" width="150">D. TANGGAL BERGABUNG</th>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Bergabung </td>
                                                <td><?= ($kry->tgl_bergabung_pmhn) ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-nowrap" width="150">E. LAMPIRAN</th>
                                            </tr>
                                            <tr>
                                                <td> Office Equipment </td>
                                                <td><?= $kry->office_equipment_pmhn ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?=base_url('report/print_permohonan_id/'.$kry->id_pmhn)?>" class="btn btn-xs btn-primary" role="button" title="Cetak" target="_blank">
                                    <i class="fa fa-print"></i><span> Print</span></a>
                                    <a href="<?php echo site_url();?>admin/permohonan" class="btn btn-xs btn-danger" role="button">
									<i class="fa fa-angle-double-left"></i><span> Batal</span></a>
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
