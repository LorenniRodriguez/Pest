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
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="{{ asset('front_end/images/g1.jpg') }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
									<img src="{{ asset('front_end/images/g1.jpg') }}" alt="" />
									<figcaption>
										<p>Proin vitae luctus dui, sit amet ultricies leo</p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="{{ asset('front_end/images/g2.jpg') }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
									<img src="{{ asset('front_end/images/g2.jpg') }}" alt="" />
									<figcaption>
										<p>Proin vitae luctus dui, sit amet ultricies leo</p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="{{ asset('front_end/images/g3.jpg') }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
									<img src="{{ asset('front_end/images/g3.jpg') }}" alt="" />
									<figcaption>
										<p>Proin vitae luctus dui, sit amet ultricies leo</p>
									</figcaption>		
								</a>
							</figure>
						</div>
					</div>
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="{{ asset('front_end/images/g4.jpg') }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
									<img src="{{ asset('front_end/images/g4.jpg') }}" alt="" />
									<figcaption>
										<p>Proin vitae luctus dui, sit amet ultricies leo</p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="{{ asset('front_end/images/g5.jpg') }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
									<img src="{{ asset('front_end/images/g5.jpg') }}" alt="" />
									<figcaption>
										<p>Proin vitae luctus dui, sit amet ultricies leo</p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="{{ asset('front_end/images/g6.jpg') }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
									<img src="{{ asset('front_end/images/g6.jpg') }}" alt="" />
									<figcaption>
										<p>Proin vitae luctus dui, sit amet ultricies leo</p>
									</figcaption>		
								</a>
							</figure>
						</div>
					</div>
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="{{ asset('front_end/images/g1.jpg') }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
									<img src="{{ asset('front_end/images/g1.jpg') }}" alt="" />
									<figcaption>
										<p>Proin vitae luctus dui, sit amet ultricies leo</p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="{{ asset('front_end/images/g2.jpg') }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
									<img src="{{ asset('front_end/images/g2.jpg') }}" alt="" />
									<figcaption>
										<p>Proin vitae luctus dui, sit amet ultricies leo</p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="{{ asset('front_end/images/g3.jpg') }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
									<img src="{{ asset('front_end/images/g3.jpg') }}" alt="" />
									<figcaption>
										<p>Proin vitae luctus dui, sit amet ultricies leo</p>
									</figcaption>		
								</a>
							</figure>
						</div>
					</div>
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