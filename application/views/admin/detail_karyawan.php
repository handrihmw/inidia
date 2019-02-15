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
									<li class="breadcrumb-item active">Karyawan</li>
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
                                            <?php foreach ($karyawan as $karyawan): 
                                                $status = $karyawan->status_kerja_kry;
                                                switch ($status) {
                                                    case 'Tetap':
                                                        $color = "#2ecc71";
                                                        break;
                                                    case 'Kontrak':
                                                        $color = "#f5b041";
                                                        break;
                                                    case 'Magang':
                                                        $color = "#e74c3c";
                                                        break;
                                                    default:
                                                        $color = "#17202a";
                                                        break;
                                                }?>
                                            <tr>
                                                <td width="20%"> Kode Karyawan </td>
                                                <td><?= $karyawan->id_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama Lengkap </td>
                                                <td><?= $karyawan->nama_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> NIK </td>
                                                <td><?= $karyawan->nik_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan </td>
                                                <td><?= $karyawan->jabatan_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Pangkat </td>
                                                <td><?= $karyawan->pangkat_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Divisi </td>
                                                <td><?= $karyawan->divisi_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Departemen </td>
                                                <td><?= $karyawan->dep_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Unit / Cabang </td>
                                                <td><?= $karyawan->lokasi_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama Panggilan </td>
                                                <td><?= $karyawan->panggilan_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> No. Identitas </td>
                                                <td><?= $karyawan->identitas_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jenis Kelamin </td>
                                                <td><?= $karyawan->jk_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tempat Lahir </td>
                                                <td><?= $karyawan->tempat_lahir_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Lahir </td>
                                                <td><?= $karyawan->tgl_lahir_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Kewarganegaraan </td>
                                                <td><?= $karyawan->negara_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Agama </td>
                                                <td><?= $karyawan->agama_kry?></td>
                                            </tr>
                                            <tr>
                                                <td> NPWP </td>
                                                <td><?= $karyawan->npwp_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Alamat </td>
                                                <td><?= $karyawan->alamat_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Telpon Rumah </td>
                                                <td><?= $karyawan->tlp_rumah_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nomor Handphone </td>
                                                <td><?= $karyawan->no_hp_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Masuk </td>
                                                <td><?= $karyawan->tgl_masuk_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Status Pekerjaan </td>
                                                <td><span class="statusnya"><?='<font color="'.$color.'">'.$karyawan->status_kerja_kry.'</font>';?></status></td>
                                            </tr>
                                            <tr>
                                                <td> Status Pernikahan </td>
                                                <td><?= $karyawan->status_nikah_kry ?></td>
                                            </tr>
                                            <tr>
                                                <td> Email </td>
                                                <td><?= $karyawan->email_kry ?></td>
                                            </tr>
                                            <!-- <?php endforeach; ?> -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?=base_url('report/print_karyawan_id/'.$karyawan->id_kry)?>" class="btn btn-xs btn-primary" role="button" title="Cetak" target="_blank">
                                    <i class="fa fa-print"></i><span> Print</span></a>
                                    <a href="<?php echo site_url();?>admin/karyawan" class="btn btn-xs btn-danger" role="button">
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
