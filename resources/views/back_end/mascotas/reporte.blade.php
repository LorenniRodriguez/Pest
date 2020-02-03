@extends('../layouts.backend')

@section('titulo', 'Reporte de Servicios Aplicados a Mascotas')

@section('content')
    
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Seleccione los parámetros</h5>

                    <div class="errores mb-3">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <ul>
                                    <li class="text-danger">{{ $error }}</li>
                                </ul>
                            @endforeach
                        @endif
                    </div>

                    <form method="GET" action="{{ route('mascota.reporte') }}">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="año">Año: <strong><small>(opcional)</small></strong></label>
                                <input class="form-control" type="number" name="año" id="año" min="1" value="{{ request('año') }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="id_mascota">Mascota:</label>
                                <select class="form-control select2" name="id_mascota" id="id_mascota">
                                    <option value="0">Todas las mascotas</option>
                                    @foreach($mascotas as $mascota)
                                        <option value="{{ $mascota->id_mascota }}" @if(request('id_mascota') == $mascota->id_mascota) selected="" @endif>
                                            {{ $mascota->dueño }} | {{ $mascota->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="es_adoptada">Modalidad:</label>
                                <select class="form-control select2" name="es_adoptada" id="es_adoptada">
                                    <option @if(request('es_adoptada') == '2') selected="" @endif value="2">Todas los tipos</option>
                                    <option @if(request('es_adoptada') == '1') selected="" @endif value="1">Adoptadas</option>
                                    <option @if(request('es_adoptada') == '0') selected="" @endif value="0">No Adoptadas</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-info btn-sm" style="margin-top: 25px;"><i class="menu-icon mdi mdi-magnify"></i> Consultar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Mascota</th>
                                    <th>Tipo de Servicio</th>
                                    <th>Servicio</th>
                                    <th>Cantidad</th>
                                    <th>Año</th>
                                    <th>¿Adopatada?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $servicio)
                                    <tr>
                                        <td>{{ $servicio->mascota }}</td>
                                        <td>{{ $servicio->tipo_servicio }}</td>
                                        <td>{{ $servicio->servicio }}</td>
                                        <td>{{ $servicio->cantidad }}</td>
                                        <td>{{ $servicio->año }}</td>
                                        <td>{{ $servicio->es_adoptada }}</td>
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