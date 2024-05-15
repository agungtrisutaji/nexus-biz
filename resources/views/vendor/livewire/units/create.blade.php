<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form wire:submit="save" name="unit-form">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Unit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- form start -->
				<div class="modal-body">
					<div class="form-group">
						<label for="service">Pilih Service</label>
						<select class="form-control" wire:model.live="selectedService">
							<option value="">-- Pilih Service --</option>
							@foreach ($services as $service)
								<option value="{{ $service->id }}">{{ $service->model }} - {{ $service->class }}</option>
							@endforeach
						</select>
					</div>
                    <div >
                        @if ($serviceDetail !== null)
                            @foreach ($serviceDetail as $service)
                            <span>{{ $service['brand'] }} | {{ $service['model'] }} | RAM {{ $service['ram']}} |
                                @if ($service['hdd'] !== null) HDD {{ $service['hdd'] }} @endif
                                @if ($service['ssd'] !== null) SSD {{ $service['ssd'] }} @endif
                            </span>
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
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary swalDefaultSuccess">Submit</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>

@push('js')
<script>
    // document.addEventListener('livewire:load', function () {
    //     Livewire.on('refreshPage', function () {
    //         location.reload();
    //     });
    // });
</script>
@endpush
