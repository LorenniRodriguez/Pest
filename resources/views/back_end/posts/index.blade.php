@extends('../layouts.backend')

@section('titulo', 'Posts Registrado')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Fecha Publicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->titulo }}</td>
                                <td>{{ $post->descripcion }}</td>
                                <td>{{ $post->imagen}}</td>
                                <td>{{ date('d-m-Y', strtotime($post->fecha_publicacion)) }}</td>
                                <td>
                                 <div style="display: flex; justify-content: space-around;">
                                    <a href="" class=""></a>

                                    
                                    <button type="button" class="btn btn-info btn-xs btn-rounded"
                                        onclick="window.location = '{{ route('posts.edit', $post->id_post) }}'">
                                        <i class="fa fa-pencil"></i>Editar
                                    </button>

                                    
                                    @if($post->estatus == 'A')
                                    <form method="POST" action="{{ route('posts.destroy', $post->id_post) }}">
                                        @csrf
                                        @method('DELETE') 

                                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                            <i class="fa fa-exclamation-triangle"></i>Anular
                                        </button>
                                    
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