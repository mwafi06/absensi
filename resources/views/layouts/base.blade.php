<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Absensi</title>
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
      <link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet') }}" />
      <link href="{{ asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/css/transparent/style.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/css/transparent/style-responsive.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/css/transparent/theme/default.css') }}" rel="stylesheet" id="theme" />
      <link href="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
      <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    </head>
    <body>
        <div class="page-cover"></div>
        @include('layouts.header')
        @include('layouts.sidebar')
        @yield('content')
    
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top">
          <i class="fa fa-angle-up"></i>
        </a>
      <script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
      <script src="{{ asset('assets/js/theme/transparent.min.js') }}"></script>
      <script src="{{ asset('assets/js/apps.min.js') }}"></script>
      <!-- ================== END BASE JS ================== -->
      <script>
			$(document).ready(function() {
			COLOR_BLACK_TRANSPARENT_2 = 'rgba(255,255,255,0.15)';
			COLOR_WHITE = '#333';
			App.init();
		});
    </script>
    </body>
  </html>