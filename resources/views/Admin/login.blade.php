<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="Responsive Admin Template" />
        <meta name="author" content="SmartUniversity" />
        <title>Login - Admin Panel</title>
        <!-- icons -->
        <link href="{{ URL:: asset('admin/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ URL:: asset('admin/plugins/iconic/css/material-design-iconic-font.min.css') }}">
        <!-- bootstrap -->
        <link href="{{ URL:: asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- style -->
        <link rel="stylesheet" href="{{ URL:: asset('admin/css/pages/extra_pages.css') }}">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ URL:: asset('admin/img/favicon.ico') }}" />
    </head>

    <body>
        <div class="limiter">
            <div class="container-login100 page-background">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" action="{{ url('/bookingadmin/validate') }}" method="POST">
                        @csrf
                        <span class="login100-form-logo">
                            <i class="zmdi zmdi-flower"></i>
                        </span>
                        <span class="login100-form-title p-b-34 p-t-27">
                            Log in
                        </span>
                        @if(session()->has('message.level'))
                            <div class="alert alert-{{ session('message.level') }}">
                            {!! session('message.content') !!}
                            </div>
                        @endif
                        <div class="wrap-input100 validate-input" data-validate="Enter username">
                            <input class="input100" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- start js include path -->
        <script src="{{ URL:: asset('admin/plugins/jquery/jquery.min.js') }}"></script>
        <!-- bootstrap -->
        <script src="{{ URL:: asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL:: asset('admin/js/pages/extra_pages/login.js') }}"></script>
        <!-- end js include path -->
    </body>

</html>
