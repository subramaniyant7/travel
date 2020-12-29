<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
    <meta name="csrf-token" content="{{ Session::token() }}">
	<title>{{ $title }}</title>
	<!-- icons -->
	<link href="{{ URL::asset('admin/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ URL::asset('admin/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="{{ URL::asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ URL::asset('admin/plugins/summernote/summernote.css') }}" rel="stylesheet">
	<!-- morris chart -->
	<link href="{{ URL::asset('admin/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="{{ URL::asset('admin/plugins/material/material.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('admin/css/material_style.css') }}">
	<!-- animation -->
	<link href="{{ URL::asset('admin/css/pages/animate_page.css') }}" rel="stylesheet">
	<!-- Template Styles -->
	<link href="{{ URL::asset('admin/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ URL::asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ URL::asset('admin/css/responsive.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ URL::asset('admin/css/theme-color.css') }}" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="{{ URL::asset('admin/img/favicon.ico') }}" />
	<!-- dropzone -->
	<link href="{{ URL::asset('admin/plugins/dropzone/dropzone.css') }}" rel="stylesheet" media="screen">

      <!-- data tables -->
      <link href="{{ URL::asset('admin/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="{{ URL::asset('admin/plugins/flatpicker/flatpickr.min.css') }}">


</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
        @include('admin.tophead')
		<!-- start page container -->
		<div class="page-container">
            @include('admin.sidebar')
			@yield('content')
		</div>
		<!-- end page container -->
