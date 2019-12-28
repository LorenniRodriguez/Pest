@extends('../layouts.backend')

@section('titulo', 'Clientes Registrado')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Edad</th>
                                    <th>genero</th>
                                    <th>cedula</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Celular</th>
                                    <th> País</th>
                                    <th>Provincia</th>
                                    <th>Fecha de Registro</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->nombres }}</td>
                                        <td>{{ $cliente->apellidos }}</td>
                                        <td>{{ $cliente->edad }}</td>
                                        <td>{{ $cliente->genero->descripcion }}</td>
                                        <td>{{ $cliente->cedula}}</td>
                                        <td>{{ $cliente->direccion }}</td>
                                        <td>{{ $cliente->telefono}}</td>
                                        <td>{{ $cliente->celular}}</td>
                                        <td>{{ $cliente->pais->descripcion}}</td>
                                        <td>{{ $cliente->provincia->descripcion}}</td>
                                        <td>{{ date('d-m-Y', strtotime($cliente->fecha_registro)) }}</td>

                                         <td>
                                            <div style="display: flex; justify-content: space-around;">
                                                <button type="button" class="btn btn-info btn-xs btn-rounded"
                                                        onclick="window.location = '{{ route('clientes.edit', $cliente->id_cliente) }}'">
                                                    <i class="fa fa-pencil"></i>Editar
                                                </button>

                                                @if($cliente->estatus == 'A')
                                                    <form method="POST" action="{{ route('clientes.destroy', $cliente->id_cliente) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                            <i class="fa fa-trash"></i>Papelera
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('clientes.restore', $cliente->id_cliente) }}">
                                                        @csrf

                                                        <button type="submit" class="btn btn-success btn-xs btn-rounded">
                                                            <i class="fa fa-undo"></i>Habilitar
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('partials.datatable')