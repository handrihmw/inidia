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
									<li class="breadcrumb-item active">Struktur Pusat</li>
								</ul>
							</div>      
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-12 col-md-12 show" id="Struktur">
							<div class="card">
								<div class="header">
									<h5><i class="fa fa-line-chart"></i> <?php echo $judul; ?></h5>
								</div>
								<div class="body">
									<ul class="nav nav-tabs-new2">
										<li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#All">All</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Accounting">Akuntansi</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Audit">Audit</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Finance">Finance</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Hrg">HRG</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#It">IT</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Logistik">Logistik</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Marketing">Marketing</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Oprt">Operational</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Purchas">Purchas</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Quality">QA</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Sales">Sales</a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Sama">SaMark</a></li>
									</ul>
									<div class="tab-content">
									<div class="tab-pane show active" id="All">
										<div class="row clearfix">
											<div class="col-lg-12">
												<div class="card scroll" style="overflow-y:hidden; overflow-x:scroll; background-color: rgb(255, 255, 255);">
													<div class="header">
														<h2>Struktur Keseluruhan <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
													</div>
													<div class="body tree">
														<ul style='width:200%;'>
															<li>
																<a href="#">Board of Director</a>
																	<ul>
																		<li>
																			<a href="#">General Manager Sales & Marketing</a>
																			<ul>
																				<li>
																					<a href="#">Dept. Sales</a>
																				</li>
																				<li>
																					<a href="#">Dept. Marketing</a>
																				</li>
																				<li>
																					<a href="#">Dept. Marketing Support</a>
																				</li>
																			</ul>
																		</li>
																		<li>
																			<a href="#">Secretary</a>
																		</li>
																		<li>
																			<a href="#">General Manager Operational</a>
																			<ul>
																				<li>
																					<a style="border: 2px dotted #94a0b4" href="#">System Analyst</a>
																				</li>
																				<li>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<a href="#">Dept. HRG</a>
																				</li>
																				<li>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<a href="#">Dept. Purchasing</a>
																				</li>
																				<li>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<a href="#">Dept. Finance</a>
																				</li>
																				<li>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<a href="#">Dept. Accounting</a>
																				</li>
																				<li>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<a href="#">Dept. Audit</a>
																				</li>
																				<li>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<a href="#">Dept. Logistik</a>
																				</li>
																				<li>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<a href="#">Dept. IT</a>
																				</li>
																				<li>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<a href="#">Dept. QA</a>
																				</li>
																				<li>
																					<a style="border: 2px dotted #94a0b4" href="#">QMR</a>
																				</li>
																			</ul>
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
										<div class="tab-pane" id="Accounting">
											<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll">
														<div class="header">
															<h2>Struktur Organisasi Accounting <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
														</div>
														<div class="body tree">
															<ul>
																<li>
																	<a href="#">General Manager Operational</a>
																	<ul>
																		<li>
																			<a href="#">Accounting Manager</a>
																			<ul>
																				<li>
																					<a href="#">Assisten Manager Accounting</a>
																					<ul>
																						<li>
																							<a href="#">Supervisor Accounting</a>
																							<ul>
																								<li>
																								<a href="#">Staff Accounting</a>
																								</li>
																							</ul>
																						</li>
																					</ul>
																				</li>
																			</ul>
																		</li>
																	</ul>
																</li>
															</ul>
															<ul>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-success">Download PDF</button>
											<button type="button" class="btn btn-primary">Download Excel</button>
										</div>
										<div class="tab-pane" id="Audit">
										<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll">
														<div class="header">
															<h2>Struktur Organisasi Audit <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
														</div>
														<div class="body tree">
															<ul>
																<li>
																	<a href="#">General Manager Operational</a>
																	<ul>
																		<li>
																			<a href="#">Audit Manager</a>
																			<ul>
																				<li>
																					<a href="#">Supervisor Audit</a>
																					<ul>
																						<li>
																							<a href="#">Staff Audit</a>
																						</li>
																					</ul>
																				</li>
																			</ul>
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
										<div class="tab-pane" id="Finance">
											<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll">
														<div class="header">
															<h2>Struktur Organisasi Finance <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
														</div>
														<div class="body tree">
															<ul>
																<li>
																	<a href="#">General Manager Operational</a>
																	<ul>
																		<li>
																			<a href="#">Finance Manager</a>
																			<ul>
																				<li>
																					<a href="#">Supervisor AP</a>
																					<ul>
																						<li>
																							<a href="#">Staff AR</a>
																						</li>
																						<li>
																							<a href="#">Kasir</a>
																						</li>
																						<li>
																							<a href="#">Admin AP</a>
																						</li>
																					</ul>
																				</li>
																			</ul>
																		</li>
																	</ul>
																</li>
															</ul>
															<ul>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-success">Download PDF</button>
											<button type="button" class="btn btn-primary">Download Excel</button>
										</div>
										<div class="tab-pane" id="Hrg">
										<div class="row clearfix">
											<div class="col-lg-12">
												<div class="card scroll" style="overflow-y:hidden; overflow-x:scroll; background-color: rgb(255, 255, 255);">
													<div class="header">
														<h2>Struktur Organisasi HRG <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
													</div>
													<div class="body tree">
															<ul>
																<li>
																	<a href="#">General Manager Operational</a>
																	<ul>
																		<li>
																			<a href="#">HRG Manager</a>
																			<ul>
																				<li>
																					<a href="#">Admin GA</a>
																				</li>
																				<li>
																					<a href="#">Staff Rekrutmen</a>
																				</li>
																				<li>
																					<a href="#">Admin HRG</a>
																					<ul>
																						<li>
																							<a href="#">Driver</a>
																						</li>
																						<li>
																							<a href="#">Sekuriti (OS)</a>
																						</li>
																						<li>
																							<a href="#">Office Boy/Girl (OS)</a>
																						</li>
																						<li>
																							<a href="#">Kurir (OS)</a>
																						</li>
																					</ul>
																				</li>
																				<li>
																					<a href="#">Staff ME</a>
																				</li>
																				<li>
																					<a href="#">Receptionist</a>
																				</li>
																			</ul>
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
										<div class="tab-pane" id="Marketing">
										<div class="row clearfix">
											<div class="col-lg-12">
												<div class="card scroll" style="overflow-y:hidden; overflow-x:scroll; background-color: rgb(255, 255, 255);">
													<div class="header">
														<h2>Struktur Organisasi Marketing <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
													</div>
													<div class="body tree">
														<ul style='width:200%;'>
															<li>
																<a href="#">General Manager Sales & Marketing</a>
																	<ul>
																		<li>
																			<a href="#">Marketing Support Manager</a>
																			<ul>
																				<li>
																					<a href="#">Marketing Specialist</a>
																				</li>
																				<li>
																					<a href="#">Technical Marketing Support</a>
																				</li>
																				<li>
																					<a href="#">Graphic Design</a>
																				</li>
																			</ul>
																		</li>
																		<li>
																			<a href="#">Product Manager</a>
																			<ul>
																				<li>
																					<a href="#">Admin Product</a>
																				</li>
																			</ul>
																		</li>
																		<li>
																			<a href="#">Senior Web Developer</a>
																			<ul>
																				<li>
																					<a href="#">Web Admin</a>
																				</li>
																			</ul>
																		</li>
																		<li>
																			<a href="#">Marketing Department Manager</a>
																			<ul>
																				<li>
																					<a href="#">Marcom Event</a>
																				</li>
																			</ul>
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
										<div class="tab-pane" id="Logistik">
										<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll" style="overflow-y:hidden; overflow-x:scroll; background-color: rgb(255, 255, 255);">
														<div class="header">
															<h2>Struktur Organisasi Logistik <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
														</div>
														<div class="body tree">
															<ul style='width:200%;'>
																<li>
																	<a href="#">General Operational Manager</a>
																	<ul>
																		<!-- <li>
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
																		<li>
																			<a href="#">Staff Teknisi</a>
																		</li>
																		<li>
																			<a href="#">Admin Service</a>
																		</li> -->
																		<li>
																		<a href="#">Logistik Manager</a>
																			<ul>
																				<li>
																					<ul>
																						<li>
																							<a href="#">Supervisor Wirehouse</a>
																							<ul>
																								<li>
																									<a href="#">Admin Wirehose</a>
																								</li>
																								<li>
																									<a href="#">Labeling</a>
																								</li>
																								<li>
																									<a href="#">Tacking Stock</a>
																								</li>
																							</ul>
																						</li>
																						<li>
																							<a href="#">Supervisor Delivery</a>
																							<ul>
																								<li>
																									<a href="#">Packer</a>
																								</li>
																								<li>
																									<a href="#">Admin Delivery</a>
																								</li>
																								<li>
																									<a href="#">Driver</a>
																								</li>
																								<li>
																									<a href="#">Kernet</a>
																								</li>
																							</ul>
																						</li>
																						<li>
																							<a href="#">Supervisor Logistik Service</a>
																							<ul>
																								<li>
																									<a href="#">Admin Buffer</a>
																								</li>
																								<li>
																									<a href="#">Helper</a>
																								</li>
																							</ul>
																						</li>
																					</ul>
																				</li>
																			</ul>
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
										<div class="tab-pane" id="Quality">
										<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll">
														<div class="header">
															<h2>Struktur Organisasi Quality Assurance <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
														</div>
														<div class="body tree">
															<ul>
																<li>
																	<a href="#">General Manager Operational</a>
																	<ul>
																		<li>
																			<a href="#">Finance Manager</a>
																			<ul>
																				<li>
																					<a href="#">Supervisor AP</a>
																					<ul>
																						<li>
																							<a href="#">Staff AR</a>
																						</li>
																						<li>
																							<a href="#">Kasir</a>
																						</li>
																						<li>
																							<a href="#">Admin AP</a>
																						</li>
																					</ul>
																				</li>
																			</ul>
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
										<div class="tab-pane" id="It">
										<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll">
														<div class="header">
															<h2>Struktur Organisasi Web Developer <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
														</div>
														<div class="body tree">
															<ul>
																<li>
																	<a href="#">General Manager Operational</a>
																	<ul>
																		<li>
																			<a href="#">Information Technology Manager</a>
																			<ul>
																				<li>
																					<a href="#">Staff Information Technology</a>
																				</li>
																			</ul>
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
										<div class="tab-pane" id="Sales">
										<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll">
														<div class="header">
															<h2>Struktur Organisasi Sales <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
														</div>
														<div class="body tree">
															<ul>
																<li>
																	<a href="#">General Manager Operational</a>
																	<ul>
																		<li>
																			<a href="#">Supervisor NSA</a>
																			<ul>
																				<li>
																					<a href="#">Staff NSA</a>
																				</li>
																			</ul>
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
										<div class="tab-pane" id="Sama">
										<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll" style="overflow-y:hidden; overflow-x:scroll; background-color: rgb(255, 255, 255);">
														<div class="header">
															<h2>Struktur Organisasi Sales & Marketing <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
														</div>
														<div class="body tree">
															<ul>
																<li>
																	<a href="#">Board of Director</a>
																	<ul>
																		<li>
																			<a href="#">Secretary</a>
																		</li>
																		<li>
																			<a href="#">General Manager Sales & Marketing</a>
																			<ul>
																				<li>
																					<a href="#">Product Manager</a>
																					<ul>
																						<li>
																							<a href="#">Pre Sales</a>
																						</li>
																					</ul>
																				</li>
																				<li>
																					<a href="#">Marketing Support Manager</a>
																					<ul>
																						<li>
																							<a href="#">Marketing Speialist</a>
																						</li>
																						<li>
																							<a href="#">Technical Marketing Support</a>
																						</li>
																						<li>
																							<a href="#">Graphic Design</a>
																						</li>
																					</ul>
																				</li>
																				<li>
																					<a href="#">Senior Web Developer</a>
																					<ul>
																						<li>
																							<a href="#">Web Admin</a>
																						</li>
																					</ul>
																				</li>
																				<li>
																					<a href="#">Supervisor NSA</a>
																					<ul>
																						<li>
																							<a href="#">Staff NSA</a>
																						</li>
																					</ul>
																				</li>
																			</ul>
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
										<div class="tab-pane" id="Oprt">
										<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll" style="overflow-y:hidden; overflow-x:scroll; background-color: rgb(255, 255, 255);">
														<div class="header">
															<h2>Struktur Organisasi Operational <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
																<div class=" body tree">
																	<ul style='width:500%;'>
																		<li>
																			<a href="#">Board of Director</a>
																			<ul>
																				<li>
																					<a href="#">Secretary</a>
																				</li>
																				<li>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<ul><!-- Garis panjang--></ul>
																					<a href="#">General Manager Operational</a>
																					<ul>
																						<li>
																							<a href="#">HRG Manager</a>
																							<ul><!-- Garis panjang--></ul>
																							<ul><!-- Garis panjang--></ul>
																							<ul><!-- Garis panjang--></ul>
																							<ul>
																								<!-- <li>
																									<a href="#">Admin GA</a>
																								</li> -->
																								<li>
																									<a href="#">Admin HRG</a>
																									<ul>
																										<ul><!-- Garis panjang--></ul>
																										<ul><!-- Garis panjang--></ul>
																										<ul><!-- Garis panjang--></ul>
																										<ul><!-- Garis panjang--></ul>
																										<ul><!-- Garis panjang--></ul>
																										<ul><!-- Garis panjang--></ul>
																										<li>
																											<a href="#">Driver</a>
																										</li>
																										<li>
																											<a href="#">Security (OS)</a>
																										</li>
																										<li>
																											<a href="#">Office Boy/Girl (OS)</a>
																										</li>
																										<li>
																											<a href="#">Kurir (OS)</a>
																										</li>
																									</ul>
																								</li>
																								<li>
																									<a href="#">Staff ME</a>
																								</li>
																								<li>
																									<a href="#">Staff Rekrutmen</a>
																								</li>
																								<li>
																									<a href="#">Receptionist</a>
																								</li>
																							</ul>
																						</li>
																						<li>
																							<a href="#">Purchasing Manager</a>
																							<ul>
																								<li>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<a href="#">Staff Purchasing</a>
																								</li>
																							</ul>
																						</li>
																						<li>
																							<a href="#">Accounting Manager</a>
																							<ul>
																								<li>
																									<a href="#">Asisten Manager Accounting</a>
																									<ul>
																										<li>
																											<a href="#">Supervisor Accounting</a>
																											<ul>
																												<li>
																													<a href="#">Staff Accounting</a>
																												</li>
																											</ul>
																										</li>
																									</ul>
																								</li>
																							</ul>
																						</li>
																						<li>
																							<a href="#">Audit Manager</a>
																							<ul>
																								<li>
																									<a href="#">Supervisor Audit</a>
																									<ul>
																										<li>
																											<ul><!-- Garis panjang--></ul>
																											<ul><!-- Garis panjang--></ul>
																											<ul><!-- Garis panjang--></ul>
																											<a href="#">Staff Audit</a>
																										</li>
																									</ul>
																								</li>
																							</ul>
																						</li>
																						<li>
																							<a href="#">IT Manager</a>
																							<ul>
																								<li>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<ul><!-- Garis panjang--></ul>
																									<a href="#">Staff IT</a>
																								</li>
																							</ul>
																						</li>
																						<li>
																							<a href="#">Finance Manager</a>
																							<ul>
																								<li>
																									<ul>
																										<li>
																											<a href="#">Supervisor AR</a>
																											<ul>
																												<li>
																													<a href="#">Staff AR</a>
																												</li>
																												<li>
																													<a href="#">Kasir</a>
																												</li>
																											</ul>
																										</li>
																										<li>
																											<a href="#">Supervisor AP</a>
																											<ul>
																											<li>
																													<a href="#">Staff AR</a>
																												</li>
																												<li>
																													<a href="#">Kasir</a>
																												</li>
																												<li>
																													<a href="#">Admin AP</a>
																												</li>
																											</ul>
																										</li>
																									</ul>
																								</li>
																							</ul>
																						</li>
																						<li>
																							<a href="#">Logistik Manager</a>
																							<ul>
																								<li>
																									<ul>
																										<li>
																											<a href="#">Supervisor Wirehouse</a>
																											<ul>
																												<li>
																													<a href="#">Admin Wirehose</a>
																												</li>
																												<li>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<a href="#">Labeling</a>
																												</li>
																												<li>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<a href="#">Tacking Stock</a>
																												</li>
																											</ul>
																										</li>
																										<li>
																											<a href="#">Supervisor Delivery</a>
																											<ul>
																											<li>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<a href="#">Packer</a>
																												</li>
																												<li>
																													<a href="#">Admin Delivery</a>
																												</li>
																												<li>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<a href="#">Driver</a>
																												</li>
																												<li>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<a href="#">Kernet</a>
																												</li>
																											</ul>
																										</li>
																										<li>
																											<a href="#">Supervisor Logistik Service</a>
																											<ul>
																											<li>
																													<a href="#">Admin Buffer</a>
																												</li>
																												<li>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<a href="#">Helper</a>
																												</li>
																											</ul>
																										</li>
																									</ul>
																								</li>
																							</ul>
																						</li>
																						<li>
																							<a href="#">Manager QA</a>
																							<ul>
																								<li>
																								<a href="#">Asisten Manager QA</a>
																									<ul>
																										<li>
																											<a href="#">Supervisor Teknisi</a>
																											<ul>
																												<li>
																													<a href="#">Teknisi</a>
																												</li>
																											</ul>
																										</li>
																										<li>
																											<a href="#">Supervisor TS</a>
																											<ul>
																												<li>
																													<a href="#">Staff TS</a>
																												</li>
																											</ul>
																										</li>
																										<li>
																											<a href="#">Supervisor Admin SRV</a>
																											<ul>
																												<li>
																													<a href="#">Admin Teknisi</a>
																												</li>
																												<li>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<ul><!-- Garis panjang--></ul>
																													<a href="#">Helper</a>
																												</li>
																												<li>
																													<a href="#">Admin RMA</a>
																												</li>
																											</ul>
																										</li>
																										<li>
																											<a href="#">Supervisor QA</a>
																											<ul>
																											<li>
																													<a href="#">Staff Produksi</a>
																												</li>
																												<li>
																													<a href="#">Staff QA</a>
																												</li>
																											</ul>
																										</li>
																										<li>
																											<a href="#">Branch Relation</a>
																										</li>
																									</ul>
																								</li>
																							</ul>
																						</li>
																					</ul>
																				</li>
																			</ul>
																		</li>
																	</ul>
																</div>
														</div>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-success">Download PDF</button>
											<button type="button" class="btn btn-primary">Download Excel</button>
										</div>
										<div class="tab-pane" id="Purchas">
										<div class="row clearfix">
												<div class="col-lg-12">
													<div class="card scroll">
														<div class="header">
															<h2>Struktur Organisasi Purchasing <small>Kantor Pusat PT. Astrindo Senayasa</small></h2>
														</div>
														<div class="body tree">
															<ul>
																<li>
																	<a href="#">General Manager Operational</a>
																	<ul>
																		<li>
																			<a href="#">Purchasing Manager</a>
																			<ul>
																				<li>
																					<a href="#">Staff Purchasing</a>
																				</li>
																			</ul>
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
									</div>
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
