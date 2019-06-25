<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="<?php echo base_url('') ?>" class="logo">
					<img src="<?php echo base_url('assets/img/logo-sensasiq.png') ?>" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">						
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Aksi Cepat</span>
									<span class="subtitle op-8">Pintasan</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col col-md p-0" href="<?php echo base_url('aktivitas'); ?>">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Lihat Jadwal Mingguan</span>
												</div>
											</a>
											<a class="col col-md p-0" href="<?php echo base_url('rekapitulasi'); ?>">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Lihat Hasil Absensi</span>
												</div>
											</a>											
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-user"></i>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?php echo base_url('assets/img/profil-unp.PNG') ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $this->session->nama_dosen; ?></h4>
												<a href="<?php echo base_url('profil'); ?>" class="btn btn-xs btn-secondary btn-sm">Edit Profil</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
									</li>
								</div>
							</ul>
						</li>
						<li class="nav-item">
							<!-- Dummy, cuma biar setara tinggi nya, somehow <li> terakhir selalu agak kebawah -->
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->