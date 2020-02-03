@extends('layouts.frontend')

@section('extra')

    <div class="w3layouts-banner-slider">
        <div class="container">
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides callbacks callbacks1" id="slider4">
                        <li>
                            <div class="agileits-banner-info">
                                <h3>Servet Veterinaria <span>¡Cuidamos de tu mascota como si fueras tú!</span></h3>
                            </div>
                        </li>
                        <li>
                            <div class="agileits-banner-info">
                                <h3>Servet Veterinaria<span>sdgfsgrdsfgsdfgf</span></h3>
                            </div>
                        </li>
                    </ul>
                </div>
                <script src="{{ asset('front_end/js/responsiveslides.min.js') }}"></script>
                <script>
                    // You can also use "$(window).load(function() {"
                    $(function () {
                      // Slideshow 4
                      $("#slider4").responsiveSlides({
                        auto: true,
                        pager:true,
                        nav:true,
                        speed: 500,
                        namespace: "callbacks",
                        before: function () {
                          $('.events').append("<li>before event fired.</li>");
                        },
                        after: function () {
                          $('.events').append("<li>after event fired.</li>");
                        }
                      });
                
                    });
                 </script>
                <!--banner Slider starts Here-->
            </div>
        </div>
    </div>

@endsection

@section('content')
    
    <!-- banner-bottom -->
    <div class="welcome">
        <div class="container">
            <div class="w3ls-heading">
                <h2>¡Bienvenido a Servet Veterinaria!</h2>
            </div>
            <div class="welcome-grids">
                <div class="col-md-8 agile-welcome-grid">
                    <div class="grid" style="display: flex;">
                        @foreach($mascotas as $mascota)
                            <div class="col-md-6 agileits-left" style="float:left; display: flex;">
                                <figure class="effect-chico">
                                    <img src="{{ Storage::url($mascota->imagen) }}" alt="" />
                                    <figcaption>
                                        <h4>{{ $mascota->titulo }}</h4>
                                        <p>{{ $mascota->descripcion }}</p>
                                    </figcaption>           
                                </figure>
                            </div>
                        @endforeach
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-4 agileinfo-welcome-right">
                    <h4>Con tu ayuda podemos encontrar estas mascotas.</h4>
                    <p>Estas mascotas ha sido reportadas por sus respectivos dueños y esperan con ansías que sean encontradas. <br>Si llegas a ver alguna de estas mascotas, no dudes en contactarnos.</span></p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- banner-bottom -->
    <!-- services -->
    <div class="services">
        <div class="container">
            <div class="w3ls-heading">
                <h3>¡Lo Que Hacemos!</h3>
            </div>
            <div class="wthree-services-grids">
                <div class="col-md-6 w3ls-about-left">
                    <div class="agileits-icon-grid">
                        <div class="icon-left hvr-radial-out">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </div>
                        <div class="icon-right">
                            <h5>Adopciones</h5>
                            <p>¡Ven y descubre tu futura mascota!</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="agileits-icon-grid">
                        <div class="icon-left hvr-radial-out">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                        <div class="icon-right">
                            <h5>Vacunas</h5>
                            <p>Tenemos todo los tipos de vacunas que tu Mascota necesita.</p>
                        </div>
                        <div class="clearfix"> </div>
                        </div>
                    <div class="agileits-icon-grid">
                        <div class="icon-left hvr-radial-out">
                            <i class="fa fa-home" aria-hidden="true" style="font-size: 2rem; color: #fff;"></i>
                        </div>
                        <div class="icon-right">
                            <h5>Hospedajes</h5>
                            <p>Somos los ideales en el cuidado tu mascota</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-6 w3ls-about-left">
                    <div class="agileits-icon-grid">
                        <div class="icon-left hvr-radial-out">
                            <i class="fa fa-paw" aria-hidden="true" style="font-size: 2rem; color: #fff;"></i>
                        </div>
                        <div class="icon-right">
                            <h5>Brindamos Los Servicios Más Básicos</h5>
                            <p>Porque los servicios lo realizamos todos, ¡Ven y visitanos!</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="agileits-icon-grid">
                        <div class="icon-left hvr-radial-out">
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        </div>
                        <div class="icon-right">
                            <h5>Colaboramos Para Que Encuentres Tu Mascota Desaparecida</h5>
                            <p>Comunicate con nostros en caso de que tu mascota se encuentre desaparecida.</p>
                        </div>
                        <div class="clearfix"> </div>
                        </div>
                    <div class="agileits-icon-grid">
                        <div class="icon-left hvr-radial-out">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                        </div>
                        <div class="icon-right">
                            <h5>Te Mantenemos Informados Sobre Tips y Noticias Para Tu Mascota</h5>
                            <p>Visita nuestro sitio Web y entérate de todo los consejos para tu mascota .</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //services -->

@endsection