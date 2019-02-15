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
									<li class="breadcrumb-item">Permohonan</li>
									<li class="breadcrumb-item active">Izin</li>
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
                                            <?php foreach ($izin as $row): 
                                            $status = $row->status_izn;
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
                                                <td width="20%"> Kode izin </td>
                                                <td><?= $row->id_izn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama Pemohon </td>
                                                <td><?= $row->nama_izn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Jenis Izin </td>
                                                <td><?= $row->jenis_izn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Permintaan</td>
                                                <td><?= $row->tgl_minta_izn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Selesai</td>
                                                <td><?= $row->tgl_akhir_izn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Alasan izin </td>
                                                <td><?= $row->alasan_izn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama PJS </td>
                                                <td><?= $row->pjs_izn ?></td>
                                            </tr>
                                            <tr>
                                                <td> Status Permohonan </td>
                                                <td><span class="statusnya"><?='<font color="'.$color.'">'.$row->status_izn.'</font>';?></span></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?php echo site_url();?>admin/izin" class="btn btn-xs btn-danger" role="button">
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
