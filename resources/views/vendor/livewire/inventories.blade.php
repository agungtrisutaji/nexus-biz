@extends('components.layouts.app')

@section('content_body')
@section('content_header_title', 'Inventory')

{{-- Minimal example / fill data using the component slot --}}
<div class="container-fluid mb-2 rounded-lg border bg-white p-2 shadow-lg">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
		Add Unit
	</button><br><br>
	<livewire:units.create></livewire:units.create>
	<table id="unitTable" class="table-sm table-bordered table-hover table-compressed mx-auto table p-2">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Serial Number</th>
				<th scope="col">Service</th>
				<th scope="col">Brand</th>
				<th scope="col">Model</th>
				<th scope="col">CPU</th>
				<th scope="col">RAM</th>
				<th scope="col">HDD</th>
				<th scope="col">SSD</th>
				<th scope="col">Operating System</th>
				<th scope="col">VGA</th>
				<th scope="col">Display</th>
				<th scope="col">Status</th>
				<th scope="col" class="action">Action</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@foreach ($config['data'] as $row)
				<tr>
					@foreach ($row as $cell)
						<td>{{ $cell }}</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@push('js')
<script>
	var editUrl = '{{ $editUrl }}';
	var deleteUrl = '{{ $deleteUrl }}';
	var detailUrl = '{{ $detailUrl }}';
	$(document).ready(function() {
		var table = new DataTable('#unitTable', {
			stateSave: true,
			stateSaveParams: function(settings, data) {
				delete data.search;
			},
			responsive: true,
			layout: {
				topStart: {
					buttons: [
						'colvis',
						{
							className: 'btn-default btn-outline-primary',
							text: `<i class="fas fa-fw fa-lg fa-file-csv text-primary"></i>`,
							extend: 'csv'
						},
						{
							className: 'btn-default btn-outline-success',
							text: `<i class="fas fa-fw fa-lg fa-file-excel text-success"></i>`,
							extend: 'pdf'
						},
						{
							className: 'btn-default btn-outline-danger',
							text: `<i class="fas fa-fw fa-lg fa-file-pdf text-danger"></i>`,
							extend: 'excel'
						},
					]
				},
				bottomEnd: {
					paging: {
						type: 'full_numbers'
					},
				},
				bottomStart: 'pageLength',
			},
			columnDefs: [{
					visible: false,
					targets: [2, 3, 4, 5, 6, 7, 8, 9, 10]
				},
				{
					targets: -1, // Kolom terakhir (-1)
					data: 12, // Indeks data untuk kolom terakhir (unit->id)
					render: function(data, type, row) {
						if (type === 'display') {
							return `
                    <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-primary edit-btn" data-id="${data}"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger delete-btn" data-id="${data}"><i class="fas fa-trash"></i></a>
                        <a href="#" class="btn btn-success detail-btn" data-id="${data}"><i class="fas fa-eye"></i></a>
                    </div>
                `;
						}
						return data;
					},
				},
			]
		});

		$('#unitTable').on('click', '.edit-btn', function() {
			var unitId = $(this).data('id');
			var url = editUrl + '/' + unitId;
			var data = table.row($(this).parents('tr')).data();
			// Lakukan tindakan edit dengan menggunakan URL dan data
			console.log('Edit URL:', url);
			console.log('Data:', data);
		});

		$('#unitTable').on('click', '.delete-btn', function() {
			var unitId = $(this).data('id');
			var url = deleteUrl + '/' + unitId;
			var data = table.row($(this).parents('tr')).data();
			// Lakukan tindakan delete dengan menggunakan URL dan data
			console.log('Delete URL:', url);
			console.log('Data:', data);
		});

		$('#unitTable').on('click', '.detail-btn', function() {
			var unitId = $(this).data('id');
			var url = detailUrl + '/' + unitId;
			var data = table.row($(this).parents('tr')).data();
			// Lakukan tindakan detail dengan menggunakan URL dan data
			console.log('Detail URL:', url);
			console.log('Data:', data);
		});
	});
</script>
@endpush
