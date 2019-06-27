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
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Terkait</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="<?php echo base_url(''); ?> ">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url('rekapitulasi'); ?>">Rekapitulasi</a>
							</li>							
						</ul>						               			
					</div>
					<div class="row">
						<div class="col-md-12">							
								<button class="btn btn-primary" data-toggle="modal" data-target="#printrekap"><i class="fas fa-print"></i> Print</button>
							<div class="card">								
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Waktu</th>
													<th>NIM</th>
													<th>Nama</th>
													<th>Mata Kuliah</th>
													<th>Kelas</th>													
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Waktu</th>
													<th>NIM</th>
													<th>Nama</th>
													<th>Mata Kuliah</th>
													<th>Kelas</th>													
												</tr>
											</tfoot>
											<tbody>
												<?php foreach ($rekap as $r) : ?>
												<tr>
													<td><?php echo $r['waktu']; ?></td>
													<td><?php echo $r['nim']; ?></td>
													<td><?php echo $r['nama']; ?></td>
								                    <td><?php echo $r['matkul']; ?></td>
								                    <td><?php echo $r['kelas']; ?></td>													
												</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
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
<!-- modal print -->
	<div class="modal fade" id="printrekap" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h3 class="modal-title" >Pilih kelas yang akan di cetak</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="rekapitulasi/cetak" target="_blank" id="print">
          <div class="form-group form-floating-label ">
                  <select name="kelas" class="form-control input-border-bottom" id="selectFloatingLabel" required>
                  <option value="">&nbsp;</option>
                  <?php foreach ($kelas as $k) : ?>
                    <option value="<?php echo $k['id'] ?>"><?php echo $k['kelas'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <label for="selectFloatingLabel" class="placeholder">Kelas</label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- end of modal print -->
	<?php $this->load->view("partials/footer-js.php") ?>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
		});
	</script>
</body>
</html>