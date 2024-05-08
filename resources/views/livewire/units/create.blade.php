<div class="col-6 mx-auto">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Tambah Unit</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form wire:submit="save" name="unit-form">
			@csrf
			<div class="card-body">
				<div class="form-group">
					<label for="service">Pilih Service</label>
					<select class="form-control" wire:model.live="selectedService">
						<option value="">-- Pilih Service --</option>
						@foreach ($services as $service)
							<option value="{{ $service->id }}">{{ $service->class }}</option>
						@endforeach
					</select>
				</div>
				<div >
					@if ($serviceDetail !== null)
						@foreach ($serviceDetail as $service)
							<span>{{ $service['brand'] }} - {{ $service['model'] }}</span>
						@endforeach
					@endif
				</div>
				<div class="form-group">
					<label for="serial">Serial Number</label>
					<input type="text" wire:model="form.serial" class="form-control" id="serial"
						placeholder="Masukan Serial Number">
					@error('form.serial')
						<span class="text-danger d-block mt-1">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary swalDefaultSuccess">Submit</button>
			</div>
			<div>
				@if ($units)
					<ul>
						@foreach ($units as $unit)
							<li>{{ $unit->serial }}, {{ $unit->status }}</li>
						@endforeach
					</ul>
				@endif
			</div>
		</form>
	</div>
</div>
