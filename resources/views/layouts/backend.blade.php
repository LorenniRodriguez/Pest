<!DOCTYPE html>
<html lang="es">

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('titulo')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('back_end/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back_end/vendors/iconfonts/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back_end/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('back_end/vendors/jquery-toast/jquery.toast.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back_end/vendors/css/vendor.bundle.addons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('back_end/vendors/select2/css/select2_4.0.8.min.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('back_end/css/style.css') }}">
  <style type="text/css">
    .badge {
      font-size: .7rem;
    }
    .select2-container {
      width: 100% !important;
    }
    .select2-container--default .select2-selection--single {
        border: 1px solid #f2f2f2 !important;
        font-family: "Poppins", sans-serif;
        font-size: 0.75rem;
        padding: 0.4375rem 0.75rem;
        height: calc(2.25rem + 2px);
        line-height: 14px;
        font-weight: 300;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      top: 5px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 24px;
    }
  </style>
  @yield('css')
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('back_end/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('partials.navbar_admin')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('partials.sidebar')
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <h3>@yield('titulo') <small>@yield('subtitulo')</small></h3>

            @yield('content') 
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020
              <a href="">Servet Veterinaria</a>. Todos los derechos reservados.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                  <i class="mdi mdi-cat text-danger"></i>
                  Lorenni Rodriguez / Melissa Nuñez
                  <i class="mdi mdi-cat text-danger"></i>
              </span>
          </div>
      </footer>
      <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('back_end/vendors/js/vendor.bundle.base.js') }}"></script>
{{-- <script src="{{ asset('back_end/vendors/js/vendor.bundle.addons.js') }}"></script> --}}
<script src="{{ asset('back_end/vendors/jquery-toast/jquery.toast.min.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('back_end/js/off-canvas.js') }}"></script>
<script src="{{ asset('back_end/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('back_end/js/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('back_end/vendors/select2/js/select2_4.0.8.min.js') }}"></script>
<script type="text/javascript">

    $(document).ready(function () {
      resetToastPosition = function ()
      {
            $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
            $(".jq-toast-wrap").css({"top": "", "left": "", "bottom":"", "right": ""}); //to remove previous position style
        };

        @if(Session::has('success'))
            resetToastPosition();

            $.toast({
                heading: '¡Operación Exitosa!',
                text: '{{ Session::get('success') }}',
                showHideTransition: 'fade',
                icon: 'success',
                loaderBg: '#f96868',
                position: 'top-right',
                hideAfter: 7000
            });
        
        @elseif(Session::has('info'))
            resetToastPosition();

            $.toast({
                heading: '¡Oops!',
                text: `{{ message }}`,
                showHideTransition: 'fade',
                icon: 'info',
                loaderBg: '#46c35f',
                    position: 'top-right',
                    hideAfter: 8500
                });
        
        @elseif(Session::has('warning'))
            resetToastPosition();

            $.toast({
                heading: '¡Advertencia!',
                text: `{{ message }}`,
                showHideTransition: 'fade',
                icon: 'warning',
                loaderBg: '#57c7d4',
                    // bgColor : '#8a6d3b',
                    position: 'top-right',
                    hideAfter: 8500
                });

        @elseif(Session::has('danger'))
            resetToastPosition();

            $.toast({
                heading: 'Error',
                text: `{{ message }}`,
                showHideTransition: 'fade',
                icon: 'error',
                loaderBg: '#f2a654',
                    // bgColor : '#a94442',
                    position: 'top-right',
                    hideAfter: 8500
                });
        @endif
    });

    if($(".select2").length)
        $(".select2").select2();
  </script>
</script>

@yield('js')
<!-- End custom js for this page-->
</body>

</html>