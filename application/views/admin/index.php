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
										<br>- Memberikan lingkungan kerja yang baik kepada karyawan</p>
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
						<!-- <div class="col-lg-8 col-md-12">
							<div class="card">
								<div class="header">
									<h2>Requirement per Month</h2>
									<ul class="header-dropdown">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
											<ul class="dropdown-menu dropdown-menu-right animated bounceIn">
												<li><a href="javascript:void(0);">Detail</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="body">                            
									<div id="total_Salary" class="ct-chart"></div>
								</div>
							</div>
						</div> -->
						
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
						<div class="col-lg-12 col-md-12 show" id="Struktur2">
							<div class="card">
								<div class="header">
									<h5><i class="fa fa-line-chart"></i> Data Permintaan </h5>
								</div>
								<div class="body">
									<ul class="nav nav-tabs-new2">
										<li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#jbt">Jabatan</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dep1">Departemen per Area</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dep2">Departemen All Area</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#full">Fullfillment</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane show active" id="jbt">
											<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll">
														<div class="body">
															<table class="table table-bordered dataTable" cellspacing="0" id="examples">
																<thead style="background-color:#e9ecef;">
																	<tr style="text-align:center;">
																		<th>Jabatan</th> 
																		<th>Januari 2018</th>
																		<th>Februari 2018</th>
																		<th>Maret 2018</th>
																		<th>April 2018</th>
																		<th>Mei 2018</th>
																		<th>Juni 2018</th>
																		<th>Grand Total</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Helper</td>
																		<td>12</td>
																		<td></td>
																		<td></td>
																		<td>1</td>
																		<td>7</td>
																		<td></td>
																		<td>17</td>
																	</tr>
																	<tr>
																		<td>Audit</td>
																		<td>4</td>
																		<td></td>
																		<td></td>
																		<td>1</td>
																		<td></td>
																		<td>3</td>
																		<td>16</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="dep1">
											<div class="row clearfix">
												<div class="col-lg-12">
													<table class="table table-bordered dataTable" cellspacing="0" id="examples">
														<thead style="background-color:#e9ecef;">
															<tr style="text-align:center;">
																<th>Area</th>
																<th>Departemen</th>
																<th>Jabatan</th> 
																<th>Januari 2018</th>
																<th>Februari 2018</th>
																<th>Maret 2018</th>
																<th>April 2018</th>
																<th>Mei 2018</th>
																<th>Juni 2018</th>
																<th>Grand Total</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>HO</td>
																<td>Logistik</td>
																<td>Helper</td>
																<td>12</td>
																<td></td>
																<td></td>
																<td>1</td>
																<td>7</td>
																<td></td>
																<td>17</td>
															</tr>
															<tr>
																<td>100</td>
																<td>Sales Marketing</td>
																<td>Audit</td>
																<td>4</td>
																<td></td>
																<td></td>
																<td>1</td>
																<td></td>
																<td>3</td>
																<td>16</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="dep2">
											<div class="row clearfix">
												<div class="col-lg-12">
													<table class="table table-bordered dataTable" cellspacing="0" id="examples">
														<thead style="background-color:#e9ecef;">
															<tr style="text-align:center;">
																<th>Area</th>
																<th>Departemen</th>
																<th>Jabatan</th> 
																<th>Januari 2018</th>
																<th>Februari 2018</th>
																<th>Maret 2018</th>
																<th>April 2018</th>
																<th>Mei 2018</th>
																<th>Juni 2018</th>
																<th>Grand Total</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>HO</td>
																<td>Purchasing</td>
																<td>Telemarketing</td>
																<td>17</td>
																<td></td>
																<td></td>
																<td>1</td>
																<td>7</td>
																<td></td>
																<td>21</td>
															</tr>
															<tr>
																<td>500</td>
																<td>Support</td>
																<td>Audit</td>
																<td>4</td>
																<td></td>
																<td></td>
																<td>1</td>
																<td></td>
																<td>3</td>
																<td>11</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="full">
											<div class="row clearfix">
												<div class="col-lg-12">
													<table class="table table-bordered dataTable" cellspacing="0" id="examples">
														<thead style="background-color:#e9ecef;">
															<tr style="text-align:center;">
																<th>Departemen</th>
																<th>Jabatan</th> 
																<th>1</th>
																<th>2</th>
																<th>8</th>
																<th>9</th>
																<th>14</th>
																<th>23</th>
																<th>Grand Total</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>Purchasing</td>
																<td>Telemarketing</td>
																<td>17</td>
																<td></td>
																<td></td>
																<td>1</td>
																<td>7</td>
																<td></td>
																<td>21</td>
															</tr>
															<tr>
																<td>Support</td>
																<td>Audit</td>
																<td>4</td>
																<td></td>
																<td></td>
																<td>1</td>
																<td></td>
																<td>3</td>
																<td>11</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div> 
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="header">
									<h5><i class="fa fa-group"></i> Data Gabungan Man Power Planning </h5>
								</div>
								<div class="body">
									<div class="row clearfix">
										<div class="col-lg-12">
											<div class="card scroll">
												<div class="body">
													<table class="table table-bordered dataTable" cellspacing="0" id="examples">
														<thead style="background-color:#e9ecef;">
															<tr style="text-align:center;">
																<th>Bulan</th>
																<th>No</th>
																<th>Jabatan</th> 
																<th>Departemen</th>
																<th>Area</th>
																<th>Status (N/R)</th>
																<th>Jumlah Kebutuhan</th>
																<th>Sisa</th>
																<th>Nama Pemohon</th>
																<th>Jabatan Pemohon</th>
																<th>Tanggal Permohonan</th>
																<th>Tanggal Jatuh Tempo</th>
																<th>Wawancara GM / HRD</th>
																<th>Tanggal Pemenuhan</th>
																<th>Kecepatan Pemenuhan (%)</th>
																<th>Total Pemenuhan</th>
																<th>Tanggal Masuk Karyawan</th>
																<th>Sumber Rekrutmen</th>
																<th>Keterangan</th>
															</tr>
														</thead>
														<tbody>
														<?php $no = 1; foreach ($mpp as $row): ?>
															<tr style="text-align:center;">
																<td>Januari 2018</td>
																<td style="text-align:center;"><?= $no; ?></td>
																<td><?= $row->jabatan_pp ?></td>
																<td><?= $row->dep_pp ?></td>
																<td><?= $row->area_pp ?></td>
																<td><?= $row->status_pp ?></td>
																<td><?= $row->jml_butuh_pp?></td>
																<td><?= $row->sisa_pp ?></td>
																<td><?= $row->nama_pmh_pp ?></td>
																<td><?= $row->jabatan_pmh_pp ?></td>
																<td><?= $row->tgl_pmh_pp ?></td>
																<td><?= $row->tgl_tempo_pp?></td>
																<td><?= $row->tgl_wawancara_pp ?></td>
																<td><?= $row->tgl_pmnh_pp ?></td>
																<td><?= $row->kcp_pmnh_pp ?>%</td>
																<td><?= $row->total_pp ?></td>
																<td><?= $row->tgl_masuk_pp?></td>
																<td><?= $row->sumber_rek_pp ?></td>
																<td><?= $row->ket_pp ?></td>
															</tr>
															<?php $no++; endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div> 
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="header">
									<h5><i class="fa fa-sign-out"></i> Data Turn Over Karyawan </h5>
								</div>
								<div class="body">
									<div class="row clearfix">
										<div class="col-lg-12">
											<div class="card scroll">
												<div class="body">
													<table class="table table-bordered dataTable" cellspacing="0" id="examples">
														<thead style="background-color:#e9ecef;">
															<tr style="text-align:center;">
																<th rowspan="2">Masa Kerja</th>
																<th colspan="2">Januari</th>
																<th colspan="2">Februari</th> 
																<th colspan="2">Maret</th>
																<th colspan="2">April</th>
																<th colspan="2">Mei</th>
																<th colspan="2">Grand Total</th>
															</tr>
														</thead>
														<tbody>
															<tr style="text-align:center;">
																<td>###</td>
																<td>2017</td>
																<td>2018</td>
																<td>2017</td>
																<td>2018</td>
																<td>2017</td>
																<td>2018</td>
																<td>2017</td>
																<td>2018</td>
																<td>2017</td>
																<td>2018</td>
																<td>2017</td>
																<td>2018</td
															</tr>
															<tr style="text-align:center;">
																<td>1 Bulan</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>26</td>
																<td>12</td>
															</tr>
															<tr style="text-align:center;">
																<td>Total</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>1</td>
																<td>78</td>
																<td>43</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div> 
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="header">
									<h5><i class="fa fa-line-chart"></i> Grafik Data Turn Over Karyawan </h5>
								</div>
								<div class="body">
									<div id="chart"></div>
								</div> 
							</div>
						</div>
					</div>
					<!-- End Main Content -->
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
			<script src="<?php echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>assets/highcharts/modules/offline-exporting.js" type="text/javascript"></script>
			<script type="text/javascript">
				jQuery(function(){
					new Highcharts.Chart({
						chart: {
							renderTo: 'chart',
							type: 'line',
						},
						title: {
							text: 'Grafik Statistik Resign',
							x: -20
						},
						subtitle: {
							text: '2018',
							x: -20
						},
						xAxis: {
							categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
										'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
						},
						yAxis: {
							title: {
								text: 'Total Karyawan'
							}
						},
						series: [{
								name: 'Data dalam Bulan',
								data: <?php echo json_encode($grafik); ?>
						}]
					});
				}); 
			</script>
	</body>
</html>
