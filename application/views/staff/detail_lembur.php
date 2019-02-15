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
									<li class="breadcrumb-item active">Lembur</li>
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
                                            <?php foreach ($lembur as $row): 
                                            $status = $row->status_ot;
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
                                                <td width="20%"> Kode lembur </td>
                                                <td><?= $row->id_ot ?></td>
                                            </tr>
                                            <tr>
                                                <td> Tanggal Permohonan</td>
                                                <td><?= $row->tanggal_ot ?></td>
                                            </tr>
                                            <tr>
                                                <td> Waktu Permohonan</td>
                                                <td><?= $row->waktu_ot ?></td>
                                            </tr>
                                            <tr>
                                                <td> Nama Pemohon </td>
                                                <td><?= $row->nama_ot ?></td>
                                            </tr>
                                            <tr>
                                                <td> Keterangan </td>
                                                <td><?= $row->keterangan_ot ?></td>
                                            </tr>
                                            <tr>
                                                <td> Status Permohonan </td>
                                                <td><span class="statusnya"><?='<font color="'.$color.'">'.$row->status_ot.'</font>';?></span></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="body">
                                    <a href="<?php echo site_url();?>staff/lembur" class="btn btn-xs btn-danger" role="button">
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
