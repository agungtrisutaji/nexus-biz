@extends('components.layouts.app')

@section('content_body')
@section('content_header_title', 'Inventory')

{{-- Minimal example / fill data using the component slot --}}
<div class="container-fluid mb-2 rounded-lg border p-2 shadow-sm">
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
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
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
	let editUrl = '{{ $editUrl }}';
	let deleteUrl = '{{ $deleteUrl }}';
	let detailUrl = '{{ $detailUrl }}';
	$(document).ready(function() {
		let table = new DataTable('#unitTable', {
			stateSave: true,
			stateSaveParams: function(settings, data) {
				delete data.search;
			},
            columns:[null, null, null, null, null, null, null, null, null, null, null, null, {searchable: false}],
			responsive: true,
			orderCellsTop: true,
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
							extend: 'excel'
						},
						{
							className: 'btn-default btn-outline-danger',
							text: `<i class="fas fa-fw fa-lg fa-file-pdf text-danger"></i>`,
							extend: 'pdf'
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
						// console.log('row', row)
						// console.log('type', type)
						// console.log('data', data)
						if (type === 'display') {
							return `
                    <div class="btn-group btn-group-sm">
                        <button wire:clik="editUnit" class="btn btn-primary edit-btn"><i class="fas fa-edit"></i></button>
                        <button href="#" class="btn btn-danger delete-btn" data-id="${data}"><i class="fas fa-trash"></i></button>
                        <button href="#" class="btn btn-success detail-btn" data-id="${data}"><i class="fas fa-eye"></i></button>
                    </div>
                `;
						}
						return data;
					},
				},
				{

				}
			],
			initComplete: function() {
				var table = this.api();

				// Add filtering
				table.columns().every(function() {
					var column = this;

					// var input = $('<input type="text" />')
					// 	.appendTo($("thead tr:eq(1) td").eq(this.index()))
					// 	.on("keyup", function() {
					// 		column.search($(this).val()).draw();
					// 	});

					var select = $('<select><option value=""></option></select>')
						.appendTo($(column.header()))
						.on('change', function() {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search(val ? '^' + val + '$' : '', true, false)
								.draw();
						});

					column.data().unique().sort().each(function(d, j) {
						if (column.search() === '^' + d + '$') {
							select.append('<option value="' + d +
								'" selected="selected">' + d + '</option>')
						} else {
							select.append('<option value="' + d + '">' + d +
								'</option>')
						}
					});

				});
			},
		});

		$('#unitTable').on('click', '.edit-btn', function() {
			let unitId = $(this).data('id');
			let url = editUrl + '/' + unitId;
			let data = table.row($(this).parents('tr')).data();
			// Lakukan tindakan edit dengan menggunakan URL dan data
			console.log('Edit URL:', url);
			console.log('Data:', data);
		});

		$('#unitTable').on('click', '.delete-btn', function() {
			let unitId = $(this).data('id');
			let url = deleteUrl + '/' + unitId;
			let data = table.row($(this).parents('tr')).data();
			// Lakukan tindakan delete dengan menggunakan URL dan data
			console.log('Delete URL:', url);
			console.log('Data:', data);
		});

		$('#unitTable').on('click', '.detail-btn', function() {
			let unitId = $(this).data('id');
			let url = detailUrl + '/' + unitId;
			let data = table.row($(this).parents('tr')).data();
			// Lakukan tindakan detail dengan menggunakan URL dan data
			console.log('Detail URL:', url);
			console.log('Data:', data);
		});
	});
</script>
@endpush
