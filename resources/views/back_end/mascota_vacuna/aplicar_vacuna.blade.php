@extends('../layouts.backend')

@section('titulo', 'Aplicar Vacuna')

@section('content')

    <div class="row mb-4">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Información de la mascota:</h5>

                    <form>
                        <div class="form-group">
                            <label>Dueño:</label>
                            <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->adoptadaPor[0]->cliente->nombreCompleto ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label>Mascota:</label>
                            <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->nombre }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Tipo Mascota:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->tipoMascota->descripcion }}">
                            </div>

                            <div class="col-md-4">
                                <label>Raza:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->raza->descripcion }}">
                            </div>

                            <div class="col-md-4">
                                <label>Estatura:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->estatura->descripcion }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Fecha Nac.:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->fecha_nacimiento }}">
                            </div>

                            <div class="col-md-4">
                                <label>Peso:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->peso }}">
                            </div>

                            <div class="col-md-4">
                                <label>Registrado:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->fecha_registro }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Seleccione una vacuna:</h5>

                    <form method="POST" action="{{ route('mascota_vacuna.store') }}">
                        @csrf

                        <input type="hidden" name="id_cita" value="{{ $id_cita }}">

                        <div class="form-group">
                            <label for="nombre">Mascota: <span><strong class="text-danger">*</strong></span></label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $mascota->nombre }}" required="" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="id_vacuna">Vacuna: <span><strong class="text-danger">*</strong></span></label>
                            @if(count($vacunas))
                                <select class="form-control select2" name="id_vacuna" id="id_vacuna" required="">
                                    @foreach($vacunas as $vacuna)
                                        <option value="{{ $vacuna->id_vacuna }}" @if($vacuna->id_vacuna == $id_vacuna) selected="" @endif>{{ $vacuna->descripcion }}</option>
                                    @endforeach
                                </select>
                            @else
                                <p><strong class="text-info">Esta mascota no le restan vacunas por aplicar. <br>¡Está al día! <i class="fa fa-paw text-black"></i></strong></p>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id_mascota" id="id_mascota" class="form-control" value="{{ $mascota->id_mascota }}" required="" autocomplete="off">
                        </div>

                        @if(count($vacunas))
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Aplicar</button>
                        @endif
                        <a href="{{ route('mascota_vacuna.consultar') }}" class="btn btn-warning btn-sm"><i class="fa fa-mail-reply"></i>Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Histórico de Vacunas Aplicadas a {{ $mascota->nombre }}:</h5>

                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Vacuna</th>
                                    <th>Veterinario</th>
                                    <th>Fecha Aplicación</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mascota_vacunas as $mascota_vacuna)
                                    <tr>
                                        <td>{{ $mascota_vacuna->vacuna->descripcion }}</td>
                                        <td>{{ $mascota_vacuna->usuario->name }}</td>
                                        <td>{{ $mascota_vacuna->fecha_registro }}</td>
                                        <td class="text-center">
                                            @if(Auth::user()->user_type == 'A' || $mascota_vacuna->id_usuario == Auth::user()->id)
                                                <div style="display: flex; justify-content: space-around;">
                                                    @if($mascota_vacuna->estatus == 'A')
                                                        <form method="POST" action="{{ route('mascota_vacuna.destroy', $mascota_vacuna->id_mascota_vacuna) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                                <i class="fa fa-exclamation-triangle"></i>Anular
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            @else
                                                <span>No puedes anular esta vacuna.</span>
                                            @endif
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