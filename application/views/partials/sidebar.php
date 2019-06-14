			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url('assets/img/profile.jpg') ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $this->session->nama_dosen; ?>
									<span class="user-level">Dosen</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="<?php echo base_url('profil') ?>">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?php if($this->session->flashdata('activemenu') == 'dashboard'): echo "active"; endif; ?>">
							<a href="<?php echo base_url(''); ?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-primary">
						<li class="nav-item <?php if($this->session->flashdata('activemenu') == 'jadwal'): echo "active"; endif; ?>">
							<a href="<?php echo base_url('jadwal'); ?>">
								<i class="fas fa-clipboard-list"></i>
								<p>Jadwal</p>
								<span class="badge badge-success">
									<?php
									$this->db->select('*');
								    $this->db->from('tbjadwal');
								    $this->db->join('tbkelas', 'tbkelas.id_kelas = tbjadwal.id_kelas');
								    $this->db->join('tbdosen', 'tbdosen.nip = tbjadwal.nip');
								    $this->db->join('tbmatkul', 'tbmatkul.id_matkul = tbjadwal.id_matkul');
								    $this->db->where('tbjadwal.nip', $this->session->nip);
								    $result = $this->db->get();
								    echo $result->num_rows();
									?>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>