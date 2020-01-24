@extends('../layouts.backend')

@section('titulo', 'Crear Post')

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

                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="titulo">Título: <span><strong class="text-danger">*</strong></span></label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required="" autocomplete="off" 
                            value="{{ old('titulo') }}">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Contenido: <span><strong class="text-danger">*</strong></span></label>    
                            <textarea class="form-control" name="descripcion" id="descripcion" required="">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen: <span><strong class="text-danger">*</strong></span></label>
                            <input class="form-control" type="file" name="imagen" id="imagen">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('back_end/vendors/summernote/dist/summernote.css') }}">
@endsection


@section('js')
    <script type="text/javascript" src="{{ asset('back_end/vendors/summernote/dist/summernote.js') }}"></script>
    <script type="text/javascript">
        $('#descripcion').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing su
        });
    </script>
@endsection