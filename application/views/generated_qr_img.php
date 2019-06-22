<img src="<?php echo base_url('assets/qrimg/').$fileQr; ?>" alt="qr-demo" style="max-height: 100%; max-width: 100%" />

<!-- Untuk autoreload -->
<script type="text/javascript">
    var auto_refresh = setInterval(
    function () {
       $('#qr-body').load('<?php echo base_url('generate/generated_refresh/').$qr ?>').fadeIn("slow");
    }, 45000); // reload setiap 10000 miliseconds
</script>