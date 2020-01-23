<!DOCTYPE html>
<html lang="en">
<head>
<title>Servet Veterinaria</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="{{ asset('front_end/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="{{ asset('front_end/css/style.css') }}" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="{{ asset('front_end/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
@yield('css')
<!-- //font -->
<script src="{{ asset('front_end/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('front_end/js/bootstrap.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
	@include('partials.banner')

	@yield('content')

	@include('partials.footer')
	<script src="{{ asset('front_end/js/responsiveslides.min.js') }}"></script>
	<script src="{{ asset('front_end/js/SmoothScroll.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front_end/js/move-top.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front_end/js/easing.js') }}"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	@yield('js')
<!-- //here ends scrolling icon -->
</body>	
</html>