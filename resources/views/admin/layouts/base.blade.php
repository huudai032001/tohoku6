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
	
	@if (App::isLocale('ja'))
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
	@else
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	@endif

	<link href="/vendor/limitless/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="/vendor/limitless/css/all.min.css" rel="stylesheet" type="text/css">
	
	<script src="/vendor/limitless/js/main/jquery.min.js"></script>
	<script src="/vendor/jquery-ui.1.13.0.min.js"></script>
	<script src="/vendor/limitless/js/main/bootstrap.bundle.min.js"></script>
	
	{{-- <script src="/vendor/limitless/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="/vendor/limitless/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="/vendor/limitless/js/plugins/ui/moment/moment.min.js"></script>
	<script src="/vendor/limitless/js/plugins/pickers/daterangepicker.js"></script> --}}

	{{-- <script src="/vendor/limitless/js/plugins/forms/selects/select2.min.js"></script> --}}
	<script src="/vendor/limitless/js/plugins/forms/tags/tagsinput.min.js"></script>
	<script src="/vendor/limitless/js/plugins/forms/tags/tokenfield.min.js"></script>
	{{-- <script src="/vendor/limitless/js/plugins/editors/summernote/summernote.min.js"></script> --}}
	<script src="/vendor/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
	
	<link href="/core-assets/css/limitless-template-customize.css" rel="stylesheet" type="text/css">
	<link href="/core-assets/css/admin.css" rel="stylesheet" type="text/css">

	<link href="/core-assets/css/file-manager.css" rel="stylesheet" type="text/css">
	
	@stack('head')

</head>

<body class="@yield('body-classes')">

	@stack('body-open')

	@yield('body')

	@include('admin.inc.file-manager-modal')


	<script src="/core-assets/js/limitless-admin-template-setup.js"></script>		
	<script src="/core-assets/js/vue-app.js"></script>

	<script src="/core-assets/js/admin.js"></script>

	@stack('body-close')

</body>
</html>
