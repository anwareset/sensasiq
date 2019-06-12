<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('partials/head.php') ?>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<?php $this->load->view('partials/main-header.php') ?>
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<?php $this->load->view('partials/sidebar.php') ?>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Profil Saya</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<h4 class="card-title">Informasi Akun</h4>
									</div>
									<p class="card-category">
									Anda dapat memperbarui informasi akun anda.</p>
								</div>
								<div class="card-body">
									<form method="POST" action="<?php echo base_url('profil/update') ?>">
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label for="disableinput">Nomor Induk Pegawai</label>
													<input type="text" class="form-control" id="disableinput" placeholder="<?php echo $this->session->nip; ?>" name="nip" disabled>
											</div>
											<div class="form-group">
												<label>Nama Lengkap</label>
												<input type="text" class="form-control" id="disableinput" name="nama_dosen" placeholder="<?php echo $this->session->nama_dosen; ?>" >
											</div>

											</div>
										<div class="col">
											<div class="form-group">
												<label for="password">Kata Sandi</label>
												<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi Anda">
											</div>
											<div class="form-group">
												<label for="password">Ulangi Kata Sandi</label>
												<input type="password" class="form-control" id="password" name="password2" placeholder="Masukkan kata sandi Anda kembali">
											</div>
											<div class="form-group float-right">
												<button type="submit" class="btn btn-primary">Ubah</button>
												<span style="padding: 5px"></span>
												<input type="button" class="btn btn-primary btn-border" onclick="location.href='<?php echo base_url(`dashboard`) ?>';" value="Batal">
											</div>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<?php $this->load->view('partials/footer.php'); ?>
			</footer>
		</div>
		
	</div>
	<?php $this->load->view('partials/footer-js.php'); ?>
</body>
</html>