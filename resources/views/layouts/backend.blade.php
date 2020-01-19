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
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('back_end/css/style.css') }}">
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
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                  <i class="mdi mdi-heart text-danger"></i>
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
</script>

@yield('js')
<!-- End custom js for this page-->
</body>

</html>