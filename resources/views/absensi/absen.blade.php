<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Absensi Karyawan</title>
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
	
</head>
<body>
	<div class="absen">
		<!-- begin panel -->
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h4 class="panel-title">Absensi Karyawan ( <span id="date-part"></span> - <span id="time-part"></span>)</h4>
			</div>
			<div class="panel-body">
				@if(Session::get('msg_error') !== NULL)
				<div class="alert alert-danger fade show m-b-10">
					<span class="close" data-dismiss="alert">×</span>
					{{Session::get('msg_error')}}
				</div>
				@endif
				@if(Session::get('msg_success') !== NULL)
				<div class="alert alert-success fade show m-b-10">
					<span class="close" data-dismiss="alert">×</span>
					{{Session::get('msg_success')}}
				</div>
				@endif
				<form method="post" action="{{url('/absen/save')}}" id="form-absen">
					@csrf						
					<div class="form-group">
						<center><label for="name">Masukkan NIP/Nama Anda</label></center>
						<input type="text" class="form-control" name="name"/>
					</div>
					<div style="text-align:center">
						<button type="button" class="btn btn-submit btn-success" id="masuk">Absen Masuk</button>
						<button type="button" class="btn btn-submit btn-danger" id="keluar">Absen Keluar</button>
					</div>
					<div class="m-t-20 text-center">
						Ajukan izin. <a href="#" class="text-success">Klik Disini</a> 
					</div>
				</form>
			</div>
		</div>
		<!-- end panel -->
		<div class="m-t-20 m-b-40 p-b-40 text-center">
			Anda admin? <a href="/auths/login" class="text-success">Login Disini</a> 
		</div>
	</div>

	<!-- end #content -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
	<script src="{{ asset('assets/js/theme/default.min.js') }}"></script>
	<script src="{{ asset('assets/js/apps.min.js') }}"></script>
	<script src="{{ asset('assets/js/moment.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

	<script type="text/javascript">
		$(document).ready(function() {
			var interval = setInterval(function() {
				var momentNow = moment();
				$('#date-part').html(momentNow.format('YYYY/MM/DD'));
				$('#time-part').html(momentNow.format('hh:mm:ss A'));
			}, 100);
		});

		$(".btn-submit").click(function() {
			let type = $(this).attr('id');
			$("#form-absen").append('<input type="hidden" name="type" value="'+type+'" /> ');
			$("#form-absen").submit();
		});

		$('#form-absen').on('keyup keypress', function(e) {
			var keyCode = e.keyCode || e.which;
			if (keyCode === 13) { 
				e.preventDefault();
				return false;
			}
		});
	</script>
</body>
</html>