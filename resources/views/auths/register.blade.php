<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Register Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css') }}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" />
	<link href="{{asset('assets/css/default/style.min.css') }}" rel="stylesheet" />
	<link href="{{asset('assets/css/default/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{asset('assets/css/default/theme/default.css') }}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins/pace/pace.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url({{asset('assets/img/login-bg/login-bg-9.jpg)') }}"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Color</b> Admin App</h4>
                    <p>
                        As a Color Admin app administrator, you use the Color Admin console to manage your organization’s account, such as add new users, manage security settings, and turn on the services you want your team to access.
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <h1 class="register-header">
                    Sign Up
                    <small>Create your Color Admin Account. It’s free and always will be.</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
                    <form action="/registerPost" method="POST" class="margin-bottom-0">
                        {{ csrf_field() }}
                        <label class="control-label">Name <span class="text-danger">*</span></label>
                        <div class="row row-space-10">
                            <div class="col-md-12">
                                <input name="name" type="text" class="form-control" placeholder="Name" required />
                            </div>
                        </div><br>
                        <label class="control-label">Email <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="email" type="text" class="form-control" placeholder="Email address" required />
                            </div>
                        </div>
                        <label class="control-label">Password <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="password" type="password" class="form-control" placeholder="Password" required />
                            </div>
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
                        	<div class="checkbox checkbox-css m-b-30">
								<input type="checkbox" id="agreement_checkbox" value="">
								<label for="agreement_checkbox">
									By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
								</label>
							</div>
                        </div>
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Already a member? Click <a href="/auths/login">here</a> to login.
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy; Color Admin All Right Reserved 2018
                        </p>
                    </form>
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->
        
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
	<script src="{{asset('assets/js/theme/default.min.js') }}"></script>
	<script src="{{asset('assets/js/apps.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
