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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Permohonan</h2>
								<ul class="breadcrumb">                           
									<li class="breadcrumb-item">Permohonan Lembur</li>
									<li class="breadcrumb-item active">Data Permohonan</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <?php
                                        if(isset($_SESSION['hapus_sukses']) || isset($_SESSION['update_sukses'])) :
                                            $notif = '';
                                            isset($_SESSION['hapus_sukses']) ? $notif .= $_SESSION['hapus_sukses'] : '';
                                            isset($_SESSION['update_sukses']) ? $notif .= $_SESSION['update_sukses'] : '';
                                        ?>
                                        <div class="alert alert-success">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Sukses!</strong> <?php echo $notif; ?>
                                        </div>
                                    <?php endif;?>
                                    <h5><i class="fa fa-paper-plane-o"></i> <?php echo $judul; ?></h5><br>
                                    
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered dataTable" cellspacing="0" id="examples">
                                            <thead style="background-color:#e9ecef;">
                                                <tr style="text-align:center;">
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Waktu</th>
                                                    <th>Nama Pemohon</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                    <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; 
                                                foreach ($lembur as $ot): 
                                                    $status = $ot->status_ot;
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
                                                    <td style="text-align:center;"><?= $no; ?></td>
                                                    <td style="text-align:center;"><?= $ot->tanggal_ot ?></td>
                                                    <td><?= $ot->waktu_ot ?></td>
                                                    <td><?= $ot->nama_ot ?></td>
                                                    <td><?= $ot->keterangan_ot?></td>
                                                    <td style="text-align: center;"><span class="statusnya"><?='<font color="'.$color.'">'.$ot->status_ot.'</font>';?></span></td>
                                                    <td style="text-align: center;">
                                                        <a href="<?php echo base_url();?>admin/detail_lembur/<?php echo $ot->id_ot;?>" class="btn btn-xs btn-success m-r-5" role="button" title="Detail">
                                                        <i class="icon-magnifier"></i>&nbsp;
                                                        <a href="<?php echo base_url();?>admin/edit_lembur/<?php echo $ot->id_ot;?>" class="btn btn-xs btn-primary m-r-5" role="button" title="Edit">
                                                        <i class="icon-pencil"></i>
                                                        <a href="<?php echo base_url();?>admin/delete_lembur/<?php echo $ot->id_ot;?>"
                                                    onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-xs btn-danger m-r-5" role="button" title="hapus"><i class="icon-trash"></i></a> 
                                                    </td>
                                                </tr>
                                                <?php $no++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </button>
                                </div>
                            </div>
                        </div>

					</div>
				</div>
			</div>
			<!-- End Main Content -->

            <?php include ('decorations/footer.php');?>
    </body>
</html>
