@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('back_end/vendors/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">

    <style type="text/css">
        .table td { padding: 10px !important; }
        .table th { padding: 15px !important; }
        div.dataTables_wrapper div.dataTables_length label { font-size: 12px !important; }
    </style>
@endsection


@section('js')
    <script type="text/javascript" src="{{ asset('back_end/vendors/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('back_end/vendors/datatables.net-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript">
        var spanish = {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay datos registrados en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero"
                , "sLast": "Último"
                , "sNext": "Siguiente"
                , "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }

        $(function() {
            $('.data-table').DataTable({
                "stateSave": true, // guarda el estado del DT al actualizar
                "info": false, // oculta la info. de la tabla
                "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "Todo"]],
                "iDisplayLength": 5,
                "language": spanish
                //"scrollY": "45vh", // para usar una determinada parte del espacio del viewport
                //"paging": false, // oculta la paginacion
                // "ordering": true // para habilitar el ordenamiento
            });
            
            $('.data-table').each(function() {
                var datatable = $(this);

                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Buscar en toda la tabla...');
                search_input.removeClass('form-control-sm');
                
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                //length_sel.removeClass('form-control-sm');
            });
        });
    </script>
@endsection