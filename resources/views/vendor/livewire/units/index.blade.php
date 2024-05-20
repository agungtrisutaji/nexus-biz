@extends('components.layouts.app')

@section('content_body')
@section('content_header_title', 'Units')
<div>
	<div class="container-fluid">
		<!-- Button trigger modal -->
		<div class="d-flex justify-content-between mb-2 mt-5">
            {{-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Filter</button> --}}
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">Filter</button>
                <div class="dropdown-menu">
                    <form class="px-4 py-3">
                      <div class="form-group" id="columnFilters">
                      </div>
                    </form>
                </div>
            </div>
			<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal"
				data-target="#exampleModal">
				<span class="btn-label"><i class="fa fa-plus"></i>
				</span>Add Unit</button>
		</div>

		<livewire:units.create />
		<livewire:units.import />
{{--
        <div class="d-flex justify-content-start">
            <div class="row">
                <div class="col md-4">
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
        </div> --}}

		<div class="mt-2">
			<table id="unitTable" class="table-sm table-border table-hover table-compressed table-striped table"
				style="width:100%">
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
				<tfoot>
					<td></td>
				</tfoot>
				<tbody>
					@foreach ($units as $unit)
						<livewire:units.row wire:poll :unit="$unit" wire:key="{{ $unit->id }}" />
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop

@push('js')
<script>
	// var editUnit = '{{ $editUnit }}';
	// var deleteUnit = '{{ $deleteUnit }}';
	// var detailUnit = '{{ $detailUnit }}';
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
				topEnd: 'pageLength',
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
                    var totalColumns = table.columns().header().length;

					if (columnIndex === 0) {
						return;
					}
					if (columnIndex === totalColumns - 1) {
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
	});
</script>
@endpush
