@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Sales</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            var editor = new $.fn.dataTable.Editor( {
                ajax:  {
                    'url':'/sales',
                    'type': 'POST'
                },
                table: '#sale-table',
                idSrc:'id',
                fields: [
                    { label: 'Supplier', name: 'supplier' },
                    { label: 'Invoice Number',  name: 'invoice_num'  },
                    { label: 'Art',  name: 'art'  },
                    { label: 'Quantity',  name: 'quantity'  },
                    { label: 'Currency',  name: 'currency'  },
                    { label: 'Rech Art',  name: 'rech_art'  },
                    { label: 'Customs',  name: 'customs'  },
                    { label: 'Vat',  name: 'vat'  },
                    { label: 'Shipment',  name: 'shipment'  },
                    { label: 'Assignment',  name: 'assignment'  },
                ]
            } );




            var table = $('#sale-table')
                .DataTable({
                    dom: 'lBfrtip',
                    ajax:  {
                        'url':'/sales',
                        'type': 'GET',

                    },
                    columns: [
                        {
                            className: 'dt-control',
                            orderable: false,
                            data: null,
                            defaultContent: '',
                        },
                        { data: 'supplier', className: 'dt-body-center' },
                        { data: 'invoice_num', className: 'dt-body-center' },
                        { data: 'art', className: 'dt-body-center' },
                        { data: 'quantity', className: 'dt-body-center' },
                        { data: 'currency', className: 'dt-body-center' },
                        { data: 'rech_art', className: 'dt-body-center' },
                        { data: 'customs', className: 'dt-body-center' },
                        { data: 'vat', className: 'dt-body-center' },
                        { data: 'shipment', className: 'dt-body-center' },
                        { data: 'assignment', className: 'dt-body-center' },
                    ],
                    select: true,
                    buttons: [
                        { extend: 'create', editor: editor },
                        { extend: 'edit', editor: editor },
                        { extend: 'remove', editor: editor },
                    ],
                });

        function buildChildTable() {

            return (
                '<table id="child-table" class="table dataTable no-footer"  style="padding-left:50px;">' +
            '<thead> <tr> <td>ID </td> <td> Quantity</td> </tr> </thead>'+
                '</table>'
            );
        }

        $('#sale-table tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            // $('#child-table').destroy();
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(buildChildTable()).show();
                tr.addClass('shown');
            }

            buildChildDatatable();

        });

            function buildChildDatatable() {

                $('#child-table').DataTable(
                    {
                        dom: 'lBfrtip',
                        ajax:  {
                            'url':'/sales/random-number',
                            'type': 'GET',

                        },
                        columns: [

                            { data: 'id', className: 'dt-body-center' },
                            { data: 'quantity', className: 'dt-body-center' },

                        ],
                        select: true,
                        buttons: [

                        ],
                    }

                );
            }


    </script>
@endpush
