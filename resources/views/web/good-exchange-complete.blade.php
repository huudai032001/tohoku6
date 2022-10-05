@extends('web.layouts.default')
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/libs/lightslider/css/lightslider.min.css">
        <link rel="stylesheet" href="/web-assets/css/point-exchange.css">
        <script src="/web-assets/libs/lightslider/js/lightslider.min.js"></script>
    @endsection
    @section('content')

    <body class="my-profile-page">


        <div id="wrapper">
            <div id="inner-wrapper">
                <div class="page-header">
                    <div class="page-title">
                        <div class="container">
                            <img src="images/tohoku-goods.svg" alt="">
                        </div>
                    </div>
                </div>              

                <section class="point-exchange-complete">
                    <div class="container">

                        <div class="message-text">
                            交換完了しました <br>
                            発送をお待ちください
                        </div>                        
                        
                        <div class="text-align-center">
                            <a href="{{route('list_goods')}}" class="button button-style-1">この内容で注文する</a>
                        </div>

                    </div>
                </section>
            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>
    @endsection
