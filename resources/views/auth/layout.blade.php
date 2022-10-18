<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ $pageTitle ?? '' }}</title>

	<meta name="_csrf" content="{{ csrf_token() }}">

	<!--Vendor -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/vendor/limitless/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="/core-assets/layout_1/LTR/default/full/assets/css/all.min.css" rel="stylesheet" type="text/css">

	<script src="/vendor/limitless/js/main/jquery.min.js"></script>	


	@stack('head')

</head>

<body class="@yield('body-class')">

	@stack('body-open')

	@yield('body')

	@stack('body-close')

</body>
</html>
