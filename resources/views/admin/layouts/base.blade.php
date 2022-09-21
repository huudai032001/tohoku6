<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		{{ $pageTitle ?? 'Admin area' }}
	</title>

	<meta name="_csrf" content="{{ csrf_token() }}">

	<!-- vendor -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/core-assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="/core-assets/layout_1/LTR/default/full/assets/css/all.min.css" rel="stylesheet" type="text/css">
	
	<script src="/core-assets/global_assets/js/main/jquery.min.js"></script>
	<script src="/admin-assets/vendor/jquery-ui.1.13.0.min.js"></script>
	<script src="/core-assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
	
	{{-- <script src="/core-assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="/core-assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="/core-assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="/core-assets/js/plugins/pickers/daterangepicker.js"></script> --}}

	<script src="/core-assets/global_assets/js/plugins/forms/tags/tagsinput.min.js"></script>
	<script src="/core-assets/global_assets/js/plugins/forms/tags/tokenfield.min.js"></script>
	<script src="/core-assets/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>

	
	<link href="/admin-assets/css/admin-template-customize.css" rel="stylesheet" type="text/css">
	<link href="/admin-assets/css/admin.css" rel="stylesheet" type="text/css">

	<link href="/admin-assets/css/file-manager.css" rel="stylesheet" type="text/css">
	
	@stack('head')

</head>

<body class="@yield('body-classes')">

	@stack('body-open')

	@yield('body')
	
	<script src="/admin-assets/js/limitless-admin-template-setup.js"></script>	
	<script src="/admin-assets/js/admin.js"></script>
	{{-- <script src="/admin-assets/js/file-manager.js"></script> --}}	

	@stack('body-close')

</body>
</html>
