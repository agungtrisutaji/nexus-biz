@extends('components.layouts.app')

@section('content_body')
@section('content_header_title', 'Inventory')


{{-- Minimal example / fill data using the component slot --}}
<table id="unitTable" class="table-sm table-bordered table-hover table-compressed table-striped table">
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
@endsection
@push('js')
<script>
	$(document).ready(function() {
		new DataTable('#unitTable', {
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
				targets: 'action',
				render: function(data, type, row, meta) {
					return '<input type="button" class="edit" id=e-"' + meta.row +
						'" value="Edit"/><input type="button" class="delete" id=d-"' + meta
						.row + '" value="Delete"/>';
				}

			}]
		});

		$('#unitTable tbody').on('click', '.edit', function() {
			var id = $(this).attr("id").match(/\d+/)[0];
			var data = $('#unitTable').DataTable().row(id).data();
			console.log(data[0]);
		});


		$('#unitTable tbody').on('click', '.delete', function() {
			var id = $(this).attr("id").match(/\d+/)[0];
			var data = $('#unitTable').DataTable().row(id).data();
			console.log(data[5]);
		});
	});
</script>
@endpush
