@extends('../layouts.backend')

@section('titulo', 'Publicar Mascota Extraveada')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Datos de la Publicación</h5>

                    <div class="errores mb-3">
                        @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                        <ul>
                            <li class="text-danger">{{ $error }}</li>
                        </ul>
                        @endforeach
                        @endif
                    </div>

                    <form method="POST" action="{{ route('mascota_desaparecida.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="titulo">Mascota: <span><strong class="text-danger">*</strong></span></label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required="" autocomplete="off" 
                            value="">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Contenido: <span><strong class="text-danger">*</strong></span></label>
                            <textarea class="form-control" name="descripcion" id="descripcion" required="">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen: <span><strong class="text-danger">*</strong></span></label>
                            <input type="file" name="imagen" id="imagen" class="form-control" required="">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection