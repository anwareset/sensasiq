<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>
		SENSASIQ - FAQ
	</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url('assets/img/icon.ico'); ?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url('assets/js/plugin/webfont/webfont.min.js') ?> "></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url("assets/css/fonts.min.css") ?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?> ">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/atlantis.min.css') ?> ">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') ?> ">
</head>

<body>
	<div class="wrapper">
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
							<input type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('bantuan/faq') ?>';" value="FAQ">
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
												<input type="email" class="form-control" placeholder="alamat@email.anda">
											</div>
											<div class="form-group">
												<label for="exampleFormControlSelect1">Permohonan</label>
												<select class="form-control" name="permohonan" id="exampleFormControlSelect1">
													<option value="1" >Registrasi akun</option>
													<option value="2" >Lupa kata sandi</option>
												</select>
											</div>
											<div class="form-group">
												<label>Keterangan</label>
												<textarea class="form-control" rows="3"></textarea>
											</div>
											<div class="form-group float-right">
												<button type="submit" value="Kirim" name="btnKirim" class="btn btn-primary">Kirim</button>
											</div>
									</div>
									</form>
							</div>
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
</body>
</html>