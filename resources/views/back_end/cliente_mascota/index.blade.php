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
                                <th>Dueño</th>
                                <th>Mascota</th>
                                <th>Registrado Por</th>
                                <th>Fecha Registro</th>
                                <th>Certificado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($cliente_mascotas as $cliente_mascota)
                          <tr>
                            <td>{{ $cliente_mascota->cliente->nombreCompleto ?? '' }}</td>
                            <td>{{ $cliente_mascota->mascota->nombre }}</td>
                            <td>{{ $cliente_mascota->registradoPor->name}}</td>
                            <td>{{ $cliente_mascota->fecha_registro}}</td>
                            <td>
                                @if($cliente_mascota->es_adopcion == 'Y')
                                    <a class="btn btn-secondary btn-xs btn-rounded" href="{{ route('cliente_mascota.certificado', $cliente_mascota->id_cliente_mascota) }}" target="__blank"><i class="fa fa-print"></i> Imprimir</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>

                                <div style="display: flex; justify-content: space-around;">
                                    <a href="" class=""></a>

                                    @if($cliente_mascota->estatus == 'A')
                                    <form method="POST" action="{{ route('cliente_mascota.update', $cliente_mascota->id_cliente_mascota) }}">
                                        @csrf
                                        @method('PUT')
                                    
                                        <button type="submit" class="btn btn-info btn-xs btn-rounded">
                                            <i class="fa fa-location-arrow"></i>Concluir
                                        </button>
                                    </form>
                                    @endif
                                    
                                     @if(Auth::user()->user_type == 'A' || $cliente_mascota->registrado_por == Auth::user()->id)
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