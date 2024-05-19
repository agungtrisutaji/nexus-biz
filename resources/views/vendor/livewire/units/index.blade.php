@extends('components.layouts.app')

@section('content_body')
	<div>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Launch demo modal
		</button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal">
			import
		</button>
		<livewire:units.create/>
		<livewire:units.import/>
		<div class="container mb-2 rounded-lg border bg-white p-2 shadow-lg">
			<table id="unitTable" class="table-sm table-border table-hover table-compressed table-striped table" style="width:100%">
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
                        <livewire:units.row wire:poll :unit="$unit" wire:key="{{ $unit->id }}"/>
                    @endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@push('js')
	<script>
		$(document).ready(function() {
			new DataTable('#unitTable', {
                ordering:false,
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
					// bottomStart: 'pageLength',
				},
				columnDefs: [{
					targets: 'action',
					render: function(data, type, row, meta) {
						return '<input type="button" class="name" id=n-"' + meta.row +
							'" value="Name"/><input type="button" class="salary" id=s-"' + meta
							.row + '" value="Salary"/>';
					}

				}]
			});

			$('#unitTable tbody').on('click', '.name', function() {
				var id = $(this).attr("id").match(/\d+/)[0];
				var data = $('#unitTable').DataTable().row(id).data();
				console.log(data[0]);
			});


			$('#unitTable tbody').on('click', '.salary', function() {
				var id = $(this).attr("id").match(/\d+/)[0];
				var data = $('#unitTable').DataTable().row(id).data();
				console.log(data[5]);
			});
		});
	</script>
@endpush
