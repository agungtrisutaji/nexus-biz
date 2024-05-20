<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
	<form wire:submit="updateUnit" name="unit-form">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Tambah Unit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- form start -->
				<div class="modal-body">
					<div class="form-group">
						<label for="service_offer_id">Service Offer</label>
						<input type="text" wire:model="serviceOffer" class="form-control" id="service_offer_id"
							placeholder="Masukan Service Offer ID" value="{{ $unit->service_offer_id }}">
						@error('service_offer_id')
							<span class="text-danger d-block mt-1">{{ $message }}</span>
						@enderror
					</div>
                    @dump($unit)
					<div class="form-group">
						<label for="serial">Serial Number</label>
						<input type="text" wire:model="serial" class="form-control" id="serial"
							 value="{{ $unit->serial }}">
						@error('serial')
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
