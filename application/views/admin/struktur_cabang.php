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
									<li class="breadcrumb-item">Struktur</li>
									<li class="breadcrumb-item active">Struktur Cabang</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
                    <div class="col-lg-12 col-md-12 show" id="Struktur2">
                        <div class="card">
                            <div class="header">
                                <h5><i class="fa fa-line-chart"></i> <?php echo $judul; ?></h5>
                            </div>
                            <div class="body">
                                <ul class="nav nav-tabs-new2">
                                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Bnj">Banjarmasin</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Mdn">Medan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="Bnj">
                                        <div class="row clearfix">
                                            <div class="col-lg-12">
                                                <div class="card scroll">
                                                    <div class="header">
                                                        <h2>Struktur Organisasi <small>Kantor Cabang Banjarmasin</small></h2>
                                                    </div>
                                                    <div class="body tree">
                                                        <ul style='width:200%;'>
                                                            <li>
                                                                <a href="#">Branch Manager</a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="#">Sales Manager</a>
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">Sales</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Telemarketing</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Admin Sales</a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Staff Accounting</a>
                                                                    </li>
                                                                    <li>
                                                                                <a href="#">Staff Finance</a>
                                                                                <ul>
                                                                                    <li>
                                                                                        <a href="#">Kolektor</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#">Office Boy</a>
                                                                                    </li>
                                                                                </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Senior Admin Wirehouse</a>
                                                                        <ul>
                                                                            <li>
                                                                                <ul>
                                                                                    <li>
                                                                                        <a href="#">Admin Wirehouse</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#">Driver</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#">Kernet</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Staff Teknisi</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Admin Service</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success">Download PDF</button>
                                        <button type="button" class="btn btn-primary">Download Excel</button>
                                    </div>
                                    <div class="tab-pane" id="Mdn">
                                    <div class="row clearfix">
                                        <div class="col-lg-12">
                                            <div class="card scroll" style="overflow-y:hidden; overflow-x:scroll; background-color: rgb(255, 255, 255);">
                                                <div class="header">
                                                    <h2>Struktur Organisasi <small>Kantor Cabang Medan</small></h2>
                                                </div>
                                                <div class="body tree">
                                                    <ul style='width:500%;'>
                                                        <li>
                                                            <a href="#">Branch Manager</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="#">Sales Manager</a>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#">Sales</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Admin Sales</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Manager FA</a>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#">Staff Finance</a>
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="#">Kolektor</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">Office Boy</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Supervisor Logistik</a>
                                                                    <ul>
                                                                        <li>
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="#">Admin WH</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">Driver</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <a href="#">CSA</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">TSE</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-success">Download PDF</button>
                                        <button type="button" class="btn btn-primary">Download Excel</button>
                                    </div>
                                    <div class="tab-pane" id="Mdn">
                                    <div class="row clearfix">
                                            <div class="col-lg-12">
                                                <div class="card scroll" style="overflow-y:hidden; overflow-x:scroll; background-color: rgb(255, 255, 255);">
                                                    <div class="header">
                                                        <h2>Struktur Organisasi Logistik <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
                                                    </div>
                                                    <div class="body tree">
                                                        <ul style='width:200%;'>
                                                            <li>
                                                                <a href="#">Branch Manager</a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="#">Sales Manager</a>
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">Sales</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Telemarketing</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Admin Sales</a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Staff Accounting</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Staff Finance</a>
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">Kolektor</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Office Boy</a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Senior Admin Wirehouse</a>
                                                                        <ul>
                                                                            <li>
                                                                                <ul>
                                                                                    <li>
                                                                                        <a href="#">Admin Wirehouse</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#">Driver</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#">Kernet</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Staff Teknisi</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Admin Service</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> Download PDF</button>
                                        <button type="button" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Download Excel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include ('decorations/footer.php');?>
    </body>
</html>
