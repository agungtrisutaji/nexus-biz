@extends('components.layouts.app')

@section('content_body')
@section('content_header_title', 'Inventory')

{{-- Minimal example / fill data using the component slot --}}
<div class="container-fluid mb-2 rounded-lg border p-2 shadow-sm">
	<!-- Button trigger modal -->
	<div class="d-flex justify-content-between mb-2">
		<button class="btn btn-info" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
			aria-controls="multiCollapseExample1">Filter</button>
		<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#exampleModal">
			<span class="btn-label"><i class="fa fa-plus"></i>
			</span>Add Unit</button>
	</div>

	<livewire:units.import />
	<livewire:units.create />

	<div class="row">
		<div class="col">
			<div class="multi-collapse collapse" id="multiCollapseExample1">
				<div class="card card-body">
					<form>
						<div class="form-group" id="columnFilters">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<table id="unitTable" class="table-sm table-bordered table-hover table-compressed mx-auto table p-2">
		<thead class="thead-dark">
			<tr>
				<th>Serial Number</th>
				<th>Service</th>
				<th>Brand</th>
				<th>Model</th>
				<th>CPU</th>
				<th>RAM</th>
				<th>HDD</th>
				<th>SSD</th>
				<th>Operating System</th>
				<th>VGA</th>
				<th>Display</th>
				<th>Status</th>
				<th class="action">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($actions as $row)
				<tr>
					@foreach ($row as $cell)
						<td>{!! $cell !!}</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@push('js')
<script>
	$(document).ready(function() {
		let table = new DataTable('#unitTable', {
			stateSave: true,
			stateSaveParams: function(settings, data) {
				delete data.search;
			},
			columns: [{
				data: serial
			}, null, null, null, null, null, null, null, null, null, null, null, {
				searchable: false
			}],
			responsive: true,
			orderCellsTop: true,
			layout: {
				topStart: {
					buttons: [
						'colvis',
						{
							className: 'btn-default btn-outline-primary',
							text: `<i class="fas fa-fw fa-lg fa-file-csv text-primary"></i>`,
							extend: 'csvHtml5',
							exportOptions: {
								columns: ':visible'
							}
						},
						{
							className: 'btn-default btn-outline-success',
							text: `<i class="fas fa-fw fa-lg fa-file-excel text-success"></i>`,
							extend: 'excelHtml5',
							exportOptions: {
								columns: ':visible'
							}
						},
						{
							className: 'btn-default btn-outline-danger',
							text: `<i class="fas fa-fw fa-lg fa-file-pdf text-danger"></i>`,
							extend: 'pdfHtml5',
							orientation: 'landscape',
							pageSize: 'LEGAL',
							exportOptions: {
								columns: ':visible'
							}
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
			}, ],
			initComplete: function() {
				var table = this.api();

                var column = this;
                var columnIndex = column.index();
                var columnHeader = table.columns().header()[columnIndex].innerText

                // Add label for the filter
                $('<label class="mb-0">')
                    .text(columnHeader)
                    .appendTo('#columnFilters');

				$('<input type="text" class="form-control" placeholder="Search Serial Number" />')
					.appendTo($('#columnFilters'))
					.on('keyup', function() {
						table
							.column(0)
							.search(this.value)
							.draw();
					});



				// Add filtering
				table.columns(':visible').every(function() {
                var column = this;
                var columnIndex = column.index();
                var columnHeader = table.columns().header()[columnIndex].innerText

                        if (columnIndex === 0) {
                        return;
                    }

                $('<label class="mb-0 mt-2">')
                    .text(columnHeader)
                    .appendTo('#columnFilters');

					var select = $('<select class="form-control"><option value=""> Pilih ' +
							columnHeader + '</option></select>')
						.appendTo($('#columnFilters'))
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

		// $('#unitTable').on('click', '.edit-btn', function() {
		// 	let unitId = $(this).data('id');
		// 	let url = editUrl + '/' + unitId;
		// 	let data = table.row($(this).parents('tr')).data();
		// 	// Lakukan tindakan edit dengan menggunakan URL dan data
		// 	console.log('Edit URL:', url);
		// 	console.log('Data:', data);
		// });

		// $('#unitTable').on('click', '.delete-btn', function() {
		// 	let unitId = $(this).data('id');
		// 	let url = deleteUrl + '/' + unitId;
		// 	let data = table.row($(this).parents('tr')).data();
		// 	// Lakukan tindakan delete dengan menggunakan URL dan data
		// 	console.log('Delete URL:', url);
		// 	console.log('Data:', data);
		// });

		// $('#unitTable').on('click', '.detail-btn', function() {
		// 	let unitId = $(this).data('id');
		// 	let url = detailUrl + '/' + unitId;
		// 	let data = table.row($(this).parents('tr')).data();
		// 	// Lakukan tindakan detail dengan menggunakan URL dan data
		// 	console.log('Detail URL:', url);
		// 	console.log('Data:', data);
		// });
	});
</script>
@endpush
