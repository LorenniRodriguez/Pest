@extends('layouts.frontend')

@section('class-banner', 'about-banner')
@section('class-header', 'about-header')

@section('extra')

	<div class="about-heading">	
		<div class="container">
			<h2>Mascotas Desaparecidas</h2>
		</div>
	</div>

@endsection

@section('content')

	<!-- gallery -->
	<div class="gallery">
		<div class="container">
			<div class="gallery-grids">
				@foreach($mascotas as $mascota)
					<div class="col-md-6 gallery-grid" style="display: flex;">
						<div class="grid" style="float:left; display: flex; width: 450px; height: 250px;">
							<figure class="effect-apollo" style="width: 450px;">
								<a class="example-image-link" href="{{ Storage::url($mascota->imagen) }}" data-lightbox="example-set" data-title="{{ $mascota->titulo . ' ···· ' . $mascota->descripcion }}">
									<img src="{{ Storage::url($mascota->imagen) }}" alt="" />
									<figcaption>
										<strong>{{ $mascota->titulo }}</strong>
										<p>{{ $mascota->descripcion }}</p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //gallery -->

@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('front_end/css/lightbox.css') }}">
@endsection

@section('js')
	<script src="{{ asset('front_end/js/lightbox-plus-jquery.min.js') }}"> </script>
@endsection