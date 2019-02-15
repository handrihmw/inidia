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
									<li class="breadcrumb-item">Persetujuan</li>
									<li class="breadcrumb-item active">Sakit</li>
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
                                            <?php foreach ($sakit as $row): 
                                            $status = $row->status_skt;
                                                switch ($status) {
                                                    case 'Disetujui':
                                                        $color = "#2ecc71";
                                                        break;
                                                    case 'Pending':
                                                        $color = "#f5b041";
                                                        break;
                                                    case 'Ditolak':
                                                        $color = "#e74c3c";
                                                        break;
                                                    default:
                                                        $color = "#17202a";
                                                        break;
                                                }   
                                            ?>
                                            <tr>
                                                <td width="20%"> Kode Sakit </td>
                                                <td><?= $row->id_skt ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama Pemohon </td>
                                                <td><?= $row->nama_skt ?></td>
                                            </tr>
                                            <tr>
                                                <td> NIK </td>
                                                <td><?= $row->nik_skt ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jabatan </td>
                                                <td><?= $row->jabatan_skt ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Permintaan</td>
                                                <td><?= $row->tgl_awal_skt ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Selesai</td>
                                                <td><?= $row->tgl_akhir_skt ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jumlah Hari</td>
                                                <td><?= $row->jml_skt ?> Hari</td>
                                            </tr>
                                            <tr>
                                                <td> Penyakit </td>
                                                <td><?= $row->penyakit_skt ?></td>
                                            </tr>
                                            <tr>
                                                <td> Keterangan </td>
                                                <td><?= $row->keterangan_skt ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama PJS </td>
                                                <td><?= $row->pjs_skt ?></td>
                                            </tr>
                                            <tr>
                                                <td> Lampiran</td>
                                                <td><img src="<?=base_url('uploads/images/'.$row->lampiran_skt)?>" style="width:100px; height:50"></td>
                                            </tr>
                                            <tr>
                                                <td> Status Permohonan </td>
                                                <td><span class="statusnya"><?='<font color="'.$color.'">'.$row->status_skt.'</font>';?></span></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?php echo site_url();?>staff/sakit" class="btn btn-xs btn-danger" role="button">
									<i class="fa fa-angle-double-left"></i><span> Kembali</span></a>
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
