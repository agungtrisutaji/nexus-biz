@extends('components.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Unit')
@section('content_header_title', 'Unit')
@section('content_header_subtitle', $unit->serial)

{{-- Content body: main page content --}}

@section('content_body')
	<div>
        {{ dump($this->unit) }}
		<div class="container-fluid mb-2 bg-white rounded-lg border p-5 shadow-sm">
				<form>
					<div class="form-row">
						<div class="form-group col-md-8">
							<label for="serial">Serial Number</label>
							<input type="text" class="form-control" readonly value="{{ $unit->serial }}" id="serial">
						</div>
						<div class="form-group col-md-4">
							<label for="created_at">Date Received</label>
							<div class="input-group mr-sm-2 mb-2">
								<input type="date" class="form-control" disabled value="{{ $unit->created_at->format('Y-m-d') }}"
									id="created_at">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-calendar-day"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="service">Service Offer</label>
							<input type="text" class="form-control" readonly value="{{ $service->class }}" id="service">
						</div>
						<div class="form-group col-md-6">
							<label for="status">Status</label>
							<input type="text" class="form-control" readonly value="{{ $unit->status }}" id="status">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="ram">RAM</label>
							<input type="text" readonly value="{{ $service->ram }}" class="form-control" id="ram">
						</div>
						<div class="form-group col-md-4">
							<label for="ssd">SSD</label>
							<input type="text" readonly value="{{ $service->ssd }}" class="form-control" id="ssd">
						</div>
						<div class="form-group col-md-4">
							<label for="hdd">HDD</label>
							<input type="text" readonly value="{{ $service->hdd }}" class="form-control" id="hdd">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="os">Operating System</label>
							<input type="text" readonly value="{{ $service->os }}" class="form-control" id="os">
						</div>
						<div class="form-group col-md-6">
							<label for="vga">Graphic</label>
							<input type="text" readonly value="{{ $service->vga }}" class="form-control" id="vga">
						</div>
					</div>
					<button wire:navigate href="/inventories" type="submit" class="btn btn-primary">Back</button>
				</form>
			</div>
	</div>
@stop
