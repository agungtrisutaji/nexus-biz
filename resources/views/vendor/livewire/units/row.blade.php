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
			<button data-toggle="modal"
            data-target="#editModal" wire:click="edit({{ $unit->id }})" class="btn btn-sm btn-outline-success edit-btn" hidden><i
					class="fas fa-edit"></i></button>
			<button data-toggle="modal"
            data-target="#deleteModal" wire:click="deleteUnit({{ $unit->id }})" class="btn btn-sm btn-outline-danger delete-btn" hidden><i
					class="fas fa-trash"></i></button>
			<button wire:navigate href="/units/{{ $unit->id }}" class="btn btn-sm btn-outline-info detail-btn"><i
					class="fas fa-eye"></i></button>
		</td>
	</tr>
</div>
