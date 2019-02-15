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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Master Data</h2>
								<ul class="breadcrumb">                            
									<li class="breadcrumb-item">Master Data</li>
									<li class="breadcrumb-item active">Data Jabatan</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h5><i class="fa fa-user"></i> <?php echo $judul; ?></h5><br>
                                    <a href="<?php echo base_url();?>admin/add_jabatan" class="btn btn-xs btn-default" role="button" title="Tambah">
                                    <i class="icon-plus"></i><span> Tambah</span></a>
                                </div>
                                <div class="body">
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
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellpadding="0" cellspacing="0" id="examples">
                                        <thead style="background-color:#e9ecef;">
                                            <tr style="text-align:center;">
                                                <th>Kode Jabatan</th>                                  
                                                <th>Jabatan</th>  
                                                 <th>Aksi</th>
                                            </tr>
                                        </thead>
                                     <tbody>
                                        <?php foreach ($jabatan as $jbt_): ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $jbt_->id ?></td>
                                                <td><?= $jbt_->jabatan ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?php echo base_url();?>admin/edit_jabatan/<?php echo $jbt_->id;?>" class="btn btn-xs btn-primary m-r-5" role="button" title="ubah">
                                                    <i class="icon-pencil"></i>&nbsp;
                                                    <a href="<?php echo base_url();?>admin/delete_jabatan/<?php echo $jbt_->id;?>"
                                                    onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-xs btn-danger m-r-5" role="button" title="hapus"><i class="icon-trash"></i></a> 
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<!-- End Main Content -->
        <?php include ('decorations/footer.php');?>
    </body>
</html>
