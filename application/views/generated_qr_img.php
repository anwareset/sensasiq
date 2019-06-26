<div class="card-body text-center">
	<img src="<?php echo base_url('assets/qrimg/').$fileQr; ?>" alt="qr-demo" style="max-height: 100%; max-width: 100%" />
</div>
<?php 
?>
<div class="card-footer text-center" id="timer">
	<p class="card-category">Silahkan pindai QR Code berikut dengan <b>SENSASIQ APP</b><br />QR Code akan diperbarui dalam <b><span class="value">10</span> detik</b></p>
</div>
<?php 
echo $this->session->file;
?>
<!-- Untuk autoreload -->
<script type="text/javascript">
	var auto_refresh = setInterval(
	function () {
	   $('#qr-body').load('<?php echo base_url('generate/generated_refresh/').$qr ?>').fadeIn("slow");
	}, 10000); // reload setiap 45000 miliseconds
</script>