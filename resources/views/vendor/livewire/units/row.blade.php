<div>
	<tr>
		<td>{{ $unit->serial }}</td>
		<td>{{ $unit->serviceOffer->class }}</td>
		<td>{{ $unit->serviceOffer->brand }}</td>
		<td>{{ $unit->serviceOffer->model }}</td>
		<td>{{ $unit->serviceOffer->cpu }}</td>
		<td>{{ $unit->serviceOffer->ram }}</td>
		<td>{{ $unit->serviceOffer->hdd }}</td>
		<td>{{ $unit->serviceOffer->ssd }}</td>
		<td>{{ $unit->serviceOffer->os }}</td>
		<td>{{ $unit->serviceOffer->vga }}</td>
		<td>{{ $unit->serviceOffer->display }}</td>
		<td>{{ $unit->status }}</td>
		<td>
            <button wire:navigate href="/units/{{ $unit->id }}/edit" class="btn btn-sm btn-outline-success edit-btn"><i
					class="fas fa-edit"></i></button>
			<button wire:navigate href="/units/{{ $unit->id }}" class="btn btn-sm btn-outline-danger delete-btn"><i
					class="fas fa-trash"></i></button>
			<button wire:navigate href="/units/{{ $unit->id }}" class="btn btn-sm btn-outline-info detail-btn"><i
					class="fas fa-eye"></i></button>
		</td>
	</tr>
</div>
