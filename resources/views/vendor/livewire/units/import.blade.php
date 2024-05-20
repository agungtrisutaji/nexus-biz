<!-- Modal -->
<div wire:ignore.self class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel"
	aria-hidden="true">
	<form wire:submit="import" name="unit-form">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="importModalLabel">Tambah Unit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@if (session()->has('unitImported'))
					<div class="alert alert-success">
						{{ session('unitImported') }}
					</div>
				@endif
				@error('importFile')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
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
					<div>
						@if ($serviceDetail !== null)
							@foreach ($serviceDetail as $service)
								<span>{{ $service['id'] }} | {{ $service['brand'] }} | {{ $service['model'] }} | RAM {{ $service['ram'] }} |
									@if ($service['hdd'] !== null)
										HDD {{ $service['hdd'] }}
									@endif
									@if ($service['ssd'] !== null)
										SSD {{ $service['ssd'] }}
									@endif
								</span>
							@endforeach
						@endif
					</div>
					<div class="custom-file">
						<input type="file" wire:model="importFile" name="importFile" class="custom-file-input" id="inputFileUpload"
							aria-describedby="inputFileUpload">
						<label class="custom-file-label" for="inputFileUpload" wire:ignore>Choose file</label>
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
function updateFileLabel() {
    const $input = $('#inputFileUpload');
    const fileFullPath = $input.val();
    const fileName = fileFullPath.replace(/^.*[\\\/]/, '');
    const $label = $input.next('.custom-file-label');
    $label.html(fileName);
    $label.addClass('selected');
}

$(document).on('change', '#inputFileUpload', function() {
    updateFileLabel();
});
	</script>
@endpush
