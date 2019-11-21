<div class="banner @yield('class-banner')">
    <div class="header @yield('class-header')">
        <div class="container">
            <div class="header-left">
                <div class="w3layouts-logo">
                    <h1>
                        <a href="index.html">Cat <span>Club</span></a>
                    </h1>
                </div>
            </div>
            <div class="header-right">
                <div class="top-nav">
                    <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a class="active" href="/">Inicio</a></li>
                                <li><a href="{{ url('/about') }}">Acerca de</a></li>
                                <li><a href="{{ url('/gallery') }}">Galería</a></li>
                                <li><a href="{{ url('/blog') }}">Blog</a></li>
                                <li><a href="{{ url('/contact') }}">Contacto</a></li>
                            </ul>   
                            <div class="clearfix"> </div>
                        </div>  
                    </nav>      
                </div>
                <div class="agileinfo-social-grids">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    @yield('extra')
</div>