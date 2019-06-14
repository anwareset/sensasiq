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
						<h4 class="page-title">Jadwal Terkait</h4>
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
								<a href="<?php echo base_url('jadwal'); ?>">Jadwal</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Add Row</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="far fa-calendar-alt" style="padding-right: 10px;"></i>
											Lihat Jadwal Mingguan
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Perbarui Jadwal</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Anda dapat memperbarui <b>Waktu</b> mengajar sesuai dengan kebutuhan.</p>
													<form>
														<div class="row">
															<div class="col-md-6 pr-0">
																<div class="form-group">
																	<label>Mata Kuliah</label>
																	<input id="addPosition" type="text" class="form-control" placeholder="Mata kuliah" readonly="readonly">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Kelas</label>
																	<input id="addPosition" type="text" class="form-control" placeholder="Nama kelas" readonly="readonly">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Waktu</label>
																	<input id="addName" type="text" class="form-control" placeholder="Silahkan isi waktu mengajar">
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="addRowButton" class="btn btn-primary">Ubah</button>
													<button type="button" class="btn btn-primary btn-border" data-dismiss="modal">Batal</button>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Waktu</th>
													<th>Mata Kuliah</th>
													<th>Kelas</th>
													<th style="width: 10%">Aksi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Waktu</th>
													<th>Mata Kuliah</th>
													<th>Kelas</th>
													<th>Aksi</th>
												</tr>
											</tfoot>
											<tbody>
												<?php foreach ($jadwal as $datajadwal) : ?>
												<tr>
													<td><?php echo $datajadwal['waktu']; ?></td>
								                    <td><?php echo $datajadwal['nama_matkul']; ?></td>
								                    <td><?php echo $datajadwal['nama_kelas']; ?></td>
													<td>
														<div class="form-button-action">
															<button type="button"  data-toggle="modal" data-target="#addRowModal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Jadwal">
																<i class="fa fa-edit"></i>
															</button>
														</div>
													</td>
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

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>
</html>