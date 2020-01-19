<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{ asset('back_end/images/pets.jpg') }}" alt="profile image" width="50px" height="50px" style="max-width: none;">
                    </div>
                    <div class="text-wrapper" style="margin-top: 8px; margin-left: 25px;">
                        <p class="profile-name">{{ Auth::user()->name }}</p>
                        <div>
                            <small class="designation text-muted">{{ Auth::user()->tipo_usuario }}</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        

        {{-- modulo de opciones de mascota --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#mascotas" aria-expanded="false" aria-controls="mascotas">
                <i class="menu-icon mdi mdi-cat"></i>
                <span class="menu-title">Mascotas</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="mascotas">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mascotas.create') }}">Registrar Mascota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mascotas.index') }}">Mascotas Registradas</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- modulo de opciones de mascotas --}}


        {{-- modulo de opciones de clientes --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#clientes" aria-expanded="false" aria-controls="clientes">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Clientes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="clientes">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes.create') }}">Registrar Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes.index') }}">Clientes Registrados</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- fin modulo de opciones de clientes --}}


        {{-- opcion del modulo aplicar vacuna --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mascota_vacuna.consultar') }}">
                <i class="menu-icon mdi mdi-needle"></i>
                <span class="menu-title">Aplicar Vacuna</span>
            </a>
        </li>
        {{-- fin opcion del modulo aplicar vacuna --}}


        {{-- opcion del modulo citas --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#citas" aria-expanded="false" aria-controls="citas">
                <i class="menu-icon mdi mdi-calendar-range"></i>
                <span class="menu-title">Vacunación</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="citas">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vacunacion.create') }}">Agendar Vacunación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vacunacion.index') }}">Próximas Vacunaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vacunacion.historico') }}">Histórico de Vacunación</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- fin opcion del modulo citas --}}


        {{--opcion del modulo de adopcion--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cliente-mascota" aria-expanded="false" 
            aria-controls="cliente-mascota">
                <i class="menu-icon mdi mdi-paw"></i>
                <span class="menu-title">Gestionar Adopciones</span>
                <i class="menu-arrow"></i>
            </a>            
            <div class="collapse" id="cliente-mascota">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cliente_mascota.create') }}">Registrar Adopciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cliente_mascota.index') }}">Adopciones Realizadas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cliente_mascota.historico') }}">Histórico de Adopciones</a>
                    </li>
                </ul>
            </div>
        </li>
        {{--fin del modulo de adopcion--}}


        {{-- opcion del modulo de hospedajes --}}
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hospedajes" aria-expanded="false" aria-controls="hospedajes">
                <i class="menu-icon mdi mdi-home-heart"></i>
                <span class="menu-title">Realizar Hospedaje</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="hospedajes">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hospedajes.create') }}">Registrar Hospedaje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hospedajes.index') }}">Hospedajes Realizados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hospedajes.historico') }}">Histórico Hospedaje</a>
                    </li>       
                </ul>
            </div>
        </li>
        {{-- fin del modulo de hospedajes --}}


        {{-- opcion del modulo de servicios--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#mascota-servicio" aria-expanded="false" 
                aria-controls="mascota-servicio">

                <i class="menu-icon mdi mdi-heart"></i>
                <span class="menu-title">Gestionar Servicios</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="mascota-servicio">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mascota_servicio.create') }}">Aplicar Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mascota_servicio.index') }}">Servicios Aplicados</a>
                    </li>
                    {{--  <li class="nav-item">
                    <a class="nav-link" href="{{ route('cliente_mascota.historico') }}">Histórico Adopciones</a>
                    </li> --}}
                </ul>
            </div>
        </li>
        {{-- fin del modulo de servicios--}}


        {{-- modulo de opciones de registrar --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#registrar" aria-expanded="false" aria-controls="registrar">
                <i class="menu-icon mdi mdi-folder-plus"></i>
                <span class="menu-title">Registrar</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="registrar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('colores.index') }}">Color</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jaulas.index') }}">Jaula</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('paises.index') }}">País</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('provincias.index') }}">Provincia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('razas.index') }}">Raza</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('servicios.index') }}">Servicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vacunas.index') }}">Vacuna</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- fin modulo de opciones de registrar --}}

        {{-- opcion del modulo graficos --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('graficos.index') }}">
                <i class="menu-icon mdi mdi-chart-areaspline"></i>
                <span class="menu-title">Gráficos</span>
            </a>
        </li>
        {{-- fin opcion del modulo graficos --}}
    </ul>
</nav>