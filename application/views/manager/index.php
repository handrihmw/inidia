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
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-6">
							<div class="card top_counter">
								<div class="body">
									<div class="icon"><i class="fa fa-user"></i> </div>
										<div class="content">
										<div class="text">Karyawan Baru</div>
											<h5 class="number"><?= $jmlb; ?> <span>Orang</span></h5>
									</div>
									<hr>
									<div class="icon"><i class="fa fa-users"></i> </div>
										<div class="content">
										<div class="text">Total Karyawan</div>
											<h5 class="number"><?= $jml; ?> Orang</h5>
									</div>
								</div>
							</div>
							<div class="card top_counter">
								<div class="body">
									<div class="icon"><i class="fa fa-clipboard"></i> </div>
									<div class="content">
										<div class="text">Karyawan Resign</div>
										<h5 class="number"><?php echo $this->Md_karyawan->get_total_resign(); ?> Orang</h5>
									</div>
									<hr>
									<div class="icon"><i class="fa fa-bullhorn"></i> </div>
									<div class="content">
										<div class="text">Kebutuhan Karyawan</div>
										<h5 class="number"><?php echo $this->Md_karyawan->get_total_call(); ?> Orang</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="card">
								<div class="header">
									<h2><i class="fa fa-calendar"></i> Ulang Tahun <?php echo bulan() ?></h2>
								</div>
								<div class="body todo_list">
									<table class="table table-responsive" style="font-size:10px;">
										<?php foreach ($bdy as $kry): ?>
											<tr>
												<td><b style=color:#01b2c6><?= $kry->nama_kry ?></b> - <?= $kry->jabatan_kry ?> - <?= $kry->tgl_lahir_kry ?></td>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>                    
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="card">
								<div class="header">
									<h5><i class="fa fa-arrow-circle-up"></i> Visi & Misi Astrindo Senayasa </h5>
								</div>
								<div class="body">
									<h5><u>VISI</u></h5>
									<p>Meningkatkan kepuasan pelanggan, loyalitas, dan kedekatan hubungan dengan pelanggan dengan cara mendistribusikan produk teknologi informasi yang berkualitas tinggi dan berkelas dunia.</p>
									<h5><u>MISI</u></h5>
									<p>Memberikan nilai-nilai terbaik kepada pemangku kepentingan :
										<br>- Memberikan pertumbuhan bisnis yang baik kepada pemilik merk
										<br>- Memberikan peluang bisnis kepada mitra kerja
										<br>- Memberikan pelayanan terbaik kepada pelanggan
										<br>- Memberikan lingkungan kerja yang baik kepada karyawan
									</p>
								</div> 
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="card">
								<div class="header">
									<h5><i class="fa fa-group"></i> Daftar Karyawan Percobaan </h5>
								</div>
								<div class="body">
								<div class="table-responsive">
                                        <table class="table table-bordered dataTable" cellspacing="0" id="examples">
                                            <thead style="background-color:#e9ecef;">
                                                <tr style="text-align:center;">
                                                    <th>No.</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>Jabatan</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; foreach ($coba as $cb): ?>
                                                <tr style="text-transform: lowercase;">
                                                    <td style="text-align:center;"><?= $no; ?></td>
													<td><?= $cb->nama_cb ?></td>
                                                    <td><?= $cb->jabatan_cb ?></td>
                                                </tr>
                                                <?php $no++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
								</div> 
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="card">
								<div class="header">
									<h2><i class="fa fa-building"></i> Karyawan per Departemen</h2>
								</div>
								<div class="body">                            
									<div id="chart_div" class="ct-chart"></div>
								</div>
							</div>
						</div>                
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-4">
							<div class="card">
								<div class="header">
									<h2>Permintaan per Bulan</h2>
								</div>
								<div class="body">
									<table class="table table-bordered">
										<thead style="background-color:#e9ecef;">
                                            <tr style="text-align:center;">
                                                <th>Bulan</th> 
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Januari</td>
                                                <td>12 Orang</td>
                                            </tr>
											<tr>
												<td>Februari</td>
												<td>4 Orang</td>
                                            </tr>
                                        </tbody>
									</table>
								</div>
							</div>
						</div>    
						<div class="col-lg-3 col-md-4">
							<div class="card">
								<div class="header">
									<h2>Permintaan per Dept</h2>
								</div>
								<div class="body">
									<table class="table table-bordered">
                                        <thead style="background-color:#e9ecef;">
                                            <tr style="text-align:center;">
                                                <th>Departemen</th>                                  
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($perdep as $pd_): ?>
                                            <tr>
                                                <td><?= $pd_->dep_kry ?></td>
                                                <td style="text-align:center;"><?= $pd_->jumlah ?> Orang</td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
								</div>
							</div>
						</div>  
						<div class="col-lg-3 col-md-4">
							<div class="card">
								<div class="header">
									<h2>Permintaan per Area</h2>
								</div>
								<div class="body todo_list">
									<table class="table table-bordered table-responsive">
                                        <thead style="background-color:#e9ecef;">
                                            <tr style="text-align:center;">
                                                <th>Area</th>                                  
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($perarea as $pa_): ?>
                                            <tr>
                                                <td><?= $pa_->lokasi_kry ?></td>
                                                <td style="text-align:center;"><?= $pa_->jumlah ?> Orang</td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
								</div>
							</div>
						</div>    
						<div class="col-lg-3 col-md-4">
							<div class="card">
								<div class="header">
									<h2>Jenis Requirement</h2>
								</div>
								<div class="body">
									<table class="table table-bordered table-responsive">
                                        <thead style="background-color:#e9ecef;">
                                            <tr style="text-align:center;">
                                                <th>Sumber Kebutuhan</th>                                  
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($perjns as $jn_): ?>
                                            <tr>
                                                <td><?= $jn_->dasar_permohonan_pmhn ?></td>
                                                <td style="text-align:center;"><?= $jn_->jumlah ?> Orang</td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
								</div>
							</div>
						</div> 
					</div>
			<?php include ('decorations/footer.php');?>

			<script src="<?php echo base_url() ?>assets/js/loader.js"></script> 
			<script type="text/javascript"> 
				google.charts.load('current', {'packages':['corechart']}); 
				google.charts.setOnLoadCallback(drawChart); 
				
				function drawChart() { 
					var jsonData = $.ajax({ 
						url      : "<?php echo base_url() . 'admin/get_pie' ?>", 
						dataType : "json", 
						async    : false 
						}).responseText; 
						
					var data  = new google.visualization.DataTable(jsonData); 
					var chart = new google.visualization.PieChart(document.getElementById('chart_div')); 
					chart.draw(data, {width: 470, height: 300});
				}
			</script> 
	</body>
</html>
