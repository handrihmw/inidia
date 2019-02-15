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
								<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-angle-double-left"></i></a> Struktur</h2>
								<ul class="breadcrumb">                            
									<li class="breadcrumb-item">Grafik</li>
									<li class="breadcrumb-item active">Pie Chart Karyawan</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h5><i class="fa fa-user"></i> <?php echo $judul; ?></h5><br>
                                </div>
                                <div class="body">
                                    <div id="piechart"></div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<!-- End Main Content -->
		</div>

	<?php include ('decorations/footer.php');?>
		<script src="<?php echo base_url();?>assets/highcharts/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/highcharts/highcharts.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/highcharts/modules/offline-exporting.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function () {
				$('#piechart').highcharts({
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Data Karyawan per Departemen'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.y:,.0f} Orang</b>'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								format: '<b>{point.name}</b>: {point.y:,.0f} Orang',
								style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
								}
							}
						}
					},
					series: [{
						type: 'pie',
						name: 'Jumlah Karyawan',
						data: [
							<?php 
								if(count($graph)>0)
							{
								foreach ($graph as $data) 
								{
									echo "['" .$data->dep_kry . "'," . $data->jumlah ."],\n";
								}
							}
							?>
						]
					}]
				});
			});	
		</script>
	</body>
</html>
