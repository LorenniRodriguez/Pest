@extends('../layouts.backend')

@section('titulo', 'Publicaciones Realizadas')

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
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Fecha Publicación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mascota_desaparecidas as $mascota_desaparecida)
                            <tr>
                                <td>{{ $mascota_desaparecida->titulo }}</td>
                                <td class="text-center">
                                    <img src="{{ Storage::url($mascota_desaparecida->imagen) }}">
                                </td>
                                <td class="text-center">{{ date('d-m-Y', strtotime($mascota_desaparecida->fecha_publicacion)) }}</td>
                                <td>
                                   <div style="display: flex; justify-content: space-around;">
                                    <a href="" class=""></a>

                                    
                                    <button type="button" class="btn btn-info btn-xs btn-rounded"
                                    onclick="window.location = '{{ route('mascota_desaparecida.edit', 
                                    $mascota_desaparecida->id_mascota_desaparecida) }}'">
                                    <i class="fa fa-pencil"></i>Editar
                                </button>

                                    @if($mascota_desaparecida->estatus == 'A')
                                    <form method="POST" action="{{ route('mascota_desaparecida.destroy', $mascota_desaparecida->id_mascota_desaparecida) }}">
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