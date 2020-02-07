@extends('../layouts.backend')

@section('titulo', 'Editar Post')

@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Crear Posts</h5>

                <div class="errores mb-3">
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <ul>
                        <li class="text-danger">{{ $error }}</li>
                    </ul>
                    @endforeach
                    @endif
                </div>

                <form method="POST" action="{{ route('mascota_desaparecida.update', $mascota_desaparecida->id_mascota_desaparecida ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="titulo">Mascota: <span><strong class="text-danger">*</strong></span></label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required="" autocomplete="off" 
                        value="{{ $mascota_desaparecida->titulo }}">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Contenido: <span><strong class="text-danger">*</strong></span></label>
                        <textarea class="form-control" name="descripcion" id="descripcion" required="">@if($mascota_desaparecida->descripcion) {{ $mascota_desaparecida->descripcion }} @else {{ old('descripcion') }} @endif</textarea>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Cambiar imagen: <span><small>(Opcional)</small></span></label>
                        <input type="file" name="imagen" id="imagen" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                    
                    <a href="{{ route('mascota_desaparecida.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-mail-reply"></i>Atrás</a>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Imagen Actual</h5>
                <img src="{{ Storage::url($mascota_desaparecida->imagen) }}" width="100%">
            </div>
        </div>
    </div>
</div>
@endsection