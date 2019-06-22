<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("partials/head.php"); ?>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<?php $this->load->view("partials/main-header.php") ?>
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<?php $this->load->view("partials/sidebar.php") ?>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="row py-3">
										<div class="col-sm-6 col-md-4">
											<div class="card card-stats card-primary card-round">
												<div class="card-body">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-users"></i>
															</div>
														</div>
														<?php foreach ($mahasiswa as $m) :?>
														<div class="col-7 col-stats">
															<div class="numbers">
																<p class="card-category">Mahasiswa</p>
																<h4 class="card-title"><?php  echo $m['mhs'] ?></h4>
														<?php endforeach; ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="card card-stats card-info card-round">
												<div class="card-body">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-network"></i>
															</div>
														</div>
														<?php foreach ($kelas as $k) :?>
														<div class="col-7 col-stats">
															<div class="numbers">
																<p class="card-category">Kelas</p>
																<h4 class="card-title"><?php  echo $k['kelas'] ?></h4>														
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="card card-stats card-success card-round">
												<div class="card-body ">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-agenda-1"></i>
															</div>
														</div>
														<div class="col-7 col-stats">
															<div class="numbers">
																<p class="card-category">Matkul</p>
																<h4 class="card-title"><?php  echo $k['matkul'] ?></h4>
																<?php endforeach; ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Statistik Absensi</div>
										<div class="card-tools">
											<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
												Export
											</a>											
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container" style="min-height: 375px">
										<canvas id="statisticsChart"></canvas>
									</div>
									<div id="myChartLegend"></div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card full-height">
								<div class="card-header">
									<div class="card-title">Riwayat Generate</div>
								</div>
								<div class="card-body">
									<ol class="activity-feed">
										<li class="feed-item feed-item-secondary">
											<time class="date" datetime="9-25">Sep 25</time>
											<span class="text">Pemrograman Visual</span>
										</li>
										<li class="feed-item feed-item-success">
											<time class="date" datetime="9-24">Sep 24</time>
											<span class="text">Pemrograman Database</span>
										</li>
										<li class="feed-item feed-item-info">
											<time class="date" datetime="9-23">Sep 23</time>
											<span class="text">Pemrograman Web</span>
										</li>
										<li class="feed-item feed-item-warning">
											<time class="date" datetime="9-21">Sep 21</time>
											<span class="text">Algoritma Pemrograman</span>
										</li>
										<li class="feed-item feed-item-danger">
											<time class="date" datetime="9-21">Sep 28</time>
											<span class="text">Inovasi Teknologi</span>
										</li>
										<li class="feed-item feed-item-secondary">
											<time class="date" datetime="9-25">Sep 29</time>
											<span class="text">Pemrograman Visual</span>
										</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<?php $this->load->view("partials/footer.php") ?>
			</footer>
		</div>
		
	</div>
	<?php $this->load->view("partials/footer-js.php") ?>
	<script type="text/javascript">
		//Notify
		$.notify({
			icon: 'flaticon-alarm-1',
			title: 'Halo, <?php echo $this->session->nama_dosen ?>!',
			message: 'Selamat datang di SENSASIQ',
		},{
			type: 'info',
			placement: {
				from: "bottom",
				align: "right"
			},
			time: 1000,
		});
	</script>
</body>
</html>