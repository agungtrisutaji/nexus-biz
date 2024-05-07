<div class="col-6 offset-md-3">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Tambah Alamat</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form wire:submit="save" name="address-form">
            @csrf
			<div class="card-body">
				<div class="form-group">
					<label for="company">Pilih Company</label>
				    	<select class="form-control" wire:model.live="selectedCompany">
					    	<option value="">-- Pilih Company --</option>
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    <div>
                        @if ($addresses)
                            <ul>
                                @foreach ($addresses as $address)
                                    <li>{{ $address->name }}, {{ $address->city }}, {{ $address->detail }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
				</div>
				<div class="form-group">
					<label for="name">Nama Alamat</label>
					<input type="text" wire:model="name" class="form-control" id="name" placeholder="Masukan Nama Alamat">
					@error('name')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="country">Negara</label>
					<input type="text" wire:model="country" class="form-control" id="country" placeholder="Masukan Negara">
					@error('country')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="province">Provinsi</label>
					<input type="text" wire:model="province" class="form-control" id="province" placeholder="Masukan Provinsi">
					@error('province')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="city">Kota</label>
					<input type="text" wire:model="city" class="form-control" id="city" placeholder="Masukan Kota">
					@error('city')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
				<div class="form-group">
                    <label for="zip_code">Kode Pos</label>
					<input type="text" wire:model="zip_code" class="form-control" id="zip_code" placeholder="Masukan Kode Pos">
					@error('zip_code')
                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
                <div class="form-group">
                    <label for="detail">Detail Alamat</label>
                    <textarea type="text" wire:model="detail" class="form-control" rows="3" id="detail" placeholder="Masukan Detail Alamat"></textarea>
                    @error('detail')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
                </div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary swalDefaultSuccess">Submit</button>
			</div>
		</form>
	</div>
</div>

<script>
    window.addEventListener('alert', event => {
        let data = event.detail;
        Swal.fire({
            title: data.title,
            icon: data.type,
            text: data.message,
            position: data.position,
            showConfirmButton: data.showConfirmButton,
            timer: data.timer
        })
    })
</script>
