<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Kegiatan</h3>
<!--                    <p class="text-subtitle text-muted">For user to check they list</p>-->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
<!--                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>-->
                            <li class="breadcrumb-item active" aria-current="page">Kegiatan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
				<div class="card-header">
					Daftar Kegiatan
					<a href="<?=site_url('kegiatan/create')?>" class="btn btn-primary float-end">Buat Baru</a>
				</div>
				<?php
					if (isset($message_display)) {
						echo "<div class='alert alert-success'>";
						echo $message_display;
						echo "</div>";
					}
				?>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
								<th>No.</th>
                                <th>Judul</th>
                                <th>Kapasitas</th>
                                <th>Harga Tiket</th>
                                <th>Tanggal</th>
                                <th>Narasumber</th>
                                <th>Tempat</th>
								<th>PIC</th>
								<th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
								$nomor=1;
								if($kegiatan){
									foreach($kegiatan as $kgtn){
							?>
                            <tr>
								<td><?=$nomor?></td>
                                <td><?=$kgtn["judul"]?></td>
                                <td><?=$kgtn["kapasitas"]?></td>
                                <td><?="Rp. ".number_format($kgtn["harga_tiket"],2,',','.')?></td>
                                <td><?=$kgtn["tanggal"]?></td>
								<td><?=$kgtn["narasumber"]?></td>
                                <td><?=$kgtn["tempat"]?></td>
                                <td><?=$kgtn["pic"]?></td>
                                <td>
                                    <a href="<?=site_url('kegiatan/edit/'.$kgtn["id"])?>" class="btn btn-info">Edit</a>
									<button type="button" class="btn btn-danger"
                                        data-bs-toggle="modal" data-bs-target="#<?='danger'.'-'.$kgtn['id']?>">
                                        Hapus
                                    </button>
									<!--Danger theme Modal -->
									<div class="modal fade text-left" id="<?='danger'.'-'.$kgtn['id']?>" tabindex="-1"
										role="dialog" aria-labelledby="myModalLabel120"
										aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
											role="document">
											<div class="modal-content">
												<div class="modal-header bg-danger">
													<h5 class="modal-title white" id="myModalLabel120">
														Peringatan!
													</h5>
													<button type="button" class="close"
														data-bs-dismiss="modal" aria-label="Close">
														<i data-feather="x"></i>
													</button>
												</div>
												<div class="modal-body">
													Apakah anda yakin menghapus kegiatan ini <?=$kgtn['judul']?>?
												</div>
												<div class="modal-footer">
													<button type="button"
														class="btn btn-light-secondary"
														data-bs-dismiss="modal">
														<i class="bx bx-x d-block d-sm-none"></i>
														<span class="d-none d-sm-block">Tutup</span>
													</button>
													<a href="<?=site_url('kegiatan/delete/'.$kgtn['id'])?>" type="button" class="btn btn-danger ml-1">
														<i class="bx bx-check d-block d-sm-none"></i>
														<span class="d-none d-sm-block">Ya</span>
													</a>
												</div>
											</div>
										</div>
									</div>
                                </td>
                            </tr>
							<?php
										$nomor++;
									}
								}
							?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
</div>
