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
									<li class="breadcrumb-item active">Data Pengguna</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h5><i class="fa fa-user"></i> <?php echo $judul; ?></h5><br>
                                    <a href="<?php echo base_url();?>admin/add_user" class="btn btn-xs btn-default" role="button" title="Tambah">
                                    <i class="icon-plus"></i><span> Tambah</span></a>
                                    <!-- <a href="<?php echo base_url() ?>laporanpdf" class="btn btn-xs btn-success" role="button" title="Export Pdf">
                                    <i class="icon-social-dropbox"></i><span> Pdf</span></a>  -->
                                </div>
                                <div class="body">
                                <?php
                                    if($this->session->flashdata('save')) { ?>
                                        <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Sukses!</strong> Data Berhasil Ditambahkan
                                        </div>
                                <?php } else if($this->session->flashdata('update')) { ?>
                                        <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Sukses!</strong> Data Berhasil Diperbaharui
                                        </div>
                                <?php } else if($this->session->flashdata('delete')) { ?>
                                        <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Sukses!</strong> Data Berhasil Dihapus
                                    </div>
                                <?php } ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellpadding="0" cellspacing="0" id="examples">
                                        <thead style="background-color:#e9ecef;">
                                            <tr style="text-align:center;">
                                                <th>Kode User</th>    
                                                <th>Nama Lengkap</th>               
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Password</th> 
                                                <th>Role</th> 
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $usr): ?>
                                             <tr>
                                                <td style="text-align: center;"><?= $usr->id ?></td>
                                                <td><?= $usr->name ?></td>
                                                <td><?= $usr->email ?></td>
                                                <td><?= $usr->username ?></td>
                                                <td><?= $usr->password ?></td>
                                                <td style="text-align:center;"><?= $usr->level ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?php echo base_url();?>admin/edit_user/<?php echo $usr->id;?>" class="btn btn-xs btn-primary m-r-5" role="button" title="ubah">
                                                    <i class="icon-pencil"></i>&nbsp;
                                                    <a href="<?php echo base_url();?>admin/delete_user/<?php echo $usr->id;?>"
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
                </div>
			    <!-- End Main Content -->
            </div>
        <?php include ('decorations/footer.php');?>
    </body>
</html>
