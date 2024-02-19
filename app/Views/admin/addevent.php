<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 mb-5">
    Events
</h1>


<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary"> Buat Event

        <a href="<?= base_url('admin/event') ?>" class="btn btn-outline-dark float-right"> 
        	<i class="fas fa-backward"></i> Kembali
        </a>

      </h4>
    </div>
	<div class="card-body">
		<form action="<?= base_url('admin/simpanevent') ?>" method="POST" enctype="multipart/form-data">
			
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label"> 
					<b> Nama </b>
				</label>
				<div class="col-sm-10">
					<input type="text" name="judul" class="form-control" id="name">

				</div>

			</div>

			<div class="form-group row">
				<label for="photo" class="col-sm-2 col-form-label">  
					<b> Gambar </b> 
				</label>

				<div class="col-sm-10">
					<input type="file" name="gambar" id="photo">
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-save"></i>
						&nbsp; SAVE
					</button>
				</div>
			</div>

		</form>
	</div>

</div>

