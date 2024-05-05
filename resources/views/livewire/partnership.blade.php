<div class="col-6 offset-md-3">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Tambah Barang</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form method="post" enctype="multipart/form-data" action="{{ route('partnership.addAddress') }}">
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
                                    <li>{{ $address->name }}, {{ $address->city }}, {{ $address->zip }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
					{{-- @error('deviceName')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
				</div>
				<div class="form-group">
					<label for="name">Nama Alamat</label>
					<input type="text" class="form-control" id="name" placeholder="Masukan Nama Alamat">
					{{-- @error('deviceName')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
				</div>
				<div class="form-group">
					<label for="negara">Negara</label>
					<input type="text" class="form-control" id="negara" placeholder="Masukan Negara">
					{{-- @error('deviceKey')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
				</div>
				<div class="form-group">
					<label for="province">Provinsi</label>
					<input type="text" class="form-control" id="province" placeholder="Masukan Provinsi">
					{{-- @error('deviceKey')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
				</div>
				<div class="form-group">
					<label for="city">Kota</label>
					<input type="text" class="form-control" id="city" placeholder="Masukan Kota">
					{{-- @error('deviceKey')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
				</div>
				<div class="form-group">
                    <label for="zip_code">Kode Pos</label>
					<input type="text" class="form-control" id="zip_code" placeholder="Masukan Kode Pos">
					{{-- @error('deviceKey')
                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
				</div>
                <div class="form-group">
                    <label for="detail">Detail Alamat</label>
                    <textarea type="text" class="form-control" id="detail" placeholder="Masukan Detail Alamat"></textarea>
                    {{-- @error('deviceKey')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror --}}
                </div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Submit</button>
                <div wire:loading>
                    Mohon Tunggu...
                </div>
			</div>
		</form>
	</div>
</div>
