<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>
		SENSASIQ - Tentang
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
							<input type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('bantuan') ?>';" value="Bantuan">
							<input type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('bantuan/faq') ?>';" value="FAQ">
							<input type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('auth') ?>';" value="Login">
						</div>
					</div>
				</div>
			</nav>
		</div>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row row-card-no-pd mt--2">
						<div class="text-center col-md-6 mr-auto ml-auto">
							<h1>Tentang</h1>
							<img style="max-width: 80%; max-height: 80%;" src="<?php echo base_url('assets/img/tentang.png'); ?> ">
							<p>
								<b>SENSASIQ</b> merupakan singkatan dari <i>Solusi Absensi Cerdas Anti Curang Berbasis QR Code</i>. <br />Sama seperti namanya, SENSASIQ difungsikan untuk menjadi pengganti dari sistem absensi konvensional yang memakan waktu antrian dan biaya untuk pengadaan lembar kertas absensi.
							</p>
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
	</div>
</body>
</html>