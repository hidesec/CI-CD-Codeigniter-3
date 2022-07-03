<div class="container">
    <nav class="navbar navbar-expand-lg bg-primary mt-5 shadow p-3 mb-5 rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white;"><b>EVENT</b></a>
        </div>
    </nav>
	<?php
		if (isset($message_display)) {
			echo "<div class='alert alert-warning'>";
			echo $message_display;
			echo "</div>";
		}
	?>
    <div class="row row-cols-3">
		<?php
			foreach($kegiatan as $kg){
		?>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="<?php echo base_url().$kg["foto_flyer"];?>" alt="Company logo">
                <div class="card-body">
                  <h5 class="card-title"><?= $kg["judul"]?></h5>
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-success"><i class="fa fa-bookmark"style="font-size:20px;"></i>   <?= $kg["nama"] ?></li>
                    <li class="list-group-item list-group-item-success"><i class="fa fa-calendar"style="font-size:20px;"></i>   <?= $kg["tanggal"]?></li>
                    <li class="list-group-item list-group-item-success"><i class="fa fa-map-marker"style="font-size:20px;"></i>   <?= $kg["tempat"]?></li>
                  </ul>

                </div>
                <div class="card-footer">
					<a type="button" class="btn" id="left-panel-link" href="<?=site_url('Event/daftar/'.$kg['id'])?>">Register</a>
                  	<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal1" id="right-panel-link">Learn More</button>
                </div>
            </div>
        </div>
		<?php
			}
		?>
    </div>
</div>
