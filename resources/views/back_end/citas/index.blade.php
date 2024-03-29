@extends('../layouts.backend')

@section('titulo', 'Próximas Vacunaciones')
{{-- @section('subtitulo', '(Próximas vacunas a aplicar)') --}}

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
                                    <th>Vacuna</th>
                                    <th>Registrado Por</th>
                                    <th>Fecha Cita</th>
                                    <th>Faltan</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td>{{ $cita->id_cita }}</td>
                                        <td>{{ $cita->mascota->nombre }}</td>
                                        <td>{{ $cita->vacuna->descripcion }}</td>
                                        <td>{{ $cita->usuario->name }}</td>
                                        <td>{{ $cita->fecha_cita }}</td>
                                        <td>
                                            @if($cita->dias_restantes > 0)
                                                <label class="badge badge-success">{{ str_replace('-', '', substr($cita->dias_restantes, 1, 1)) }} día(s)</label>
                                            @elseif($cita->dias_restantes < 0)
                                                <label class="badge badge-danger">@php echo ((int) $cita->dias_restantes * -1) . ' día(s)' @endphp</label>
                                            @else
                                                <label class="badge badge-primary">¡Es hoy!</label>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="display: flex; justify-content: space-around;">
                                                <a href="" class=""></a>
                                                <form method="POST" action="{{ route('mascota_vacuna.aplicar_vacuna') }}">
                                                    @csrf

                                                    <input type="hidden" name="id_mascota" value="{{ $cita->id_mascota }}">
                                                    <input type="hidden" name="id_vacuna" value="{{ $cita->id_vacuna }}">
                                                    <input type="hidden" name="id_cita" value="{{ $cita->id_cita }}">

                                                    @if($cita->dias_restantes <= 0)
                                                        <button type="submit" class="btn btn-info btn-xs btn-rounded">
                                                            <i class="fa fa-location-arrow"></i>¡Atender!
                                                        </button>
                                                    @endif
                                                </form>

                                                @if(Auth::user()->user_type == 'A' || $cita->id_usuario == Auth::user()->id)
                                                    @if($cita->estatus == 'A')
                                                        <form method="POST" action="{{ route('vacunacion.destroy', $cita->id_cita) }}">
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