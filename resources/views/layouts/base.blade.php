<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Absensi</title>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/default/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/default/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/default/theme/default.css') }}" rel="stylesheet" id="theme" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link
        href="{{ asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
        rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body>
    <div class="page-cover"></div>
    @include('layouts.header')
    @include('layouts.sidebar')
    @yield('content')

    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
    <script
        src="{{ asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/theme/transparent.min.js') }}"></script>
    <script src="{{ asset('assets/js/apps.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->

    <script>
        $(document).ready(function() {
			App.init();
		      
            /*
             * for page absensi
             */
            $('[timepicker]').datetimepicker({
                format: 'H:m:s'
            });
            
            $('[timepicker]').on('dp.hide', function (e) {  
                $(e.target).parent().parent().submit();
            }); 

            $('[update-status]').click(function () {  
                let nip = $(this).attr('karyawan-id');
                let ket = $(this).attr('karyawan-ket');
                $('#hid_karyawan_id').val(nip);
                $('#hid_karyawan_ket').val(ket);
            });

            $('[reset]').click(function () {  
                $(this).parent().parent()[0].reset();
            });
        });
    </script>

</body>

</html>