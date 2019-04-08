<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/default/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/default/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/default/theme/default.css') }}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>

    <div class="login-cover">
       <div class="login-cover-image" style="background-image: url({{ asset('assets/img/login-bg/login-bg-12.jpg') }})" data-id="login-cover-image"></div>
       <div class="login-cover-bg"></div>
   </div>
   <!-- begin #page-container -->
   <div id="page-container" class="fade">
       <!-- begin login -->
       <div class="login login-v2" data-pageload-addclass="animated fadeIn">
        <!-- begin news-feed -->
        {{-- <div class="news-feed">
            <div class="news-image" style="background-image: url({{ asset('assets/img/login-bg/login-bg-11.jpg)') }}"></div>
            <div class="news-caption">
                <h4 class="caption-title"><b>Login</b></h4>
                <p>
                    Selamat datang, tampilan ini hanya untuk admin
                </p>
            </div>
        </div> --}}
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="login-content">
            <!-- begin login-header -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span><b>Login Admin</b>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- begin login-content -->
            <div class="login-content">

                <!-- end login-header -->
                @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
                @endif
                @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
                @endif
                
                <form class="margin-bottom-0" action="/loginpost" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group m-b-15">
                        <input name="email" type="text" class="form-control form-control-lg" placeholder="Email Address" required />
                    </div>
                    <div class="form-group m-b-15">
                        <input name="password" type="password" class="form-control form-control-lg" placeholder="Password" required />
                    </div>
                    <div class="checkbox checkbox-css m-b-30">
                     <input type="checkbox" id="remember_me_checkbox" value="" />
                     <label for="remember_me_checkbox">
                        Remember Me
                    </label>
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Sign In</button>
                </div>
                {{-- <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                    Not a member yet? Click <a href="/auths/register" class="text-success">here</a> to register.
                </div> --}}
                {{-- <hr />
                    <p class="text-center text-grey-darker">
                        &copy; Color Admin
                    </p> --}}
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end right-container -->
    </div>
    <!-- end login -->
    
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('assets/js/theme/default.min.js') }}"></script>
<script src="{{ asset('assets/js/apps.min.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<script>
  $(document).ready(function() {
     App.init();
 });
</script>
</body>
</html>
