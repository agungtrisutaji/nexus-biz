@extends('components.layouts.app')

@section('content')

<div class="col-6 mx-auto">
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
                                    <li>{{ $address->name }}, {{ $address->detail }},  {{ $address->city }}, {{ $address->province }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
				</div>
				<div class="form-group">
					<label for="name">Nama Alamat</label>
					<input type="text" wire:model="form.name" class="form-control" id="name" placeholder="Masukan Nama Alamat">
					@error('form.name')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="country">Negara</label>
					<input type="text" wire:model="form.country" class="form-control" id="country" placeholder="Masukan Negara">
					@error('form.country')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="province">Provinsi</label>
					<input type="text" wire:model="form.province" class="form-control" id="province" placeholder="Masukan Provinsi">
					@error('form.province')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="city">Kota</label>
					<input type="text" wire:model="form.city" class="form-control" id="city" placeholder="Masukan Kota">
					@error('form.city')
                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
				<div class="form-group">
                    <label for="zip">Kode Pos</label>
					<input type="text" wire:model="form.zip" class="form-control" id="zip" placeholder="Masukan Kode Pos">
					@error('form.zip')
                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                    @enderror
				</div>
                <div class="form-group">
                    <label for="detail">Detail Alamat</label>
                    <textarea type="text" wire:model="form.detail" class="form-control" rows="3" id="detail" placeholder="Masukan Detail Alamat"></textarea>
                    @error('form.detail')
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
@endsection
