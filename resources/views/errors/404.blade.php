<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<title>Page Not Found</title>
	<!-- icons -->
	<link href="{{ URL::asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('admin/plugins/iconic/css/material-design-iconic-font.min.css') }}">
	<!-- bootstrap -->
	<link href="{{ URL::asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="{{ URL::asset('admin/css/pages/extra_pages.css') }}">
	<!-- favicon -->
	<link rel="shortcut icon" href="{{ URL::asset('admin/img/favicon.ico') }}" />
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="form-404">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-flower"></i>
					</span>
					<span class="form404-title p-b-34 p-t-27">
						Error 404
					</span>
					<p class="content-404">The page you are looking for does't exist or an other error occurred.</p>
					<div class="container-login100-form-btn">
						<a href="{{ url('/bookingadmin') }}" class="login100-form-btn">
							Go to home page
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="{{ URL::asset('admin/plugins/jquery/jquery.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('admin/js/pages/extra_pages/login.js') }}"></script>
	<!-- end js include path -->
</body>
</html>
