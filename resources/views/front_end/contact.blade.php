@extends('layouts.frontend')

@section('class-banner', 'about-banner')
@section('class-header', 'about-header')

@section('extra')

	<div class="about-heading">	
		<div class="container">
			<h2>Contacto</h2>
		</div>
	</div>

@endsection

@section('content')

	<!-- contact -->
	<div class="contact-top">
		<!-- container -->
		<div class="container">
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d158858.18237072596!2d-0.10159865000003898!3d51.52864165000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1436514341845" allowfullscreen></iframe>
			</div>
			<div class="mail-grids">
				<div class="col-md-6 mail-grid-left">
					<h3>Dirección</h3>
					<h5>Cras porttitor imperdiet volutpat nulla malesuada lectus eros <span>ut convallis felis consectetur ut </span></h5>
					<h4>Headquarters</h4>
					<p>123 T. Globel Place.
						<span>CG 09-123</span>
						London, Ba. 4567
					</p>
					<h4>Get In Touch</h4>
					<p>Telephone: +1 234 567 9871
						<span>FAX: +1 234 567 9871</span>
						E-mail: <a href="mailto:info@example.com">mail@example.com</a>
					</p>
				</div>
				<div class="col-md-6 contact-form">
					<form action="#" method="post">
						<input type="text" name="Name" placeholder="Name" required="">
						<input type="email" name="Email" placeholder="Email" required="">
						<input type="text" name="Subject" placeholder="Subject" required="">
						<textarea name="Message" placeholder="Message" required=""></textarea>
						<input type="submit" value="SEND">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //contact -->

@endsection