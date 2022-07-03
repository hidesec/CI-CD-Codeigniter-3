<div class="container">
    <nav class="navbar navbar-expand-lg bg-primary mt-5 shadow p-3 mb-5 rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white;"><b>Daftar EVENT</b></a>
        </div>
    </nav>
	<div class="row row-cols-2">
		<div class="col">
			<div class="card">
                <img class="card-img-top" src="<?php echo base_url().$kegiatan[0]["foto_flyer"];?>" alt="Company logo">
                <div class="card-body">
                  <h5 class="card-title"><?= $kegiatan[0]["judul"]?></h5>
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-success"><i class="fa fa-bookmark"style="font-size:20px;"></i>   <?= $kegiatan[0]["nama"] ?></li>
                    <li class="list-group-item list-group-item-success"><i class="fa fa-calendar"style="font-size:20px;"></i>   <?= $kegiatan[0]["tanggal"]?></li>
                    <li class="list-group-item list-group-item-success"><i class="fa fa-map-marker"style="font-size:20px;"></i>   <?= $kegiatan[0]["tempat"]?></li>
                  </ul>

                </div>
            </div>
		</div>
		<div class="col">
			<?php echo form_open('Event/create'); ?>
			  <div class="form-row">
			  <div class="form-group">
				<label for="input">Username</label>
				<input type="text" class="form-control" id="input" placeholder="Username" name="username">
			  </div>
			  <div class="form-group">
				<label for="input">Password</label>
				<input type="password" class="form-control" id="input" placeholder="Password" name="password">
			  </div>
			  <div class="form-group">
				<label for="input">Email</label>
				<input type="email" class="form-control" id="input" placeholder="Email" name="email">
			  </div>
			  <div class="form-group">
				  <label for="input">Kategori Peserta</label>
				  <select class="form-select" id="basicSelect" name="kategori_peserta_id">
					  <?php
						foreach($kategori_peserta as $kp){
					  ?>
                           <option value="<?=$kp["id"]?>"><?=$kp["nama"]?></option>
					  <?php
						}
					  ?>
                  </select>
			  </div>
			  <div class="form-group">
				<label for="input">Alasan</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan"></textarea>
			  </div>
				<input type="hidden" name="kegiatan_id" value="<?=$kegiatan[0]["id"]?>">
			  <br>
			  <button type="submit" class="btn btn-primary">Daftar</button>
			</form>
		</div>
	</div>
</div>
