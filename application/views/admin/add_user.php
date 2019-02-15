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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Pengguna</h2>
								<ul class="breadcrumb">                            
									<li class="breadcrumb-item active">Pengguna</li>
									<li class="breadcrumb-item active">Tambah Pengguna</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h5><i class="fa fa-plus-square"></i> <?php echo $judul; ?></h5>
								</div>
								<div class="card-body">
									<?php if (validation_errors()) : ?>
										<div class="alert alert-danger">
											<?php echo validation_errors(); ?>
										</div>
									<?php endif; ?>
											
									<?php if ($this->session->flashdata('succses')) : ?>
										<div class="alert alert-success">
											<?php echo $this->session->flashdata('succses'); ?>
										</div>
									<?php endif; ?>

    								<?php echo form_open("admin/save_user"); ?>
									<form method="POST">
										<div class="form-group row">
											<label for="id" class="col-sm-3 col-form-label">Kode User</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="id" value="<?= $kode; ?>" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="name" required oninvalid="this.setCustomValidity('Nama Lengkap tidak boleh kosong')" 
												oninput="setCustomValidity('')">
											</div>
										</div>
										<div class="form-group row">
											<label for="email" class="col-sm-3 col-form-label">Email</label>
											<div class="col-sm-6">
												<input type="email" class="form-control" name="email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')"
												oninput="setCustomValidity('')">
											</div>
										</div>
										<div class="form-group row">
											<label for="name" class="col-sm-3 col-form-label">Username</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" 
												oninput="setCustomValidity('')">
											</div>
										</div>
										<div class="form-group row">
											<label for="password" class="col-sm-3 col-form-label">Password</label>
											<div class="col-sm-6">
												<input type="password" class="form-control" name="password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" 
												oninput="setCustomValidity('')">
											</div>
										</div>
										<div class="form-group row">
											<label for="level" class="col-sm-3 col-form-label">Role</label>
											<div class="col-sm-6">
												<select class="form-control" name="level" id="">
													<option value="admin">Admin</option>
													<option value="manager">Manager</option>
													<option value="staff">Staff</option>
												</select>
											</div>
										</div>
										<br>
										<div class="form-group row">
											<div class="col-sm-6">
												<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
												<a href="<?php echo site_url();?>admin/pengguna" class="btn btn-xs btn-danger" role="button">
												<i class="fa fa-angle-double-left"></i><span> Batal</span></a>
											</div>
										</div>
									</form>
									<?php echo form_close(); ?>
								</div>							
							</div><!-- end card-->					
						</div>
					</div>
				</div>
				<!-- End Main Content -->
			</div>
		<?php include ('decorations/footer.php');?>
	</body>
</html>

