@extends('../layouts.backend')

@section('titulo', 'Editar Provincia')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('provincias.update', $provincia->id_provincia) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="pais">País:</label>
                            <select class="form-control" name="id_pais" id="id_pais">
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id_pais }}" @if($provincia->id_pais == $pais->id_pais) selected="" @endif>{{ $pais->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Provincia:</label>
                            <input type="text" value="{{ $provincia->descripcion }}" name="descripcion" id="descripcion" class="form-control" required="" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Guardar</button>
                        <a href="{{ route('provincias.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-mail-reply"></i>Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection