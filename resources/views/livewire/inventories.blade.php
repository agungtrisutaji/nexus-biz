@extends('components.layouts.app')

@section('content_body')
@section('content_header_title', 'Inventory')

{{-- Setup data for datatables --}}
@php
$heads = [
    'Serial Number',
    'Service',
    'Status',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

$config['paging'] = true;
$config["lengthMenu"] = [ 10, 50, 100, 500];

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="dataTable" :heads="$heads" head-theme="dark" :config="$config" hoverable bordered compressed with-buttons responsive>
    @foreach($config['data'] as $row)
        <tr>
            @foreach($row as $cell)
                <td>{!! $cell !!}</td>
            @endforeach
        </tr>
    @endforeach
</x-adminlte-datatable>
@endsection

@push('js')
    <script>
        new DataTable('#myTable', {
    footerCallback: function (tr, data, start, end, display) {
        $(tr)
            .find('th')
            .eq(0)
            .html('Starting index is ' + start);
    }
});
    </script>
@endpush
