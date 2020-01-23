@extends('../layouts.backend')

@section('titulo', 'Crear Post')

@section('content')

<div class="row">
    <div class="col-md-8">
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

                    <form method="POST" action="{{ route('mascota_desaparecida.store') }}">
                        @csrf

                    </div>

                    <div class="form-group">
                        <label for="descripcion">Título: <span><strong class="text-danger">*</strong></span></label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required="" autocomplete="off" 
                        value="">
                    </div>

                   <textarea class="form-control" name="descripcion" required="" maxlength="255">{{old('descripcion')}}</textarea>

                    <div class="form-group">
                        <label for="descripcion">Imagen: <span><strong class="text-danger">*</strong></span></label>
                        <input type="text" name="imagen" id="imagen" class="form-control" required="" autocomplete="off" value="">
                    </div>

                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection