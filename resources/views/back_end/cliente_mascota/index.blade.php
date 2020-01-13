@extends('../layouts.backend')

@section('titulo', 'Adopciones Registradas')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Mascota</th>
                                    <th>Cliente</th>
                                    <th>Registrado Por</th>
                                    <th>Fecha Registro</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @foreach ($cliente_mascotas as $cliente_mascota)
                                    <tr>
                                        <td>{{ $cliente_mascota->id_cliente_mascota}}</td>
                                        <td>{{ $cliente_mascota->mascota->nombre }}</td>
                                        <td>{{ $cliente_mascota->cliente->nombres }}</td>
                                        <td>{{ $cliente_mascota->registradoPor->name}}</td>
                                        <td>{{ $cliente_mascota->fecha_registro}}</td>
                                        <td>
                                
                                    <div style="display: flex; justify-content: space-around;">
                                                <a href="" class=""></a>
                       
                                                @if(Auth::user()->user_type == 'A' || $cliente_mascota->id_usuario == Auth::user()->id)
                                                    @if($cliente_mascota->estatus == 'A')
                                                        <form method="POST" action="{{ route('cliente_mascota.destroy', $cliente_mascota->id_cliente_mascota) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                                <i class="fa fa-exclamation-triangle"></i>Anular
                                                            </button>
                                                        </form>
                                                    @endif
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