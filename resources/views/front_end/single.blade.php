@extends('layouts.frontend')

@section('class-banner', 'about-banner')
@section('class-header', 'about-header')

@section('extra')

	<div class="about-heading">	
		<div class="container">
			<h2>{{ $post->titulo }}</h2>
		</div>
	</div>

@endsection

@section('content')
	
<div class="blog">
	<!-- container -->
	<div class="container">
		<div class="col-md-12 blog-top-left-grid">
			<div class="left-blog">
				<div class="blog-left">
					<div class="single-left-left">
						<p>Publicado por <a href="#">Servet Veterinaria</a> en {{ date('M d, Y', strtotime($post->fecha_publicacion)) }} &nbsp;&nbsp;</p>
						<img src="{{ Storage::url($post->imagen) }}">
					</div>
					<div class="blog-left-bottom" style="color: #2F2F2F !important;">
						{!! $post->descripcion !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //container -->
</div>

@endsection