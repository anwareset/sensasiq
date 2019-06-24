<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('partials/head.php');?>
</head>

<body>
	<div class="wrapper overlay-sidebar">
		<div class="main-header">
			<div class="logo-header" data-background-color="blue">
				<a href="<?php echo base_url('') ?>" class="logo">
					<img src="<?php echo base_url('assets/img/logo-sensasiq.png') ?>" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
				<div class="container-fluid">
					<div class="navbar-nav topbar-nav mr-auto align-items-center">
						<div class="navbar-left">		
							<input type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('bantuan/tentang') ?>';" value="Tentang">
							<input type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('auth') ?>';" value="Login">
						</div>
					</div>
				</div>
			</nav>
		</div>
		<div class="main-panel col-md-8">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="card">								
							<div class="card-body">
								<h4 class="card-title">Hubungi Admin</h4>
								<p>Silahkan mengisi form berikut untuk menghubungi Admin</p><br />
								<form method="POST" action="<?php echo base_url('bantuan/kontak') ?>"> 
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label>Nomor Induk Pegawai</label>
													<input type="text" class="form-control" name="nip" placeholder="Masukkan nomor induk anda" >
											</div>
											<div class="form-group">
												<label>Nama Lengkap</label>
												<input type="text" class="form-control" name="nama_dosen" placeholder="Masukkan nama lengkap anda">
											</div>
											<div class="form-group">
												<label>Alamat Email</label>
												<input type="email" name="email" class="form-control" placeholder="alamat@email.anda">
											</div>
											<div class="form-group">
												<label for="exampleFormControlSelect1">Permohonan</label>
												<select class="form-control" name="permohonan" id="exampleFormControlSelect1">
													<option value="1" >Registrasi akun</option>
													<option value="2"form >Lupa kata sandi</option>
												</select>
											</div>
											<div class="form-group">
												<label>Keterangan</label>
												<textarea name="keterangan" class="form-control" rows="3"></textarea>
											</div>
											<div class="form-group text-center">
												<button type="submit" value="Kirim" name="btnKirim" class="btn btn-primary">Kirim</button>
											</div>
									</div>
									</form>
							</div>
						</div>
					</div>
				</div>
				<footer>
					<div class="container-fluid">
						<div class="copyright float-right">
							Made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://unpkediri.ac.id">UNPKediri</a>
						</div>				
					</div>
				</footer>
			</div>
		</div>
	</div>
	<?php $this->load->view("partials/footer-js.php") ?>
</body>
</html>
<?php $this->session->unset_userdata('authenticated'); ?>