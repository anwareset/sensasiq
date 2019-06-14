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
								<h2 class="text-white pb-2 fw-bold">Perbarui Jadwal</h2>
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
										<h4 class="card-title">Informasi Jadwal</h4>
									</div>
									<p class="card-category">
									Anda dapat memperbarui <b>Waktu</b> dari jadwal Anda.</p>
								</div>
								<div class="card-body">
									<form method="POST" action="<?php echo base_url('jadwal/update_jadwal') ?>">
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label>Mata Kuliah</label>
													<input type="text" class="form-control" name="nip" value="<?php echo $jadwalupdate[0]['nama_matkul']; ?>" readonly="readonly" />
											</div>
											<div class="form-group">
												<label>Kelas</label>
												<input type="text" class="form-control" name="nama_kelas" value="<?php echo $jadwalupdate[0]['nama_kelas']; ?>" readonly="readonly">
											</div>
											<div class="form-group">
												<label>Waktu</label>
												<input type="text" class="form-control" name="waktu" value="<?php echo $jadwalupdate[0]['waktu']; ?>">
											</div>
											<div hidden="true" class="form-group">
												<input type="text" class="form-control" name="id_jadwal" value="<?php echo $jadwalupdate[0]['id_jadwal']; ?>" readonly="readonly">
											</div>
											<div class="form-group float-right">
												<button type="submit" value="Kirim" name="btnUbah" class="btn btn-primary">Ubah</button>
												<span style="padding: 5px"></span>
												<input type="button" class="btn btn-primary btn-border" onclick="location.href='<?php echo base_url('jadwal') ?>';" value="Batal">
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