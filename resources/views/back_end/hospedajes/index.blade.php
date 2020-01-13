@extends('../layouts.backend')

@section('titulo', 'Hospedajes Registrados')

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
                                    <th>Jaula</th>
                                    <th>Registrado Por</th>
                                    <th>Fecha Registro</th>
                                    <th>Fecha Final</th>
                                    <th>Tipo Hospedaje</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hospedajes as $hospedaje)
                                    <tr>
                                        <td>{{ $hospedaje->id_hospedaje }}</td>
                                        <td>{{ $hospedaje->mascota->nombre }}</td>
                                        <td>{{ $hospedaje->jaula->descripcion }}</td>
                                        <td>{{ $hospedaje->usuario->name }}</td>
                                        <td>{{ $hospedaje->fecha_registro}}</td>                                      
                                        <td>{{ $hospedaje->fecha_final }}</td>
                                        <td>{{ $hospedaje->TipoHospedaje->descripcion}}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-around;">
                                                <a href="" class=""></a>

                                                 <form method="POST" action="{{ route('hospedajes.update', $hospedaje->id_hospedaje) }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <button type="submit" class="btn btn-info btn-xs btn-rounded">
                                                        <i class="fa fa-location-arrow"></i>¡Finalizar!
                                                    </button>
                                                </form>
                       
                                                @if(Auth::user()->user_type == 'A' || $hospedaje->id_usuario == Auth::user()->id)
                                                    @if($hospedaje->estatus == 'A')
                                                        <form method="POST" action="{{ route('hospedajes.destroy', $hospedaje->id_hospedaje) }}">
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