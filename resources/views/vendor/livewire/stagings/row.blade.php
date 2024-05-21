<div>
    <div>
        <tr>
            <td>{{ $unit->serial }}</td>
            <td>{{ $unit->status }}</td>
            <td>{{ $unit->created_at->format('Y-m-d') }}</td>
            <td>{{ $unit->updated_at->format('Y-m-d') }}</td>
            <td>0</td>
            <td>Meet</td>
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
</div>

@push('js')
    <script>

    </script>
@endpush
