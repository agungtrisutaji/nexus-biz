<!-- Modal -->
<div wire:ignore.self class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
	<form wire:submit="import" name="unit-form">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="importModalLabel">Tambah Unit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
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
                            <span>{{ $service['id'] }} | {{ $service['brand'] }} | {{ $service['model'] }} | RAM {{ $service['ram']}} |
                                @if ($service['hdd'] !== null) HDD {{ $service['hdd'] }} @endif
                                @if ($service['ssd'] !== null) SSD {{ $service['ssd'] }} @endif
                            </span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" wire:model="importFile" name="importFile" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFile02">
                              <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                            </div>
                          </div>
                        @error('importFile')
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
    $('#inputGroupFile02').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
</script>
@endpush
