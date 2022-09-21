<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ App\Misc\HTML::titleTag('Login') }}</title>

	<meta name="_csrf" content="{{ csrf_token() }}">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/core-assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="/core-assets/layout_1/LTR/default/full/assets/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->

	@stack('head-css')

	<!-- Core JS files -->
	<script src="/core-assets/global_assets/js/main/jquery.min.js"></script>	
	<!-- /core JS files -->

	@stack('head-js')

</head>

<body class="@yield('body-classes')">


	@yield('body')

	@stack('footer-js')

</body>
</html>
