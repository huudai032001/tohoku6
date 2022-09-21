<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            {{ $pageTitle ?? 'example.com' }}
        </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- vendor -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
        </script>  

        <!-- css -->
        {{-- <link rel="icon" href="/assets/images/favicon.ico"> --}} 
        
        @stack('head')

    </head>

    <body class="@yield('body-class')">

        @stack('body-open')

        @yield('body')

        <!-- js -->
              
        @stack('body-close')

    </body>

</html>