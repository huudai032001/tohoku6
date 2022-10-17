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

                <section class="exchange-item-preview">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <div class="item-thumb">
                                <div class="ratio ratio-1x1">
                                    <img src="{{$image}}" alt="">
                                </div>
                            </div>                            
                        </div>
                       
                    </div>
                </section>

                <section class="point-exchange-confirm-info">
                    <form action="{{route('postGoodExchangeConfirm')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="name" id="" value="{{$exchange->name}}">
                    <input type="hidden" name="phone" id="" value="{{$exchange->phone}}">
                    <input type="hidden" name="zip_code" id="" value="{{$exchange->zip_code}}">
                    <input type="hidden" name="address" id="" value="{{$exchange->address}}">
                    <input type="hidden" name="home_address" id="" value="{{$exchange->home_address}}">
                    <input type="hidden" name="point" id="" value="{{$point}}">
                    <input type="hidden" name="point" id="" value="{{$exchange->furigana}}">

                        <div class="container">

                            <div class="exchange-detail mb-50">
                                <div class="">
                                    商品名：<br>
                                    <b>{{$name_item}}</b>
                                </div>
                                <div class="separate my-10"></div>
                                お届け先 <br>
                                <b>{{$exchange->address}}</b> カジママサヒコ <br>
                                Tel {{$exchange->phone}}<br>
                                {{$exchange->zip_code}}
                            </div>
                            
                            <div class="text-align-center">
                                <input type="submit" class="button button-style-1" value="この内容で注文する">
                            </div>

                        </div>
                    </form>
                </section>
                
            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>
    @endsection
