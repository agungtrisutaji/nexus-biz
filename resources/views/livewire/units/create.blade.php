<div class="col-6 offset-md-3">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Tambah Barang</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form wire:submit="save" method="post" enctype="multipart/form-data">
            @csrf
			<div class="card-body">
				<div class="form-group">
					<label for="service_offer">Pilih Service</label>
					<select class="form-control">
						<option value="">Pilih Service</option>
					</select>
					{{-- @error('deviceName')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
				</div>
				<div class="form-group">
					<label for="device_name">Nama Barang</label>
					<input type="text" class="form-control" id="device_name" placeholder="Masukan nama barang">
					{{-- @error('deviceName')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
				</div>
				<div class="form-group">
					<label for="device_key">Serial Number</label>
					<input type="text" class="form-control" id="device_key" placeholder="Masukan serial number">
					{{-- @error('deviceKey')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
				</div>
				<div class="form-group">
					<label for="specification">Spek Barang</label>
					<textarea type="text" class="form-control" id="specification" placeholder="Spesifikasi Barang"></textarea>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Submit</button>
                <div wire:loading>
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
			</div>
		</form>
	</div>
</div>
