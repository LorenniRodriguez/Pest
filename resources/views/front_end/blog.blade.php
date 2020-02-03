@extends('layouts.frontend')

@section('class-banner', 'about-banner')
@section('class-header', 'about-header')

@section('extra')

	<div class="about-heading">	
		<div class="container">
			<h2>Nuestro Blog</h2>
		</div>
	</div>

@endsection

@section('content')

	<!-- blog -->
	<div class="blog">
		<!-- container -->
		<div class="container">
			<div class="blog-top-grids">
				<div class="col-md-12 blog-top-left-grid" style="float: initial !important;">
					<div class="row left-blog">
						@foreach($posts as $post)						
							<div class="blog-left col-md-4">
								<div class="blog-left-left">
									<p>Publicado por <a href="#">Servet Veterinaria</a> en {{ date('M d, Y', strtotime($post->fecha_publicacion)) }} &nbsp;&nbsp;</p>
									<a href="{{ route('single', $post->id_post) }}">
										<img src="{{ Storage::url($post->imagen) }}" style="background-position: center bottom; height: 300px; width: 350px;">
									</a>
								</div>
								<div class="blog-left-right">
									<a href="{{ route('single', $post->id_post) }}">{{ $post->titulo }}</a>

									{{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed blandit massa vel mauris sollicitudin 
									dignissim. Phasellus ultrices tellus eget ipsum ornare molestie scelerisque eros dignissim. Phasellus 
									fringilla hendrerit lectus nec vehicula. ultrices tellus eget ipsum ornare consectetur adipiscing elit.Sed blandit .
									estibulum aliquam neque nibh, sed accumsan nulla ornare sit amet.  --}}
								</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						@endforeach
					</div>
				</div>

				<nav style="margin: 0 auto; text-align: center;">
					{{ $posts->links() }}
				</nav>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //blog -->

@endsection