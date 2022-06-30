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
                    <h3>Edit Form Jenis Kegiatan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?=site_url('kegiatan')?>">Kegiatan</a></li>
                            <li class="breadcrumb-item"><a href="<?=site_url('Jenis_Kegiatan')?>">Jenis Kegiatan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Form Jenis Kegiatan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
		<?php
			if (isset($message_display)) {
				echo "<div class='alert alert-warning'>";
				echo $message_display;
				echo "</div>";
			}
		?>
        <section class="section">
            <div class="card">
				<div class="card-content">
					<div class="card-body">
						<?php echo validation_errors(); ?>

						<?php echo form_open('Jenis_Kegiatan/update/'.$jenis_kegiatan[0]['id'], 'class="form form-horizontal"'); ?>
                    		<div class="form-body">
								<div class="row">
									<div class="col-md-4">
										<label>Nama Jenis Kegiatan</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" id="first-name" class="form-control"
											name="nama_jenis_kegiatan" placeholder="Nama Jenis Kegiatan" value="<?=$jenis_kegiatan[0]['nama']?>">
									</div>
									<div class="col-sm-12 d-flex justify-content-end">
										<a href="<?=site_url('Jenis_Kegiatan')?>"
											class="btn btn-light-secondary me-1 mb-1">Kembali</a>
										<button type="submit"
											class="btn btn-primary me-1 mb-1">Update</button>
									</div>
								</div>
							</div>
						</form>
					</div>
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
