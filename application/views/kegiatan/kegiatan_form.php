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
                    <h3>Form Kegiatan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=site_url('kegiatan')?>">Kegiatan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Kegiatan</li>
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

						<?php echo form_open_multipart('kegiatan/store', 'class="form form-horizontal"'); ?>
                    		<div class="form-body">
								<div class="row">
									<div class="col-md-4">
										<label>Judul</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" id="first-name" class="form-control"
											name="judul" placeholder="Judul">
									</div>
									<div class="col-md-4">
										<label>Kapasitas</label>
									</div>
									<div class="col-md-8 form-group">
										<div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control"
                                                placeholder="Kapasitas" name="kapasitas">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
									</div>
									<div class="col-md-4">
										<label>Harga tiket</label>
									</div>
									<div class="col-md-8 form-group">
										<div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control"
                                                placeholder="Harga Tiket" name="harga_tiket">
                                            <div class="form-control-icon">
                                                Rp.
                                            </div>
                                        </div>
									</div>
									<div class="col-md-4">
										<label>Tanggal</label>
									</div>
									<div class="col-md-8 form-group">
										<div class="input-group date" data-provide="datepicker">
											<input type="text" class="form-control" name="tanggal" placeholder="Tanggal">
											<div class="input-group-addon">
												<span class="glyphicon glyphicon-th"></span>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<label>Narasumber</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" id="first-name" class="form-control"
											name="narasumber" placeholder="Narasumber">
									</div>
									<div class="col-md-4">
										<label>Tempat</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" id="first-name" class="form-control"
											name="tempat" placeholder="Tempat">
									</div>
									<div class="col-md-4">
										<label>PIC</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" id="first-name" class="form-control"
											name="pic" placeholder="PIC">
									</div>
									<div class="col-md-4">
										<label>Foto Flyer</label>
									</div>
									<div class="col-md-8 form-group">
										<input class="form-control" type="file" id="formFile" name="foto_flyer">
									</div>
									<div class="col-md-4">
										<label>Jenis Kegiatan</label>
									</div>
									<div class="col-md-8 form-group">
										<fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="jenis_id">
											<?php
												foreach($jenis_kegiatan as $jns){
											?>
                                            <option value="<?=$jns["id"]?>"><?=$jns["nama"]?></option>
											<?php
												}
											?>
                                        </select>
                                    </fieldset>
									</div>
									<div class="col-sm-12 d-flex justify-content-end">
										<a href="<?=site_url('kegiatan')?>"
											class="btn btn-light-secondary me-1 mb-1">Kembali</a>
										<button type="submit"
											class="btn btn-primary me-1 mb-1">Kirim</button>
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
