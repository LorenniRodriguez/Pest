@extends('../layouts.backend')

@section('titulo', 'Editar Servicio')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('servicios.update', $servicio->id_servicio) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="servicio">Tipo de Servicio:</label>
                            <select class="form-control" name="id_tipo_servicio" id="id_tipo_servicio">
                                @foreach($tipo_servicios as $tipo_servicio)
                                    <option value="{{ $tipo_servicio->id_tipo_servicio }}" @if($servicio->id_tipo_servicio == $tipo_servicio->id_tipo_servicio) selected="" @endif>{{ $tipo_servicio->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Servicio:</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" required="" autocomplete="off" value="{{ $servicio->descripcion }}">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Guardar</button>
                        <a href="{{ route('servicios.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-mail-reply"></i>Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection