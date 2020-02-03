@extends('../layouts.backend')

@section('titulo', 'Historial Clínico')

@section('content')

    <div class="row mb-4">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Información de la mascota:</h5>

                    <form>
                        <div class="form-group">
                            <label>Nombre:</label>
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

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Información de su dueño:</h5>

                    <form>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->adoptadaPor[0]->cliente->nombre_completo ?? 'Veterinaria' }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Cédula:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->adoptadaPor[0]->cliente->cedula ?? '' }}">
                            </div>

                            <div class="col-md-6">
                                <label>Fecha Nac.:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->adoptadaPor[0]->cliente->fecha_nacimiento  ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Género:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->adoptadaPor[0]->cliente->genero->descripcion ?? ''  }}">
                            </div>

                            <div class="col-md-6">
                                <label>Celular:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->adoptadaPor[0]->cliente->celular ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Provincia:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->adoptadaPor[0]->cliente->provincia->descripcion ?? ''  }}">
                            </div>

                            <div class="col-md-4">
                                <label>Registrado:</label>
                                <input type="text" class="form-control form-control" readonly="" value="{{ $mascota->adoptadaPor[0]->cliente->fecha_registro ?? '' }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Servicios Básicos Aplicados a {{ $mascota->nombre }}:</h5>

                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Servicio</th>
                                    <th>Veterinario</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mascota_servicios as $mascota_servicio)
                                    @if($mascota_servicio->servicio->id_tipo_servicio == 1)
                                        <tr>
                                            <td>{{ $mascota_servicio->servicio->descripcion }}</td>
                                            <td>{{ $mascota_servicio->usuario->name }}</td>
                                            <td>{{ $mascota_servicio->fecha_registro }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
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
                                    <th>Aplicacada el</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mascota_vacunas as $mascota_vacuna)
                                    <tr>
                                        <td>{{ $mascota_vacuna->vacuna->descripcion }}</td>
                                        <td>{{ $mascota_vacuna->usuario->name }}</td>
                                        <td>{{ $mascota_vacuna->fecha_registro }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Historial de Chequeos Médicos Realizados a {{ $mascota->nombre }}:</h5>

                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Descripción</th>
                                    <th>Fecha Realización</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mascota->diagnosticos as $diagnostico)
                                    <tr>
                                        <td>{{ $diagnostico->descripcion }}</td>
                                        <td>{{ $diagnostico->fecha_registro }}</td>
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